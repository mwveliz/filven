<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="container">  
<form id="formulario" action="<?php echo url_for('sala/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Nombre sala</label>
  	 <?php echo $form['nombre_sala']->render(array('class' => 'input','id' => 'nombre_sala')) ?>
	<p class="hint">Introduzca el nombre de la sala</p>
</div>  
<div class="field">
	<label for="name">Descripción</label>
  	 <?php echo $form['descripcion_sala']->render(array('class' => 'input textarea','id' => 'descripcion_sala')) ?>
	<p class="hint">Introduzca la descripción de la sala</p>
</div>        
        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button" value="Enviar" />    
</form>
</div>