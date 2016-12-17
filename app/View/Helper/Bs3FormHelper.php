<?php
/**
 * @file AppFormHelper.
 *  This allows you to create defaults for your forms.
 */
App::uses('FormHelper', 'View/Helper');

class Bs3FormHelper extends FormHelper {

  public function create($model = null, $options = array()) {
    $default = array(
      'inputDefaults' => array(
        'div' => 'form-group',
        'class' => 'form-control',
        'autocomplete' => 'off',
      ),
    );
    $options = Hash::merge($default, $options);
    return parent::create($model, $options);
  }

}