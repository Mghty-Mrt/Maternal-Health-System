<?php

class Hospital_model extends CI_Model{

    public function getUserLogSess($user_id){

        $sql = "Select acc.*, acc.id as accid, su.*, su.id as suid, r.name as rname, r.code as rcode
                    from account as acc
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and acc.id = '".$user_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getnotif($facilities_id){

        $sql = "Select n.*, acc.*, su.*, n.status as n_stat
                    from notification as n
                    left join account as acc on n.notif_from = acc.id
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where n.status = 1 and n.notif_to = '".$facilities_id."'
                    Order By n.id DESC";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getTotalNotif($facilities_id){

        $sql = "Select COUNT(n.status) as total_notif, n.*, acc.*, su.*
                    from notification as n
                    left join account as acc on n.notif_from = acc.id
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where n.status = 1 and n.notif_to = '".$facilities_id."'
                    Order By n.id DESC";
        $query = $this->db->query($sql);
        $result = $query->row();
        return ($result) ? $result->total_notif : 0;
    }
    
    public function getETData(){

        $sql = "Select et.*
                    from equipement_type as et";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function insertEquipment($data){

        $this->db->insert('equipments', $data);
        return $this->db->insert_id();
    }

    public function getEqpData($facilities_id){
        $sql = "Select eq.*, et.name as etname
                    from equipments as eq
                    left join equipement_type as et on eq.equipment_type_id = et.id
                    where eq.facilities_id = '".$facilities_id."'
                    and eq.status = 1";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getEqui($equi_id){
        $sql = "Select eq.*, et.name as etname
                    from equipments as eq
                    left join equipement_type as et on eq.equipment_type_id = et.id
                    where eq.id = '".$equi_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function updateEquipment($eq_id, $update_data) {

        $this->db->where('id', $eq_id);
        $this->db->update('equipments', $update_data);
        
        if ($this->db->affected_rows() > 0) {
            return true; // Return true if update was successful
        } else {
            return false; // Return false if update failed
        }
    }

    public function updatedata($id) {
        $data = array(
            'status' => 0,
            'createdAt' => date('Y-m-d H:i:s') 
        );

        $this->db->where('id', $id);
        $this->db->update('equipments', $data);
    }

    public function getRefPatientData($facilities_id){
        $sql = "Select rp.*, rp.status as rpstatus, rp.id as rpid, f.name as fname, r.*, rp.createdAt as rp_date,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from refer_patient as rp
                    left join facilities as f on rp.refer_from = f.id
                    left join pre_registration as pre on rp.patients_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    where rp.refer_to = '".$facilities_id."' and rp.status in (0,1,2)";
            $query = $this->db->query($sql);
            return $query->result();        
    }

    public function getRefData($facilities_id, $ref_id){
        $sql = "Select rp.*, rp.id as rpid, f.name as fname, r.*,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from refer_patient as rp
                    left join facilities as f on rp.refer_from = f.id
                    left join pre_registration as pre on rp.patients_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    where rp.refer_to = '".$facilities_id."' and rp.id = '".$ref_id."'
                    and rp.status in (0,1,2)";
            $query = $this->db->query($sql);
            return $query->result();        
    }

    public function facilits($fac_id){
        $sql = "Select f.*
                    from facilities as f
                    where f.id = '".$fac_id."'";
            $query = $this->db->query($sql);
            return $query->result(); 
    }

    public function getfaci(){
        $sql = "Select su.*, su.id as suid, r.code
                    from system_users as su
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id 
                    where acc.status = 1";
            $query = $this->db->query($sql);
            return $query->result();        
    }

    public function reportReferral($referral_id){
        $data = array (
                'status' => 1,
        );
        $this->db->where('id', $referral_id);
        $this->db->update('refer_patient', $data);
    }

    public function sendReport($report_data){

        $this->db->insert('referral_status', $report_data);
        return true;
    }

    public function sendNReport($report_data){

        $this->db->insert('referral_status', $report_data);
        return true;
    }

    public function updateReferral($referral_id){
        $data = array (
                'status' => 2,
        );
        $this->db->where('id', $referral_id);
        $this->db->update('refer_patient', $data);
    }

    public function sendFeedback($feedback_data){

        $this->db->insert('referral_feedback', $feedback_data);
        return true;
    }

    public function updateref($id) {
        $data = array(
            'status' => 3,
            'createdAt' => date('Y-m-d H:i:s') 
        );

        $this->db->where('id', $id);
        $this->db->update('refer_patient', $data);
    }

    public function insert_slot($data)
    {
        $this->db->insert("bed_slot", $data);
        return $this->db->insert_id();
    }

    public function getSlot($facilities_id)
    {

        $sql = "Select bs.*
            from bed_slot as bs
            where bs.facilities_id='" . $facilities_id . "'
            and bs.status=1";
        $query = $this->db->query($sql);
        return $query->result();
    }
}

?>