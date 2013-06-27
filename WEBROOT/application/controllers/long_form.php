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
		// Fake testing data, which would normally come from a corresponding short_form row
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
			'email' => 'MITHEONEX.PIXEL@EXAMPLE.NET',
			'short_form_id' => 0
		);
		
		$security_token = $this->_generate_security_token(0);
		$data['security_token'] = $security_token;

		$this->load->view('long_form/main', $data);
	}
	
	public function show ($aff_id, $offer_id, $transaction_id)
	{
		$data = array(
			'short_form_id' => 0,
			'aff_id' => $aff_id,
			'offer_id' => $offer_id,
			'transaction_id' => $transaction_id,
			'first_name' => '',
			'last_name' => '',
			'zip_code' => '',
			'street_address' => '',
			'home_phone' => '',
			'mobile_phone' => '',
			'email' => ''
		);
		
		$security_token = $this->_generate_security_token(0);
		$data['security_token'] = $security_token;
		
		$this->load->view('long_form/main', $data);
	}
	
	public function show_from_short_form ($short_form_id, $aff_id, $offer_id, $transaction_id)
	{
		$data = array(
			'short_form_id' => $short_form_id,
			'aff_id' => $aff_id,
			'offer_id' => $offer_id,
			'transaction_id' => $transaction_id,
			'first_name' => '',
			'last_name' => '',
			'zip_code' => '',
			'street_address' => '',
			'home_phone' => '',
			'mobile_phone' => '',
			'email' => ''
		);
		
		$this->db->from('short_forms');
		$this->db->select('*');
		$this->db->where('id', $short_form_id);
		$query = $this->db->get();
		$row = $query->row();
		
		$data['first_name'] = $row->first_name;
		$data['last_name'] = $row->last_name;
		$data['zip_code'] = $row->zip_code;
		$data['street_address'] = $row->street_address;
		$data['home_phone'] = $row->home_phone;
		$data['mobile_phone'] = $row->mobile_phone;
		$data['email'] = $row->email;
		
		$security_token = $this->_generate_security_token($short_form_id);
		$data['security_token'] = $security_token;
		
		$this->load->view('long_form/main', $data);
	}
	
	public function post_and_continue ()
	{
		$short_form_id = $this->input->post('short_form_id');
		$aff_id = $this->input->post('aff_id');
		$offer_id = $this->input->post('offer_id');
		$transaction_id = $this->input->post('transaction_id');
		$security_token = $this->input->post('security_token');
		$loan_amount_requested = $this->input->post('loan_amount_requested');
		$active_military = $this->input->post('active_military');
		$us_citizen = $this->input->post('us_citizen');
		$direct_deposit = $this->input->post('direct_deposit');
		$income_type = $this->input->post('income_type');
		$residence_type = $this->input->post('residence_type');
		$salutation = $this->input->post('salutation');
		$first_name = $this->input->post('first_name');
		$middle_initial = $this->input->post('middle_initial');
		$last_name = $this->input->post('last_name');
		$date_of_birth = $this->input->post('date_of_birth');
		$date_of_birth_month = $this->input->post('date_of_birth_month');
		$date_of_birth_day = $this->input->post('date_of_birth_day');
		$date_of_birth_year = $this->input->post('date_of_birth_year');
		$social_security_number = $this->input->post('social_security_number');
		$drivers_license_id_state = $this->input->post('drivers_license_id_state');
		$drivers_license_id_number = $this->input->post('drivers_license_id_number');
		$email = $this->input->post('email');
		$home_phone = $this->input->post('home_phone');
		$mobile_phone = $this->input->post('mobile_phone');
		$best_time_to_call = $this->input->post('best_time_to_call');
		$street_address = $this->input->post('street_address');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$zip_code = $this->input->post('zip_code');
		$months_at_address = $this->input->post('months_at_address');
		$months_at_address_years_part = $this->input->post('months_at_address_years_part');
		$months_at_address_months_part = $this->input->post('monts_at_address_months_part');
		$employer_name = $this->input->post('employer_name');
		$employer_phone = $this->input->post('employer_phone');
		$job_title = $this->input->post('job_title');
		$date_of_hire = $this->input->post('date_of_hire');
		$date_of_hire_month = $this->input->post('date_of_hire_month');
		$date_of_hire_day = $this->input->post('date_of_hire_day');
		$date_of_hire_year = $this->input->post('date_of_hire_year');
		$paycheck_frequency = $this->input->post('paycheck_frequency');
		$gross_monthly_income = $this->input->post('gross_monthly_income');
		$last_paycheck_amount = $this->input->post('last_paycheck_amount');
		$date_of_next_paycheck_1 = $this->input->post('date_of_next_paycheck_1');
		$date_of_next_paycheck_2 = $this->input->post('date_of_next_paycheck_2');
		$bank_routing_number = $this->input->post('bank_routing_number');
		$bank_account_number = $this->input->post('bank_account_number');
		$bank_name = $this->input->post('bank_name');
		$bank_phone = $this->input->post('bank_phone');
		$bank_account_type = $this->input->post('bank_account_type');
		$months_at_bank = $this->input->post('months_at_bank');
		$months_at_bank_years_part = $this->input->post('months_at_bank_years_part');
		$months_at_bank_months_part = $this->input->post('months_at_bank_months_part');
		$datax_pixel = $this->input->post('datax_pixel');
		$datax_pixel_aid = $this->input->post('datax_pixel_aid');
		$datax_pixel_sid = $this->input->post('datax_pixel_sid');
		
		$ip_address = $this->input->ip_address();
		
		$date_of_birth = $date_of_birth_year . '-' .  $date_of_birth_month . '-' . $date_of_birth_day;
		$date_of_hire = $date_of_hire_year . '-' . $date_of_hire_month . '-' . $date_of_hire_day;
		$months_at_address = ($months_at_address_years_part * 12) + $months_at_address_months_part;
		$months_at_bank = ($months_at_bank_years_part * 12) + $months_at_bank_months_part;
		
		$this->load->library('encrypt');
		
		$_social_security_number = $this->encrypt->encode($social_security_number);
		$_bank_account_number = $this->encrypt->encode($bank_account_number);
		
		if ( $paycheck_frequency == 'WEEKLY' ) {
			$gross_monthly_income = $last_paycheck_amount * 4;
		} else if ( $paycheck_frequency == 'EVERY TWO WEEKS' ) {
			$gross_monthly_income = $last_paycheck_amount * 2;
		} else if ( $paycheck_frequency == 'MONTHLY' ) {
			$gross_monthly_income = $last_paycheck_amount;
		} else if ( $paycheck_frequency == 'TWICE PER MONTH') {
			$gross_monthly_income = $last_paycheck_amount * 2;
		}
		
		$data = array(
			'short_form_id' => $short_form_id,
			'transaction_id' => $transaction_id,
			'aff_id' => $aff_id,
			'offer_id' => $offer_id,
			'ip_address' => $ip_address,
			'loan_amount_requested' => $loan_amount_requested,
			'active_military' => $active_military,
			'us_citizen' => $us_citizen,
			'direct_deposit' => $direct_deposit,
			'income_type' => $income_type,
			'residence_type' => $residence_type,
			'salutation' => $salutation,
			'first_name' => $first_name,
			'middle_initial' => $middle_initial,
			'last_name' => $last_name,
			'date_of_birth' => $date_of_birth,
			'social_security_number' => $_social_security_number,
			'drivers_license_id_state' => $drivers_license_id_state,
			'drivers_license_id_number' => $drivers_license_id_number,
			'home_phone' => $home_phone,
			'mobile_phone' => $mobile_phone,
			'best_time_to_call' => $best_time_to_call,
			'email' => $email,
			'street_address' => $street_address,
			'city' => $city,
			'state' => $state,
			'zip_code' => $zip_code,
			'months_at_address' => $months_at_address,
			'employer_name' => $employer_name,
			'employer_phone' => $employer_phone,
			'job_title' => $job_title,
			'date_of_hire' => $date_of_hire,
			'paycheck_frequency' => $paycheck_frequency,
			'last_paycheck_amount' => $last_paycheck_amount,
			'gross_monthly_income' => $gross_monthly_income,
			'date_of_next_paycheck_1' => $date_of_next_paycheck_1,
			'date_of_next_paycheck_2' => $date_of_next_paycheck_2,
			'bank_name' => $bank_name,
			'bank_phone' => $bank_phone,
			'months_at_bank' => $months_at_bank,
			'bank_account_type' => $bank_account_type,
			'bank_routing_number' => $bank_routing_number,
			'bank_account_number' => $_bank_account_number,
			'security_token' => $security_token,
			'datax_pixel' => $datax_pixel,
			'datax_pixel_aid' => $datax_pixel_aid,
			'datax_pixel_sid' => $datax_pixel_sid
		);
		
		$this->db->insert('long_forms', $data);
		$long_form_id = $this->db->insert_id();
		
		$data['social_security_number'] = $social_security_number;
		$data['bank_account_number'] = $bank_account_number;
		if ( $paycheck_frequency == 'WEEKLY' ) {
			$data['paycheck_frequency'] = 'Weekly';
		} else if ( $paycheck_frequency == 'EVERY TWO WEEKS' ) {
			$data['paycheck_frequency'] = 'BiWeekly';
		} else if ( $paycheck_frequency == 'MONTHLY' ) {
			$data['paycheck_frequency'] = 'Monthly';
		} else if ( $paycheck_frequency == 'TWICE PER MONTH' ) {
			$data['paycheck_frequency'] = 'TwiceMonthly';
		}
		if ( $income_type == 'EMPLOYED' ) {
			$data['employment_status'] = 'Employed';
		} else if ( $income_type == 'SELF EMPLOYED' ) {
			$data['employment_status'] = 'SelfEmployed';
		} else if ( $income_type == 'BENEFITS' ) {
			$data['employment_status'] = 'SocialSecurity';
		}
		
		$request = $this->load->view('long_form/ileads_request_xml', $data, true);
		$url = 'https://www.pingpost.biz/submit_lead/';
		$handle = curl_init($url);
		$headers = array(
			'Content-Type: text/xml'
		);
		curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($handle, CURLOPT_POST, 1);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $request);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($handle);
		curl_close($handle);
		
		$xml = simplexml_load_string($response);
		$success = $xml->response->success;
		$redirect_url = '';
		$price = 0.00;
		$application_status = '';
		
		if ($success == 'true') {
			$redirect_url = $xml->response->redirect;
			$price = $xml->response->price;
			$application_status = 'ACCEPTED';
			
			$postback_url = "http://link.go2oursite.net/SP6F?amount=$price&transaction_id=$transaction_id";
			file_get_contents($postback_url);
		} else {
			$redirect_url = "http://delta.rspcdn.com/xprr/red/PID/1453/SID/$aff_id?fname=$first_name&lname=$last_name&email=" . urlencode($email);
			$price = 0.00;
			$application_status = 'REJECTED';
		}
		
		$data = array(
			'long_form_id' => $long_form_id,
			'xml_request_string' => $request,
			'xml_response_string' => $response,
			'application_status' => $application_status,
			'sale_price' => $price
		);
		
		$this->db->insert('loan_application_submissions', $data);
		
		$data = array(
			'accepted' => $success,
			'redirect_url' => $redirect_url
		);
		
		$this->output->set_content_type('application/json');
		$this->load->view('long_form/post_and_continue_json', $data);
	}
	
	public function update_and_continue ($long_form_id, $security_token)
	{
		
	}
	
	public function lookup_bank_routing_number ($routing_number)
	{
		$response = file_get_contents("http://www.routingnumbers.info/api/data.json?rn=$routing_number");
		echo $response;
	}
	
	private function _generate_security_token ($id)
	{
		$security_token = 'DSG|' . $id . time();
		$security_token = md5($security_token);
		
		return $security_token;
	}
}

/* End of file: long_form.php */
