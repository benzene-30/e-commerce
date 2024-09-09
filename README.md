# E-Commerce Project

This is an e-commerce platform built with PHP, MySQL, HTML, CSS, and JavaScript.

## Features
- User authentication and management
- Product browsing, adding to cart, and checkout functionality
- Admin dashboard for managing products

## Prerequisites
- [XAMPP](https://www.apachefriends.org/index.html) (or any LAMP/WAMP stack)
- PHP >= 7.4
- MySQL

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/e-commerce.git
   ```

2. Move the cloned folder to your `htdocs` directory (or the directory where your server is running):
   ```bash
   mv e-commerce /path/to/xampp/htdocs/
   ```

3. Set up the MySQL database:
   - Import the database schema using the `e-commerce.sql` file located in the `database/` folder.
   - Update the `config.php` file with your database connection settings.

4. Start the Apache and MySQL services via XAMPP or your local server.

5. Access the project in your browser:
   ```bash
   http://localhost/e-commerce
   ```

## Usage
- Browse products, add them to the cart, and proceed to checkout.
- Admins can log in to the admin panel to manage products and users.

