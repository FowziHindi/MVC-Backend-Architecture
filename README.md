# PHP-MVC-DB-Implementation

A backend-focused web application built to demonstrate structured relational database management, Master-Detail data patterns, and strict MVC (Model-View-Controller) architecture.

## Technical Highlights

* **Custom MVC Architecture:** Implements a clear separation of concerns. The Controller handles traffic and validation, the Model (Library) manages raw SQL and persistence, and the View (Template) handles dynamic UI rendering.
* **Master-Detail Data Pattern:** Successfully manages complex One-to-Many relationships. A single "Master" record (Order) is linked to multiple "Detail" records (Order Items) using relational SQL schemas.
* **Atomic Data Synchronization:** Features a robust "Clean Slate" update protocol. When a Master record is modified, the engine ensures data integrity by atomically synchronizing all child records to prevent orphaned data or duplication.
* **Server-Side Validation Engine:** Uses a custom validation class to sanitize $_POST data, enforcing data types and protecting the database from malformed inputs.
* **Relational Query Optimization:** Utilizes advanced SQL LEFT JOIN operations to efficiently fetch and display related data (e.g., mapping User IDs to Usernames) in a single query.

## Tech Stack

* **Language:** PHP 8.x
* **Database:** MySQL / MariaDB
* **Frontend:** Bootstrap 5, jQuery
* **Server:** Apache (XAMPP environment)

## Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/FowziHindi/relational-master-detail-engine.git](https://github.com/FowziHindi/relational-master-detail-engine.git)
   ```
2. **Database Setup:**
   * Open phpMyAdmin.
   * Create a new database (e.g., fowhin).
   * Import the provided database_schema.sql file located in the root directory.
     
3. **Configuration:**
   * Open config.php and update the database credentials to match your local environment:
   ```php
   const DB_NAME = 'fowhin';
   const DB_USERNAME = 'root';
   const DB_PASSWORD = '';
   ```
4. **Run:**
   * Move the project folder to your htdocs directory and access it via localhost/relational-master-detail-engine.

## Project Structure

* **/libraries**: The Model layer. Contains classes that interact directly with the database.
* **/controls**: The Controller layer. Contains logic for handling form submissions, validation, and page routing.
* **/templates**: The View layer. PHP-powered HTML templates for displaying data.
* **/utils**: Core utility classes for database connection, paging, and input validation.
  
