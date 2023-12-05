<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;
?>
    <div id="cb" style="margin-left: -10%">
            <?php 
                foreach($rows as $row) {
                    echo "<div style='margin: 5%'>";
                    echo Html::img(('@web/icons/' . $row['picture_name']), ["height"=>"300px", 'width'=>"300px"]);
                    echo "<div><b>Название: " . $row['name'] . "</div>";
                    echo "<div>Цена: " . $row['cost'] . "</div></b>";
                    echo "</div>";
                }
            ?>
    </div>
</body>