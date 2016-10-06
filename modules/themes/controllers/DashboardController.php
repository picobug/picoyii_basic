<?php

namespace app\modules\themes\controllers;

use yii\web\Controller;
use Yii;

/*
 * Dashboard PicoYii Basic Custom
 * @author Julian <picobug.jp@gmail.com>
 * @since 1.0
 */

class DashboardController extends Controller {

    public function actionIndex() {
        $this->render('index',[
        ]);
    }

}
