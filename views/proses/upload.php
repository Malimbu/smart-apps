<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Upload File';
$this->params['breadcrumbs'][] = $this->title . ' Excel';

?>


<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Menu
	        </div>
	        <div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
				    <li role="presentation" class="active"><?= Html::a('Upload <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>', ['upload']) ?></li>
				    <li role="presentation"><?= Html::a('Proses <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>', ['proses']) ?></li>
				</ul>
	        </div>
	    </div>

	</div>

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">


	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Form Upload
	        </div>
	        <div class="panel-body">
				<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

				    <?= $form->field($model, 'imageFile')->fileInput()->label('File Excel') ?>

				    <button class="btn btn-primary"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
				    <!-- <button class="btn btn-primary"><span class="glyphicon glyphicon-download" aria-hidden="true"></span> Proses Data</button> -->
				    <?php // = Html::a('asd', null, ['class'=>'btn btn-primary', 'id'=>'excel'  ]) ?>

				<?php ActiveForm::end() ?>

	        </div>
	    </div>


	</div>

</div>


<?php

	$sa = "
		$('#excel').click(function(){

			$.get('index.php?=proses/get-nilsa', {zip:67},function(data){
				alert(data);
			});
		});
	
	";

	$this->registerJs($sa);





?>




