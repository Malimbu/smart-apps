<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawai';
$this->params['flag'] = 'modal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">


    <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Tambah', ['create'], ['class' => 'btn btn-primary', 'data-toggle'=>'modal', 'data-target'=>'#myModal', 'data-size'=>'sm2', 'data-icon'=>'plus', 'data-title'=>'Tambah Arsip']) ?>
    
    <?php Pjax::begin(['id'=>'myGrid']); ?>    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'id_sidikjari',
            'nama',
            'alamat',
            'kelamin',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view} {delete}',
                'header'=>'Action',
                'buttons'=>[
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', ['update', 'id'=>$model->id], ['class'=>'btn btn-xs btn-primary', 'data-toggle'=>'modal', 'data-icon'=>'pencil','data-target'=>'#myModal', 'data-title'=>'Update Arsip']);
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-th-list"></span>', ['view', 'id'=>$model->id], ['class'=>'btn btn-xs btn-primary', 'data-toggle'=>'modal', 'data-target'=>'#myModal', 'data-icon'=>'list', 'data-title'=>'Disposisi' ]   ) ;
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', ['delete', 'id' => $model->id], [ 'class'=>'btn btn-xs btn-primary btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ]
            ],

        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>