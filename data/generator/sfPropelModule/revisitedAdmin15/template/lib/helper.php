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

}
