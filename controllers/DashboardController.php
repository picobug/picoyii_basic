<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\dashboard\ProduksiSearch;
use app\models\dashboard\MesinSearch;

/*
 * Dashboard Bawang Berlian Custom
 * @author Julian <picobug.jp@gmail.com>
 * @since 1.0
 */

class DashboardController extends Controller {
	public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    public function actionIndex() {
        return $this->render('@view/site/index');
    }

}
