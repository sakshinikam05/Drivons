<div align="center">

# <p align="center"><font color="#007BFF">D R I V O N S</font></p>

> ### 🚗 **Premium Car Rental & Intelligent Fleet Management System** 🚗
> ✨ **Seamless Rentals** &nbsp; • &nbsp; 🛡️ **Verified Drivers** &nbsp; • &nbsp; ⚡ **Intelligent Fleet**

---
<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.x-007BFF?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-8.0-white?style=for-the-badge&logo=mysql&logoColor=4479A1" />
  <img src="https://img.shields.io/badge/UI/UX-Light_Mode-007BFF?style=for-the-badge&logo=figma&logoColor=F24E1E" />
  <img src="https://img.shields.io/badge/AI_Support-Enabled-white?style=for-the-badge&logo=tidio&logoColor=white" />
</p>

<p align="center">
  <img src="https://readme-typing-svg.demolab.com?font=Fira+Code&weight=600&size=22&pause=1000&color=007BFF&center=true&vCenter=true&width=500&lines=Admin+Controlled+Fleet;AI-Assisted+Customer+Support;Secure+Razorpay+Payments;OTP+Verified+Registration;Premium+Car+Rental+Platform;" alt="Keywords Typing" />
</p>


<p align="center">
  <img src="https://img.shields.io/badge/Fleets-100%2B-007BFF?style=for-the-badge&logo=speedtest&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP_Pages-85%2B-white?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/KYC-Verified-007BFF?style=for-the-badge&logo=checkmarx&logoColor=white" />
  <img src="https://img.shields.io/badge/Booking-Instant-white?style=for-the-badge&logo=lightning&logoColor=white" />
  <img src="https://img.shields.io/badge/AI_Support-Assisted-007BFF?style=for-the-badge&logo=openai&logoColor=white" />
</p>
</div>

---
## 📋 Table of Contents

| # | Section |
|---|---------|
| 1 | [✨ Overview](#-overview) |
| 2 | [🎯 Key Highlights](#-key-highlights) |
| 3 | [🏷️ Core Features](#%EF%B8%8F-core-features) |
| 4 | [👥 User Roles](#-user-roles) |
| 5 | [🧠 Technology Stack](#-technology-stack) |
| 6 | [🏗️ System Architecture](#%EF%B8%8F-system-architecture) |
| 7 | [🔄 Application Workflow](#-application-workflow) |
| 8 | [🗄️ Database Design](#%EF%B8%8F-database-design) |
| 9 | [📂 Project Structure](#-project-structure) |
| 10 | [🗺️ Cities & Inventory](#%EF%B8%8F-cities--car-inventory) |
| 11 | [🤖 AI Chatbot](#-ai-chatbot-integration) |
| 12 | [💳 Payment Integration](#-payment-integration) |
| 13 | [🚀 Installation & Setup](#-installation--setup) |
| 14 | [🔧 Configuration](#-configuration) |
| 15 | [🔐 Security](#-security-considerations) |
| 16 | [📈 Future Scope](#-scalability--future-scope) |

---

## ✨ Overview

**DRIVONS** is a **production-style, full-stack car rental and booking platform** built with Core PHP, MySQL, and Bootstrap. It bridges the gap between users, local car dealers, and administrators — modernizing vehicle rental across **8 cities in Maharashtra**.

The platform handles the **complete rental lifecycle**: browsing → booking → driving license upload → Razorpay payment → invoice generation — all within a seamless web experience, enriched with an AI chatbot and OTP-based email verification.

> 🎓 Final-year academic project · 💼 Production-grade portfolio showcase

---

## 🎯 Key Highlights

<div align="center">

| 🗺️ | 8 Cities Served | Jalgaon · Pune · Mumbai · Nashik · Nagpur · Navi Mumbai · Thane · Sambhaji Nagar |
|---|---|---|
| 🚗 | 55+ Cars | Budget ₹1,800/day → Premium ₹4,000/day |
| 🪪 | License Upload | Front & back image for self-drive verification |
| 💳 | Online Payment | Razorpay gateway (Test + Live ready) |
| 🤖 | AI Chatbot | TIDIO embedded real-time assistant |
| 📧 | Email OTP | Registration, login & password reset via PHPMailer |
| 📄 | Auto Invoice | Generated after every confirmed booking |
| 🏷️ | Subscriptions | Premium plans via Razorpay billing |
| 📝 | Community Blog | 19 author-contributed articles |
| 🔐 | Secure Auth | Session-based with role-based access control |

</div>

---

## 🏷️ Core Features

### 👤 User Features
- ✅ Secure registration with **email OTP verification**
- ✅ Login / logout with PHP session management
- ✅ Browse cars **filtered by city and model**
- ✅ View individual **car detail pages** with full specs & pricing
- ✅ **Dual booking modes** — self-drive (with license) or with a hired driver
- ✅ Upload **driving license** (front + back) during booking
- ✅ Pay seamlessly via **Razorpay** (UPI / Card / Netbanking)
- ✅ View **booking history** and **downloadable invoices**
- ✅ Subscribe to **premium plans**
- ✅ Edit and manage **user profile**
- ✅ Access **AI chatbot** for instant guidance
- ✅ Read the **community blog**
- ✅ Browse **dealer profiles** across cities
- ✅ Submit **testimonials** and **contact messages**

### 🛂 Admin Features
*(Accessible via `Backend/wd.php`)*

- ✅ Centralized admin dashboard
- ✅ Manage all registered users
- ✅ View and control all bookings (`tblform`)
- ✅ Monitor payments and transactions (`tblpayments`)
- ✅ Manage vehicle inventory (`tblcars`)
- ✅ Handle subscription records (`tblsubscriptions`)
- ✅ Moderate user testimonials
- ✅ View contact/reply messages
- ✅ Track newsletter subscribers
- ✅ Session and access reset controls

### 🚘 Dealer Features
- ✅ 8 registered dealer profiles (`d0–d7`)
- ✅ City-specific car inventory pages
- ✅ Individual dealer detail pages
- ✅ Direct customer contact options

---

## 👥 User Roles

```
┌──────────────────────────────────────────────────────────────┐
│                         D R I V O N S                        │
├─────────────────┬───────────────────┬────────────────────────┤
│      USER       │      DEALER       │        ADMIN           │
├─────────────────┼───────────────────┼────────────────────────┤
│  Register/Login │  Profile listing  │  Full dashboard        │
│  Browse cars    │  City inventory   │  Booking management    │
│  Book & Pay     │  Availability     │  User management       │
│  View invoices  │  Contact info     │  Payment tracking      │
│  Subscribe      │                   │  License verification  │
│  Manage profile │                   │  Subscription control  │
└─────────────────┴───────────────────┴────────────────────────┘
```

---

## 🧠 Technology Stack

### 🎨 Frontend

| Technology | Purpose |
|---|---|
| **HTML5** | Semantic page structure |
| **CSS3** + Custom CSS | Styling, animations, responsive design |
| **JavaScript** (Vanilla) | Client-side interactivity |
| **Bootstrap** | Responsive grid layout & UI components |
| **Custom Web Fonts** | Premium typography (27 bundled font files) |

### ⚙️ Backend

| Technology | Purpose |
|---|---|
| **PHP 8.2** (Core PHP) | Server-side logic, routing, session handling |
| **Apache** (XAMPP) | Local web server |
| **Composer** | PHP dependency management |
| **PHPMailer** | OTP & notification emails via SMTP |
| **Razorpay PHP SDK** | Payment order creation & signature verification |

### 🗄️ Database

| Technology | Purpose |
|---|---|
| **MySQL / MariaDB 10.4** | Relational database engine |
| **phpMyAdmin** | Database GUI management |

### 🔌 Third-Party Integrations

| Service | Role |
|---|---|
| **Razorpay** | Car rental payments & subscription billing |
| **TIDIO** | AI-powered chatbot (JavaScript embed) |
| **PHPMailer + Gmail SMTP** | Email delivery for OTPs & notifications |

---

## 🏗️ System Architecture

```
  ╔══════════════════════════════════════╗
  ║     Browser (User / Admin)           ║
  ╚══════════════╤═══════════════════════╝
                 │  HTTP
  ╔══════════════▼═══════════════════════╗
  ║         Frontend Layer               ║
  ║   HTML · CSS · JS · Bootstrap        ║
  ╚══════════════╤═══════════════════════╝
                 │  PHP Requests
  ╔══════════════▼═══════════════════════╗
  ║         Backend Layer (Core PHP)     ║
  ║  ┌────────────────────────────────┐  ║
  ║  │  Auth Module                   │  ║
  ║  │  register / login / OTP        │  ║
  ║  │  logout / forgot / reset pass  │  ║
  ║  ├────────────────────────────────┤  ║
  ║  │  Booking & Form Management     │  ║
  ║  │  save_selected_items / submit  │  ║
  ║  │  checkout / invoice            │  ║
  ║  ├────────────────────────────────┤  ║
  ║  │  Payment Processing            │  ║
  ║  │  create_order / verify_payment │  ║
  ║  │  payment_success / failed      │  ║
  ║  ├────────────────────────────────┤  ║
  ║  │  Email / OTP Service           │  ║
  ║  │  send_email / verify_otp       │  ║
  ║  │  resend_otp / verify_pass_otp  │  ║
  ║  ├────────────────────────────────┤  ║
  ║  │  Admin Control Panel (wd.php)  │  ║
  ║  └────────────────────────────────┘  ║
  ╚══════════════╤═══════════════════════╝
                 │  MySQLi
  ╔══════════════▼═══════════════════════╗
  ║         Database Layer (MySQL)       ║
  ║  tblusers · tblcars · tblform        ║
  ║  tblpayments · tblsubscriptions      ║
  ║  tbltestimonial · tblreply           ║
  ║  tblsubscribers                      ║
  ╚══════════════════════════════════════╝
```

---

## 🔄 Application Workflow

```
 [1] Visit → index.php (Landing page)
      │
 [2] Register → OTP email sent (PHPMailer)
      │
 [3] Verify OTP → Account activated → Login
      │
 [4] Browse cars by city → Select car
      │
 [5] Car detail page → Click "Book Now"
      │
 [6] Fill booking form
      ├── Personal details (name, phone, address)
      ├── Source & destination cities
      ├── Departure & arrival date/time
      └── Upload driving license (front + back)
      │
 [7] Booking saved → tblform
      │
 [8] Proceed to Checkout → Razorpay popup opens
      │
 [9] Payment verified (HMAC) → tblpayments updated
      │
[10] Invoice auto-generated → View in "My Bookings"
      │
[11] Admin reviews and manages in wd.php dashboard
```

---

## 🗄️ Database Design

> Database name: **`drivons`** · Engine: InnoDB · Charset: utf8mb4

### 📊 Tables at a Glance

| Table | Description | Key Columns |
|---|---|---|
| `tblusers` | Registered user accounts | `id`, `username`, `email`, `password`, `OTP`, `ContactNo`, `dob`, `Address`, `City` |
| `tblcars` | Vehicle inventory (55 cars) | `id`, `carname`, `dname` (city), `price` (₹/day) |
| `tblform` | Booking records | `user_id`, `car_id`, `source`, `destination`, `departureDate`, `arrivalDate`, `licenseNumber`, `licenseFront/BackImage` |
| `tblpayments` | Payment transactions | `user_id`, `car_name`, `amount`, `payment_status`, `razorpay_payment_id`, `transaction_date` |
| `tblsubscriptions` | Premium subscriptions | `user_id`, `plan`, `amount`, `transaction_id`, `payment_status` |
| `tbltestimonial` | User testimonials | `email`, `Testimonial`, `PostingDate`, `status` |
| `tblreply` | Contact messages | `name`, `email`, `title`, `message`, `created_at` |
| `tblsubscribers` | Newsletter signups | `SubscriberEmail`, `PostingDate` |

### 🧩 Core SQL Schema

```sql
-- Users
CREATE TABLE `tblusers` (
  `id`           INT(11)      NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username`     VARCHAR(255) NOT NULL,
  `email`        VARCHAR(255) NOT NULL,
  `password`     VARCHAR(255) NOT NULL,
  `OTP`          VARCHAR(6)   NOT NULL,
  `ContactNo`    CHAR(11)     DEFAULT NULL,
  `dob`          VARCHAR(100) DEFAULT NULL,
  `Address`      VARCHAR(255) DEFAULT NULL,
  `City`         VARCHAR(100) DEFAULT NULL,
  `created_at`   TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
);

-- Vehicle Inventory
CREATE TABLE `tblcars` (
  `id`      INT(11)      NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `carname` VARCHAR(100) DEFAULT NULL,
  `dname`   VARCHAR(100) DEFAULT NULL,   -- dealer city
  `price`   FLOAT        DEFAULT NULL    -- INR per day
);

-- Bookings
CREATE TABLE `tblform` (
  `id`                INT(11)      NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id`           INT(11)      DEFAULT NULL,
  `name`              VARCHAR(100) DEFAULT NULL,
  `email`             VARCHAR(100) DEFAULT NULL,
  `phone`             VARCHAR(100) DEFAULT NULL,
  `city`              VARCHAR(100) DEFAULT NULL,
  `hasLicense`        VARCHAR(100) DEFAULT NULL,
  `licenseNumber`     VARCHAR(100) DEFAULT NULL,
  `licenseFrontImage` VARCHAR(100) DEFAULT NULL,
  `licenseBackImage`  VARCHAR(100) DEFAULT NULL,
  `source`            VARCHAR(100) DEFAULT NULL,
  `destination`       VARCHAR(100) DEFAULT NULL,
  `departureDate`     DATE         DEFAULT NULL,
  `arrivalDate`       DATE         DEFAULT NULL,
  `car_id`            INT(11)      DEFAULT NULL,
  `carname`           VARCHAR(100) DEFAULT NULL,
  `price`             FLOAT        DEFAULT NULL
);

-- Payments
CREATE TABLE `tblpayments` (
  `id`                  INT(11)       NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id`             INT(11)       DEFAULT NULL,
  `car_name`            VARCHAR(255)  NOT NULL,
  `amount`              DECIMAL(10,2) DEFAULT NULL,
  `payment_status`      VARCHAR(50)   DEFAULT NULL,
  `razorpay_payment_id` VARCHAR(100)  DEFAULT NULL,
  `transaction_date`    TIMESTAMP     DEFAULT CURRENT_TIMESTAMP
);
```

---

## 📂 Project Structure

```
GIT DRIVONS/
│
├── 📄 README.md
├── 📄 LICENSE
├── 📄 .gitignore
│
├── 📁 Screenshots/
│   └── 📄 banner.png                   ← Project banner
│
├── 📁 Backend/                         ← All server-side PHP logic
│   ├── 📄 dbcon.php                    ← MySQL connection
│   ├── 📄 session.php                  ← Session initialization
│   ├── 📄 check_session.php            ← Auth guard
│   ├── 📄 reset_session.php            ← Session reset
│   ├── 📄 send_email.php               ← PHPMailer dispatcher
│   ├── 📄 verify_otp.php               ← Registration OTP
│   ├── 📄 verify_pass_otp.php          ← Password reset OTP
│   ├── 📄 resend_otp_pass.php          ← Resend OTP
│   ├── 📄 save_selected_items.php      ← Booking selection save
│   ├── 📄 create_order.php             ← Razorpay order creation
│   ├── 📄 verify_payment.php           ← Razorpay HMAC verification
│   ├── 📄 update_payment_status.php    ← Payment status updater
│   ├── 📄 payment_success.php          ← Post-payment handler
│   ├── 📄 payment_failed.php           ← Failure handler
│   ├── 📄 success.php                  ← Subscription success
│   ├── 📄 view_subscriptions.php       ← Subscription viewer
│   ├── 📄 wd.php                       ← 🔐 Admin control panel
│   ├── 📄 composer.json / composer.lock
│   ├── 📄 php.ini                      ← Upload config
│   ├── 📁 auth/                        ← Authentication module
│   │   ├── 📄 login.php
│   │   ├── 📄 register.php
│   │   ├── 📄 logout.php
│   │   ├── 📄 forgot_password.php
│   │   └── 📄 reset_password.php
│   ├── 📁 sql/
│   │   └── 📄 drivons.sql              ← Full DB dump (import this)
│   ├── 📁 uploads/                     ← Uploaded license images
│   └── 📁 vendor/                      ← Composer packages
│
└── 📁 Frontend/                        ← All user-facing views
    ├── 📄 index.php                    ← 🏠 Home / Landing page
    ├── 📄 about.php
    ├── 📄 faq.php
    ├── 📄 terms.php
    ├── 📄 subscription.php
    ├── 📄 checkout.php
    ├── 📄 inventory.php
    ├── 📄 accessories.php
    ├── 📄 maintenance.php
    ├── 📄 testimonial.php
    ├── 📄 team.php
    ├── 📄 my-booking.php
    ├── 📄 profile.php
    ├── 📄 invoice.php / invoice_main.php
    ├── 📄 404.php
    ├── 📁 Cars/                        ← 59 individual car pages
    │   ├── 📄 cars.php
    │   ├── 📄 j-*.php                  ← Jalgaon cars
    │   ├── 📄 m-*.php                  ← Mumbai cars
    │   ├── 📄 n-*.php                  ← Nagpur cars
    │   ├── 📄 na-*.php                 ← Nashik cars
    │   ├── 📄 nm-*.php                 ← Navi Mumbai cars
    │   ├── 📄 p-*.php                  ← Pune cars
    │   ├── 📄 s-*.php                  ← Sambhaji Nagar cars
    │   └── 📄 t-*.php                  ← Thane cars
    ├── 📁 Dealer/                      ← 18 dealer pages (d0–d7 + cities)
    ├── 📁 Blog/                        ← 20 blog articles
    ├── 📁 Contact/
    ├── 📁 Game/
    ├── 📁 Header/ & 📁 footer/
    ├── 📁 css/     (14 stylesheets)
    ├── 📁 js/      (18 scripts)
    ├── 📁 fonts/   (27 font files)
    └── 📁 images/  (70 assets)
```

---

## 🗺️ Cities & Car Inventory

> **55 cars across 8 Maharashtra cities** | Price range: ₹1,800/day – ₹4,000/day

| City | No. of Cars | Highlights |
|---|:---:|---|
| 🏙️ **Jalgaon** | 7 | Chevrolet Tavera · Mahindra Scorpio-N · Toyota GR86 · Honda Civic |
| 🏙️ **Pune** | 10 | Mazda MX-5 Miata RF · Subaru BRZ · Honda Civic Si · Toyota Corolla |
| 🏙️ **Mumbai** | 7 | Hyundai Creta EV · Tata Tiago · Maruti Dzire · Honda City |
| 🏙️ **Nashik** | 9 | Maruti Swift · Tata Nexon EV · Hyundai Creta EV · Hyundai Elantra |
| 🏙️ **Nagpur** | 8 | Mahindra Scorpio-N · Toyota Corolla · Tata Nexon EV · Maruti Ertiga |
| 🏙️ **Navi Mumbai** | 5 | Subaru BRZ · Tata Nexon EV · Toyota Corolla · Honda City |
| 🏙️ **Sambhaji Nagar** | 4 | Maruti Ciaz · Hyundai Aura · Chevrolet Tavera · Hyundai Elantra |
| 🏙️ **Thane** | 5 | Hyundai Elantra · Chevrolet Tavera · Renault Kiger · Nissan Magnite |

---

## 🤖 AI Chatbot Integration

Drivons embeds a **TIDIO AI chatbot** on every page, providing round-the-clock user assistance.

**Chatbot Capabilities:**
- 💬 Guides users through the booking process step by step
- ❓ Instantly answers FAQs
- 📋 Explains subscription plans and pricing
- 🛠️ Provides support without manual intervention

> Integrated via **JavaScript embed** with the TIDIO API key placed before `</body>` on each page.

---

## 💳 Payment Integration

Drivons uses **Razorpay** for both car rental payments and subscription billing.

### Payment Flow

```
User → "Proceed to Pay" button
  │
  ▼
Backend: create_order.php
  → Razorpay Orders API called
  → order_id returned to frontend
  │
  ▼
Frontend: Razorpay Checkout popup
  → User pays via UPI / Card / Netbanking
  │
  ▼
Backend: verify_payment.php
  → HMAC SHA256 signature verified
  → tblpayments record created
  │
  ▼
payment_success.php
  → Invoice generated, booking confirmed
```

> ⚠️ Currently set to **Razorpay Test Mode**. Replace keys in `create_order.php` and `verify_payment.php` to go live.

---

## 🚀 Installation & Setup

### ✅ Prerequisites

- [XAMPP](https://www.apachefriends.org/) — PHP 8.2+, Apache, MySQL
- [Composer](https://getcomposer.org/) — PHP dependency manager
- Git

---

### Step 1 — Clone the Repository

```bash
git clone https://github.com/sakshinikam05/Drivons.git
```

Move to your XAMPP `htdocs` directory:

```
macOS:   /Applications/XAMPP/xamppfiles/htdocs/Drivons
Windows: C:\xampp\htdocs\Drivons
```

---

### Step 2 — Set Up the Database

1. Start **XAMPP** → start **Apache** and **MySQL**
2. Open **phpMyAdmin**: `http://localhost/phpmyadmin`
3. Create a new database:
   ```
   drivons
   ```
4. Select `drivons` → click **Import** → upload:
   ```
   Backend/sql/drivons.sql
   ```
5. Click **Go** — all 8 tables with 55 cars will be imported ✅

---

### Step 3 — Install PHP Dependencies

```bash
cd Backend
composer install
```

Installs **PHPMailer** and the **Razorpay PHP SDK**.

---

### Step 4 — Configure the App

Open `Backend/dbcon.php` and verify:

```php
$con = mysqli_connect('localhost', 'root', '', 'drivons');
```

Update if your MySQL uses a password.

---

### Step 5 — Launch

```
http://localhost/Drivons/Frontend/index.php    ← Main site
http://localhost/Drivons/Backend/wd.php        ← Admin panel
```

---

## 🔧 Configuration

### 📧 Email / OTP (PHPMailer)

Edit `Backend/send_email.php`:

```php
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'your@email.com';     // Your Gmail address
$mail->Password   = 'your_app_password';  // Gmail App Password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;
```

> 💡 Generate a Gmail App Password: **Google Account → Security → 2-Step Verification → App passwords**

### 💳 Razorpay Keys

In `Backend/create_order.php` and `Backend/verify_payment.php`:

```php
$keyId     = "rzp_test_XXXXXXXXXXXX";     // Your Razorpay Key ID
$keySecret = "XXXXXXXXXXXXXXXXXXXXXXXX";  // Your Razorpay Key Secret
```

Get keys from [dashboard.razorpay.com](https://dashboard.razorpay.com/).

### 📁 File Upload Limits

`Backend/php.ini`:

```ini
upload_max_filesize = 10M
post_max_size       = 10M
```

---

## 🔐 Security Considerations

| Concern | Implementation |
|---|---|
| 🔑 Password storage | `password_hash()` + `password_verify()` |
| 🔒 Session security | `session_start()` guarded on all protected routes |
| 💉 SQL Injection | MySQLi parameterized queries throughout |
| 📧 OTP verification | Server-side OTP stored in DB, single-use |
| 📁 File upload safety | Type/size validation; uploads stored outside web root |
| 💳 Payment security | Razorpay HMAC SHA256 signature verification |
| 🎭 Role separation | Admin in `Backend/`, users in `Frontend/` |
| 🧹 Input sanitization | `htmlspecialchars()` + server-side validation |

---

## 📈 Scalability & Future Scope

- [ ] 🌐 REST API layer to decouple frontend and backend
- [ ] 📱 Mobile application (Android / iOS)
- [ ] 🛰️ Live vehicle GPS tracking
- [ ] ☁️ Cloud deployment (AWS / Railway / Render)
- [ ] 📊 Advanced admin analytics dashboard
- [ ] 🔔 Real-time booking notifications (WebSockets / Firebase)
- [ ] 🤖 Enhanced AI chatbot with booking intent recognition
- [ ] 🇮🇳 Multilingual support (Hindi, Marathi)
- [ ] ⭐ Ratings & reviews for cars and dealers
- [ ] 🧑‍✈️ Driver management and assignment system

---

## ❤️ Contributor

<br />

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/sakshinikam05">
        <img src="https://github.com/sakshinikam05.png?size=80" width="72" height="72" style="border-radius:50%; border: 3px solid #e0e0e0;" alt="Sakshi Nikam" />
        <br />
        <sub><b>Sakshi Nikam</b></sub>
      </a>
      <br />
      <sub>Developer · Designer/sub>
    </td>
  </tr>
</table>

<br />

> Built with focus on **clean architecture**, **relational database design**, **real-world payment integration**, and **complete system workflows** — demonstrating production grade thinking in an academic context.

---

## 🚘 A Note from the Road

*"Every great journey starts with a single key turn.*
*DRIVONS was built with the belief that technology should make*
*mobility accessible, transparent, and joyful especially for*
*the cities that are just beginning their digital journey.*
*So buckle up, the road ahead is full of possibilities."* 🛣️✨

---
<div align="center">
  
> #### Built with ❤️ by **[Sakshi Nikam](https://github.com/sakshinikam05)**
> 
> © DRIVONS 2025 · All Rights Reserved · Academic & Portfolio Project
