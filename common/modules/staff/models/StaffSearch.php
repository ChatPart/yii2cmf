<?php

namespace common\modules\staff\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\staff\models\Staff;
use yii\data\Pagination;
use yii\data\Sort;

/**
 * StaffSearch represents the model behind the search form about `frontend\models\Staff`.
 */
class StaffSearch extends Staff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status','level'], 'integer'],
            [['gbkchart'], 'string'],
            [['type', 'name', 'public_email', 'icon', 'title', 'location', 'tel', 'education', 'resume', 'achievement', 'created_at', 'updated_at'], 'safe'],
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
        $query = Staff::find();

        // add conditions that should always apply here

        $pagination = new Pagination(['defaultPageSize' => 20]);
        $sort = new Sort([
            'attributes' => [
                'title',
                'name' => [
                    'asc' => ['level'=>SORT_DESC,'title'=> SORT_DESC,'CONVERT(name USING gbk)' => SORT_ASC, ],
                    'desc' => ['level'=>SORT_ASC,'title'=> SORT_ASC,'CONVERT(name USING gbk)' => SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => 'Name',
                ],
            ]
        ]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => $pagination,
            'sort' => $sort,
            /*'sort' => [
                'attributes' => [
                    'title',
                    'name' => [
                        'asc'  => ['CONVERT(title USING gbk)' => SORT_ASC],
                        'desc' => ['CONVERT(title USING gbk) ' => SORT_DESC],
                    ]
                ]
            ],*/
        ]);

       /* $dataProvider->setSort([
            'attributes' => [
                'name' => [
                    'asc'  => ['CONVERT(title USING gbk)' => SORT_ASC],
                    'desc' => ['CONVERT(title USING gbk) ' => SORT_DESC],
                ]
            ]
        ]);*/
//var_dump($params);die();
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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'gbkchart', $this->gbkchart])
            ->andFilterWhere(['like', 'public_email', $this->public_email])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'resume', $this->resume])
            ->andFilterWhere(['like', 'achievement', $this->achievement]);
        /*$query->andFilterWhere(['or','type=\'全职教师\'',
            'type=\'客座教授\'',
            'type=\'兼职教授\'',
            //'type=\'其他\''
        ]);*/

        return $dataProvider;
    }


    public function sortByPinyin($dataProvider, $params)
    {
        $sorts = $dataProvider->getSort();
        foreach($params as $param){
            $sorts->attributes[$param] = [
                'asc' => ["CONVERT($param USING gbk)" => SORT_ASC],
                'desc' => ["CONVERT($param USING gbk)" => SORT_DESC],
            ];
        }
        $dataProvider->setSort($sorts);
    }


}
