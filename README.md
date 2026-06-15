# Made by: Zsófia Gergely and Flóra Emma Kaňuchová

---

Violet Board is an online board game webshop built with Laravel 12, PostgreSQL and Docker.

---

## Requirements

Before you start, make sure you have the following installed:

- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [Python 3](https://www.python.org/downloads/)
- [Git](https://git-scm.com/downloads)

---

## Getting started

### 1. Clone the repository

```bash
git clone https://github.com/your-username/violetboard.git
cd violetboard
```

### 2. Set up the environment file

Copy the example environment file:

```bash
cp .env.example .env
```

> The default values in `.env.example` work out of the box with Docker — you don't need to change anything to run the project locally.

### 3. Start the application

> ⚠️ **Make sure Docker Desktop is open before running this script.** The script will not work if Docker Desktop is closed.

```bash
python start.py
```

This will automatically:
- Build and start all Docker containers (app, nginx, database)
- Run database migrations and seeders
- Cache config, routes and views for better performance
- Open the app in your browser at [http://localhost:8000](http://localhost:8000)

> ⏳ **The first run will take a few minutes** — Docker needs to download and build all the images. Subsequent starts will be much faster.

---

## Daily use

Once the project has been set up with `start.py`, you can use these scripts for everyday use:

**Start the app** (after Docker is already built):
```bash
python serve.py
```

**Stop the app and remove all data** (full reset):
```bash
python stop.py
```

---

## Stopping the application

To stop the running containers without deleting data:

```bash
docker compose down
```

To stop and also delete the database volume (full reset):

```bash
docker compose down -v
```

---

## Tech stack

| Layer | Technology |
|---|---|
| Backend | Laravel 12 / PHP 8.2 |
| Frontend | Blade, Bootstrap 5, Flowbite |
| Database | PostgreSQL 15 |
| Web server | Nginx |
| Runtime | Docker / PHP-FPM |