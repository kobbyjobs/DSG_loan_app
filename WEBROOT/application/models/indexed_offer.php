<?php if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );
////////////////////////////////////////////////////////////////////////////////
// File: application/models/indexed_offer.php
//
// Author: eamohl@leadsanddata.net
//
// Created: July 16, 2013
//
// Description: 
//
////////////////////////////////////////////////////////////////////////////////

class Indexed_offer extends CI_Model
{
	public $id;
	public $offer_id;
	public $site_configuration_id;
	public $created;
	
	public function __construct ()
	{
		parent::__construct();
		
		$this->load->database();
	}
	
	public function list_by_site_configuration_id ( $site_configuration_id )
	{
		$this->db->from( 'indexed_offers' );
		$this->db->where( 'site_configuration_id', $site_configuration_id );
		$this->db->select( '*' );
		
		$query = $this->db->get();
		
		$indexed_offers = array();
		
		foreach ( $query->result() as $row ) {
			$indexed_offers[( int ) $row->offer_id] = $row->site_configuration_id;
		}
		
		return $indexed_offers;
	}
	
	public function load ()
	{
		$this->db->from( 'indexed_offers' );
		$this->db->where( 'id', $this->id );
		$this->db->select( '*' );
		
		$query = $this->db->get();
		$row = $query->row();
		
		$this->offer_id = $row->offer_id;
		$this->site_configuration_id = $row->site_configuration_id;
		$this->created = $row->created;
	}
	
	public function create ()
	{
		$data = array(
			'offer_id' => $this->offer_id,
			'site_configuration_id' => $this->site_configuration_id,
		);
		
		$this->db->insert( 'indexed_offers', $data );
		$this->id = $this->db->insert_id();
	}
	
	public function delete ()
	{
		$this->db->where( 'id', $this->id );
		$this->db->delete( 'indexed_offers' );
	}
}

////////////////////////////////////////////////////////////////////////////////
// End of file: indexed_offer.php
////////////////////////////////////////////////////////////////////////////////