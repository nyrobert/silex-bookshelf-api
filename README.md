# Silex Bookshelf API

## Requirements

* [PHP](http://php.net) >= 5.4
* [MySQL](http://www.mysql.com)

## Installation

1. Install Composer in the project directory:
  
  ```shell
  curl -sS https://getcomposer.org/installer | php
  ```
2. Download PHP dependencies via Composer:
  
  ```shell
  php composer.phar install
  ```
3. Set required environment variables:

  * `MYSQL_HOST`
  * `MYSQL_USERNAME`
  * `MYSQL_PASSWORD`

4. Import database schema:

  ```shell
  mysql -u MYSQL_USERNAME -p < sql/schema.sql
  ```

## Features

This demo API was built for testing the latest [Silex](http://silex.sensiolabs.org/) features,
REST best practices and recommendations.

## Testing

Run PHPUnit from the command line:

 ```shell
  vendor/bin/phpunit
  ```

## License

This project is licensed under the terms of the [MIT License (MIT)](LICENSE).
