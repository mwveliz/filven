<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<div class="container">  
<form id="formulario" action="<?php echo url_for('tipo_actividad/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Nombre</label>
  	 <?php echo $form['nombre_tipo']->render(array('class' => 'input','id' => 'nombre_tipo')) ?>
	<p class="hint">Introduzca el nombre del tipo de actividad</p>
</div>  
<div class="field">
	<label for="name">Descripción</label>
  	 <?php echo $form['descripcion_tipo']->render(array('class' => 'input textarea','id' => 'descripcion_tipo')) ?>
	<p class="hint">Introduzca la descripción de la actividad</p>
</div>        
        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button" value="Enviar" />    
</form>
</div>











