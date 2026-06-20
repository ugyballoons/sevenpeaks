<a class="image-menu-item" href="<?php echo $item->url ?>">
<?php
  $thumb_id = get_post_thumbnail_id($item->object_id);
  $img_el = wp_get_attachment_image($thumb_id, 'large');
  if ($img_el) {
    echo $img_el;
  } else {
    echo "<img src='" . plugins_url('images/placeholder-image.svg', __FILE__) . "'>";
  } ?>
  <div class='image-menu-overlay'>
    <h3 class='image-menu-item-name'><?php echo $item->title ?></h3>
    <div class='image-menu-excerpt'>
      <p ><?php echo get_the_excerpt($item->object_id) ?></p>
    </div>
  </div>
</a>
