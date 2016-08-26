<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Pegawai';
$this->params['breadcrumbs'][] = $this->title;

$listBulan=[1=>'Januari', 2=>'Februari', 3=>'Maret', 4=>'April', 5=>'Mei', 6=>'Juni', 7=>'Juli', 8=>'Agustus', 9=>'September', 10=>'Oktober', 11=>'November', 12=>'Desember'];

?>

<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

	    <div class="panel panel-default">
	        <div class="panel-heading">
	            Menu
	        </div>
	        <div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
				    <li role="presentation"><?= Html::a('Upload', ['upload']) ?></li>
				    <li role="presentation" class="active"><?= Html::a('Proses', ['proses']) ?></li>
				</ul>
	        </div>
	    </div>

	</div>

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">


	    <div class="panel panel-default">
	        <div class="panel-heading">
	            Form Proses Data
	        </div>
	        <div class="panel-body">
				<?php $form = ActiveForm::begin(); ?>

		      	<?= $form->field($model, 'bulan')->dropDownList($listBulan) ?>

			    <?= Html::submitButton('Proses', ['class' => 'btn btn-primary']) ?>    

				<?php ActiveForm::end(); ?>	
	        </div>
	    </div>


	</div>

</div>