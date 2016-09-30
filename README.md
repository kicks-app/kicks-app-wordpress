kicks-app-wordpress
===================

> Wordpress development stack


## Install

Install composer

```php
php -r "readfile('https://getcomposer.org/installer');" | php
```

## Development

### Create a virtual host for local testing

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

### Local configuration

Rename `.env-sample` to `.env` and edit settings

