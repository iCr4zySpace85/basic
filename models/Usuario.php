<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $fechaRegis
 * @property string $habilitado
 * @property int $login_id
 *
 * @property Login $login
 * @property Sensor[] $sensors
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'fechaRegis', 'habilitado', 'login_id'], 'required'],
            [['habilitado'], 'string'],
            [['login_id'], 'integer'],
            [['nombre', 'apellidos'], 'string', 'max' => 45],
            [['fechaRegis'], 'string', 'max' => 35],
            [['login_id'], 'exist', 'skipOnError' => true, 'targetClass' => Login::class, 'targetAttribute' => ['login_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'fechaRegis' => 'Fecha Regis',
            'habilitado' => 'Habilitado',
            'login_id' => 'Login ID',
        ];
    }

    /**
     * Gets query for [[Login]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogin()
    {
        return $this->hasOne(Login::class, ['id' => 'login_id']);
    }

    /**
     * Gets query for [[Sensors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSensors()
    {
        return $this->hasMany(Sensor::class, ['usuario_id' => 'id']);
    }
}
