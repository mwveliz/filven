<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="container">  
<form id="formulario" action="<?php echo url_for('usuario/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Usuario</label>
  	 <?php echo $form['usuario']->render(array('class' => 'input','id' => 'nombre_sala')) ?>
	<p class="hint">Introduzca el nombre del usuario</p>
</div>  
<div class="field">
	<label for="name">Nombre</label>
  	 <?php echo $form['nombre']->render(array('class' => 'input','id' => 'nombre_sala')) ?>
	<p class="hint">Introduzca el nombre</p>
</div>
<div class="field">
	<label for="name">Apellido</label>
  	 <?php echo $form['apellido']->render(array('class' => 'input','id' => 'nombre_sala')) ?>
	<p class="hint">Introduzca el apellido del usuario</p>
</div>
<div class="field">
	<label for="name">Contraseña</label>
  	 <?php echo $form['password']->render(array('class' => 'input','id' => 'nombre_sala')) ?>
	<p class="hint">Introduzca la contraseña del usuario</p>
</div> 
<div class="field">
	<label for="name">Correo electrónico</label>
  	 <?php echo $form['email']->render(array('class' => 'input','id' => 'nombre_sala')) ?>
	<p class="hint">Introduzca el correo electronico del usuario</p>
</div> 
<div class="field">
	<label for="name">Telefono</label>
  	 <?php echo $form['telefono']->render(array('class' => 'input','id' => 'nombre_sala')) ?>
	<p class="hint">Introduzca el teléfono de contacto del usuario</p>
</div>
<div class="field">
	<label for="name">Sexo</label>
        <span class="select"><?php echo $form['sexo']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique el sexo del usuario</p>
</div> 
<br>
<div class="field">
	<label for="name">Activo</label>
        <span class="select"><?php echo $form['activo']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique si en caso de que es un usuario frecuente del sistema, no en caso de estar desactivado</p>
</div> 
<br>
<div class="field">
	<label for="name">Tipo de usuario</label>
        <span class="select">
            <select name="id_sf_guard_group" class="select">
              <? $id = $sf_params->get('id'); 
                 $Usuario = UsuarioQuery::create()->filterById($id)->findOne();
                 $selected1 = '';
                 $selected2 = 'selected';
                 if (count($Usuario) > 0) {
                   $id_sf_guard_group = $Usuario->getIdSfGuardGroup();
                   if ($id_sf_guard_group == 1) {
                      $selected1 = 'selected';
                      $selected2 = '';
                   } else {
                      $selected2 = 'selected';
                   }
                   $yo  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername(); 
                   $Usuario = UsuarioQuery::create()->filterByUsuario($yo)->findOne();
                   $id_sf_guard_group = $Usuario->getIdSfGuardGroup();
                   if ($id_sf_guard_group == 2 ) {
                      $selected1 = 'disabled="disabled"'; 
                   }
                 }                  
              ?>
              <option value="1" <? echo $selected1 ?>>Administrador</option>
              <option value="2" <? echo $selected2 ?>>Transcriptor</option>
            </select>
        </span>
	<p class="hint">Indique los privilegios del usuario</p>
</div> 
<br>
<br>
        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button" value="Enviar" />    
</form>
</div>
