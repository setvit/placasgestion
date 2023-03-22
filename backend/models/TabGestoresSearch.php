<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TabGestores;

/**
 * TabGestoresSearch represents the model behind the search form of `backend\models\TabGestores`.
 */
class TabGestoresSearch extends TabGestores
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gestor'], 'integer'],
            [['cedula_gestor', 'nombres_gestor', 'apellidos_gestor', 'casa_comercial', 'celular', 'correo', 'fotografia_gestor'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TabGestores::find();

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
            'id_gestor' => $this->id_gestor,
        ]);

        $query->andFilterWhere(['like', 'cedula_gestor', $this->cedula_gestor])
            ->andFilterWhere(['like', 'nombres_gestor', $this->nombres_gestor])
            ->andFilterWhere(['like', 'apellidos_gestor', $this->apellidos_gestor])
            ->andFilterWhere(['like', 'casa_comercial', $this->casa_comercial])
            ->andFilterWhere(['like', 'celular', $this->celular])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'fotografia_gestor', $this->fotografia_gestor]);

        return $dataProvider;
    }
}
