<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tab_placas".
 *
 * @property int $id_placa
 * @property string $placa Placa del automotor
 * @property int $id_servicio Identificador de el tipo de servicio
 * @property int $id_clase Descripción de la clase del automotor y placa
 * @property int $id_agencia Id Agencia
 * @property string|null $fecha_llegada Fecha en que la placa es entregada a la EPM desde la ANT y se registra en el sistema
 * @property string $fecha_registro_sistema Fecha en la que se ingresa en el sistema
 * @property string|null $fecha_entrega_usuario Fecha en la que se entregó la placa al usuario
 * @property string $disponibilidad_placa Indica si la placa está disponible para ser retirada
 * @property string $observacion Observacion de la placa del reporte del sistema Axis, donde se verifica el estado en que se encuentra la placa, puede ser ninguna o en fabricación
 * @property string|null $estanteria Numero de estanteria donde se encuentra la placa que se pretende ingresar al sistema
 * @property string $estado_entrega Estado en el que esta la placa, puede ser si o no
 * @property string $fecha_entrega_sistema Fecha real en la que se realiza la actualización en el sistema de la entrega de placas
 * @property string $tipo_persona_entrega Tipo de persona a la que se entrega la placa, particular o gestor
 * @property string $nombre_persona_entrega Nombre de la persona que retira la placa sea gestor o particular.
 * @property string $usuario_ingreso Nombre de usuario que ingresa la placa al sistema
 * @property string|null $usuario_entrega Usuario que entrega la placa y cambia de estado a la misma
 * @property int $estado_placa Estado de la placa, cero (0) significa que no está entregada y uno (1) significa que ya fue entregada
 * @property string|null $orden_axis Numero de orden del sistema axis cloud
 * @property string|null $tramite_axis Numero de tramite sacado del sistema Axis.
 *
 * @property TabGestoresPlaca[] $tabGestoresPlacas
 * @property TabTipoServicio $servicio
 * @property TabClaseAutomotor $clase
 * @property TabAgencia $agencia
 */
class TabPlacas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_placas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['placa', 'id_servicio', 'id_clase', 'id_agencia', 'fecha_registro_sistema', 'disponibilidad_placa', 'tipo_persona_entrega', 'nombre_persona_entrega', 'usuario_ingreso'], 'required'],
            [['id_servicio', 'id_clase', 'id_agencia', 'estado_placa'], 'integer'],
            [['fecha_llegada', 'fecha_registro_sistema', 'fecha_entrega_usuario', 'fecha_entrega_sistema'], 'safe'],
            [['placa'], 'string', 'max' => 7],
            [['disponibilidad_placa'], 'string', 'max' => 100],
            [['observacion'], 'string', 'max' => 500],
            [['estanteria'], 'string', 'max' => 5],
            [['estado_entrega'], 'string', 'max' => 2],
            [['tipo_persona_entrega', 'nombre_persona_entrega', 'usuario_ingreso', 'usuario_entrega'], 'string', 'max' => 250],
            [['orden_axis', 'tramite_axis'], 'string', 'max' => 10],
            [['id_servicio'], 'exist', 'skipOnError' => true, 'targetClass' => TabTipoServicio::className(), 'targetAttribute' => ['id_servicio' => 'id_servicio']],
            [['id_clase'], 'exist', 'skipOnError' => true, 'targetClass' => TabClaseAutomotor::className(), 'targetAttribute' => ['id_clase' => 'id_clase']],
            [['id_agencia'], 'exist', 'skipOnError' => true, 'targetClass' => TabAgencias::className(), 'targetAttribute' => ['id_agencia' => 'id_agencia']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_placa' => 'Id Placa',
            'placa' => 'Placa',
            'id_servicio' => 'Tipo Servicio',
            'id_clase' => 'Clase automotor',
            'id_agencia' => 'Agencia',
            'fecha_llegada' => 'Fecha de llegada',
            'fecha_registro_sistema' => 'Fecha Sistema',
            'fecha_entrega_usuario' => 'Fecha Entrega Usuario',
            'disponibilidad_placa' => 'Está disponible?',
            'observacion' => 'Observacion',
            'estanteria' => 'Estanteria',
            'estado_entrega' => 'Está Entregada?',
            'fecha_entrega_sistema' => 'Fecha Entrega Sistema',
            'tipo_persona_entrega' => 'Tipo Persona Entrega',
            'nombre_persona_entrega' => 'Nombre Persona Entrega',
            'usuario_ingreso' => 'Usuario Ingreso',
            'usuario_entrega' => 'Usuario Entrega',
            'estado_placa' => 'Estado Placa',
            'orden_axis' => 'Orden Axis',
            'tramite_axis' => 'Tramite Axis',
        ];
    }

    /**
     * Gets query for [[TabGestoresPlacas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabGestoresPlacas()
    {
        return $this->hasMany(TabGestoresPlaca::className(), ['tab_placas_id_placa' => 'id_placa']);
    }

    /**
     * Gets query for [[Servicio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServicio()
    {
        return $this->hasOne(TabTipoServicio::className(), ['id_servicio' => 'id_servicio']);
    }

    /**
     * Gets query for [[Clase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClase()
    {
        return $this->hasOne(TabClaseAutomotor::className(), ['id_clase' => 'id_clase']);
    }

    /**
     * Gets query for [[Agencia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgencia()
    {
        return $this->hasOne(TabAgencias::className(), ['id_agencia' => 'id_agencia']);
    }
}
