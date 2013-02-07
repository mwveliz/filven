<?php

/**
 * Municipio filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseMunicipioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'municipio' => new sfWidgetFormFilterInput(),
      'estado'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'municipio' => new sfValidatorPass(array('required' => false)),
      'estado'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('municipio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Municipio';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'municipio' => 'Text',
      'estado'    => 'Text',
    );
  }
}
