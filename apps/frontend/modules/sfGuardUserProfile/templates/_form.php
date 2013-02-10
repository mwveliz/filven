<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="container">  
<form id="formulario" action="<?php echo url_for('sfGuardUserProfile/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Tipo</label>
  	 <span class="select"><?php echo $form['user_id']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Selecciona el usuario</p>
</div>
<div class="field">
	<label for="name">Nombre</label>
  	 <?php echo $form['first_name']->render(array('class' => 'input','id' => 'first_name')) ?>
	<p class="hint">Introduzca el nombre del usuario</p>
</div>  
<div class="field">
	<label for="name">Apellido</label>
  	 <?php echo $form['last_name']->render(array('class' => 'input','id' => 'last_name')) ?>
	<p class="hint">Introduzca el apellido del usuario</p>
</div> 
<div class="field">
	<label for="name">Fecha de Nacimiento</label>
  	 <?php echo $form['birthday']->render(array('class'=>'birthday')) ;?>
	<p class="hint">Introduzca la fecha de nacimiento</p>
</div>      
        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button" value="Enviar" />    
</form>
</div>