<?php
use yii\helpers\Html;
use yii\helpers\Url;

$lang = Yii::$app->language;
?>

<?php if ($lang == 'az'): ?>
    <div id="final" class="container">
    <div class="jumbotron">
        <p><span id="transfer-word">Transfer365</span> seçdiyinizə görə təşəkkür
            edirik. 
            Komandamız sizinlə tezliklə əlaqə saxlıyacaq.</p>
        <p>Qeyd etdiyiniz email adresinə tesdiqləmə məktubu göndərilib.</p>
        <p>Biz ümüd edirik ki <a href="http://www.azerbaijans.com/content_1407_en.html" target="_blank">Azərbaycana</a> 
        səyahətiniz sizə xoş təəsürrat bəxş edəcək.</p>
    </div>
    
    <p><i>Hər hansısa bir sualınız varsa onu 
        <a id="mailto" href="mailto:support@transfer365.az">support@transfer365.az</a>-a göndərin.
        Sizə cavab verməyə şad olacayiq!</i></p>
</div>

<?php endif ?>
<?php if ($lang == 'ru'): ?>
<div id="final" class="container">
    <div class="jumbotron">
        <p>Спасибо за то, что воспользовались <span id="transfer-word">Transfer365</span>.
            Наша команда свяжется с Вами в ближайшее время.</p>
        <p>На указанный Вами адрес электронной почты выслано письмо с подтверждением Вашего заказа.</p>
        <p>Мы надеемся на то, что Ваше путешествие в <a href="http://www.azerbaijans.com/content_1407_en.html" target="_blank">Азербайджан</a> станет для Вас
            приятным и незабываемым впечатлением. </p>
    </div>
    
    <p><i>Если у Вас возникли дополнительные вопросы, отправьте их на 
        <a id="mailto" href="mailto:support@transfer365.az">support@transfer365.az</a>
        Мы обязательно Вам ответим!</i></p>
</div>
<?php endif ?>
<?php if ($lang == 'en'): ?>
<div id="final" class="container">
    <div class="jumbotron">
        <p>Thank you for choosing <span id="transfer-word">Transfer365</span>.
            Our team will contact you ASAP.</p>
        <p>The confirmation of your order is sent to your mail.</p>
        <p>We hope that your visit to <a href="http://www.azerbaijans.com/content_1407_en.html" target="_blank">Azerbaijan</a> will provide 
            you with unforgettable and pleasant impressions! 
             </p>
    </div>
    
    <p><i>If you have any further questions, please don't hesitate to contact. Please feel free to call us on +994509990365 / +994705550365 or send an e-mail to 
        <a id="mailto" href="mailto:support@transfer365.az">support@transfer365.az</a>
        We would be delighted to provide you with detailed information!</i></p>
</div>
<?php endif ?>

