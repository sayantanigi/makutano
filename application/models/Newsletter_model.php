<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class newsletter_model extends Master_Model {

	public function __construct() {
		parent::__construct();
		$this->table = 'newsletter';
	}
}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */