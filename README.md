# Publicaciones

# Application Installation

1. **Download or clone the application** from the link: [https://github.com/luisbaquiax/publicaciones](https://github.com/luisbaquiax/publicaciones)
2. **Clone the project**: to clone the project, select a directory to clone it into and optionally create a folder to store the source code.
   - **On Windows**  
     Run:  
     ```bash
     git clone https://github.com/luisbaquiax/publicaciones.git
     ```
   - **On Linux**  
     Run:  
     ```bash
     git clone git@github.com:luisbaquiax/publicaciones.git
     ```

# Start the Application

1. **Using Laravel's development server**  
   In the main application folder `publicacion-app`, run:
   ```bash
   php artisan serve

This command starts a local web server without needing a full web server setup like Apache or another. Then, use the following URL to load the application: http://127.0.0.1:8000/

1. **Using Apache Server of Xampp**  

Place Your Project in `htdocs`

Start Apache of Xampp

Open the Application in the Browser

- Open your browser and enter the URL: [http://localhost/publicacion-app/public](http://localhost/publicacion-app/public). This should load the Laravel application.


# Installing Laravel on Linux (requerimientos)

This guide provides step-by-step instructions for installing Laravel on a Linux system.

## Requirements

- PHP (XAMPP recommended)

## Installation Steps

### 1. Install PHP

It's recommended to install PHP using XAMPP. Follow the XAMPP installation guide for Linux.

### 2. Install Composer

#### Local Installation

Run the following commands in your terminal:

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a4362d6ab52d03636224661d6bfe5c1767ee07f12a79e52bbd095773aaab16a95e0b2a7d6cbb9e5d92baae4bcd1f9') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

#### Global Installation

After local installation, move Composer to a global location:

```bash
sudo mv composer.phar /usr/local/bin/composer
```

#### Verify Composer Installation

```bash
composer -v
```

### 3. Install Laravel

```bash
composer global require laravel/installer
```

### 4. Add Composer to System Path

1. Open the bashrc file:
   ```bash
   nano ~/.bashrc
   ```

2. Add the following line at the end of the file:
   ```bash
   export PATH="$HOME/.composer/vendor/bin:$PATH"
   ```

3. Save and apply changes:
   ```bash
   source ~/.bashrc
   ```

4. Verify Laravel installation:
   ```bash
   laravel
   ```

## Creating a New Laravel Project

### Option 1: Using Laravel Installer

```bash
laravel new name_proyect
```

### Option 2: Using Composer

```bash
composer create-project laravel/laravel name_proyect
```

## Starting the Development Server

Navigate to your project directory and run:

```bash
php artisan serve
```
```bash
php artisan serve -O
```

This will start Laravel's local development server using Laravel Artisan's serve command.

---

Congratulations! You have successfully installed Laravel on your Linux system and created your first project.
