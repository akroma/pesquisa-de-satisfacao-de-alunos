<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avaliado".
 *
 * @property integer $id
 * @property string $nome
 * @property string $tipo
 *
 * @property Avaliacao[] $avaliacaos
 * @property AvaliadoTurma[] $avaliadoTurmas
 */
class Avaliado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'avaliado';
    }

    private $tipo;

    public static function getTipo()
    {
        return array(
            'PRO' => 'Professor',
            'ESC' => 'Escola',
            'SEC' => 'Secretaria',
            'CAN' => 'Cantina'
            );
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['tipo'], 'string'],
            [['nome'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacaos()
    {
        return $this->hasMany(Avaliacao::className(), ['id_avaliado' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliadoTurmas()
    {
        return $this->hasMany(AvaliadoTurma::className(), ['id_avaliado' => 'id']);
    }
}
