<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$AccountModel=\app\models\Pegawai::find()
    ->select(["id", "nama"])
    ->asArray()->all();

$listPegawai=ArrayHelper::map($AccountModel,'id', 'nama');

$listPegawai[0]='-- Semua -- ';


/* @var $this yii\web\View */
$this->title = 'Laporan';
$this->params['breadcrumbs'][] = $this->title;

$listBulan=[1=>'Januari', 2=>'Februari', 3=>'Maret', 4=>'April', 5=>'Mei', 6=>'Juni', 7=>'Juli', 8=>'Agustus', 9=>'September', 10=>'Oktober', 11=>'November', 12=>'Desember'];

?>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Form Absensi
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'bulan')->dropDownList($listBulan) ?>
                <?= $form->field($model, 'id_pegawai')->dropDownList($listPegawai)->label('Nama Pegawai') ?>

                <?= Html::submitButton('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Proses', ['class' => 'btn btn-primary']) ?>

                <?php ActiveForm::end(); ?>



            </div>
        </div>



        <?php if($model->flag=='yes') : ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-book" aria-hidden="true"></span> Laporan Absensi
                    <span class="pull-right"><?= Html::a('<span class="glyphicon glyphicon-download" aria-hidden="true"></span> Download Excel', ['export', 'bulan'=>$bulan, 'id_pegawai'=>$id_pegawai], ['class'=>'btn btn-primary btn-xs']) ?></span>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center; vertical-align: middle">NO.</th>
                                <th rowspan="2" style="text-align: center; vertical-align: middle">NAMA</th>
                                <th rowspan="2" style="text-align: center; vertical-align: middle">TANGGAL</th>
                                <th colspan="4" style="text-align: center">KEHADIRAN</th>
                            </tr>
                            <tr>
                                <th style="text-align: center">MASUK</th>
                                <th style="text-align: center">KELUAR</th>
                                <th style="text-align: center">TERLAMBAT</th>
                                <th style="text-align: center">P. AWAL</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($data as $key => $item) { ?>
                            <tr>
                                <td style="text-align: center"><?= $key+1 ?></td>
                                <td style="text-align: center"><?= $item->idPegawai->nama ?></td>
                                <td style="text-align: center"><?= Yii::$app->formatter->asDate($item->tanggal, 'dd-MM-yyyy') ?></td>
                                <td style="text-align: center"><?= Yii::$app->formatter->asTime($item->masuk, 'HH:mm') ?></td>
                                <td style="text-align: center"><?= Yii::$app->formatter->asTime($item->keluar, 'HH:mm') ?></td>
                                <td style="text-align: center"><?= $item->terlambat ?></td>
                                <td style="text-align: center"><?= $item->pulang_awal ?></td>
                            </tr>
                        <?php }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php endif; ?>






    </div>

</div>