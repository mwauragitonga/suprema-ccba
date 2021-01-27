<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

	/**
		Main Controller for the Suprema  API  Consumer Application for Nairobi Bottlers Limited (Coke)
	 * Start Date : 27.01.2021
	 * @author  Mwaura Gitonga
	 *email: gitongakmwaura@gmail.com
	 */
	public function index()
	{
		$this->load->view('home');
	}
	public function features()
	{
		$this->load->view('features');
	}
	public function contact()
	{
		$this->load->view('contact');
	}
	public function partner()
	{
		$this->load->view('partners');
	}
	public function sendContactMail(){

		$from = 'info@callmetron.com';
		$to='contact@callmetron.com';
		$name = $this->input->post("name");
		$email =$this->input->post("email");
		$text = $this->input->post("message");
		$subject = $this->input->post("subject");

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'www.callmetron.com';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = $from;
		$config['smtp_pass'] = 'Tuende2020**';
		$config['smtp_crypto'] = 'ssl';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$headers = 'MIME-Version: 1.0' . "\r\n";
		//$headers .= "From: " . $email . "\r\n"; // Sender's E-mail
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($email);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message ('<table style="width:100%">
        <tr>
            <td>User Name: ' . $name . '</td>
        </tr>
        <tr><td>User Email: ' . $email . '</td></tr>
        <tr><td>Subject: ' . $subject . '</td></tr>
        <tr><td>Message: ' . $text . '</td></tr>
        
    </table>');

		try {
			$this->email->send();
			$message= 'Email Sent, We will be in touch ASAP.';
			$data= array(
				'message'=>$message
			);
			$this->load->view('contact.php', $data);
		} catch (Exception $e) {
			$message= 'Email not sent! Please try again.';
			$data= array(
				'message'=>$message
			);
			$this->load->view('contact.php', $data);
		}
	}
	public function sendPartnerMail(){

		$to = 'info@callmetron.com';
		$from='contact@callmetron.com';
		$name = $this->input->post("name");
		$email =$this->input->post("email");
		$country = $this->input->post("country");
		$subject = 'PARTNERSHIP';

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'www.callmetron.com';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = $from;
		$config['smtp_pass'] = 'Tuende2020**';
		$config['smtp_crypto'] = 'ssl';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$headers = 'MIME-Version: 1.0' . "\r\n";
		//$headers .= "From: " . $email . "\r\n"; // Sender's E-mail
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($email);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message ('<table style="width:100%">
        <tr><td>User Name: ' . $name . '</td></tr>
        <tr><td>User Email: ' . $email . '</td></tr>
        <tr><td>Subject: ' . $subject . '</td></tr>        
         <tr><td>Country: ' . $country . '</td></tr>        

    		</table>');


		try {
			$this->email->send();
			$message= 'Email Sent, We will be in touch ASAP.';
			$data= array(
				'message'=>$message
			);
			$this->load->view('partners.php', $data);
		} catch (Exception $e) {
			$message= 'Email not sent! Please try again.';
			$data= array(
				'message'=>$message
			);
			$this->load->view('partners.php', $data);
		}
	}

}
