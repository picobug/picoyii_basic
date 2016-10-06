<?php

/**
 * @copyright Copyright &copy; Gogodigital Srls
 * @company Gogodigital Srls - Wide ICT Solutions
 * @website http://www.gogodigital.it
 * @github https://github.com/cinghie/yii2-user-extended
 * @license GNU GENERAL PUBLIC LICENSE VERSION 3
 * @package yii2-user-extended
 * @version 0.5.2
 */

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
$form = ActiveForm::begin([
    'id'                     => 'registration-form',
    'enableAjaxValidation'   => false,
    'enableClientValidation' => true,
]);
?>
<h1>Create Account</h1>
<div class="row">

    <div class="col-md-6">

        <?= $form->field($model, 'firstname',
            ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1','placeholder' => 'First Name']]
        )->label(false) ?>

        <?= $form->field($model, 'email',
            ['inputOptions' => ['class' => 'form-control', 'tabindex' => '3', 'placeholder' => 'Email']]
        )->label(false) ?>

        <?= $form->field($model, 'username',
            ['inputOptions' => ['class' => 'form-control', 'tabindex' => '5', 'placeholder' => 'Username']]
        )->label(false) ?>

    </div>

    <div class="col-md-6">

        <?= $form->field($model, 'lastname',
            ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2', 'placeholder' => 'Last Name']]
        )->label(false) ?>

        <?= $form->field($model, 'birthday',
            ['inputOptions' => ['class' => 'form-control', 'tabindex' => '4']]
        )->label(false)
        ->widget(DatePicker::classname(), [
            'type' => DatePicker::TYPE_INPUT,
            'options' => ['placeholder' => 'Birthday'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ]) ?>

        <?php if ($module->enableGeneratingPassword == false): ?>
            <?= $form->field($model, 'password',
                ['inputOptions' => ['class' => 'form-control', 'tabindex' => '6', 'placeholder' => 'Password']]
            )->passwordInput()->label(false) ?>
        <?php endif ?>

    </div>

    <div class="col-md-12">

        <?= $form->field($model, 'captcha')->widget(Captcha::className(), [
            'captchaAction' => ['/site/captcha'],
            'options' => ['class' => 'form-control'],
            'template' => '<div class="row"><div class="col-md-6">{input}</div><div class="col-md-6">{image}</div></div>'
        ]) ?>

    </div>

    <div class="col-md-12">
        <div class="col-md-6">
            <?= $form->field($model, 'terms')->checkbox(['uncheck' => false, 'checked' => true]) ?>
        </div>
        <div class="col-md-6">
          <?= Html::submitButton(Yii::t('user', 'Register'), ['class' => 'btn btn-default submit']) ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="separator">
      <p class="change_link">Already a member ?
        <?= Html::a(Yii::t('user', 'Login'), ['/user/login'], ['class' => 'to_register']) ?>
      </p>

      <div class="clearfix"></div>
      <br />

      <div>
        <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
        <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
      </div>
    </div>

</div>

<?php ActiveForm::end(); ?>