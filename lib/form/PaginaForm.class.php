<?php

/**
 * Pagina form.
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
class PaginaForm extends BasePaginaForm
{
  public function configure()
  {
       $this->widgetSchema['texto_posterior'] = new sfWidgetFormTextarea(array(), array('cols' => 40, 'rows' => 8));
  }
}
