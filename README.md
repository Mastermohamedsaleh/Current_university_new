# 🎓 Modern University Management System (LMS & ERP)
## 🔗 Live Demo
[View Live Project](https://currentuniversitynew-production.up.railway.app)
[![Laravel Version](https://img.shields.io/badge/Laravel-9.x-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.1-blue.svg)](https://php.net)
[![Design Pattern](https://img.shields.io/badge/Pattern-Repository_%26_Service-orange.svg)](#)

A professional University ERP & LMS built with **Laravel 9**, following enterprise-grade design patterns to ensure scalability, maintainability, and clean code.

---

## 🏗️ Architectural Overview

The project is built using a **Decoupled Architecture**:
* **Repository Pattern:** To handle all database logic and Eloquent queries, keeping the controllers thin.
* **Service Layer:** To encapsulate complex business logic (e.g., Zoom meetings, Quiz processing, and Financial calculations).
* **Traits:** Used for reusable logic across different controllers (e.g., Image uploads, Zoom tokens).



---

## 🌟 Core System Modules

### 1. 🔐 Advanced Multi-Auth
* Dedicated **Guards** and **Providers** for Admins, Doctors, and Students.
* Secure login and session management for each user type.

### 2. 💰 Financial & Accounting System
* **Fee Invoicing:** Automated generation of student fees.
* **Student Ledger:** Real-time tracking of payments and debts via `student_accounts`.
* **Treasury Management:** Global tracking of university funds in `fund_accounts`.

### 3. 🎥 Direct Zoom Integration
* Custom **Zoom Service** using Server-to-Server OAuth.
* Automated scheduling of virtual lectures directly from the Doctor's dashboard.
* Storage of `join_url`, `start_url`, and `meeting_id` for seamless access.

### 4. 📝 Examination & Quiz Engine
* Dynamic question creation with automated option parsing.
* Support for Multiple Choice and True/False formats.
* Automated scoring and points assignment.

---

## 🛠️ Technical Stack

* **Framework:** Laravel 9
* **Patterns:** Repository & Service Layer
* **Database:** MySQL
* **API:** Zoom API v2 (Direct Integration via Guzzle)
* **Utilities:** Carbon (Time), Laravel Excel (Optional), Toastr (Notifications).

---

## 🚀 Installation

1. **Clone & Install**
   ```bash
   git clone [https://github.com/Mastermohamedsaleh/Current_university_new.git](https://github.com/Mastermohamedsaleh/Current_university_new.git)
   composer install
2.**Environment Configuration**
   cp .env.example .env
   php artisan key:generate
3.**Database Setup**
   php artisan migrate --seed
4.**Zoom Credentials**
 ```Add your Zoom App details to .env:
    ZOOM_ACCOUNT_ID=xxxx
    ZOOM_CLIENT_ID=xxxx
    ZOOM_CLIENT_SECRET=xxxx

