<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Pegawai;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id_pegawai',
            [
                'attribute'=>'id_pegawai',
                'value'=>  function ($model){
                    return $model->idPegawai->nama;
                }
            ],
//            [
//                'attribute' => 'id_pegawai',
//                'format'=>'raw',
//                'filter' => Pegawai::listGuru() ,
//                'value'=>  function ($model){
//                    return $model->idPegawai->nama;
//                }
//            ],
            'tanggal',

            'masuk',
            'keluar',
             'terlambat',
            // 'pulang_awal',
            // 'absen',
            // 'total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
