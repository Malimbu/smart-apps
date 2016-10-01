<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'enableAjaxValidation'=>true,
        'validationUrl'=>Url::toRoute('pegawai2/validation')
        ]); ?>

    <?= $form->errorSummary($model) ?>
    
    <?= $form->field($model, 'id_sidikjari')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?php // = $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?php // = $form->field($model, 'kelamin')->dropDownList(['L'=>'Laki-Laki', 'P'=>'Perempuan']) ?>

    <?php // = $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <?php // = $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>

    <div class="form-group pull-right">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-floppy-disk"></span> Simpan' : '<span class="glyphicon glyphicon-edit"></span> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>


<?php

$script = <<< JS


    $('form#{$model->formName()}').on('beforeSubmit',function(e)
    {

        var \$form = $(this);

        $.post(
            \$form.attr("action"), 
            \$form.serialize()
        )

            .done(function(result){
                if(result=='success') {
                    $(document).find("#myModal").modal("hide");
                    $.pjax.reload({container:"#myGrid"});
                } else {
                    alert("Terjadi Kesalahan");
                }
            }).fail(function(){
                alert("Terjadi Kesalahan");
                console.log("server error");
            });

            return false;

    });

    $('#hapus').on('click',function(e)
    {

     

        alert(234);

            return false;

    });

JS;

$this->registerJs($script);

?>
