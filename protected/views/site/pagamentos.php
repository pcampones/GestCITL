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
            'id'=>'contact-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

        <p class="note">Fields with <span class="required">*</span> are required. BLA BLA</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo Yii::app()->user->name; ?>
            <?php echo $form->error($model,'name'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email'); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'subject'); ?>
            <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
            <?php echo $form->error($model,'subject'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'body'); ?>
            <?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'body'); ?>
        </div>



        <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->




<?php endif; ?>