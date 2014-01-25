<?php if ($actions = $this->configuration->getValue('list.actions')): ?>
<?php foreach ($actions as $name => $params): ?>
<?php if (isset($params['condition'])): ?>
[?php if (sfContext::getInstance()->getUser()-><?php echo $params['condition'] ?>()): ?]
<?php endif; ?>
<?php if ('_export' == $name):?>
<?php echo $this->addCredentialCondition('[?php echo $helper->linkToExport('.$this->asPhp($params).') ?]', $params)."\n" ?>
<?php elseif ('_user_export' == $name): ?>
<?php echo $this->addCredentialCondition('[?php echo $configuration->isExportationEnabled()?$helper->linkToUserExport('.$this->asPhp($params).'):"" ?]', $params)."\n" ?>

<?php endif; ?>
<?php if (isset($params['condition'])): ?>
[?php endif; ?]
<?php endif; ?>

<?php endforeach; ?>
<?php endif; ?>
