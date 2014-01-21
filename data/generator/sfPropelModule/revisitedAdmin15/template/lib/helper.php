[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 */
abstract class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
  }

  public function linkToMoveUp($object, $params)
  {
    if ($object->isFirst())
    {
      return '<li class="sf_admin_action_moveup disabled"><span>'.__($params['label'], array(), 'sf_admin').'</span></li>';
    }

    if (empty($params['action']))
    {
      $params['action'] = 'moveUp';
    }

    return '<li class="sf_admin_action_moveup">'.link_to(__($params['label'], array(), 'sf_admin'), '<?php echo $this->params['moduleName'] ?>/'.$params['action'].'?<?php echo $this->getPrimaryKeyUrlParams('$object', true); ?>).'</li>';
  }

  public function linkToMoveDown($object, $params)
  {
    if ($object->isLast())
    {
      return '<li class="sf_admin_action_movedown disabled"><span>'.__($params['label'], array(), 'sf_admin').'</span></li>';
    }

    if (empty($params['action']))
    {
      $params['action'] = 'moveDown';
    }

    return '<li class="sf_admin_action_movedown">'.link_to(__($params['label'], array(), 'sf_admin'), '<?php echo $this->params['moduleName'] ?>/'.$params['action'].'?<?php echo $this->getPrimaryKeyUrlParams('$object', true); ?>).'</li>';
  }

  public function linkToNew($params)
  {
    return '<li class="sf_admin_action_new btn medium primary">'.link_to(__($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('new')).'</li>';
  }

  public function linkToList($params)
  {
    return '<li class="sf_admin_action_list btn medium default icon-left icon-arrow-left">'.link_to(__($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('list')).'</li>';
  }

  public function linkToSave($object, $params)
  {
    return '<li class="sf_admin_action_save btn medium primary"><input type="submit" value="'.__($params['label'], array(), 'sf_admin').'" /></li>';
  }

  public function linkToSaveAndAdd($object, $params)
  {
    if (!$object->isNew())
    {
      return '';
    }

    return '<li class="sf_admin_action_save_and_add btn medium secondary"><input type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="_save_and_add" /></li>';
  }

  public function linkToExport($params)
  {
    $params['action'] = isset($params['action'])? $params['action'] : 'doExportationPages';
    $params['label'] = 'Export';

    return '<li class="sf_admin_action_export">'.link_to_function(__('Export'),
"
jQuery('#sf_admin_exportation').show();
jQuery('#sf_admin_exportation_ajax_indicator').show();
jQuery('#sf_admin_exportation_form').hide();
jQuery('#sf_admin_exportation').centerHorizontally();

jQuery('#sf_admin_exportation_form').load('".url_for(sfContext::getInstance()->getModuleName().'/'.$params['action'])."',

  function (response, status, xhr) {
    if (status != 'error')
    {
      jQuery('#sf_admin_exportation').show();
      jQuery('#sf_admin_exportation_ajax_indicator').hide();
      jQuery('#sf_admin_exportation_form').show();
      jQuery('#sf_admin_exportation').centerHorizontally();
      jQuery('#sf_admin_exportation_resizable_area').ensureVisibleHeight();
      jQuery(document).scrollTop(jQuery('#sf_admin_exportation').offset().top);
    }
  }
)").'</li>';
  }


  public function linkToUserExport($params)
  {
    $params['action'] = isset($params['action'])? $params['action'] : 'newUserExportation';
    $params['label'] = 'Custom export';

    return '<li class="sf_admin_action_user_export">'.link_to_function(__('Custom export'),
"
jQuery('#sf_admin_exportation').show();
jQuery('#sf_admin_exportation_ajax_indicator').show();
jQuery('#sf_admin_exportation_form').hide();
jQuery('#sf_admin_exportation').centerHorizontally();

jQuery('#sf_admin_exportation_form').load('".url_for(sfContext::getInstance()->getModuleName().'/'.$params['action'])."',

  function (response, status, xhr) {
    if (status != 'error')
    {
      jQuery('#sf_admin_exportation').show();
      jQuery('#sf_admin_exportation_ajax_indicator').hide();
      jQuery('#sf_admin_exportation_form').show();
      jQuery('#sf_admin_exportation').centerHorizontally();
      jQuery('#sf_admin_exportation_resizable_area').ensureVisibleHeight();
      jQuery(document).scrollTop(jQuery('#sf_admin_exportation').offset().top);
    }
  }
)").'</li>';
  }
}
