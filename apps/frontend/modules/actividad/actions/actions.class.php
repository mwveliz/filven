<?php

/**
 * actividad actions.
 *
 * @package    filven
 * @subpackage actividad
 * @author     Your name here
 */
class actividadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }      
      
    $this->Actividads = ActividadQuery::create()->orderByFecha('desc')->paginate($page,20);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Actividad = ActividadPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Actividad);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ActividadForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ActividadForm();
    
 // die(var_dump($_POST));
    $nombre_actividad = $_POST["actividad"]['nombre_actividad'];
    $ponente = $_POST["actividad"]['ponente'];
    $turno = $_POST["actividad"]['turno'];
    $ejecutada = $_POST["actividad"]['ejecutada'];
    $cantidad_participantes_m = $_POST["actividad"]['cantidad_participantes_m'];
    $cantidad_participantes_f = $_POST["actividad"]['cantidad_participantes_f'];   
    $alcanzo_tiempo = $_POST["actividad"]['alcanzo_tiempo'];
    $causas_incumplimiento = $_POST["actividad"]['causas_incumplimiento'];
    $Municipio = MunicipioQuery::create()->filterByEstado($_POST['estados'])->where('Municipio.Municipio = ?', $_POST['municipios'])->findOne();
    $id_municipio = $Municipio->getId();   
    $escuela = $_POST["actividad"]['escuela'];
    $refugio = $_POST["actividad"]['refugio'];
    $observaciones = $_POST["actividad"]['observaciones'];   
    $id_sala = $_POST["actividad"]['id_sala'];  
    $id_tipo_actividad = $_POST["actividad"]['id_tipo_actividad'];
    $facilitador = $_POST["actividad"]['facilitador'];
    $id_feria = $_POST["actividad"]['id_feria'];
    $fecha = $_POST['actividad']['fecha'];
    $hora = $_POST['actividad']['hora'];
    
    
    
    
    
    $Actividad = new Actividad();
    $Actividad->setNombreActividad($nombre_actividad);
    $Actividad->setPonente($ponente);
    $Actividad->setTurno($turno);
    $Actividad->setEjecutada($ejecutada);
    $Actividad->setCantidadParticipantesM($cantidad_participantes_m);
    $Actividad->setCantidadParticipantesF($cantidad_participantes_f);
    $Actividad->setAlcanzoTiempo($alcanzo_tiempo);
    $Actividad->setCausasIncumplimiento($causas_incumplimiento);
    $Actividad->setIdMunicipio($id_municipio);
    $Actividad->setEscuela($escuela);
    $Actividad->setRefugio($refugio);
    $Actividad->setObservaciones($observaciones);
    $Actividad->setIdSala($id_sala);
    $Actividad->setIdTipoActividad($id_tipo_actividad);
    $Actividad->setFecha($fecha);
    $Actividad->setHora($hora);
    $Actividad->setFacilitador($facilitador);
    $Actividad->setIdFeria($id_feria);
    $Actividad->save();
    $id_actividad=$Actividad->getId();
     //el primer ponente   
     $PonenteRelActividad= new PonenteRelActividad();
     $PonenteRelActividad->setIdActividad($id_actividad);
     $PonenteRelActividad->setIdPonente($ponente);    
     $PonenteRelActividad->save();
     //si hay mas de un ponente
     foreach( $_POST['extraponente'] as $ponenteadicional){
         $PonenteRelActividad= new PonenteRelActividad();
         $PonenteRelActividad->setIdActividad($id_actividad);
         $PonenteRelActividad->setIdPonente($ponenteadicional);
         $PonenteRelActividad->save();
    }  
    
     $this->redirect('actividad/index');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Actividad = ActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Actividad, sprintf('Object Actividad does not exist (%s).', $request->getParameter('id')));
    $this->form = new ActividadForm($Actividad);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Actividad = ActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Actividad, sprintf('Object Actividad does not exist (%s).', $request->getParameter('id')));
    $this->form = new ActividadForm($Actividad);   
    
    $nombre_actividad = $_POST["actividad"]['nombre_actividad'];
    $ponente = $_POST["actividad"]['ponente'];
    $turno = $_POST["actividad"]['turno'];
    $ejecutada = $_POST["actividad"]['ejecutada'];
    $cantidad_participantes_m = $_POST["actividad"]['cantidad_participantes_m'];
    $cantidad_participantes_f = $_POST["actividad"]['cantidad_participantes_f'];   
    $alcanzo_tiempo = $_POST["actividad"]['alcanzo_tiempo'];
    $causas_incumplimiento = $_POST["actividad"]['causas_incumplimiento'];
    $Municipio = MunicipioQuery::create()->filterByEstado($_POST['estados'])->where('Municipio.Municipio = ?', $_POST['municipios'])->findOne();
    $id_municipio = $Municipio->getId();   
    $escuela = $_POST["actividad"]['escuela'];
    $refugio = $_POST["actividad"]['refugio'];
    $observaciones = $_POST["actividad"]['observaciones'];   
    $id_sala = $_POST["actividad"]['id_sala'];  
    $id_tipo_actividad = $_POST["actividad"]['id_tipo_actividad'];  
    $id_ponente = $_POST["actividad"]['id_ponente'];
    $facilitador = $_POST["actividad"]['facilitador'];
    $id_feria = $_POST["actividad"]['id_feria'];
    $fecha = $_POST['actividad']['fecha'];
    $hora = $_POST['actividad']['hora'];    
    
    $Actividad->setNombreActividad($nombre_actividad);
    $Actividad->setPonente($ponente);
    $Actividad->setTurno($turno);
    $Actividad->setEjecutada($ejecutada);
    $Actividad->setCantidadParticipantesM($cantidad_participantes_m);
    $Actividad->setCantidadParticipantesF($cantidad_participantes_f);
    $Actividad->setAlcanzoTiempo($alcanzo_tiempo);
    $Actividad->setCausasIncumplimiento($causas_incumplimiento);
    $Actividad->setIdMunicipio($id_municipio);
    $Actividad->setEscuela($escuela);
    $Actividad->setRefugio($refugio);
    $Actividad->setObservaciones($observaciones);
    $Actividad->setIdSala($id_sala);
    $Actividad->setIdTipoActividad($id_tipo_actividad);
    $Actividad->setFecha($fecha);
    $Actividad->setHora($hora);
    $Actividad->setIdPonente($id_ponente);
    $Actividad->setFacilitador($facilitador);
    $Actividad->setIdFeria($id_feria);
    $Actividad->save();

    $this->redirect('actividad/index'); 
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $PonenteRelActividads = PonenteRelActividadQuery::create()->filterByIdActividad($request->getParameter('id'))->find();
    foreach ($PonenteRelActividads as $PonenteRelActividad) {
        $PonenteRelActividad->delete();
    }    
    
    $Actividad = ActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Actividad, sprintf('Object Actividad does not exist (%s).', $request->getParameter('id')));
    $Actividad->delete();
    
    $this->redirect('actividad/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $params=$request->getParameter($form->getName());
    
   
   $form->bind($params, $request->getFiles($form->getName()));
    
    
    
    if ($form->isValid())
    {
      $Actividad = $form->save();

      $this->redirect('actividad/index');
    }
  }
  
  public function executeMostrarMunicipios(sfWebRequest $request)
  {
    $estado = $request->getParameter('estado');

    $Municipios = MunicipioQuery::create()->where('Municipio.Estado like ?', '%'.$estado.'%')->orderByMunicipio('asc')->find();
    
    $to  = array();
    foreach ($Municipios as $Municipio) {
       $to[$Municipio->getId()]['municipio'] = $Municipio->getMunicipio();
    }
    $to2 = json_encode($to);
    return $this->renderText($to2);
    
  }  
  
   public function executeMostrarEstados(sfWebRequest $request)
  {
    $id_actividad = $request->getParameter('id_actividad');

    $Actividad = ActividadQuery::create()->filterById($id_actividad)->findOne();
    
    $id_municipio = $Actividad->getIdMunicipio();
    
    $Municipio = MunicipioQuery::create()->filterById($id_municipio)->findOne();
    $estado = $Municipio->getEstado();
    
    $Estados = MunicipioQuery::create()->select('Estado')->setDistinct('Estado')->orderByEstado('asc')->find();
    
    $estados = '<select id="estados" class="select" name="estados">';
    for($i = 0; $i < count($Estados); $i++) {
        if ($Estados[$i] == $estado) {
            $estados .= '<option id="'.$i.'" selected>'.$Estados[$i].'</option>';
        } else {
            $estados .= '<option id="'.$i.'">'.$Estados[$i].'</option>';
        }
    }
    $estados .= '</select>';    

    $Municipios_arr = MunicipioQuery::create()->filterByEstado($estado)->find();
    $municipios = '<select id="municipios" class="select" name="municipios">';
    foreach ($Municipios_arr as $Municipio_arr) :
        if ($Municipio_arr->getId() == $id_municipio) {
            $municipios .= '<option id="'.$Municipio_arr->getId().'" selected>'.$Municipio_arr->getMunicipio().'</option>';
        } else {
            $municipios .= '<option id="'.$Municipio_arr->getId().'">'.$Municipio_arr->getMunicipio().'</option>';
        }
    endforeach;
    $municipios .= '</select>'; 
    
    $to  = array();
    $to[$Municipio->getId()]['select_municipio'] = $municipios;
    $to[$Municipio->getId()]['select_estado'] = $estados;
    
    $to2 = json_encode($to);
    return $this->renderText($to2);
    
  }   
  
  public function executeMostrarEstadosInicial(sfWebRequest $request)
  {
   $Estados = MunicipioQuery::create()->select('Estado')->setDistinct('Estado')->orderByEstado('asc')->find();
    
   //$Stados = EstadoQuery::create()->orderByNombre('asc')->find();
   $i=0;
   $estados = '<select id="estados" class="select" name="estados">';
    for($i = 0; $i < count($Estados); $i++) {
        if ($Estados[$i] == 'DTTO. CAPITAL') {
            $estados .= '<option id="'.$i.'" selected>'.$Estados[$i].'</option>';
        } else {
            $estados .= '<option id="'.$i.'">'.$Estados[$i].'</option>';
        }
    }
    $estados .= '</select>';  
    
    $to  = array();
    $to[1]['select_estado'] = $estados;
    
    $to2 = json_encode($to);
    return $this->renderText($to2);
  }
  
  public function executeTotalactividad(sfWebRequest $request)
  {       
    $this->Actividads = ActividadQuery::create()->find();
  }
  
  
}
