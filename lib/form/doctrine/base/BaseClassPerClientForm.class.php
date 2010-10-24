<?php

/**
 * ClassPerClient form base class.
 *
 * @method ClassPerClient getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClassPerClientForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_id'         => new sfWidgetFormInputHidden(),
      'abstract_class_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'client_id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('client_id')), 'empty_value' => $this->getObject()->get('client_id'), 'required' => false)),
      'abstract_class_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('abstract_class_id')), 'empty_value' => $this->getObject()->get('abstract_class_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('class_per_client[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClassPerClient';
  }

}
