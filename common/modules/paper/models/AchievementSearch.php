<?php

namespace common\modules\paper\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\paper\models\Achievement;

/**
 * AchievementSearch represents the model behind the search form about `common\models\Achievement`.
 */
class AchievementSearch extends Achievement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','cate'], 'integer'],
            [['year_id'], 'string'],
            [['author', 'title', 'periodical', 'year', 'address', 'serial_number', 'ei', 'hint'], 'safe'],
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
        $query = Achievement::find();

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
            'year' => $this->year,
            'cate' => $this->cate,
        ]);

        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'year_id', $this->year_id])
            //->andFilterWhere(['like', 'cate', $this->cate])
            ->andFilterWhere(['like', 'periodical', $this->periodical])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'ei', $this->ei])
            ->andFilterWhere(['like', 'hint', $this->hint]);

        return $dataProvider;
    }
}
