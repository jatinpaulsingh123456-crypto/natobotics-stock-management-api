# Stock Management REST API

A RESTful Stock Management API built using **PHP Yii2 Framework** and **MySQL** for managing product categories and stock items. The API provides complete CRUD operations, stock management, search, filtering, database migrations, and seed data.

---

## Features

- Category Management (CRUD)
- Stock Item Management (CRUD)
- Stock In API
- Stock Out API
- Low Stock API
- Search Stock Items
- Filter Stock Items by Category
- Database Migrations
- Seed Data
- Input Validation
- RESTful JSON Responses
- Postman API Collection Included
- ER Diagram Included

---

## Technology Stack

- PHP 8+
- Yii2 Framework
- MySQL
- Composer
- RESTful API
- Postman (API Testing)

---

# Project Structure

```
stock-api/
│
├── assets/
├── commands/
├── config/
├── controllers/
├── docs/
│   └── er-diagram.png
├── migrations/
├── models/
├── postman/
│   └── Natobotics_Stock_Management_API.postman_collection.json
├── runtime/
├── tests/
├── vendor/
├── views/
├── web/
├── README.md
├── composer.json
└── yii
```

---

# ER Diagram

The database contains two entities:

- Category
- Stock Item

Relationship:

- One Category can have many Stock Items.

![ER Diagram](docs/er-diagram.png)

---

# Installation

## 1. Clone the Repository

```bash
git clone https://github.com/jatinpaulsingh123456-crypto/natobotics-stock-management-api.git
```

## 2. Navigate to Project

```bash
cd natobotics-stock-management-api
```

## 3. Install Dependencies

```bash
composer install
```

## 4. Configure Database

Update your MySQL credentials in:

```
config/db.php
```

Example:

```php
'dsn' => 'mysql:host=localhost;dbname=stock_management',
'username' => 'root',
'password' => '',
```

---

## 5. Run Database Migrations

```bash
php yii migrate
```

---

## 6. Seed Sample Data

```bash
php yii seed
```

---

## 7. Start Development Server

```bash
php yii serve
```

Server URL:

```
http://localhost:8080
```

---

# API Endpoints

## Category APIs

| Method | Endpoint | Description |
|---------|----------|-------------|
| GET | /categories | Get all categories |
| GET | /categories/{id} | Get category by ID |
| POST | /categories | Create category |
| PUT | /categories/{id} | Update category |
| DELETE | /categories/{id} | Delete category |

---

## Stock Item APIs

| Method | Endpoint | Description |
|---------|----------|-------------|
| GET | /stock-items | Get all stock items |
| GET | /stock-items/{id} | Get stock item by ID |
| POST | /stock-items | Create stock item |
| PUT | /stock-items/{id} | Update stock item |
| DELETE | /stock-items/{id} | Delete stock item |

---

## Custom APIs

| Method | Endpoint | Description |
|---------|----------|-------------|
| POST | /stock-items/{id}/stock-in | Increase stock quantity |
| POST | /stock-items/{id}/stock-out | Decrease stock quantity |
| GET | /stock-items/low-stock | Get items below reorder level |

---

# Search API

Example:

```http
GET /stock-items?search=Arduino
```

Searches by:

- Item Name
- SKU

---

# Filter API

Example:

```http
GET /stock-items?category=4
```

Returns stock items belonging to a specific category.

---

# Validation

The API validates the following:

- Quantity must be greater than zero.
- Stock cannot become negative.
- Stock-out quantity cannot exceed available stock.
- Category must exist before assigning stock items.
- Item must exist before performing stock operations.
- Required fields cannot be empty.

---

# Sample Response

```json
{
  "success": true,
  "message": "Stock added successfully.",
  "data": {
    "id": 1,
    "name": "Arduino Uno",
    "sku": "SKU001",
    "quantity": 110
  }
}
```

---

# Testing

API testing has been completed using **Postman**.

The Postman collection is available in:

```
postman/
└── Natobotics_Stock_Management_API.postman_collection.json
```

The following APIs have been tested:

### Categories

- Get All Categories
- Get Category By ID
- Create Category
- Update Category
- Delete Category

### Stock Items

- Get All Stock Items
- Get Stock Item By ID
- Create Stock Item
- Update Stock Item
- Delete Stock Item
- Stock In
- Stock Out
- Low Stock
- Search
- Filter by Category

### Validation

- Invalid Category ID
- Invalid Stock Item ID
- Negative Stock Prevention
- Required Field Validation

---

# Notes & Trade-offs

- Built using Yii2 REST `ActiveController`.
- Uses MySQL for persistent storage.
- Database schema managed using Yii2 Migrations.
- Seed data included for quick setup.
- Custom REST endpoints implemented for stock-in, stock-out, and low-stock operations.
- Search and category filtering implemented using query parameters.
- Validation added to prevent invalid stock updates.
- API responses returned in JSON format.

---

# Future Improvements

- JWT Authentication
- Pagination
- Sorting
- Swagger/OpenAPI Documentation
- Unit Tests
- Docker Support

---

# Author

**Jatin Paul Singh**

Backend Developer (PHP Yii2)

GitHub: https://github.com/jatinpaulsingh123456-crypto