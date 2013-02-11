<?php

/**
 * municipio actions.
 *
 * @package    filven
 * @subpackage municipio
 * @author     Your name here
 */
class municipioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }        
    $this->Municipios = MunicipioQuery::create()->paginate($page,20);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Municipio = MunicipioPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Municipio);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MunicipioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MunicipioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Municipio = MunicipioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Municipio, sprintf('Object Municipio does not exist (%s).', $request->getParameter('id')));
    $this->form = new MunicipioForm($Municipio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Municipio = MunicipioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Municipio, sprintf('Object Municipio does not exist (%s).', $request->getParameter('id')));
    $this->form = new MunicipioForm($Municipio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Municipio = MunicipioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Municipio, sprintf('Object Municipio does not exist (%s).', $request->getParameter('id')));
    $Municipio->delete();

    $this->redirect('municipio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Municipio = $form->save();

      $this->redirect('municipio/edit?id='.$Municipio->getId());
    }
  }
}
