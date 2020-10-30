//Introduction:
WishList is the internationalised Responsive website which allows user to get registered and login, to make their wish list. 
User will attach a unique integer ID with each wish. Each wish has actions of update, delete and details. 
~Update allows user to update the fulfilled status of the wish.
~Delete simply deleted the user wish from database.
~Details fetch the stored data and display it to the user.
Wislist database has a table 'wishes'
Attributes  are: id, wish, fulfilled, email, created_at and updated_ at.
'id' and user 'email' are used as composite primary key where sser 'email' is the foreign key. 

//Getting started:
1. create the database Wishlist in phpmyadmin.
2. run command: php artisan migrate
3. run command: composer install
4. run command: npm install 
5. run command: npm run dev
6. run command: composer update
7. run command: php artisan serve

//Package for user authentication
Laravel. (n.d.). Authentication Quickstart: Routing. Laravel. https://laravel.com/docs/7.x/authentication
//commands used
composer require laravel/ui:^2.4
php artisan ui vue --auth
//Package for css
Bootstrap. (2014). sb admin 2. Start Bootstrap. https://startbootstrap.com/themes/sb-admin-2/

