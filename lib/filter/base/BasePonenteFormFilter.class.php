<?php

/**
 * Ponente filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePonenteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'       => new sfWidgetFormFilterInput(),
      'nacionalidad' => new sfWidgetFormFilterInput(),
      'especialidad' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'       => new sfValidatorPass(array('required' => false)),
      'nacionalidad' => new sfValidatorPass(array('required' => false)),
      'especialidad' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ponente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ponente';
  }

  public function getFields()
  {
    return array(
      'nombre'       => 'Text',
      'nacionalidad' => 'Text',
      'especialidad' => 'Text',
      'id'           => 'Number',
    );
  }
}
