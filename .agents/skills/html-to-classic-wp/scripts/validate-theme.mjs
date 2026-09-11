#!/usr/bin/env node

/**
 * validate-theme.mjs
 * 
 * Theme Architecture, Mandatory Hooks & A11y Validator for html-to-classic-wp.
 * Zero external dependencies (Pure Node.js built-ins).
 * 
 * Usage:
 *   node validate-theme.mjs --theme <path-to-theme-dir>
 */

import fs from 'fs';
import path from 'path';

function parseArgs() {
  const args = process.argv.slice(2);
  let themeDir = '';

  for (let i = 0; i < args.length; i++) {
    if (args[i] === '--theme' || args[i] === '-t') {
      themeDir = args[++i];
    } else if (args[i] === '--help' || args[i] === '-h') {
      console.log(`
Theme Validator (html-to-classic-wp)
Usage:
  node validate-theme.mjs --theme <path-to-theme-dir>

Options:
  --theme, -t   Path to the WordPress theme directory (Required)
  --help, -h    Show this help message
      `);
      process.exit(0);
    }
  }

  if (!themeDir) {
    console.error('Error: --theme directory path is required.');
    process.exit(1);
  }

  return { themeDir: path.resolve(themeDir) };
}

function checkRequiredFiles(themeDir) {
  const required = [
    'style.css',
    'index.php',
    'functions.php',
    'header.php',
    'footer.php'
  ];

  const recommended = [
    'front-page.php',
    'single.php',
    'archive.php',
    '404.php',
    'screenshot.png'
  ];

  const missingRequired = [];
  const missingRecommended = [];

  for (const file of required) {
    if (!fs.existsSync(path.join(themeDir, file))) {
      missingRequired.push(file);
    }
  }

  for (const file of recommended) {
    if (!fs.existsSync(path.join(themeDir, file))) {
      missingRecommended.push(file);
    }
  }

  return { missingRequired, missingRecommended };
}

function scanHooksAndSecurity(themeDir) {
  const issues = [];
  const passes = [];

  // 1. Check header.php
  const headerPath = path.join(themeDir, 'header.php');
  if (fs.existsSync(headerPath)) {
    const headerContent = fs.readFileSync(headerPath, 'utf-8');
    
    if (headerContent.includes('wp_head()')) {
      passes.push('header.php: wp_head() hook present.');
    } else {
      issues.push({ severity: 'CRITICAL', message: 'header.php is missing wp_head(); before </head>.' });
    }

    if (/body_class\s*\(/i.test(headerContent)) {
      passes.push('header.php: body_class() present on <body> tag.');
    } else {
      issues.push({ severity: 'WARNING', message: 'header.php is missing body_class() on <body <?php body_class(); ?>>.' });
    }

    if (headerContent.includes('wp_body_open()')) {
      passes.push('header.php: wp_body_open() hook present immediately after <body>.');
    } else {
      issues.push({ severity: 'WARNING', message: 'header.php is missing wp_body_open(); right after opening <body> tag.' });
    }

    if (/skip-link/i.test(headerContent)) {
      passes.push('header.php: Skip-to-content accessibility link present.');
    } else {
      issues.push({ severity: 'WARNING', message: 'header.php is missing an accessibility skip-link (<a class="skip-link screen-reader-text" href="#content">).' });
    }
  }

  // 2. Check footer.php
  const footerPath = path.join(themeDir, 'footer.php');
  if (fs.existsSync(footerPath)) {
    const footerContent = fs.readFileSync(footerPath, 'utf-8');
    if (footerContent.includes('wp_footer()')) {
      passes.push('footer.php: wp_footer() hook present.');
    } else {
      issues.push({ severity: 'CRITICAL', message: 'footer.php is missing wp_footer(); before </body>.' });
    }
  }

  // 3. Scan all PHP files for late escaping and anti-patterns
  const phpFiles = [];
  function collectPhp(dir) {
    for (const f of fs.readdirSync(dir)) {
      if (f === 'node_modules' || f === '.git' || f === 'vendor') continue;
      const full = path.join(dir, f);
      if (fs.statSync(full).isDirectory()) collectPhp(full);
      else if (f.endsWith('.php')) phpFiles.push(full);
    }
  }
  collectPhp(themeDir);

  for (const file of phpFiles) {
    const content = fs.readFileSync(file, 'utf-8');
    const relFile = path.relative(themeDir, file);

    // Anti-pattern: esc_html(get_the_title())
    if (/esc_html\s*\(\s*get_the_title\s*\(/i.test(content)) {
      issues.push({
        severity: 'WARNING',
        message: `${relFile}: Uses esc_html(get_the_title()) which breaks HTML entities. Use the_title() or wp_kses_post(get_the_title()).`
      });
    }

    // Dangerous unescaped user input echo
    if (/echo\s+\$_(GET|POST|REQUEST)\[/i.test(content)) {
      issues.push({
        severity: 'CRITICAL',
        message: `${relFile}: Unsanitized/unescaped echo of superglobal ($_GET/$_POST/$_REQUEST).`
      });
    }

    // query_posts usage
    if (/\bquery_posts\s*\(/i.test(content)) {
      issues.push({
        severity: 'CRITICAL',
        message: `${relFile}: Uses query_posts() which modifies the main query destructively. Use pre_get_posts or new WP_Query.`
      });
    }
  }

  return { passes, issues };
}

function runValidation() {
  const { themeDir } = parseArgs();

  if (!fs.existsSync(themeDir)) {
    console.error(`Error: Theme directory does not exist: ${themeDir}`);
    process.exit(1);
  }

  console.log(`\n========================================`);
  console.log(`Validating Classic Theme: ${themeDir}`);
  console.log(`========================================\n`);

  const { missingRequired, missingRecommended } = checkRequiredFiles(themeDir);
  const { passes, issues } = scanHooksAndSecurity(themeDir);

  let hasCritical = false;

  console.log('--- File Structure Checks ---');
  if (missingRequired.length === 0) {
    console.log('✔ All required core files are present.');
  } else {
    hasCritical = true;
    console.error(`✖ Missing REQUIRED files: ${missingRequired.join(', ')}`);
  }

  if (missingRecommended.length > 0) {
    console.warn(`! Recommended files not found: ${missingRecommended.join(', ')}`);
  }

  console.log('\n--- Hook & Security Checks ---');
  for (const pass of passes) {
    console.log(`✔ ${pass}`);
  }

  for (const issue of issues) {
    if (issue.severity === 'CRITICAL') {
      hasCritical = true;
      console.error(`✖ [CRITICAL] ${issue.message}`);
    } else {
      console.warn(`! [WARNING] ${issue.message}`);
    }
  }

  console.log('\n========================================');
  if (hasCritical) {
    console.error('RESULT: FAILED — Resolve critical issues before proceeding to dynamic migration.');
    console.log('========================================\n');
    process.exit(1);
  } else if (issues.length > 0) {
    console.log('RESULT: PASSED WITH WARNINGS — Theme is functional but review warnings.');
    console.log('========================================\n');
    process.exit(0);
  } else {
    console.log('RESULT: PASSED — Theme adheres to Classic Theme architecture standards.');
    console.log('========================================\n');
    process.exit(0);
  }
}

runValidation();
