<?php

/**
 * visitante actions.
 *
 * @package    filven
 * @subpackage visitante
 * @author     Your name here
 */
class visitanteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $id_feria = $request->getParameter('id');
    
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }  
    
    $this->Visitantes = VisitanteQuery::create()
                        ->select('Fecha')
                        ->setDistinct('Fecha')
                        ->filterByIdFeria($id_feria)
                        ->orderByFecha('asc')
                        ->paginate($page,20);
    
  }
  
  public function executeAnual(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }  
    
    $this->Visitantes = FeriaQuery::create()->orderById('desc')->paginate($page,20);
    
  }  

  public function executeShow(sfWebRequest $request)
  {
    $this->Visitantes = VisitanteQuery::create()->filterByFecha($request->getParameter('fecha'))->orderByFecha('asc')->find();
    $this->forward404Unless($this->Visitantes);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new VisitanteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new VisitanteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Visitante = VisitanteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Visitante, sprintf('Object Visitante does not exist (%s).', $request->getParameter('id')));
    $this->form = new VisitanteForm($Visitante);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Visitante = VisitanteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Visitante, sprintf('Object Visitante does not exist (%s).', $request->getParameter('id')));
    $this->form = new VisitanteForm($Visitante);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Visitante = VisitanteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Visitante, sprintf('Object Visitante does not exist (%s).', $request->getParameter('id')));
    $Visitante->delete();

    $this->redirect('visitante/anual');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Visitante = $form->save();

      $this->redirect('visitante/anual');
    }
  }
  
  public function executeDetalle(sfWebRequest $request)
  {
    $this->Visitante = VisitanteQuery::create()->filterById($request->getParameter('id'))->findOne();
    $this->forward404Unless($this->Visitante);
  }  
  
}
