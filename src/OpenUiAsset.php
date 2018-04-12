<?php
namespace sky\openui5;

use Yii;
use yii\web\View;
use yii\helpers\ArrayHelper;
use \yii\web\AssetBundle;

/**
 * OpenUiAsset represents a collection of asset resources [OpenUi5](http://openui5.org)
 *  
 * AssetBundle represents a collection of asset files, such as CSS, JS, images.
 *
 * Each asset bundle has a unique name that globally identifies it among all asset bundles used in an application.
 * The name is the [fully qualified class name](http://php.net/manual/en/language.namespaces.rules.php)
 * of the class representing it.
 *
 * An asset bundle can depend on other asset bundles. When registering an asset bundle
 * with a view, all its dependent asset bundles will be automatically registered.
 *
 * For more details and usage information on AssetBundle, see the [guide article on assets](guide:structure-assets).
 *
 * @author Wong Hansen <huanghanzen@gmail.com>
 */

class OpenUiAsset extends AssetBundle
{
    public $sourcePath = '@vendor/sky/yii2-openui5/src/assets/openui5';
    /**
     * @var array list application register
     * 
     * For Example:
     * 
     * ```php
     * public $appAssets = [
     *      'myapp' => 'app\assets\MyAppAsset',
     *      'mymod' => 'app\assets\MyModuleAsset'
     * ];
     * ```
     */
    public $appAssets = [];
    
    //public $baseUrl = 'https://openui5.hana.ondemand.com/resources/';
    
    public function init() {
        parent::init();
        if (!$this->js) {
            $this->js = [YII_ENV_DEV ? 'resources/sap-ui-core.js' : 'resources/sap-ui-core-dbg.js'];
        }
        $this->jsOptions = ArrayHelper::merge($this->jsOptions(), $this->jsOptions);
    }
    
    /**
     * default javascript options
     * @return array
     */
    protected function jsOptions()
    {
        return [
            'position' => View::POS_HEAD,
            'id' => 'sap-ui-bootstrap',
            'data' => [
                'sap-ui-theme' => 'sap_belize',
                'sap-ui-libs' => 'sap.m,sap.ui.commons',
                'sap-ui-preload' => 'async',
                'sap-ui-compatVersion' => 'edge',
                'sap-ui-resourceroots' => $this->getResourceRoots()
            ],
        ];
    }
    
    /**
     * Register application asset and dependes on. get bundle asset url and set at javascript options.
     * @return array
     */
    protected function getResourceRoots()
    {
        $resource = [];
        if ($this->appAssets) {
            $am = Yii::$app->assetManager;
            foreach ($this->appAssets as $name => $class) {
                if ($bundle = $am->getBundle($class)) {
                    $this->depends[] = $class;
                    $resource[$name] = $bundle->baseUrl;
                }
            }
        }
        return $resource;
    }
}
