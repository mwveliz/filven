<?php

/**
 * respuesta_encuesta actions.
 *
 * @package    filven
 * @subpackage respuesta_encuesta
 * @author     Your name here
 */
class respuesta_encuestaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->RespuestaEncuestas = RespuestaEncuestaQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->RespuestaEncuesta = RespuestaEncuestaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->RespuestaEncuesta);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->id_encuesta=$request->getParameter('id_encuesta');
    $Encuesta=  EncuestaQuery::create()->findOneById($this->id_encuesta);
    $tipo_encuesta=  $Encuesta->getTipoEncuesta();
    $ET=  EncuestaQuery::create()->filterByTipoEncuesta($tipo_encuesta)->orderById('asc')->findOne();
    $id_tipo=$ET->getId();
                          
    
    $this->Items= ItemQuery::create()->filterByIdEncuesta($id_tipo)->orderByNumeracion('asc')->find();
    
    }

  
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    
    //debo chequear si esoty creado o editando la encuesta antes de emepzar <<-- ṔENDIENTE
    //LO MISMO QUE EN AGREGARITEM
     $id_encuesta= intval($request->getParameter('id_encuesta')); //fk a encuesta
     $Encuesta=  EncuestaQuery::create()->findOneById($id_encuesta);
     $tipo_encuesta=$Encuesta->getTipoEncuesta();
     $numero_encuesta=  $_POST['numero_encuesta']; //numeracion de la hoja
     $nombre=  $_POST['nombre']; 
     $apellido=  $_POST['apellido']; 
     $fecha=  $_POST['fecha'];
     $hora= $_POST['hora']; 
     $observacion=  $_POST['observacion']; 
     $telefono=  $_POST['telefono']; 
     $email=  $_POST['email']; 
    
     $REncuesta = new RespuestaEncuesta();
     $REncuesta->setIdEncuesta(intval($id_encuesta));
     $REncuesta->setNumeroEncuesta($numero_encuesta);
     $REncuesta->setNombre($nombre);
     $REncuesta->setApellido($apellido);
     $REncuesta->setFecha($fecha);
     $REncuesta->setHora($hora);
     $REncuesta->setTelefono($telefono);
     $REncuesta->setEmail($email);
     $REncuesta->setObservacion($observacion);
     $REncuesta->save();
     
     $id_respuesta_encuesta=$REncuesta->getid();
     $Items= ItemQuery::create()->filterByIdEncuesta($id_encuesta)->orderByNumeracion('asc')->find();
     
     foreach ($Items as $Item){
        $id_item=$Item->getId();
        $tipo_item=$Item->getTipoItem();
        switch($tipo_item){
            case "A": //caso entrada por completacion
                $RItem = new RespuestaItem();
                $RItem->setIdRespuestaEncuesta($id_respuesta_encuesta);
                $RItem->setIdItem($id_item);
                $RItem->setTipoItem($tipo_item);
                $RItem->setValor($_POST[$id_item]);
                $RItem->save();
            break;
            case "B": //caso seleccion simple radiobox
                $RItem = new RespuestaItem();
                $RItem->setIdRespuestaEncuesta($id_respuesta_encuesta);
                $RItem->setIdItem($id_item);
                $RItem->setTipoItem($tipo_item);
                if(intval($_POST[$id_item][0])>0) $RItem->setIdOpcion(intval($_POST[$id_item][0]));
                
                $RItem->save();
            break;
            case "C": //caso radiobox otro/especifique
                $RItem = new RespuestaItem();
                $RItem->setIdRespuestaEncuesta($id_respuesta_encuesta);
                $RItem->setIdItem($id_item);
                $RItem->setTipoItem($tipo_item);
                if(intval($_POST[$id_item][0])>0) $RItem->setIdOpcion(intval($_POST[$id_item][0]));
                if (isset($_POST[$id_item.'otro'])){
                  $RItem->setValor($_POST[$id_item.'otro']);  //si agrego alguna opcion extra
                } 
                $RItem->save();
            break;
            case "D": //caso seleccion multiple cerrada
                foreach($_POST[$id_item] as $key=>$value){
                $RItem = new RespuestaItem();
                $RItem->setIdRespuestaEncuesta($id_respuesta_encuesta);
                $RItem->setIdItem($id_item);
                $RItem->setTipoItem($tipo_item);
                $RItem->setIdOpcion($value);
                $RItem->save();    
                }
            break;
            case "E": //caso completacion multiple PAIS-ESTADO MUNICIPIO PARROQUIA debo distingor vistante expositor 26 / 47 
                $id_opcion=57; // PAIS en visitante
                if ($tipo_encuesta=='Expositor')$id_opcion=152; // PAIS en expositor
                
                foreach($_POST[$id_item] as $key=>$value){
                $RItem = new RespuestaItem();
                $RItem->setIdRespuestaEncuesta($id_respuesta_encuesta);
                $RItem->setIdItem($id_item);
                $RItem->setTipoItem($tipo_item);
                $RItem->setValor($value);
                $RItem->setIdOpcion($id_opcion);
                $RItem->save();    
                $id_opcion++; //incremento 58->Estado 59->Municipio (60->Parroquia solo en visitante)
                }
            break;
           case "F": //caso Checkbox otro/especifique
                foreach($_POST[$id_item] as $key=>$value){
                $RItem = new RespuestaItem();
                $RItem->setIdRespuestaEncuesta($id_respuesta_encuesta);
                $RItem->setIdItem($id_item);
                $RItem->setTipoItem($tipo_item);
                $RItem->setIdOpcion($value);
                if (isset($_POST[$id_item.'otro'])){
                  $RItem->setValor($_POST[$id_item.'otro']);  //si agrego alguna opcion extra
                } 
                $RItem->save();
                }
            break;
          case "G": //caso opcion multiple (ejemplo pregunta 22 de visitante)
             foreach($_POST[$id_item] as $opcion=>$valor){
                $RItem = new RespuestaItem();
                $RItem->setIdRespuestaEncuesta($id_respuesta_encuesta);
                $RItem->setIdItem($id_item);
                $RItem->setTipoItem($tipo_item);
                $RItem->setIdOpcion($opcion);
                $RItem->setValor($valor);
                $RItem->save();
             }
          break;
          case "H": //caso opcion multiple (solo en expositor)
             foreach($_POST[$id_item] as $opcion => $valores){ //itero sobre las opciones
              foreach($valores as $valor){ //obtengo los multiples valores de esas opciones y asigno cada uno
                $RItem = new RespuestaItem();
                $RItem->setIdRespuestaEncuesta($id_respuesta_encuesta);
                $RItem->setIdItem($id_item);
                $RItem->setTipoItem($tipo_item);
                $RItem->setIdOpcion($opcion);
                $RItem->setValor($valor);
                $RItem->save();
              }
             }
          break;
         /* case "I": // Caso Pais
             $RItem = new RespuestaItem();
             $RItem->setIdRespuestaEncuesta($id_respuesta_encuesta);
             $RItem->setIdItem($id_item);
             $RItem->setTipoItem($tipo_item);
             $RItem->setIdOpcion($opcion);
             $RItem->setValor($_POST['pais']);
             $RItem->save();
          break;   
          case "J": // Caso Estado
             $RItem = new RespuestaItem();
             $RItem->setIdRespuestaEncuesta($id_respuesta_encuesta);
             $RItem->setIdItem($id_item);
             $RItem->setTipoItem($tipo_item);
             $RItem->setIdOpcion($opcion);
             if ($_POST['pais'] == 'Venezuela') {
                $RItem->setValor($_POST['estado']);
             } else {
                $RItem->setValor(''); 
             }
             $RItem->save();
          break;       */
        }
     }//fin foreach items
    $this->redirect('respuesta_encuesta/new?id_encuesta='.$id_encuesta);
    
  }

  public function executeEdit(sfWebRequest $request)
  {
    $RespuestaEncuesta = RespuestaEncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuesta, sprintf('Object RespuestaEncuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new RespuestaEncuestaForm($RespuestaEncuesta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $RespuestaEncuesta = RespuestaEncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuesta, sprintf('Object RespuestaEncuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new RespuestaEncuestaForm($RespuestaEncuesta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $RespuestaEncuesta = RespuestaEncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuesta, sprintf('Object RespuestaEncuesta does not exist (%s).', $request->getParameter('id')));
    $RespuestaEncuesta->delete();

    $this->redirect('respuesta_encuesta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $RespuestaEncuesta = $form->save();

      $this->redirect('respuesta_encuesta/edit?id='.$RespuestaEncuesta->getId());
    }
  }
  
   public function executeAjaxcargarmunicipios(sfWebRequest $request)
  {
    $id_estado=$request->getParameter('id_estado');
    $Municipios= MunicipioQuery::create()->filterByIdEstado($id_estado)->orderByMunicipio('asc')->find();
       
    $to=array();
       $i=0;
    $html='<select>';
    foreach ( $Municipios as  $Municipio) {
       $html.='<option id="' . $Municipio->getId() . '">' . $Municipio->getMunicipio(). '</option>' ;
    }
          $html.=   '</select>';
         return $this->renderText($html);
  }

  
   public function executeAjaxcargarparroquias(sfWebRequest $request)
  {
    $id_municipio=$request->getParameter('id_municipio');
    $Parroquias= ParroquiaQuery::create()->filterByIdMunicipio($id_municipio)->orderByDescripcion('asc')->find();
       
    $to=array();
       $i=0;
    $html='<select>';
    foreach ( $Parroquias as  $Parroquia) {
       $html.='<option  id="' . $Parroquia->getId() . '">' . $Parroquia->getDescripcion(). '</option>' ;
    }
          $html.=   '</select>';
         return $this->renderText($html);
  }

  
  
  
}
