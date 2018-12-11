<?php

/**
 * Lang form base class.
 *
 * @method Lang getObject() Returns the current form's model object
 *
 * @package    newslist
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLangForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'shortname'  => new sfWidgetFormInputText(),
      'fullname'   => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'shortname'  => new sfValidatorString(array('required' => true,'max_length' => 3)),
      'fullname'   => new sfValidatorString(array('required' => true))
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Lang', 'column' => array('id')))
    );

    $this->widgetSchema->setNameFormat('lang[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lang';
  }

}
