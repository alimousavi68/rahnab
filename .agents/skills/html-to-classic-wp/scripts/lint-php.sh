#!/usr/bin/env bash

# lint-php.sh
# Recursive PHP Syntax Checker (php -l) for html-to-classic-wp
# Usage: ./lint-php.sh <path-to-theme-or-plugin-dir>

set -e

TARGET_DIR="${1:-.}"

if [ "$TARGET_DIR" = "--help" ] || [ "$TARGET_DIR" = "-h" ]; then
  echo "Usage: ./lint-php.sh [path-to-theme-or-plugin-dir]"
  echo ""
  echo "Recursively verifies PHP syntax across all .php files using 'php -l'."
  echo "Defaults to the current directory if no path is provided."
  exit 0
fi

if ! command -v php >/dev/null 2>&1; then
  echo "Error: 'php' command-line binary not found in PATH." >&2
  exit 1
fi

if [ ! -d "$TARGET_DIR" ]; then
  echo "Error: Target directory '$TARGET_DIR' does not exist." >&2
  exit 1
fi

echo "========================================"
echo "Linting PHP files in: $TARGET_DIR"
echo "========================================"

ERRORS=0
COUNT=0

while IFS= read -r -d '' php_file; do
  COUNT=$((COUNT + 1))
  OUTPUT=$(php -l "$php_file" 2>&1)
  STATUS=$?

  if [ $STATUS -ne 0 ]; then
    echo "✖ SYNTAX ERROR in $php_file:"
    echo "$OUTPUT"
    ERRORS=$((ERRORS + 1))
  fi
done < <(find "$TARGET_DIR" -type f -name "*.php" ! -path "*/node_modules/*" ! -path "*/vendor/*" -print0)

echo "----------------------------------------"
echo "Scanned: $COUNT PHP files."

if [ $ERRORS -gt 0 ]; then
  echo "RESULT: FAILED — $ERRORS file(s) contain PHP syntax errors."
  echo "========================================"
  exit 1
else
  echo "RESULT: PASSED — All $COUNT PHP files passed syntax validation."
  echo "========================================"
  exit 0
fi
