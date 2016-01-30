
<?php
use yii\helpers\Html;
use kartik\icons\Icon;
use yii\widgets\ActiveForm;
use yii\helpers\BaseJson;
use frontend\assets\FormAsset;
use frontend\assets\BootstrapDateTimePickerAsset;
use frontend\assets\InternationalTelephoneAsset;
FormAsset::register($this);
BootstrapDateTimePickerAsset::register($this);
InternationalTelephoneAsset::register($this);
?>

<!-- Steps -->
<div class="container-fluid steps-wrap">
    <div class="row steps">
        <div class="col-xs-4 col-md-4 step step-complete">
            <span id="step1">Destination</span>
            
        </div>
        <div class="col-xs-4 col-md-4 step step-active">
            <span id="step2">Passenger information</span>
            <div class="rounded-border"></div>
        </div>
        <div class=" col-xs-4 col-md-4 step step-inactive">
            <span id="step3">Confirmation</span>
            <div class="rounded-border"></div>
        </div>
    </div>
</div><!--Steps end-->

<div class="container" id="parent-container"> <!-- Passenger form container -->
    <div class="row">
<?php $form = ActiveForm::begin(['method' => 'post']); ?>
        <div class="col-md-9">
            <div class="cpanel">
                <div class="cpanel-heading">

                    <h4><span id="heading-from"><?= Yii::$app->request->get('Transferorder')['from'] ?></span> <--> <span id="heading-to"><?= Yii::$app->request->get('Transferorder')['to'] ?></span><br></h4>
                   <?php $jsondata = BaseJson::decode(Yii::$app->request->get('Transferorder')['car'], true) ?>

                </div>
                <?php
                 
                    $getRequestFrom = Yii::$app->request->get('Transferorder')['from'];
                    $getRequestTo = Yii::$app->request->get('Transferorder')['to'];
                    
                     
                    $fromAirport = stristr($getRequestFrom, 'airport'); //find substr 'airport' in getRuquestFrom
                    $toAirport = stristr($getRequestTo, 'airport'); //find substr 'airport' in getRuquestFrom
                    
                    if ($fromAirport):?>
                        <div class="cpanel-section">
    <fieldset>
        <legend id="route">Route</legend>
        <div class="row">
            <div class="cpanel-item">
                <div class="col-md-3">
                    <label for="flight-number">Flight number</label>
                </div>
                <div class="col-md-3">
                    
                    <?= $form->field($model, 'flightnumber')->
                            textInput(['id' => 'flight-number', 'class' => 'cpanel-input','placehodler' => 'Enter flight number'])->label(false) ?>
                   <!-- $this->render('test', ['model'=>$model])-->
                </div>
                <div class="col-md-6">
                    <div class="description">
                        *as specified in your flight ticket
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="cpanel-item">
            <div class="col-md-3">
                    <label for="date-arrival">Arrival time</label>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'date')->textInput(['id' => 'date-arrival', 'class' => 'cpanel-input date-picker' , 'placeholder' => 'Choose date'])->label(false) ?>
            </div>
            <div class="col-md-2">     
                <?= $form->field($model, 'time')->textInput(['id' => 'time-arrival', 'class' => 'cpanel-input time-picker' , 'placeholder' => 'HH:mm'])->label(false) ?>
            </div>
            <div class="col-md-3">
                <div class="description">
                    *local time
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="cpanel-item">
        <div class="col-md-3" style="text-align: right">
                <label for="destination_address">Destination address</label>
        </div>
        <div class="col-md-3">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
       
            <?= $form->field($model, 'to')->HiddenInput(['value' => Yii::$app->request->get('Transferorder')['to']])->label(false) ?>
            <?= $form->field($model, 'from')->HiddenInput(['value' => Yii::$app->request->get('Transferorder')['from']])->label(false) ?>
            
            <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Sifarish")["to"]]); -->
            <div id="destination-in-form"><?= Yii::$app->request->get("Transferorder")["to"] ?></div>
        </div>

        <div class="col-md-4">
            <div class="inner-addon">
                <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                <!--<input type="text" id="specify-address" class="cpanel-input" placeholder="Specify address(i.e. str, house etc.)"/>-->

                   
                <?= $form->field($model, 'address')->textInput(['id' => 'specify-address', 'class' => 'cpanel-input' ,'placeholder' => 'Imran Qasimov, 4'])->label(false) ?>
            </div>


        </div>
        <!-- append icon here -->
        <div class="col-md-1">
        </div>
    </div>
</div>
<div id="parent-container-add-destination">
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'idDest'=>'anotherd', 'idAddress'=>'aaddress'])?>
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'idDest'=>'anotherd1', 'idAddress'=>'aaddress1'])?>
    <div id="last"><?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'idDest'=>'anotherd2', 'idAddress'=>'aaddress2'])?></div>
   
    <div id="add" class="cpanel-item">Add another another destination</div>
</div> <!--add destination end -->


        <div class="row">
            <div class="cpanel-item">
                <div class="col-md-2">
                    <?= $form->field($model, 'return')->checkbox(['id' => 'return-form',
                         'class' => 'cpanel-input'])->label(false); ?>
                </div>
            </div>
        </div>

</fieldset>


</div>

<div id="return-panel" class="return-panel">
    <?= $this->render('returnPanel', ['model'=>$model,'form'=>$form])?>
</div>
                    <?php elseif(!$fromAirport && $toAirport):?>
<div class="cpanel-section">
    <fieldset>
        <legend id="route">Route</legend>
        <div class="row">
            <div class="cpanel-item">
                <div class="col-xs-12 col-md-4">
                    <label for="date-flight">Date and time of pickup</label>
                </div>
                <div class="col-xs-12 col-md-3">
                    
                    <?= $form->field($model, 'date')->textInput(['id' => 'date-pickup',
                        'class' => 'cpanel-input date-picker' ,'placeholder' => 'Choose date'])->label(false) ?>
                </div>
                <div class="col-xs-12 col-md-2">
        
                    <?= $form->field($model, 'time')->textInput(['id' => 'time-pickup',
                        'class' => 'cpanel-input time-picker' ,'placeholder' => 'HH:mm'])->label(false) ?>
                </div>
                <div class="col-xs-12 col-md-3">
                <div class="description">
                    *local time
                </div>
            </div>
            </div>
        </div>
        
<div class="row">
    <div class="cpanel-item">
        <div class="col-xs-12 col-md-4">
        <label for="specify-address">Pick up address</label>
    </div>
    <div class="col-xs-12 col-md-8">
        <div class="inner-addon">
            <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
               
            <?= $form->field($model, 'address')->textInput(['id' => 'pickup-address', 'class' => 'cpanel-input' ,'placeholder' => 'Imran Qasimov, 4'])->label(false) ?>
        </div>
    </div>
    </div>
    
</div>

<div class="row">
    <div class="cpanel-item">
        <div class="col-xs-12 col-md-4" style="text-align: right">
                <label for="destination_address">Destination</label>
        </div>
        <div class="col-xs-12 col-md-8">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
        
            <?= $form->field($model, 'from')->HiddenInput(['value' => Yii::$app->request->get('Transferorder')['to']])->label(false) ?>
        <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Transferorder")["to"]]); -->
            <div id="destination-in-form"><?= Yii::$app->request->get("Transferorder")["to"]; ?></div>
        </div>


    </div>
</div>
        
        




</fieldset>


</div>
                    <?php else:?>
                        <div class="cpanel-section">
    <fieldset>
        <legend id="route">Route</legend>
        

    <div class="row">
        <div class="cpanel-item">
            <div class="col-xs-12 col-md-4">
                    <label for="date-arrival">Pick up date and time</label>
            </div>
            <div class="col-xs-12 col-md-3">
              
                <?= $form->field($model, 'date')->textInput(['id' => 
                    'date-pickup-citytocity', 'class' => 'cpanel-input date-picker' ,
                    'placeholder' => 'dd/mm/yy/'])->label(false) ?>
            </div>
            <div class="col-xs-12 col-md-2">
               
                <?= $form->field($model, 'time')->
        textInput(['id' => 'time-pickup', 'class' => 'cpanel-input time-picker' ,
            'placeholder' => 'HH:mm'])->label(false) ?>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="description">
                    *local time
                </div>
            </div>

        </div>
    </div>
        
<div class="row">
    <div class="cpanel-item">
        <div class="col-xs-12 col-md-4">
        <label for="specify-address">Pick up address</label>
    </div>
    <div class="col-xs-12 col-md-8">
        <div class="inner-addon">
            <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
               
            <?= $form->field($model, 'address')->textInput(['id' => 'pickup-address', 'class' => 'cpanel-input' ,'placeholder' => 'Specify address(i.e str, house etc.)'])->label(false) ?>
        </div>
    </div>
    </div>
    
</div>

<div class="row">
    <div class="cpanel-item">
        <div class="col-xs-12 col-md-4" style="text-align: right">
                <label for="destination_address">Destination</label>
        </div>
        <div class="col-xs-12 col-md-8">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
        <?= Html::activeHiddenInput($model, 'from', ['value' =>  Yii::$app->request->get("Transferorder")["to"]]); ?>
        <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Transferorder")["to"]]); -->
            <div id="destination-in-form"><?= Yii::$app->request->get("Transferorder")["to"]; ?></div>
        </div>


    </div>
</div>
        
        <div class="row">
    <div class="cpanel-item">
        <div class="col-xs-12 col-md-4" style="text-align: right">
                <label for="destination_address">Destination address</label>
        </div>
        <div class="col-xs-12 col-md-8">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
       
            <?= $form->field($model, 'from')->HiddenInput(['value' => Yii::$app->request->get('Transferorder')['from']])->label(false)?>

            <?= $form->field($model, 'to')->textInput(['id' => 'pac-input-order-form', 'class' => 'cpanel-input' ,'value' =>  Yii::$app->request->get("Transferorder")["to"]])->label(false) ?>
            
            <!--<div id="destination-in-form"> Yii::$app->request->get("Transferorder")["to"];</div>-->
        </div>


    </div>
</div>
        
    <div id="parent-container-add-destination">
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd'])?>
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd1'])?>
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd2'])?>
        
    <div id="add" class="cpanel-item">Add another another destination</div>
</div> <!--add destination end --> 

<div class="row">
            <div class="cpanel-item">
                <div class="col-md-2">
                    <?= $form->field($model, 'return')->checkbox(['id' => 'return-form',
                         'class' => 'cpanel-input'])->label(false); ?>
                </div>
            </div>
        </div>


</fieldset>


</div>

<div id="return-panel" class="return-panel">
    <?= $this->render('returnPanel', ['model'=>$model, 'form'=>$form])?>
</div>
                    <?php endif?>
               

                <div class="cpanel-footer">
                    Free cancellation of the trip in an 12 hours before the start 
                </div>
            </div>
						
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

   
        <div class="row">
            <div class="cpanel-item">
                <div class="col-md-6">
                        <div class="pseudo-link passenger"><span id="add-passenger">Add another passenger information</span></div>
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

</div>
    <div  class="col-md-3">
        <div id="fixed-box" class="fixed-box">
            <div class="fixed-box-heading">
                Order information
            </div>
            <div class="fixed-box-body">
                <div class="fixed-box-section">
                    <div class="fixed-box-section-heading">
                        Place and time of pick up
                    </div>
                    <div class="fixed-box-section-body">
                            <div class="fb-section-line"><?= Yii::$app->request->get('Transferorder')['from'] ?>
                                <span id="pickup-address-fixed"></span>
                                <span id="flight-number-fixed"></span> <!-- flight number -->
                            </div>

                            <div class="fb-section-line" id="date-fixed"></div>
                            <div class="fb-section-line" ><span id="time-fixed"></span></div>
                    </div>
                </div>
                <div class="fixed-box-section">
                    <div class="fixed-box-section-heading">
                            Destination
                    </div>
                    <div class="fixed-box-section-body">
                        <div class="fb-section-line" id="destination-fixed"><?= Yii::$app->request->get('Transferorder')['to'] ?></div>
                        <div class="fb-section-line" id="specify-address-fixed"></div>

                    </div>
                </div>
                <div class="fixed-box-section">
                    <div class="fixed-box-section-heading">
                            Transfer type
                    </div>
                    <div class="fixed-box-section-body">
                            <div class="fb-section-line">Tarrif <span id="tariff-fixed">Economy</span></div>
                            <div class="fb-section-line">1-4 passengers,up to 3 lagguage places</div>
                            <div class="fb-section-line">Passengers: <span id="pass-num-fixed"></span></div>
                            <div class="fb-section-line" id="chair-side"></div>
                    </div>
                </div>
                <div id="contacts-fixed" class="fixed-box-section">
                    <div class="fixed-box-section-heading">
                            Contact information
                    </div>
                    <div class="fixed-box-section-body">
                            <div class="fb-section-line">
                                    <span id="pass-name-fixed"></span>
                                    <span id="pass-lastname-fixed"></span>
                            </div>
                            <div class="fb-section-line" id="phone-number-fixed"></div>
                            <div class="fb-section-line" id="email-fixed"></div>
                    </div>
                </div>
                    <div class="fixed-box-section">
                        <div class="fixed-box-section-heading">
                            Return
                        </div>
                        <div class="fixed-box-section-body">
                            <div class="fb-section-line">
                                <span id="date-return-fixed"></span>
                                <span id="time-return-fixed"></span>
                            </div>
                            <div id="pickup-address-return-fixed" class="fb-section-line"></div>
                        </div>
                    </div>
                    <div id="nfixed" class="fixed-box-section">
                        <div class = "fixed-box-section-heading">
                                Notes
                        </div>
                        <div class="fixed-box-section-body" id="notes-fixed">

                        </div>
                    </div>

            </div>
            <div class="fixed-box-footer">
                <div class="fixed-box-heading">
                        Transfer price
                </div>
                <div class="fixed-box-heading">
                        Summary
                        <div class="fixed-box-price"><?= $jsondata['amount'] ?></div>
                </div>
            </div>
        </div>
</div>
			</div>
			
			
			
		</div> <!-- Passenger form container end -->
		<div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-6 button-box">
                            <div class="row">
                                <div class="col-md-12 button-box-title">Total price <?= $jsondata['amount'] ?> AZN</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                        <?= Html::SubmitButton('Go To Payment'); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-2">
                        </div>
                            <?php ActiveForm::end() ?>
                    </div>
                </div>
		

		
		<!--<script src="/scripts/add-destination.js"></script>-->
		<!--<script src="/scripts/side-box.js"></script>-->
                <!--<script src="/scripts/fixed-box-position.js"></script>-->  

