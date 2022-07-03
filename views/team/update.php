<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Team */

$this->title = 'Edit: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="team-update">

    <h2><?= Html::encode($this->title) ?> <?= Html::a('<< Back to List', ['team/'], ['class' => 'btn btn-info btn-sm float-right']) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
