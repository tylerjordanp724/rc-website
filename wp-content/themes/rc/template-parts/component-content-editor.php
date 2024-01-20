<?php
/**
 * Component Name: Content Editor
 * 
 * 
 * 
 */
$content_editor = get_sub_field('content_editor');
?>
<div class="content-editor content-row">
    <div class="content-editor__inner container-lg">
        <?php if(!empty($content_editor)):?>
            <div class="wysiwyg">
                <?php echo $content_editor;?>
            </div>    
        <?php endif;?>
    </div>
</div>