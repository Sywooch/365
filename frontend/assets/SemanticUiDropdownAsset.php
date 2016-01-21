<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class SemanticUiDropdownAsset extends AssetBundle
{
    public $sourcePath = '@vendor/semantic/ui/dist/components';
    public $baseUrl = '@web';
    public $css = [
        'dropdown.min.css',
        'semantic-ui-dropdown-custom.css',
    ];
    public $js = [
        'dropdown.min.js',
    ];
    public $depends = [
        'frontend\assets\SemanticUiTransitionAsset',
    ];
    
}
