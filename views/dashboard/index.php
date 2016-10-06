<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\BahanBakuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Dashboard Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">
<?php if (Yii::$app->user->can('produksi')): ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Produksi Logs</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <?php
                $gridColumn = [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['attribute' => 'id', 'visible' => false],
                    'nama',
                    'produksi',
                    [
                        'label'=>'Jumlah',
                        'attribute'=>'jumlah',
                        'value'=>function($model){
                            return ((float)$model->jumlah);
                        }
                    ],
                    'created_at'
                ];
                ?>
                <?= GridView::widget([
                    'dataProvider' => $dps,
                    'filterModel' => $ps,
                    'columns' => $gridColumn,
                    'pjax' => true,
                    'responsive'=>true,
                    'hover'=>true,
                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bahan-baku']],
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
                    ],
                    'export' => false,
                    // your toolbar can include the additional full export menu
                    'toolbar' => [
                        [
                            'content'=>Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/dashboard/index'], ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
                        ],
                        '{export}',
                        ExportMenu::widget([
                            'dataProvider' => $dps,
                            'columns' => $gridColumn,
                            'target' => ExportMenu::TARGET_BLANK,
                            'fontAwesome' => true,
                            'dropdownOptions' => [
                                'label' => 'Full',
                                'class' => 'btn btn-default',
                                'itemsBefore' => [
                                    '<li class="dropdown-header">Export All Data</li>',
                                ],
                            ],
                            'exportConfig' => [
                                ExportMenu::FORMAT_PDF => false
                            ]
                        ]) ,
                    ],
                ]); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
<?php if (Yii::$app->user->can('mesin')): ?>    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Mesin Logs</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <?php
                $gridColumn = [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['attribute' => 'id', 'visible' => false],
                    'nama',
                    'mesin',
                    [
                        'label'=>'Jumlah',
                        'attribute'=>'jumlah',
                        'value'=>function($model){
                            return ((float)$model->jumlah);
                        }
                    ],
                    'created_at'
                ];
                ?>
                <?= GridView::widget([
                    'dataProvider' => $dms,
                    'filterModel' => $ms,
                    'columns' => $gridColumn,
                    'pjax' => true,
                    'responsive'=>true,
                    'hover'=>true,
                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bahan-baku']],
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
                    ],
                    'export' => false,
                    // your toolbar can include the additional full export menu
                    'toolbar' => [
                        [
                            'content'=>Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/dashboard/index'], ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
                        ],
                        '{export}',
                        ExportMenu::widget([
                            'dataProvider' => $dms,
                            'columns' => $gridColumn,
                            'target' => ExportMenu::TARGET_BLANK,
                            'fontAwesome' => true,
                            'dropdownOptions' => [
                                'label' => 'Full',
                                'class' => 'btn btn-default',
                                'itemsBefore' => [
                                    '<li class="dropdown-header">Export All Data</li>',
                                ],
                            ],
                            'exportConfig' => [
                                ExportMenu::FORMAT_PDF => false
                            ]
                        ]) ,
                    ],
                ]); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
</div>
