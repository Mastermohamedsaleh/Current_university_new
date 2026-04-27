<img width="1892" height="912" alt="Screenshot 2024-06-07 002914" src="https://github.com/user-attachments/assets/2d92f9fe-6a85-4490-8d86-334595581244" />
<img width="1892" height="912" alt="Screenshot 2024-06-07 002914" src="https://github.com/user-attachments/assets/e6360659-e8ad-4ad9-9d0d-344f94dc6c82" />
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
4. **Zoom Credentials**
Add your Zoom App details to your `.env` file:
```bash
ZOOM_ACCOUNT_ID=xxxx
ZOOM_CLIENT_ID=xxxx
ZOOM_CLIENT_SECRET=xxxx 
```
4. **Screenshots**

### 📸 Project Screenshots (Modules Showcase)
<img width="1902" height="798" alt="Screenshot 2024-06-07 010006" src="https://github.com/user-attachments/assets/3e0edbf7-15ec-4578-b2d2-3365b8a05579" />
<img width="1897" height="841" alt="Screenshot 2024-06-07 005357" src="https://github.com/user-attachments/assets/0a57f79f-56ef-477b-ac4f-6fa02af136b1" />
<img width="1902" height="757" alt="Screenshot 2024-06-07 005304" src="https://github.com/user-attachments/assets/f0695d02-495c-411a-b3c6-0a80ed9b0671" />



<details>
  <summary><b>1️⃣ Admin & Management (Click to expand)</b></summary>
  <p align="center">
    <img src="https://github.com/user-attachments/assets/9e298629-e407-4faa-b1ff-c37d2e0d5bb0" width="800">
    <img src="https://github.com/user-attachments/assets/2451ab39-eb00-4a99-8652-6decedc01343" width="800">
  </p>
</details>


<details>
  <summary><b>2️⃣ Financial & Accounting System</b></summary>
  <p align="center">
    <img src="https://github.com/user-attachments/assets/ec04a27f-2d86-462a-b754-7be6afc6e8f7" width="800">
    <img src="https://github.com/user-attachments/assets/0a7183df-65d9-43c9-af8f-be431aeeddeb" width="800">
    <img src="https://github.com/user-attachments/assets/b1022441-f756-46ac-947d-652553e055a9" width="800">
  </p>
</details>

<details>
  <summary><b>3️⃣ Doctor </b></summary>
  <p align="center">
    <img src="https://github.com/user-attachments/assets/30af0075-4bed-4378-b5e4-0b522aa189a5" width="800">
    <img src="https://github.com/user-attachments/assets/1078b3f0-d10f-4e01-a7e6-1ddbedc6b845" width="800">
    <img src="https://github.com/user-attachments/assets/35160c25-612e-48ee-bfa6-2694c789ae04" width="800">
  </p>
</details>

<details>
  <summary><b> Students </b></summary>
  <p align="center">
    <img src="https://github.com/user-attachments/assets/3e0edbf7-15ec-4578-b2d2-3365b8a05579" width="800">
    <img src="https://github.com/user-attachments/assets/0a57f79f-56ef-477b-ac4f-6fa02af136b1" width="800">
    <img src="https://github.com/user-attachments/assets/f0695d02-495c-411a-b3c6-0a80ed9b0671" width="800">
  </p>
</details>


