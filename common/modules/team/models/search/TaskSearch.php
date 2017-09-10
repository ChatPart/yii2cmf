<?php

namespace common\modules\team\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\team\models\Task;

/**
 * TaskSearch represents the model behind the search form about `common\modules\team\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'task_list_id', 'title', 'description', 'member', 'begin_at', 'end_at', 'file', 'commit', 'cover', 'status', 'created_at', 'detail_list_id', 'sequence'], 'safe'],
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
        $query = Task::find();

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
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'task_list_id', $this->task_list_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'member', $this->member])
            ->andFilterWhere(['like', 'begin_at', $this->begin_at])
            ->andFilterWhere(['like', 'end_at', $this->end_at])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'commit', $this->commit])
            ->andFilterWhere(['like', 'cover', $this->cover])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'detail_list_id', $this->detail_list_id])
            ->andFilterWhere(['like', 'sequence', $this->sequence]);

        return $dataProvider;
    }
}
