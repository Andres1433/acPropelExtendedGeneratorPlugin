<?php if ($this->configuration->getValue('list.object_actions')): ?>
<td>
  <ul class="sf_admin_td_actions">
<?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
<?php if (isset($params['condition'])): ?>
  [?php if ($<?php echo $this->getSingularName() ?>-><?php echo $params['condition'] ?>()): ?]
<?php endif; ?>	
<?php if ('_delete' == $name): ?>
    <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDelete($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_edit' == $name): ?>
    <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_show' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToShow($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_move_up' == $name): ?>
    <?php echo $this->addCredentialCondition('[?php echo $helper->linkToMoveUp($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_move_down' == $name): ?>
    <?php echo $this->addCredentialCondition('[?php echo $helper->linkToMoveDown($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php else: ?>
    <?php $link = sprintf('<li class="sf_admin_action_%s">%s</li>', $params['class_suffix'], $this->getLinkToAction($name, $params, true); ?>
    <?php echo $this->addCredentialCondition($link, $params) ?>
<?php endif; ?>
<?php if (isset($params['condition'])): ?>
  [?php endif; ?]
<?php endif; ?>
<?php endforeach; ?>
  </ul>
</td>
<?php endif; ?>

