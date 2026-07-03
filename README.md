# Stock Management REST API

A RESTful Stock Management API built using **PHP Yii2 Framework** and **MySQL** for managing categories and stock items. The API supports complete CRUD operations along with stock-in, stock-out, low-stock checking, searching, and filtering.

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

---

## Technology Stack

- PHP 8+
- Yii2 Framework
- MySQL
- Composer
- REST API

---

## Project Structure

```
stock-api/
│── assets/
│── commands/
│── config/
│── controllers/
│── docs/
│   └── er-diagram.png
│── migrations/
│── models/
│── runtime/
│── tests/
│── vendor/
│── views/
│── web/
│── README.md
│── composer.json
│── yii
```

---

## ER Diagram

![ER Diagram](docs/er-diagram.png)

---

## Installation

### Clone the repository

```bash
git clone https://github.com/jatinpaulsingh123456-crypto/natobotics-stock-management-api.git
```

### Navigate to the project

```bash
cd natobotics-stock-management-api
```

### Install dependencies

```bash
composer install
```

### Configure database

Update your database credentials in:

```
config/db.php
```

### Run migrations

```bash
php yii migrate
```

### Seed the database

```bash
php yii seed
```

### Start the development server

```bash
php yii serve
```

Server will run at:

```
http://localhost:8080
```

---

# API Endpoints

## Categories

| Method | Endpoint |
|---------|----------|
| GET | /categories |
| GET | /categories/{id} |
| POST | /categories |
| PUT | /categories/{id} |
| DELETE | /categories/{id} |

---

## Stock Items

| Method | Endpoint |
|---------|----------|
| GET | /stock-items |
| GET | /stock-items/{id} |
| POST | /stock-items |
| PUT | /stock-items/{id} |
| DELETE | /stock-items/{id} |

---

## Custom Endpoints

| Method | Endpoint | Description |
|---------|----------|-------------|
| POST | /stock-items/{id}/stock-in | Increase stock quantity |
| POST | /stock-items/{id}/stock-out | Decrease stock quantity |
| GET | /stock-items/low-stock | Returns items below reorder level |

---

## Search Stock Items

Example:

```http
GET /stock-items?search=Arduino
```

---

## Filter Stock Items by Category

Example:

```http
GET /stock-items?category=4
```

---

# Validation

The API validates the following:

- Quantity must be greater than zero.
- Stock cannot become negative.
- Stock-out quantity cannot exceed available stock.
- Category must exist before assigning stock items.
- Item must exist before performing stock operations.

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

# Notes & Trade-offs

- Built using Yii2 REST ActiveController.
- Uses MySQL for persistent storage.
- Custom REST endpoints implemented for stock-in, stock-out, and low-stock operations.
- Database migrations included for schema creation.
- Seed data included for quick testing.
- Validation added to prevent invalid stock updates.
- Search and category filtering implemented using query parameters.

---

# Testing

The API has been tested using **Postman** for:

- Category CRUD
- Stock Item CRUD
- Stock In
- Stock Out
- Low Stock
- Search
- Category Filter
- Validation and Error Handling

---

# Author

**Jatin Paul Singh**