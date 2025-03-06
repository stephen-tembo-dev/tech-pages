# SOLID Blog API

A RESTful Blog API 

## Installation

### 1. Clone the Repository
git clone https://github.com/stephen-tembo-dev/tech-pages.git
cd tech-pages


### 2. Install Dependencies
composer install


### 3. Set Up Environment
Copy `.env.example` and update database credentials.

cp .env.example .env
cp .env.example .env.testing


Update `.env`:

DB_DATABASE=tech_pages
DB_USERNAME=root


### 4. Generate Application Key
php artisan key:generate


### 5. Run Migrations & Seed Database
php artisan migrate --seed


### 6. Start the Server
php artisan serve


API will be available at: `http://127.0.0.1:8000/api/`

## API Endpoints

### Blog Posts
| Method | Endpoint            | Description           |
|--------|---------------------|-----------------------|
| GET    | `/api/blog-posts`   | Get all blog posts   |
| POST   | `/api/blog-posts`   | Create a blog post   |
| GET    | `/api/blog-posts/{id}` | Get a single post |
| PUT    | `/api/blog-posts/{id}` | Update a post      |
| DELETE | `/api/blog-posts/{id}` | Delete a post      |

### Categories
| Method | Endpoint         | Description          |
|--------|-----------------|----------------------|
| GET    | `/api/categories` | Get all categories |
| POST   | `/api/categories` | Create a category  |
| GET    | `/api/categories/{id}` | Get a category |
| PUT    | `/api/categories/{id}` | Update a category |
| DELETE | `/api/categories/{id}` | Delete a category |

### Comments (Nested)
| Method | Endpoint         | Description             |
|--------|-----------------|-------------------------|
| GET    | `/api/comments/{postId}` | Get comments for a post |
| POST   | `/api/comments` | Create a comment       |
| DELETE | `/api/comments/{id}` | Delete a comment   |

## Running Tests
Run unit and feature tests:

php artisan test

License
This project is open-source under the MIT License.

