![openui5](http://openui5.org/images/OpenUI5_new_big_side.png)

yii2-openui5
============

Yii2-openui5 is extension for [Yii2 Framework](http://www.yiiframework.com/). to easy intergrate with [OpenUi5](http://openui5.org/) asset.

How To Install?
---------------
via composer
```
composer require sky\yii2-openui5 "dev-master"
```

or add in composer.json

```
"sky\yii2-openui5" : "dev-master"
```

How To Use?
-----------
### Basic Use
add the below code at view file
```php
use sky\openui5\OpenUiAsset;

OpenUiAsset::register($this);
```

or add 'sky\openui5\OpenUiAsset' at property $depends in your application Asset class
example:
```php
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'sky\openui5\OpenUiAsset',
    ];
```

### Extending Asset
```php
class YourAsset extends \sky\openui5\OpenUiAsset
{
    public $jsOptions = [];
}
```