# PHP CRUD Operations – Student Management System

This is a simple CRUD (Create, Read, Update, Delete) web application built using **pure PHP and MySQL**. It allows you to manage a list of students – you can add, view, update, and delete student records easily.

## 🧰 Technologies Used

- PHP (Procedural)
- MySQL (with MySQLi)
- Bootstrap 5 (for basic UI styling)
- HTML & Form handling

## 📂 Features

- ✅ Add new student with first name, last name, and age
- ✅ View all students in a table
- ✅ Edit/update any student's information
- ✅ Delete a student from the list
- ✅ Proper validation and success/error messages
- ✅ Prepared statements used to prevent SQL injection

## 📁 Project Structure

```plaintext
├── dbcon.php             # Database connection file
├── index.php             # Main page to list and add students
├── insert_data.php       # Handles adding new student
├── update_page.php       # Form + logic to update a student
├── delete_data.php       # Handles deletion of student
├── header.php            # Bootstrap header
├── footer.php            # Footer with scripts
