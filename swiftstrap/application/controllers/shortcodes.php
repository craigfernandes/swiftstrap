<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shortcodes extends CI_Controller {

	public function index()
	{
		
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

	public function box()
	{
		include('./resources/shortcodes/my_codes.php');
		echo do_shortcode('[col foo=4]Lorem ispsum[/col]');

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