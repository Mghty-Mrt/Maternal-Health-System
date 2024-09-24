<?php

class Admin_model extends CI_Model {

    public function getUserLogSess($user_id){

        $sql = "Select acc.*, acc.id as accid, su.*, su.id as suid, r.name as rname
                    from account as acc
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and acc.id = '".$user_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getfacilities(){

        $sql = "Select f.*, rp.refer_from
                    from facilities as f
                    left join refer_patient as rp on rp.refer_from = f.id
                    where f.facility_type_id = 2
                    group by f.id";
            $query = $this->db->query($sql);
            return $query->result();

    }

    public function gettotal_from($from){

        $sql = "Select rp.*
                    from refer_patient as rp
                    where rp.refer_from = '". $from ."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getTotal_arrived($from){
        $sql = "Select rs.id, rp.refer_from
                    from referral_status as rs
                    left join refer_patient as rp on rs.refer_patient_id = rp.id
                    where rp.refer_from = '". $from ."' and rs.status = 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotal_unarrived($from){
        $sql = "Select rs.id, rp.refer_to
                    from referral_status as rs
                    left join refer_patient as rp on rs.refer_patient_id = rp.id
                    where rp.refer_from = '". $from ."' and rs.status = 0";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function updatepassword($acc_id, $email, $hashPass){

        $data = array(
            'email' => $email,
            'password' => $hashPass,
            'createdAt' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $acc_id);
        $this->db->update('account', $data);
    }

    public function updatePhoto($system_user_id, $hash_filename)
    {
        $this->db->where('id', $system_user_id);
        $this->db->update('system_users', ['image' => $hash_filename]);
    }

    public function gettotalusers(){

        $sql = "Select COUNT(acc.status) as total_users

                    from account as acc
                    where acc.status = 1";
            $query = $this->db->query($sql);
            $result = $query->row();
            return ($result) ? $result->total_users : 0;
    }

    public function gettotalhealthcenter(){

        $sql = "Select  COUNT(f.status) as total_health_center, f.*
                    from facilities as f
                    where facility_type_id = 2 and status = 1";
            $query = $this->db->query($sql);
            //return $query->result();
            $result = $query->row();
            return ($result) ? $result->total_health_center : 0;
    }

    public function gettotalhospital(){

        $sql = "Select  COUNT(f.status) as total_health_center, f.*
                    from facilities as f
                    where facility_type_id = 3 and status = 1";
            $query = $this->db->query($sql);
            //return $query->result();
            $result = $query->row();
            return ($result) ? $result->total_health_center : 0;
    }

    public function gettotallyingin(){

        $sql = "Select  COUNT(f.status) as total_Arc_hospital, f.*
                    from facilities as f
                    where facility_type_id = 5 and status = 1";
            $query = $this->db->query($sql);
            //return $query->result();
            $result = $query->row();
            return ($result) ? $result->total_Arc_hospital : 0;
    }

    public function gettotalpatients()
    {
        $sql = "Select pr.*, pr.createdAt as prdatetime
                    from pre_registration as pr
                    where pr.status = 2";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getongoing_patients(){
        $sql = "Select p.id
                    from patients as p
                    where p.status in (1,2)
                    group by p.pre_registration_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getdone_patients(){
        $sql = "Select p.id
                    from patients as p
                    where p.status = 0
                    group by p.pre_registration_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gettotalactive(){

        $sql = "Select acc.id, acc.createdAt as acc_date

                    from account as acc
                    where acc.status = 1";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getBrgyData(){

        $sql = "Select f.*
                    from facilities as f
                    where facility_type_id = 4 and status = 1
                    order by f.id desc";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getBrgylist(){

        $sql = "Select fl.*
                    from facility_list as fl
                    where fl.status = 1 and fl.facility_type_id = 4
                    order by fl.id desc";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getHclist(){

        $sql = "Select fl.*
                    from facility_list as fl
                    where fl.status = 1 and fl.facility_type_id = 2";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getBrgyDetails($brgy_id){

        $sql = "Select f.*
                    from facilities as f
                    where facility_type_id = 4 and status = 1
                    and f.id = '".$brgy_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function insertBarangayData($brgy_data){

        $this->db->insert('facilities', $brgy_data);
        return $this->db->insert_id();
    }

    public function viewBrgyData($brgy_id){

        $sql = "Select f.*
                    from facilities as f
                    where facility_type_id = 4 and f.id = '".$brgy_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function updateBarangayData($brgy_id, $brgy_data){

        try {
            $this->db->where('id', $brgy_id);
            $this->db->update('facilities', $brgy_data);
    
            if ($this->db->affected_rows() > 0) {
                return true; // Successfully updated
            } else {
                return false; // Update failed
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getBrgyResidents($brgy_id){

        $sql = "Select rsd.*, rsd.id as  rsdid, adr.street, f.name as bname, f.createdAt as bdate,
                    f.id as fid
                    from residents as rsd
                    left join address as adr on adr.residents_id = rsd.id
                    left join facilities as f on adr.facilities_id = f.id
                    where rsd.status = 1 and f.id = '".$brgy_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getBrgyResidentsArc($brgy_id){

        $sql = "Select rsd.*, adr.street, f.id as fid, f.name as bname, f.createdAt as bdate
                    from residents as rsd
                    left join address as adr on adr.residents_id = rsd.id
                    left join facilities as f on adr.facilities_id = f.id
                    where rsd.status = 0 and f.id = '".$brgy_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getHCData(){

        $sql = "Select f.*
                    from facilities as f
                    where facility_type_id = 2 and status = 1
                    order by f.id desc";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function insertHCData($HC_data){

        $this->db->insert('facilities', $HC_data);
        return $this->db->insert_id();
    }

    public function insertLyData($Ly_data){

        $this->db->insert('facilities', $Ly_data);
        return $this->db->insert_id();
    }

    public function viewHCData($hc_id){

        $sql = "Select f.*
                    from facilities as f
                    where facility_type_id = 2 and f.id = '".$hc_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function updateHCData($hc_id, $hc_data){

        try {
            $this->db->where('id', $hc_id);
            $this->db->update('facilities', $hc_data);
    
            if ($this->db->affected_rows() > 0) {
                return true; // Successfully updated
            } else {
                return false; // Update failed
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getHospitalData(){

        $sql = "Select f.*
                    from facilities as f
                    where facility_type_id = 3 and status = 1
                    order by f.id desc";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function insertHospitalData($Hospital_data){

        $this->db->insert('facilities', $Hospital_data);
        return $this->db->insert_id();
    }

    public function viewHospitalData($hospital_id){

        $sql = "Select f.*
                    from facilities as f
                    where facility_type_id = 3 and f.id = '".$hospital_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function updateHospitalData($hospital_id, $hospital_data){

        try {
            $this->db->where('id', $hospital_id);
            $this->db->update('facilities', $hospital_data);
    
            if ($this->db->affected_rows() > 0) {
                return true; // Successfully updated
            } else {
                return false; // Update failed
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getSystemUsers(){

        $sql = "Select su.*, su.id as suid, su.createdAt as sudate, f.name as fname,
                    r.name as rname

                    from system_users as su
                    left join facilities as f on su.facilities_id = f.id
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and f.facility_type_id = 2";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getRoleData(){

        $sql = "Select r.*
                    from role as r
                    where r.id in (2,3,5,7);";
            $query = $this->db->query($sql);
            return $query->result(); 
    }

    public function getFacilitiesData(){

        $sql = "Select f.*
                    from facilities as f
                    where f.facility_type_id = 2";
            $query = $this->db->query($sql);
            return $query->result(); 
    }

    public function getHospitalSystemUsers(){

        $sql = "Select su.*, su.id as suid, su.createdAt as sudate, f.name as fname,
                    r.name as rname

                    from system_users as su
                    left join facilities as f on su.facilities_id = f.id
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and f.facility_type_id = 3";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getLySystemUsers(){

        $sql = "Select su.*, su.id as suid, su.createdAt as sudate, f.name as fname,
                    r.name as rname

                    from system_users as su
                    left join facilities as f on su.facilities_id = f.id
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and f.facility_type_id = 5";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getHospitalRoleData(){

        $sql = "Select r.*
                    from role as r
                    where r.id in (9,11);";
            $query = $this->db->query($sql);
            return $query->result(); 
    }

    public function getLyRoleData(){

        $sql = "Select r.*
                    from role as r
                    where r.id in (8,10);";
            $query = $this->db->query($sql);
            return $query->result(); 
    }

    public function getHospitalFacilitiesData(){

        $sql = "Select f.*
                    from facilities as f
                    where f.facility_type_id = 3";
            $query = $this->db->query($sql);
            return $query->result(); 
    }

    public function getLyFacilitiesData(){

        $sql = "Select f.*
                    from facilities as f
                    where f.facility_type_id = 5";
            $query = $this->db->query($sql);
            return $query->result(); 
    }

    public function getBrgySystemUsers(){

        $sql = "Select su.*, su.id as suid, su.createdAt as sudate, f.name as fname,
                    r.name as rname

                    from system_users as su
                    left join facilities as f on su.facilities_id = f.id
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and f.facility_type_id = 4";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getBrgyRoleData(){

        $sql = "Select r.*
                    from role as r
                    where r.id in (4);";
            $query = $this->db->query($sql);
            return $query->result(); 
    }

    public function getBrgyFacilitiesData(){

        $sql = "Select f.*
                    from facilities as f
                    where f.facility_type_id = 4";
            $query = $this->db->query($sql);
            return $query->result(); 
    }

    public function insertAccountData($HCAccount_data){

        $this->db->insert('account', $HCAccount_data);
        return $this->db->insert_id();

    }

    
    public function insertSystemUserData($HCSystemUserData){

        $this->db->insert('system_users', $HCSystemUserData);
        return $this->db->insert_id();

    }

    public function getHCuser($HC_user_id){

        $sql = "Select su.*, su.id as suid, su.createdAt as sudate, f.name as fname, f.id as fid,
                    r.name as rname, r.id as rid, acc.*, acc.id as accid

                    from system_users as su
                    left join facilities as f on su.facilities_id = f.id
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and f.facility_type_id = 2 and su.id = '".$HC_user_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function updateSU($hc_user_id, $updte_user_data){

        try {
            $this->db->where('id', $hc_user_id);
            $this->db->update('system_users', $updte_user_data);
    
            if ($this->db->affected_rows() > 0) {
                return true; // Successfully updated
            } else {
                return false; // Update failed
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function updateAcc($hc_acc_id, $updte_acc_data){

        try {
            $this->db->where('id', $hc_acc_id);
            $this->db->update('account', $updte_acc_data);
    
            if ($this->db->affected_rows() > 0) {
                return true; // Successfully updated
            } else {
                return false; // Update failed
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function archiveHCsu($hc_user_id) {
        $data = array(
            'status' => 0
        );

        $this->db->where('id', $hc_user_id);
        $this->db->update('account', $data);
    }

    public function archiveLysu($hc_user_id) {
        $data = array(
            'status' => 0
        );

        $this->db->where('id', $hc_user_id);
        $this->db->update('account', $data);
    }

    public function getArchivedUsers(){

        $sql = "Select su.*, su.id as suid, su.createdAt as sudate, f.name as fname, f.id as fid,
                    r.name as rname, r.id as rid, acc.*, acc.id as accid

                    from system_users as su
                    left join facilities as f on su.facilities_id = f.id
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 0";
            $query = $this->db->query($sql);
            return $query->result();
    }

    //hospital user 
    public function getHuser($H_user_id){

        $sql = "Select su.*, su.id as suid, su.createdAt as sudate, f.name as fname, f.id as fid,
                    r.name as rname, r.id as rid, acc.*, acc.id as accid

                    from system_users as su
                    left join facilities as f on su.facilities_id = f.id
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and f.facility_type_id = 3 and su.id = '".$H_user_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getLyuser($H_user_id){

        $sql = "Select su.*, su.id as suid, su.createdAt as sudate, f.name as fname, f.id as fid,
                    r.name as rname, r.id as rid, acc.*, acc.id as accid

                    from system_users as su
                    left join facilities as f on su.facilities_id = f.id
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and f.facility_type_id = 5 and su.id = '".$H_user_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getBrgyuser($brgy_user_id){

        $sql = "Select su.*, su.id as suid, su.createdAt as sudate, f.name as fname, f.id as fid,
                    r.name as rname, r.id as rid, acc.*, acc.id as accid

                    from system_users as su
                    left join facilities as f on su.facilities_id = f.id
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and f.facility_type_id = 4 and su.id = '".$brgy_user_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function restoreSystemUser($restore_user_id) {
        $data = array(
            'status' => 1
        );

        $this->db->where('id', $restore_user_id);
        $this->db->update('account', $data);
    }

    public function getBrgy(){

        $sql = "Select f.*
                    from facilities as f
                    where f.facility_type_id = 4";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getResident($resident_id){

        $sql = "Select rsd.*, rsd.id as  rsdid, adr.id as ardid, adr.street, adr.city, f.name as bname, rsd.createdAt as bdate,
                    f.id as fid
                    from residents as rsd
                    left join address as adr on adr.residents_id = rsd.id
                    left join facilities as f on adr.facilities_id = f.id
                    where rsd.status = 1 and rsd.id = '".$resident_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function updateResidentsData($resident_id, $resident_data){

        try {
            $this->db->where('id', $resident_id);
            $this->db->update('residents', $resident_data);
    
            if ($this->db->affected_rows() > 0) {
                return true; // Successfully updated
            } else {
                return false; // Update failed
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function updateAddressData($address_id, $address_data){

        try {
            $this->db->where('id', $address_id);
            $this->db->update('address', $address_data);
    
            if ($this->db->affected_rows() > 0) {
                return true; // Successfully updated
            } else {
                return false; // Update failed
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function archiveResi($resident_id) {
        $data = array(
            'status' => 0,
            'createdAt' => date('Y-m-d H:i:s') 
        );

        $this->db->where('id', $resident_id);
        $this->db->update('residents', $data);
    }

    public function restoreResi($resident_id) {
        $data = array(
            'status' => 1,
            'createdAt' => date('Y-m-d H:i:s') 
        );

        $this->db->where('id', $resident_id);
        $this->db->update('residents', $data);
    }

    public function getHCFuser($hc_id){

        $sql = "Select su.*, su.id as suid, su.createdAt as sudate, f.name as fname, f.id as fid,
                    r.name as rname, r.id as rid, acc.*, acc.id as accid

                    from system_users as su
                    left join facilities as f on su.facilities_id = f.id
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and f.id = '".$hc_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function refpatients($hc_id){

        $sql = "Select rp.*, rp.id as rpid, rp.createdAt as refdate, rp.status as rpstat, f.name as fname

                    from refer_patient as rp
                    left join facilities as f on rp.refer_to = f.id
                    where rp.refer_from = '".$hc_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getallpatients($hc_id){

        $sql = "Select p.*, p.id as pid, r.*, addr.*, f.name as fname, pt.name as ptname,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', addr.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS fname

                    from patients as p
                    left join patient_type as pt on p.patient_type_id = pt.id
                    left join pre_registration as pre on p.pre_registration_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    left join address as addr on addr.residents_id = r.id
                    left join system_users as su on pre.system_users_id = su.id
                    left join facilities as f on su.facilities_id = f.id 
                    where p.status = 1 and su.facilities_id = '".$hc_id."'";
                    // group by p.pre_registration_id (limit to one visit only)
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getfacility($hc_id){
        $sql = "Select f.*
                    from facilities as f
                    where f.status = 1 and f.id = '".$hc_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getHcUsrProfile($su_id){

        $sql = "Select su.*, su.id as suid, su.createdAt as sudate, f.name as fname, f.id as fid,
                    r.name as rname, r.id as rid, acc.*, acc.id as accid

                    from system_users as su
                    left join facilities as f on su.facilities_id = f.id
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and su.id = '".$su_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function gethequipments($hc_id){

        $sql = "Select eq.*, eq.id as eqid, eqt.name as eqtname
                    from equipments as eq
                    left join equipement_type as eqt on eq.equipment_type_id = eqt.id
                    where eq.status = 1 and eq.facilities_id = '".$hc_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function hospitalrefpatients($hc_id){

        $sql = "Select rp.*, rp.id as rpid, rp.createdAt as refdate, rp.status as rpstat, f.name as fname
                    from refer_patient as rp
                    left join facilities as f on rp.refer_from = f.id
                    where rp.refer_to = '".$hc_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getSlot($hc_id)
    {

        $sql = "Select bs.*
            from bed_slot as bs
            where bs.facilities_id='" . $hc_id . "'
            and bs.status=1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getLylist(){

        $sql = "Select fl.*
                    from facility_list as fl
                    where fl.status = 1 and fl.facility_type_id = 5";   
                $query = $this->db->query($sql);
                return $query->result();
    }

 public function getLYData(){

        $sql = "Select f.* 
                    from facilities as f
                    where facility_type_id = 5 and status = 1
                    order by f.id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function updatefData($f_data, $name){

        $this->db->where('id', $name);
        $this->db->update('facilities', $f_data);
    }

    
}

?>