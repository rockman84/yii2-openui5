![openui5](https://avatars0.githubusercontent.com/u/13307823?v=4&s=200)

yii2-openui5
============

[Yii2-openui5](https://rockman84.github.io/yii2-openui5/) is extension for [Yii2 Framework](http://www.yiiframework.com/). to easy intergrate with [OpenUi5](http://openui5.org/) asset.

How To Install?
---------------
via composer run
```
php composer.phar require sky\yii2-openui5 "*"
```

or add in composer.json to require selection

```
"sky\yii2-openui5" : "*"
```
- [download Openui5](http://openui5.org/download.html) sdk or runtime
- extract zip file
- copy all files inside openui5-xxx-xxx folder to  folder vendor/sky/yii2-openui5/src/assets/openui5

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

### Advanced Use
create new file MyAppAsset.php in app/assets folder
```php
namespace app\assets;

class MyAppAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@app/assets/myapp';
}
```

create new file YourAppAsset.php at app/assets folder
```php
namespace app\assets;

class YourAppAsset extends \sky\openui5\OpenUiAsset
{
    // set your application asset depends
    public $appAssets = [
        'myapp' => 'app\assets\MyAppAsset',
    ];
    
    // set openui5 data options
    public $jsOptions = [
        'data' => [
            'sap-ui-theme' => 'sap_belize',
            'sap-ui-libs' => 'sap.m'
        ]
    ];
}
```

run at your view file
```php
use app\assets\YourAppAsset;

YourAppAsset::register($this);
```