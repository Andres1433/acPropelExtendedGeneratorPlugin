[?php if ($sf_user->hasFlash('notice')): ?]
  <div class="success alert">[?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?]</div>
[?php endif; ?]

[?php if ($sf_user->hasFlash('error')): ?]
  <div class="danger alert">[?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?]</div>
[?php endif; ?]
