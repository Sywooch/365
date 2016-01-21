<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class SemanticUiTransitionAsset extends AssetBundle{
    public $sourcePath = '@vendor/bower/semantic-ui-transition';
    public $baseUrl = '@web';
    public $css = [
        'transition.min.css',
    ];
    public $js = [
        'transition.min.js',
    ];
}