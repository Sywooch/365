<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FormAsset extends AssetBundle
{

  

    public $basePath = '@webroot';
    public $baseUrl = '@web';
   // public $sourcePath = '@vendor';
    public $css = [
        'css/xdsoft-custom.css',
        'css/inttel-custom.css',
        'css/bootstrap-custom.css',
    ];
    
    public $js = [
        'scripts/form.js',
        'scripts/side-box.js',
        'scripts/add-destination.js',
        'scripts/fixed-box-position.js',
//        'scripts/semantic-ui-dropdown.js',

    ];
    public $depends = [
         //'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
//       'yii\jui\JuiAsset'
    ];
     
}