<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="container">  
<form id="formulario" action="<?php echo url_for('visitante/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Fecha</label>
  	 <?php echo $form['fecha'] ?>
	<p class="hint">Seleccione la fecha deseada</p>
</div>  
<div class="field">
	<label for="name">Número de visitantes</label>
  	 <?php echo $form['numero']->render(array('class' => 'input','id' => 'numero')) ?>
	<p class="hint">Introduzca el número de visitantes</p>
</div>        
        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button" value="Enviar" />    
</form>
</div>