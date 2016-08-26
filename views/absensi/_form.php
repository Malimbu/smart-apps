<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Absensi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absensi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'masuk')->textInput() ?>

    <?= $form->field($model, 'keluar')->textInput() ?>

    <?= $form->field($model, 'terlambat')->textInput() ?>

    <?= $form->field($model, 'pulang_awal')->textInput() ?>

    <?= $form->field($model, 'absen')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
