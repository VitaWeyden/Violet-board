# Violet Board

> A simulated online board game webshop built with Laravel 12, PostgreSQL, and Docker.

## About

Violet Board aims to simulate an e-commerce platform for board games, originated as a university project at the Faculty of Informatics and Information Technologies in Bratislava.

## Tech stack

| Layer | Technology |
|---|---|
| Backend | Laravel 12 / PHP 8.2 |
| Frontend | Blade, Bootstrap 5, Flowbite |
| Database | PostgreSQL 15 |
| Web server | Nginx |
| Runtime | Docker / PHP-FPM |

## Contributors

The project is being developed by:
- [Zsófia Gergely](https://github.com/VitaWeyden) - Full-Stack Development
- [Flóra Emma Kaňuchová](https://github.com/knchflora) - Former Contributor in Full-Stack Development
- [Bálint Janik](https://github.com/balintj4) - UX/UI Testing

## Requirements

Before you start, make sure you have the following installed:

- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [Python 3](https://www.python.org/downloads/)
- [Git](https://git-scm.com/downloads)

## Important Information

* Game images are placeholder box-art graphics (generated locally, `public/img/placeholders/`) - each product gets 3 images (front/back/contents) assigned deterministically from 12 color palettes, so the image gallery on the product page has something to click through. They don't depict real games.
* Game data is loaded from the `database/data/games.json` file during the seeding process.
* Wishlist items and shopping cart contents are stored in the session for guest users and are automatically transferred to the user's account upon login.
* Product prices are automatically generated during seeding based on the game's weight and do **not** represent real prices.
* Box Collect locations are defined in the `config/box_collect_locations.php` file.
* Discounts and the `New` / `Bestseller` labels are assigned to products during the seeding process.
* Orders are stored in the database after checkout; however, no real payment gateway integration has been implemented.
* The website can be browsed as a guest user, and products can be added to the cart or wishlist.

---

## Getting started

### 1. Clone the repository

```bash
git clone https://github.com/VitaWeyden/Violet-board.git
cd Violet-board
```

### 2. Set up the environment file

Create a new file called `.env` in the root of the project (the inner `Violet-board` folder) and copy the entire contents of `.env.example` into it.

> The default values in `.env.example` work out of the box with Docker, you don't need to change anything to run the project locally.

### 3. Start the application

> ⚠️ **Make sure Docker Desktop is open before running this script.** The script will not work if Docker Desktop is closed.

Make sure you are inside the inner `Violet-board` folder (where `start.py` is located), then run the `start.py` python script.

This will automatically:
- Build and start all Docker containers (app, nginx, database)
- Run database migrations and seeders
- Cache config, routes and views for better performance
- Open the app in your browser at [http://localhost:8000](http://localhost:8000)

> ⏳ **The first run will take a few minutes**, Docker needs to download and build all the images. Subsequent starts will be much faster.

---

### 4. Stopping the application

To stop the running containers without deleting data:

```bash
docker compose down
```

To stop and also delete the database volume (full reset):

```bash
docker compose down -v
```