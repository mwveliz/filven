<?php

/**
 * informe actions.
 *
 * @package    filven
 * @subpackage informe
 * @author     Your name here
 */
class informeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }
    
    $this->Informes = InformeQuery::create()->orderByFechaInforme('desc')->paginate($page,20);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Informe = InformePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Informe);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new InformeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new InformeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Informe = InformeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Informe, sprintf('Object Informe does not exist (%s).', $request->getParameter('id')));
    $this->form = new InformeForm($Informe);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Informe = InformeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Informe, sprintf('Object Informe does not exist (%s).', $request->getParameter('id')));
    $this->form = new InformeForm($Informe);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Informe = InformeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Informe, sprintf('Object Informe does not exist (%s).', $request->getParameter('id')));
    $Informe->delete();

    $this->redirect('informe/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Informe = $form->save();

      $this->redirect('informe/index');
    }
  }
  
  public function executeEncuestas(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }
    
    $this->Encuestas = EncuestaQuery::create()->paginate($page,20);
  }  
  
   public function executeEstadisticas(sfWebRequest $request)
  {
    $this->Encuesta = EncuestaQuery::create()->filterById($request->getParameter('id'));
  } 
  
}
