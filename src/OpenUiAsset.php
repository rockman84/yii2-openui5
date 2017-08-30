<?php
namespace sky\openui;

use yii\web\View;
use yii\helpers\ArrayHelper;

class OpenUiAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/openui5';
    
    public function init() {
        parent::init();
        if (!$this->js) {
            $this->js = [YII_ENV_DEV ? 'sap-ui-core.js' : 'sap-ui-core.js'];
        }
        $this->jsOptions = ArrayHelper::merge($this->jsOptions(), $this->jsOptions);
    }
    
    protected function jsOptions()
    {
        return [
            'position' => View::POS_HEAD,
            'id' => 'sap-ui-bootstrap',
            'data-sap-ui-theme' => 'sap_bluecrystal',
            'data-sap-ui-libs' => 'sap.m,sap.ui.commons,sap.ui.ux3',
            'data-sap-ui-preload' => 'async',
            'data-sap-ui-compatVersion' => 'edge',
        ];
    }
}
