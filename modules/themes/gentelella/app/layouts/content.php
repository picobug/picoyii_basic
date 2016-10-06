<?php
use yii\helpers\Html;
use yii\helpers\Url;
use lo\modules\noty\Wrapper;

$uniq = Yii::$app->controller->id.'_'.Yii::$app->controller->action->id;
?>
<div class="right_col <?= $uniq ?>" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?= Wrapper::widget([
                'layerClass' => 'lo\modules\noty\layers\Noty',
            ]); ?>
        </div>
    </div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <?= $content ?>
    </div>
  </div>
</div>
