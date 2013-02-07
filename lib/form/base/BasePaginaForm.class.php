<?php

/**
 * Pagina form base class.
 *
 * @method Pagina getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePaginaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'id_informe'      => new sfWidgetFormPropelChoice(array('model' => 'Informe', 'add_empty' => true)),
      'titulo_informe'  => new sfWidgetFormInputText(),
      'ante_cuadro'     => new sfWidgetFormInputText(),
      'titulo_cuadro'   => new sfWidgetFormInputText(),
      'post_cuadro'     => new sfWidgetFormInputText(),
      'texto_posterior' => new sfWidgetFormInputText(),
      'ante_grafico'    => new sfWidgetFormInputText(),
      'post_grafico'    => new sfWidgetFormInputText(),
      'tipo_grafico'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'Pagina', 'column' => 'id', 'required' => false)),
      'id_informe'      => new sfValidatorPropelChoice(array('model' => 'Informe', 'column' => 'id', 'required' => false)),
      'titulo_informe'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ante_cuadro'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'titulo_cuadro'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'post_cuadro'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'texto_posterior' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ante_grafico'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'post_grafico'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tipo_grafico'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pagina[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pagina';
  }


}
