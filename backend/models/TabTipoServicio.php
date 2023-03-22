<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tab_tipo_servicio".
 *
 * @property int $id_servicio Identificador de el tipo de servicio
 * @property string $descripcion_servicio Descripción del tipo de servicio del vehiculo y placa
 *
 * @property TabPlaca[] $tabPlacas
 */
class TabTipoServicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_tipo_servicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion_servicio'], 'required'],
            [['descripcion_servicio'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_servicio' => 'Id Servicio',
            'descripcion_servicio' => 'Descripcion Servicio',
        ];
    }

    /**
     * Gets query for [[TabPlacas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabPlacas()
    {
        return $this->hasMany(TabPlaca::className(), ['id_servicio' => 'id_servicio']);
    }
}
