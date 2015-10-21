<?php
/* @var $this SiteController */
/* @var $model ListaAlunosForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - ListaAlunos';
$this->breadcrumbs=array(
    'ListaAlunos',
);
?>

    <h1>Lista de Alunos</h1>

<?php if(Yii::app()->user->hasFlash('listaAlunos')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('listaAlunos'); ?>
    </div>

<?php else: ?>

    <p>
        Lista de alunos de uma determinada turma.
    </p>

    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'listaAlunos-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

        <?php echo $form->errorSummary($model); ?>


        <?php $this->endWidget(); ?>

    </div><!-- form -->




<?php endif; ?>