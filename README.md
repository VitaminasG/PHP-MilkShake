# PHP - vanilla milkshake.

Hi! It's a mini PHP, MySQL and ~~JavasScript~~ CMS which provides
 simple MVC functionality. Current state is unfinished and will be updated 
 constantly.
 
## Database

You will find MySQL Database structure inside 'src/Database/Database.sql'.
You will need to copy and paste in to your MySQL console same code lines
 from Database.sql dump file to be able replicate the my DB structure. 
To make a Database connection, you will need to update a config.php file
inside the root folder directory with your details.

## Class imports

Current state of the project is not using a Composer Autoload.
 All imports are done with simple require function inside 
 'src/bootstrap.php file. The main index.php file stay as entry point.