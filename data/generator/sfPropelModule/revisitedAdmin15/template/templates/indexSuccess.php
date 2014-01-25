[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

<div id="sf_admin_container">
  <?php if ($this->configuration->isExportationEnabled()): ?>
    [?php include_partial('exportation', array('configuration' => $configuration)) ?]
  <?php endif ?>

  <h1>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h1>

  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

  <div id="sf_admin_header">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]
  </div>

<?php if ($this->configuration->hasFilterForm()): ?>
  <div id="sf_admin_bar">
    [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
  </div>
<?php endif; ?>

  <div id="sf_admin_content">

  <ul class="sf_admin_header_actions">
  <?php if ($actions = $this->configuration->getValue('list.actions')): ?>
  <?php if ((isset($actions['_new'])) && (isset($actions['_new']['condition']))): ?>
    [?php if (sfContext::getInstance()->getUser()-><?php echo $actions['_new']['condition'] ?>()): ?]
  <?php endif; ?>
  <?php if ((isset($actions['_new']))): ?>
    <?php echo $this->addCredentialCondition('[?php echo $helper->linkToNew('.$this->asPhp($actions['_new']).') ?]', $actions['_new']) ?>
  <?php endif; ?>
  <?php if ((isset($actions['_new'])) && (isset($actions['_new']['condition']))): ?>
  [?php endif; ?]
  <?php endif; ?>
  <?php endif; ?>
  </ul>

  
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
    <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
<?php endif; ?>
    [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
    <ul class="sf_admin_actions">
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
    </ul>
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
    </form>
<?php endif; ?>
  </div>

  <div id="sf_admin_footer">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
  </div>
</div>
