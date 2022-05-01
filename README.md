## BingHR

A simple crud Web App built with Vue 3 and Laravel 8 to complete the BingHR Assesment.


> I used Vue for the frondend instead of the required jQuery because of its data driven approach to reactivity like other mordern Javascript Frameworks. This reduces the need for hunting(traversing) and mainpuating the DOM to acheive interativity.<br/> 
> I 've also opted to expose the backend via a Restful API as this decouples the backend from the frontend and allows easier intergration of other User interfaces such mobile apps, IOT devices and other applicable  devices.

The main entity is the app is ```Users```

The web app allows you to:
- Add Users
- Update Users
- Delete Users
- Assign roles(Job titles) to users
- Assign Permissions to users. (Permissions also have variabe actions they can perform (like privileges)

## Installation

1. Clone the project by running ```git clone git@github.com:seewhy17/BingHR.git``` or ```git clone https://github.com/seewhy17/BingHR.git``` from your CLI of choice.
2. Run ```cd BingHR``` to change into the project's directory
3. Run ```composer install``` to install all php dependencies
4. create an ```.env``` *environment file* file at the root directory and copy the contents of ```.env.example``` into it, alternatively  you can run ```cp .env.example .env``` from the CLI
5. change all DB_~ configurations in the newly created .env file to the required values for your machine
6. Create a database with the value of the ```DB_DATABASE``` environment variable as the database name.
7. Run ```php artisan migrate:fresh --seed``` in you CLI to seed the database with sample users, roles and permissions
8. (Optional) Use ```BingHR``` directory as the DocumentRoot of the virtual host (http://binghr.test) if you setup Virtual Hosts
9. Run ```npm install``` to intall all javascript dependencies.
10. Run ```php artisan key:generate``` to generate an encryption key for the application
11. Run ```npm run dev``` to compile all frontend assets.
12. run ``` php artisan serve``` to start the application.

## Final Notes
- The hamburger(menu) icon on the bottom-left expands or collapses the menu
- The permission rights at the bottom of each modal are submitted as soon as the checkboxes are checked or unchecked, the submit button submits the form above it.
- The permissions and associated privilages are also global (permission privilages are shared across all users with the same permission).
