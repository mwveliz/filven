<?php

/**
 * ValorOpcion filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseValorOpcionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_opcion'           => new sfWidgetFormFilterInput(),
      'valor'               => new sfWidgetFormFilterInput(),
      'id_opcion_respuesta' => new sfWidgetFormPropelChoice(array('model' => 'OpcionRespuesta', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_opcion'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'valor'               => new sfValidatorPass(array('required' => false)),
      'id_opcion_respuesta' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'OpcionRespuesta', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('valor_opcion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ValorOpcion';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'id_opcion'           => 'Number',
      'valor'               => 'Text',
      'id_opcion_respuesta' => 'ForeignKey',
    );
  }
}
