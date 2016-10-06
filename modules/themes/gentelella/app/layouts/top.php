<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>
<div class="top_nav">
  <div class="nav_menu">
    <nav class="" role="navigation">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <?= Html::img(Yii::$app->user->identity->profile->getImageUrl(),['alt'=>Yii::$app->user->identity->profile->name]) ?><?= Yii::$app->user->identity->profile->name ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><?= Html::a('Profile',['/user/settings/profile']) ?></li>
            <li>
              <?= Html::a(
                  Html::tag('i','',['class'=>'fa fa-sign-out pull-right']).' Log Out',
                  ['/user/logout'],
                  ['data-method' => 'post']
              ) ?>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
