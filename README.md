# Simple CRUD App

A lightweight CRUD playground built with PHP, MySQL, and a modern vanilla-JS interface. The refreshed UI ships with responsive cards, instant feedback, empty states, and one-click destructive actions so you can focus on validating ideas instead of wiring boilerplate.

## ✨ Features
- **Zero-build front end** – pure HTML/CSS/JS served directly by PHP for easy hosting anywhere.
- **Modern UI/UX** – hero header, form panel with validation, responsive table, loading states, and empty-state messaging.
- **Auto-refreshing list** – the table updates immediately after each create/delete operation.
- **REST-style PHP endpoints** – `create`, `read`, and `delete` actions routed via query params.
- **Copy-ready starter** – includes `.gitignore`, setup docs, and SQL snippet to create the backing table.

## 🧰 Tech Stack
| Layer      | Tools |
|------------|-------|
| Front end  | HTML5, CSS (custom, responsive), vanilla JavaScript (fetch API) |
| Back end   | PHP 8+ with mysqli |
| Database   | MySQL / MariaDB |

## ✅ Prerequisites
- PHP 8.0+ with the `mysqli` extension enabled
- MySQL/MariaDB server
- Any HTTP server or `php -S` for local testing

## 🚀 Getting Started
1. **Clone & install**
   ```bash
   git clone https://github.com/<you>/crud-app-php.git
   cd crud-app-php
   ```
2. **Create the database**
   ```sql
   CREATE DATABASE `crud-db` DEFAULT CHARACTER SET utf8mb4;
   USE `crud-db`;
   CREATE TABLE `items` (
       `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       `name` VARCHAR(255) NOT NULL,
       `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```
3. **Configure credentials** (if your MySQL username/password differ) by editing `backend.php`.
4. **Start a server**
   ```bash
   php -S localhost:8000
   ```
5. Visit `http://localhost:8000/index.html` and begin adding items.

## 🔌 API Endpoints
| Action  | Method | URL | Body |
|---------|--------|-----|------|
| Create  | POST   | `backend.php?action=create` | `name=New%20Item` |
| Read    | GET    | `backend.php?action=read`  | — |
| Delete  | GET    | `backend.php?action=delete&id=1` | — |

Responses return JSON arrays for reads and empty bodies for create/delete. Extend the pattern by adding new actions inside `backend.php`.

## 🗂 Project Structure
```
├── backend.php   # PHP endpoints that talk to MySQL
├── index.html    # Markup + JS logic for the SPA-style UI
├── styles.css    # Glassmorphism-inspired theme & layout
├── README.md
└── .gitignore
```

## 🛠 Customization Tips
- Update color tokens or spacing scales inside `styles.css` to align with your brand.
- Extend `backend.php` with update actions or authentication as needed.
- Wrap fetch calls with your preferred state manager or swap in a framework when the project grows.

## 🧪 Troubleshooting
- **CORS/404 issues** – ensure you access files via PHP’s built-in server or a web server instead of double-clicking `index.html`.
- **Database connection errors** – verify credentials and confirm the database/table exist.
- **JSON parsing errors** – make sure PHP errors are not leaking into the JSON response; enable `display_errors=0` in production.

Happy building! 🎉
