ZB UTILS
======

Introduction
------------

This module provides common utils for projects based on [Zend Framework 2](https://github.com/zendframework/zf2), [Doctrine 2](https://github.com/doctrine/doctrine2) and [ZF Apigility](https://github.com/zfcampus/zf-apigility).

Requirements
------------
  
Please see the [composer.json](composer.json) file.

Installation
------------

Manually add the following to your `composer.json`, in the `require` section:

```javascript
"require": {
    "zbmodules/zb-utils": "~0.1.0-dev"
}
```

Do not forget to add the following to `repositories` section:

```javascript
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/bvoronov/zb-utils"
    }
]
```

And then run `composer update` to ensure the module is installed.

Finally, add the module name to your project's `config/application.config.php` under the `modules`
key:

```php
return array(
    /* ... */
    'modules' => array(
        /* ... */
        'ZB\Utils',
    ),
    /* ... */
);
```

Configuration
=============
