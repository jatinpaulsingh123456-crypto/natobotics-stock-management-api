# Stock Management REST API

A RESTful Stock Management API built using PHP Yii2 Framework and MySQL.

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

## Technology Stack

- PHP 8+
- Yii2 Framework
- MySQL
- Composer
- REST API

## Installation

Clone the repository:

```bash
git clone https://github.com/jatinpaulsingh123456-crypto/natobotics-stock-management-api.git
```

Go to the project folder:

```bash
cd natobotics-stock-management-api
```

Install dependencies:

```bash
composer install
```

Configure the database in:

```
config/db.php
```

Run migrations:

```bash
php yii migrate
```

Seed the database:

```bash
php yii seed
```

Start the development server:

```bash
php yii serve
```

Server runs at:

```
http://localhost:8080
```

---

## API Endpoints

### Categories

| Method | Endpoint |
|---------|----------|
| GET | /categories |
| GET | /categories/{id} |
| POST | /categories |
| PUT | /categories/{id} |
| DELETE | /categories/{id} |

### Stock Items

| Method | Endpoint |
|---------|----------|
| GET | /stock-items |
| GET | /stock-items/{id} |
| POST | /stock-items |
| PUT | /stock-items/{id} |
| DELETE | /stock-items/{id} |

### Custom APIs

| Method | Endpoint |
|---------|----------|
| POST | /stock-items/{id}/stock-in |
| POST | /stock-items/{id}/stock-out |
| GET | /stock-items/low-stock |

### Search

```
GET /stock-items?search=Arduino
```

### Filter

```
GET /stock-items?category=4
```

---

## Validation

- Quantity must be greater than zero.
- Stock cannot become negative.
- Item must exist before stock operations.
- Category must exist before assigning stock items.

---

## Notes & Trade-offs

- Built using Yii2 REST ActiveController.
- Uses MySQL as the database.
- Custom endpoints implemented for stock-in, stock-out, and low-stock operations.
- Validation added to prevent invalid stock updates.
- Seed data included for testing.

---

## Author

Jatin Paul Singh