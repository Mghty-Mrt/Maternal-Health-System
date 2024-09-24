<?php

class Patient_model extends CI_Model {

    public function getUserLogSess($access_id){

        $sql = "Select ac.*, rl.name as rname,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', addr.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS fname

                    from access_code as ac
                    left join role as rl on ac.role_id = rl.id
                    left join patients as p on p.access_code_id = ac.id
                    left join pre_registration as pre on p.pre_registration_id =  pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join laboratory as l on l.pre_registration_id = pre.id
                    left join residents as r on pre.residents_id = r.id
                    left join address as addr on addr.residents_id = r.id
                    left join facilities as f on addr.facilities_id = f.id
                    where ac.id = '". $access_id ."'
                    group by p.pre_registration_id";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getRecord ($access_code)
    {
        
        $sql= "Select p.*,pr.*,r.*,pp.*,p.id as pid, p.patient_type_id as ptname, p.createdAt as datecheckup,
                    dr.id as dr_id, nr.id as nr_id, dr.createdAt as drdate, nr.createdAt as ndate, ppo.id as ppo_id, ppo.createdAt as ppo_date,
                    ppon.id as ppon_id,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    FROM patients as p
                    LEFT JOIN patient_type as pt on p.patient_type_id=pt.id
                    LEFT JOIN pre_registration as pr on p.pre_registration_id=pr.id
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    LEFT JOIN residents as r on pr.residents_id=r.id
                    LEFT JOIN patient_prenatal as pp on pp.patients_id=p.id
                    left join patient_postnatal as ppon on ppon.patients_id = p.id
                    LEFT JOIN access_code as ac on p.access_code_id=ac.id

                    LEFT JOIN refer_patient as rp on p.pre_registration_id = rp.patients_id
                    LEFT JOIN delivery_record as dr on dr.refer_patient_id = rp.id
                    LEFT JOIN newborn_record as nr on nr.delivery_record_id = dr.id
                    LEFT JOIN patient_postpartum as ppo on ppo.patients_id = p.id

                    WHERE p.status in (1,2) AND p.access_code_id='".$access_code."'
                    ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getitrrecord($patient_id){

        $sql = "Select p.*, pi.*, pre.*, r.*, addr.*, f.name as fname, l.*, l.createdAt as labdate,
                    p.pre_registration_id as p_pre_id,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', addr.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS fname

                    from patients as p
                    left join patients_itr as pi on pi.patients_id = p.id
                    left join pre_registration as pre on p.pre_registration_id =  pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join laboratory as l on l.pre_registration_id = pre.id
                    left join residents as r on pre.residents_id = r.id
                    left join address as addr on addr.residents_id = r.id
                    left join facilities as f on addr.facilities_id = f.id
                    where p.id = '".$patient_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getPrenatal($pren_id){

        $sql = "Select p.*, pn.*, pre.*, r.*, addr.*, f.name as fname, l.*, l.createdAt as labdate,
                    p.pre_registration_id as ppre_id, p.id as p_id,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', addr.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS bname

                    from patient_prenatal as pn 
                    left join patients as p on pn.patients_id = p.id
                    left join pre_registration as pre on p.pre_registration_id =  pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join laboratory as l on l.pre_registration_id = pre.id
                    left join residents as r on pre.residents_id = r.id
                    left join address as addr on addr.residents_id = r.id
                    left join facilities as f on addr.facilities_id = f.id
                    where pn.patients_id = '". $pren_id ."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getPartum($pp_id){

        $sql = "Select p.*, ppo.*, pre.*, r.*, addr.*, f.name as fname, l.*, l.createdAt as labdate,
                    p.pre_registration_id as ppre_id, p.id as p_id,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', addr.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS bname

                    from patient_postpartum as ppo 
                    left join patients as p on ppo.patients_id = p.id
                    left join pre_registration as pre on p.pre_registration_id =  pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join laboratory as l on l.pre_registration_id = pre.id
                    left join residents as r on pre.residents_id = r.id
                    left join address as addr on addr.residents_id = r.id
                    left join facilities as f on addr.facilities_id = f.id
                    where ppo.id = '". $pp_id ."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function gethusband($id){

        $sql = "Select pi.husband_data, pi.counseling

                    from patients as p
                    left join patients_itr as pi on pi.patients_id = p.id
                    left join pre_registration as pre on p.pre_registration_id =  pre.id
                    where p.pre_registration_id = '". $id ."' and p.patient_type_id = 4";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getfupre($pren_id){

        $sql = "Select p.*, pn.*, pre.*, r.*, addr.*, f.name as fname, l.*, l.createdAt as labdate,
                    p.pre_registration_id as ppre_id, p.id as p_id,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', addr.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS bname

                    from patient_prenatal as pn 
                    left join patients as p on pn.patients_id = p.id
                    left join pre_registration as pre on p.pre_registration_id =  pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join laboratory as l on l.pre_registration_id = pre.id
                    left join residents as r on pre.residents_id = r.id
                    left join address as addr on addr.residents_id = r.id
                    left join facilities as f on addr.facilities_id = f.id
                    where pn.patients_id = '". $pren_id ."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getpatientaccess($code)
    {
        $q = "select ac.*, r.id as rid 
                from access_code as ac 
                left join role as r on ac.role_id = r.id
                where ac.code = '".($code)."'";
           $query = $this->db->query($q);
           return $query->result();    
    }

    public function getSchedule($access_code)
    {
        $sql= "Select p.* , pr.system_users_id, su.*
                    FROM patients as p
                    LEFT JOIN patient_prenatal as pp on pp.patients_id=p.id
                    LEFT JOIN pre_registration as pr on p.pre_registration_id=pr.id
                    LEFT JOIN system_users as su on pr.system_users_id=su.id
                    WHERE p.status in (1,2) AND p.access_code_id='$access_code'
                    and p.checkUpStatus = 0 ";

        $query = $this->db->query($sql);    
        return $query->result();
    }

    public function getdoneRecord($access_code)
    {
        
        $sql= "Select p.*,pr.*,r.*,p.id as pid, p.patient_type_id as ptname, p.createdAt as datecheckup,
                    pc.createdAt as pc_date,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    FROM patients_completed as pc
                    LEFT JOIN patients as p on pc.patients_id = p.pre_registration_id
                    LEFT JOIN patient_type as pt on p.patient_type_id=pt.id
                    LEFT JOIN pre_registration as pr on p.pre_registration_id=pr.id
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    LEFT JOIN residents as r on pr.residents_id=r.id
                    LEFT JOIN access_code as ac on p.access_code_id=ac.id

                    WHERE p.access_code_id='".$access_code."'
                    GROUP BY p.pre_registration_id";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getRecordOld ($access_code)
    {
        
        $sql= "Select p.*,pr.*,r.*,pp.*,p.id as pid, p.patient_type_id as ptname, p.createdAt as datecheckup,
        dr.id as dr_id, nr.id as nr_id, dr.createdAt as drdate, nr.createdAt as ndate, ppo.id as ppo_id, ppo.createdAt as ppo_date,
        ppon.id as ppon_id,

        CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
        CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
        CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
        CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
        CONCAT_WS(' ', r.age, oreg.age) AS age,
        CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
        CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
        CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
        CONCAT_WS(' ', r.email, oreg.email) AS email

        FROM patients as p
        LEFT JOIN patient_type as pt on p.patient_type_id=pt.id
        LEFT JOIN pre_registration as pr on p.pre_registration_id=pr.id
        left join online_registration as oreg on pr.online_registration_id = oreg.id
        LEFT JOIN residents as r on pr.residents_id=r.id
        LEFT JOIN patient_prenatal as pp on pp.patients_id=p.id
        left join patient_postnatal as ppon on ppon.patients_id = p.id
        LEFT JOIN access_code as ac on p.access_code_id=ac.id

        LEFT JOIN refer_patient as rp on p.pre_registration_id = rp.patients_id
        LEFT JOIN delivery_record as dr on dr.refer_patient_id = rp.id
        LEFT JOIN newborn_record as nr on nr.delivery_record_id = dr.id
        LEFT JOIN patient_postpartum as ppo on ppo.patients_id = p.id

        WHERE p.status in (0) AND p.access_code_id='".$access_code."'
        ";

$query = $this->db->query($sql);
return $query->result();
    }

    public function getregi ($access_code)
    {
        
        $sql= "Select su.facilities_id

                    FROM patients as p
                    LEFT JOIN patient_type as pt on p.patient_type_id=pt.id
                    LEFT JOIN pre_registration as pr on p.pre_registration_id=pr.id
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    LEFT JOIN residents as r on pr.residents_id=r.id
                    LEFT JOIN access_code as ac on p.access_code_id = ac.id
                    left join account as acc on pr.system_users_id = acc.id
                    left join system_users as su on su.account_id = acc.id

                    WHERE p.access_code_id='".$access_code."'";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getusers($facilities_id){
        $sql= "Select acc.*, su.*, r.code as r_code, acc.id as acc_id

                    from account as acc
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id

                    WHERE su.facilities_id = '". $facilities_id. "' and acc.role_id = 2";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getuser($acc_id){
        $sql= "Select acc.*, su.*, r.code as r_code, r.name as r_name, acc.id as acc_id

                    from account as acc
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id

                    WHERE acc.id = '". $acc_id ."'";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getchat($acc_id, $access_id){
        $sql= "Select acc.*, su.*, c.*, c.createdAt as c_date, 
                    r.code, r.name, acc.id as acc_id, c.id as c_id

                    from chat as c
                    left join account as acc on c.chat_from = acc.id
                
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id

                    WHERE c.chat_to = '". $access_id. "' and c.chat_from = '". $acc_id ."'";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getreply($acc_id, $access_id){
        $sql= "Select acc.*, su.*, c.*, c.createdAt as c_date, 
                    r.code, r.name, acc.id as acc_id, c.id as c_id

                    from chat as c
                    left join account as acc on c.chat_from = acc.id
                
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id

                    WHERE c.chat_from = '". $access_id. "' and c.chat_to = '". $acc_id ."'
                    order by c.createdAt ASC";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getreply2($acc_id, $access_id){
        $sql= "Select c.*, c.createdAt as c_date, c.id as c_id

                    from chat as c

                    WHERE c.chat_from = '". $access_id. "' and c.chat_to = '". $acc_id ."'
                    order by c.createdAt ASC";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function sendchat($chat1){

        $this->db->insert('chat', $chat1);
        return true;
    }
}  


?>