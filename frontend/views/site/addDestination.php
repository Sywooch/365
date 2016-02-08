<?php
use kartik\icons\Icon;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row parent-anchor">
    <div class="cpanel-item new-destination hide">
        
        <div class="row">
            <div class="col-md-3">
                <label for="specify-address">Additional address</label>
            </div>
            <div class="col-md-5">
                <div id="destination-in-form"><?= $form->field($model, $id)->textInput(['class' => 'cpanel-input add-dest-address',
                    'value' => ''])->label(false) ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5 location-input">
                <div class="inner-addon">
                    <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                    <?= $form->field($model, $aaddress)->textInput(['id' => 'specify-address', 
                        'class' => 'cpanel-input specify-address' ,
                        'placeholder' => 'Specify address (i.e str, house etc.)'])->label(false) ?>
                </div>
            </div>
            <div class="col-md-4 close">                
                <?=Icon::show('times-circle', ['class'=>"fa-lg"], Icon::FA);?>
            </div>
        </div>
    </div>
</div>
