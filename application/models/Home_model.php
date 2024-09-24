<?php

class Home_model extends CI_Model
{

    public function getuserlogin($email, $password)
    {
        $q = "select ac.*, rl.id as rlid, rl.description as rldesc, su.id as suid, su.facilities_id,
                avc.code
                from account as ac 
                left join role as rl on rl.id = ac.role_id
                left join system_users as su on su.account_id = ac.id
                left join account_verification_code as avc on avc.account_id = ac.id
                where ac.password='" .md5($password). "' and  ac.email='" . $email . "'";
        $query = $this->db->query($q);
        return $query->result();
    }

    public function all_events(){

        $current_date = date('Y-m-d');
        $sql ="Select s.*, st.name as st_name 
                from schedule as s
                left join schedule_type as st on s.schedule_type_id = st.id
                where s.schedule_type_id = 2 and s.date > '". $current_date ."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function insertVerificationCode($user_id, $verification_code){
        
        $data = array(
            'account_id' => $user_id,
            'code' => $verification_code,
            'createdAt' => date('Y-m-d H:i:s')
        );
    
        $this->db->insert('account_verification_code', $data);
    }

    public function getAddminstatus(){

        $sql ="Select adm.* from
                    account as adm
                    where status = 1 and adm.role_id = 1";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function Emaillist(){
        $sql ="Select acc.* from
                    account as acc
                    where acc.status = 1 and acc.is_verified = 1
                    and acc.is_updated = 1";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getUserByEmail($enteredEmail){
        $sql ="Select acc.* from
                    account as acc
                    where acc.status = 1 and acc.is_verified = 1
                    and acc.is_updated = 1 and acc.email = '".$enteredEmail."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function savePasswordResetToken($userId, $token) {

        $expirationTime = time() + 300; 

        $data = array(
            'account_id' => $userId,
            'token' => $token,
            'createdAt' => date('Y-m-d H:i:s'), 
            'expiresAt' => date('Y-m-d H:i:s', $expirationTime)
        );

        $this->db->insert('forgot_password_tokens', $data);
    }

    public function getVerificationCode($enteredCode) {
        $sql = "Select fpt.token, acc.*, acc.id as accid
                from forgot_password_tokens AS fpt 
                left join account as acc on fpt.account_id = acc.id
                where fpt.token = ?";
        $query = $this->db->query($sql, array($enteredCode));
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            // Token not found
            return false;
        }
    }

    public function updateAcc($account_id, $hash){
        $data = array(
            'password' => $hash,
            'createdAt' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $account_id);
        $result = $this->db->update('account', $data);

        return $result;
    }

    public function getResidents(){

        $sql = "Select r.*, ad.id as adid, ad.street, ad.city, f.id as fid, f.name as bname 
                    from residents as r
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    where r.status = 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gethc(){
        $sql = "Select f.*
                    from facilities as f
                    where f.status = 1 and f.facility_type_id = 2";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function submitappointment($app_data){

        $this->db->insert('online_registration', $app_data);
        return $this->db->insert_id();
    }

    public function getsched(){

        $sql = "Select s.*, st.*
                    from schedule as s
                    left join schedule_type as st on s.schedule_type_id = st.id
                    where s.schedule_type_id = 3";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function submitguard($guard_data){

        $this->db->insert('patient_guardian', $guard_data);
        return $this->db->insert_id();
    }

    public function update_oreg($oreg_id){

        $oreg_data = array(
            'status' => 0
        );

        $this->db->where('id', $oreg_id);
        $this->db->update('online_registration', $oreg_data);
    }

}

?>
