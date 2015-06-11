<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Turma;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Avaliacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avaliacao-form">

    <?php $form = ActiveForm::begin(['method' => 'GET', 'action' => \yii\helpers\Url::to(['avaliacao/avaliar'])]); ?>

    <?= $form->field($turma, 'id')->dropDownList(ArrayHelper::map(Turma::find()->all(), 'id', 'descricao'), ['prompt' => '---- Turmas ----', 'name'=> 'turma'])->label('Selecione a sua turma') ?>



    <div class="form-group">
        <?= Html::submitButton('Avaliar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
