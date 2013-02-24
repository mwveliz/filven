<?php

    $cantidaddeactividadesyasistencia = ActividadQuery::cantidaddeactividadesyasistencia();
    echo $cantidaddeactividadesyasistencia;
    
    $numerodeparticipantesalasdistintasactividadesprogramadas = ActividadQuery::numerodeparticipantesalasdistintasactividadesprogramadas();
    echo $numerodeparticipantesalasdistintasactividadesprogramadas;
    
    $publicoinfantilatendido = ActividadQuery::publicoinfantilatendido();
    echo $publicoinfantilatendido;
    
?>
