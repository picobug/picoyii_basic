<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="picodio">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login no-js">
<?php $this->beginBody() ?>
    <div class="se-pre-con"></div>
    <div id="loader">
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?= $content ?>
          </section>
        </div>
      </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
