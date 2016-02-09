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
        textInput(['id' => 'pass-name', 'class' => 'cpanel-input', 'placeholder'=>'John'])->label(false) ?>
                          
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
                               
                            <?= $form->field($model, 'lastname')->textInput(['id' => 'pass-lastname', 
                                'class' => 'cpanel-input', 'placeholder'=>'Doe'])->label(false) ?>
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
                                    <?= $form->field($model, 'email')->textInput(['id' => 'email',
                                        'class' => 'cpanel-input', 'placeholder'=>'John@Doe.com'])->label(false) ?>
                                </div>
                        </div>
                </div>

                
        </div>
    
    <!-- add passengers -->
    <div id="add-pass-anchor">
        <?php // $this->render('addPassenger', ['model'=>$model, 'form'=>$form])?>
        <?php //$this->render('addPassenger', ['model'=>$model, 'form'=>$form])?>
        <?php // $this->render('addPassenger', ['model'=>$model, 'form'=>$form])?>
   
        
    </div><!-- end of add passenger -->



    <div class="cpanel-section">
        <!-- child seat checkbox start-->
        <div class="row">
           <div class="cpanel-item">
               <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'cseat')->checkbox(['id' => 'childseat',
                            'class' => 'cpanel-input', 'label'=>'Add child seat'])->label(false); ?>
                    </div>
               </div>
           </div>
        </div>
               
           <div class="row">
               <div class="cpanel-item">
                   <div class="col-md-1"></div>
                   <div class="col-md-1 description-childseat-panel">Chair<br>9-18kg</div>
                    <div class="col-md-3">
                        <select id="childseat-amount-dropdown" class="ui dropdown">
                          <option value="">Amount</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                    </div>
               </div>
           </div>
               
        <div class="row">
            <div class="cpanel-item">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <img class="childseat-panel" src="/uploads/childseat.png"/>
                </div>
                
            </div>
        </div>
                   
       <div class="row">
           <div class="cpanel-item"></div>
       </div>
        <div class="row">
           <div class="cpanel-item"></div>
       </div>
        <div class="row">
           <div class="cpanel-item"></div>
       </div>
                   
                   
        
       
        <div class="row">
            <div class="cpanel-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="notes">
                                Notes
                        </label>
                    </div>
                    <div class="col-md-4 notes-field">

                    <?= $form->field($model, 'notes')->textArea(['id' => 'notes', 
                        'class' => 'cpanel-input textarea' ,'rows' => '10',
                        'cols' => '10', 'placeholder' => 'Any important information',
                        'label'=>''])->label(false) ?>
                    </div>  
                </div>
            </div>
        </div>
       
<div id="greeting-row" class="row">
            <div class="cpanel-item">
                <div class="col-md-6">
                        <!--<div class="pseudo-link passenger"><span id="add-passenger">Add another passenger information</span></div>-->
                </div>
                <div class="col-md-6">
                                
                    <div class="col-md-12">
                    <?= $form->field($model, 'gsign')->textArea(['id' => 'greeting-sign', 'placeholder' => 'By default first name and last name of the passenger', 'rows'=>4, 'cols'=>10])->label(false) ?>
                    </div>
                    <img class="greeting" src="/uploads/23.png"/>
                </div>
                
            </div>
        </div>
        </div>
</div>	
