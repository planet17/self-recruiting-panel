Self Recruiting Panel
================================

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

[>> back to contents](#contents)


### 1) Create a dir.
[>> back to installation](#installation)

Create a dir where you want to create that project, on your taste.

### 2) Get project by composer.
[>> back to installation](#installation)

Use composer for get project. If you do not have [Composer](http://getcomposer.org/), you may install it by following
instructions at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this application template using the following commands:

Following command uses only one time:

~~~
$ php composer global require "fxp/composer-asset-plugin:~1.1.0"
~~~

Following commands get project to your PC:

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

* - About add an ErrorLog and CustomLog is optional, so if you don't create logs dir above...

I use single file for all my setting of apache. I almost sure what you use other way to configuration. So be care,
cause you might to do other actions. But anyway for example (If you need it). I write sets from above to the file from
the following command:

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

~~~
chmod 777 home/apps/my_yii2_application/runtime | chmod 777 home/apps/my_yii2_application/runtime
chmod 777 www/demo/sign-up/assets
chmod 777 www/demo/sign-in/assets
~~~




CONFIGURATION
-------------
[>> back to contents](#contents)

### DATABASE

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2minimal',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

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

~~~
$ sudo chmod -R 755 .
~~~

After used it, you must set permissions (Installation, item 6)

Future changes
================================
[>> back to contents](#contents)

1) This item not from that projects.

================================
[>> back to top](#self-recruiting-panel)