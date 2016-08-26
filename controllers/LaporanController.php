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
            $bulan=$model->bulan;
            $id_pegawai=$model->id_pegawai;

            $query = $this->getRecord($bulan, $id_pegawai);

            return $this->render('index', ['model' => $model, 'data'=>$query, 'bulan'=>$bulan, 'id_pegawai'=>$id_pegawai]);


        } else {
            return $this->render('index', ['model' => $model]);
        }

    }

    public function getRecord($bulan, $id_pegawai)
    {

        $query = Absensi::find()->where('month(tanggal)=:Tg', [':Tg'=>$bulan]);
        if($id_pegawai != 0){
            $query=$query->andWhere(['id_pegawai'=>$id_pegawai]);
        }

        return $query->all();

    }

    public function actionExport($bulan, $id_pegawai){
        $model = $this->getRecord($bulan, $id_pegawai) ;
        $filename = 'Data-'.Date('YmdGis').'-Absensi.xls';
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>TANGGAL</th>
                    <th>MASUK</th>
                    <th>KELUAR</th>
                    <th>TERLAMBAT</th>
                    <th>P. AWAL</th>
                </tr>
            </thead>';
            foreach($model as $key => $data){
                echo "
                    <tr>
                         <td>" . ( $key + 1 ) . "</td>
                         <td>" . $data->idPegawai->nama . "</td>
                         <td>" . $data->tanggal . "</td>
                         <td>" . $data->masuk . "</td>
                         <td>" . $data->keluar . "</td>
                         <td>" . $data->terlambat . "</td>
                         <td>" . $data->pulang_awal . "</td>
                    </tr>
                ";
            }
        echo '</table>';

    }


}
