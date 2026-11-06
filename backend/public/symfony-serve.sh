#!/usr/bin/env bash
# start-symfony.sh – one-file Symfony server starter

set -e

# Go to the directory where this script lives (assumes the script is in the project root)
cd "$(dirname "$0")"

clear

# Prefer the modern Symfony CLI if available
if command -v symfony >/dev/null 2>&1; then
    echo "Starting Symfony server with Symfony CLI..."
    # -d          = run in background (daemon)
    # --no-tls    = plain HTTP (remove this flag if you want HTTPS)
    # --port=8000 = fixed port
    exec symfony server:start -d --no-tls --port=8000
fi

# Fallback: PHP built-in server (works without Symfony CLI)
if command -v php >/dev/null 2>&1; then
    echo "Symfony CLI not found – falling back to PHP built-in server..."
    echo "Serving on http://eshop-commerce.wip:8000"
    # Important: php -S expects host:port (NO http://)
    exec php -S eshop-commerce.wip:8000 -t public
fi

echo "Error: neither 'symfony' nor 'php' found in PATH."
exit 1
