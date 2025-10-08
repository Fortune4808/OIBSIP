# 💻 Web Development Tasks Collection

This repository showcases four individual web development tasks, each demonstrating different levels of frontend and backend development skills.  
All tasks were developed using HTML, CSS, and JavaScript, with backend integration in PHP and MySQL for authentication.

---

## 🧩 Tasks Overview

| Task | Title | Description | Technologies |
|------|--------|--------------|---------------|
| 1 | Simple Calculator | A basic calculator performing arithmetic operations. | HTML, CSS, JavaScript |
| 2 | Admiration Page | A personal webpage dedicated to someone I admire. | HTML, CSS |
| 3 | To-Do App | A dynamic task management app with add/delete functionality. | HTML, CSS, JavaScript |
| 4 | Login Authentication & Dashboard | A secure login system that leads to a protected dashboard. | HTML, CSS, jQuery, PHP, MySQL, Laragon |

---

## 🧠 Task Details

### 🔢 Task 1: Simple Calculator
**Description:**  
A simple web-based calculator that allows users to perform basic arithmetic operations (addition, subtraction, multiplication, and division).  
**Features:**  
- Responsive design  
- Error handling for invalid operations  
- Clear and reset functionality  

**How to Run:**  
Open `http://localhost/OIBSIP/task1` in your browser.

---

### 💖 Task 2: Admiration Page
**Description:**  
A static webpage dedicated to a person I admire. The page includes an image, biography, and reasons for admiration.  
**Features:**  
- Clean and semantic HTML structure  
- CSS for layout and styling  
- Responsive design  

**How to Run:**  
Open `http://localhost/OIBSIP/task2` in your browser.

---

### 📝 Task 3: To-Do App
**Description:**  
A simple to-do list web app where users can add, mark as complete, and delete tasks dynamically.  
**Features:**  
- DOM manipulation using JavaScript  
- Interactive task list  
- Local storage support (optional improvement)  

**How to Run:**  
Open `http://localhost/OIBSIP/task3` in your browser.

---

### 🔐 Task 4: Login Authentication & Dashboard
**Description:**  
A secure login authentication system that allows users to access a simple dashboard only after logging in successfully.  
**Features:**  
- Login form with email and password validation  
- Backend authentication using PHP and MySQL  
- Dashboard page accessible only to logged-in users  
- Uses **Laragon** or **XAMPP** as a local development environment  

**Setup Instructions:**  
1. Install either [Laragon](https://laragon.org/) or [XAMPP](https://www.apachefriends.org/index.html).  
2. Clone this repository inside your server’s root directory:  
   - For **Laragon:** `C:\laragon\www\`  
   - For **XAMPP:** `C:\xampp\htdocs\`  
3. **Important:** Make sure the folder name isn’t duplicated when cloning.  
   > Sometimes GitHub adds an extra folder level (e.g., `your-repo-name/your-repo-name/`).  
   > If that happens, move all files up one level so the structure looks correct.  
4. Import the provided SQL file into your MySQL database.  
   - The SQL file is located at:  
     ```
     http://localhost/OIBSIP/task4/api/db/oibsip_task4_db.sql
     ```
   - You can import it using phpMyAdmin or a MySQL client.  
5. Update your database credentials in:

http://localhost/OIBSIP/task4/api/config/connection.php

6. Start Apache and MySQL from your chosen environment.  
7. Open your browser and visit:  

http://localhost/OIBSIP/task4/

