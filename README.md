# Blog Post

A simple and elegant **Laravel blog application** to create, read, update, and delete blog posts. This project is perfect for learning Laravel's core features like routing, models, controllers, authentication, and Blade templates. It also includes an **Admin Panel** where administrators can manage users, posts, categories, and comments, providing full control over the blog content and user permissions.

## Table of Contents

- [About](#about)  
- [Features](#features)  
- [Tech Stack](#tech-stack)  
- [Installation](#installation)  
- [Environment Setup](#environment-setup)  
- [Database](#database)  
- [Build & Run](#build--run)  
- [Usage](#usage)
- [Contributing](#contributing)  
- [Contact](#contact)  

## About

This is a basic **blog application** built with **Laravel**. Users can register, login, and manage blog posts. It demonstrates common web development tasks including CRUD operations, authentication, and file uploads.

## Features

- **User Authentication**: Register, login, logout  
- **Create, Read, Update, Delete Posts** (CRUD)  
- **Post Categories / Tags** 
- **Rich Text or Markdown Editor** for posts  
- **Image Uploads** for posts / profile picture
- **Comments** on posts 
- **Search Functionality** to find posts  
- **Pagination** for listing posts  
- **Responsive UI** compatible with mobile devices  
- **Admin Dashboard** to manage posts, category and users 
- **SEO Friendly URLs** with slugs  
- **Timestamps** for posts (`created_at` and `updated_at`)  
- **Validation & Security** using Laravel built-in features  

## Tech Stack

- **Backend**: Laravel (PHP)  
- **Frontend**: Blade Templates, Tailwind CSS / Bootstrap  
- **Database**: MySQL / SQLite / PostgreSQL  
- **Build Tools**: Vite / Mix  


## Installation

1. Clone the repository:
```
git clone https://github.com/manchuriqbal/blog-post.git
cd blog-post
```
2. Install PHP dependencies:
```
composer install
```
3. Install JavaScript dependencies:
```
npm install
# or
yarn install
```
## Environment Setup
1. Copy .env.example to .env:

```
cp .env.example .env
```
2. Set environment variables in .env:
```
APP_NAME=BlogPost
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_post
DB_USERNAME=root
DB_PASSWORD=
```
3. Generate application key:

```
php artisan key:generate
```
## Database
Run migrations:

```
php artisan migrate
```
Seed the database:

```
php artisan db:seed
```
## Build & Run
  
Build frontend & Start the development server:
```
Composer Run dev
```
Build frontend assets:

```
npm run dev
# or
yarn dev
```
Start the development server:

```
php artisan serve
```

Visit http://localhost:8000 to access the application.

## Usage
- Create a Post: Log in → New Post → Fill title, content, optionally upload image → Save / Publish
- Edit / Delete Post: Navigate to your post → Edit or Delete
- View Posts: Homepage lists all posts with pagination
- Search Posts: Use search bar to find posts
- Commenting: Add comments under posts (if implemented)
- Categories / Tags: Filter posts by categories or tags


## Contributing
- Fork the repository
- Create a branch (feature/my-feature)
- Make changes
- Add tests and documentation
- Submit a pull request


## Contact
- Author: Manchur Iqbal
- GitHub: [manchuriqbal](https://github.com/manchuriqbal)

Email: manchur.fiverr@gmail.com
