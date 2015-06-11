<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Avaliacao */
/* @var $form yii\widgets\ActiveForm */
/* @var $this yii\web\View */
/* @var $model app\models\Avaliacao */
?>



<?php
$this->title = $turma->descricao . ' - Avaliação de Satisfação';
?>
<div class="avaliacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="avaliacao-form">


        <?php $form = ActiveForm::begin(); ?>

        <table class="table  table-responsive">


            <tbody>
            <?php $key = 0; ?>

            <?php foreach ($itens as  $item): ?>



            <?php
            $avaliados = [];


            if ($item->tipo != 'PRO') {
                $avaliados = [\app\models\Avaliado::find()->where(['tipo' => $item->tipo])->one()];
            } else {
                $avaliados = \app\models\Avaliado::find()->joinWith('avaliadoTurmas')->where(['tipo' => 'PRO', 'id_turma' => $turma->id])->all();
            }

            foreach ($avaliados as $avaliado) {

                $key++;


                $avaliacao = new \app\models\Avaliacao();

                echo $form->field($avaliacao, '['.$key.']id_item')->textInput(['type' => 'hidden', 'value' => $item->id])->label(false);
                echo $form->field($avaliacao, '['.$key.']id_turma')->textInput(['type' => 'hidden', 'value' => $turma->id])->label(false);
                echo $form->field($avaliacao, '['.$key.']id_avaliado')->textInput(['value' => $avaliado->id, 'type' => 'hidden'])->label(false);

                ?>
                <tr>
                    <td colspan="3">
                        <h4><?= $item->descricao; ?> <h5> <?= $item->tipo ==  'PRO' ? 'Professor(a) '. $avaliado->nome : ''; ?> </h5></h4>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $form->field($avaliacao, '['.$key.']importancia',
                            [
                                'horizontalCssClasses' => [
                                    'wrapper' => 'col-sm-1',
                                ]
                            ])->dropDownList($item->getNivelImportancia(), ['prompt' => ' Nível de Importância'])->label(false) ?>
                    </td>



                    <td>
                        <?= $form->field($avaliacao, '['.$key.']satisfacao',
                            [
                                'horizontalCssClasses' => [
                                    'wrapper' => 'col-sm-1',
                                ]
                            ])->dropDownList($item->getNivelSatisfacao(), ['prompt' => 'Nível de Satisfação'])->label(false) ?>

                    </td>
                </tr>

                <tr>
                    <td colspan="3" colspan="3" style="border: none">
                        <?= $form->field($avaliacao, '['.$key.']descricao')->textarea(['rows' => 3, 'placeholder' => 'Dúvidas, Sugestões e Reclamações'])->label(false) ?>
                    </td>
                </tr>
            <?php

            }
            ?>



            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="form-group">
            <?= Html::submitButton('Finalizar Avaliação', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>

</div>

