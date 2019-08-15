#a aProj Managera

Project Manager is a project management system.

### Installation

Clone this repo
```sh
git clone https://github.com/LukaszFokin/proj-manager.git
```

Get into cloned folder 
```sh
cd /where/you/cloned
```

Install the project dependencies with composer
```sh
composer update
```

Create an .env file
```sh
cp .env.example .env
```

Locate the code below and changes according to your settings
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Generate a key to laravel application
```sh
php artisan key:generate
```

Run laravel migration to create all schemas
```sh
php artisan migrate
```
