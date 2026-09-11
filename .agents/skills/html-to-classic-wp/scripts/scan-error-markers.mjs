#!/usr/bin/env node

/**
 * scan-error-markers.mjs
 * 
 * Scans rendered HTML responses or server logs for PHP runtime errors,
 * notices, warnings, and unexpanded shortcodes/tokens.
 * 
 * Usage:
 *   node scan-error-markers.mjs --file <rendered-html-file>
 *   cat rendered.html | node scan-error-markers.mjs
 */

import fs from 'fs';
import path from 'path';

function parseArgs() {
  const args = process.argv.slice(2);
  let filePath = '';

  for (let i = 0; i < args.length; i++) {
    if (args[i] === '--file' || args[i] === '-f') {
      filePath = args[++i];
    } else if (args[i] === '--help' || args[i] === '-h') {
      console.log(`
Runtime Error Marker Scanner (html-to-classic-wp)
Usage:
  node scan-error-markers.mjs --file <rendered.html>
  cat rendered.html | node scan-error-markers.mjs

Options:
  --file, -f    Path to the rendered HTML or log file
  --help, -h    Show this help message
      `);
      process.exit(0);
    }
  }

  return { filePath };
}

const ERROR_PATTERNS = [
  { type: 'FATAL_ERROR', regex: /(?:Fatal error|Uncaught Error|Parse error):\s*(.*?)(?:in\s+.*?\s+on\s+line\s+\d+|$)/i },
  { type: 'WARNING', regex: /Warning:\s*(.*?)(?:in\s+.*?\s+on\s+line\s+\d+|$)/i },
  { type: 'NOTICE', regex: /Notice:\s*(.*?)(?:in\s+.*?\s+on\s+line\s+\d+|$)/i },
  { type: 'DEPRECATED', regex: /Deprecated:\s*(.*?)(?:in\s+.*?\s+on\s+line\s+\d+|$)/i },
  { type: 'UNDEFINED_VAR', regex: /Undefined variable:\s*([a-zA-Z0-9_$]+)/i },
  { type: 'UNDEFINED_INDEX', regex: /Undefined (?:index|array key):\s*([a-zA-Z0-9_$-]+)/i },
  { type: 'UNEXPANDED_SHORTCODE', regex: /\[([a-zA-Z0-9_-]+)(?:\s+[^\]]*)?\](?!\s*<\/code>)/g },
  { type: 'UNREPLACED_TEMPLATE_TAG', regex: /\{\{([A-Z0-9_]+)\}\}/g }
];

function scanContent(content, sourceName) {
  const lines = content.split('\n');
  const detected = [];

  for (let lineNum = 1; lineNum <= lines.length; lineNum++) {
    const line = lines[lineNum - 1];

    for (const pat of ERROR_PATTERNS) {
      if (pat.type === 'UNEXPANDED_SHORTCODE' || pat.type === 'UNREPLACED_TEMPLATE_TAG') {
        const matches = [...line.matchAll(pat.regex)];
        for (const m of matches) {
          // Ignore false positives like markdown brackets or CSS selectors if in script/style
          detected.push({
            type: pat.type,
            line: lineNum,
            snippet: m[0],
            detail: m[1] || ''
          });
        }
      } else {
        const m = line.match(pat.regex);
        if (m) {
          detected.push({
            type: pat.type,
            line: lineNum,
            snippet: line.trim(),
            detail: m[1] || ''
          });
        }
      }
    }
  }

  return detected;
}

function run() {
  const { filePath } = parseArgs();

  let content = '';
  let sourceName = 'STDIN';

  if (filePath) {
    const abs = path.resolve(filePath);
    if (!fs.existsSync(abs)) {
      console.error(`Error: File not found: ${abs}`);
      process.exit(1);
    }
    content = fs.readFileSync(abs, 'utf-8');
    sourceName = path.basename(abs);
  } else {
    // Read from STDIN
    try {
      content = fs.readFileSync(0, 'utf-8');
    } catch (err) {
      console.error('Error: Could not read from STDIN. Provide --file.');
      process.exit(1);
    }
  }

  console.log(`Scanning for runtime error markers in: ${sourceName}`);
  const findings = scanContent(content, sourceName);

  if (findings.length === 0) {
    console.log('✔ CLEAN: No PHP runtime errors, notices, or broken template tags detected.');
    process.exit(0);
  }

  console.log(`\n✖ Detected ${findings.length} marker(s):`);
  let hasFatal = false;

  for (const f of findings) {
    if (f.type === 'FATAL_ERROR') hasFatal = true;
    console.log(`  - [${f.type}] Line ${f.line}: ${f.snippet.slice(0, 100)}`);
  }

  console.log('');
  if (hasFatal) {
    console.error('RESULT: FAILED — Fatal errors present.');
    process.exit(1);
  } else {
    console.warn('RESULT: WARNINGS FOUND — Check notices/shortcodes.');
    process.exit(0);
  }
}

run();
