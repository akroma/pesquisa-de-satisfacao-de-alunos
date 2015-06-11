<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avaliacao".
 *
 * @property integer $id
 * @property integer $id_item
 * @property integer $id_avaliado
 * @property string $importancia
 * @property string $satisfacao
 * @property string $descricao
 *
 * @property Avaliado $idAvaliado
 * @property Item $idItem
 */
class Avaliacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'avaliacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_item', 'id_avaliado', 'importancia', 'satisfacao'], 'required'],
            [['id_item', 'id_avaliado'], 'integer'],
            [['importancia', 'satisfacao', 'descricao'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_item' => 'Item',
            'id_avaliado' => 'Avaliado',
            'importancia' => 'Nível de Importância',
            'satisfacao' => 'Nível de Satisfação',
            'descricao' => 'Descrição   ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAvaliado()
    {
        return $this->hasOne(Avaliado::className(), ['id' => 'id_avaliado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'id_item']);
    }
}
