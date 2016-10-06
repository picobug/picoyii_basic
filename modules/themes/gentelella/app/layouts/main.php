<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\Modal;
AppAsset::register($this);
if (in_array(Yii::$app->controller->action->id, ['login','register','error']) && Yii::$app->user->isGuest) {
    echo $this->render('main-login',['content'=>$content]);
} else {
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="nav-md no-js">
<?php $this->beginBody() ?>
<div class="se-pre-con"></div>
<div id="loader" class="container body">
    <div class="main_container">
        <?php
            echo $this->render('left');
            echo $this->render('top');
            echo $this->render('content',[
                'content'=>$content
            ]);
            echo $this->render('footer');
        ?>
    </div>
</div>
<?php
Modal::begin([
    'header'=>'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4>Test</h4>',
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    "footer"=>'',
    'closeButton' => ['label' => ''],
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
    // 'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?php } ?>
