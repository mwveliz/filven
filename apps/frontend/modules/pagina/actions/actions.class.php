<?php

/**
 * pagina actions.
 *
 * @package    filven
 * @subpackage pagina
 * @author     Your name here
 */
class paginaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }
    
    $this->Paginas = PaginaQuery::create()->orderById('desc')->paginate($page,20);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Pagina = PaginaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Pagina);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PaginaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PaginaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Pagina = PaginaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pagina, sprintf('Object Pagina does not exist (%s).', $request->getParameter('id')));
    $this->form = new PaginaForm($Pagina);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Pagina = PaginaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pagina, sprintf('Object Pagina does not exist (%s).', $request->getParameter('id')));
    $this->form = new PaginaForm($Pagina);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Pagina = PaginaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pagina, sprintf('Object Pagina does not exist (%s).', $request->getParameter('id')));
    $Pagina->delete();

    $this->redirect('pagina/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Pagina = $form->save();

      $this->redirect('pagina/index');
    }
  }
}
