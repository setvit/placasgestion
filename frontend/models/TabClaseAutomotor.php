<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tab_clase_automotor".
 *
 * @property int $id_clase Identificador de la clase del automotor
 * @property string $descripcion_clase Descripción de la clase del automotor y placa
 *
 * @property TabPlaca[] $tabPlacas
 */
class TabClaseAutomotor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_clase_automotor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion_clase'], 'required'],
            [['descripcion_clase'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_clase' => 'Id Clase',
            'descripcion_clase' => 'Descripcion Clase',
        ];
    }

    /**
     * Gets query for [[TabPlacas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabPlacas()
    {
        return $this->hasMany(TabPlaca::className(), ['id_clase' => 'id_clase']);
    }
}
