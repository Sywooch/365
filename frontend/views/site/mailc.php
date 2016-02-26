<?php
date_default_timezone_set('Asia/Baku');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$amount = substr($model->amount, 0, -2);
$date = date('d-M-Y H:i', $model->updated_at);
$datep = date('d-M-Y H:i', $model->pickuptime);
$datee = date('d-M-Y H:i', $model->endtime);
$html = <<<HTML
    <table style="border:5px solid;width:100%">
        <tr>
           <td style="border:2px solid">ID</td><td style="border:2px solid">{$model->id}</td
        </tr>
        <tr>
           <td style="border:2px solid">Date of order</td><td style="border:2px solid">{$date}</td
        </tr>
HTML;

        
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
       <td style="border:2px solid">Pick up time and address</td><td style="border:2px solid">🕒 {$datep} {$model->from} {$model->address}</td>   
    </tr>
    <tr>
       <td style="border:2px solid">Car</td><td style="border:2px solid">🚘 {$model->car0['0']['name']}</td>   
    </tr>
    <tr>
       <td style="border:2px solid">Notes</td><td style="border:2px solid">✎ {$model->notes}</td>   
    </tr>
    <tr>
       <td style="border:2px solid">Greeting sign</td><td style="border:2px solid">👋 {$model->gsign}</td>   
    </tr>
    <tr>
       <td style="border:2px solid">Schedule</td>
       <td style="border:2px solid">
           <ol>
HTML;
        foreach($model->time as $adday => $times){
            $tarix = date('Y F d', strtotime('+'.$adday.' day',$model->pickuptime));
            $stime = date("H:i",$times['time_start']);
            $etime = date("H:i",$times['time_end']);


$html .= <<<HTML
        <li>{$tarix} {$stime}-{$etime}</li>
HTML;
                                                            
                                                        }

$html .= <<<HTML
               </ol>
           </td> 
        </tr>
        <tr>Transfer365. +994 50 999 03 65; +994 70 555 03 65</tr>
    </table>
HTML;
