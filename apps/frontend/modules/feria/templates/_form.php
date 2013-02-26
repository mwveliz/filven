<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="container">  
<form id="formulario" action="<?php echo url_for('feria/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Nombre</label>
  	 <?php echo $form['descripcion']->render(array('class' => 'input','id' => 'descripcion')) ?>
	<p class="hint">Introduzca el nombre de la feria</p>
</div>  
<div class="field">
	<label for="name">Fecha de inicio</label>
  	 <?php echo $form['fecha_inicio']->render(array('id' => 'fecha_inicio','type' => 'date')) ?>
	<p class="hint">Seleccione la fecha de inicio</p>
</div>
<div class="field">
	<label for="name">Fecha de cierre</label>
  	 <?php echo $form['fecha_fin']->render(array('id' => 'fecha_fin','type' => 'date')) ?>
	<p class="hint">Seleccione la fecha de cierre</p>
</div>
        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button" value="Enviar" />    
</form>
</div>