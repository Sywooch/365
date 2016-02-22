<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

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
                                
                                <span id="flight-number-fixed"></span> <!-- flight number -->
                            </div>
                        <div clas="fb-section-line">
                            <span id="pickup-address-fixed"></span>
                        </div>

                        <div class="fb-section-line" >
                            <span id="date-fixed"></span>
                            <span id="time-fixed"></span>
                        </div>
                            
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
                    <div class="additionals-wrap">
                        <div class="fixed-box-section-heading">
                            Additional destinations
                        </div>
                        <div class="fixed-box-section-body">
                            <div class="fb-section-line" id="dest1"><span></span></div>
                            <div class="fb-section-line" id="dest2"><span></span></div>
                            <div class="fb-section-line" id="dest3"><span></span></div>
                            
                        </div>
                    </div>
                </div>
                <div class="fixed-box-section">
                    <div class="fixed-box-section-heading">
                            Transfer type
                    </div>
                    <div class="fixed-box-section-body">
<!--                            <div class="fb-section-line">Tarrif <span id="tariff-fixed">Economy</span></div>
                            <div class="fb-section-line">1-4 passengers,up to 3 lagguage places</div>
                            <div class="fb-section-line">Passengers: <span id="pass-num-fixed"></span></div>-->
                        <div class="fb-section-line" id="child-seat-fixed">Child seat: <span>yes</span></div>
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
                    <div id='fixed-box-price' data-cent='<?= $jsondata['cent']?>'
                         data-car-price='<?= $jsondata['amount']?>' class="fixed-box-price">
                            <?= $jsondata['amount'] ?>
                    </div>
                </div>
            </div>
        </div>
</div>

