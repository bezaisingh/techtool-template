# techtool-template

#The original template on github is given below.
https://github.com/TechTool-India/techtool-laravel-admin

The password to Login is firstname@phonenumber
    eg:
        
        Username: bijay611@gmail.com
        Password: Bijay@9401379674

        Username: admin@admin.com
        Password: Admin@123#

 
Note:

1. In add details 3% of basic pay to be auto fetched and current basic must be auto calculated
2. Show all data in User list
3. Add account details datda must be saved in dadtabase corresponding to the main user added in add details.
4. Make seperate page fore loan data
5. Make database entry for compulsory data to be entered
6. Add designation field to the Add User page
7. Total will be auto fetched for the comulsory deposit section according to the photo.


05-09-2022
1. Add Account details 
    a. Date column --DONE
    b. CD must be 5% of Basic Salary -- DONE
    d. addition of the data -- DONE
2. Loan Data Connection with user. --DONE

3. Add Accoount details , DOJ in Society in user addition page--Done


06-09-2022
1. New User dashboard needs to be created so that individual can login and see only his details.

07-09-2022
1. Data needs to be displayed in admin panel.



*************************************************************************************************************

Tech-Admin | Laravel 8 + Bootstrap 4
Tech-Admin is Admin Panel With Preset of Roles, Permissions, ACL, User Management, Profile Management.

Features
Mobile Responsive Bootstrap 4 Design
User Management with Roles
Role Management
Permissions Management
Access Control List (ACL)
Laravel 8 + Bootstrap 4
Tech Stack
Client: HTML, CSS, JavaScript, jQuery, VueJs, Bootstrap 4

Server: PHP, Laravel 8

DataBase: MySql

Installation
Install Tech-Admin With Simple Steps

git clone https://github.com/TechTool-India/techtool-laravel-admin.git
cd techtool-laravel-admin
Install All Packages of laravel

composer install
Install NPM Dependencies

npm install && npm run dev
Create .env file

cp .env.example .env
Generate Application key

php artisan key:generate
Update .env File with Database credentials and run migration with seed.

php artisan migrate --seed
All Set ! now serve laravel app on local and open app in browser.

Login With Admin

Username - admin@admin.com
Password - Admin@123#