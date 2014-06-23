<?php 

 include('./resources/shortcodes/shortcodes.php');

	function col_func($atts, $content='') 
	{
		return "<div class='col-sm-{$atts['foo']}' style='margin-top:20px;'> $content </div>";

	}
	add_shortcode('col', 'col_func');





 ?> 