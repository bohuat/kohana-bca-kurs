<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Grab extends Controller {

	public function action_bca()
	{
	
		// Get online html form server Klik BCA
		$response = Request::factory('http://www.klikbca.com/')->execute();
		$html = $response->body();
		
    		// Initial signatures
		$table_tag_start = '<table width="150" border="0" cellspacing="0" cellpadding="0" height="154">';
		$table_tag_finish = '<\/table>';
		
	  	// Get only values by values
		$table = preg_match('/'.$table_tag_start.'(.+?)'.$table_tag_finish.'/is', $html, $matches);
		
		// Add some html tag to fix results
    		$kurs_bca_html = $matches[0].'</td></tr><tr><td width="139" class="source">Sumber <a href="http://www.bca.co.id/id/biaya-limit/kurs_counter_bca/kurs_counter_bca_landing.jsp" target="_BLANK">Klikbca.com</a></td></tr></table></td><td width="6" valign="top"><img src="http://www.klikbca.com/images/kurs-kanan.jpg;bca22b6760ee4123775"></td></tr></table>';
		
		// Send to browser
		$this->response->body($kurs_bca_html);
	  
	}
	
}
