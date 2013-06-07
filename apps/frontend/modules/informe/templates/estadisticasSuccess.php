<?php $id_encuesta = $sf_params->get('id'); ?>
<?
$E=  EncuestaQuery::create()->findOneById($id_encuesta);
$tipo_encuesta=$E->getTipoEncuesta();
$tipo_encuesta=  strtoupper($tipo_encuesta);


?>
    
    <? // es  visitante


if ($tipo_encuesta== 'VISITANTE') {
     
    $poblacionencuestadaporgenero = InformeQuery::poblacionencuestadaporgenero($id_encuesta);
    echo $poblacionencuestadaporgenero;
   
    $poblacionencuestadasegunedad = InformeQuery::poblacionencuestadasegunedad($id_encuesta);
    echo $poblacionencuestadasegunedad;
    
    $poblacionencuestadasegunniveleducativo = InformeQuery::poblacionencuestadasegunniveleducativo($id_encuesta);
    echo $poblacionencuestadasegunniveleducativo;
    
    $poblacionqueparticipaenlasmisioneseducativas = InformeQuery::poblacionqueparticipaenlasmisioneseducativas($id_encuesta);
    echo $poblacionqueparticipaenlasmisioneseducativas;
    
    $poblacionsegunsuocupacion = InformeQuery::poblacionsegunsuocupacion($id_encuesta);
    echo $poblacionsegunsuocupacion;
    
    $ocupacionessegunsugenero = InformeQuery::ocupacionessegunsugenero($id_encuesta);
    echo $ocupacionessegunsugenero;
    
    $procedenciadelosvisitantesinternacionales = InformeQuery::procedenciadelosvisitantesinternacionales($id_encuesta);
    echo $procedenciadelosvisitantesinternacionales;
    
    $procedenciadelosvisitantesnacionales = InformeQuery::procedenciadelosvisitantesnacionales($id_encuesta);
    echo $procedenciadelosvisitantesnacionales;    
    
    $relacionsegunlugardeprocedencia = InformeQuery::relacionsegunlugardeprocedencia($id_encuesta);
    echo $relacionsegunlugardeprocedencia;   
    
    $gustoporlalectura = InformeQuery::gustoporlalectura($id_encuesta);
    echo $gustoporlalectura;
    
    $frecuenciasegunmaterialdelectura = InformeQuery::frecuenciasegunmaterialdelectura($id_encuesta);
    echo $frecuenciasegunmaterialdelectura;
    
    $preferenciadelecturaensoportefisicoydigital = InformeQuery::preferenciadelecturaensoportefisicoydigital($id_encuesta);
    echo $preferenciadelecturaensoportefisicoydigital;
    
    $formadeadquisiciondelosmaterialesdelectura = InformeQuery::formadeadquisiciondelosmaterialesdelectura($id_encuesta);
    echo $formadeadquisiciondelosmaterialesdelectura;
    
    $categorizaciondelalecturadelosencuestados = InformeQuery::categorizaciondelalecturadelosencuestados($id_encuesta);
    echo $categorizaciondelalecturadelosencuestados;
    
    $gustosypreferenciadelosencuestadossegungenerosliterarios = InformeQuery::gustosypreferenciadelosencuestadossegungenerosliterarios($id_encuesta);
    echo $gustosypreferenciadelosencuestadossegungenerosliterarios;
    
    $gustosypreferenciadelosencuestadosseguntematicas = InformeQuery::gustosypreferenciadelosencuestadosseguntematicas($id_encuesta);
    echo $gustosypreferenciadelosencuestadosseguntematicas;
    
    $comoconsideralaofertaeditorial = InformeQuery::comoconsideralaofertaeditorial($id_encuesta);
    echo $comoconsideralaofertaeditorial;
    
    $valoraciondeprecios = InformeQuery::valoraciondeprecios($id_encuesta);
    echo $valoraciondeprecios;
    
    $conocimientodelareddelibreriasdelsur = InformeQuery::conocimientodelareddelibreriasdelsur($id_encuesta);
    echo $conocimientodelareddelibreriasdelsur;
    
    $recomendariaesteeventoaotraspersonas = InformeQuery::recomendariaesteeventoaotraspersonas($id_encuesta);
    echo $recomendariaesteeventoaotraspersonas;
    
    $comoseenteroustedsobrelaferiadellibro = InformeQuery::comoseenteroustedsobrelaferiadellibro($id_encuesta);
    echo $comoseenteroustedsobrelaferiadellibro;
   
    $valoracionfilvensegunvisitantes = InformeQuery::valoracionfilvensegunvisitantes($id_encuesta);
    echo $valoracionfilvensegunvisitantes;
}
if ($tipo_encuesta== 'EXPOSITOR') {
    
    $expositoresinternacionales = InformeQuery::expositoresinternacionales($id_encuesta);
    echo $expositoresinternacionales;   
    
   $generosmascomercializados = InformeQuery::generosmascomercializados($id_encuesta);
    echo $generosmascomercializados;
    
    $valoracionfilvensegunexpositores = InformeQuery::valoracionfilvensegunexpositores($id_encuesta);
    echo $valoracionfilvensegunexpositores;    
    
    $adquisiciondeejemplare = InformeQuery::adquisiciondeejemplares($id_encuesta);
    echo $adquisiciondeejemplare;
    
    $librosmasvendidosycantidaddeejemplares = InformeQuery::librosmasvendidosycantidaddeejemplares($id_encuesta);
    echo $librosmasvendidosycantidaddeejemplares;
}
?>