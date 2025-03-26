# User Registration System

A secure user registration and authentication system built with PHP and MySQL.

## Features

- ✅ User registration with validation
- 🔒 Secure password hashing
- 📝 Full name validation (first + last name)
- ✉️ Email format and uniqueness verification
- 🔐 Password strength requirements:
  - Minimum 8 characters
  - At least 1 uppercase letter
  - At least 1 number
  - At least 1 special character
- 🚦 Error handling with user feedback
- ♻️ Form persistence on validation errors

## Requirements

- PHP 7.4+
- MySQL 5.7+
- Apache/Nginx web server

## Installation

1. Clone the repository:

   ```bash
   git clone (https://github.com/Ahmed-rbr/user_auth.git)

   ```

2. Set up database:

   CREATE DATABASE auth_system;
   USE auth_system;
   CREATE TABLE users (
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(100) NOT NULL,
   email VARCHAR(100) NOT NULL UNIQUE,
   pwd VARCHAR(255) NOT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

3. Configure database connection:

   Edit config/db.php with your credentials.

4. Start development server:

   php -S localhost:8000

## License

MIT License

## Contributors

- ahmed-rbr (https://github.com/Ahmed-rbr)
