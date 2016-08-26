<?php

namespace app\controllers;

use Yii;
use app\models\Absensi;

class LaporanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new \yii\base\DynamicModel(['bulan', 'flag', 'id_pegawai']);
        $model->addRule(['bulan', 'id_pegawai'], 'required');

        $model->flag='no'; // Flag  for Repoort

        if ( $model->load(Yii::$app->request->post())) {
            $model->flag='yes';
            $query = Absensi::find()->where('month(tanggal)=:Tg', [':Tg'=>$model->bulan]);
            if($model->id_pegawai != 0){
                $query=$query->andWhere(['id_pegawai'=>$model->id_pegawai]);
            }
            $query=$query->all();

            return $this->render('index', ['model' => $model, 'data'=>$query]);


        } else {
            return $this->render('index', ['model' => $model]);
        }

    }

}
