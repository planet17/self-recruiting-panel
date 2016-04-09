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
[Back to Contents](#contents)


      home/                 contains all main work code what you can not get outer from server.
      home/apps/            contains all application.
      home/myLittleHelper/  contains my little script what helps me write configuration for Application
      home/yii2/            contains yii2-framework and composer for update.
      home/yii2/vendor      contains yii2-frameworks dependent 3rd-party packages.
      www/                  contains the entry script and Web resources      


APPLICATION STRUCTURES
-------------------
[Back to Contents](#contents)
    
For details about structure into application better look any [Yii2 doc](http://yiiframework.domain-na.me/doc/guide/2.0/ru "Yii2 docs at Russian Language")


REQUIREMENTS
------------
[Back to Contents](#contents)

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION:
------------
1. [Create project's dir](#1-create-a-dir)
2. [Get project by composer](#2-get-project-by-composer)
3. [Install VENDOR by composer](#3-install-vendor-by-composer)
4. [Create log files (optional)](#4-create-log-files-optional)
5. [Prepare server](#5-prepare-server)

[Back to Contents](#contents)


### 1) Create a dir.
Create a dir where you want to create that project, on your taste.

### 2) Get project by composer.
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
Create files for logs [optional - if you don't need this you can skip this step]
You can create dir and files using the following command:

~~~
$ mkdir log
$ touch log/access.log|touch log/error.log
~~~


### 5) Prepare server.
Prepare your server. Add domain to your host. I run my app at my local.
I use it at my:

~~~
Ubuntu
Server an Apache >= 2.4 or Nginx >= 1.4
PHP >= 5.6
~~~

So as example add domain to my hosts:



127.0.0.1	http://[domain.name]

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

Now you should be able to access the application through the following URL, assuming your server webroot is pointed to
`www` directory.

~~~
http://[domain.name]/
~~~

///////////////////////////////////////////////////////////////////////////////

If you want change the name of directory application, its okay. Then you need
1) Rename your directory in the /home/apps/[my_app_name]
2) Change composer json so you need go:
extra > yii\\composer\\Installer::postCreateProject > setPermission & generateCookieValidationKey
and set new path at that

1) Rename your directory
2) Change composer json so you need go:
extra > yii\\composer\\Installer::postCreateProject > setPermission & generateCookieValidationKey
and set new path at that


~~~
$ composer -d=home/yii2 create-project --prefer-dist --stability=dev samdark/yii2-minimal .
$ composer -d=home/yii2 install
$ composer -d=home/yii2 update
~~~

Now setting of permission don\'t work automatically, so you need using the following command:

~~~
chmod 777 home/apps/my_yii2_application/runtime | chmod 777 home/apps/my_yii2_application/runtime
chmod 777 www/demo/sign-up/assets
chmod 777 www/demo/sign-in/assets
~~~


CONFIGURATION
-------------
[Back to Contents](#contents)

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

**NOTES FROM ME:**
- All command work relatively to root-dir of project. I usually use terminal into my IDE, so I don't need to write a full path.
- Into the apps only one application don't use the database. It is SamDark/Minimal 


**NOTES FROM Sam Dark (Yii2):**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.


Future changes
================================
[Back to Contents](#contents)

1) I want do and very little module with my own helper, so I will remove myLittleHelper and do that like a 3rd party
into yii2/vendor, and that actually will req. for composer.


================================
[Back to Top](#self-recruiting-panel)