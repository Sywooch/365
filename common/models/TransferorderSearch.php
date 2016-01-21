<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Transferorder;

/**
 * TransferorderSearch represents the model behind the search form about `common\models\Transferorder`.
 */
class TransferorderSearch extends Transferorder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'pickuptime', 'car', 'amount', 'seat'], 'integer'],
            [['lastname', 'firstname', 'email', 'phone', 'phone1', 'flightnumber', 'notes', 'type', 'from', 'to', 'anotherd', 'anotherd1', 'anotherd2', 'currency', 'return', 'gsign', 'address'], 'safe'],
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
        $query = Transferorder::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'pickuptime' => $this->pickuptime,
            'car' => $this->car,
            'amount' => $this->amount,
            'seat' => $this->seat,
        ]);

        $query->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'phone1', $this->phone1])
            ->andFilterWhere(['like', 'flightnumber', $this->flightnumber])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'to', $this->to])
            ->andFilterWhere(['like', 'anotherd', $this->anotherd])
            ->andFilterWhere(['like', 'anotherd1', $this->anotherd1])
            ->andFilterWhere(['like', 'anotherd2', $this->anotherd2])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'return', $this->return])
            ->andFilterWhere(['like', 'gsign', $this->gsign])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
