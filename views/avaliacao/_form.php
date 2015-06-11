<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Avaliacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avaliacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_item')->textInput() ?>

    <?= $form->field($model, 'id_avaliado')->textInput() ?>

    <?= $form->field($model, 'importancia')->dropDownList([ 'A' => 'A', 'M' => 'M', 'B' => 'B', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'satisfacao')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 'NA' => 'NA', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
