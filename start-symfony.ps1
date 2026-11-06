# start-symfony.ps1 – one-file Symfony server starter for Windows

# Change to the directory where this script lives (project root)
Set-Location -Path $PSScriptRoot

$port = 8000

# Prefer Symfony CLI if available
if (Get-Command symfony -ErrorAction SilentlyContinue) {
    Write-Host "Starting Symfony server with Symfony CLI on port $port..."
    
    # Equivalent of: symfony server:start -d --no-tls --port=8000 --listen-ip=0.0.0.0
    & symfony server:start -d --no-tls --port=$port --listen-ip=0.0.0.0
    exit $LASTEXITCODE
}

# Fallback: PHP built-in server
if (Get-Command php -ErrorAction SilentlyContinue) {
    Write-Host "Symfony CLI not found – falling back to PHP built-in server..."
    Write-Host "Serving on http://0.0.0.0:$port (or http://eshop-commerce.wip:$port)"
    
    # PHP built-in server (no http:// prefix)
    & php -S 0.0.0.0:$port -t public
    exit $LASTEXITCODE
}

Write-Error "Error: neither 'symfony' nor 'php' found in PATH."
exit 1
