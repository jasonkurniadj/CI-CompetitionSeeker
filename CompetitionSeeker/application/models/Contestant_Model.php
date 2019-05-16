<?php
class Contestant_Model extends CI_Model 
{	
	public function viewAllContestant()
	{
		// Code here
	}

	public function viewContestantByName($name)
	{
		// Code here
	}

	public function viewContestantByID($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('msContestant');
		$query = $this->db->where('contestantID', $id);

		$query = $this->db->get();
		return $query->result();
	}

	public function updateProfilePicture($updateData)
	{
		// Code here
	}

	public function updatePersonalInfo($updateData)
	{
		$this->db->set('contestantPhone', $updateData['phone'], true);
		$this->db->set('email', $updateData['email'], true);
		$this->db->where('contestantID', $updateData['id']);
		$this->db->update('msContestant');
	}

	public function updateCreditCard($updateData)
	{
		$this->db->set('creditCard', $updateData['creditCard'], true);
		$this->db->where('contestantID', $updateData['id']);
		$this->db->update('msContestant');
	}

	public function updatePassword($updateData)
	{
		$this->db->set('password',$updateData['newPassword'], true);
		$this->db->where('contestantID', $updateData['id']);
		$this->db->update('msContestant');
	}
}
