<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shortcodes extends CI_Controller {

	public function index()
	{
		
	}

	public function test_lib()
	{
		$this->load->library('urls_library');
		$this->Urls_library->hello();
	}

	 /**
	  *  @Description: testing function NOT USED!
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function my_shortcodes()
	{
		include('./resources/shortcodes/shortcodes.php');

		
		function col_func($atts, $content='') 
		{
			
			return "<div class='col-sm-{$atts['foo']}'> $content </div>";
		}


		add_shortcode('col', 'col_func');
		echo do_shortcode('[col foo="2"]<b id="17">hey</b>[/col]');


	}

	 /**
	  *  @Description: test if file uploads work
	  *                work with ajax!
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function ajax_test()
	{
		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('builder/ajax');
		$this->load->view('footer');

	}

	 /**
	  *  @Description: test resize library working independantly
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	 public function resize($name)
	 {
	 	$config['image_library'] = 'gd2';
		$config['source_image']	= "./img/uploads/$name";
		//$config['create_thumb'] = TRUE;
		$id = random_string('alnum', 16);
		$config['new_image'] = "./img/uploads/$id.png";
		$config['width']	 = 500;
		$config['height']	= 300;

		
		$this->load->library('image_lib', $config); 

		$this->image_lib->resize();
		if ( ! $this->image_lib->resize())
		{
		    echo $this->image_lib->display_errors();
		}
		else{
			return $config['new_image'];
		}


	 }


	 /**
	  *  @Description: function to process the ajax upload
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function upload()
	{
		$whitelist = array('jpg', 'jpeg', 'png', 'gif');
		$name      = null;
		$error     = 'No file uploaded.';

		if (isset($_FILES)) {
			if (isset($_FILES['file'])) {
				$tmp_name = $_FILES['file']['tmp_name'];
				$name     = basename($_FILES['file']['name']);
				$error    = $_FILES['file']['error'];
				
				if ($error === UPLOAD_ERR_OK) {
					$extension = pathinfo($name, PATHINFO_EXTENSION);

					if (!in_array($extension, $whitelist)) {
						$error = 'Invalid file type uploaded.';
					} else {
						move_uploaded_file($tmp_name, "./img/uploads/$name");
					}
				}
			}
		}

		$path = $this->resize($name);

		$file_path = base_url($path);

		echo json_encode(array(
			'name'  => $file_path,
			'error' => $error,
		));
		die();

	}

	public function save_to_database()
	{
		

		$shorttag = $this->input->post('shorttag');

		$object = array('shortcodes'=>$shorttag );
		$this->db->insert('pages', $object);

	}
	 /**
	  *  @Description: this previews and renders the page you have built
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function preview_page()
	{
		include('./resources/shortcodes/my_codes_render.php');

		

		$this->db->select('shortcodes');
		$this->db->from('pages');

		$query = $this->db->get();
		
		$shorttag = "";
		foreach ($query->result() as $row) 
		{
			$shorttag = $row->shortcodes;
		}
		

		$data['content'] = do_shortcode($shorttag);



		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('builder/page_preview',$data);
		$this->load->view('footer');



	}

	//add text box

	public function box()
	{
		include('./resources/shortcodes/my_codes.php');
		echo do_shortcode('[col foo=4]Lorem ispsum[/col]');

	}

	//add image block
	public function image()
	{
		include('./resources/shortcodes/my_codes.php');
		echo do_shortcode('[img foo=4]Lorem ispsum[/img]');

	}


	public function load_builder_page()
	{
		include('./resources/shortcodes/my_codes.php');
		
		$this->db->select('shortcodes');
		$this->db->from('pages');

		$query = $this->db->get();
		
		$shorttag = "";
		foreach ($query->result() as $row) 
		{
			$shorttag = $row->shortcodes;
		}
		
		$data['content'] = do_shortcode($shorttag);

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('builder/builder',$data);
		$this->load->view('footer');
	}

}

/* End of file shortcodes.php */
/* Location: ./application/controllers/shortcodes.php */