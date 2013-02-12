<br>
      <?php
        list($anio,$mes,$dia) = explode("-",$Visitante->getFecha());
        $anio = substr($anio,-2);
        $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
      ?> 
<h1 style="padding-left: 50px;">Visitantes del día <? echo $formato_fecha ?></h1>
<table class="tabla_show">
  <tbody>
     <?
        $visitante_hora = $Visitante->getHora();
        $visitante_numero = $Visitante->getNumero();
        $Sala = SalaQuery::create()->filterById($Visitante->getIdSala())->findOne();
        if (count($Sala) > 0) {
            $visitante_sala = $Sala->getNombreSala();
        } else {
            $visitante_sala = '--';
        }
        $Acceso = AccesoQuery::create()->filterById($Visitante->getIdAcceso())->findOne();
        if (count($Acceso) > 0) {
            $visitante_acceso = $Acceso->getNombre();
        } else {
            $visitante_acceso = '--';
        }        
        if ($Visitante->getHora() == '') $visitante_hora = '--';
     ?>
    <tr>          
      <th style="text-align:right; width:30%">Hora:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $visitante_hora ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>  
    <tr>
      <th style="text-align:right; width:30%">Número de visitantes:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo number_format($visitante_numero) ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>
    <tr>
      <th style="text-align:right; width:30%">Sala:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $visitante_sala ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>
    <tr>
      <th style="text-align:right; width:30%">Acceso:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $visitante_acceso ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>    
  </tbody>
</table>
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('list.png'),'visitante/index',array('title' => 'Ver'))?>
<?php echo link_to(image_tag('edit.png'),'visitante/edit?id='.$Visitante->getId(),array('title' => 'Editar'))?>
</p>
