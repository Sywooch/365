<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class BootstrapDateTimePickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/eonasdan/bootstrap-datetimepicker';   
    public $baseUrl = '@web';
    public $css = [
        'build/css/bootstrap-datetimepicker.min.css',   
    ];
    public $js = [
        'build/js/bootstrap-datetimepicker.min.js',
    ];
    public $depends = [
      'yii\web\JqueryAsset',
      'frontend\assets\MomentAsset',
      'yii\bootstrap\BootstrapAsset',
    ];
}

