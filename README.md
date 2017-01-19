# extract_shortcode
Wordpress has a strip_shortcodes but no extract. This function takes two arguments, the tag name of the shortcode and the_content;

General use: 
  <?php echo get_shortcode('shortcode_name',get_the_content()); ?>
  
  
