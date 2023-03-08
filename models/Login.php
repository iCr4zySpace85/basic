<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string|null $accessToken
 * @property string|null $authKey
 * @property int $perfil_id
 *
 * @property Perfil $perfil
 * @property Usuario[] $usuarios
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'login';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'perfil_id'], 'required'],
            [['perfil_id'], 'integer'],
            [['username', 'password'], 'string', 'max' => 45],
            [['accessToken', 'authKey'], 'string', 'max' => 255],
            [['perfil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::class, 'targetAttribute' => ['perfil_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'accessToken' => 'Access Token',
            'authKey' => 'Auth Key',
            'perfil_id' => 'Perfil ID',
        ];
    }

    /**
     * Gets query for [[Perfil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::class, ['id' => 'perfil_id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::class, ['login_id' => 'id']);
    }
}
