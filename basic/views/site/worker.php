<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>

<div id="cb">

<?php
echo HTML::a("Настройки аккаунтов", ["accountmanagement"],['class' => 'btn btn-info']);
echo HTML::a("Добавить блюдо", ["add"],['class' => 'btn btn-info', 'background-color' => '#f78de5']);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' =>[
        'food_id',
        'cost',
        'name',
        'picture_name',
        ['class' => 'yii\grid\ActionColumn']
    ]
]);
?>
</div>