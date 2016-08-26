<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Pegawai';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
<div class="col-lg-5">
<h1>Import File Excel</h1>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

      <?= $form->field($model, 'file')->fileInput() ?>

<div class="box-footer text-right">
    <?= Html::submitButton('Proses', ['class' => 'btn btn-primary']) ?>    
</div>

<?php ActiveForm::end(); ?>	
</div>
</div>
