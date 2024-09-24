<?php

class Verification_model extends CI_Model
{

    public function getVerificationCode($user_id)
    {
        $this->db->select('code');
        $this->db->where('account_id', $user_id);
        $query = $this->db->get('account_verification_code');

        if ($query->num_rows() > 0) {
            return $query->row()->code;
        } else {
            return null;
        }
    }


    public function verified($user_id)
    {
        $data = array(
            'is_verified' => 1,
            'createdAt' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $user_id);
        $this->db->update('account', $data);
    }

    public function getAcc($user_id){
        $sql = "Select acc.*
                    from account as acc
                    where acc.id = '".$user_id."' 
                    and acc.status = 1
                    and acc.is_verified = 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function updateAcc($account_id, $email, $hashPass)
    {
        $data = array(
            'email' => $email,
            'password' => $hashPass,
            'is_updated' => 1,
            'createdAt' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $account_id);
        $result = $this->db->update('account', $data);

        return $result;
    }

    public function updateVerificationCode($account_id, $verification_code)
    {
        $data = array(
            'code' => $verification_code,
            'createdAt' => date('Y-m-d H:i:s')
        );

        $this->db->where('account_id', $account_id);
        $result = $this->db->update('account_verification_code', $data);

        return $result;
    }
}
