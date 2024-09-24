<?php

class Barangay_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->load->library('mhspusher');
    }

    public function getUserLogSess($user_id){

        $sql = "Select acc.*, acc.id as accid, su.*, su.id as suid, r.name as rname, r.code as rcode
                    from account as acc
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and acc.id = '".$user_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getBrgy($facilities_id){

        $sql = "Select f.*
                    from facilities as f
                    where f.facility_type_id = 4 and f.id ='".$facilities_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getResidents($facilities_id){

        $sql = "Select rsd.*, adr.street, f.name as bname, f.createdAt as bdate
                    from residents as rsd
                    left join address as adr on adr.residents_id = rsd.id
                    left join facilities as f on adr.facilities_id = f.id
                    where rsd.status = 1 and f.id = '".$facilities_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gettotal($facilities_id){
        $sql = "Select r.*
                    from residents as r
                    left join address as addr on addr.residents_id = r.id
                    where r.status = 1 and addr.facilities_id = '". $facilities_id ."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function insertResidentsData($resident_data){

        $this->db->insert('residents', $resident_data);
        return $this->db->insert_id();
    }

    public function insertAddressData($address_data){

        $this->db->insert('address', $address_data);
        return $this->db->insert_id();
    }
    
    // public function insertData($excel_Data) {
    //     $this->db->insert('residents', $excel_Data);
    //     return $this->db->insert_id();
    // }

    public function insertData($excel_Data) {
        // Check if a resident with the same email already exists
        $existing_resident = $this->db->get_where('residents', array('email' => $excel_Data['email']))->row();
    
        if ($existing_resident) {
            // Resident with the same email already exists, update the existing entry
            $this->db->where('id', $existing_resident->id);
            $this->db->update('residents', $excel_Data);
    
            return $existing_resident->id;
        } else {
            // Resident with the email doesn't exist, insert a new entry
            $this->db->insert('residents', $excel_Data);
            return $this->db->insert_id();
        }
    }
    
    // public function insertaddress($excelAdd_Data){
    //     $this->db->insert('address', $excelAdd_Data);
    //     return $this->db->insert_id();
    // }

    public function insertaddress($excelAdd_Data) {
        // Check if an address for the same resident already exists
        $existing_address = $this->db->get_where('address', array('residents_id' => $excelAdd_Data['residents_id']))->row();
    
        if ($existing_address) {
            // Address for the same resident already exists, update the existing entry
            $this->db->where('id', $existing_address->id);
            $this->db->update('address', $excelAdd_Data);
    
            return $existing_address->id;
        } else {
            // Address for the resident doesn't exist, insert a new entry
            $this->db->insert('address', $excelAdd_Data);
            return $this->db->insert_id();
        }
    }
    

    public function sendMsg($data){

       $inserted = $this->db->insert('try', $data);

       if ($inserted){
        $data = array('message' => 'New Message!');
        $this->mhspusher->triggerEvent('my-channel', 'my-event', $data);
       }
    }
}

?>