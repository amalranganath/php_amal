<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap4\Modal;
use app\models\Team;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Team';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <h2><?= Html::encode($this->title) ?> <?= Html::a('+ Add New', ['create'], ['class' => 'btn  btn-info btn-sm float-right']) ?></h2>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            'email:email',
            'telephone',
            'route',
            [
                'class' => ActionColumn::className(),
                'headerOptions' => ['style' => 'width:12%'],
                'urlCreator' => function ($action, Team $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="view"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1.125em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M573 241C518 136 411 64 288 64S58 136 3 241a32 32 0 000 30c55 105 162 177 285 177s230-72 285-177a32 32 0 000-30zM288 400a144 144 0 11144-144 144 144 0 01-144 144zm0-240a95 95 0 00-25 4 48 48 0 01-67 67 96 96 0 1092-71z"></path></svg></span>', $url, [
                            'title' => Yii::t('app', 'view'),
                            'class' => ' modal-popup'
                        ]);
                    },
                ]
            ],
        ],
        'tableOptions' => ['class' => 'table table-sm table-bordered table-hover'],
    ]);
    ?>

</div>

<?php
/* Modal Popup */
Modal::begin([
    'id' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div id='modalContent'>Hello</div>";
Modal::end();

$this->registerJs("
$('.modal-popup').click(function(e){
    e.preventDefault();
    $('#modal').modal('show')
    .find('#modalContent')
    .load($(this).attr('href'), function() {
        if($('.modal-header h2').length > 0 ){
            $('.modal-header h2').remove();
        }
        $('.team-view h2').prependTo('.modal-header');
    });
});

", yii\web\View::POS_END);
