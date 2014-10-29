HamaryuginhMeekroDbBundle
=========================

A symfony2 bundle for [MeekroDB](http://www.meekro.com/index.php).

Installation
------------

Add the bundle to your composer.json

``` json
{
    "require": {
        "...",
        "hamaryuginh/meekrodb-bundle": "dev-master"
    }
}
```

Run composer install

``` sh
php composer.phar install
```

Enable the bundle in the kernel

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Hamaryuginh\MeekroDbBundle\HamaryuginhMeekroDbBundle(),
    );
}
```

Configuration
-------------

Add configuration to config.yml.

``` yaml
# config.yml

hamaryuginh_meekro_db:
    meekrodb:
        connections:
            my_db_host_1:
                host:     database_host # default value is "localhost"
                port:     6666          # default value is 3306
                encoding: utf8          # default value is utf8
                db_name:  database_name
                user:     database_user
                password: user_password # default value is ""
            my_db_host_2: # you can set multiple host
                ...
```

Now you're all set, you can now use the bundle as following:

Use
---

``` php
<?php
// In a controller

$dbManager = $this->get('hamaryuginh.meekro_db');
$myDbHost  = $dbManager->get('my_db_host'); // The name of the connection
$account   = $myDbHost->query("SELECT * FROM accounts WHERE username=%s", 'Joe');
```

