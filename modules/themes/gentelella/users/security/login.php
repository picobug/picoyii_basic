<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<?php $form = ActiveForm::begin([
    'id'                     => 'login-form',
    'enableAjaxValidation'   => true,
    'enableClientValidation' => false,
    'validateOnBlur'         => false,
    'validateOnType'         => false,
    'validateOnChange'       => false,
]) ?>
<h1>Login Form</h1>
<?= $form->field(
    $model,
    'login',
    ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1','placeholder' => 'Username']]
)->label(false) ?>

<?= $form
    ->field(
        $model,
        'password',
        ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2', 'placeholder' => 'Password']]
    )
    ->passwordInput()->label(false) ?>

<?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>

<div>
    <?= Html::submitButton(
        Yii::t('user', 'Sign in'),
        ['class' => 'btn btn-default submit', 'tabindex' => '3']
    ) ?>

    <?= Html::a(
        Yii::t('user', 'Forgot password?'),
        ['/user/recovery/request'],
        ['tabindex' => '5','class'=>'reset_pass']
    ) ?>
</div>
<div class="clearfix"></div>
<div class="separator">
  <p class="change_link">New to site?
    <?= Html::a(Yii::t('user', 'Create Account'), ['/user/registration/register'],['class'=>'to_register']) ?>
  </p>

  <div class="clearfix"></div>
  <br />

  <div>
    <h1><i class="fa fa-paw"></i> <?= Yii::$app->name ?></h1>
    <p>©2016 All Rights Reserved. <?= Yii::$app->name ?> is a Bootstrap 3 template. Privacy and Terms</p>
  </div>
</div>

<?php ActiveForm::end(); ?>

