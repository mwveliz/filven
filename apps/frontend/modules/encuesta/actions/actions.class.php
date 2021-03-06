<?php

/**
 * encuesta actions.
 *
 * @package    filven
 * @subpackage encuesta
 * @author     Your name here
 */
class encuestaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }
    
    $this->Encuestas = EncuestaQuery::create()->orderById('desc')->paginate($page,20);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Encuesta = EncuestaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Encuesta);
  }

  public function executeBuscaymodifica(sfWebRequest $request)
  {
      $this->form= new EncuestaForm();
       if ($request->isXmlHttpRequest()) {
           
           $this->Encuesta = EncuestaQuery::create()->filterByIdFeria($request->getParameter('id_feria'))->where('Encuesta.TipoEncuesta LIKE ?', $request->getParameter('tipo_encuesta') )->findOne();
           
           $this->RespuestaEncuesta=RespuestaEncuestaQuery::create()->filterByNumeroEncuesta($request->getParameter('nro_encuesta'))->filterByIdEncuesta($this->Encuesta->getId())->findOne();
           return $this->renderPartial('encuesta/resultadobusqueda', 
                   array('RespuestaEncuesta' => $this->RespuestaEncuesta,
                         'Encuesta' => $this->Encuesta   
                         ));
       }
  }
  
  public function executeActualizaencuesta(sfWebRequest $request){
  if ($request->isXmlHttpRequest()) {
      
      $id_item=$request->getParameter('id_item');
      return $this->renderText($id_item);
      
      
      }
  }  
  
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EncuestaForm();
    
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $form = new EncuestaForm();

    $params=$request->getParameter($form->getName());
    
    
    
    $Encuesta = new Encuesta();
    $Encuesta->setNombreEncuesta($params['nombre_encuesta']) ;
    $Encuesta->setTipoEncuesta($params['tipo_encuesta']) ;
    $Encuesta->setDescripcionEncuesta($params['descripcion_encuesta']);
    $Encuesta->setFechaElaboracion($_POST['encuesta']['fecha_elaboracion']);
    
    $Encuesta->setIdFeria($params['id_feria']);
    
    $Encuesta->save();
    
    
      $this->redirect('item/agregarvarios?id_encuesta='.$Encuesta->getId());
    
      
    
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Encuesta = EncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Encuesta, sprintf('Object Encuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new EncuestaForm($Encuesta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Encuesta = EncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Encuesta, sprintf('Object Encuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new EncuestaForm($Encuesta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Encuesta = EncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Encuesta, sprintf('Object Encuesta does not exist (%s).', $request->getParameter('id')));
    $Encuesta->delete();

    $this->redirect('encuesta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Encuesta = $form->save();

      $this->redirect('encuesta/index');
    }
  }
  
  
}
