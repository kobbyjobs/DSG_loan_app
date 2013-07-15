<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
////////////////////////////////////////////////////////////////////////////////
// File: WEBROOT/application/models/site_configuration.php
//
// Author: eamohl@leadsanddata.net
//
// Created: July 15, 2013
//
// Description:
//
////////////////////////////////////////////////////////////////////////////////

class Site_configuration extends CI_Model
{
	public $id;
	public $name;
	public $configuration_file;
	public $created;
	
	public $landing;
	public $short_form;
	public $long_form;
	public $banner;
	public $round_robin;
	
	public $ping_tree_1;
	public $ping_tree_2;
	public $ping_tree_3;
	public $ping_tree_4;
	
	// mutual exclusion meta-data
	public $mutex_meta;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->id = -1;
		
		$this->mutex_meta = array(
			'sem_key' => -1,
			'shm_key' => -1,
			'var_key' => 'counter',
			'ftok_project_id' => 'L',
			'ftok_pathname' => ''
		);
	}
	
	public function list_all()
	{
		$this->db->from( 'site_configurations' );
		$this->db->select( '*' );
		$query = $this->db->get();
		
		$site_configurations = array();
		
		foreach ( $query->result() as $row ) {
			$site_configurations[( int ) $row->id] = $row->name;
		}
		
		return $site_configurations;
	}
	
	public function load ()
	{
		$this->db->from( 'site_configurations' );
		$this->db->select( '*' );
		$this->db->where( 'id', $this->id );
		$query = $this->db->get();
		$row = $query->row();
		
		$this->name = $row->name;
		$this->configuration_file = $row->configuration_file;
		$this->created = $row->created;
		
		$configuration_path = '/home/cashmone/public_html/secure/DSG_loan_app/etc/sites/';
		$xml = simplexml_load_file( $configuration_path . $this->configuration_file );
		
		$this->landing = ( string ) $xml->{'landing'};
		$this->short_form = ( int ) $xml->{'short-form'};
		$this->long_form = ( int ) $xml->{'long-form'};
		$this->banner = ( string ) $xml->{'banner'};
		
		$_xml = $xml->xpath( '//ping-tree[@order="1"]' );
		$this->ping_tree_1 = ( string ) $_xml[0];
		$_xml = $xml->xpath( '//ping-tree[@order="2"]' );
		$this->ping_tree_2 = ( string ) $_xml[0];
		$_xml = $xml->xpath( '//ping-tree[@order="3"]' );
		$this->ping_tree_3 = ( string ) $_xml[0];
		$_xml = $xml->xpath( '//ping-tree[@order="4"]' );
		$this->ping_tree_4 = ( string ) $_xml[0];
		
		$this->mutex_meta['ftok_pathname'] = $configuration_path . $this->configuration_file;
		$ftok_key = ftok( $this->mutex_meta['ftok_pathname'], $this->mutex_meta['ftok_project_id'] );
		$this->mutex_meta['sem_key'] = $ftok_key;
		$this->mutex_meta['shm_key'] = $ftok_key;
	}
	
	public function from_post ()
	{
		
	}
	
	public function create()
	{
	
	}
	
	public function update()
	{
	
	}
}
////////////////////////////////////////////////////////////////////////////////
// End of file: site_configuration.php
////////////////////////////////////////////////////////////////////////////////