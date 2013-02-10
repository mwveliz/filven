<?php

/**
 * OpcionRespuesta filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseOpcionRespuestaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_item' => new sfWidgetFormPropelChoice(array('model' => 'Item', 'add_empty' => true)),
      'opcion'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_item' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Item', 'column' => 'id')),
      'opcion'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('opcion_respuesta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'OpcionRespuesta';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'id_item' => 'ForeignKey',
      'opcion'  => 'Text',
    );
  }
}
