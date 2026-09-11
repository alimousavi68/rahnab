#!/usr/bin/env node

/**
 * audit-source.mjs
 * 
 * Static Prototype Source Auditor for html-to-classic-wp Skill.
 * Parses HTML, CSS, and JS files to generate a compact inventory JSON.
 * Zero external dependencies (Pure Node.js built-ins).
 * 
 * Usage:
 *   node audit-source.mjs --source <path-to-html-prototype> [--out <path-to-output-json>]
 */

import fs from 'fs';
import path from 'path';

function parseArgs() {
  const args = process.argv.slice(2);
  const options = {
    source: '',
    out: ''
  };

  for (let i = 0; i < args.length; i++) {
    if (args[i] === '--source' || args[i] === '-s') {
      options.source = args[++i];
    } else if (args[i] === '--out' || args[i] === '-o') {
      options.out = args[++i];
    } else if (args[i] === '--help' || args[i] === '-h') {
      console.log(`
Static Source Auditor (html-to-classic-wp)
Usage:
  node audit-source.mjs --source <dir> [--out <file.json>]

Options:
  --source, -s  Path to the static HTML/CSS/JS source directory (Required)
  --out, -o     Path to write the resulting inventory JSON (Default: <source>/source-inventory.json)
  --help, -h    Show this help message
      `);
      process.exit(0);
    }
  }

  if (!options.source) {
    console.error('Error: --source directory is required.');
    process.exit(1);
  }

  if (!options.out) {
    options.out = path.join(path.resolve(options.source), 'source-inventory.json');
  }

  return options;
}

function walkDir(dir, fileList = []) {
  if (!fs.existsSync(dir)) return fileList;
  const files = fs.readdirSync(dir);
  for (const file of files) {
    if (file === 'node_modules' || file === '.git' || file === '.svn') continue;
    const fullPath = path.join(dir, file);
    const stat = fs.statSync(fullPath);
    if (stat.isDirectory()) {
      walkDir(fullPath, fileList);
    } else {
      fileList.push(fullPath);
    }
  }
  return fileList;
}

function analyzeHtmlFile(filePath, relPath) {
  const content = fs.readFileSync(filePath, 'utf-8');
  
  // Title
  const titleMatch = content.match(/<title[^>]*>([^<]+)<\/title>/i);
  const title = titleMatch ? titleMatch[1].trim() : '';

  // CSS Links
  const cssMatches = [...content.matchAll(/<link[^>]+rel=["']stylesheet["'][^>]*href=["']([^"']+)["']/gi)]
    .concat([...content.matchAll(/<link[^>]+href=["']([^"']+)["'][^>]*rel=["']stylesheet["']/gi)]);
  const stylesheets = cssMatches.map(m => m[1]);

  // JS Scripts
  const jsMatches = [...content.matchAll(/<script[^>]+src=["']([^"']+)["']/gi)];
  const scripts = jsMatches.map(m => m[1]);

  // Images
  const imgMatches = [...content.matchAll(/<img[^>]+src=["']([^"']+)["']/gi)];
  const images = imgMatches.map(m => m[1]);

  // Semantic Sections & Landmarks
  const hasHeader = /<header[\s>]/i.test(content);
  const hasFooter = /<footer[\s>]/i.test(content);
  const hasNav = /<nav[\s>]/i.test(content);
  const hasMain = /<main[\s>]/i.test(content);
  const hasSidebar = /<aside[\s>]/i.test(content) || /class=["'][^"']*(sidebar|widget-area)[^"']*["']/i.test(content);

  // Forms
  const formMatches = [...content.matchAll(/<form[\s>]/gi)];
  const formsCount = formMatches.length;

  // Extract top-level sections with classes / IDs
  const sectionMatches = [...content.matchAll(/<(section|div)[^>]+(?:id=["']([^"']+)["']|class=["']([^"']+)["'])[^>]*>/gi)];
  const sectionsDetected = [];
  for (const m of sectionMatches) {
    const tag = m[1];
    const id = m[2] || '';
    const classes = m[3] || '';
    if (id || classes) {
      sectionsDetected.push({ tag, id, classes: classes.split(/\s+/).filter(Boolean).slice(0, 5) });
    }
  }

  return {
    file: relPath,
    title,
    landmarks: { hasHeader, hasFooter, hasNav, hasMain, hasSidebar },
    formsCount,
    stylesheets,
    scripts,
    imagesCount: images.length,
    sampleSections: sectionsDetected.slice(0, 15)
  };
}

function analyzeCssFiles(cssFiles, sourceRoot) {
  const cssVars = new Set();
  const fontFamilies = new Set();

  for (const file of cssFiles) {
    try {
      const content = fs.readFileSync(file, 'utf-8');
      
      // CSS Variables
      const varMatches = content.matchAll(/--([a-zA-Z0-9_-]+)\s*:/g);
      for (const m of varMatches) {
        cssVars.add(`--${m[1]}`);
      }

      // Font Families
      const fontMatches = content.matchAll(/font-family\s*:\s*([^;]+);/gi);
      for (const m of fontMatches) {
        const family = m[1].replace(/['"]/g, '').split(',')[0].trim();
        if (family && !family.startsWith('inherit') && !family.startsWith('var')) {
          fontFamilies.add(family);
        }
      }
    } catch (err) {
      console.warn(`Warning: Could not read CSS file: ${file}`);
    }
  }

  return {
    cssVariablesCount: cssVars.size,
    sampleCssVariables: Array.from(cssVars).slice(0, 20),
    fontFamilies: Array.from(fontFamilies)
  };
}

function runAudit() {
  const { source, out } = parseArgs();
  const sourceRoot = path.resolve(source);

  if (!fs.existsSync(sourceRoot)) {
    console.error(`Error: Source directory does not exist: ${sourceRoot}`);
    process.exit(1);
  }

  console.log(`Auditing prototype source: ${sourceRoot}`);
  const allFiles = walkDir(sourceRoot);

  const htmlFiles = allFiles.filter(f => /\.(html|htm|php)$/i.test(f));
  const cssFiles = allFiles.filter(f => /\.css$/i.test(f));
  const jsFiles = allFiles.filter(f => /\.js$/i.test(f));
  const imgFiles = allFiles.filter(f => /\.(png|jpe?g|gif|svg|webp|avif)$/i.test(f));
  const fontFiles = allFiles.filter(f => /\.(woff2?|ttf|eot|otf)$/i.test(f));

  console.log(`Found: ${htmlFiles.length} HTML/PHP, ${cssFiles.length} CSS, ${jsFiles.length} JS, ${imgFiles.length} Images, ${fontFiles.length} Fonts.`);

  const htmlAudit = htmlFiles.map(f => analyzeHtmlFile(f, path.relative(sourceRoot, f)));
  const cssAudit = analyzeCssFiles(cssFiles, sourceRoot);

  // Common styles and scripts across all HTML files
  const stylesheetFrequency = {};
  const scriptFrequency = {};

  for (const page of htmlAudit) {
    for (const s of page.stylesheets) {
      stylesheetFrequency[s] = (stylesheetFrequency[s] || 0) + 1;
    }
    for (const sc of page.scripts) {
      scriptFrequency[sc] = (scriptFrequency[sc] || 0) + 1;
    }
  }

  const globalStylesheets = Object.keys(stylesheetFrequency).filter(k => stylesheetFrequency[k] >= Math.max(1, htmlAudit.length * 0.6));
  const globalScripts = Object.keys(scriptFrequency).filter(k => scriptFrequency[k] >= Math.max(1, htmlAudit.length * 0.6));

  const inventory = {
    generatedAt: new Date().toISOString(),
    sourcePath: sourceRoot,
    summary: {
      totalPages: htmlFiles.length,
      totalStylesheets: cssFiles.length,
      totalScripts: jsFiles.length,
      totalImages: imgFiles.length,
      totalFonts: fontFiles.length
    },
    typographyAndTokens: cssAudit,
    globalEnqueues: {
      stylesheets: globalStylesheets,
      scripts: globalScripts
    },
    pages: htmlAudit
  };

  const outDir = path.dirname(path.resolve(out));
  if (!fs.existsSync(outDir)) {
    fs.mkdirSync(outDir, { recursive: true });
  }

  fs.writeFileSync(out, JSON.stringify(inventory, null, 2), 'utf-8');
  console.log(`Audit inventory successfully written to: ${out}`);
}

runAudit();
