<?php
/* @var $this SiteController */
/* @var $model PagamentosForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Pagamentos';
$this->breadcrumbs=array(
    'Pagamentos',
);
?>

<h1>Pagamentos</h1>

<?php if(Yii::app()->user->hasFlash('pagamentos')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('pagamentos'); ?>
    </div>

<?php else: ?>

<p>
    Pagamentos genericos e pagamentos em atraso.
</p>

    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'pagamentos-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Pagamentos gerais'); ?>
            <?php echo CHtml::submitButton('Pagamentos atrasados'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->




<?php endif; ?>