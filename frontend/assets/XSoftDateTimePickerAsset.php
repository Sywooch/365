<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class XSoftDateTimePickerAsset extends AssetBundle{
    public $sourcePath = '@vendor/xdsoft-datetime';
    public $baseUrl = '@web';
    public $css = [
      'jquery.datetimepicker.css',
    ];
    public $js = [
      'build/jquery.datetimepicker.full.min.js',  
    ];
    public $depends = [
      'frontend\assets\AppAsset',
    ];
}

