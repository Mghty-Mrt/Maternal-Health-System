<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    private function UpperIncludes()
    {
        if ($this->session->userdata('loggedin')) {
            $role_id = $this->session->userdata('role_id');
            $user_id = $this->session->userdata('id');
            $is_verified = $this->session->userdata('is_verified');
            $is_updated = $this->session->userdata('is_updated');

            if ($role_id == 1 && $is_verified == 1 && $is_updated == 1) {
                $userlog_data = $this->Admin_model->getUserLogSess($user_id);
                $data['user_info'] = $userlog_data;

                $this->load->view('admin_includes/header');
                $this->load->view('admin_includes/sidebar', $data);
                $this->load->view('admin_includes/topbar', $data);
            } else {
                if ($is_verified == 0) {
                    redirect('verification/firststep');
                } else if ($is_updated == 0) {
                    redirect('verification/secondstep');
                } else if ($role_id == 1) {
                    redirect('admin/dashboard');
                } else {
                    show_error('Access Denied!!!', 403);
                }
            }
        } else {
            redirect('home');
        }
    }

    private function TopbarInclude()
    {
        $user_id = $this->session->userdata('id');

        $userlog_data = $this->Admin_model->getUserLogSess($user_id);
        $data['user_info'] = $userlog_data;

        $report = $this->Admin_model->getfacilities();
        $data['report'] = $report;

        // print_r($report);exit;
        
            foreach($report as $r){
                $from = $r->id;
                $total_from = $this->Admin_model->gettotal_from($from);
                $data['total_from'] = $total_from;
            }

        $Total_arrived = $this->Admin_model->getTotal_arrived($from);
        $data['Total_arrived'] = $Total_arrived; 

        $Total_unarrived = $this->Admin_model->getTotal_unarrived($from);
        $data['Total_unarrived'] = $Total_unarrived; 

        // print_r($Total_unarrived);

        $this->load->view('admin_includes/header', $data);
        $this->load->view('admin_includes/topbar', $data);
    }

    private function HeaderInclude()
    {
        $this->load->view('admin_includes/header');
    }

    private function FooterInclude()
    {
        $this->load->view('admin_includes/footer');
    }

    private function generatePass($length = 8)
    {

        $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $pass = "";

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($charset) - 1);
            $pass .= $charset[$randomIndex];
        }

        return $pass;
    }

    public function dashboard()
    {
        $total_users = $this->Admin_model->gettotalusers();
        $data['totalusers'] = $total_users;

        $total_health_center = $this->Admin_model->gettotalhealthcenter();
        $data['total_health_center'] = $total_health_center;

        $total_hospital = $this->Admin_model->gettotalhospital();
        $data['total_hospital'] = $total_hospital;

        $total_lyingin = $this->Admin_model->gettotallyingin();
        $data['total_lyingin'] = $total_lyingin;

        $total_patients = $this->Admin_model->gettotalpatients();
        $data['total_patients'] = $total_patients;

        $ongoing_patients = $this->Admin_model->getongoing_patients();
        $data['ongoing_patients'] = $ongoing_patients;

        $done_patients = $this->Admin_model->getdone_patients();
        $data['done_patients'] = $done_patients;

        $total_active = $this->Admin_model->gettotalactive();
        $data['total_active'] = $total_active;

        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_dashboard', $data);
        $this->FooterInclude();
    }

    public function report(){

        $this->TopbarInclude();
        $this->load->view('pages/admin/admin_report');
        $this->FooterInclude();
    }

    public function account()
    {
        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_account_settings');
        $this->FooterInclude();
    }

    public function updatePass(){

        $acc_id = $this->input->post('acc_id');
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $hashPass = md5($pass);

        $this->Admin_model->updatepassword($acc_id, $email, $hashPass);

            $this->session->set_flashdata('success', 'Password updated successfully.');
            //$this->session->set_flashdata('failed', 'Failed to updated Password!');
            // print "Insertion failed!";

        redirect('admin/account');
    }

    public function profile()
    {
        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_profile_settings');
        $this->FooterInclude();
    }

    public function saveprofile()
    {

        $system_user_id = $this->input->post('suid');

        // upload path folder
        $upload_path = '../mhs_micro/profile/';
        // Check if the upload directory exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $file_name = basename($_FILES["profile"]["name"]);
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $hash = md5($system_user_id);

        $hash_filename = $hash . '.' . $imageFileType;

        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $upload_path . $hash_filename)) {

            $this->Admin_model->updatePhoto($system_user_id, $hash_filename);

            $this->session->set_flashdata('success', 'Profile updated successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Failed to updated profile!');
            // print "Insertion failed!";
        }

        redirect('admin/account');
    }

    //barangay part
    public function barangay()
    {
        $getBrgyData = $this->Admin_model->getBrgyData();
        $data['Barangays'] = $getBrgyData;

        $getBrgylist = $this->Admin_model->getBrgylist();
        $data['list'] = $getBrgylist;

        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_barangays', $data);
        $this->FooterInclude();
    }

    public function createBarangay()
    {
        $name = $this->input->post('bname');

        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/mhs_micro/facilities/';
        // Check if the upload directory exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $file_name = basename($_FILES["bprofileFile"]["name"]);
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $hash = md5($name);

        $hash_filename = $hash . '.' . $imageFileType;

        if (move_uploaded_file($_FILES["bprofileFile"]["tmp_name"], $upload_path . $hash_filename)) {

            $brgy_data = array(
                'facility_type_id' => 4,
                'name' => $this->input->post('bname'),
                'description' => $this->input->post('bdesc'),
                'address' => $this->input->post('badd'),
                'image' => $hash_filename,
                'createdAt' => date('Y-m-d H:i:s'),
                'status' => 1
            );
            $this->Admin_model->insertBarangayData($brgy_data);

            $this->session->set_flashdata('success', 'New Barangay Created Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'New Barangay failed to Create!');
        }

        // redirect('admin/barangay');
    }

    public function viewBarangay()
    {
        $brgy_id = $this->input->get('brgy_id');
        $getBrgyData = $this->Admin_model->viewBrgyData($brgy_id);
        $data['ViewBarangay'] = $getBrgyData;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_edit_barangay', $data);
    }

    public function updateBarangay()
    {
        $brgy_id = $this->input->post('brgy_id');
        //print '<script>alert('.$brgy_id.');</script>';

        $brgy_data = array(
            'facility_type_id' => 4,
            'name' => $this->input->post('bname'),
            'description' => $this->input->post('bdesc'),
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );
        $updated = $this->Admin_model->updateBarangayData($brgy_id, $brgy_data);

        if ($updated) {
            $this->session->set_flashdata('success', 'Barangay Updated Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Barangay failed to Update!');
        }

        redirect('admin/barangay');
    }
    //end barangay part

    //specific barangay details part
    public function viewBarangayDetails()
    {
        $brgy_id = $this->input->get('id');

        $residents_data = $this->Admin_model->getBrgyResidents($brgy_id);
        $data['residentList'] = $residents_data;

        $Arcresidents_data = $this->Admin_model->getBrgyResidentsArc($brgy_id);
        $data['ArchivedresidentList'] = $Arcresidents_data;

        $getBrgyData = $this->Admin_model->getBrgyDetails($brgy_id);
        $data['Barangays'] = $getBrgyData;

        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_view_barangay', $data);
        $this->FooterInclude();
    }

    public function viewResident()
    {
        $resident_id = $this->input->get('resident_id');
        $get_resident_data = $this->Admin_model->getResident($resident_id);
        $data['ResidentData'] = $get_resident_data;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_ViewResident_brgy', $data);
    }

    public function editResident()
    {
        $brgy_data = $this->Admin_model->getBrgy();
        $data['barangay'] = $brgy_data;

        $resident_id = $this->input->get('resident_id');
        //$brgy_id = $this->input->post('brgy_id');
        $get_resident_data = $this->Admin_model->getResident($resident_id);
        $data['ResidentData'] = $get_resident_data;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_EditResident_brgy', $data);
    }

    public function updateResident()
    {
        $facility_id = $this->input->post('facility_id');
        $resident_id = $this->input->post('resident_id');

        $resident_data = array(
            'firstname' => $this->input->post('fname'),
            'middlename' => $this->input->post('mname'),
            'lastname' => $this->input->post('lname'),
            'birthdate' => $this->input->post('bdate'),
            'age' => $this->input->post('age'),
            'civilStatus' => $this->input->post('cstatus'),
            'occupation' => $this->input->post('occu'),
            'mobileno' => $this->input->post('mnum'),
            'email' => $this->input->post('email'),
            'status' => 1,
            'createdAt' => date('Y-m-d H:i:s')
        );
        $this->Admin_model->updateResidentsData($resident_id, $resident_data);

        $address_id = $this->input->post('address_id');
        $address_data = array(
            'facilities_id' => $this->input->post('brgy'),
            'street' => $this->input->post('street'),
            'city' => $this->input->post('city')
        );
        $inserted = $this->Admin_model->updateAddressData($address_id, $address_data);

        // $data = array('message' => 'New data added!');
        // $this->mhspusher->triggerEvent('maternal_health_system', 'new-data-added', $data);

        if ($inserted) {
            $this->session->set_flashdata('success', 'Resident Updated Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Resident failed to Update!');
        }

        print '<script>window.location.href = "../admin/viewbarangaydetails?id= + ' . $facility_id . '"</script>';

        //redirect('admin/barangay');
    }

    public function archiveResident()
    {
        $resident_id = $this->input->post('id');
        $updated = $this->Admin_model->archiveResi($resident_id);

        if ($updated) {
            $this->session->set_flashdata('success', 'Resident Archived Successfully.');
        } else {
            $this->session->set_flashdata('success', 'Resident Archived Successfully.');
        }
    }

    public function restoreResident()
    {
        $resident_id = $this->input->post('id');
        $updated = $this->Admin_model->restoreResi($resident_id);

        if ($updated) {
            $this->session->set_flashdata('success', 'Resident Restored Successfully.');
        } else {
            $this->session->set_flashdata('success', 'Resident Restored Successfully.');
        }
    }
    //end specific barangay details part

    // health center part
    public function healthcenter()
    {
        $getHCData = $this->Admin_model->getHCData();
        $data['HealthCenters'] = $getHCData;

        $getHclist = $this->Admin_model->getHclist();
        $data['hclist'] = $getHclist;

        // print_r($getHclist);

        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_health_center', $data);
        $this->FooterInclude();
    }

    public function createHealthCenter()
    {
        $name = $this->input->post('hcname');

        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/mhs_micro/facilities/';
        // Check if the upload directory exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $file_name = basename($_FILES["hcprofileFile"]["name"]);
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $hash = md5($name);

        $hash_filename = $hash . '.' . $imageFileType;

        if (move_uploaded_file($_FILES["hcprofileFile"]["tmp_name"], $upload_path . $hash_filename)) {

            $HC_data = array(
                'facility_type_id' => 2,
                'name' => $this->input->post('hcname'),
                'description' => $this->input->post('hcdesc'),
                'address' => $this->input->post('hcadd'),
                'image' => $hash_filename,
                'createdAt' => date('Y-m-d H:i:s'),
                'status' => 1
            );
            $this->Admin_model->insertHCData($HC_data);

            $this->session->set_flashdata('success', 'New Health Center Created Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'New Health Center failed to Create!');
        }

        // redirect('admin/healthcenter');
    }

    public function viewHealthCenter()
    {
        $hc_id = $this->input->get('hc_id');
        $getHCData = $this->Admin_model->viewHCData($hc_id);
        $data['ViewHC'] = $getHCData;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_edit_healthcenter', $data);
    }

    public function updateHealthCenter()
    {
        $hc_id = $this->input->post('hc_id');
        //print '<script>alert('.$hc_id.');</script>';

        $hc_data = array(
            'facility_type_id' => 2,
            'name' => $this->input->post('hcname'),
            'description' => $this->input->post('hcdesc'),
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );
        $updated = $this->Admin_model->updateHCData($hc_id, $hc_data);

        if ($updated) {
            $this->session->set_flashdata('success', 'Health Center Updated Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Health Center failed to Update!');
        }

        redirect('admin/healthcenter');
    }
    // end health center part

    //hospital part
    public function hospital()
    {
        $getHospitalData = $this->Admin_model->getHospitalData();
        $data['Hospitals'] = $getHospitalData;

        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_hospitals', $data);
        $this->FooterInclude();
    }

    public function createHospital()
    {
        $name = $this->input->post('hname');

        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/mhs_micro/facilities/';
        // Check if the upload directory exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $file_name = basename($_FILES["hprofileFile"]["name"]);
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $hash = md5($name);

        $hash_filename = $hash . '.' . $imageFileType;

        if (move_uploaded_file($_FILES["hprofileFile"]["tmp_name"], $upload_path . $hash_filename)) {

            $Hospital_data = array(
                'facility_type_id' => 3,
                'name' => $this->input->post('hname'),
                'description' => $this->input->post('hdesc'),
                'address' => $this->input->post('hadd'),
                'image' => $hash_filename,
                'createdAt' => date('Y-m-d H:i:s'),
                'status' => 1
            );
            $this->Admin_model->insertHospitalData($Hospital_data);

            $this->session->set_flashdata('success', 'New Hospital Created Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'New Hospital failed to Create!');
        }

        // redirect('admin/hospital');
    }

    public function viewHospital()
    {
        $hospital_id = $this->input->get('hospital_id');
        $getHospitalData = $this->Admin_model->viewHospitalData($hospital_id);
        $data['ViewHospital'] = $getHospitalData;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_edit_hospital', $data);
    }

    public function updateHospital()
    {
        $hospital_id = $this->input->post('hospital_id');
        //print '<script>alert('.$hospital_id.');</script>';

        $hospital_data = array(
            'facility_type_id' => 3,
            'name' => $this->input->post('hname'),
            'description' => $this->input->post('hdesc'),
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );
        $updated = $this->Admin_model->updateHospitalData($hospital_id, $hospital_data);

        if ($updated) {
            $this->session->set_flashdata('success', 'Hospital Updated Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Hospital failed to Update!');
        }

        redirect('admin/hospital');
    }
    //end hospital part

    //system users part 
    //Health center users part
    public function systemUsers()
    {
        $systemUserdata = $this->Admin_model->getSystemUsers();
        $data['systemUsers'] = $systemUserdata;

        $hospitalUserdata = $this->Admin_model->getHospitalSystemUsers();
        $data['hospitalSystemUsers'] = $hospitalUserdata;

        $lyUserdata = $this->Admin_model->getLySystemUsers();
        $data['Lying_inSystemUsers'] = $lyUserdata;

        $barangayUserdata = $this->Admin_model->getBrgySystemUsers();
        $data['barangaySystemUsers'] = $barangayUserdata;

        $archived_users = $this->Admin_model->getArchivedUsers();
        $data['archivedUsers'] = $archived_users;

        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_system_users', $data);
        $this->FooterInclude();
    }

    public function createHCuser()
    {
        $roleData = $this->Admin_model->getRoleData();
        $data['Roles'] = $roleData;

        $facilitiesData = $this->Admin_model->getFacilitiesData();
        $data['facilities'] = $facilitiesData;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_CreateHC_users', $data);
    }

    public function submitHC()
    {
        $randomPass = $this->generatePass();
        $hashPass = md5($randomPass);
        $email = $this->input->post('email');

        $HCAccount_data = array(
            'role_id' => $this->input->post('position'),
            'email' => $email,
            'password' => $hashPass,
            'mobileno' => $this->input->post('mnum'),
            'is_verified' => 0,
            'is_updated' => 0,
            'status' => 1,
            'createdAt' => date('Y-m-d H:i:s'),
        );

        $account_id = $this->Admin_model->insertAccountData($HCAccount_data);
        $HCSystemUserData = array(
            'account_id' => $account_id,
            'facilities_id' => $this->input->post('facility'),
            'firstname' => $this->input->post('fname'),
            'middlename' => $this->input->post('mname'),
            'lastname' => $this->input->post('lname'),
            'image' => '',
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $inserted = $this->Admin_model->insertSystemUserData($HCSystemUserData);

        if ($inserted) {
            $this->session->set_flashdata('success', 'New User Created Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'New User failed to Create!');
        }

        $this->email($email, $randomPass);

        redirect('admin/systemusers');
    }

    public function viewHCUser()
    {
        $HC_user_id = $this->input->get('hc_user_id');
        $get_user_data = $this->Admin_model->getHCuser($HC_user_id);
        $data['hcUserData'] = $get_user_data;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_ViewHC_users', $data);
    }

    public function editHCUser()
    {
        $this->session->userdata('loggedin');
        $user_id = $this->session->userdata('id');

        $userlog_data = $this->Admin_model->getUserLogSess($user_id);
        $data['user_info'] = $userlog_data;

        $roleData = $this->Admin_model->getRoleData();
        $data['Roles'] = $roleData;

        $facilitiesData = $this->Admin_model->getFacilitiesData();
        $data['facilities'] = $facilitiesData;

        $HC_user_id = $this->input->get('hc_user_id');
        $get_user_data = $this->Admin_model->getHCuser($HC_user_id);
        $data['hcUserData'] = $get_user_data;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_EditHC_users', $data);
    }

    public function updateHC()
    {
        $hc_user_id = $this->input->post('hc_user_id');
        $updte_user_data = array(
            'lastname' => $this->input->post('lname'),
            'firstname' => $this->input->post('fname'),
            'middlename' => $this->input->post('mname'),
            'facilities_id' => $this->input->post('facility'),
            'createdAt' => date('Y-m-d H:i:s')
        );
        $this->Admin_model->updateSU($hc_user_id, $updte_user_data);

        $hc_acc_id = $this->input->post('hc_acc_id');
        $updte_acc_data = array(
            'role_id' => $this->input->post('position'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'mobileno' => $this->input->post('mnum'),
            'createdAt' => date('Y-m-d H:i:s')
        );
        $updated = $this->Admin_model->updateAcc($hc_acc_id, $updte_acc_data);

        if ($updated) {
            $this->session->set_flashdata('success', 'Health Center User Updated Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Health Center User failed to Update!');
        }

        redirect('admin/systemusers');
    }

    public function archiveHCsu()
    {
        $hc_user_id = $this->input->post('id');
        $updated = $this->Admin_model->archiveHCsu($hc_user_id);

        if ($updated) {
            $this->session->set_flashdata('success', 'Health Center User Archived Successfully.');
        } else {
            $this->session->set_flashdata('success', 'Health Center User Archived Successfully.');
        }

        //redirect('admin/systemusers');
    }
    //end health center users part

    // hospital users part
    public function createHuser()
    {
        $hospitalRoleData = $this->Admin_model->getHospitalRoleData();
        $data['HospitalRoles'] = $hospitalRoleData;

        $facilitiesData = $this->Admin_model->getHospitalFacilitiesData();
        $data['hospitalfacilities'] = $facilitiesData;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_CreateH_users', $data);
    }

    public function createlyuser()
    {
        $hospitalRoleData = $this->Admin_model->getLyRoleData();
        $data['HospitalRoles'] = $hospitalRoleData;

        $facilitiesData = $this->Admin_model->getLyFacilitiesData();
        $data['hospitalfacilities'] = $facilitiesData;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_CreateLy_users', $data);
    }

    public function submitHuser()
    {
        $randomPass = $this->generatePass();
        $hashPass = md5($randomPass);
        $email = $this->input->post('email');

        $HCAccount_data = array(
            'role_id' => $this->input->post('position'),
            'email' => $email,
            'password' => $hashPass,
            'mobileno' => $this->input->post('mnum'),
            'status' => 1,
            'createdAt' => date('Y-m-d H:i:s'),
        );

        $account_id = $this->Admin_model->insertAccountData($HCAccount_data);
        $HCSystemUserData = array(
            'account_id' => $account_id,
            'facilities_id' => $this->input->post('hospital'),
            'firstname' => $this->input->post('fname'),
            'middlename' => $this->input->post('mname'),
            'lastname' => $this->input->post('lname'),
            'image' => '',
            'createdAt' => date('Y-m-d H:i:s'),
        );

        $inserted = $this->Admin_model->insertSystemUserData($HCSystemUserData);

        if ($inserted) {
            $this->session->set_flashdata('success', 'New User Created Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'New User failed to Create!');
        }

        $this->email($email, $randomPass);

        // redirect('admin/systemusers');
    }

    public function submitLyuser()
    {
        $randomPass = $this->generatePass();
        $hashPass = md5($randomPass);
        $email = $this->input->post('email');

        $HCAccount_data = array(
            'role_id' => $this->input->post('position'),
            'email' => $email,
            'password' => $hashPass,
            'mobileno' => $this->input->post('mnum'),
            'status' => 1,
            'createdAt' => date('Y-m-d H:i:s'),
        );

        $account_id = $this->Admin_model->insertAccountData($HCAccount_data);
        $HCSystemUserData = array(
            'account_id' => $account_id,
            'facilities_id' => $this->input->post('hospital'),
            'firstname' => $this->input->post('fname'),
            'middlename' => $this->input->post('mname'),
            'lastname' => $this->input->post('lname'),
            'image' => '',
            'createdAt' => date('Y-m-d H:i:s'),
        );

        $inserted = $this->Admin_model->insertSystemUserData($HCSystemUserData);

        if ($inserted) {
            $this->session->set_flashdata('success', 'New User Created Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'New User failed to Create!');
        }

        $this->email($email, $randomPass);

        // redirect('admin/systemusers');
    }

    public function viewHUser()
    {
        $H_user_id = $this->input->get('h_user_id');
        $get_user_data = $this->Admin_model->getHuser($H_user_id);
        $data['hUserData'] = $get_user_data;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_ViewH_users', $data);
    }

    public function viewLyuser()
    {
        $H_user_id = $this->input->get('h_user_id');
        $get_user_data = $this->Admin_model->getLyuser($H_user_id);
        $data['LyUserData'] = $get_user_data;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_ViewLy_users', $data);
    }

    public function editHUser()
    {
        $this->session->userdata('loggedin');
        $user_id = $this->session->userdata('id');

        $userlog_data = $this->Admin_model->getUserLogSess($user_id);
        $data['user_info'] = $userlog_data;

        $hospitalRoleData = $this->Admin_model->getHospitalRoleData();
        $data['HospitalRoles'] = $hospitalRoleData;

        $facilitiesData = $this->Admin_model->getHospitalFacilitiesData();
        $data['hospitalfacilities'] = $facilitiesData;

        $H_user_id = $this->input->get('h_user_id');
        $get_user_data = $this->Admin_model->getHuser($H_user_id);
        $data['hUserData'] = $get_user_data;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_EditH_users', $data);
    }

    public function editLyuser()
    {
        $this->session->userdata('loggedin');
        $user_id = $this->session->userdata('id');

        $userlog_data = $this->Admin_model->getUserLogSess($user_id);
        $data['user_info'] = $userlog_data;

        $hospitalRoleData = $this->Admin_model->getLyRoleData();
        $data['HospitalRoles'] = $hospitalRoleData;

        $facilitiesData = $this->Admin_model->getLyFacilitiesData();
        $data['hospitalfacilities'] = $facilitiesData;

        $H_user_id = $this->input->get('h_user_id');
        $get_user_data = $this->Admin_model->getLyuser($H_user_id);
        $data['LyUserData'] = $get_user_data;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_EditLy_users', $data);
    }

    public function updateH()
    {
        $hc_user_id = $this->input->post('h_user_id');
        $updte_user_data = array(
            'lastname' => $this->input->post('lname'),
            'firstname' => $this->input->post('fname'),
            'middlename' => $this->input->post('mname'),
            'facilities_id' => $this->input->post('hospital'),
            'createdAt' => date('Y-m-d H:i:s')
        );
        $this->Admin_model->updateSU($hc_user_id, $updte_user_data);

        $hc_acc_id = $this->input->post('h_acc_id');
        $updte_acc_data = array(
            'role_id' => $this->input->post('position'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'mobileno' => $this->input->post('mnum'),
            'createdAt' => date('Y-m-d H:i:s')
        );
        $updated = $this->Admin_model->updateAcc($hc_acc_id, $updte_acc_data);

        if ($updated) {
            $this->session->set_flashdata('success', 'Hospoital User Updated Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Hospoital User failed to Update!');
        }

        redirect('admin/systemusers');
    }

    public function updateLy()
    {
        $hc_user_id = $this->input->post('h_user_id');
        $updte_user_data = array(
            'lastname' => $this->input->post('lname'),
            'firstname' => $this->input->post('fname'),
            'middlename' => $this->input->post('mname'),
            'facilities_id' => $this->input->post('hospital'),
            'createdAt' => date('Y-m-d H:i:s')
        );
        $this->Admin_model->updateSU($hc_user_id, $updte_user_data);

        $hc_acc_id = $this->input->post('h_acc_id');
        $updte_acc_data = array(
            'role_id' => $this->input->post('position'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'mobileno' => $this->input->post('mnum'),
            'createdAt' => date('Y-m-d H:i:s')
        );
        $updated = $this->Admin_model->updateAcc($hc_acc_id, $updte_acc_data);

        if ($updated) {
            $this->session->set_flashdata('success', 'Lying-in User Updated Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Lying-in User failed to Update!');
        }

        redirect('admin/systemusers');
    }

    public function archiveHsu()
    {
        $hc_user_id = $this->input->post('id');

        $updated = $this->Admin_model->archiveHCsu($hc_user_id);

        if ($updated) {
            $this->session->set_flashdata('success', 'Hospital User Archived Successfully.');
        } else {
            $this->session->set_flashdata('success', 'Hospital User Archived Successfully.');
        }

        //redirect('admin/systemusers');
    }

    public function archivehLy()
    {
        $hc_user_id = $this->input->post('id');

        $updated = $this->Admin_model->archiveLysu($hc_user_id);

        if ($updated) {
            $this->session->set_flashdata('success', 'Lying-in User Archived Successfully.');
        } else {
            $this->session->set_flashdata('success', 'Lying-in User Archived Successfully.');
        }

        //redirect('admin/systemusers');
    }
    //end hospital users part

    //barangay users part
    public function createBrgyuser()
    {

        $barangayRoleData = $this->Admin_model->getBrgyRoleData();
        $data['barangayRoles'] = $barangayRoleData;

        $barangayfacilitiesData = $this->Admin_model->getBrgyFacilitiesData();
        $data['barangayfacilities'] = $barangayfacilitiesData;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_CreateBrgy_users', $data);
    }

    public function submitBrgyuser()
    {
        $randomPass = $this->generatePass();
        $hashPass = md5($randomPass);
        $email = $this->input->post('email');

        $HCAccount_data = array(
            'role_id' => $this->input->post('position'),
            'email' => $email,
            'password' => $hashPass,
            'mobileno' => $this->input->post('mnum'),
            'status' => 1,
            'createdAt' => date('Y-m-d H:i:s'),
        );

        $account_id = $this->Admin_model->insertAccountData($HCAccount_data);

        $HCSystemUserData = array(
            'account_id' => $account_id,
            'facilities_id' => $this->input->post('brgy'),
            'firstname' => $this->input->post('fname'),
            'middlename' => $this->input->post('mname'),
            'lastname' => $this->input->post('lname'),
            'image' => '',
            'createdAt' => date('Y-m-d H:i:s'),
        );

        $inserted = $this->Admin_model->insertSystemUserData($HCSystemUserData);

        if ($inserted) {
            $this->session->set_flashdata('success', 'New User Created Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'New User failed to Create!');
        }

        $this->email($email, $randomPass);

        redirect('admin/systemusers');
    }

    public function viewBrgyuser()
    {

        $brgy_user_id = $this->input->get('brgy_user_id');
        $get_user_data = $this->Admin_model->getBrgyuser($brgy_user_id);
        $data['BrgyUserData'] = $get_user_data;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_ViewBrgy_users', $data);
    }

    public function editBrgyUser()
    {

        $this->session->userdata('loggedin');
        $user_id = $this->session->userdata('id');

        $userlog_data = $this->Admin_model->getUserLogSess($user_id);
        $data['user_info'] = $userlog_data;

        $barangayRoleData = $this->Admin_model->getBrgyRoleData();
        $data['barangayRoles'] = $barangayRoleData;

        $barangayfacilitiesData = $this->Admin_model->getBrgyFacilitiesData();
        $data['barangayfacilities'] = $barangayfacilitiesData;

        $brgy_user_id = $this->input->get('brgy_user_id');
        $get_user_data = $this->Admin_model->getBrgyuser($brgy_user_id);
        $data['BrgyUserData'] = $get_user_data;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_EditBrgy_users', $data);
    }

    public function updateBrgy()
    {

        $hc_user_id = $this->input->post('brgy_user_id');

        $updte_user_data = array(
            'lastname' => $this->input->post('lname'),
            'firstname' => $this->input->post('fname'),
            'middlename' => $this->input->post('mname'),
            'facilities_id' => $this->input->post('barangay'),
            'createdAt' => date('Y-m-d H:i:s')
        );

        $this->Admin_model->updateSU($hc_user_id, $updte_user_data);

        $hc_acc_id = $this->input->post('brgy_acc_id');

        $updte_acc_data = array(
            'role_id' => $this->input->post('position'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'mobileno' => $this->input->post('mnum'),
            'createdAt' => date('Y-m-d H:i:s')
        );

        $updated = $this->Admin_model->updateAcc($hc_acc_id, $updte_acc_data);

        if ($updated) {
            $this->session->set_flashdata('success', 'Barangay User Updated Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Barangay User failed to Update!');
        }

        redirect('admin/systemusers');
    }

    public function archiveBrgysu()
    {
        $hc_user_id = $this->input->post('id');

        $updated = $this->Admin_model->archiveHCsu($hc_user_id);

        if ($updated) {
            $this->session->set_flashdata('success', 'Barangay User Archived Successfully.');
        } else {
            $this->session->set_flashdata('success', 'Barangay User Archived Successfully.');
        }

        //redirect('admin/systemusers');
    }
    //end barangay users part

    public function restoreSU()
    {
        $restore_user_id = $this->input->post('id');

        $updated = $this->Admin_model->restoreSystemUser($restore_user_id);

        if ($updated) {
            $this->session->set_flashdata('success', 'User Restored Successfully.');
        } else {
            $this->session->set_flashdata('success', 'User Restored Successfully.');
        }

        //redirect('admin/systemusers');
    }

    //health Center Part

    public function viewHCDetails()
    {
        if ($this->session->userdata('loggedin')) {
            $role_id = $this->session->userdata('role_id');

            // Check the role_id for specific access levels
            if ($role_id == 1) {
                $hc_id = $this->input->get('id');

                $hc_data = $this->Admin_model->getHCFuser($hc_id);
                $data['HCusers'] = $hc_data;

                $refpatients = $this->Admin_model->refpatients($hc_id);
                $data['refpatients'] = $refpatients;

                $allpatients = $this->Admin_model->getallpatients($hc_id);
                $data['overallpatients'] = $allpatients;

                $facility = $this->Admin_model->getfacility($hc_id);
                $data['facility'] = $facility;

                $this->UpperIncludes();
                $this->load->view('pages/admin/admin_view_health_center', $data);
                $this->FooterInclude();
            } else {
                show_error('Access Denied!!!', 403);
            }
        } else {
            redirect('home');
        }
    }

    public function gethcuser()
    {

        $su_id = $this->input->post('su_id');
        $get_prof = $this->Admin_model->getHcUsrProfile($su_id);
        $data['HcUsProfile'] = $get_prof;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_view_hc_user', $data);
    }

    public function gethuser()
    {

        $su_id = $this->input->post('su_id');

        $get_prof = $this->Admin_model->getHcUsrProfile($su_id);
        $data['HUsProfile'] = $get_prof;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_view_h_user', $data);
    }

    public function viewHospitalDetails()
    {
        $hc_id = $this->input->get('id');

        $hc_data = $this->Admin_model->getHCFuser($hc_id);
        $data['Husers'] = $hc_data;

        $facility = $this->Admin_model->getfacility($hc_id);
        $data['facility'] = $facility;

        $equipments = $this->Admin_model->gethequipments($hc_id);
        $data['equipments'] = $equipments;

        $refpatients = $this->Admin_model->hospitalrefpatients($hc_id);
        $data['refpatients'] = $refpatients;

        $getSlot = $this->Admin_model->getSlot($hc_id);
        $data['slots'] = $getSlot;

        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_view_hospital', $data);
        $this->FooterInclude();
    }

    public function viewLyingIn(){

        $ly_id = $this->input->get('ly_id');
        $getLYData = $this->Admin_model->viewLYData($ly_id);
        $data['ViewLY'] = $getLYData;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_edit_lyingin', $data);
    }

    public function updateLyingin(){
        $ly_id = $this->input->post('ly_id');

        $ly_data = array(
            'facility_type_id' => 5,
            'name' => $this->input->post('lyname'),
            'description'=> $this->input->post('lydesc'),
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );
        $updated = $this->Admin_model->updateLyingin($ly_id, $ly_data);

        if ($updated) {
            $this->session->set_flashdata('success', 'Lyingin In Updated Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Lying In failed to Update!');
        }
        
        redirect('admin/lyingin');
    }
     // end lying-in part


    public function viewLyDetails()
    {
        $ly_id = $this->input->get('id');

        $ly_data = $this->Admin_model->getHCFuser($ly_id);
        $data['lyusers'] = $ly_data;

        $facility = $this->Admin_model->getfacility($ly_id);
        $data['facility'] = $facility;

        $refpatients = $this->Admin_model->hospitalrefpatients($ly_id);
        $data['refpatients'] = $refpatients;

        $getSlot = $this->Admin_model->getSlot($ly_id);
        $data['slots'] = $getSlot;

        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_view_lyingin', $data);
        $this->FooterInclude();
          
    }

    public function lyingin(){

        $getLYData = $this->Admin_model->getLYData();
        $data['Lyingin'] = $getLYData;

        $getLylist = $this->Admin_model->getLylist();
        $data['lylist'] = $getLylist;
        
        //$getHclist = $this->Admin_model->getHclist();
        //$data['hclist'] = $getHclist;

        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_lyingin', $data );
        $this->FooterInclude(); 
    }

    public function getlyuser()
    {

        $su_id = $this->input->post('su_id');
        $get_prof = $this->Admin_model->getHcUsrProfile($su_id);
        $data['LyUsProfile'] = $get_prof;

        $this->HeaderInclude();
        $this->load->view('pages/admin/admin_view_ly_user', $data);
    }

    public function createLyingin()
    {
        $name = $this->input->post('lyname');

        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/mhs_micro/facilities/';
        // Check if the upload directory exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $file_name = basename($_FILES["lyprofileFile"]["name"]);
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $hash = md5($name);

        $hash_filename = $hash . '.' . $imageFileType;

        if (move_uploaded_file($_FILES["lyprofileFile"]["tmp_name"], $upload_path . $hash_filename)) {

            $Ly_data = array(
                'facility_type_id' => 5,
                'name' => $this->input->post('lyname'),
                'description' => $this->input->post('lydesc'),
                'address' => $this->input->post('lyadd'),
                'image' => $hash_filename,
                'createdAt' => date('Y-m-d H:i:s'),
                'status' => 1
            );
            $this->Admin_model->insertLyData($Ly_data);

            $this->session->set_flashdata('success', 'New Lying-in Created Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'New Lying-in failed to Create!');
        }

        // redirect('admin/healthcenter');
    }

    public function uploadBarangayPro()
    {
        $name = $this->input->post('brgy_id');

        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/mhs_micro/facilities/';
        // Check if the upload directory exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $file_name = basename($_FILES["brgy_profileFile"]["name"]);
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $hash = md5($name);

        $hash_filename = $hash . '.' . $imageFileType;

        if (move_uploaded_file($_FILES["brgy_profileFile"]["tmp_name"], $upload_path . $hash_filename)) {

            $f_data = array(
                'image' => $hash_filename,
                'createdAt' => date('Y-m-d H:i:s'),
            );
            $this->Admin_model->updatefData($f_data, $name);

            $this->session->set_flashdata('success', 'New Image uploaded Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'New Image uploaded to Create!');
        }

        // redirect('admin/healthcenter');
    }

    public function patientsAll()
    {
        $this->UpperIncludes();
        $this->load->view('pages/admin/admin_patients_all');
        $this->FooterInclude();
    }

    public function email($email, $randomPass)
    {
        $to = $email;
        $subject = 'System User Account';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'maternalhealth389@gmail.com';
            $mail->Password = 'qxcl lekb tqbr ijse';
            $mail->SMTPSecure = 'tls'; // or 'ssl'
            $mail->Port = 587; // or 465 for SSL
            $mail->setFrom('maternalhealth389@gmail.com', 'Maternal Health System');
            $mail->addAddress($to);
            $mail->Subject = $subject;

            $mailContent = "
                            <html>
                            <head>
                            <style>
                            
                                body {
                                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                                }

                                .h2{
                                    color: rgb(17, 82, 114, 1);
                                }
                                .container {
                                    max-width: 700px;
                                    margin: 0 auto;
                                }
                                .header {
                                    background-color: rgb(17, 82, 114, 1);
                                    color: #ffffff;
                                    padding: 5px;
                                    text-align: center;
                                }
                                .header img {
                                    max-width: 70px; /* Adjust the width as needed */
                                    margin-right: 10px; /* Add margin to separate image from text */
                                    border-radius: 50%;
                                }
                                .row {
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    padding: 20px;
                                }
                                .col-md-4 {
                                    flex: 0 0 30%;
                                    max-width: 30%;
                                    text-align: center;
                                }
                                .col-md-8 {
                                    flex: 0 0 70%;
                                    max-width: 70%;
                                    text-align: center;
                                }
                                .content {
                                    padding: 20px;
                                    background-color: #f8f9fa;
                                }
                                ul {
                                    list-style: none;
                                    padding: 0;
                                    margin: 0;
                                }
                                li {
                                    padding-left: 35px;
                                }
                                .footer {
                                    background-color: #f8f9fa;
                                    padding: 10px;
                                    color: gray;
                                    text-align: center;
                                    border-top: 1px solid lightgray;
                                }
                                </style>
                            </head>
                            <body>
                                <div class='container'>
                                    <div class='header'>
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <img src='https://maternalhealth-qcdistrict2.com/assets/images/logos/maternology.png' alt='logo'> 
                                        </div>
                                        <div class='col-md-8'>
                                            <h2>Welcome to Maternal Health System</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class='content'>
                                    <h2 class='h2'>Dear System User,</h2>
                                    <p>Account Details:</p>
                                    <ul>
                                        <li><b style='color: rgb(17, 82, 114, 1);'>Email:</b> " . $email . "</li>
                                        <li><b style='color: rgb(17, 82, 114, 1);'>Password:</b> " . $randomPass . "</li>
                                    </ul>
                                    <p><i>Please go to this link and login 'https://maternalhealth-qcdistrict2.com/'</i></p>
                                </div>
                                <div class='footer'>
                                    <p>All Rights Reserved<br>© 2024 Maternal Health System</p>
                                    <p><i>'https://maternalhealth-qcdistrict2.com/'</i></p>
                                </div>
                                </div>
                            </body>
                            </html>";
            $mail->isHTML(true);
            $mail->Body = $mailContent;

            // Send the email
            $mail->send();

            //print 'Email sent successfully';
            //$this->session->set_flashdata('success_mail', 'New code sent to your email successfully');
        } catch (Exception $e) {
            //print 'Email delivery failed.  Error: ' . $mail->ErrorInfo;
            //$this->session->set_flashdata('error', 'Email delivery failed. Error: ' . $mail->ErrorInfo);
        }

        redirect('admin/systemusers');
    }

    public function confirm_logout()
    {
        $this->session->unset_userdata('loggedin');
        //$this->session->sess_destroy('loggedin');

        redirect('home');
    }
}
