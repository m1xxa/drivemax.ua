<?php

namespace frontend\models\search;

use frontend\models\Glass;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CategorySearch represents the model behind the search form about `frontend\models\Category`.
 */
class GlassSearch extends Glass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'euro_cod', 'price'], 'integer'],
            [['name', 'kuzov', 'years', 'size', 'params', 'brand', 'color'], 'safe'],
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
        $query = Glass::find();

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
            'euro_cod' => $this->euro_cod,
            'price' => $this->price,

        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'kuzov', $this->kuzov])
            ->andFilterWhere(['like', 'years', $this->years])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'params', $this->params])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'color', $this->color]);


        return $dataProvider;
    }
}
