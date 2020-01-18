# Laravel Todo 

## What You Will Learn In This Series

- Installing and Setting up Laravel Locally.
- Models, Views, and Controllers (MVC).
- Database, Migrations, and Eloquent ORM.
- Authentication, Email Verification, and Password Reset.
- Eloquent Relationships and Image Upload.

## Requirements
- PHP 7.2 or higher
- MySQL
- Composer

## MVC
Model–view–controller is a software design pattern commonly used for developing user interfaces which divides the related program logic into three interconnected elements. This is done to separate internal representations of information from the ways information is presented to and accepted from the user. [Wikipedia](https://en.wikipedia.org/wiki/Model–view–controller)


## Installation

```bash
composer create-project --prefer-dist laravel/laravel todo "5.8.*"
```

## Creating Controller

To create controller use bellow command

```bash
php artisan make:controller [ControllerName]
```



You can also create controller class inside any browser using forward slash e.g.

```bash
php artisan make:controller Auth/UserController
```

## Route List

To see all available routes you have created in web.php or api.php routes you can use below command:

```bash
php artisan route:list
```

