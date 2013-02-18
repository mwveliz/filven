<?php

/**
 * ponente actions.
 *
 * @package    filven
 * @subpackage ponente
 * @author     Your name here
 */
class ponenteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }
    
    $this->Ponentes = PonenteQuery::create()->orderByNombre()->paginate($page,20);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Ponente = PonentePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Ponente);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PonenteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PonenteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Ponente = PonenteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Ponente, sprintf('Object Ponente does not exist (%s).', $request->getParameter('id')));
    $this->form = new PonenteForm($Ponente);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Ponente = PonenteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Ponente, sprintf('Object Ponente does not exist (%s).', $request->getParameter('id')));
    $this->form = new PonenteForm($Ponente);

    $this->processForm($request, $this->form);

    $this->redirect('ponente/index');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Ponente = PonenteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Ponente, sprintf('Object Ponente does not exist (%s).', $request->getParameter('id')));
    $Ponente->delete();

    $this->redirect('ponente/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  { 
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Ponente = $form->save();

      $this->redirect('ponente/index');
    }
  }
}
