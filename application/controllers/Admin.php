<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
    
        if($this->session->userdata('status') != 'login'){
            redirect(base_url().'welcome?pesan=belumlogin');
        }
    }
    
    
    function index(){
        $data['booking'] = $this->db->query("select * from booking,car,customer where booking_car=car_id and booking_customer=customer_id order by booking_id desc limit 10")->result();
        $data['customer'] = $this->db->query("select * from customer order by customer_id desc limit 3")->result(); 
        $data['car'] = $this->db->query("select * from car order by car_id desc limit 3")->result(); 
        $this->load->view('admin/header');
        $this->load->view('admin/index',$data);
        $this->load->view('admin/footer');
    }
    

    function ganti_password(){
        $this->load->view('admin/header');
        $this->load->view('admin/ganti_password');
        $this->load->view('admin/footer');
    }
    function ganti_password_act(){
        $pass_baru  = $this->input->post('new_password');
        $ulang_pass = $this->input->post('repeat_password');
        
        $this->form_validation->set_rules('new_password',' New Password ','required|matches[repeat_password]');
        $this->form_validation->set_rules('repeat_password','Repeat new password','required');
        
        if($this->form_validation->run() != false){
            $data   = array('admin_password' => md5($pass_baru));
            $w      = array('admin_id' => $this->session->userdata('id'));
            $this->m_rental->update_data($w,$data,'admin');
            redirect(base_url().'admin/ganti_password?pesan=berhasil');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/ganti_password');
            $this->load->view('admin/footer');
        }
    }
    
    // logout
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome?pesan=logout');
    }
    
    // CRUD car
    function car(){
        $data['car'] = $this->m_rental->get_data('car')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/car',$data);
        $this->load->view('admin/footer');
    }
    function car_add(){
        $this->load->view('admin/header');
        $this->load->view('admin/car_add');
        $this->load->view('admin/footer');
    }
    function car_add_act(){
        $brand  = $this->input->post('brand');
        $number  = $this->input->post('number');
        $color = $this->input->post('color');
        $year = $this->input->post('year');
        $status = $this->input->post('status');
        $this->form_validation->set_rules('brand','Brand car','required');
        $this->form_validation->set_rules('status','Status car','required');
        
        if($this->form_validation->run() != false){
            $data = array(
                'car_brand'    => $brand,
                'car_number'    => $number,
                'car_color'   => $color,
                'car_year'   => $year,
                'car_status'  => $status
            );
            
            $this->m_rental->insert_data($data, 'car');
            redirect(base_url().'admin/car');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/car_add');
            $this->load->view('admin/footer');
        }
    }

    function car_edit($id){
        $where = array('car_id' => $id);
        $data['car'] = $this->m_rental->edit_data($where,'car')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/car_edit',$data);
        $this->load->view('admin/footer');
    }
    function car_update(){
        $id     = $this->input->post('id');
        $brand  = $this->input->post('brand');
        $number  = $this->input->post('number');
        $color  = $this->input->post('color');
        $year  = $this->input->post('year');
        $status = $this->input->post('status');
        $this->form_validation->set_rules('brand','Brand car','required');
        $this->form_validation->set_rules('status','Status car','required');
        
        if($this->form_validation->run() != false){
            $where = array('car_id' => $id);
            $data = array(
                'car_brand'    => $brand,
                'car_number'    => $number,
                'car_color'   => $color,
                'car_year'   => $year,
                'car_status'  => $status
            );
            
            $this->m_rental->update_data($where, $data, 'car');
            redirect(base_url().'admin/car');
        } else {
            $where = array('car_id' => $id);
            $data['car'] = $this->m_rental->edit_data($where,'car')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/car_edit',$data);
            $this->load->view('admin/footer');
        }
    }
    function car_hapus($id){
        $where = array('car_id' => $id);
        $this->m_rental->delete_data($where, 'car');
        redirect(base_url().'admin/car');
    }
    
    // CRUD customer
    function customer(){
        $data['customer'] = $this->m_rental->get_data('customer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/customer',$data);
        $this->load->view('admin/footer');
    }
    function customer_add(){
        $this->load->view('admin/header');
        $this->load->view('admin/customer_add');
        $this->load->view('admin/footer');
    }
    function customer_add_act(){
        $name   = $this->input->post('name');
        $address = $this->input->post('address');
        $sex    = $this->input->post('sex');
        $phone     = $this->input->post('phone');
        $license    = $this->input->post('license');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('license','ID card no.','required');
        
        if($this->form_validation->run() != false){
            $data = array(
                'customer_name' => $name,
                'customer_address' => $address,
                'customer_sex'   => $sex,
                'customer_phone'   => $phone,
                'customer_license'  => $license
            );
            
            $this->m_rental->insert_data($data, 'customer');
            redirect(base_url().'admin/customer');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/customer_add');
            $this->load->view('admin/footer');
        }
    }
    function customer_edit($id){
        $where = array('customer_id' => $id);
        $data['customer'] = $this->m_rental->edit_data($where,'customer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/customer_edit',$data);
        $this->load->view('admin/footer');
    }
    function customer_update(){
        $id     = $this->input->post('id');
        $name   = $this->input->post('name');
        $address = $this->input->post('address');
        $sex     = $this->input->post('sex');
        $phone    = $this->input->post('phone');
        $license   = $this->input->post('license');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('license','Nomor LICENSE','required');
        
        if($this->form_validation->run() != false){
            $where = array('customer_id' => $id);
            $data = array(
                'customer_name' => $name,
                'customer_address' => $address,
                'customer_sex'   => $sex,
                'customer_phone'   => $phone,
                'customer_license'  => $license
            );
            
            $this->m_rental->update_data($where, $data, 'customer');
            redirect(base_url().'admin/customer');
        } else {
            $where = array('customer_id' => $id);
            $data['customer'] = $this->m_rental->edit_data($where,'customer')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/customer_edit',$data);
            $this->load->view('admin/footer');
        }
    }
    function customer_hapus($id){
        $where = array('customer_id' => $id);
        $this->m_rental->delete_data($where, 'customer');
        redirect(base_url().'admin/customer');
    }
    
    
    function booking(){
        $data['booking'] = $this->db->query("select * from booking,car,customer where booking_car=car_id and booking_customer=customer_id")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/booking', $data);
        $this->load->view('admin/footer');
    }
    function booking_add(){
        $w = array('car_status' => 1);
        $data['car'] = $this->m_rental->edit_data($w,'car')->result();
        $data['customer'] = $this->m_rental->get_data('customer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/booking_add', $data);
        $this->load->view('admin/footer');
    }
    function booking_add_act(){
        $customer   = $this->input->post('customer');
        $car      = $this->input->post('car');
        $borrow = $this->input->post('borrow');
        $return= $this->input->post('return');
        $price     = $this->input->post('price');
        $fine      = $this->input->post('fine');
        
        $this->form_validation->set_rules('customer', 'Customer', 'required');
        $this->form_validation->set_rules('car', 'Car', 'required');
        $this->form_validation->set_rules('borrow', 'Borrow', 'required');
        $this->form_validation->set_rules('return', 'Return', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('fine', 'Fine', 'required');
        
        if($this->form_validation->run() != false){
            $data = array(
                'booking_karyawan'    => $this->session->userdata('id'),
                'booking_customer'    => $customer,
                'booking_car'       => $car,
                'booking_borrow'  => $borrow,
                'booking_return' => $return,
                'booking_price'       => $price,
                'booking_fine'       => $fine,
                'booking_billd'         => date('Y-m-d')
            );
            
            $this->m_rental->insert_data($data, 'booking');
            
            $d = array('car_status' => 2);
            $w = array('car_id' => $car);
            $this->m_rental->update_data($w, $d, 'car');
            
            redirect(base_url().'admin/booking');
        } else {
            $d = array('car_status' => 1);
            $data['car']      = $this->m_rental->edit_data($w, 'car')->result();
            $data['customer']   = $this->m_rental->get_data('customer')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/booking_add', $data);
            $this->load->view('admin/footer');
        }
    }
    function booking_hapus($id){
        $w      = array('booking_id' => $id);
        $data   = $this->m_rental->edit_data($w,'booking')->row();
        
        $w2     = array('car_id' => $data->booking_mobil);
        $data2  = array('car_status' => 1);
        $this->m_rental->update_data($w2,$data2,'car');
        $this->m_rental->delete_data($w,'booking');
        redirect(base_url().'admin/booking');
    }
    function booking_selesai($id){
        $data['car']      = $this->m_rental->get_data('car')->result();
        $data['customer']   = $this->m_rental->get_data('customer')->result();
        $data['booking']  = $this->db->query("select * from booking,car,customer where booking_car=car_id and booking_customer=customer_id and booking_id='$id'")->result();
        
        $this->load->view('admin/header');
        $this->load->view('admin/booking_selesai',$data);
        $this->load->view('admin/footer');
    }
    function booking_selesai_act(){
        $id                 = $this->input->post('id');
        $returned  = $this->input->post('returned');
        $return        = $this->input->post('return');
        $car             = $this->input->post('car');
        $fine             = $this->input->post('denda');
        
        $this->form_validation->set_rules('returned','Returned','required');
        
        if($this->form_validation->run() != false){
            
            $batas_kembali  = strtotime($return);
            $dikembalikan   = strtotime($returned);
            $selisih        = abs(($batas_kembali - $dikembalikan)/(60*60*24));
            $total_fine    = $fine * $selisih;
            
            
            $data = array(
                'booking_returned' => $returned,
                'booking_status'          => 1,
                'booking_totalfine'      => $total_fine
            );
            
            $w = array('booking_id' => $id);
            $this->m_rental->update_data($w,$data,'booking');
            
            
            $data2 = array('car_status' => 1);
            $w2 = array('car_id' => $car);
            $this->m_rental->update_data($w2,$data2,'car');
            redirect(base_url().'admin/booking');
        } else {
            $data['car']      = $this->m_rental->get_data('car')->result();
            $data['customer']   = $this->m_rental->get_data('customer')->result();
            $data['booking']  = $this->db->query("select * from booking,car,customer where booking_car=car_id and booking_customer=customer_id and booking_id='$id'")->result();
            
            $this->load->view('admin/header');
            $this->load->view('admin/booking_selesai',$data);
            $this->load->view('admin/footer');
        }
    }
    

    function laporan(){
        $this->load->view('admin/header');
        $this->load->view('admin/laporan');
        $this->load->view('admin/footer');
    }
    

    function user(){
        $this->load->view('admin/header');
        $this->load->view('admin/user');
        $this->load->view('admin/footer');
    }
}
?>