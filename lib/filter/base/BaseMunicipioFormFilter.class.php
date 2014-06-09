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
      'id_estado' => new sfWidgetFormPropelChoice(array('model' => 'Estado', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'municipio' => new sfValidatorPass(array('required' => false)),
      'id_estado' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Estado', 'column' => 'id')),
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
      'id_estado' => 'ForeignKey',
    );
  }
}
