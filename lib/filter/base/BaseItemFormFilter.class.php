<?php

/**
 * Item filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseItemFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'texto'              => new sfWidgetFormFilterInput(),
      'id_encuesta'        => new sfWidgetFormPropelChoice(array('model' => 'Encuesta', 'add_empty' => true)),
      'seleccion_simple'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'identificador_item' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'texto'              => new sfValidatorPass(array('required' => false)),
      'id_encuesta'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Encuesta', 'column' => 'id')),
      'seleccion_simple'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'identificador_item' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'texto'              => 'Text',
      'id_encuesta'        => 'ForeignKey',
      'seleccion_simple'   => 'Boolean',
      'identificador_item' => 'Number',
    );
  }
}
