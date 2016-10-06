Yii 2 Basic Project Template 
============================

LIST PLUGIN INCLUDED
--------------------

#backend
- Extend Gii : mootensai/yii2-enhanced-gii
- User Management : cinghie/yii2-user-extended
- Kartik Tree : kartik-v/yii2-tree-manager
- Kartik Date  : kartik-v/yii2-datecontrol
- MDM Upload : mdmsoft/yii2-upload-file
- Yii Imagine : yiisoft/yii2-imagine
- Custom Notif : loveorigami/yii2-notification-wrapper

#frontend
- Custom Notif : bower-asset/noty
- Bootstrap SASS : bower-asset/bootstrap-sass
- Gentelella : bower-asset/gentelella
- FontAwesome : bower-asset/font-awesome

#Server Management Asset
- NPM
- GULP
- WebPack
- BrowserSync

REQUIREMENTS
------------

- The minimum requirement by this project template that your Web server supports PHP 5.4.0.
- NodeJs latest installed
- Gulp Cli Installed
- WebPack Installed

INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded from [github.com/picobug/picoyii_basic](https://github.com/picobug/picoyii_basic/archive/master.zip) to
a directory named `picoyii_basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

Open Terminal / Command Line and go to root web directory, type this
```
$ composer install && npm install
```

Create empty table, and ncofigure in `config/db.php`. Run migration for activate User Management

### 1. Update yii2 user database schema
```
$ php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
```

### 2. Add Yii2 RBAC migrations 
```
$ php yii migrate/up --migrationPath=@yii/rbac/migrations
```

### 3. Update yii2 user extended database schema

```
$ php yii migrate/up --migrationPath=@vendor/cinghie/yii2-user-extended/migrations
```

### 4. Add Image Upload database schema

```
$ php yii migrate --migrationPath=@mdm/upload/migrations
```

You can then access the application through the following URL:

webserver
~~~
http://localhost/picoyii_basic/web/
~~~

browsersync
~~~
http://localhost:3000/picoyii_basic/web/
~~~


# picoyii_basic
Yii2 Basic with Gulp Manajemen Asset and Related Plugin User Management

Created by @picobug
