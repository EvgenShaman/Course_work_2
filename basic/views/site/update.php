<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
])
?>
<div id="cb">
    <?= $form->field($model, 'cost') ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'picture_name') ?>
    <div>
        <div class='col-lg-offset-1 col-lg-11'>
            <?= Html::submitButton('Применить', ['class' => 'btn btn-primary']) ?>
        </div> 
    </div>
    <?php ActiveForm::end() ?>
</div> 
