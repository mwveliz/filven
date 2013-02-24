<?php

/**
 * tipo_actividad actions.
 *
 * @package    filven
 * @subpackage tipo_actividad
 * @author     Your name here
 */
class tipo_actividadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }  
    
    $this->TipoActividads = TipoActividadQuery::create()->orderById('desc')->paginate($page,20);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->TipoActividad = TipoActividadPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->TipoActividad);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TipoActividadForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TipoActividadForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $TipoActividad = TipoActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($TipoActividad, sprintf('Object TipoActividad does not exist (%s).', $request->getParameter('id')));
    $this->form = new TipoActividadForm($TipoActividad);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $TipoActividad = TipoActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($TipoActividad, sprintf('Object TipoActividad does not exist (%s).', $request->getParameter('id')));
    $this->form = new TipoActividadForm($TipoActividad);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $TipoActividad = TipoActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($TipoActividad, sprintf('Object TipoActividad does not exist (%s).', $request->getParameter('id')));
    $TipoActividad->delete();

    $this->redirect('tipo_actividad/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $TipoActividad = $form->save();

      $this->redirect('tipo_actividad/index');
    }
  }
}
