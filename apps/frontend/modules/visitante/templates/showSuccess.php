<br>
      <?php
        list($anio,$mes,$dia) = explode("-",$sf_params->get('fecha'));
        $anio = substr($anio,-2);
        $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
      ?> 
<h1 style="padding-left: 50px;">Visitantes del día <? echo $formato_fecha ?></h1>
<table class="tablas">
  <thead>
    <tr>
      <th>Fecha</th>
      <th>N° de visitantes</th>
      <th>Tipo de conteo</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <? $total = 0; ?> 
    <?php foreach($Visitantes as $Visitante) { ?>
    <tr>
      <?php
        list($anio,$mes,$dia) = explode("-",$Visitante->getFecha());
        $anio = substr($anio,-2);
        $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
      ?>         
      <td><center><?php echo $formato_fecha ?></center></td>
      <td>
          <center><?php echo number_format($Visitante->getNumero()) ?></center>
          <? $total += $Visitante->getNumero(); ?>
     </td>
      <td>
          <?
             if ($Visitante->getNumero() == 1) {
                 $conteo = 'Sticker';
             } else {
                 $conteo = 'Manual';
             }
             
             echo '<center>'.$conteo.'</center>';
          ?>
      </td>
      <td width="15%"><center><?php echo link_to(image_tag('ver.png'),'visitante/detalle?id='.$Visitante->getId(),array('title' => 'Ver detalle'))?>
          <?php echo link_to(image_tag('edit.png'),'visitante/edit?id='.$Visitante->getId().'&fecha='.$sf_params->get('fecha'),array('title' => 'Editar'))?>
          </center>
      </td>
   </tr>
    <?php } ?>
  </tbody>   
</table>
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<b style="padding-left: 100px; font-size: 16px;">Total de visitantes: </b><? echo '<span style="padding-left: 10px; font-size: 16px;">'.number_format($total).'</span>' ?>
</p>