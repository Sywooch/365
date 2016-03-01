<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$amount = substr($model->amount, 0, -2);
date_default_timezone_set('Asia/Baku');
$date = date('d-M-Y H:i', $model->updated_at);
$pickdate = date('d-M-Y H:i', $model->pickuptime);

$dateOfOrder = Yii::t('yii','Date of order');

$html = <<<HTML
                                        <table style="border:5px solid;width:100%">
                                            <tr>
                                               <td style="border:2px solid">ID</td><td style="border:2px solid">{$model->id}</td
                                            </tr>
                                            <tr>
                                               <td style="border:2px solid">{$dateOfOrder}</td><td style="border:2px solid">{$date}</td
                                            </tr>
HTML;
if(!empty($model->flightnumber)){
$html .= <<<HTML
                                            <tr>
                                               <td style="border:2px solid">Flight number</td><td style="border:2px solid">{$model->flightnumber}</td
                                            </tr>
HTML;
}
if(!empty($model->seat)){
$html .= <<<HTML
                                            <tr>
                                               <td style="border:2px solid">Child seats</td><td style="border:2px solid">{$model->seat} ədəd</td>
        
                                            </tr>
HTML;
}

        
$html .= <<<HTML
                                        <tr>
                                               <td style="border:2px solid">Firstname, Lastname</td><td style="border:2px solid">{$model->firstname}, {$model->lastname}</td
                                            </tr>
                                            <tr>
                                               <td style="border:2px solid">Contact</td><td style="border:2px solid">email: {$model->email}, phone:☏ {$model->phone}</td>
                                            </tr>
                                            <tr>
                                               <td style="border:2px solid">Price</td><td style="border:2px solid">{$amount}azn</td>   
                                            </tr>
                                            <tr>
                                               <td style="border:2px solid">Pick up time and address</td><td style="border:2px solid">🕒 {$pickdate}  {$model->from}</td>   
                                            </tr>
                                            <tr>
                                               <td style="border:2px solid">Car</td><td style="border:2px solid">🚘 {$model->autos['0']['name']}</td>   
                                            </tr>
                                            <tr>
                                               <td style="border:2px solid">Notes</td><td style="border:2px solid">✎ {$model->notes}</td>   
                                            </tr>
                                            <tr>
                                               <td style="border:2px solid">Greeting sign</td><td style="border:2px solid">👋 {$model->gsign}</td>   
                                            </tr>
                                            <tr>
                                               <th>Another destinations. </th>
                                            </tr>
                                            <tr>
                                               <td style="border:2px solid">Address</td>
                                               <td style="border:2px solid">
                                                   <ol>
HTML;
                                                        foreach($unvanlar as $unvan){
                                                            if(!empty($unvan)){
$html .= <<<HTML
                                                            <li>{$unvan}</li>
HTML;
                                                            }
                                                        }
                                                        if(!empty($model->return == 1)){
$html .= <<<HTML
                                            <tr>
                                               <th>Return info. </th>
                                            </tr>
                                            <tr>
                                               <td style="border:2px solid">Time</td><td style="border:2px solid">Seçilib</td
                                            </tr>
                                            <tr>
                                               <td style="border:2px solid">Return</td><td style="border:2px solid">
                                                   
                                               </td
                                            </tr>
HTML;
}
$html .= <<<HTML
                                                   </ol>
                                               </td> 
                                            </tr>
                                        </table>
HTML;
