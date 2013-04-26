<br>
<center><h1>Usuarios</h1></center>
<br>
<? $yo  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername(); ?>
<? $Usuario = UsuarioQuery::create()->filterByUsuario($yo)->findOne();
   $id_sf_guard_group = $Usuario->getIdSfGuardGroup();
   if ($id_sf_guard_group == 1 ) {
?>   
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px;">
<?php echo link_to(image_tag('add.png'),'usuario/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>
<? } ?>
<?
   if (count($Usuario) > 0) {
?>       
    <table class="tablas" width="100%">
        <tr>
          <th style="border-left:1px solid  #979696;" width="200px;"><center>Usuario</center></th>
          <th width="100px;"><center>Nombre</center></th>
          <th width="100px;"><center>Apellido</center></th>
          <th width="120px;"><center>Sexo</center></th>
          <th width="400px;"><center>Correo</center></th>
          <th width="50px;"><center>Activo</center></th>
          <th width="350px;"><center></center></th>
        </tr>
        <tr>
            <td><center><? echo $Usuario->getUsuario() ?></center></td>
            <td><center><? echo $Usuario->getNombre() ?></center></td>
            <td><center><? echo $Usuario->getApellido() ?></center></td>
           <? if ($Usuario->getSexo() == 1) {
                   $sexo = 'Masculino';
               } else {
                   $sexo = 'Femenino';
               }
           ?>     
            <td><center><? echo $sexo ?></center></td>
            <td><center><? echo $Usuario->getEmail() ?></center></td>
           <? if ($Usuario->getActivo() == 1) {
                   $activo = 'Si';
               } else {
                   $activo = 'No';
               }
           ?>    
            <td><center><? echo $activo ?></center></td>
            <td><center>
                <?php echo link_to(image_tag('ver.png'),'usuario/show?id='.$Usuario->getId(),array('title' => 'Ver detalle'))?>
                <?php echo link_to(image_tag('edit.png'),'usuario/edit?id='.$Usuario->getId(),array('title' => 'Editar'))?>
            </center></td>
        </tr>
    </table>    
    <br>
    <br>
    <br>
<? } ?>    
<? 
   if ($id_sf_guard_group == 1 ) {
?>    
<div id="alinear_usuario" style="padding-left: 50px;" >
<table class="letrasusuario" width="100%">
    <tr>
        <td width="200px">
            <input type="checkbox" id="ver_usuarios_eliminados"> Ver usuarios eliminados
        </td>
        <td>
            &nbsp;
        </td>
    </tr>
</table>
<br>
<table class="letrasusuario" width="100%">
    <tr>
        <td>
           &nbsp;
        </td>
        <td align="center" width="1600px">
            <? echo link_to('Todos','/usuario/id?letra=Todos',array('class'  => 'letra','id'=> 'Todos', 'param'=> 'false', 'title' => 'Buscar todos los usuarios', 'style' => 'text-decoration:none'))?>
        </td>
        <?
        $distancia = abs(ord('a')-ord('A'));
        for ($i=65;$i<=90;$i++) {
            $letra = chr($i)."";
        ?>
          <td align="center" width="1600px">
            <? echo link_to($letra,'/usuario/id?letra='.$letra,array('class'  => 'letra','id'=> $letra, 'param'=> 'false', 'title' => 'Buscar usuarios por la letra '.$letra, 'style' => 'text-decoration:none'))?>
          </td>
        <?
        }
        ?>
        <td>
           &nbsp;
        </td>
    </tr>
</table>
<p style="line-height: 0.75em;">&nbsp;</p>
<table name="valores" align="left" width="100%" style='border-width: 1px; border-color: #000; border-style:solid;'>
    <tr>
       <td id="valores" width="100%" style="padding-top: 5px; padding-bottom: 5px; padding-left:0.3em; padding-right:0.3em;" >

       </td>
    </tr>
</table>
</div>
<? } //fin del if  ?>    
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script>
jQuery(document).ready(function() {
            letra = "0";
            if($("#ver_usuarios_eliminados").is(':checked')){
                  ver_usuarios_eliminados = true;
            } else {
                  ver_usuarios_eliminados = false;
            }
            $.ajax({
                       type: "POST",
                       url: "<?php   echo url_for('usuario/buscarusuario')?>",
                       data: "letra=" + letra +
                             "&ver_usuarios_eliminados=" + ver_usuarios_eliminados,
                       success:function(message){
                            var JSONobject = JSON.parse(message);
                            tabla = "";
                            busqueda = JSONobject['busqueda'];
                            if(busqueda != null){
                                tabla += '<center><p style="font-family:lucida grande; color:#FF0000; font-size:14px;">'+busqueda+'</p></center>';
                            } else {
                                tabla  += '<table class="tablas_usuario" id="hor-zebra" width="100%"><tr><th width="200px;"><center>Usuario</center></th><th width="100px;"><center>Nombre</center></th><th width="100px;"><center>Apellido</center></th><th width="120px;"><center>Sexo</center></th><th width="400px;"><center>Correo</center></th><th width="50px;"><center>Activo</center></th><th width="250px;"><center></center></th></tr>'
                                i = 0;
                                $.each(JSONobject, function(index, value) {
                                   if (i%2 == 0) {
                                       clase = 'filaPar';
                                   } else {
                                       clase = ' ';
                                   }
                                   usuario = JSONobject[index]['usuario'];
                                   nombre = JSONobject[index]['nombre'];
                                   apellido = JSONobject[index]['apellido'];
                                   sexo = JSONobject[index]['sexo'];
                                   email = JSONobject[index]['email'];
                                   activo = JSONobject[index]['activo'];
                                   id = JSONobject[index]['id'];


                                   ruta_lupa ='/usuario/show/id/'+id;
                                   ruta_editar ='/usuario/edit/id/'+id;
                                   tabla  += '<tr><td style="padding-left:10px; padding-right:10px;" class='+clase+'><center>'+usuario+'</center></td>\n\
                                              <td class='+clase+'><center>'+nombre+'</center></td>\n\
                                              <td class='+clase+'><center>'+apellido+'</center></td>\n\
                                              <td class='+clase+'><center>'+sexo+'</center></td>\n\
                                              <td class='+clase+'><center>'+email+'</center></td>\n\
                                              <td class='+clase+'><center>'+activo+'</center></td>\n\
                                              <td class='+clase+' width="100px"><center>\n\
                                              <a href='+ruta_lupa+'><img src="/images/ver.png"></a>\n\
                                              <a href='+ruta_editar+'><img src="/images/edit.png"></a>\n\
                                              </center></td></tr>';
                                   i++;
                                });
                                
                            } 
                            $('#valores').html(tabla);
                      }
                 });
});
</script>
<script>
jQuery(document).ready(function() {
    $('a.letra').click(function(event) {
      event.preventDefault();
      var letra = $(this).attr("id");
      $('a.letra').each(function(index) {
            if (letra == $(this).text()) {
                $(this).attr('param', 'true');
            } else {
                $(this).attr('param', 'false');
            }
      });
      if($("#ver_usuarios_eliminados").is(':checked')){
        ver_usuarios_eliminados = true;
      } else {
        ver_usuarios_eliminados = false;
      }
          $.ajax({
                       type: "POST",
                       url: "<?php   echo url_for('usuario/buscarusuario')?>",
                       data: "letra=" + letra +
                             "&ver_usuarios_eliminados=" + ver_usuarios_eliminados,
                       success:function(message){
                            var JSONobject = JSON.parse(message);
                            tabla = "";
                            busqueda = JSONobject['busqueda'];
                            if(busqueda != null){
                                tabla += '<center><p style="font-family:lucida grande; color:#FF0000; font-size:14px;">'+busqueda+'</p></center>';
                            } else {
                                tabla  += '<table class="tablas_usuario" width="100%"><tr><th width="200px;"><center>Usuario</center></th><th width="100px;"><center>Nombre</center></th><th width="100px;"><center>Apellido</center></th><th width="120px;"><center>Sexo</center></th><th width="400px;"><center>Correo</center></th><th width="50px;"><center>Activo</center></th><th width="250px;"><center></center></th></tr>'
                                i = 0;
                                $.each(JSONobject, function(index, value) {
                                   usuario = JSONobject[index]['usuario'];
                                   nombre = JSONobject[index]['nombre'];
                                   apellido = JSONobject[index]['apellido'];
                                   sexo = JSONobject[index]['sexo'];
                                   email = JSONobject[index]['email'];
                                   activo = JSONobject[index]['activo'];
                                   id = JSONobject[index]['id'];


                                   ruta_lupa ='/usuario/show/id/'+id;
                                   ruta_editar ='/usuario/edit/id/'+id;
                                   tabla  += '<tr><td style="padding-left:10px; padding-right:10px;" class='+clase+'><center>'+usuario+'</center></td>\n\
                                              <td class='+clase+'><center>'+nombre+'</center></td>\n\
                                              <td class='+clase+'><center>'+apellido+'</center></td>\n\
                                              <td class='+clase+'><center>'+sexo+'</center></td>\n\
                                              <td class='+clase+'><center>'+email+'</center></td>\n\
                                              <td class='+clase+'><center>'+activo+'</center></td>\n\
                                              <td class='+clase+' width="100px"><center>\n\
                                              <a href='+ruta_lupa+'><img src="/images/ver.png"></a>\n\
                                              <a href='+ruta_editar+'><img src="/images/edit.png"></a>\n\
                                              </center></td></tr>';
                                   i++;
                                });
                                
                            } 
                            $('#valores').html(tabla);
                      }
                 });

    });
});
</script>
<script>
jQuery(document).ready(function() {
    $('#ver_usuarios_eliminados:checkbox').click(function() {
        letra = "0";
        $('a.letra').each(function() {
              if ($(this).attr('param') == "true") {
                  letra = $(this).attr("id");;
              }
       });
      if($("#ver_usuarios_eliminados").is(':checked')){
        ver_usuarios_eliminados = true;
      } else {
        ver_usuarios_eliminados = false;
      }
          $.ajax({
                       type: "POST",
                       url: "<?php   echo url_for('usuario/buscarusuario')?>",
                       data: "letra=" + letra +
                             "&ver_usuarios_eliminados=" + ver_usuarios_eliminados,
                       success:function(message){
                            var JSONobject = JSON.parse(message);
                            tabla = "";
                            busqueda = JSONobject['busqueda'];
                            if(busqueda != null){
                                tabla += '<center><p style="font-family:lucida grande; color:#FF0000; font-size:14px;">'+busqueda+'</p></center>';
                            } else {
                                tabla  += '<table class="tablas_usuario" id="hor-zebra" width="100%"><tr><th width="200px;"><center>Usuario</center></th><th width="100px;"><center>Nombre</center></th><th width="100px;"><center>Apellido</center></th><th width="120px;"><center>Sexo</center></th><th width="400px;"><center>Correo</center></th><th width="50px;"><center>Activo</center></th><th width="250px;"><center></center></th></tr>'
                                i = 0;
                                $.each(JSONobject, function(index, value) {
                                   if (i%2 == 0) {
                                       clase = 'filaPar';
                                   } else {
                                       clase = ' ';
                                   }
                                   usuario = JSONobject[index]['usuario'];
                                   nombre = JSONobject[index]['nombre'];
                                   apellido = JSONobject[index]['apellido'];
                                   sexo = JSONobject[index]['sexo'];
                                   email = JSONobject[index]['email'];
                                   activo = JSONobject[index]['activo'];
                                   id = JSONobject[index]['id'];


                                   ruta_lupa ='/usuario/show/id/'+id;
                                   ruta_editar ='/usuario/edit/id/'+id;
                                   tabla  += '<tr><td style="padding-left:10px; padding-right:10px;" class='+clase+'><center>'+usuario+'</center></td>\n\
                                              <td class='+clase+'><center>'+nombre+'</center></td>\n\
                                              <td class='+clase+'><center>'+apellido+'</center></td>\n\
                                              <td class='+clase+'><center>'+sexo+'</center></td>\n\
                                              <td class='+clase+'><center>'+email+'</center></td>\n\
                                              <td class='+clase+'><center>'+activo+'</center></td>\n\
                                              <td class='+clase+' width="100px"><center>\n\
                                              <a href='+ruta_lupa+'><img src="/images/ver.png"></a>\n\
                                              <a href='+ruta_editar+'><img src="/images/edit.png"></a>\n\
                                              </center></td></tr>';
                                   i++;
                                });
                                
                            } 
                            $('#valores').html(tabla);
                      }
                 });
    });
});
</script>

 