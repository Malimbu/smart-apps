<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Absensi;

/**
 * AbsensiSearch represents the model behind the search form about `app\models\Absensi`.
 */
class AbsensiSearch extends Absensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pegawai', 'terlambat', 'pulang_awal', 'absen', 'total'], 'integer'],
            [['tanggal', 'masuk', 'keluar'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Absensi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_pegawai' => $this->id_pegawai,
            'tanggal' => $this->tanggal,
            'masuk' => $this->masuk,
            'keluar' => $this->keluar,
            'terlambat' => $this->terlambat,
            'pulang_awal' => $this->pulang_awal,
            'absen' => $this->absen,
            'total' => $this->total,
        ]);

        return $dataProvider;
    }
}
