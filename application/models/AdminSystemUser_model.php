<?php

class AdminSystemUser_model extends CI_Model {

    public function getPosition (){

        $q = "select role.*
                from  role 
                where status = 1 and role.id in(3,4,5)";
        $query = $this->db->query($q);
        return $query->result();
    }

    public function getHealthCenter(){

        $q = "select hc.*
                from  health_center as hc 
                where status = 1";
        $query = $this->db->query($q);
        return $query->result();
    }

    public function getSystemUsers(){

        $q = "select su.id as suid, su.image, usr.*, hc.name as hcname
                from  system_user as su
                left join users as usr on su.users_id = usr.id
                left join role as rl on usr.role_id = rl.id
                left join health_center as hc on su.health_center_id = hc.id 
                where usr.status = 1
                ORDER BY su.id DESC";
        $query = $this->db->query($q);
        return $query->result();
    }

    public function registerSU($account_data){
        $this->db->insert('users', $account_data);
        return $this->db->insert_id();
    }

    public function insertSU($su_data){
        $this->db->insert('system_user', $su_data);
        return $this->db->insert_id();
    }

    public function getSUdetails($users_id){

        $q = "select su.id as suid, su.image, usr.*, hc.name as hcname, hc.id as hcid, rl.description as rldesc, rl.id as rlid
                from  system_user as su
                left join users as usr on su.users_id = usr.id
                left join role as rl on usr.role_id = rl.id
                left join health_center as hc on su.health_center_id = hc.id 
                where usr.status = 1 and usr.id = ".$users_id."
                ORDER BY su.id DESC";
        $query = $this->db->query($q);
        return $query->result();
    }

    public function updateSUdata($users_id, $su_id, $firstname, $lastname, $midname, $contactno, $position, $heatlhcenter, $email, $password) {
        $this->db->trans_start();
        $users_data = array(
            'email' => $email,
            'password' => $password,
            'firstname' => $firstname,
            'middlename' => $midname,
            'lastname' => $lastname,
            'contactno' => $contactno,
            'role_id' => $position,
        );
    
        $this->db->where('id', $users_id);
        $this->db->update('users', $users_data);

        $su_data = array(
            'health_center_id' => $heatlhcenter,
        );
    
        $this->db->where('id', $su_id);
        $this->db->update('system_user', $su_data);
    
        $this->db->trans_complete();
    
        if ($this->db->trans_status() === FALSE) {
            // if Transaction failed, return false
            return false;
        }
    
        // or else Transaction successful, return true
        return true;
    }

    public function archiveSystemUser($system_user_id) {
        $data = array(
            'status' => 0
        );

        $this->db->where('id', $system_user_id);
        $this->db->update('users', $data);
    }
}

?>