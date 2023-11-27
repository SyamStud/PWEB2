# PHP MVC POC

This project aims to implement the Model-View-Controller (MVC) architecture in PHP using a simple and uncomplicated approach.

## Instructions

### Running

To run this app, follow this steps below.

1. First, open your terminal and cd into app directory.

   ```
   cd php-mvc-poc
   ```

   Before running the app, make sure to run `php preparedb.php` command in order to setup database.

2. Start PHP Built-in web server.

   ```
   php -S 127.0.0.1:8000 index.php
   ```

   The `-S` option is to specify the server host and the `index.php` argument is to specify the file router script. For further references, please see this documentation https://www.php.net/manual/en/features.commandline.webserver.php.

3. Open http://localhost:8000 on your browser.

## Knowledges

- https://github.com/Raindal/php_mvc
- https://github.com/haruaki07/php-mvc
- https://symfony.com/doc/current/introduction/from_flat_php_to_symfony.html
