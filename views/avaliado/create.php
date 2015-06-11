<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Avaliado */

$this->title = 'Create Avaliado';
$this->params['breadcrumbs'][] = ['label' => 'Avaliados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avaliado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
