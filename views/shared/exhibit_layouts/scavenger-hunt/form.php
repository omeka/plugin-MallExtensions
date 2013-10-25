<?php
$formStem = $block->getFormStem();
$options = $block->getOptions();
?>

<div class="selected-items">
    <h4><?php echo __('Items'); ?></h4>
    <p class="instructions"><?php echo __('To reorder items, click and drag the item to the preferred location.'); ?></p>
    <?php echo $this->exhibitFormAttachments($block); ?>
</div>

<div class="block-text">
    <h4><?php echo __('Text'); ?></h4>
    <?php echo $this->exhibitFormText($block); ?>
</div>

<div class="layout-options">
    <div class="block-header">
        <h4><?php echo __('Layout Options'); ?></h4>
        <div class="drawer"></div>
    </div>
    
    <div class="toggle-found">
        <?php echo $this->formLabel($formStem . '[options][toggle-found]', __('Found Actions')); ?>
        <?php
        echo $this->formSelect($formStem . '[options][toggle-found]',
            @$options['toggle-found'], array(),
            array('on' => 'On', 'right' => 'Off'));
        ?>
    </div>
</div>
