<?php

function get_shortcode( $tag, $content ) {
	global $shortcode_tags;

	if ( false === strpos( $content, '[' ) ) {
		return $content;
	}

	if (empty($shortcode_tags) || !is_array($shortcode_tags) || !array_key_exists($tag, $shortcode_tags)){
		return $content;
	}

	$pattern = get_shortcode_regex(array($tag));
	preg_match('/'.$pattern.'/s', $content, $matches);

	if( !is_array($matches) || !count($matches) || $matches[2] != $tag){
		return "";
	}

	$content = shortcode_parse_atts($matches[3]);

	return call_user_func($shortcode_tags[$tag], $content);
}

?>
