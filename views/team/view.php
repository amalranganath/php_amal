<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Team */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="team-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <?=
    DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table table-bordered table-md'],
        'attributes' => [
            'id',
            'name',
            'email:email',
            'telephone',
            'route',
            [
                'attribute' => 'joined_date',
                'value' => function ($model, $key) { 
                    return date("d M Y", strtotime($model->joined_date));
                },
            ],
            'comment:ntext',
        ],
    ])
    ?>

</div>
