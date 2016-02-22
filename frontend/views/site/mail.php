<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$amount = substr($model->amount, 0, -2);
date_default_timezone_set('Asia/Baku');
$date = date('d-M-Y H:i', $model->updated_at);
$pickuptime = date('d-M-Y H:i', $model->pickuptime);
$returntime = $date = date('d-M-Y H:i', $model->rpickuptime);

$html = <<<HTML
    <table style="border:5px solid;width:100%">
        <tr>
           <td style="border:2px solid">ID</td><td style="border:2px solid">{$model->id}</td
        </tr>
        <tr>
                                               <td style="border:2px solid">Sifarişin Tarixi</td><td style="border:2px solid">{$date}</td
        </tr>
HTML;
if(!empty($model->flightnumber)){
$html .= <<<HTML
    <tr>
       <td style="border:2px solid">Uçuş Nömrəsi</td><td style="border:2px solid">{$model->flightnumber}</td
    </tr>
HTML;
}
if(!empty($model->seat)){
$html .= <<<HTML
    <tr>
       <td style="border:2px solid">Uşaq arabası</td><td style="border:2px solid">{$model->seat}</td
    </tr>
HTML;
}
        
$html .= <<<HTML
<tr>
       <td style="border:2px solid">Ad, familya</td><td style="border:2px solid">{$model->firstname}, {$model->lastname}</td
    </tr>
    <tr>
       <td style="border:2px solid">Əlaqə</td><td style="border:2px solid">email: {$model->email}, phone:☏ {$model->phone}</td>
    </tr>
    <tr>
       <td style="border:2px solid">Ödəniş</td><td style="border:2px solid">{$amount}azn</td>   
    </tr>
    <tr>
       <td style="border:2px solid">Vaxt və ünvan</td><td style="border:2px solid">🕒 {$pickuptime}   {$model->from}</td>   
    </tr>
    <tr>
       <td style="border:2px solid">Avtomobil</td><td style="border:2px solid">🚘 {$model->autos['0']['name']}</td>   
    </tr>
    <tr>
       <td style="border:2px solid">Əlavə qeyd</td><td style="border:2px solid">✎ {$model->notes}</td>   
    </tr>
    <tr>
       <td style="border:2px solid">Salamlama</td><td style="border:2px solid">👋 {$model->gsign}</td>   
    </tr>
    <tr>
       <th>Aparılacaq ünvanlar. </th>
    </tr>
    <tr>
       <td style="border:2px solid">Ünvanlar</td>
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
                                               <td style="border:2px solid">Time</td><td style="border:2px solid">{$returntime}</td>
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
                                            <tr>Transfer365. +994 50 999 03 65; +994 70 555 03 65</tr>
                                        </table>
HTML;
