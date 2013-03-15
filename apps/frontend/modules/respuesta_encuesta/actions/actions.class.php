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
    $this->Items= ItemQuery::create()->filterByIdEncuesta($this->id_encuesta)->orderByNumeracion('asc')->find();
    
    }

  
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    
    //debo chequear si esoty creado o editando la encuesta antes de emepzar <<-- ṔENDIENTE
    //LO MISMO QUE EN AGREGARITEM
     $id_encuesta= intval($request->getParameter('id_encuesta')); //fk a encuesta
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
            case "E": //caso completacion multiple 
                foreach($_POST[$id_item] as $key=>$value){
                $RItem = new RespuestaItem();
                $RItem->setIdRespuestaEncuesta($id_respuesta_encuesta);
                $RItem->setIdItem($id_item);
                $RItem->setTipoItem($tipo_item);
                $RItem->setValor($value);
                $RItem->save();    
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
          case "G": //caso opcion multiple
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
          case "H": //caso opcion multiple
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
          case "I": // Caso Pais
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
          break;       
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
}
