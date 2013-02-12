<br>
<center><h1>Visitantes</h1></center>
<br>
<table class="tablas">
  <thead>
    <tr>
      <th>Fecha</th>
      <th>Total</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($Visitantes as $Visitante) { ?>
    <tr>
      <?php
        list($anio,$mes,$dia) = explode("-",$Visitante);
        $anio = substr($anio,-2);
        $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
      ?>         
      <td><center><?php echo $formato_fecha ?></center></td>
      <td>
         <center>
          <? $Numeros =  VisitanteQuery::create()->filterByFecha($Visitante)->find();
             $total = 0;
             foreach($Numeros as $Numero) {
                 $total += $Numero->getNumero();
             }
             echo number_format($total);
          ?>
         </center>
      </td>
      <td width="15%">
          <center><?php echo link_to(image_tag('ver.png'),'visitante/show?fecha='.$Visitante,array('title' => 'Ver detalle'))?></center>
      </td>
   </tr>
    <?php } ?>
  </tbody>   
</table>

<center>
<br>
<br>
<?php echo link_to('&laquo;', 'visitante/index?page='.$Visitantes->getFirstPage(),'class=css_paginador') ?>
  <?php echo link_to('&lt;', 'visitante/index?page='.$Visitantes->getPreviousPage(),'class=css_paginador') ?>
  <?php $links = $Visitantes->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $Visitantes->getPage()) ? $page : link_to($page, 'visitante/index?page='.$page,'class=css_paginador') ?>
    <?php if ($page != $Visitantes->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'visitante/index?page='.$Visitantes->getNextPage(),'class=css_paginador') ?>
  <?php echo link_to('&raquo;', 'visitante/index?page='.$Visitantes->getLastPage(),'class=css_paginador') ?>
</center>    
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'visitante/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>