<?php
use yii\helpers\Html;
use kartik\icons\Icon;
use yii\widgets\ActiveForm;
use yii\helpers\BaseJson;
use yii\web\UrlManager;
use frontend\assets\FormAsset;
use frontend\assets\BootstrapDateTimePickerAsset;
use frontend\assets\InternationalTelephoneAsset;

FormAsset::register($this);
BootstrapDateTimePickerAsset::register($this);
InternationalTelephoneAsset::register($this);


$this->title = 'Order chaffeured service in Azerbaijan, Baku';


?>
<!-- Steps -->
<div class="container-fluid steps-wrap">
    <div class="row steps">
        <div class="col-xs-4 col-md-4 step step-complete">
            <span id="step1">Destination</span>
            
        </div>
        <div class="col-xs-4 col-md-4 step step-active">
            <span id="step2">Booking</span>
            <div class="rounded-border"></div>
        </div>
        <div class=" col-xs-4 col-md-4 step step-inactive">
            <span id="step3">Confirmation</span>
            <div class="rounded-border"></div>
        </div>
    </div>
</div><!--Steps end-->

<div id="chaffeurForm" class="container">
<div class="row">
    <div class="col-xs-9">
        <div class="cpanel">
            <div class="cpanel-heading">
                <h4><span>Mercedes E-Class</span> <strong>-</strong> Chauffeur service</h4>
            </div>
            <div class="cpanel-section">
                <h3>Departure</h3>
                <div class="row">
                    <div class="row cpanel-item">
                        <div class="col-md-3">
                            <label>Date of pickup</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="cpanel-input date-picker" placeholder="dd/mm/yy" />
                        </div>
                        <div class="col-md-2">
                            <div class="ui selection dropdown chauffeurDays">
                                <input id="days" name="days" type="hidden">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Days</div>
                                    <div class="menu">
                                      <div class="item" data-value="1">1 day</div>
                                      <div class="item" data-value="2">2 days</div>
                                      <div class="item" data-value="3">3 days</div>
                                      <div class="item" data-value="4">4 days</div>
                                      <div class="item" data-value="5">5 days</div>
                                      <div class="item" data-value="6">6 days</div>
                                      <div class="item" data-value="7">7 days</div>
                                      <div class="item" data-value="8">8 days</div>
                                      <div class="item" data-value="9">9 days</div>
                                      <div class="item" data-value="10">10 days</div>
                                    </div>
                              </div>
                        </div>
                        <div class="col-md-3" style="float: left">
                            <div class="description">Select your pick up date and number of days you wish to rent</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="cpanel-section">
                <h3>Please select day by day your rental hours</h3>
                <div class="row">
                    
                    
                    <div id="clone" class="row cpanel-item time-control">
                        <div class="col-md-3">
                            <label>From</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="cpanel-input time-picker" placeholder="hh:mm"/>
                        </div>
                        <div class="col-md-3">
                            <label>To</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="cpanel-input time-picker" placeholder="hh:mm"/>
                        </div>
                    </div>
                    <div id="anchor">
                    
                </div>
                </div>
                
                
            </div>
            
        </div>
    </div>
</div>
</div>
