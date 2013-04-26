<?php

/**
 * acceso actions.
 *
 * @package    filven
 * @subpackage acceso
 * @author     Your name here
 */
class accesoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Accesos = AccesoQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Acceso = AccesoPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Acceso);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AccesoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AccesoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Acceso = AccesoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Acceso, sprintf('Object Acceso does not exist (%s).', $request->getParameter('id')));
    $this->form = new AccesoForm($Acceso);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Acceso = AccesoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Acceso, sprintf('Object Acceso does not exist (%s).', $request->getParameter('id')));
    $this->form = new AccesoForm($Acceso);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Acceso = AccesoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Acceso, sprintf('Object Acceso does not exist (%s).', $request->getParameter('id')));
    $Acceso->delete();

    $this->redirect('acceso/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Acceso = $form->save();

      $this->redirect('acceso/edit?id='.$Acceso->getId());
    }
  }
}
