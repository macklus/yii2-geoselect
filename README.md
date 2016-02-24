Yii2 Geo Selector widget
========================
Ajax widget to display country, province and location selects

[![Latest Stable Version](https://poser.pugx.org/macklus/yii2-geoselect/v/stable)](https://packagist.org/packages/macklus/yii2-geoselect)
[![Latest Unstable Version](https://poser.pugx.org/macklus/yii2-geoselect/v/unstable)](https://packagist.org/packages/macklus/yii2-geoselect)
[![License](https://poser.pugx.org/macklus/yii2-geoselect/license)](https://packagist.org/packages/macklus/yii2-geoselect)
[![Total Downloads](https://poser.pugx.org/macklus/yii2-geoselect/downloads)](https://packagist.org/packages/macklus/yii2-geoselect)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist macklus/yii2-geoselect "*"
```

or add

```
"macklus/yii2-geoselect": "*"
```

to the require section of your `composer.json` file.

Update database schema
----------------------

The last thing you need to do is updating your database schema by applying the
migrations. Make sure that you have properly configured `db` application component
and run the following command:

```bash
$ php yii migrate/up --migrationPath=@vendor/macklus/yii2-geoselect/migrations/

Usage
-----