<div class="sf_admin_pagination">
  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1" title="[?php echo __('First page', array(), 'sf_admin') ?]">
    <span class="sf_admin_page sf_admin_page_first">&#x23ee;</span>
  </a>

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]" title="[?php echo __('Previous page', array(), 'sf_admin') ?]">
    <span class="sf_admin_page sf_admin_page_previous">&#x23ea;</span>
  </a>

  [?php foreach ($pager->getLinks() as $page): ?]
    [?php if ($page == $pager->getPage()): ?]
      <span class="sf_admin_current_page">[?php echo $page ?]</span>
    [?php else: ?]
      <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a>
    [?php endif; ?]
  [?php endforeach; ?]

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]" title="[?php echo __('Next page', array(), 'sf_admin') ?]">
    <span class="sf_admin_page sf_admin_page_next">&#x23e9;</span>
  </a>

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]" title="[?php echo __('Last page', array(), 'sf_admin') ?]">
    <span class="sf_admin_page sf_admin_page_last">&#x23ed;</span>
  </a>
</div>
