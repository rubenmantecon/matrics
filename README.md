# Matrics
A Laravel web app for handling our very own school's enrollments. A good amount of AJAX and jQuery to give it a SPA-ish feeling
    

## Instalation
- ```git clone https://github.com/AWS2/matrics.git```
- ```npm run init-load```
- ```cp .env.example .env```
- ```php artisan key:generate```
- `npm start` OR `php artisan serve`


## Load Dependencies
``` npm run init-load ```

If this command fails, delete `composer.lock` and try again

## Start Project
`npm start` OR `php artisan serve`

## Features
- Can CRUD users and admins
- Can import data from a CS, to load into the app
- Social login
- Live reload of tables upon change, via AJAX

### Generate Admin Account
For a quick admin account just run the next command in the instalation folder:
- ```php artisan createadmin```


