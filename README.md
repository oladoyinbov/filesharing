# Foster Framework

Fastvolt is a simple, fast and scalable php web framework used for building web applications.
this framework is best suited for entry-level php developers because of it simplicity.

# Installation
```php
composer require Fastvolt/core
```
✨ **Requirements**:
- [ ] PHP 8.1
- [ ] Mysql (only if needed)
<br>

# Quickstart

### 🖥️ Starting a server

```cmd
php -S localhost:8000 -t Fastvolt/
```
> **NOTE**: `Fastvolt` should be the directory name or folder name where foster framework was installed into.

<br>

 ### 🎇 Simple Hello World
Creating a simple app that returns a response text "hello world" in (***file**: routes/main.route.php*).
<br><br>
```php
use Fastvolt\Router\Route;

Route::get('/', fn() => "hello world");
```

On your browser, input search address `localhost:8000/`, if you installed it correctly, then you should see this output:
```text
Hello World
```
<br>

# Features
PHP has alot of frameworks you choose from, but what exactly made Foster framework more better than them?
- [x] Simple Installation
- [x] Low Learning Curve
- [x] Built-in Simple Http Router
- [x] Middleware
- [x] Max Security
- [x] MVC Architecture
- [x] Less Development Time
- [x] Developer Tool (Automatic Code Generation)
- [x] Templating Engine (Smarty)
