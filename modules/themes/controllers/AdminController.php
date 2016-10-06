<?php

namespace app\modules\themes\controllers;

use cinghie\yii2userextended\controllers\AdminController as Controller;
use Yii;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use yii\filters\VerbFilter;

/*
 * Change Default Admin Route Access no Data Available
 * @author Julian <picobug.jp@gmail.com>
 * @since 1.0
 */

class AdminController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                    $user = Yii::$app->user->identity;
                    if (method_exists($user, 'getIsAdmin')) {
                        return $user->getIsAdmin();
                    } else {
                        return (\Yii::$app->getAuthManager() && $this->adminPermission ? \Yii::$app->user->can($this->adminPermission) : false) || in_array($this->username, $this->admins);
                    }
                },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'delete-multiple' => ['post'],
                    'confirm' => ['post'],
                    'block' => ['post'],
                ],
            ],
        ];
    }

}
