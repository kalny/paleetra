<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Brif;

/**
 * BrifSearch represents the model behind the search form about `backend\models\Brif`.
 */
class BrifSearch extends Brif
{

    public $date_from;
    public $date_to;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'site_i18n', 'design_logo_style', 'design_style_redesign', 'content_materials', 'content_photography', 'tech_mobile'], 'integer'],
            [['common_fullname', 'common_domain', 'common_contact_fullname', 'common_contact_details', 'common_terms', 'common_notes', 'company_scope', 'company_features', 'company_competitors', 'company_notes', 'target_audience', 'problem_task', 'problem_action', 'site_parts', 'design_examples', 'design_bad_examples', 'design_effect', 'design_notes', 'content_author', 'content_manager', 'tech_cms', 'tech_soft', 'tech_pay'], 'safe'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
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
        $query = Brif::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['created_at' => SORT_DESC],
            ]
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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'common_fullname', $this->common_fullname])
            ->andFilterWhere(['>=', 'created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);;

        return $dataProvider;
    }
}
