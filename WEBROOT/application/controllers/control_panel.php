<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
////////////////////////////////////////////////////////////////
// File: application/controller/control_panel.php
////////////////////////////////////////////////////////////////

class Control_panel extends CI_Controller
{
	public function __construct ()
	{
		parent::__construct();
		
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
	}
	
	public function index ()
	{
		$url = "https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/";
		
		if ( $this->__check_user_logged_in() ) {
			redirect( $url . 'dashboard/' );
			die;
		}
		
		$this->load->view( 'control_panel/login' );
	}
	
	public function login ( $username, $password )
	{
		$_username = urldecode( $username );
		$_password = urldecode( $password );
		$this->db->from( 'users' );
		$this->db->select( '*' );
		$this->db->where( 'username', $_username );
		$query = $this->db->get();
		$row = $query->row();
		
		//if ( true ) {
			//echo "$username \n\n $password \n\n";
			//echo $row->username . " \n\n " . $row->password . " \n\n ";
			//die;
		if ( $_password == $row->password ) {
			$this->session->set_userdata( 'uid', $row->id );
			redirect( "https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/dashboard/" );
			die;
		} else {
			redirect( "https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/" );
			die;
		}
	}
	
	public function logout ()
	{
		$this->session->sess_destroy();
		redirect( "https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/" );
	}
	
	public function dashboard ()
	{
		if ( ! $this->__check_user_logged_in() ) {
			redirect( "https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/" );
			die;
		}
		
		$this->load->view( 'control_panel/dashboard' );
	}
	
	public function section ( $id )
	{
	
	}
	
	private function __check_user_logged_in ()
	{
		if ( ! $this->session->userdata( 'uid' ) ) {
			return false;
		} else {
			return true;
		}
	}
}

////////////////////////////////////////////////////////////////
// End of file: application/controller/control_panel.php
////////////////////////////////////////////////////////////////