# # Task Manager Web Application

This is a simple **Task Manager** web application built using **PHP**, **MySQL**, and **HTML/CSS**. It allows users to perform **CRUD (Create, Read, Update, Delete)** operations on tasks. The application connects to a **MySQL** database to store and manage tasks.

## Features

- **Create**: Add new tasks with a title and description.
- **Read**: View all existing tasks in the database.
- **Update**: (Not implemented yet) Update existing tasks.
- **Delete**: Remove tasks from the database.

## Technologies Used

- **PHP**: Server-side scripting for handling CRUD operations.
- **MySQL**: Database management system to store tasks.
- **HTML/CSS**: Frontend for user interaction and display.
- **XAMPP**: Used to set up the local development environment with Apache, PHP, and MySQL.

## Setup

1. **Download and Install XAMPP**  
   Ensure you have XAMPP installed and running on your system. You can download it from the [official XAMPP website](https://www.apachefriends.org/index.html).

2. **Start Apache and MySQL**  
   Open the XAMPP control panel and start the **Apache** and **MySQL** services.

3. **Create the Database**  
   Open phpMyAdmin (usually accessible at `http://localhost/phpmyadmin/`) and create a new database called `task_manager`. You can create the table with the following SQL query:

   ```sql
   CREATE TABLE task (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255) NOT NULL,
       description TEXT NOT NULL
   );

   wassup
