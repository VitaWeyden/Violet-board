#!/usr/bin/env python3
import subprocess
import os
import shutil
import time
import webbrowser

def run(cmd, check=True):
    return subprocess.run(cmd, shell=True, check=check)

print("=" * 50)
print("  Violet Board – Starting up")
print("=" * 50)

# Generate APP_KEY in Python before Docker starts — no container needed
import secrets, base64
if os.path.exists(".env"):
    env_content = open(".env").read()
    if "APP_KEY=base64" not in env_content:
        key = "base64:" + base64.b64encode(secrets.token_bytes(32)).decode()
        env_content = env_content.replace("APP_KEY=", f"APP_KEY={key}")
        open(".env", "w").write(env_content)
        print("[OK] APP_KEY generated")

# Copy nginx config
os.makedirs("docker", exist_ok=True)
if os.path.exists("nginx.conf") and not os.path.exists("docker/nginx.conf"):
    shutil.copy("nginx.conf", "docker/nginx.conf")
    print("[OK] nginx.conf copied")

# Remove public/storage symlink (causes Docker build error on Windows)
storage_link = os.path.join("public", "storage")
if os.path.islink(storage_link):
    os.unlink(storage_link)
    print("[OK] public/storage symlink removed")
elif os.path.isdir(storage_link):
    shutil.rmtree(storage_link)
    print("[OK] public/storage removed")

# Fix storage permissions before build
run("chmod -R 775 storage bootstrap/cache 2>/dev/null || true", check=False)

# Build and start
print("\n[..] Building and starting Docker containers...")
run("docker compose up -d --build")

# Run composer install inside container — bind mount overwrites vendor/ from the image
print("[..] Installing Composer dependencies...")
run("docker compose exec app composer install --no-dev --optimize-autoloader", check=False)

# Wait for DB
print("[..] Waiting for the database...")
time.sleep(10)

# Fix storage permissions inside container
print("[..] Fixing storage permissions...")
run("docker compose exec app chown -R www-data:www-data storage bootstrap/cache", check=False)
run("docker compose exec app chmod -R 775 storage bootstrap/cache", check=False)

# Migrate and seed
print("[..] Running migrations and seeders...")
run("docker compose exec app php artisan migrate:fresh --force", check=False)
run("docker compose exec app php artisan db:seed --force", check=False)
print("[OK] Database ready")

# Cache config, routes and views for better performance
print("[..] Caching config, routes and views...")
run("docker compose exec app php artisan config:cache", check=False)
run("docker compose exec app php artisan route:cache", check=False)
run("docker compose exec app php artisan view:cache", check=False)
print("[OK] Cache ready")

# Storage link
run("docker compose exec app php artisan storage:link", check=False)

print()
print("=" * 50)
print("  Violet Board is running!")
print("  Open: http://localhost:8000")
print("=" * 50)

time.sleep(2)
webbrowser.open("http://localhost:8000")

input("\nPress Enter to exit (the server keeps running in the background)...")
