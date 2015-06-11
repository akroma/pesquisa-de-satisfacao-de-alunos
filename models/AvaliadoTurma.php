<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avaliado_turma".
 *
 * @property integer $id_avaliado
 * @property string $id_turma
 *
 * @property Avaliado $idAvaliado
 */
class AvaliadoTurma extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'avaliado_turma';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_avaliado', 'id_turma'], 'required'],
            [['id_avaliado', 'id_turma'], 'integer'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_avaliado' => 'Id Avaliado',
            'id_turma' => 'Id Turma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAvaliado()
    {
        return $this->hasOne(Avaliado::className(), ['id' => 'id_avaliado']);
    }
}
