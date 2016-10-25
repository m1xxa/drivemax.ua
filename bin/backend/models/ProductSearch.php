<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Product;

/**
 * ProductSearch represents the model behind the search form about `frontend\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */

    public $category_id;



    public function rules()
    {
        return [
            [['id', 'product_id', 'active', 'warehouse', 'qty', 'price_currency'], 'integer'],
            [['product_number', 'product_name', 'product_description', 'alias', 'category_id'], 'safe'],
            [['price_value',], 'double'],
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
        $query = Product::find()->with(['productWarehouse'])->joinWith(['category']);

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
            'product_id' => $this->product_id,
            'active' => $this->active,
            'qty' => $this->qty,
            'price_currency' => $this->currency->currency_id,
            'category_id' => $this->category->category_id,
            'warehouse' => $this->productWarehouse->warehouse_id,

        ]);

        $query
            ->andFilterWhere(['like', 'product_number', $this->product_number])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'product_description', $this->product_description])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'price_value', $this->price_value]);

        $dataProvider->sort->attributes['category_id'] = [
            'asc' => ['name' => SORT_ASC],
            'desc' => ['name' => SORT_DESC],
        ];


        return $dataProvider;
    }
}
