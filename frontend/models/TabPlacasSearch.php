<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TabPlacas;

/**
 * TabPlacasSearch represents the model behind the search form of `frontend\models\TabPlacas`.
 */
class TabPlacasSearch extends TabPlacas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_placa', 'id_servicio', 'id_clase', 'id_agencia', 'estado_placa'], 'integer'],
            [['placa', 'fecha_llegada', 'fecha_registro_sistema', 'fecha_entrega_usuario', 'disponibilidad_placa', 'observacion', 'estanteria', 'estado_entrega', 'fecha_entrega_sistema', 'tipo_persona_entrega', 'nombre_persona_entrega', 'usuario_ingreso', 'usuario_entrega', 'orden_axis', 'tramite_axis'], 'safe'],
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
        $query = TabPlacas::find();

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
            'id_placa' => $this->id_placa,
            'id_servicio' => $this->id_servicio,
            'id_clase' => $this->id_clase,
            'id_agencia' => $this->id_agencia,
            'fecha_llegada' => $this->fecha_llegada,
            'fecha_registro_sistema' => $this->fecha_registro_sistema,
            'fecha_entrega_usuario' => $this->fecha_entrega_usuario,
            'fecha_entrega_sistema' => $this->fecha_entrega_sistema,
            'estado_placa' => $this->estado_placa,
        ]);

        $query->andFilterWhere(['like', 'placa', $this->placa])
            ->andFilterWhere(['like', 'disponibilidad_placa', $this->disponibilidad_placa])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'estanteria', $this->estanteria])
            ->andFilterWhere(['like', 'estado_entrega', $this->estado_entrega])
            ->andFilterWhere(['like', 'tipo_persona_entrega', $this->tipo_persona_entrega])
            ->andFilterWhere(['like', 'nombre_persona_entrega', $this->nombre_persona_entrega])
            ->andFilterWhere(['like', 'usuario_ingreso', $this->usuario_ingreso])
            ->andFilterWhere(['like', 'usuario_entrega', $this->usuario_entrega])
            ->andFilterWhere(['like', 'orden_axis', $this->orden_axis])
            ->andFilterWhere(['like', 'tramite_axis', $this->tramite_axis]);

        return $dataProvider;
    }
}
