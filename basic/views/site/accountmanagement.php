<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>

<div id="cb">

<?php
echo HTML::a("Настройки продуктов", ["worker"],['class' => 'btn btn-info']);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' =>[
        'usrid',
        'active',
        'password',
        'username',
        'points',
        "role"
    ]
]);
?>
</div>