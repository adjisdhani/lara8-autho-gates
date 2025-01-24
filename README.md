# Laravel API with Sanctum: Implementation Steps

This README provides the steps to set up a Laravel API with authentication and authorization using Sanctum. The example demonstrates managing a `Book` resource with two types of users:

1. **User 1**: Can only view book data.
2. **User 2**: Can perform CRUD operations on book data.

---

## Steps to Set Up the API

### 1. Clone the repository :
```bash
git clone https://github.com/adjisdhani/lara8-auth0-gates.git
```

### 2. Navigate to the project directory:
```bash
cd lara8-auth0-gates
```

### 3. Install dependencies:
```bash
composer install
```
### 4. Set Up Database Connection
Configure your database connection in the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

### 5. Run Migrations
Run the migrations to create the necessary tables, including the `books` and `users` tables:

```bash
php artisan migrate
```

---

### 6. Seed the `books` Table
Use the `BookSeeder` to populate the `books` table with dummy data:

```bash
php artisan db:seed --class=BookSeeder
```

---

### 7. Seed the `users` Table
Use the `UserSeeder` to create two users:
- **User 1**: Can only view books.
- **User 2**: Can perform CRUD operations on books.

Run the seeder:

```bash
php artisan db:seed --class=UserSeeder
```

---

### 8. Login to Obtain a Token
Send a POST request to the `api/login` endpoint to log in. Use raw JSON in the request body:

```json
{
  "email": "user_email",
  "password": "user_password"
}
```

If the login is successful, the response will include an `auth_token`. Copy this token for future requests.

---

### 9. Access API Endpoints
Use the token obtained in Step 5 to access protected API endpoints. Include the token in the **Authorization** header with the format `Bearer <token>`.

#### Example: Check Access to `/api/books`
Send a GET request to `api/books` with the token:

**Header:**
```
Authorization: Bearer <token>
```

- If the request succeeds, you will receive a list of books.
- If the response status is `401`, the user does not have permission to access the endpoint.

---

### 10. Authorization Rules
- Only **User ID 2** can perform CRUD operations on books.
- **User ID 1** can only view book data.

---

### 11. Review API Routes
API routes can be found in the `routes/api.php` file:

```php
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/books', [BookController::class, 'index']);
    Route::post('/books', [BookController::class, 'store']);
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);
});
```

---

### 12. Publish Sanctum Configuration
Ensure Laravel Sanctum is properly set up by running the following command:

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

---

### 13. Completion
Your API is now ready to use! You can:
1. Log in to obtain a token.
2. Use the token to access and test the protected endpoints.
3. Verify the authorization logic based on the user role.

---

## Notes
- Ensure Sanctum is installed: `composer require laravel/sanctum`
- Test your API using tools like Postman or cURL.
- Follow the Laravel documentation for advanced configurations and additional features.

