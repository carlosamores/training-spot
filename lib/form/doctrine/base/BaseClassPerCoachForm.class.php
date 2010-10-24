<?php

/**
 * ClassPerCoach form base class.
 *
 * @method ClassPerCoach getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClassPerCoachForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'coach_id'          => new sfWidgetFormInputHidden(),
      'abstract_class_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'coach_id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('coach_id')), 'empty_value' => $this->getObject()->get('coach_id'), 'required' => false)),
      'abstract_class_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('abstract_class_id')), 'empty_value' => $this->getObject()->get('abstract_class_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('class_per_coach[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClassPerCoach';
  }

}
