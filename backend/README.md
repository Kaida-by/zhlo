TEST PROJ

RUN:

1) composer install
2) php artisan key:generate
3) change .env:
   
   DB_CONNECTION=mysql
   
   DB_HOST=db
   
   DB_PORT=3306
   
   DB_DATABASE=zhlo
   
   DB_USERNAME=name
   
   DB_PASSWORD=pass
   
3) php artisan migrate:fresh --seed
