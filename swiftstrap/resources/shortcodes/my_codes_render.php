<?php 

 include('./resources/shortcodes/shortcodes.php');

	function col_func($atts, $content='') 
	{
		return "<div class='col-sm-{$atts['foo']}' style='margin-top:20px;'>".do_shortcode($content)." </div>";

	}
	add_shortcode('col', 'col_func');

	function img_func($atts, $content='') 
	{
		return "<img src='{$atts['src']}' class='img-responsive my-center'>";

	}
	add_shortcode('img', 'img_func');





 ?> 