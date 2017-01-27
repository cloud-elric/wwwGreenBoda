<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_usuarios".
 *
 * @property string $id_usuario
 * @property string $txt_nombre_completo
 * @property string $txt_telefono_casa
 * @property string $txt_cp
 * @property string $txt_ocupacion
 * @property string $txt_email
 * @property string $txt_telefono_celular
 * @property string $txt_url_video
 */
class EntUsuarios extends \yii\db\ActiveRecord
{
	
	public $video;
	public $repeatEmail;
	public $repeatCelular;
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
            [['txt_nombre_completo', 'txt_telefono_casa', 'txt_cp', 'txt_ocupacion', 'txt_email', 'txt_telefono_celular', 'txt_url_video', 'repeatEmail', 'repeatCelular'], 'required', 'message'=>'Campo requerido'],
        		['txt_email', 'email', 'message'=>'Formato de email no admitido'],
        		['repeatEmail', 'email', 'message'=>'Formato de email no admitido'],
        	[
        		'repeatEmail',
        		'compare',
        		'compareAttribute' => 'txt_email',
        		'message' => 'Email no coincide'
        				],
        		[
        		'repeatCelular',
        		'compare',
        		'compareAttribute' => 'txt_telefono_celular',
        		'message' => 'Télefono celular no coincide'
        				],
        		
        	[['txt_cp'], 'string', 'max' => 5, 'min'=>5, 'tooShort'=>'Mínimo 5 dígitos'],
            [['txt_nombre_completo',   'txt_ocupacion', 'txt_email', 'txt_url_video'], 'string', 'max' => 200],
            [['txt_telefono_celular', 'txt_telefono_casa', 'repeatCelular'], 'string', 'max' => 10],
        		[['txt_telefono_celular', 'txt_telefono_casa', 'repeatCelular'], 'string', 'min' => 10, 'tooShort'=>'Mínimo 10 digitos'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'txt_nombre_completo' => 'Txt Nombre Completo',
            'txt_telefono_casa' => 'Txt Telefono Casa',
            'txt_cp' => 'Txt Cp',
            'txt_ocupacion' => 'Txt Ocupacion',
            'txt_email' => 'Txt Email',
            'txt_telefono_celular' => 'Txt Telefono Celular',
            'txt_url_video' => 'Txt Url Video',
        ];
    }
}
