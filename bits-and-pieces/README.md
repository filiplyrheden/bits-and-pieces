# 🕹️ Bits and Pieces - Admin Panel

**A Laravel-powered admin panel for "Bits and Pieces" – the ultimate e-shop for rage quitters!**  

Bits and Pieces is an e-commerce admin tool that helps manage a shop selling retro game controllers, specifically aimed at gamers who frequently smash their controllers in frustration. This Laravel-based admin panel provides CRUD functionality, product filtering, and user role management for seamless store operations.

## 📜 Table of Contents
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Installation](#-installation)
- [Usage](#-usage)
- [Testing] (#-testing)
- [License](#-license)

---

## 🚀 Features
- 🛠 **CRUD Operations** – Manage controllers and inventory efficiently.  
- 🎯 **Product Filtering** – Search, sort, and filter controllers based on brand, price, and availability.  
- 👥 **User Roles & Authentication** – Secure access for admins and staff.  
- 📦 **Pagination & UX Enhancements** – Smooth navigation with Laravel's built-in pagination.  

---

## 🏗️ Tech Stack
- **Backend:** Laravel 10, PHP 8  
- **Frontend:** Blade 
- **Database:** MySQL  

---

## 🛠 Installation
### Prerequisites
Ensure you have the following installed on your system:
- PHP 8.x
- Composer
- Laravel 10
- MySQL (or any database of your choice)

### Setup Steps
1. **Clone the repository:**
   ```sh
   git clone https://github.com/YOUR_GITHUB_USERNAME/bits-and-pieces-admin.git
   cd bits-and-pieces-admin
   ```

2. **Install dependencies:**
   ```sh
   composer install
   npm install && npm run dev
   ```

3. **Set up environment variables:**
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
   Update the `.env` file with your database credentials.

4. **Run database migrations and seed data:**
   ```sh
   php artisan migrate --seed
   ```

5. **Start the local development server:**
   ```sh
   php artisan serve
   ```

6. **Access the application:**  
   Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

---

## 📖 Usage
- **Admin Login:** Navigate to `/login` and enter admin credentials (check seeders for default credentials).  
- **Manage Products:** Add, edit, and remove controllers from inventory.  
- **View Orders & Users:** Track store activity and customer orders.  

## 🧪 Testing

This project includes automated tests to ensure functionality and stability.

Running Tests

To execute the test suite, run:
```sh
php artisan test
```

## 📜 License
This project is licensed under the MIT License. See [LICENSE](LICENSE) for details.
