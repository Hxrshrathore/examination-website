### Examination Website Documentation

---

## Table of Contents

1. [Overview](#overview)
2. [Project Structure](#project-structure)
3. [Installation](#installation)
4. [Configuration](#configuration)
5. [Page Descriptions](#page-descriptions)
    - [Homepage](#homepage)
    - [Login Page](#login-page)
    - [Basic Info Pages](#basic-info-pages)
    - [Quiz Page](#quiz-page)
    - [Result Page](#result-page)
6. [Database Setup](#database-setup)
7. [Security Considerations](#security-considerations)
8. [Testing](#testing)
9. [Future Enhancements](#future-enhancements)

---

## Overview

This documentation provides a comprehensive guide to setting up and maintaining the Examination Website, a web application designed to facilitate online quizzes for different classes and competitive exams. The site includes features for user registration, quiz taking, and result management, with a focus on responsiveness and mobile-friendly design.

---

## Project Structure

```plaintext
examination-website/
│
├── assets/
│   ├── styles.css           # Custom CSS for styling the application
│   ├── favicon.ico          # Favicon for the website
│   └── image.png            # Header image
│
├── config.php               # Database configuration file
│
├── index.html               # Homepage of the website
│
├── login.html               # User login page
│
├── class7_basic.html        # Basic info form for Class 7
├── class8_basic.html        # Basic info form for Class 8
├── class9_basic.html        # Basic info form for Class 9
├── class10_basic.html       # Basic info form for Class 10
├── neet_basic.html          # Basic info form for NEET
├── jee_basic.html           # Basic info form for JEE
│
├── submit_basic_info.php    # Handles submission of basic info forms
├── quiz_template.php        # Template for displaying quiz questions
├── submit_quiz.php          # Handles quiz submission and scoring
├── result.php               # Displays the result page
│
└── login_handler.php        # Handles user login
```

---

## Installation

### Prerequisites

- PHP 7.0 or higher
- MySQL database
- Apache server or compatible web server

### Steps

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/Hxrshrathore/examination-website.git
    ```

2. **Navigate to the Project Directory**:
    ```bash
    cd examination-website
    ```

3. **Set Up the Database**:
    - Create a new MySQL database.
    - Execute the SQL queries provided in the `Database Setup` section.

4. **Configure the Database Connection**:
    - Update `config.php` with your database credentials.

5. **Deploy the Application**:
    - Copy the project files to your web server's root directory.
    - Ensure the web server is configured to serve PHP files.

---

## Configuration

### `config.php`

This file contains the database connection settings. Update the values to match your database configuration.

```php
<?php
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

---

## Page Descriptions

### Homepage

- **File**: `index.html`
- **Purpose**: Serves as the main landing page where users can select their class or exam to start the quiz.
- **Features**:
  - Links to basic info forms for each class or exam.
  - Responsive design with a header image and footer.

### Login Page

- **File**: `login.html`
- **Purpose**: Allows users to log in to the website.
- **Features**:
  - Form fields for username and password.
  - A link to the registration page (not included in this setup but can be added).
  - Mobile-friendly design.

### Basic Info Pages

- **Files**: `class7_basic.html`, `class8_basic.html`, `class9_basic.html`, `class10_basic.html`, `neet_basic.html`, `jee_basic.html`
- **Purpose**: Collects basic information from users before they start the quiz.
- **Features**:
  - Form fields for name, mobile number, address, and school name.
  - Validation to ensure the mobile number is valid.
  - Redirection to the corresponding quiz page upon submission.

### Quiz Page

- **File**: `quiz_template.php`
- **Purpose**: Displays the quiz questions and handles the timer.
- **Features**:
  - Dynamically loads questions based on the selected class or exam.
  - Displays a timer that counts down from 30 minutes.
  - Submits the form automatically when the timer runs out.
  - Shuffles the questions each time the page is loaded.

### Result Page

- **File**: `result.php`
- **Purpose**: Displays the user's quiz score.
- **Features**:
  - Displays the user's score after completing the quiz.
  - Provides a link to return to the homepage.

---

## Database Setup

Use the following SQL queries to set up the necessary tables for the application.

```sql
CREATE DATABASE examination_db;

USE examination_db;

CREATE TABLE class7 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    mobile_no VARCHAR(10) UNIQUE,
    address TEXT,
    school_name VARCHAR(255),
    score INT
);

CREATE TABLE class8 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    mobile_no VARCHAR(10) UNIQUE,
    address TEXT,
    school_name VARCHAR(255),
    score INT
);

CREATE TABLE class9 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    mobile_no VARCHAR(10) UNIQUE,
    address TEXT,
    school_name VARCHAR(255),
    score INT
);

CREATE TABLE class10 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    mobile_no VARCHAR(10) UNIQUE,
    address TEXT,
    school_name VARCHAR(255),
    score INT
);

CREATE TABLE neet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    mobile_no VARCHAR(10) UNIQUE,
    address TEXT,
    school_name VARCHAR(255),
    score INT
);

CREATE TABLE jee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    mobile_no VARCHAR(10) UNIQUE,
    address TEXT,
    school_name VARCHAR(255),
    score INT
);
```

---

## Security Considerations

1. **Input Validation**:
    - Ensure that all form inputs are validated on both client and server sides to prevent SQL injection and other malicious inputs.

2. **Prepared Statements**:
    - Use prepared statements for all database queries to protect against SQL injection.

3. **Session Management**:
    - Use PHP sessions to securely manage user data during the quiz.

4. **Data Sanitization**:
    - Sanitize all user inputs before processing or storing them in the database.

5. **HTTPS**:
    - Deploy the application over HTTPS to encrypt data in transit and protect user information.

---

## Testing

1. **Functional Testing**:
    - Verify that each form submits correctly and that data is stored in the appropriate database tables.
    - Ensure the timer on the quiz page counts down accurately and submits the form when time expires.
    - Check that the result page correctly displays the user's score.

2. **Responsive Testing**:
    - Test the application on various devices and screen sizes to ensure it is mobile-friendly and responsive.

3. **Security Testing**:
    - Conduct tests to ensure the application is secure against common vulnerabilities such as SQL injection and XSS.

4. **Performance Testing**:
    - Test the application's performance under load to ensure it can handle multiple users simultaneously.

---

## Future Enhancements

1. **User Registration and Authentication**:
    - Add functionality for user registration and secure login to allow users to access their quiz history and results.

2. **Admin Dashboard**:
    - Develop an admin dashboard for managing quizzes, users, and results.

3. **Enhanced Reporting**:
    - Implement detailed reporting features to provide insights into quiz performance and user statistics.

4. **Question Bank Management**:
    - Add a system for managing a question bank, allowing for easy updates and additions to the quiz content.

5. **Multilingual Support**:
    - Extend the application to support multiple languages for a broader user base.

6. **Advanced Security Features**:
    - Implement advanced security features such as CAPTCHA, two-factor authentication, and regular security audits.

---

This documentation should help you understand the structure and functionality of the Examination Website and guide you through installation, configuration, and usage. Adjustments can be made to fit your specific requirements and preferences.
