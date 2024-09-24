<?php

class Barangay extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->load->library('mhspusher');
    }

    private function brUpperIncludes(){

        if ($this->session->userdata('loggedin')) {
           $role_id = $this->session->userdata('role_id');
           $user_id = $this->session->userdata('id');
           $is_verified = $this->session->userdata('is_verified');
           $is_updated = $this->session->userdata('is_updated');

            //Check the role_id for specific access levels
            if ($role_id == 4 && $is_verified == 1 && $is_updated == 1) {
                $userlog_data = $this->Barangay_model->getUserLogSess($user_id);
                $data['user_info'] = $userlog_data;

                $this->load->view('brgy_includes/header');
                $this->load->view('brgy_includes/sidebar', $data);
                $this->load->view('brgy_includes/topbar', $data);
            } else {
                if ($is_verified == 0) {
                    redirect('verification/firststep');
                } else if ($is_updated == 0) {
                    redirect('verification/secondstep');
                } else if ($role_id == 1) {
                    redirect('barangay/dashboard');
                } else {
                    show_error('Access Denied!!!', 403);
                }
            }
        } else {
           redirect('home');
        }
    }

    private function brHeaderIncludes(){

        $this->load->view('brgy_includes/header');
    }

    private function brFooterIncludes(){

        $this->load->view('brgy_includes/footer');
    }

    public function dashboard()
    {
        $facilities_id = $this->session->userdata('facilities_id');
        $total_residents = $this->Barangay_model->gettotal($facilities_id);
        $data['total_residents'] = $total_residents;

        $this->brUpperIncludes();
        $this->load->view('pages/barangay/brgy_dashboard', $data);
        $this->brFooterIncludes();
    }

    public function Msg(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'message' => $this->input->post('msg'),
                'date' => date('Y-m-d H:i:s'),
            );
            $this->Barangay_model->sendMsg($data);
            
        redirect('barangay/dashboard');
        }
    }

    public function residents()
    {
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $brgy_data = $this->Barangay_model->getBrgy($facilities_id);
        $data['barangay'] = $brgy_data;

        $residents_data = $this->Barangay_model->getResidents($facilities_id);
        $data['residents'] = $residents_data;

        $this->brUpperIncludes();
        $this->load->view('pages/barangay/brgy_residents', $data);
        $this->brFooterIncludes();
    }

    public function importExcel(){

        $config['upload_path'] = 'excel/';
        $config['allowed_types'] = 'xlsx|xls';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('excel_file')) {
            $data = $this->upload->data();
            $inputFileName = 'excel/' . $data['file_name'];

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $this->processExcelData($worksheet);
            unlink($inputFileName);

            //echo 'Import Successful';
            $this->session->set_flashdata('success_message', 'Import Successful');
        } else {
            //echo 'Upload Failed: ' . $this->upload->display_errors();
            $this->session->set_flashdata('error_message', 'Upload Failed: ' . $this->upload->display_errors());
        }

        redirect('barangay/residents');
    }

    private function processExcelData($worksheet) {

        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

        for ($row = 2; $row <= $highestRow; ++$row) {
            $data = array();
            for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                $data[] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
            }

            // Map Excel columns to database fields
            $excel_Data = array(
                'firstname' => $data[0],
                'middlename' => $data[1],
                'lastname' => $data[2],
                'birthdate' => \DateTime::createFromFormat('U', ($data[3] - 25569) * 86400)->format('Y-m-d'),
                'age' => $data[4],
                'civilStatus' => $data[5],
                'occupation' => $data[6],
                'mobileno' => $data[7],
                'email' => $data[8],
                'status' => 1,
                'createdAt' => date('Y-m-d H:i:s')
            );
            $resident_id  = $this->Barangay_model->insertData($excel_Data);

            $excelAdd_Data = array(
                'residents_id' => $resident_id,
                'street' => $data[9],
                'facilities_id' => $this->input->post('fid'),
                'city' => $data[10],
            );
            $this->Barangay_model->insertaddress($excelAdd_Data);
        }

        redirect('barangay/residents');
    }

    public function addResident()
    {
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

        $residents_id = $this->Barangay_model->insertResidentsData($resident_data);

        $address_data = array(
            'residents_id' => $residents_id,
            'facilities_id' => $this->input->post('brgy'),
            'street' => $this->input->post('street'),
            'city' => $this->input->post('city')
        );

        $inserted = $this->Barangay_model->insertAddressData($address_data);

        // $data = array('message' => 'New data added!');
        // $this->mhspusher->triggerEvent('maternal_health_system', 'new-data-added', $data);

        if ($inserted) {
            $this->session->set_flashdata('success', 'New Resident Created Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'New Resident failed to Create!');
        }

        redirect('barangay/residents');
    }

    public function profile()
    {
        $this->brUpperIncludes();
        $this->load->view('pages/barangay/barangay_profile_settings');
        $this->brFooterIncludes();
    }

    public function account()
    {
        $this->brUpperIncludes();
        $this->load->view('pages/barangay/barangay_account_settings');
        $this->brFooterIncludes();
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

        redirect('barangay/account');
    }

    public function logout()
    {
        // confirmation dialog before logout
        echo '<script>
                if (confirm("Are you sure you want to logout?")) {
                    window.location.href = "../barangay/confirm_logout";
                } else {
                    window.location.href = "../barangay/dashboard";
                }
              </script>';
    }

    public function confirm_logout()
    {
        $this->session->unset_userdata('loggedin');
        //$this->session->sess_destroy('loggedin');

        redirect('home');
    }
}
