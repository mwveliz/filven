<?php

/**
 * sala actions.
 *
 * @package    filven
 * @subpackage sala
 * @author     Your name here
 */
class salaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }      
      
    $this->Salas = SalaQuery::create()->paginate($page,20);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Sala = SalaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Sala);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SalaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SalaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Sala = SalaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Sala, sprintf('Object Sala does not exist (%s).', $request->getParameter('id')));
    $this->form = new SalaForm($Sala);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Sala = SalaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Sala, sprintf('Object Sala does not exist (%s).', $request->getParameter('id')));
    $this->form = new SalaForm($Sala);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Sala = SalaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Sala, sprintf('Object Sala does not exist (%s).', $request->getParameter('id')));
    $Sala->delete();

    $this->redirect('sala/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Sala = $form->save();

      $this->redirect('sala/index');
    }
  }
}
