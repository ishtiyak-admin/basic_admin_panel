# Laravel Sample Project Setup
This is laravel basic admin panel setup.

# To use this sample project follow below steps

## 1. Download Zip file or Clone Branch
    To clone Branch - git clone -b Laravel --single-branch https://git.devtechnosys.tech/suvigya/dev_codelibrary.git --depth 1
    followed by username and password

## 2. Copy sample_project folder and paste it to your htdocs and rename it as you require

## 3. Create database in you Phpmyadmin

## 4. Edit project .env file as followed
    Database Configuration
        DB_DATABASE=<your-db-name>
        DB_USERNAME=<your-db-user-name>
        DB_PASSWORD=<your-db-password>
    
    Email Configurations
        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=587
        MAIL_USERNAME=
        MAIL_PASSWORD=
        MAIL_ENCRYPTION=tls

## 5. Open project in terminal / command-prompt
    Run following command
        php artisan db:seed
# You basic admin panel setup has been completed on localhost        
