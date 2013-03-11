<?php

/**
 * feria actions.
 *
 * @package    filven
 * @subpackage feria
 * @author     Your name here
 */
class feriaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }
    
    $this->Ferias = FeriaQuery::create()->orderByFechaInicio('desc')->paginate($page,20);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Feria = FeriaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Feria);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FeriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FeriaForm();

    $this->processForm($request, $this->form);

    $this->redirect('feria/index');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Feria = FeriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Feria, sprintf('Object Feria does not exist (%s).', $request->getParameter('id')));
    $this->form = new FeriaForm($Feria);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Feria = FeriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Feria, sprintf('Object Feria does not exist (%s).', $request->getParameter('id')));
    $this->form = new FeriaForm($Feria);

    $this->processForm($request, $this->form);

    $this->redirect('feria/index');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Feria = FeriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Feria, sprintf('Object Feria does not exist (%s).', $request->getParameter('id')));
    $Feria->delete();

    $this->redirect('feria/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Feria = $form->save();

      $this->redirect('feria/index');
    }
  }
  
  public function executeProyeccion(sfWebRequest $request)
  {
    $this->Feria = FeriaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Feria);
  }  
}
