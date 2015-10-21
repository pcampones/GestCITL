<?php
/* @var $this SiteController */
/* @var $model AgendaForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Agenda';
$this->breadcrumbs=array(
    'Agenda',
);
?>

    <h1>Agenda</h1>

<?php if(Yii::app()->user->hasFlash('agenda')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('agenda'); ?>
    </div>

<?php else: ?>

    <p>
        Agenda do professor.


    </p>

    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'agenda-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

        <?php echo $form->errorSummary($model); ?>



        <?php
        $link = array('site/listaAlunos');
        $arr = array(1 => CHtml::link('Aula nivel 1', $link), 2 => CHtml::link('Aula nivel 2', $link));

        echo $arr[1];
        echo '</br>';
        echo $arr[2];

        ?>

        <?php $this->endWidget(); ?>

    </div><!-- form -->




<?php endif; ?>