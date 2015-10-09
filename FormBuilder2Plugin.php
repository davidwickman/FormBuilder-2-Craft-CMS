<?php

/*
Plugin Name: FormBuilder 2
Plugin Url: https://github.com/roundhouse/FormBuilder-2
Author: Vadim Goncharov (https://github.com/owldesign)
Author URI: http://roundhouseagency.com
Description: FormBuilder 2 is a Craft CMS plugin that lets you create forms for your front-end.
Version: 0.0.1
*/

namespace Craft;

class FormBuilder2Plugin extends BasePlugin
{

	public function getName()
	{
		return 'FormBuilder 2';
	}

	public function getVersion()
	{
		return '0.0.1';
	}

	public function getDeveloper()
	{
		return 'Roundhouse Agency';
	}

	public function getDeveloperUrl()
	{
		return 'https://github.com/roundhouse';
	}

  protected function defineSettings()
  {
    return array(
      'inputTemplatePath'   => array(AttributeType::String, 'default' => 'templates/forms/input', 'required' => true)
    );
  }

  public function getSettingsHtml()
  {
    $settings = craft()->plugins->getPlugin('FormBuilder2')->getSettings();

    return craft()->templates->render('formbuilder2/configuration', array(
      'settings' => $settings
    ));

 }

	public function hasCpSection()
  {
    return true;
  }

  public function registerCpRoutes()
  {
    return array(
      'formbuilder2'                              => array('action' => 'formBuilder2/dashboard'),
      'formbuilder2/configuration'                => array('action' => 'formBuilder2_Configuration/configurationIndex'),
      'formbuilder2/forms'                        => array('action' => 'formBuilder2_Form/formsIndex'),
      'formbuilder2/forms/new'                    => array('action' => 'formBuilder2_Form/editForm'),
      'formbuilder2/forms/(?P<formId>\d+)'        => array('action' => 'formBuilder2_Form/editForm'),
      'formbuilder2/forms/(?P<formId>\d+)/edit'   => array('action' => 'formBuilder2_Form/editForm'),
      'formbuilder2/entries'                      => array('action' => 'formBuilder2_Entry/entriesIndex'),
      'formbuilder2/entries/(?P<entryId>\d+)'     => array('action' => 'formBuilder2_Entry/viewEntry')
    );
  }

}