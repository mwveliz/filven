<br>
<center><h1>Visitantes por año</h1></center>
<br>
<table class="tablas">
  <thead>
    <tr>
      <th>Feria</th>
      <th>N° de visitas</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Visitantes as $Visitante): ?>
    <tr>
      <td><center><?php echo $Visitante->getDescripcion() ?></center></td>
      <? /* sumar los resultados por fecha */ 
        $VisitanteFeria = VisitanteQuery::create()->filterByIdFeria($Visitante->getId())->find();
        $suma = 0;
        foreach($VisitanteFeria as $Feria) {
            $suma += $Feria->getNumero();
        }
      ?>
      <td><center><?php echo $suma ?></center></td>
      <td width="15%"><center>
                        <?php echo link_to(image_tag('ver.png'),'visitante/index?id='.$Visitante->getId(),array('title' => 'Ver detalle por año'))?>
                      </center>
      </td>
   </tr>
    <?php endforeach; ?>
  </tbody>   
</table>
<center>
<br>
<br>
