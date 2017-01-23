<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_usuarios".
 *
 * @property string $id_usuario
 * @property string $txt_nombre
 * @property string $txt_apellido_paterno
 * @property string $txt_apellido_materno
 * @property string $txt_email
 * @property string $txt_telefono_celular
 * @property string $txt_url_video
 */
class EntUsuarios extends \yii\db\ActiveRecord
{
	public $video;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_email', 'txt_telefono_celular', 'video'], 'required'],
            [['txt_nombre', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_email', 'txt_url_video'], 'string', 'max' => 200],
            [['txt_telefono_celular'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'txt_nombre' => 'Txt Nombre',
            'txt_apellido_paterno' => 'Txt Apellido Paterno',
            'txt_apellido_materno' => 'Txt Apellido Materno',
            'txt_email' => 'Txt Email',
            'txt_telefono_celular' => 'Txt Telefono Celular',
            'txt_url_video' => 'Txt Url Video',
        ];
    }
}
