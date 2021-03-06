<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Phase_one_results extends MX_Controller
{

function __construct() {
parent::__construct();
}

function _delete_phase_one_fails() {
	//delete stocks where are not on results table
	$this->load->module('candidates');
	$this->load->module('stock_reader');
	$stocks_list = $this->stock_reader->get_stocks();
	foreach($stocks_list as $stock_symbol) {
		$count = $this->count_where('stock_symbol', $stock_symbol);

		if ($count==0) {
			//delete this from the candidates list
			$mysql_query = "update candidates set active=0 where stock_symbol='$stock_symbol'";
			$query = $this->_custom_query($mysql_query);
		}
	}
}

function get($order_by) {
$this->load->model('mdl_phase_one_results');
$query = $this->mdl_phase_one_results->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_phase_one_results');
$query = $this->mdl_phase_one_results->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) {
$this->load->model('mdl_phase_one_results');
$query = $this->mdl_phase_one_results->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_phase_one_results');
$query = $this->mdl_phase_one_results->get_where_custom($col, $value);
return $query;
}

function _insert($data) {
$this->load->model('mdl_phase_one_results');
$this->mdl_phase_one_results->_insert($data);
}

function _update($id, $data) {
$this->load->model('mdl_phase_one_results');
$this->mdl_phase_one_results->_update($id, $data);
}

function _delete($id) {
$this->load->model('mdl_phase_one_results');
$this->mdl_phase_one_results->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_phase_one_results');
$count = $this->mdl_phase_one_results->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_phase_one_results');
$max_id = $this->mdl_phase_one_results->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_phase_one_results');
$query = $this->mdl_phase_one_results->_custom_query($mysql_query);
return $query;
}

}