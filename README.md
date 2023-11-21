# Laravel + Service Pattern + DTOs

## Overview

This repository showcases a Laravel project implementing the Service Pattern along with Data Transfer Objects (DTOs) for handling blog-related operations. The primary goal is to demonstrate a clean and maintainable architecture by separating concerns and promoting reusability.

## Components

### Blog Controller

The `BlogController` is responsible for handling HTTP requests and interacting with the `BlogService`. It uses the Service Pattern to encapsulate business logic and delegates data handling to the `BlogDto`.

#### Methods:

- **store(BlogRequest $request): BlogResource**
  - Responsible for storing a new blog post.
  - Utilizes the `BlogDto` to extract and validate data from the incoming `BlogRequest`.
  - Returns a `BlogResource` representing the newly created blog.

- **update(BlogRequest $request, Blog $blog): BlogResource**
  - Handles updating an existing blog post.
  - Utilizes the `BlogDto` to extract and validate data from the incoming `BlogRequest`.
  - Returns a `BlogResource` representing the updated blog.

### Blog Service

The `BlogService` encapsulates the business logic related to blog operations. It is responsible for interacting with the database and handling the storage and updating of blog posts.

#### Methods:

- **store(BlogDto $dto): Blog**
  - Creates a new blog post using the provided `BlogDto`.
  - Returns the created `Blog` instance.

- **update(Blog $blog, BlogDto $dto): Blog**
  - Updates an existing blog post with data from the provided `BlogDto`.
  - Returns the updated `Blog` instance.

### Blog DTO

The `BlogDto` (Data Transfer Object) is responsible for encapsulating and transferring data between different layers of the application. It is used to validate and structure incoming data from various sources.

#### Properties:

- **title (string):** The title of the blog post.
- **body (string):** The body/content of the blog post.
- **source (BlogSource):** An enum representing the source of the blog post (App or Api).

#### Methods:

- **fromAppRequest(AppBlogRequest $request): BlogDto**
  - Creates a `BlogDto` instance from an application-level request (`AppBlogRequest`).
  
- **fromApiRequest(ApiBlogRequest $request): BlogDto**
  - Creates a `BlogDto` instance from an API-level request (`ApiBlogRequest`).

## Usage

To use this architecture as a foundation for your Laravel projects, follow these steps:

1. **Controller:**
   - Create a controller that extends the base controller and injects your service.

2. **Service:**
   - Implement your business logic within a service class.

3. **DTO:**
   - Define DTOs to encapsulate and validate data transfer between layers.

4. **Routes:**
   - Define routes in your `web.php` or `api.php` file to map HTTP requests to controller methods.

## Example:

```php
use App\Http\Controllers\BlogController;

// Define routes for blog operations
Route::post('/blogs', [BlogController::class, 'store']);
Route::put('/blogs/{blog}', [BlogController::class, 'update']);
```

## Note

Ensure you have the necessary dependencies installed and configured, and the database is set up correctly. This repository serves as a guide and starting point for developing scalable and maintainable Laravel applications using the Service Pattern and DTOs. Feel free to customize and expand upon this foundation based on your specific project requirements.
