<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Avaliacao;

/**
 * AvaliacaoSearch represents the model behind the search form about `\app\models\Avaliacao`.
 */
class AvaliacaoSearch extends Avaliacao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_item', 'id_avaliado'], 'integer'],
            [['importancia', 'satisfacao', 'descricao'], 'safe'],
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
        $query = Avaliacao::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_item' => $this->id_item,
            'id_avaliado' => $this->id_avaliado,
        ]);

        $query->andFilterWhere(['like', 'importancia', $this->importancia])
            ->andFilterWhere(['like', 'satisfacao', $this->satisfacao])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
