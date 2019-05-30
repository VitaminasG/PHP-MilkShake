# PHP - vanilla milkshake.

Hi! It's a mini PHP, MySQL and ~~JavasScript~~ CMS which provides
 simple MVC functionality. Current state is unfinished and will be updated 
 constantly.
 
## Requirements

Some parts of the code is using php 7.2v syntax and will be not executed
 by your local compiler if you have lower php version installed on your 
 machine. One of the features was used like 
 [Scalar type declarations](https://php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op)
 and other things which I don't remember  :sweat_smile: . So strongly advise to use newest
  stable version of PHP which during this development is [7.2](https://www.php.net/downloads.php) 

### What you need run this code...
1. Server running on Apache 2.0^.
2. Composer
3. php - 7.2^

#### optional

1. xdebug - [xdebug](https://xdebug.org/)

## Apache Server

Well... this is quite big topic. I don't want to start giving you misleading instructions.
 The reasons are that your machine is running on the different set-up and you will be disappointed
 on the documentation I had given to you. However, if your local machine is set up properly
 and you know what you expecting, just leave .htaccess file as it is. This project is developed
 on Apache2 and __not__ designed for nginx.
 
 Some of you may experience 
 problems to handle the logs/error.log and letting the index.php to be executed. It just your
 server not letting to do this. 
 
## Database

You will find MySQL Database structure inside 'src/Database/Database.sql'.
You will need to copy and paste in to your MySQL console same code lines
 from Database.sql dump file to be able replicate the my DB structure. 
To make a Database connection, you will need to update a config.php file
inside the root folder directory with your details.

## Class imports

Current state of the project partial using a Composer Autoload. You will need to dig inside
 on a root __DIR__ and edit composer.json file to get desirable result.
