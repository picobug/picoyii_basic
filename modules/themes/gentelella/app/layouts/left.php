<?php
use yii\widgets\Menu;
use yii\helpers\Html;
?>
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <?= Html::a(Html::tag('i','',['class'=>'fa fa-paw']).' '.Html::tag('span',Yii::$app->name),['/'],['class'=>'site_title']) ?>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile">
      <div class="profile_pic">
        <?= Html::img(Yii::$app->user->identity->profile->getImageUrl(),['alt'=>Yii::$app->user->identity->profile->name,'class'=>'img-circle profile_img']) ?>
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2><?= Yii::$app->user->identity->profile->name ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <div class="clearfix"></div>
    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <?php if(Yii::$app->user->identity->isAdmin || Yii::$app->user->can('admin')) : ?>
      <div class="menu_section">
        <h3>Admin</h3>
        <?= Menu::widget([
            'options' => ['class' => 'nav side-menu'],
            'items' => [
                [
                  'label' => 'System',
                  'url' => 'javascript:void(0)',
                  'template' => '<a href="{url}" ><i class="fa fa-bug"></i> {label}<span class="fa fa-chevron-down"></span></a>',
                  'items' => [
                    ['label'=>'User Admin','url'=>['/user/admin/index']],
                    ['label' => 'Gii', 'url' => ['/gii']],
                    ['label' => 'Debug', 'url' => ['/debug']]
                  ]
                ]
            ],
            'submenuTemplate' => "\n<ul class='nav child_menu'>\n{items}\n</ul>\n",
            'encodeLabels' => false,
            'activateParents' => true
        ]); ?>
      </div>
      <?php endif; ?>
      <?php if(Yii::$app->user->can('produksi')) : ?>
      <div class="menu_section">
        <h3>Produksi</h3>
        <?= Menu::widget([
            'options' => ['class' => 'nav side-menu'],
            'items' => [
                [
                  'label' => 'STOK',
                  'template' => '<a href="{url}" ><i class="fa fa-archive"></i> {label}<span class="fa fa-chevron-down"></span></a>',
                  'url' => 'javascript:void(0)',
                  'items' => [
                    ['label' => 'Bahan Baku', 'url' => ['/bahan-baku/index']],
                    ['label' => 'Hasil Produksi', 'url' => ['/hasil-produksi/index']]
                  ]
                ],
                ['label' => 'PRODUKSI', 'template' => '<a href="{url}" ><i class="fa fa-building"></i> {label}</a>', 'url' => ['/produksi/creating']],
                ['label' => 'HASIL PRODUKSI', 'template' => '<a href="{url}" ><i class="fa fa-clone"></i> {label}</a>', 'url' => ['/produksi/hasil']],
                ['label' => 'LAPORAN AKHIR', 'template' => '<a href="{url}" ><i class="fa fa-print"></i> {label}</a>', 'url' => ['/produksi/laporan']],
                [
                  'label' => 'PENGATURAN',
                  'template' => '<a href="{url}" ><i class="fa fa-cog"></i> {label}<span class="fa fa-chevron-down"></span></a>',
                  'url' => 'javascript:void(0)',
                  'items' => [
                    ['label' => 'Tambah Kategori', 'url' => ['/kategori/index']],
                    ['label' => 'Tambah Rumus', 'url' => ['/rumus-produksi/index']]
                  ]
                ]
            ],
            'submenuTemplate' => "\n<ul class='nav child_menu'>\n{items}\n</ul>\n",
            'encodeLabels' => false,
            'activateParents' => true
        ]); ?>
      </div>
      <?php endif; ?>
      <?php if(Yii::$app->user->can('mesin')) : ?>
      <div class="menu_section">
        <h3>Mesin
        <?php
            $mesins = app\modules\mesin\models\Mesin::find();
            $items = [];
            if($mesins->exists()){
                foreach($mesins->all() as $k => $mesin){
                    array_push($items,[
                        'label' => $mesin->nama_mesin,
                        'template' => '<a href="{url}" ><i class="fa fa-tachometer"></i> {label}</a>',
                        'url' => ['/mesin/update','id'=>$mesin->id]
                    ]);
                }
            }
            array_push($items,[
                'label' => 'ATUR KATEGORI',
                'template' => '<a href="{url}" ><i class="fa fa-gear"></i> {label}<span class="fa fa-chevron-down"></span></a>',
                'url' => 'javascript:void(0)',
                'items' => [
                ['label' => 'Mesin', 'icon' => 'fa fa-flag', 'url' => ['/mesin/index']],
                ['label' => 'Sparepart', 'icon' => 'fa fa-flag', 'url' => ['/sparepart/index']]
                ]
            ]);
        ?></h3>
        <?= Menu::widget([
            'options' => ['class' => 'nav side-menu'],
            'items' => $items,
            'submenuTemplate' => "\n<ul class='nav child_menu'>\n{items}\n</ul>\n",
            'encodeLabels' => false,
            'activateParents' => true
        ]); ?>
      </div>
      <?php endif; ?>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <?= Html::a(
        Html::tag('i','',['class'=>'glyphicon glyphicon-cog','aria-hidden'=>true]),
        ['/user/settings/account'],
        ['data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Settings']
      ) ?>
      <?= Html::a(
        Html::tag('i','',['class'=>'glyphicon glyphicon-user','aria-hidden'=>true]),
        ['/user/settings/profile'],
        ['data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Profile']
      ) ?>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <?= Html::a(
          Html::tag('i','',['class'=>'glyphicon glyphicon-off','aria-hidden'=>true]),
          ['/user/logout'],
          ['data-method' => 'post','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Logout']
      ) ?>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>
