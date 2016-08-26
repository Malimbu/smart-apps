<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absensi_tmp".
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
 */
class AbsensiTmp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absensi_tmp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'terlambat', 'pulang_awal', 'absen', 'total'], 'integer'],
            [['tanggal', 'masuk', 'keluar'], 'safe'],
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
}
