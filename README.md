# Secure User Registration & Authentication System

### 🌐 [🔗 Click Here to View the Live Demo App](http://tonyarunkumar.rf.gd)

> 💡 **Quick Testing Credentials:**  
> * **Username:** `admin`  
> * **Password:** `12345`  

A sample and basic full-stack user registration , secure login, and authentication system built using AI Tools, PHP, MySQL, XAMPP and FTP Filezilla. This project showcases modern backend web development standards, relational database architecture, and a strong emphasis on security practices.

---
## 🛠️ Tech Stack & Engineer Tools

* **Backend Environment:** PHP
* **Database Management:** MySQL (Structured Query Language)
* **Local Development Environment:** XAMPP (Apache Server & phpMyAdmin)
* **Deployment & File Transfer:** FileZilla FTP Client
* **Cloud Infrastructure:** InfinityFree Cloud Hosting
* **Version Control & Pipeline:** Git & Custom Windows Batch Scripting (`.bat`)

---

## 📊 Database Architecture

The application is powered by a relational schema configured in **MariaDB / MySQL**. It features two core tables designed for identity verification and account management within the `registration_db` database environment.

### 1. `admin` Table
Stores authorization data for administrative control panel users[cite: 1].

| Field | Type | Attributes | Description |
| :--- | :--- | :--- | :--- |
| `id` | INT(11) | PRIMARY KEY, AUTO_INCREMENT | Unique administrative account identifier[cite: 1] |
| `username` | VARCHAR(100) | DEFAULT NULL | Administrative login username[cite: 1] |
| `password` | VARCHAR(100) | DEFAULT NULL | Verification credential for admin access[cite: 1] |

### 2. `users` Table
Stores standard user profiles registered dynamically through the application interface[cite: 1].

| Field | Type | Attributes | Description |
| :--- | :--- | :--- | :--- |
| `id` | INT(11) | PRIMARY KEY, AUTO_INCREMENT | Unique user profile record tracking index[cite: 1] |
| `name` | VARCHAR(100) | DEFAULT NULL | Full legal or display name provided by the user[cite: 1] |
| `email` | VARCHAR(100) | DEFAULT NULL | Communication routing and verification address[cite: 1] |
| `mobile` | VARCHAR(20) | DEFAULT NULL | Contact telephone numbers for profile lookup[cite: 1] |
| `password` | VARCHAR(100) | DEFAULT NULL | Securely handled registration sign-in credentials[cite: 1] |

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
Adjust your environment configuration script to line up with your local root privileges:
```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'registration_db');

---

## 👨‍💻 About the Developer

I hold a **Diploma in Computer Application completed 1989-90 **, giving me an enduring, deep appreciation for the foundational algorithms, logic, and architecture of software systems. 

Driven by a lifelong passion for technology, I am **entirely self-taught** in modern full-stack web engineering—independently mastering vanilla JavaScript, PHP, relational MySQL systems, MS-OFFICE365, Client Filezilla and cloud hosting workflows. I build clean, secure, production-ready web tools by combining decades of rock-solid logical foundations with modern development practices.

*   **GitHub Repository:** [https://github.com/tonykuma26/sql-project](https://github.com/tonykuma26/sql-project)
* 
*   **Connect with Me:** ARUN.KUMAR345@HOTMAIL.COM