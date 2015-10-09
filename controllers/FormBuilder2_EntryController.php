<?php
namespace Craft;

class FormBuilder2_EntryController extends BaseController
{

  protected $allowAnonymous = true;


  /**
   * Get All Forms
   *
   */
  public function actionEntriesIndex()
  { 
    $formItems = craft()->formBuilder2_form->getAllForms();
    $settings = craft()->plugins->getPlugin('FormBuilder2')->getSettings();
    $plugins = craft()->plugins->getPlugin('FormBuilder2');

    return $this->renderTemplate('formbuilder2/entries/index', array(
      'formItems'  => $formItems,
      'settings'  => $settings
    ));

  }

  

}