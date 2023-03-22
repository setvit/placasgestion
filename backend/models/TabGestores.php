<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tab_gestores".
 *
 * @property int $id_gestor Identificador unico para gestores de da placas en la mancomunidad
 * @property string $cedula_gestor Numero de cedula unico de cada gestor, no puede repetirse
 * @property string $nombres_gestor Nombres del Gestor
 * @property string $apellidos_gestor Apellidos del gestor
 * @property string $casa_comercial Nombre de la casa comercial a la que representa el gestor
 * @property string $celular NUmero de celular del gestor con el cual se le pueda contactar
 * @property string $correo Correo electronico institucional del gestor
 * @property resource|null $fotografia_gestor Campo que almacena la foto del gestor
 *
 * @property TabGestoresPlaca[] $tabGestoresPlacas
 */
class TabGestores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_gestores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_gestor', 'nombres_gestor', 'apellidos_gestor', 'casa_comercial', 'celular', 'correo'], 'required'],
            [['fotografia_gestor'], 'string'],
            [['cedula_gestor', 'celular'], 'string', 'max' => 10],
            [['nombres_gestor', 'apellidos_gestor'], 'string', 'max' => 200],
            [['casa_comercial'], 'string', 'max' => 500],
            [['correo'], 'string', 'max' => 100],
            [['cedula_gestor'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_gestor' => 'Id Gestor',
            'cedula_gestor' => 'Cedula Gestor',
            'nombres_gestor' => 'Nombres Gestor',
            'apellidos_gestor' => 'Apellidos Gestor',
            'casa_comercial' => 'Casa Comercial',
            'celular' => 'Celular',
            'correo' => 'Correo',
            'fotografia_gestor' => 'Fotografia Gestor',
        ];
    }

    /**
     * Gets query for [[TabGestoresPlacas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabGestoresPlacas()
    {
        return $this->hasMany(TabGestoresPlaca::className(), ['tab_gestores_id_gestor' => 'id_gestor']);
    }
}
