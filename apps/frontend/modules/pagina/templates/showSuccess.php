<br>
<h1 style="padding-left: 50px;">Página</h1>
<table class="tabla_show">
  <tbody>
    <tr>
          <?
          $Informe = InformeQuery::create()->filterById($Pagina->getIdInforme())->findOne();
          if (count($Informe ) > 0) {
              $informe = $Informe ->getTituloInforme();
          } else {
              $Informe  = '--';
          }
        ?>        
      <th style="text-align:right; width:30%">Informe:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $informe  ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>  
    <tr>
      <th style="text-align:right; width:30%">Título del informe:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Pagina->getTituloInforme() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr> 
    <tr>
      <th style="text-align:right; width:30%">Ante cuadro:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Pagina->getAnteCuadro() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr> 
    <tr>
      <th style="text-align:right; width:30%">Título cuadro:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Pagina->getTituloCuadro() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>    
     <tr>
      <th style="text-align:right; width:30%">Post cuadro:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Pagina->getPostCuadro() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>    
    <tr>
      <th style="text-align:right; width:30%">Texto posterior:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Pagina->getTextoPosterior() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>      
    <tr>
      <th style="text-align:right; width:30%">Ante gráfico:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Pagina->getAnteGrafico() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>      
     <tr>
      <th style="text-align:right; width:30%">Post gráfico:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Pagina->getPostGrafico() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>     
      <tr>
      <th style="text-align:right; width:30%">Tipo de gráfico:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Pagina->getTipoGrafico() ?></td>
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
<?php echo link_to(image_tag('list.png'),'pagina/index',array('title' => 'Ver listado'))?>
<?php echo link_to(image_tag('edit.png'),'pagina/edit?id='.$Pagina->getId(),array('title' => 'Editar'))?>
<?php echo link_to(image_tag('delete.png'), 'pagina/delete?id='.$Pagina->getId(), array('method' => 'delete', 'confirm' => 'Seguro desea eliminar?')) ?>
</p>    
    