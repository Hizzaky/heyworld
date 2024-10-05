<?php
namespace App\Models;

use CodeIgniter\Model;

class tesModel extends Model
{
    public function is_logged() {
     if (is_null($this->session->userdata('email'))) {
         redirect('main/login');
         exit; // just in case
     }
}

public function is_allowed($perm) {
     $roles = $this->session->userdata('roles');
     if ($roles !== 'admin' && $perm !== $roles) {
         // maybe set flashdata so user knows why they were redirected
         redirect('main/' . $roles);
         exit; // just in case
     }
}
}


//  CONTROLLER ===============

// class Subscriber extends CI_Controller
// {

//     public function construct()
//     {
//         parent::__construct();
//         $this->user_model->is_logged(); // can merge with below func, just make sure it is called first (!imp)
//         $this->user_model->is_allowed('subscriber');
//     }

//     public function subscriber()
//     {
//         $this->load->view('header', $data);
//         $this->load->view('dashboard/subscriber', $data);
//         $this->load->view('footer');
//     }
// }