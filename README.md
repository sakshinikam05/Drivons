# 🚗 DRIVONS – Smart Car Rental & Booking Platform

### Rent • Drive • Explore  
*A modern, admin-controlled, AI-assisted car rental web platform*

---

## 🌟 Overview

**DRIVONS** is a **full-stack, SQL-backed car rental and booking platform** designed to modernize traditional vehicle rental services, especially in **Tier-2 and Tier-3 cities**.

The platform connects **users, local car dealers, and administrators** under a single digital system that ensures **transparency, verification, and operational control**.

Drivons is developed as a **production-style academic project**, making it ideal for:
- 🎓 Final-year project submission  
- 💼 Portfolio & GitHub showcase  
- 🧠 System design and database evaluation  

---

## 🎯 Key Highlights

- 🚗 Rent cars *with or without driver*
- 🪪 Driving license upload & verification
- 🛂 Admin-controlled booking approvals
- 🏪 Dealer-based vehicle listings
- 🤖 AI chatbot for real-time assistance
- 🗄️ Relational SQL database (MySQL)
- 📊 Scalable and modular architecture

---

## 📑 Table of Contents

- [Core Features](#-core-features)
- [User Roles](#-user-roles)
- [AI Chatbot Integration](#-ai-chatbot-integration)
- [Technology Stack](#-technology-stack)
- [System Architecture](#-system-architecture)
- [Application Workflow](#-application-workflow)
- [Database Design (SQL)](#-database-design-sql)
- [Project Structure](#-project-structure)
- [Screenshots](#-screenshots)
- [Installation & Setup](#-installation--setup)
- [Security Considerations](#-security-considerations)
- [Scalability & Future Scope](#-scalability--future-scope)
- [License](#-license)
- [Developer](#-developer)

---


## 🏷️ Tech Badges

![Stack](https://img.shields.io/badge/Stack-PHP%20%7C%20MySQL-blue)
![Backend](https://img.shields.io/badge/Backend-Core%20PHP-purple)
![Frontend](https://img.shields.io/badge/Frontend-HTML%20%7C%20CSS%20%7C%20JS-yellow)
![Database](https://img.shields.io/badge/Database-MySQL-orange)
![Server](https://img.shields.io/badge/Server-Apache-red)
![AI](https://img.shields.io/badge/AI-Chatbot%20(Tidio)-brightgreen)
![Status](https://img.shields.io/badge/Project-Academic%20%7C%20Portfolio-success)
![Architecture](https://img.shields.io/badge/Architecture-Full--Stack-blue)
![Payments](https://img.shields.io/badge/Payments-Razorpay%20(Test)-violet)
![Focus](https://img.shields.io/badge/Focus-Car%20Rental%20System-critical)


---

## ✨ Core Features

### 👤 User Features
- Secure registration & login
- Browse cars by city and dealer
- Book cars (self-drive or with driver)
- Upload driving license for verification
- View booking history & invoices
- Subscription-based premium access
- AI chatbot support

### 🛂 Admin Features
- Admin dashboard for system control
- User, dealer & car management
- Booking approval / rejection
- Driving license verification
- Subscription and payment monitoring

### 🚘 Dealer Features
- Dealer onboarding
- Dealer-specific car inventory
- Manage availability and pricing
- Direct customer contact options

---

## 🤖 AI Chatbot Integration

Drivons integrates an **AI-powered chatbot using TIDIO** to improve user experience and reduce manual support.

### 💬 Chatbot Capabilities
- Guides users during bookings
- Explains plans and features
- Answers FAQs instantly
- Available across all pages

> Integrated using JavaScript embed with TIDIO API keys.

---

## 🧠 Technology Stack

### 🎨 Frontend
- HTML5
- CSS3
- JavaScript
- Bootstrap

### ⚙️ Backend
- PHP (Core PHP)
- Apache Server (XAMPP / WAMP)

### 🗄️ Database
- MySQL / MariaDB
- Managed via phpMyAdmin

---

## 🏗️ System Architecture

```

User / Dealer / Admin
↓
Frontend (HTML • CSS • JS • Bootstrap)
↓
Backend Logic (PHP)
├─ Authentication & Authorization
├─ Booking Management
├─ Dealer & Inventory Control
├─ Subscription Handling
├─ License Verification
├─ AI Chatbot Integration
↓
Database Layer (MySQL)
↓
Admin Monitoring & Reports

````

---

## 🔄 Application Workflow

1. User registers and logs in
2. Browses available cars
3. Selects rental type
4. Uploads driving license (if self-drive)
5. Booking request sent to admin
6. Admin verifies and approves
7. Booking confirmation generated
8. Invoice stored in database
9. Chatbot assists throughout

---

## 🗄️ Database Design (SQL)

The system uses a **relational SQL database** to maintain integrity, traceability, and scalability.

### 📊 Core Tables (Reference)

| Table Name        | Purpose |
|------------------|--------|
| `tblusers`        | Stores registered user details |
| `tbladmin`        | Admin authentication data |
| `tbldealers`      | Dealer information |
| `tblvehicles`     | Vehicle inventory |
| `tblbooking`      | Booking records |
| `tblsubscriptions`| Premium subscription data |
| `tblpayments`     | Payment transactions |
| `tbldocuments`    | Driving license uploads |
| `tbltestimonial`  | User feedback |

### 🧩 Sample SQL Schema

```sql
CREATE TABLE tblusers (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  subscription_type VARCHAR(50),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tblvehicles (
  car_id INT AUTO_INCREMENT PRIMARY KEY,
  dealer_id INT,
  model VARCHAR(100),
  city VARCHAR(50),
  price_per_day DECIMAL(10,2),
  availability BOOLEAN
);

CREATE TABLE tblbooking (
  booking_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  car_id INT,
  start_date DATE,
  end_date DATE,
  status VARCHAR(50)
);
````

---

## 📂 Project Structure

> ⚠️ **Project structure will be finalized and updated here once the complete folder hierarchy is shared.**

```
Drivons/
│
├── frontend/
├── backend/
├── database/
├── assets/
├── screenshots/
├── README.md
├── LICENSE
└── .gitignore
```

---

## 🖼️ Screenshots

> Add project screenshots inside the `screenshots/` folder and link them below.

```markdown
## 🖼️ Screenshots

### 🏠 Landing Page
![Landing Page](screenshots/landing.png)

### 🚗 Car Listings
![Car Listings](screenshots/cars.png)

### 📄 Booking & Invoice
![Booking](screenshots/booking.png)

### 🛂 Admin Dashboard
![Admin Panel](screenshots/admin.png)
```

---

## 🚀 Installation & Setup

### Prerequisites

* PHP 7+
* MySQL
* Apache Server
* XAMPP / WAMP

### Setup Steps

```bash
git clone https://github.com/your-username/Drivons.git
```

Move to:

```
xampp/htdocs/Drivons
```

Create database:

```
drivons_db
```

Import:

```
database/drivons.sql
```

---

## 🔐 Security Considerations

* Password hashing
* Session-based authentication
* Role-based access control
* Admin-only approvals
* Input sanitization

---

## 📈 Scalability & Future Scope

* REST API integration
* Mobile applications
* Live vehicle tracking
* Cloud deployment
* Advanced analytics dashboard
* Enhanced AI chatbot intelligence

---

## 📄 License

This project is **proprietary** and intended strictly for:

* Academic use
* Portfolio showcase

Commercial usage is not permitted.

---

## 👩‍💻 Developer

**Sakshi Sudhir Nikam**

Developed with a focus on **clean architecture, SQL database design, and real-world system workflows**.

---

🌟 *DRIVONS is built to demonstrate how structured design, databases, and admin control can modernize traditional services.*

---