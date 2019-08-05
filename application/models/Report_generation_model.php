<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_generation_model extends CI_Model {

	public function get_total_tardiness($start_date, $end_date)
	{
		$this->db->select('tbl_report_generation.employee_number as tard_employee_number, SUM(tbl_report_generation.tardiness) as total_tardiness');
		$this->db->from('tbl_report_generation');
		$this->db->group_by('employee_number');
		$this->db->where('tbl_report_generation.dates >=', $start_date);
		$this->db->where('tbl_report_generation.dates <=', $end_date);
		$query = $this->db->get();

		return $query->result();
	}

	public function get_number_tardiness($start_date, $end_date)
	{
		$this->db->select('tbl_report_generation.employee_number as tard_employee_number, SUM(tbl_report_generation.num_of_tardiness) as number_tardiness');
		$this->db->from('tbl_report_generation');
		$this->db->group_by('employee_number');
		$this->db->where('tbl_report_generation.dates >=', $start_date);
		$this->db->where('tbl_report_generation.dates <=', $end_date);
		$query = $this->db->get();

		return $query->result();
	}
}	
