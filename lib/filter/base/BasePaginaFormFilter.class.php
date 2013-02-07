<?php

/**
 * Pagina filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePaginaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_informe'      => new sfWidgetFormPropelChoice(array('model' => 'Informe', 'add_empty' => true)),
      'titulo_informe'  => new sfWidgetFormFilterInput(),
      'ante_cuadro'     => new sfWidgetFormFilterInput(),
      'titulo_cuadro'   => new sfWidgetFormFilterInput(),
      'post_cuadro'     => new sfWidgetFormFilterInput(),
      'texto_posterior' => new sfWidgetFormFilterInput(),
      'ante_grafico'    => new sfWidgetFormFilterInput(),
      'post_grafico'    => new sfWidgetFormFilterInput(),
      'tipo_grafico'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_informe'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Informe', 'column' => 'id')),
      'titulo_informe'  => new sfValidatorPass(array('required' => false)),
      'ante_cuadro'     => new sfValidatorPass(array('required' => false)),
      'titulo_cuadro'   => new sfValidatorPass(array('required' => false)),
      'post_cuadro'     => new sfValidatorPass(array('required' => false)),
      'texto_posterior' => new sfValidatorPass(array('required' => false)),
      'ante_grafico'    => new sfValidatorPass(array('required' => false)),
      'post_grafico'    => new sfValidatorPass(array('required' => false)),
      'tipo_grafico'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('pagina_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pagina';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'id_informe'      => 'ForeignKey',
      'titulo_informe'  => 'Text',
      'ante_cuadro'     => 'Text',
      'titulo_cuadro'   => 'Text',
      'post_cuadro'     => 'Text',
      'texto_posterior' => 'Text',
      'ante_grafico'    => 'Text',
      'post_grafico'    => 'Text',
      'tipo_grafico'    => 'Number',
    );
  }
}
