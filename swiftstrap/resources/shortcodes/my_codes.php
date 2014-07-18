<?php 


	include('./resources/shortcodes/shortcodes.php');

	function col_func($atts, $content='') 
	{
		
		$id = random_string('alnum', 16);
		$sd = '[/col]';

		$string ="<div class='col-sm-{$atts['foo']} move' id='$id' mwidth='{$atts['foo']}'> 
			<header class='panel-heading font-bold'> 
				<span style='color:#fff;'>fds</span> 
				<div class='handle fa fa-arrows'></div> 
				<div class='shrink fa fa-minus-square'></div> 
				<div class='grow fa fa-plus-square'></div> 
				<div class='remove fa fa-trash-o'></div>
			</header> 
			<section class='panel'> 
				<div class='panel-body'> 
					<div class='form-group'> 
						<label>Content</label> 
						<textarea name='content' 
							id='inp-$id' 
							class='form-control' 
							rows='5' 
							data-maxlength='500' 
							data-required='true' 
							placeholder='Type here' 
							data-toggle='tooltip' 
							data-placement='top' 
							title='' 
							data-original-title='content'>$content</textarea> 
					</div> 
					<div class='shorttag' id='shorttag-$id'>[col foo='{$atts['foo']}']$content{$sd}</div> 
				<button type='submit' class='btn btn-info btn-s-xs pp-text ' mid='$id'>ok</button> 
				</div> 

			</section>
		 </div>";
		 return $string;
	}
	add_shortcode('col', 'col_func');


	function img_func($atts, $content='') 
	{
		
		$id = random_string('alnum', 16);
		$sd = '[/col]';

		$string ="<div class='col-sm-{$atts['foo']} move' id='$id' mwidth='{$atts['foo']}'> 
			<header class='panel-heading fontx-bold'> 
				<span style='color:#fff;'>fds</span> 
				<div class='handle fa fa-arrows'></div> 
				<div class='shrink fa fa-minus-square'></div> 
				<div class='grow fa fa-plus-square'></div> 
				<div class='remove fa fa-trash-o'></div>
			</header> 
			<section class='panel'> 
				<div class='panel-body'> 
					<div class='form-group'> 
						<label>Image</label>
						<form method='post' action=' enctype='multipart/form-data'>
							<label>File Input: </label>
							<input type='file' name='file' class='demo1' id='$id' /></label>
							<div id='pic-$id'>

							</div>
						</form> 
						<div class='image'></div>
					</div> 
					<div class='shorttag' id='shorttag-$id'>[col foo='{$atts['foo']}'][img src='#'][/img]{$sd}</div> 
				<button type='submit' class='btn btn-info btn-s-xs pp-img' mid='$id'>ok</button> 
				</div> 

			</section>
		 </div>";
		 return $string;
	}

	add_shortcode('img', 'img_func');






		


 ?>