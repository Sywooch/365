<?php
use kartik\icons\Icon;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
        <div class="cpanel-item new-destination hide">
            <div class="col-md-3" style="text-align: right">
                <label for="destination_address">Destination address</label>
        </div>
        <div class="col-md-3">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
       
            
        <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Sifarish")["to"]]); -->
            <div id="destination-in-form"><?= $form->field($model, $id)->textInput(['class' => 'cpanel-input add-dest-address' ,'value' => ''])->label(false) ?></div>
        </div>

        <div class="col-md-4">
            <div class="inner-addon">
                <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                <!--<input type="text" id="specify-address" class="cpanel-input" placeholder="Specify address(i.e. str, house etc.)"/>-->

                   
                <?= $form->field($model, $aaddress)->textInput(['id' => 'specify-address', 'class' => 'cpanel-input' ,'placeholder' => 'Specify address (i.e str, house etc.)'])->label(false) ?>
            </div>
        </div>
        <!-- append icon here -->
        <div class="col-md-2 close">
           <?=Icon::show('times-circle', ['class'=>"fa-2x"], Icon::FA);?>
        </div>
        </div>
    </div>
