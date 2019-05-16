<?php
class Competition_Model extends CI_Model 
{	
	public function viewAllCompetition()
	{
		//$query = $this->db->query("SELECT * FROM msCompetition
		//							ORDER BY competitionStartDate DESC");
		
		$query = $this->db->select('*');
		$query = $this->db->from('msCompetition');
		$query = $this->db->order_by('competitionDeadline', 'DESC');
		
		$query = $this->db->get();
		return $query->result();
	}

	public function viewCompetitionByName($name)
	{
		$query = $this->db->query("
			SELECT * FROM msCompetition A
			JOIN msCategory B ON A.categoryID = B.categoryID
			WHERE A.competitionName LIKE '%".$name."%'
				OR A.competitionLocation LIKE '%".$name."%'
				OR B.categoryName LIKE '%".$name."%'
			ORDER BY A.competitionDeadline DESC
		");

		return $query->result();
	}

	public function viewCompetitionByID($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('msCompetition');
		$query = $this->db->where('competitionID', $id);

		$query = $this->db->get();
		return $query->result();
	}
}
