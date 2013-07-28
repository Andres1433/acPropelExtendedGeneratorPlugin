<?php

/**
 * acPropelExtendedGeneratorPluginConfiguration
 *
 * @author José Nahuel Cuesta Luengo <nahuelcuestaluengo@gmail.com>
 */ 
class acPropelExtendedGeneratorPluginConfiguration extends sfPluginConfiguration
{
  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    sfConfig::set('sf_admin_module_web_dir', '/acPropelExtendedGeneratorPlugin');
  }
}
 