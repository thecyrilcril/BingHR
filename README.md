## BingHR

A simple crud Web app built with Vue 3 and Laravel 8 to complete the BingHR Assesment.


> I used Vue instead of the required jQuery because its the data driven approve to reactivity like other mordern Javascript Frameworks.

The main entity is ```Users```

The web app allows you:
- Add Users
- Update Users
- and Delete Users
- Users have roles which are a Job titles
- Users also have Permissions, which in turn has actions (rights)

## Installation

1. Clone Project by running ```git clone git@github.com:seewhy17/BingHR.git``` or ```git clone https://github.com/seewhy17/BingHR.git```
2. Change into the directory ```cd BingHR```
3. run ```composer install```
4. create an ```.env``` file in the root directory and copy the contents of ```.env.example``` into it, alternatively run ```cp .env.example .env``` from your CLI
5. change all DB_~ configurations in the newly created .env file to the required values for your machine
6. Create a database with the value of ```DB_DATABASE``` environment variable(.env) as its name.
7. run ```php artisan migrate:fresh --seed``` in you CLI
8. (Optional) Use ```BingHR``` directory as the DocumentRoot of the virtual host(http://binghr.test)
9. run ```npm install``` to intall all javascript dependencies.
10. run ```php artisan key:generate```
11. run ```npm run dev``` to compile all your assets.
12. run ``` php artisan serve``` to start the application.

## Final Notes
- The hamburger(menu) icon in the bottom-left expands or collapses the menu
- The permission rights at the bottom each forms are submitted as soon as the check boxes are checked or unchecked, the submit buttons only submit the form above it.
- The permission / Rights association are also global as permissions are shared across multiple users.
