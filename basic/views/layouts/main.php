<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<header class="upper_panel">
        <a class="menu_button" onclick="menu_func('mask', 'menu', 'cb')"><img id="logo2" src="../static/icons/cake.png" th:src="@{/icons/cake.png}" alt="Логотип" X-UA-Compatible width="50px" height="50px"></a> 
        <a class="main_link" href="../../"><?php echo Html::img('@web/icons/Cake.png', ['id' => 'logo2']); ?></a>
        <nav style="width: max-content"> 
            <a href="../../site/catalogue"> Каталог </a>
            <a href="../../site/worker">Работникам</a>
        </nav> 
    </header>
<body class="cb" style="position=fixed">
<?php $this->beginBody() ?>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>


<?php $this->endBody() ?>
</body>
<footer class="content-container">2022© EvgenShaman. ALL RIGHTS RESERVED</footer>
</html>
<?php $this->endPage() ?>
