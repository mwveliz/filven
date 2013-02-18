<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="container">  
<form id="formulario" action="<?php echo url_for('ponente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Nombre</label>
  	 <?php echo $form['nombre']->render(array('class' => 'input','id' => 'nombre')) ?>
	<p class="hint">Introduzca el nombre y apellido del ponente</p>
</div>  
<div class="field">
	<label for="name">Nacionalidad</label>
  	 <span class="select"><?php echo $form['nacionalidad']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Seleccione la nacionalidad del ponente</p>
</div> 
<div class="field">
	<label for="name">Especialidad</label>
  	 <?php echo $form['especialidad']->render(array('class' => 'input','id' => 'especialidad')) ?>
	<p class="hint">Introduzca la especialidad del ponente</p>
</div> 
        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button" value="Enviar" />    
</form>
</div>