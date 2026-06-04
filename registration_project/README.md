# Secure User Registration & Authentication System

A secure user registration, login, and authentication system built using PHP, MySQL, and PHPMailer. This project demonstrates backend web development best practices, including secure password handling, email verification, and relational database management.

## 🚀 Features

*   **Secure Registration:** Validates user inputs and ensures unique email/username records.
*   **Password Hashing:** Implements secure password storage using PHP's native `password_hash()` (bcrypt).
*   **Email Verification:** Integrates **PHPMailer** via SMTP to send secure activation links to users upon sign-up.
*   **Secure Authentication:** Session-based user login and logout system to protect user dashboards.

---

## 🛠️ Tech Stack

*   **Backend:** PHP
*   **Database:** MySQL (Structured Query Language)
*   **Mailing Service:** PHPMailer (SMTP integration)
*   **Local Server Environment:** XAMPP

---

## 📊 Database Architecture

The system relies on a relational database containing a structured `users` table to track registration details and activation statuses safely.

| Field | Type | Attributes | Description |
| :--- | :--- | :--- | :--- |
| `id` | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each user |
| `username` | VARCHAR(50) | UNIQUE, NOT NULL | User's chose screen name |
| `email` | VARCHAR(100) | UNIQUE, NOT NULL | User's verified email address |
| `password` | VARCHAR(255) | NOT NULL | Securely hashed password (bcrypt) |
| `verification_code` | VARCHAR(255) | NULL | Unique token generated for PHPMailer activation |
| `is_verified` | TINYINT(1) | DEFAULT 0 | Status flag (0 = unverified, 1 = active) |
| `created_at` | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Date and time of registration |

---

## 💻 Installation & Setup Local Environment

Follow these steps to run this project locally on your machine using XAMPP:

### 1. Clone or Download the Project
Ensure this folder is placed inside your XAMPP root directory:
`C:\xampp\htdocs\registration_project\`

### 2. Import the SQL Database
1. Open your browser and navigate to `http://localhost/phpmyadmin/`.
2. Create a new database (e.g., `registration_db`).
3. Click on the **Import** tab.
4. Choose the database file included in this repository (e.g., `database.sql` or your exported file name) and click **Go**.

### 3. Configure Environment Variables
Open the database configuration file (e.g., `config.php` or `db.php`) and update your database credentials if different from default:
```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'registration_db');