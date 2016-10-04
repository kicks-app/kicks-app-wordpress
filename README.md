kicks-app-wordpress
===================

> Wordpress development stack


## Install

Install composer

```php
php -r "readfile('https://getcomposer.org/installer');" | php
```

Install dependencies

```php
php composer.phar install
```

## Development

### Configuration

Rename `.env-sample` to `.env` and edit settings:

```ini
DB_HOST="localhost"
DB_NAME="kicks-app"
DB_USER="root"
DB_PASSWORD="root"
```

### Create a local dns entry

### Create a virtual host for local testing and restart apache

```
<VirtualHost *:80>
    ServerAdmin webmaster@example.local
    DocumentRoot "/Users/username/Documents/example/"
    ServerName example.local
    AccessFileName .htaccess  
	<Directory "/Users/username/Documents/example/">
        Options FollowSymLinks
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
```

