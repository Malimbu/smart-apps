<?php

namespace app\controllers;

use app\models\Absensi;
use Yii;
use app\models\AbsensiTmp;
use PHPExcel_IOFactory;

use app\models\UploadForm;
use yii\web\UploadedFile;


class ProsesController extends \yii\web\Controller
{
    public function actionIndex()
    {

    $model = new \yii\base\DynamicModel([
        'file'
    ]);
    $model->addRule(['file'], 'required');



        if (Yii::$app->request->isPost) {


       


	        // Yii::$app->session->setFlash('info', 'Proses Sukses');
	        // Yii::$app->session->setFlash('info', 'Setting Krs Online Suksess');
	    	// return $this->redirect(['index']);
	    	return $this->render('index', ['model'=>$model]);


	    } else {    	
	    	return $this->render('index', ['model'=>$model]);
	    }





    }



    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
            	$this->transfer();
        		return $this->redirect(['proses']);
            }
        } else {        	
        	return $this->render('upload', ['model' => $model]);
        }

    }

    public function actionProses()
    {
    	
    $model = new \yii\base\DynamicModel(['bulan']);
    $model->addRule(['bulan'], 'required');


        if ( $model->load(Yii::$app->request->post())) {
//            $absenTmp=AbsensiTmp::find()->where('month(tanggal)=:Month', [':Month'=>$model->bulan])->all();
            $absenTmp=AbsensiTmp::find()->where('month(tanggal)=:Tg', [':Tg'=>$model->bulan])->all();

            Absensi::deleteAll('month(tanggal)=:Tg', [':Tg'=>$model->bulan]);

            foreach ($absenTmp as $item) {
                $absenModel=new Absensi();
                $absenModel->id_pegawai=$item->id_pegawai;
                $absenModel->tanggal=$item->tanggal;
                $absenModel->masuk=$item->masuk;
                $absenModel->keluar=$item->keluar;
                $absenModel->terlambat=$item->terlambat;
                $absenModel->pulang_awal=$item->pulang_awal;
                $absenModel->absen=$item->absen;
                $absenModel->total=$item->total;


                if($absenModel->validate()){
                    $absenModel->save();
                } else {
                    print_r($absenModel->getErrors());
                }
            }

//            print_r($absenTmp);exit();

//            $this->redirect(['proses']);
            return $this->render('import', ['model' => $model]);


        } else {        	
        	return $this->render('import', ['model' => $model]);
        }


		// return $this->render('import');
    }

    public function Transfer()
    {


		$fileName = "uploads/data.xls";
	    $objPHPExcel = PHPExcel_IOFactory::load($fileName);

        $s=5;


        AbsensiTmp::deleteAll();

        for($i=0; $i<=140; $i++){

            $colA=$objPHPExcel->getActiveSheet()->getCell("A{$s}");

            if ( strlen($colA) <=0 ) {
                exit();
            } else {
                $id=$objPHPExcel->getActiveSheet()->getCell("A{$s}")->getFormattedValue();
                $nama=$objPHPExcel->getActiveSheet()->getCell("B{$s}");
                $tgl=$objPHPExcel->getActiveSheet()->getCell("D{$s}")->getFormattedValue();
                $masuk=$objPHPExcel->getActiveSheet()->getCell("E{$s}")->getFormattedValue();
                $keluar=$objPHPExcel->getActiveSheet()->getCell("F{$s}")->getFormattedValue();
                $terlambat=$objPHPExcel->getActiveSheet()->getCell("I{$s}")->getFormattedValue();
                $pulang=$objPHPExcel->getActiveSheet()->getCell("I{$s}")->getFormattedValue();
                $absen=$objPHPExcel->getActiveSheet()->getCell("K{$s}")->getFormattedValue();
                $total=$objPHPExcel->getActiveSheet()->getCell("L{$s}")->getFormattedValue();
//                $total=$objPHPExcel->getActiveSheet()->getCell();

//                $data[]=$objPHPExcel->getActiveSheet()->getCell("L{$s}");

                // prepare sql and bind parameters

                $model=new AbsensiTmp();
               $model->id_pegawai=$id;
                $model->tanggal=$tgl;
                $model->masuk=$masuk;
                $model->keluar=$keluar;
                $model->terlambat=$terlambat;
                $model->pulang_awal=$pulang;
                $model->absen=$absen;
                $model->total=$total;
                $model->save();



            }
            $s++;
        }

    }

    public function actionGetNil()
    {
    	return "Gafur";
    }


}
