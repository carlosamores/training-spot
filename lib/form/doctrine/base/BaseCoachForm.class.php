<?php

/**
 * Coach form base class.
 *
 * @method Coach getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCoachForm extends AbstractPersonForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['classes_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AbstractClass'));
    $this->validatorSchema['classes_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AbstractClass', 'required' => false));

    $this->widgetSchema->setNameFormat('coach[%s]');
  }

  public function getModelName()
  {
    return 'Coach';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['classes_list']))
    {
      $this->setDefault('classes_list', $this->object->Classes->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveClassesList($con);

    parent::doSave($con);
  }

  public function saveClassesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['classes_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Classes->getPrimaryKeys();
    $values = $this->getValue('classes_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Classes', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Classes', array_values($link));
    }
  }

}
