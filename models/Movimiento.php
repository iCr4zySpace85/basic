<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimiento".
 *
 * @property int $id
 * @property string|null $fecha
 * @property int|null $estado
 */
class Movimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado'], 'integer'],
            [['fecha'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
        ];
    }
}
