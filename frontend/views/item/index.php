<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['action' => ['item/index'], 'options' => ['method' => 'post']]) ?>
    <select name="category" style="margin-top: 20px; margin-bottom: 20px;">
        <option value="0">Select Category</option>
        <?php foreach (\app\models\ItemCategory::find()->all() as $s): ?>
            <option value="<?= $s->id ?>"><?= $s->name ?></option>
        <?php endforeach; ?>
    </select>
    <?= Html::submitButton('Filter', ['class' => 'btn btn-success btn-sm']) ?>
    <?php ActiveForm::end();?>

    <?php  foreach ($model as $row) { ?>
        <div class="col-xs-6" style="margin-bottom: 20px;">
            <div class="product-image" style="border: 1px solid red; padding: 20px; border-radius: 14px;">
                <div>
                    <?= Html::img($row->image,['alt'=>$row->image]) ?>
                    <h2><?= $row->name ?></h2>
                    <h3>Rp. <?= number_format($row->price, 2) ?></h3>
                    <?= Html::a('Beli', ['add-to-cart', 'id' => $row->id], ['class' => 'btn btn-success'])?>
                    <?= Html::a('Detail', ['view', 'id' => $row->id], ['class' => 'btn btn-info'])?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
