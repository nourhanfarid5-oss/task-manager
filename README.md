# 📝 Task Manager

A modern web application for creating, organizing, and tracking tasks efficiently.

Task Manager is built with **Laravel** and provides users with an easy-to-use interface to manage their daily tasks, set priorities, track due dates, and monitor task status.

---

## ✨ Features

* 🔐 **User Authentication**

  * Register and login
  * Secure authentication
  * Profile management

* ➕ **Task Management**

  * Create new tasks
  * View task details
  * Edit existing tasks
  * Delete tasks

* 📌 **Task Organization**

  * Task status management
  * Priority levels
  * Due dates

* 🔎 **Search & Filtering**

  * Search tasks
  * Filter tasks based on their status and priority

* 📊 **Dashboard**

  * Overview of tasks
  * Track task progress
  * Monitor task status

* 🎨 **Modern UI**

  * Clean and responsive interface
  * Built with Blade and Tailwind CSS

---

## 🛠️ Technologies Used

* **PHP**
* **Laravel**
* **MySQL**
* **Blade**
* **Tailwind CSS**
* **Vite**
* **Laravel Breeze**

---

## 📂 Project Structure

```text
task-manager/
├── app/
│   ├── Http/
│   ├── Models/
│   └── Policies/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
├── public/
├── tests/
├── composer.json
├── package.json
└── README.md
```

---

## ⚙️ Installation

### 1. Clone the repository

```bash
git clone https://github.com/nourhanfarid5-oss/task-manager.git
```

### 2. Navigate to the project

```bash
cd task-manager
```

### 3. Install PHP dependencies

```bash
composer install
```

### 4. Install frontend dependencies

```bash
npm install
```

### 5. Create the environment file

```bash
cp .env.example .env
```

For Windows PowerShell, you can use:

```powershell
copy .env.example .env
```

### 6. Generate the application key

```bash
php artisan key:generate
```

### 7. Configure the database

Create a MySQL database and update the database settings in your `.env` file.

Example:

```env
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=
```

### 8. Run migrations

```bash
php artisan migrate
```

### 9. Start the development server

```bash
php artisan serve
```

### 10. Start Vite

In another terminal:

```bash
npm run dev
```

The application will be available at:

```text
http://127.0.0.1:8000
```

---

## 🧪 Testing

Run the Laravel test suite with:

```bash
php artisan test
```

---

## 📸 Screenshots

Screenshots of the application can be added here.

---

## 🎯 Project Purpose

This project was developed to practice and demonstrate backend web development using **PHP and Laravel**, including:

* MVC architecture
* Authentication
* CRUD operations
* Database migrations
* Eloquent ORM
* Policies & authorization
* Form validation
* Blade templating
* Tailwind CSS
* MySQL database integration

---

## 👩‍💻 Author

**Nourhan Gomaa Farid**

GitHub:
https://github.com/nourhanfarid5-oss

LinkedIn:
https://www.linkedin.com/in/nourhan-gomaa-farid-2a637b323/

---

⭐ If you find this project useful, feel free to star the repository!
