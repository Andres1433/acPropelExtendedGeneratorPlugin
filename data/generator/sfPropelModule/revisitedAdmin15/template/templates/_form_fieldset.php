<a name="[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]" tabindex="-1"></a>
<fieldset id="sf_fieldset_[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]">
  [?php if ('NONE' != $fieldset): ?]
    <legend>[?php echo __($fieldset, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</legend>
  [?php endif; ?]

  [?php foreach ($fields as $name => $field): ?]
    [?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?]
    [?php $required = ''; ?]
    [?php try {
      $validator = $form->getValidator($name);
      $required = $validator->hasOption('required') && $validator->getOption('required') ? ' required' : '';
    } catch(Exception $e) {} ?]
    [?php include_partial('<?php echo $this->getModuleName() ?>/form_field', array(
      'name'       => $name,
      'attributes' => $field->getConfig('attributes', array()),
      'label'      => $field->getConfig('label'),
      'help'       => $field->getConfig('help'),
      'form'       => $form,
      'field'      => $field,
      'class'      => 'row field sf_admin_field_'.strtolower($field->getType()).' sf_admin_form_field_'.$name.$required,
    )) ?]
  [?php endforeach; ?]
</fieldset>
