<?php

/**
 * Actividad form base class.
 *
 * @method Actividad getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseActividadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'nombre_actividad'         => new sfWidgetFormInputText(),
      'ponente'                  => new sfWidgetFormInputText(),
      'turno'                    => new sfWidgetFormInputCheckbox(),
      'ejecutada'                => new sfWidgetFormInputCheckbox(),
      'cantidad_participantes_m' => new sfWidgetFormInputText(),
      'cantidad_participantes_f' => new sfWidgetFormInputText(),
      'alcanzo_tiempo'           => new sfWidgetFormInputCheckbox(),
      'causas_incumplimiento'    => new sfWidgetFormInputText(),
      'id_municipio'             => new sfWidgetFormInputText(),
      'escuela'                  => new sfWidgetFormInputCheckbox(),
      'refugio'                  => new sfWidgetFormInputCheckbox(),
      'observaciones'            => new sfWidgetFormInputText(),
      'id_sala'                  => new sfWidgetFormPropelChoice(array('model' => 'Sala', 'add_empty' => true)),
      'id_tipo_actividad'        => new sfWidgetFormPropelChoice(array('model' => 'TipoActividad', 'add_empty' => true)),
      'fecha'                    => new sfWidgetFormDate(),
      'hora'                     => new sfWidgetFormTime(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id', 'required' => false)),
      'nombre_actividad'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ponente'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'turno'                    => new sfValidatorBoolean(array('required' => false)),
      'ejecutada'                => new sfValidatorBoolean(array('required' => false)),
      'cantidad_participantes_m' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_participantes_f' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'alcanzo_tiempo'           => new sfValidatorBoolean(array('required' => false)),
      'causas_incumplimiento'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_municipio'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'escuela'                  => new sfValidatorBoolean(array('required' => false)),
      'refugio'                  => new sfValidatorBoolean(array('required' => false)),
      'observaciones'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_sala'                  => new sfValidatorPropelChoice(array('model' => 'Sala', 'column' => 'id', 'required' => false)),
      'id_tipo_actividad'        => new sfValidatorPropelChoice(array('model' => 'TipoActividad', 'column' => 'id', 'required' => false)),
      'fecha'                    => new sfValidatorDate(array('required' => false)),
      'hora'                     => new sfValidatorTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('actividad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Actividad';
  }


}
