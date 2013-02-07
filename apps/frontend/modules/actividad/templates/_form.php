<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<script>
   
$(function() {
    
    $('select.fecha_hora').change(function(){
        alert('www');
        $('select#actividad_fecha_hora_day').attr('enabled', true) ;
    });    
    
    
});
     
</script>


<form action="<?php echo url_for('actividad/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="tabla_usuario">
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('actividad/index') ?>">Ir al Listado</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Eliminar', 'actividad/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <tr><td> Fecha de la actividad: <?php echo $form['fecha_hora']->render(array('class'=>'fecha_hora')) ;?> <?php echo " " . $form['hora']?></td></tr>
      <tr><td> Tipo de Actividad: <?php echo $form['id_tipo_actividad']->render() ;?></td></tr>
      <tr><td> Sala: <?php echo $form['id_sala']->render() ;?></td></tr>
      <tr><td> Actividad: <?php echo $form['nombre_actividad'] ->render() ;?></td></tr>
      <tr><td> Ponente: <?php echo $form['ponente'] ->render() ;?></td></tr>
      <tr><td> Turno: <?php echo $form['turno'] ->render() ;?></td></tr>
      <tr><td> Ejecutada: <?php echo $form['ejecutada'] ->render() ;?></td></tr>
      <tr><td> Nro de Participantes sexo Masculino: <?php echo $form['cantidad_participantes_m'] ->render() ;?></td></tr>
      <tr><td> Nro de Participantes sexo Femenino: <?php echo $form['cantidad_participantes_f'] ->render() ;?></td></tr>
      <tr><td> Alcanzo el tiempo?: <?php echo $form['alcanzo_tiempo'] ->render() ;?></td></tr>
      <tr><td> Causas del Incumplimiento: <?php echo $form['causas_incumplimiento'] ->render() ;?></td></tr>
      <tr><td> Municipio: <?php echo $form['id_municipio'] ->render() ;?></td></tr>
      <tr><td> Escuela: <?php echo $form['escuela'] ->render() ;?></td></tr>
       <tr><td> Refugio: <?php echo $form['refugio'] ->render() ;?></td></tr>
      <tr><td> Observaciones: <?php echo $form['observaciones'] ->render() ;?></td></tr>
     <?php
     echo $form['_csrf_token']->render();
      
      ?>
      
    </tbody>
  </table>
</form>

