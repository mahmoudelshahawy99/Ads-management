# Ads-management

##Prerequisites :

- you will need web server like XAMPP (try to install a new version because I'm using Laravel v8.83.23 ) .

- source code editor like visula studio code .

- API platform like Postman to test apis .

##Setup :

- Download application files folder .

- need to make new database with the name you prefer and edit database name, username and password in .env file using 'mysql' or you can use the default application with databse name 'ads_management' and username 'root' with null password .

- you need to migrate tables to databse using : 'php artisan migrate' but it maybe fails due to relations between tables so you will remove the tables from database and rewrite the command again to make all migrations ready .

- you need to seed tables with data with this command 'php artisan db:seed' .

- you need mail server data to test the schedule daily mail or you can use your gmail by configuring some security settings in our Gmail account. To do that, log in to Gmail and select "Manage your Google Account" from the profile the go to Security then app passwords to get password to test and you will put add these lines in .env file as below :

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=<Enter your Gmail address>
MAIL_PASSWORD=<Enter your Gmail password>
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=<Enter your Gmail address>
MAIL_FROM_NAME="${APP_NAME}"

then you need to run this command to run the schedule daily mail 'php artisan schedule:run' .

- you will find json file for the collection of apis to test them .
