<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absensi".
 *
 * @property integer $id
 * @property integer $id_pegawai
 * @property string $tanggal
 * @property string $masuk
 * @property string $keluar
 * @property integer $terlambat
 * @property integer $pulang_awal
 * @property integer $absen
 * @property integer $total
 *
 * @property Pegawai $idPegawai
 */
class Absensi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absensi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['id'], 'required'],
            [['id', 'id_pegawai', 'terlambat', 'pulang_awal', 'absen', 'total'], 'integer'],
            [['tanggal', 'masuk', 'keluar'], 'safe'],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pegawai' => 'Id Pegawai',
            'tanggal' => 'Tanggal',
            'masuk' => 'Masuk',
            'keluar' => 'Keluar',
            'terlambat' => 'Terlambat',
            'pulang_awal' => 'Pulang Awal',
            'absen' => 'Absen',
            'total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['id' => 'id_pegawai']);
    }
}
