<?php

/**
 * Description of pmModelGeneratorConfigurationField
 *
 * @author Christian A. Rodriguez <car at cespi.unlp.edu.ar>
 */
class pmModelGeneratorConfigurationField extends sfModelGeneratorConfigurationField{
  public function __construct(sfModelGeneratorConfigurationField $configurationField) {
    parent::__construct($configurationField->name, $configurationField->config);
  }

  public function isReal() {
    return isset($this->config['column_name'])?true: parent::isReal();
  }
}
