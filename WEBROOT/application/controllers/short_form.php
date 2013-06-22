<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Short_form extends CI_Controller
{
	public function __construct ()
	{
		parent::__construct();
		
		$this->load->database();
	}
	
	public function get_and_continue ()
	{
		$transaction_id = $this->input->get('transaction_id');
		$aff_id = $this->input->get('aff_id');
		$offer_id = $this->input->get('offer_id');
		$first_name = $this->input->get('first_name');
		$last_name = $this->input->get('last_name');
		$street_address = $this->input->get('street_address');
		$zip_code = $this->input->get('zip_code');
		$home_phone = $this->input->get('home_phone');
		$mobile_phone = $this->input->get('mobile_phone');
		$email = $this->input->get('email');
		
		$client_ip_address = $this->input->ip_address();
		
		$data = array(
			'transaction_id' => $transaction_id,
			'aff_id' => $aff_id,
			'offer_id' => $offer_id,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'street_address' => $street_address,
			'zip_code' => $zip_code,
			'home_phone' => $home_phone,
			'mobile_phone' => $mobile_phone,
			'email' => $email,
			'client_ip_address' => $client_ip_address
		);
		
		$this->db->insert('short_forms', $data);
		$short_form_id = $this->db->insert_id();
		
		// fire postback url with transaction id
		$postback_url = "http://link.go2oursite.net/SP6D?transaction_id=$transaction_id";
		//$response = http_get($postback_url);
		$response = file_get_contents($postback_url);
		if ( ! $response ) {
			// There was a problem doing the postback
			
			// log it somewhere...
		}
		
		$this->load->helper('url');
		
		$target_offer_id = $this->input->get('target_offer_id');
		$redirect_url = "http://link.go2oursite.net/aff_c?offer_id=$target_offer_id&aff_id=$aff_id&short_form_id=$short_form_id";
		redirect($redirect_url, 'location', 302);
	}
	
	public function post_and_continue ()
	{
		$transaction_id = $this->input->post('transaction_id');
		$aff_id = $this->input->post('aff_id');
		$offer_id = $this->input->post('offer_id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$street_address = $this->input->post('street_address');
		$zip_code = $this->input->post('zip_code');
		$home_phone = $this->input->post('home_phone');
		$mobile_phone = $this->input->post('mobile_phone');
		$email = $this->input->post('email');
		
		$client_ip_address = $this->input->server('REMOTE_ADDR');
		
		$data = array(
			'transaction_id' => $transaction_id,
			'aff_id' => $aff_id,
			'offer_id' => $offer_id,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'street_address' => $street_address,
			'zip_code' => $zip_code,
			'home_phone' => $home_phone,
			'mobile_phone' => $mobile_phone,
			'email' => $email,
			'client_ip_address' => $client_ip_address
		);
		
		$this->db->insert('short_forms', $data);
		
		$short_form_id = $this->db->insert_id();
		
		$redirect_url = "https://secure.cashmoneynow.net/secure/loan_app/index.php/long_form/from_short_form/$short_form_id/";
		
		$this->load->helper('url');
		
		redirect($redirect_url, 'location', 302);
	}
}

/* End of file: short_form.php */