<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Long_form extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		
		$this->load->database();
	}
	
	public function index ()
	{
		$data = array(
			'transaction_id' => '10123456789ABBCDEF0123456789ABC',
			'aff_id' => '1000',
			'offer_id' => '225',
			'first_name' => 'MITHEONEX',
			'last_name' => 'PIXEL',
			'zip_code' => '34134',
			'street_address' => '26400 HICKORY BLVD',
			'home_phone' => '(239) 555-1234',
			'mobile_phone' => '(239) 555-5678',
			'email' => 'MITHEONEX.PIXEL@EXAMPLE.NET'
		);

		$this->load->view('long_form/main', $data);
	}
	
	public function show ($aff_id, $offer_id, $transaction_id)
	{
		$this->load->view('long_form');
	}
	
	public function show_from_short_form ($short_form_id, $aff_id, $offer_id, $transaction_id)
	{
		
	
		$this->load->view('long_form');
	}
}

/* End of file: long_form.php */
