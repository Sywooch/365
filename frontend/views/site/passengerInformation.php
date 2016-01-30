<?php
use yii\helpers\Html;
use kartik\icons\Icon;
use yii\widgets\ActiveForm;
//use frontend\assets\InternationalTelephoneAsset;
//InternationalTelephoneAsset::register($this);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="cpanel">
    <div class="cpanel-heading">
        <h4>Passengers data</h4>
    </div>
        
                <div class="cpanel-section">
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
        textInput(['id' => 'pass-name', 'class' => 'cpanel-input'])->label(false) ?>
                          
                        </div>

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
                               
                            <?= $form->field($model, 'lastname')->textInput(['id' => 'pass-lastname', 'class' => 'cpanel-input'])->label(false) ?>
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
                                        
                                    <?= $form->field($model, 'phone')->textInput(['id' => 'phone-number', 'class' => 'cpanel-input','placeholder' => '', 'type'=>'tel'])->label(false) ?>
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
                                      
                                    <?= $form->field($model, 'email')->textInput(['id' => 'email', 'class' => 'cpanel-input'])->label(false) ?>
                                </div>
                        </div>
                </div>

                
        </div>
    
    <!-- add passengers -->
    <div id="add-pass-anchor">
        <?php // $this->render('addPassenger', ['model'=>$model, 'form'=>$form])?>
        <?php //$this->render('addPassenger', ['model'=>$model, 'form'=>$form])?>
        <?php // $this->render('addPassenger', ['model'=>$model, 'form'=>$form])?>
   
        <div class="row">
            <div class="cpanel-item">
                <div class="col-md-6">
                        <!--<div class="pseudo-link passenger"><span id="add-passenger">Add another passenger information</span></div>-->
                </div>
                <div class="col-md-6">
                                
                                <div class="col-md-12">
                                        <!-- <textarea id="greeting-sign"
                                placeholder="By default first name and last name of the passenger"></textarea>-->
                                
                                <?= $form->field($model, 'gsign')->textArea(['id' => 'greeting-sign', 'placeholder' => 'By default first name and last name of the passenger', 'rows'=>4, 'cols'=>10])->label(false) ?>
                                </div>
                    <img class="greeting" src="/uploads/23.png"/>
                </div>
                
            </div>
        </div>
    </div><!-- end of add passenger -->



        <div class="cpanel-section">
            <div class="row">
                <div class="col-md-6">

                                <div class="col-md-2">
                                        <label for="notes">
                                                Notes
                                        </label>
                                </div>
                                <div class="col-md-4 notes-field">
                                       <!--  <textarea rows="10" cols="100" id="notes" class="cpanel-input textarea"
                                        placeholder="Any important information (children, heavy lagguage and etc.)"></textarea>-->

                                <?= $form->field($model, 'notes')->textInput(['id' => 'notes', 'class' => 'cpanel-input textarea' ,'rows' => '10','cols' => '100', 'placeholder' => 'Any important information (children,heavy lagguage and etc.)'])->label(false) ?>
                                </div>

                </div>


            </div>
        </div>
</div>	
