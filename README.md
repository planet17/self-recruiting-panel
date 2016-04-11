Self Recruiting Panel
================================

This is my pet project.
Project based at [Yii2 Minimal](https://github.com/samdark/yii2-minimal "Yii2 Minimal from Yii2 developer")


Contents:
-------------------
1. [PROJECT STRUCTURE](#my-project-structure-general)
2. [APPLICATION STRUCTURE](#application-structure)
3. [REQUIREMENTS](#requirements)
4. [INSTALLATION](#installation)
    1. [Create project's dir](#1-create-a-dir)
    2. [Get project by composer](#2-get-project-by-composer)
    3. [Install VENDOR by composer](#3-install-vendor-by-composer)
    4. [Create log files (optional)](#4-create-log-files-optional)
    5. [Prepare server](#5-prepare-server)    
    6. [Set permissions](#6-set-permissions)
    7. [Create database](#7-create-database)
5. [CONFIGURATION](#configuration)
    1. [Configuration of Database](#database)
6. [Future changes](#future-changes)


MY PROJECT STRUCTURE (general)
-------------------
[>> back to contents](#contents)


      home/                 contains all main work code what you can not get outer from server.
      home/apps/            contains all application.
      home/myLittleHelper/  contains my little script what helps me write configuration for Application
      home/yii2/            contains yii2-framework and composer for update.
      home/yii2/vendor      contains yii2-frameworks dependent 3rd-party packages.
      www/                  contains the entry script and Web resources      


APPLICATION STRUCTURES
-------------------
[>> back to contents](#contents)
    
For details about structure into application better look any [Yii2 doc](http://yiiframework.domain-na.me/doc/guide/2.0/ru "Yii2 docs at Russian Language")


REQUIREMENTS
------------
[>> back to contents](#contents)

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION:
------------
1. [Create project's dir](#1-create-a-dir)
2. [Get project by composer](#2-get-project-by-composer)
3. [Install VENDOR by composer](#3-install-vendor-by-composer)
4. [Create log files (optional)](#4-create-log-files-optional)
5. [Prepare server](#5-prepare-server)
6. [Set permissions](#6-set-permissions)
7. [Create database](#7-create-database)

[>> back to contents](#contents)


### 1) Create a dir.
[>> back to installation](#installation)

Create a dir where you want to create that project, on your taste.

### 2) Get project by composer.
[>> back to installation](#installation)

Use composer for get project. If you do not have [Composer](http://getcomposer.org/), you may install it by following
instructions at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this application template using the following commands:

Following command uses only one time, if you does not done that before:

~~~
$ php composer global require "fxp/composer-asset-plugin:~1.1.0"
~~~

Following commands downloading project to your directory:

~~~
$ git init
$ git clone https://github.com/planet17/self-recruiting-panel .
~~~


### 3) Install VENDOR by composer.
[>> back to installation](#installation)

Install vendor or etc. with composer using the following command:


~~~
$ cd home/yii2 
$ php composer install
$ cd ../..
~~~

**NOTES:**
If you get error with fxp like:

~~~
[ReflectionException] - Class Fxp\Composer\AssetPlugin\Repository\NpmRepository does not exist
~~~

Use following command to fix it:

~~~
$ composer global update fxp/composer-asset-plugin --no-plugins
~~~


### 4) Create log files [optional].
[>> back to installation](#installation)

Create files for logs [optional - if you don't need this you can skip this step]
You can create dir and files using the following command:

~~~
$ mkdir log
$ touch log/access.log|touch log/error.log
~~~


### 5) Prepare server.
[>> back to installation](#installation)

Prepare your server. Add domain to your host. I run my app at my local.
I use it at my:

~~~
Ubuntu 14.04.4 LTS
Server an Apache >= 2.4 or Nginx >= 1.4
PHP >= 5.6
~~~

So as example add domain to my hosts:

~~~
127.0.0.1	http://[my.domain.name]
~~~

Use following command:

~~~
$ sudo gedit /etc/hosts 
~~~

b) Example of my settings for Apache2:


```
<VirtualHost 127.0.0.1:80>
	DocumentRoot [path-to-the-dir]/www
		<Directory [path-to-the-dir]/www>
			Options Indexes FollowSymlinks
			AllowOverride All
			Require all granted
		</Directory>
	ErrorLog [path-to-the-dir]/log/error.log
	CustomLog [path-to-the-dir]/log/access.log combined
</VirtualHost>
```


* About add an ErrorLog and CustomLog is optional, so if you don't create logs dir above...

``I use single file for all my setting of apache. I almost sure what you use other way to configuration.
So be care, cause you might to do other actions. But anyway for example (If you need it). I write sets from above
to the file from the following command:``

~~~
$ sudo gedit /etc/apache2/sites-enabled/000-default.conf
~~~

c) And finally for preparing server you can restart it by following command:

~~~
$ sudo service apache2 restart
~~~


### 6) Set permissions.
[>> back to installation](#installation)
Now setting of permission don\'t work automatically, so you need using the following command:

TODO COMPLETE AFTER PROJECT WILL COMPLETELY FINISHED AT STRUCTURE LEVEL
~~~
$ chmod 777 home/apps/common/runtime
$ chmod 777 home/apps/web/runtime
$ chmod 777 home/apps/api/runtime
$ chmod 777 www/assets
~~~


### 7) Create database.
[>> back to installation](#installation)

I create database and user through bash, you can use any other way at your taste.
For example I marked only password but you can change DATABASE NAME and USER too. Any restrictions for that.

Get access to database by following command:

~~~
$ mysql -h localhost -u root -p
~~~

Then into MySql console I use following commands:

```sql
CREATE DATABASE srp_db CHARACTER SET utf8 COLLATE utf8_unicode_ci;
CREATE USER 'srp_manager'@'localhost' IDENTIFIED BY '[your_password]';
GRANT ALL PRIVILEGES ON srp_db . * TO 'srp_manager'@'localhost';
FLUSH PRIVILEGES;
quit
```

TODO that item.

~~~
$ yii migrate
$ yii migrate/up 2
~~~

CONFIGURATION
-------------
[>> back to contents](#contents)

### DATABASE

You need rename file `/home/apps/common/config/db-local.php-dist`, to `php` extension.
Also edit this file with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=srp_db',
    'username' => 'srp_manager',
    'password' => '[your_password]',
    'charset' => 'utf8',
];
```

### ABOUT PREPARING FOR PRODUCTION
- Don't forget that instructions only about development version.
When you need prepare project to PRODUCTION you need changes into `/www/index.php`, just comment following:

```php
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
```

And also you need set-up all other configuration file server-version what you will have:

1. `/home/apps/common/config/db-server.php`



**NOTES:**
- All command work relatively to root-dir of project. I usually use terminal into my IDE, so I don't need to write a full path.
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.

Congratulations
-------------
[>> back to installation](#installation)

Now you should be able to access the application through the following URL, assuming your server webroot is pointed to
`www` directory.

~~~
http://[my.domain.name]/
~~~

**NOTES:**
- If you get an error 403 with htaccess while following URL, it is might be cause you download
project by zip-archive or any other way, what is reason for wrong permission in project.
Following command help you fix it:

```bash
$ find ./ -type f -exec chmod 0644 {} \;
$ find ./ -type d -exec chmod 0755 {} \;
```

After used it, you might be need [set-up permissions](#6-set-permissions) again.


Future changes
================================
[>> back to contents](#contents)

``Look `REQUIREMENTS.md` for that.``

================================
[>> back to top](#self-recruiting-panel)