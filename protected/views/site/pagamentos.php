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





<?php endif; ?>