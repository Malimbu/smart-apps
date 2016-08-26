<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "pegawai".
 *
 * @property integer $id
 * @property integer $id_sidikjari
 * @property string $nama
 * @property string $alamat
 * @property string $kelamin
 * @property string $nip
 * @property string $hp
 *
 * @property Absensi[] $absensis
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sidikjari'], 'integer'],
            [['nama', 'hp'], 'string', 'max' => 35],
            [['alamat'], 'string', 'max' => 85],
            [['kelamin'], 'string', 'max' => 1],
            [['nip'], 'string', 'max' => 45],
            [['id_sidikjari'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_sidikjari' => 'Id Sidikjari',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'kelamin' => 'Kelamin',
            'nip' => 'Nip',
            'hp' => 'Hp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbsensis()
    {
        return $this->hasMany(Absensi::className(), ['id_pegawai' => 'id']);
    }

    public static function listGuru() {
        $list=Pegawai::find()->select(['id','nama'])->asArray()->all();

//        $AccountModel=Pegawai::find()
//            ->select(["id", "nama"])
//            ->asArray()->all();
//
//        $listCashReceiptAccount=ArrayHelper::map($AccountModel,'id', 'nama');

        return $list;


    }

}
