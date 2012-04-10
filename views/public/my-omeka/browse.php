<?php $title = __(get_option('my_omeka_page_title').' Items');
    head(array('title' => $title, 'bodyid' => get_option('my_omeka_page_title'), 'bodyclass'=>'browse'));
?>

<div id="primary">
    <h1><?php echo $title; ?><?php echo __('(%s total)',$total_records); ?></h1>
</div>
<div id="primary">
    <ul class="navigation exhibit-tags" id="secondary-nav">
    <?php echo nav(array(
        __('Browse All') => uri(get_option('my_omeka_page_path').'browse'),
        __('Browse by Tag') => uri(get_option('my_omeka_page_path').'tags')
    )); print_r($tags);?>  
    </ul>
    
      <?php while (loop_items()): ?>
    <div class="item hentry">
        <div class="item-meta">

        <h2><?php echo link_to_item(item('Dublin Core', 'Title'), array('class'=>'permalink')); ?></h2>

        <?php if (item_has_thumbnail()): ?>
        <div class="item-img">
            <?php echo link_to_item(item_square_thumbnail()); ?>
        </div>
        <?php endif; ?>

        <?php if ($text = item('Item Type Metadata', 'Text', array('snippet'=>250))): ?>
        <div class="item-description">
            <p><?php echo $text; ?></p>
        </div>
        <?php elseif ($description = item('Dublin Core', 'Description', array('snippet'=>250))): ?>
        <div class="item-description">
            <?php echo $description; ?>
        </div>
        <?php endif; ?>

        <?php if (item_has_tags()): ?>
        <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
            <?php echo item_tags_as_string(); ?></p>
        </div>
        <?php endif; ?>

        <?php echo plugin_append_to_items_browse_each(); ?>

        </div><!-- end class="item-meta" -->
    </div><!-- end class="item hentry" -->
    <?php endwhile; ?>
</div>

<?php foot(); ?>
