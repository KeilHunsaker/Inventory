# Modern Inventory Manager

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel)
![Filament](https://img.shields.io/badge/Filament-Admin-F2C94C?style=for-the-badge&logo=php)
![Tailwind](https://img.shields.io/badge/Tailwind-CSS-38B2AC?style=for-the-badge&logo=tailwind-css)
![Status](https://img.shields.io/badge/Status-Portfolio_Ready-success?style=for-the-badge)

A robust, enterprise-grade Inventory Management System built to demonstrate **Senior-Level Laravel Architecture**.

This project goes beyond basic CRUD to showcase strict typing, Role-Based Access Control (RBAC), Service-Oriented
patterns, and a polished "Mullet Architecture" (Professional Landing Page + Powerful Admin Backend).

---

## 🚀 Key Features

### 🔐 Security & Access Control

* **Role-Based Access Control (RBAC):** Implemented using PHP Enums (`UserRole`) and Laravel Policies.
* **Granular Permissions:**
    * **Admins:** Full access to User Management, System Settings, and Inventory.
    * **Managers:** Restricted access to Inventory only (cannot promote users).
* **Secure Authentication:** Hashed password workflows and protected routes.

### 🛠 Architecture & Code Quality

* **Strict Typing:** Extensive use of PHP 8.2+ typed properties and method signatures.
* **Enum-Driven State:** Item Statuses and User Roles are managed via Backed Enums (`ItemStatus`, `UserRole`) to
  prevent "magic string" errors.
* **Unified Schema System:** Filament Resources are organized into dedicated `Schema` classes (`CategoryForm`,
  `ItemForm`) for maintainability.
* **Database Integrity:** Foreign key constraints and auto-generating slugs using event listeners (`live(onBlur)`).

### 🎨 UI/UX

* **Filament Admin Panel:** A fully responsive dashboard with searchable dropdowns, ternary filters (Visible/Hidden),
  and real-time validation.
* **Professional Landing Page:** A clean, Tailwind-styled public facing page that detects auth state.
* **Interactive Tables:** Toggleable columns and advanced filtering.

---

## 🛠️ Tech Stack

* **Framework:** Laravel 12
* **Admin Panel:** FilamentPHP (v3/v5 Architecture)
* **Frontend:** Blade & Tailwind CSS
* **Database:** SQLite (Dev) / MySQL (Production)
* **Language:** PHP 8.2+

---

## ⚡ Quick Start

Follow these steps to set up the project locally.

### 1. Clone & Install

```bash
git clone https://github.com/keilhunsaker/inventory.git
cd inventory
composer install
npm install && npm run build
