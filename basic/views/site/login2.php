<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
])
?>
<div id="cb">
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password') ?>
    <div>
        <div class='col-lg-offset-1 col-lg-11'>
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
        </div> 
    </div>
    <?php ActiveForm::end() ?>
</div> 
