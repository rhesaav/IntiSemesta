<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendemail extends CI_Controller
{
 
  function sendMail() {
      $this->load->library('email');
      $this->load->library('form_validation');

      // set form validation
      $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[16]');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[6]|max_length[60]');
      $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[12]|max_length[200]');

      // run form validation
      if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('home');
    } else {
        //Mail settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_port'] = 587;
        $config['smtp_user'] = 'rhesaav@gmail.com'; // Your email address
        $config['smtp_pass'] = 'Persik1950'; // Your email account password
        $config['mailtype'] = 'text'; // or 'text'
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE; //No quotes required
        $config['newline'] = "\r\n"; //Double quotes required
        $config['smtp_crypto']= "tls";

        $this->load->library('email');

        $this->email->initialize($config);


        //Send mail with data
        $this->email->from('unitedalvin@gmail.com');
        $this->email->to('rhesaav@gmail.com');
        $this->email->subject('testt');
        $this->email->message('test');

        $this->email->send();
        echo $this->email->print_debugger();

      }
    }
}
