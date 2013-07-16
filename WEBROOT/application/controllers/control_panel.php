<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
////////////////////////////////////////////////////////////////////////////////
// File: WEBROOT/application/controller/control_panel.php
//
// Author: eamohl@leadsanddata.net
//
// Created: July 15, 2013
//
// Description:
//
////////////////////////////////////////////////////////////////////////////////

class Control_panel extends CI_Controller
{
	public function __construct ()
	{
		parent::__construct();
		
		$this->load->library('session');
		$this->load->database();
	}
	
	public function index ()
	{
		$this->load->helper( 'url' );
		
		if ( $this->__check_user_logged_in() ) {
			redirect( site_url( '/control_panel/dashboard' ));
			die;
		} else {
			$this->load->view( 'control_panel/login' );
		}
	}
	
	public function login ( $username, $password )
	{
		$this->load->helper( 'url' );
		
		$_username = urldecode( $username );
		$_password = urldecode( $password );
		$this->db->from( 'users' );
		$this->db->select( '*' );
		$this->db->where( 'username', $_username );
		$query = $this->db->get();
		$row = $query->row();
		
		if ( $_password == $row->password ) {
			$this->session->set_userdata( 'uid', $row->id );
			redirect( site_url( '/control_panel/dashboard' ));
			die;
		} else {
			redirect( site_url( '/control_panel' ));
			die;
		}
	}
	
	public function logout ()
	{
		$this->load->helper( 'url' );
		
		$this->session->sess_destroy();
		
		redirect( site_url( '/control_panel' ));
		die;
	}
	
	public function dashboard ()
	{
		$this->load->helper( 'url' );
		
		if ( ! $this->__check_user_logged_in() ) {
			redirect( site_url( '/control_panel' ));
			die;
		} else {
			$this->load->view( 'control_panel/dashboard' );
		}
	}
	
	public function create_site_configuration ()
	{
		$this->load->model( 'site_configuration' );
		
		$this->site_configuration->from_post();
		
		$this->site_configuration->create();
		
		$json = json_encode( array(
			'status' => array (
				'code' => 0,
				'message' => 'Successfully created site configuration'
			)
		));
		
		$this->output->set_content_type( 'application/json' );
		$this->output->set_output( $json );
	}
	
	public function site_configurations ()
	{
		$this->load->model( 'site_configuration' );
		
		$site_configurations = $this->site_configuration->list_all();
		
		$json = json_encode( array( 'site_configurations' => $site_configurations ));
		
		$this->output->set_content_type( 'application/json' );
		$this->output->set_output( $json );
	}
	
	public function site_configuration ( $id )
	{
		$this->load->model( 'site_configuration' );
		
		$this->site_configuration->id = $id;
		$this->site_configuration->load();
		
		$json = json_encode( array(
			'site_configuration' => array (
				'id' => $this->site_configuration->id,
				'name' => $this->site_configuration->name,
				'configuration_file' => $this->site_configuration->configuration_file,
				'created' => $this->site_configuration->created,
				'landing' => $this->site_configuration->landing,
				'short_form' => $this->site_configuration->short_form,
				'long_form' => $this->site_configuration->long_form,
				'banner' => $this->site_configuration->banner,
				'ping_tree_1' => $this->site_configuration->ping_tree_1,
				'ping_tree_2' => $this->site_configuration->ping_tree_2,
				'ping_tree_3' => $this->site_configuration->ping_tree_3,
				'ping_tree_4' => $this->site_configuration->ping_tree_4,
				'mutex_meta' => $this->site_configuration->mutex_meta
			)
		));
		
		$this->output->set_content_type( 'application/json' );
		$this->output->set_output( $json );
	}
	
	public function update_site_configuration ( $id )
	{
		$this->load->model( 'site_configuration' );
		
		$this->site_configuration->id = $id;
		$this->site_configuration->from_post();
		
		$this->site_configuration->update();
		
		$json = json_encode( array(
			'status' => array (
				'code' => 0,
				'message' => 'Successfully updated site configuration'
			)
		));
		
		$this->output->set_content_type( 'application/json' );
		$this->output->set_output( $json );
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

////////////////////////////////////////////////////////////////////////////////
// End of file: control_panel.php
////////////////////////////////////////////////////////////////////////////////