<?php
use kartik\icons\Icon;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!-- new passenger #1 -->
        <div class="cpanel-section new-passenger hide">
            <div class="row">
                    <div class="cpanel-item">
                        <div class="col-md-2">
                            <label for="pass-name">
                                    First name
                            </label>
                        </div>
                        <div class="col-md-4">
                                <!--<input type="text" id="pass-name" class="cpanel-input"/> -->
                                 
                            <?= $form->field($model, 'firstname')->
        textInput([ 'class' => 'cpanel-input'])->label(false) ?>
                          
                        </div>
                        <div class="col-md-2 close"><?=Icon::show('times-circle', ['class'=>"fa-2x"], Icon::FA);?></div>

                    </div>
                </div>
                <div class="row">
                    <div class="cpanel-item">
                        <div class="col-md-2">
                                <label for="pass-lastname">
                                        Last name
                                </label>
                        </div>
                        <div class="col-md-4">
                                <!-- <input type="text" id="pass-lastname" class="cpanel-input"/> -->
                               
                            <?= $form->field($model, 'lastname')->textInput([ 'class' => 'cpanel-input'])->label(false) ?>
                        </div>
                        

                    </div>
                </div>
                <div class="row">
                        <div class="cpanel-item">
                                <div class="col-md-2">
                                        <label for="phone-number">
                                                Phone number
                                        </label>
                                </div>
                                <div class="col-md-4">
                                     <!--    <input type="text" id="phone-number" class="cpanel-input"/>-->
                                        
                                    <?= $form->field($model, 'phone')->textInput([ 'class' => 'cpanel-input addpass-phone','placeholder' => '', 'type'=>'tel'])->label(false) ?>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="cpanel-item">
                                <div class="col-md-2">
                                        <label for="email">
                                                E-mail address
                                        </label>
                                </div>
                                <div class="col-md-4">
                                       <!--  <input type="text" id="email" class="cpanel-input"/>-->
                                      
                                    <?= $form->field($model, 'email')->textInput([ 'class' => 'cpanel-input'])->label(false) ?>
                                </div>
                        </div>
                </div></div> <!-- end new passenger #1 -->
