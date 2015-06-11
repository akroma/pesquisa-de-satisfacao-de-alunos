<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property string $descricao
 * @property string $item
 *
 * @property Avaliacao[] $avaliacaos
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    public static function getTipo()
    {
        return Avaliado::getTipo();

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao', 'item'], 'required'],
            [['item'], 'string'],
            [['descricao'], 'string', 'max' => 100],
            [['descricao'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descrição do Item',
            'item' => 'Item',
        ];
    }

    public function getNivelImportancia()
    {
        return ['A' => 'Alta', 'M' => 'Médio', 'B' => 'Baixa'];
    }

    public function getNivelSatisfacao()
    {
        return [1 => 'Ruim', 2 => 'Regular', 3 => 'Bom', 4 => 'Ótimo', 'NA' => 'Não se aplica'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacaos()
    {
        return $this->hasMany(Avaliacao::className(), ['id_item' => 'id']);
    }
}
