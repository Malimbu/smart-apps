<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'id_sidikjari',
                'nama',
                'alamat',
                'kelamin',
                'nip',
                'hp',
            ],
        ]) ?>
    </div>
</div>