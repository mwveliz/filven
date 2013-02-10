<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="container">  
<form id="formulario" action="<?php echo url_for('informe/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Título</label>
  	 <?php echo $form['titulo_informe']->render(array('class' => 'input','id' => 'titulo_informe')) ?>
	<p class="hint">Introduzca el título del informe</p>
</div>  
<div class="field">
	<label for="name">Fecha</label>
  	 <?php echo $form['fecha_informe']->render(array('class' => 'fecha_informe')) ?>
	<p class="hint">Introduzca la fecha de creación del informe</p>
</div> 
<div class="field">
	<label for="name">Creador por</label>
  	 <?php echo $form['creado_por']->render(array('class' => 'input','id' => 'creado_por')) ?>
	<p class="hint">Introduzca el nombre de la persona que elaborará el informe</p>
</div> 
        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button" value="Enviar" />    
</form>
</div>