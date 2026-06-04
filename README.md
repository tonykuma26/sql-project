# Secure User Registration & Authentication System

### 🌐 [🔗 Click Here to View the Live Demo App](http://tonyarunkumar.rf.gd)

> 💡 **Quick Testing Credentials:**  
> To review the system immediately without registering a new email, use these testing credentials:  
> * **Username:** `admin`  
> * **Password:** `12345`  
> *(Alternatively, feel free to use the registration form to create and verify a brand-new account!)*

A robust full-stack user registration, secure login, and authentication system built using PHP, MySQL, and PHPMailer. This project showcases modern backend web development standards, relational database architecture, and a strong emphasis on security practices.

---

## 🚀 Key Features

* **Secure Registration:** Complete server-side data validation to prevent duplicate email or username entries.
* **Password Hashing:** Implements industrial-strength cryptographic storage using PHP's native `password_hash()` (Bcrypt).
* **Automated Email Verification:** Integrated with **PHPMailer** via secure SMTP to dispatch account activation tokens to users.
* **Session Management:** Secure PHP session-handling to protect dashboards and control user authorization states.
* **Live Deployment:** Completely hosted and synchronized using automated configuration and remote FTP deployment.

---

## 🛠️ Tech Stack & Engineer Tools

* **Backend Environment:** PHP
* **Database Management:** MySQL (Structured Query Language)
* **Mailing Subsystem:** PHPMailer (SMTP Integration)
* **Local Development Environment:** XAMPP (Apache Server & phpMyAdmin)
* **Deployment & File Transfer:** FileZilla FTP Client
* **Cloud Infrastructure:** InfinityFree Cloud Hosting
* **Version Control & Pipeline:** Git & Custom Windows Batch Scripting (`.bat`)

---

## 📊 Database Architecture

The application is powered by a structured, relational MySQL schema featuring a dedicated `users` table optimized for fast lookup, security tracking, and metadata auditing.

| Field | Type | Attributes | Description |
| :--- | :--- | :--- | :--- |
| `id` | INT | PRIMARY KEY, AUTO_INCREMENT | Unique, system-generated identity token |
| `username` | VARCHAR(50) | UNIQUE, NOT NULL | User's unique display account identifier |
| `email` | VARCHAR(100) | UNIQUE, NOT NULL | User's communication and verification address |
| `password` | VARCHAR(255) | NOT NULL | Securely salted and hashed password (Bcrypt) |
| `verification_code` | VARCHAR(255) | NULL | Cryptographic token generated for email activation |
| `is_verified` | TINYINT(1) | DEFAULT 0 | Status flag (0 = Pending Verification, 1 = Active) |
| `created_at` | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Definitive timestamp marking user registration |

---

## 🔒 Security Implementations
* **SQL Injection Mitigation:** Built entirely using **PDO (PHP Data Objects) / Prepared Statements** to separate database commands from raw user inputs.
* **Cross-Site Scripting (XSS) Defenses:** Strict data cleaning using `htmlspecialchars()` on all dynamic UI rendering.
* **Credential Protection:** Architecture built to mask and separate SMTP mailing passwords out of the open-source pipeline.

---

## 💻 Local Installation & Setup

Want to audit or run this project locally on your machine? Follow this setup sequence:

### 1. Clone the Source
Download or pull this repository directly into your local XAMPP directory:  
`C:\xampp\htdocs\registration_project\`

### 2. Prepare the Database Schema
1. Open your browser and navigate to your local control panel: `http://localhost/phpmyadmin/`
2. Create a fresh target database (e.g., `registration_db`).
3. Click the **Import** tab at the top.
4. Select the database structure file (e.g., `database.sql`) bundled directly inside this repository root and execute **Go**.

### 3. Connect the Configurations
Adjust your environment configuration script (`config.php` or `db.php`) to line up with your local root privileges:
```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'registration_db');

---

## 👨‍💻 About the Developer

I hold a **Diploma in Computer Application from 1980**, giving me an enduring, deep appreciation for the foundational algorithms, logic, and architecture of software systems. 

Driven by a lifelong passion for technology, I am **entirely self-taught** in modern full-stack web engineering—independently mastering vanilla JavaScript, PHP, relational MySQL systems, and cloud hosting workflows. I build clean, secure, production-ready web tools by combining decades of rock-solid logical foundations with modern development practices.

*   **GitHub Repository:** [https://github.com/tonykuma26/sql-project](https://github.com/tonykuma26/sql-project)
*   **Connect with Me:** ARUN.KUMAR345@HOTMAIL.COM