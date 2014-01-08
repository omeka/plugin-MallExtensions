<?php
$position = isset($options['toggle-found'])
    ? html_escape($options['toggle-found'])
    : 'on';
$movie = '';
$image = '';
$count = 0;
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
    <div class="item-collapsed">
        <?php echo file_image('square_thumbnail', array('class' => 'thumbnail'), $image); ?>
        <h4><a href="#" class="hunt-item"><?php echo metadata($image, array('Dublin Core', 'Title')); ?></a></h4>
    </div>
    <div class="item-expanded">
        <?php echo file_image('original', array('class' => 'full'), $image); ?>
        <div class="found-actions">
            <h3>Found it!</h3>
            <a href="<?php echo $movie; ?>" class="movie" target="_blank">Hear about it</a>
            <a href="#" class="text">Read about it</a>
            <a href="#" class="done">Done</a>
        </div>
        <?php if ($text): ?>
        <div class="transcript">
            <?php echo $text; ?>
        </div>
        <?php endif; ?>
    </div>
<?php elseif ($image): ?>
    <?php echo file_image('original', array('class'=>'no-actions'), $image); ?>
    <div class="plain-text">
        <?php echo $text; ?>
    </div>
<?php endif; ?>
