<?php

class AdminAccountlist_model extends CI_Model {

    public function getPatientsAcc(){

        $q = "select usr.*, p.id as pid
                from  users as usr
                left join patients as p on p.users_id = usr.id 
                where status = 1 and usr.role_id = 2";
        $query = $this->db->query($q);
        return $query->result();
    }
}