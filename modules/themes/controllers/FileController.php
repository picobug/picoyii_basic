<?php

namespace app\modules\themes\controllers;

use Yii;
use mdm\upload\FileController as Controller;
use yii\web\NotFoundHttpException;
use mdm\upload\FileModel;
use yii\imagine\Image;

/*
 * File Link Created modified Vendor Default
 * @author Julian <picobug.jp@gmail.com>
 * @since 1.0
 */

class FileController extends Controller {

    public $defaultAction = 'show';

    /**
     * Show file
     * @param integer $id
     */
    public function actionShow($id) {
        $model = $this->findModel($id);
        $response = Yii::$app->getResponse();
        return $response->sendFile($model->filename, $model->name, [
                    'mimeType' => $model->type,
                    'fileSize' => $model->size,
                    'inline' => true
        ]);
    }

    /**
     * Download file
     * @param integer $id
     * @param mixed $inline
     */
    public function actionDownload($id, $inline = false) {
        $model = $this->findModel($id);
        $response = Yii::$app->getResponse();
        return $response->sendFile($model->filename, $model->name, [
                    'mimeType' => $model->type,
                    'fileSize' => $model->size,
                    'inline' => $inline
        ]);
    }

    /**
     * Get model
     * @param integer $id
     * @return FileModel
     * @throws NotFoundHttpException
     */
    protected function findModel($id) {
        if (($model = FileModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionThumb($id = null, $width = 240, $height = 187) {
        $model = $this->findModel($id);
        $response = Yii::$app->getResponse();
        $name = pathinfo($model->name);
        Image::thumbnail($model->filename, $width, $height)->save(Yii::getAlias('@webroot/tmp/' . $model->id . '-' . $name['filename'] . '-' . $width . 'x' . $height . '.jpg'), ['quality' => 50]);
        return $response->sendFile(
                        Yii::getAlias('@webroot/tmp/' . $model->id . '-' . $name['filename'] . '-' . $width . 'x' . $height . '.jpg'), $model->name, [
                    'inline' => true
                        ]
        );
    }

}
