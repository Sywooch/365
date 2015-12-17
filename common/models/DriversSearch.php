<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Drivers;

/**
 * DriversSearch represents the model behind the search form about `common\models\Drivers`.
 */
class DriversSearch extends Drivers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'car', 'count'], 'integer'],
            [['fullname', 'sname', 'fname', 'address', 'address1', 'idcardN', 'photo', 'phone', 'phone1', 'email', 'bday'], 'safe'],
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
        $query = Drivers::find();

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
            'car' => $this->car,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'sname', $this->sname])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'idcardN', $this->idcardN])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'phone1', $this->phone1])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'bday', $this->bday]);

        return $dataProvider;
    }
}
