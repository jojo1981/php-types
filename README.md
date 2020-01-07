PHP types library which contains value classes which represent the php types
=====================

[![Build Status](https://travis-ci.com/jojo1981/php-types.svg?branch=master)](https://travis-ci.com/jojo1981/php-types)
[![Coverage Status](https://coveralls.io/repos/github/jojo1981/php-types/badge.svg)](https://coveralls.io/github/jojo1981/php-types)
[![Latest Stable Version](https://poser.pugx.org/jojo1981/php-types/v/stable)](https://packagist.org/packages/jojo1981/php-types)
[![Total Downloads](https://poser.pugx.org/jojo1981/php-types/downloads)](https://packagist.org/packages/jojo1981/php-types)
[![License](https://poser.pugx.org/jojo1981/php-types/license)](https://packagist.org/packages/jojo1981/php-types)

Author: Joost Nijhuis <[jnijhuis81@gmail.com](mailto:jnijhuis81@gmail.com)>

This library has some value classes which represent a PHP type.  
These value classes can be constructed based on the PHP type name or based on a value.  
There are 2 pseudo type classes: `Jojo1981\PhpTypes\MixedType` and `Jojo1981\PhpTypes\MultiType` which will function as composite.  
Also an abstract factory class is included: `Jojo1981\PhpTypes\AbstractType`.

The following types are supported, with there aliases:

-  array
-  bool (boolean)
-  callable (callback)
-  class
-  float (number, real, double)
-  int (integer)
-  iterable
-  null
-  object
-  resource
-  string (text)
-  void

Pseudo types:

- mixed
- multi

## Installation

### Library

```bash
git clone https://github.com/jojo1981/php-types.git
```

### Composer

[Install PHP Composer](https://getcomposer.org/doc/00-intro.md)

```bash
composer require jojo1981/php-types
```

## Basic usage

```php
<?php

require 'vendor/autoload.php';

$integerType = \Jojo1981\PhpTypes\AbstractType::createFromTypeName('int');
$integerType->isAssignableValue('text'); // will return false
$integerType->isAssignableValue(28); // will return true

$floatType1 = \Jojo1981\PhpTypes\AbstractType::createFromValue(5.0);
$floatType1->isAssignableValue(true); // will return false
$floatType1->isAssignableValue('text'); // will return false
$floatType1->isAssignableValue(10); // will return false
$floatType1->isAssignableValue(10.0); // will return true

$floatType2 = \Jojo1981\PhpTypes\AbstractType::createFromTypeName('number');
$floatType2->isAssignableValue(true); // will return false
$floatType2->isAssignableValue('text'); // will return false
$floatType2->isAssignableValue(1); // will return false
$floatType2->isAssignableValue(1.0); // will return true

$stringType = \Jojo1981\PhpTypes\AbstractType::createFromValue('string');
$stringType->isAssignableValue(true); // will return false
$stringType->isAssignableValue('text'); // will return true

// Other types: array, bool, callable, iterable, null, resource, void

// Object | Class types

$objectType = \Jojo1981\PhpTypes\AbstractType::createFromTypeName('object');
$objectType->isAssignableValue(true); // will return false
$objectType->isAssignableValue(new \stdClass()); // will return true
$objectType->isAssignableValue(new \Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity()); // will return true (for all object types)

$classType1 = \Jojo1981\PhpTypes\AbstractType::createFromValue(new \Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity());
$classType1->isAssignableValue(new \stdClass()); // will return false
$classType1->isAssignableValue(new \Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity()); // will return true

$classType2 = \Jojo1981\PhpTypes\AbstractType::createFromTypeName(\Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity::class);
$classType2->isAssignableValue(new \stdClass()); // will return false
$classType2->isAssignableValue(new \Jojo1981\PhpTypes\TestSuite\Fixture\TestEntityBase); // will return false
$classType2->isAssignableValue(new \Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity()); // will return true

$classType3 = \Jojo1981\PhpTypes\AbstractType::createFromTypeName(\Jojo1981\PhpTypes\TestSuite\Fixture\InterfaceTestEntity::class);
$classType3->isAssignableValue(new \stdClass()); // will return false
$classType3->isAssignableValue(new \Jojo1981\PhpTypes\TestSuite\Fixture\TestEntityBase); // will return true
$classType3->isAssignableValue(new \Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity()); // will return true

// Pseudo types
$mixedType = \Jojo1981\PhpTypes\AbstractType::createFromTypeName('mixed');
$mixedType->isAssignableValue(null); // will return true (always)
$mixedType->isPseudoType(); // will return true

$multiType = \Jojo1981\PhpTypes\AbstractType::createFromTypes([$stringType, $integerType]);
$multiType->isAssignableValue(true); // will return false
$multiType->isAssignableValue('text'); // will return true
$multiType->isAssignableValue(28); // will return true
$multiType->isPseudoType(); // will return true
```
