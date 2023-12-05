<?php
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

<div id="menu">
    <a class="menu_button" onclick="menu_func('mask', 'menu', 'cb')"><img id="logo3" src="lotus.png" alt="Логотип" X-UA-Compatible width="50px" height="50px"></a>
    <a class="menu_navigation" href="home">Главная</a>
    <a class="menu_navigation" href="catalogue">Каталог</a>
    <a class="menu_navigation" href="add">Корзина</a>
    <a class="menu_navigation" href="add">Работникам</a>
</div>
<body>
    
    <div id="cb">
        <b style="font-size: 10svh; ">
            Добро пожаловать!
        </b>
        <p a style="font-size: 5svh; margin-top: 7svh;">Не упустите по истине уникальный шанс отведать нашу прекрасную выпечку и насладиться нашим, лучшим в городе, чаем! Нажмите на каталог, чтобы увидеть полный список товаров!</p>
        <b style="font-size: 10svh; ">
            Наши товары:
        </b>
        <div style="display: flex; margin-top: 7svh;">
            <?php echo Html::img('@web/icons/Donut.png', ["height"=>"300px", 'width'=>"300px", "style"=>"margin: 9svh"]); ?>
            <?php echo Html::img('@web/icons/MMMM.png', ["height"=>"300px", 'width'=>"300px", "style"=>"margin: 9svh"] ); ?>
            <?php echo Html::img('@web/icons/Statue.png', ["height"=>"300px", 'width'=>"300px", "style"=>"margin: 9svh"]); ?>
        </div>
    </div>
 
</body>
</div>
