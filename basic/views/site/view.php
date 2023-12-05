<?php
use yii\widgets\DetailView;
?>
<div id="cb">
<?php
echo DetailView::widget([
'model' => $model,
'attributes' => [
    'food_id',
    'cost',
    'name',
    'picture_name'
],
]);
?>
</div>