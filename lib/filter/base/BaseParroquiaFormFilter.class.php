<?php

/**
 * Parroquia filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseParroquiaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'  => new sfWidgetFormFilterInput(),
      'id_municipio' => new sfWidgetFormPropelChoice(array('model' => 'Municipio', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'descripcion'  => new sfValidatorPass(array('required' => false)),
      'id_municipio' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Municipio', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('parroquia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parroquia';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'descripcion'  => 'Text',
      'id_municipio' => 'ForeignKey',
    );
  }
}
