# Functional Login Page 🔐

A simple full-stack login + registration flow built with vanilla HTML/CSS/JS on the front end and a lightweight Node.js + PHP backend that persists users to MySQL.

## Features
- **Responsive UI** in `index.html` / CSS for login & signup views.
- **AJAX form handling** via `script.js` to prevent full page reloads.
- **Server-side validation** in `server.js` (Node/Express) and `register.php`.
- **MySQL schema** provided in `Dump20241111.sql` for quick setup.
- **Session / JWT ready** (extend `server.js` to add real auth tokens).

## Tech Stack
- Frontend: HTML, CSS, vanilla JavaScript
- Backend: Node.js (Express) + PHP endpoints
- Database: MySQL

## Project Structure
- `index.html` – markup for login/register forms.
- `script.js` – client-side logic (validation, fetch/axios calls).
- `server.js` – Node backend handling API routes (login, register, etc.).
- `register.php` – optional PHP handler for user creation.
- `package.json` – dependencies and scripts.
- `Dump20241111.sql` – sample database dump (users table, etc.).

## Getting Started
1. Clone the repo and install dependencies:
   ```bash
   git clone https://github.com/<your-user>/Functional-LoginPage.git
   cd Functional-LoginPage
   npm install
   ```
2. Import the SQL dump into MySQL:
   ```bash
   mysql -u root -p < Dump20241111.sql
   ```
3. Configure DB credentials in `server.js` (and `register.php` if used).
4. Start the API:
   ```bash
   npm start
   ```
5. Open `index.html` in your browser (serve with `npx live-server` if you want hot reload).

## Customization
- Add password hashing (bcrypt) in `server.js`.
- Integrate JWT / sessions for protected routes.
- Style the UI with your own branding or add a forgot-password flow.

## Contributing
Issues and PRs are welcome. Ideas: OAuth login, Captcha, password strength meter, rate limiting, or Docker setup.

## Site: https://upaks.github.io/Functional-LoginPage/
