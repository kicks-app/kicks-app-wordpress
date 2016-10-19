kicks-app-wordpress
===================

> Wordpress development stack


## Install

Install Composer

```php
php -r "readfile('https://getcomposer.org/installer');" | php
```

Install dependencies

```php
php composer.phar install
```

## Development


### Configuration


KicksApp-Wordpress is configured by Environment Variables.

In a local environment, [phpdotenv](https://github.com/vlucas/phpdotenv) makes it easy to inject parameters from a text file.  
Note that it is not recommended to use .env-files in production. 

Move to your project directory and rename `.env-sample` to `.env` and edit settings:

```ini
DB_HOST="localhost"
DB_NAME="example"
DB_USER="root"
DB_PASSWORD="root"
```

Don't miss to create the corresponding database on your local mysql-server.


### Testing

If you installed your project under the document root of your local Apache environment, you're done.

In practice, the most comfortable approach is to serve the project directly from your workspace and access via a local domain. 
To get this working, you need to create a virtual host that points to your project directory.  

#### Add a local dns entry

Make the machine aware of your project's domain name by adding it to your system's hosts file. 

##### Using hostile to edit hosts
A convenient way to do this, is to utilize a nifty [node](https://nodejs.org)-based tool called [hostile](https://www.npmjs.com/package/hostile). 

Install hostile via npm:

```cli
npm install hostile
```

Note that modifying the hosts file requires root privileges, so you may need to prepend `sudo`.
Add your project's domain to the list of hosts via command line:

```cli
sudo hostile set 127.0.0.1 example.local
```

##### Manually editing hosts
Otherwise, if you don't like to use hostile, you can take the conventional way by manually editing the hosts-file. See [here](https://www.captiga.com/tips-tricks/edit-hosts-file-mac-windows/) for a quick reference on how to achieve this for your platform

It should look something like this:

```ini
127.0.0.1 localhost
255.255.255.255 broadcasthost
127.0.0.1 example.local
```

#### Add a virtual host

Open `conf/extra/vhost.conf` from your Apache home directory and add a virtual host as follows:

```ini
<VirtualHost *:80>
    ServerAdmin webmaster@example.local
    DocumentRoot "/path/to/project/"
    ServerName example.local
    AccessFileName .htaccess  
	<Directory "/path/to/project/">
        Options FollowSymLinks
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
```

Restart Apache for the changes to take effect.

You're now ready to visit your project at `http://example.local`.


### Themes & Plugins

Already contained is a Bootstrap-based Starter Template. See [here](./wp-content/themes/kicks-app/README.md) for further details.

Thanks to Composer and [Wordpress Packagist](https://wpackagist.org/) you can simply require any registered Wordpress Themes or Plugins from the command line:

```cli
php composer.phar require wpackagist/twentysixteen
``` 
