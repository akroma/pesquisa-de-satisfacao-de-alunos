<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="turma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?php foreach($itens as $item): ?>


        <?php
            $avaliadoTurma = new \app\models\AvaliadoTurma();
        ?>

        <?= $form->field($avaliadoTurma, '['.$item->id.']id_avaliado')->checkbox(['label' => $item->nome])?>
        <?= $form->field($avaliadoTurma, '['.$item->id.']id_turma')->textInput(['value' => 1,'type' => 'hidden', 'checked' => 'checked'])->label(false) ?>

    <?php endforeach; ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
