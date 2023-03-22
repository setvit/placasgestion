<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tab_agencias".
 *
 * @property int $id_agencia Id de cada agencia
 * @property string $descripcion_agencia Nombre de la agencia
 *
 * @property TabPlaca[] $tabPlacas
 */
class TabAgencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_agencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion_agencia'], 'required'],
            [['descripcion_agencia'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_agencia' => 'Id Agencia',
            'descripcion_agencia' => 'Descripcion Agencia',
        ];
    }

    /**
     * Gets query for [[TabPlacas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabPlacas()
    {
        return $this->hasMany(TabPlacas::className(), ['id_agencia' => 'id_agencia']);
    }
}
