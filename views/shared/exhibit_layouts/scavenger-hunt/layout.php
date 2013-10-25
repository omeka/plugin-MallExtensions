<?php
$position = isset($options['toggle-found'])
    ? html_escape($options['toggle-found'])
    : 'on';
$movie = '';
$image = '';
?>
<?php foreach ($attachments as $attachment): ?>
    <?php $file = $attachment->getFile(); ?>
    <?php if ($file->has_derivative_image == 0): ?>
          <?php $movie = file_display_url($file, 'original'); ?>
    <?php else: ?>
          <?php $image = $file; ?>
    <?php endif; ?>
<?php endforeach; ?>

<?php if ($image && $options['toggle-found'] == 'on'): ?>
    <?php echo file_image('original', array(), $image); ?>
<?php elseif ($image): ?>
    <?php echo file_image('original', array('class'=>'no-actions'), $image); ?>
<?php endif; ?>
<?php if ($options['toggle-found'] == 'on'): ?>
    <div class="found-actions">
        <h3>Found it!</h3>
        <a href="<?php echo $movie; ?>" class="movie" target="_blank">Hear about it</a>
        <a href="#" class="text">Read about it</a>
        <?php if ($text): ?>
        <div class="transcript">
            <?php echo $text; ?>
        </div>
        <?php endif; ?>
    </div>
<?php else: ?>
    <div class="plain-text">
        <?php echo $text; ?>
    </div>
<?php endif; ?>