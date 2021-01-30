<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_controller extends CI_Controller
{

	/**
	 * Main Controller for the Suprema  API  Consumer Application for Nairobi Bottlers Limited (Coke)
	 * Start Date : 27.01.2021
	 * @author  Mwaura Gitonga
	 *email: gitongakmwaura@gmail.com
	 * U70XDN
	 */
	public function index()
	{
		$this->load->view('home');
	}

	public function apiLogin()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://ccba.biostar2.com/api/login',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			 CURLOPT_HEADER => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => '{
  "User": {
    "login_id": "admin",
    "password": "CCb@B10$tar"
  }
}',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
		));

		$response = curl_exec($curl);
		//var_dump($response);

		// Get bs-session-id from response header to authenticate other requests
		$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
		$header = substr($response, 0, $header_size);
		$head= $this->get_headers_from_curl_response($header);
				//ToDO store response body as user session data
		$body = substr($response, $header_size);
		curl_close($curl);
		$sessionID = $head[0]["bs-session-id"];
		return $sessionID ;

	}
	static function get_headers_from_curl_response($headerContent)
	{

		$headers = array();

		// Split the string on every "double" new line.
		$arrRequests = explode("\r\n\r\n", $headerContent);

		// Loop of response headers. The "count() -1" is to
		//avoid an empty row for the extra line break before the body of the response.
		for ($index = 0; $index < count($arrRequests) -1; $index++) {

			foreach (explode("\r\n", $arrRequests[$index]) as $i => $line)
			{
				if ($i === 0)
					$headers[$index]['http_code'] = $line;
				else
				{
					list ($key, $value) = explode(': ', $line);
					$headers[$index][$key] = $value;
				}
			}
		}

		return $headers;
	}
	public function fetchEvents($deviceID="", $limit="", $startDate="",$endDate="", $mealTime="", $costcenter=""){
		//login and get session id
		$sessionID= $this->apiLogin();
		$data = array();
	//	var_dump($sessionID);
		if(!empty($sessionID)){
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://ccba.biostar2.com/api/events/search',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => '{
    "Query": {
        "limit": '. $limit. ',
        "conditions": [
            {
                "column": "device_id.id",
                "operator" : 0,
                "values": [
                    "'.$deviceID.'"
                ]
            },
            {
                "column": "datetime",
                "operator": 3,
                "values": [
                    "2021-01-01T00:00:00.000Z",
                    "2021-01-26T00:00:00.000Z"
                ]
            }
        ],
        "orders": [
            {
                "column": "datetime",
                "descending": true
            }
        ]
    }
}',
				CURLOPT_HTTPHEADER => array(
					'bs-session-id: '. $sessionID,
					'content-type: application/json'
				),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$decodedData= json_decode( $response, true);
			$rows = $decodedData['EventCollection']['rows'];
			$data[]= ( $rows);
		}

return $data;
	}

	public function  email_report(){
		echo "wamlambez";
		$email = $this->input->post("email");
		$dataJson = $this->input->post('data');
		$dataArray = json_decode(htmlspecialchars_decode($dataJson), true);
	/*	prepare data for email title and body
		1.email address
		2.title(Event logs for day x to y )
		3.Body
		4.attachment(s)
	*/


	}

	/**
	 * @param $mail , address to receive email and attachment
	 * @param $title , title of the email
	 * @param $mail_settings 'use this parameter to pass mail settings such as ssl, protocol,pass and user
	 * @return bool
	 */
	public function email($mail = '', $title = '', $mail_settings = '')
	{
		//$mail_settings;
		$from = 'info@callmetron.com';
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'www.callmetron.com';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = $from;
		$config['smtp_pass'] = 'Tuende2020**';
		$config['smtp_crypto'] = 'ssl';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($from, 'CallMetron Reports');
		$this->email->to($mail);
		$this->email->subject($title);

		$files = scandir(APPPATH . 'views/reports/pdf/generatedFiles', SCANDIR_SORT_DESCENDING);
		$newest_file = $files[0];
		$this->email->message('Generated Report on ' . $title);
		$this->email->attach(APPPATH . 'views/reports/pdf/generatedFiles/' . $newest_file);
		try {
			if ($this->email->send()) {
				echo 'Email sent';
			} else {
				echo 'Fail';
			}
			unlink(APPPATH . 'views/reports/pdf/generatedFiles/' . $newest_file);

		} catch (Exception $e) {
			return false;
		}
	}

	public function reports()
	{
		$this->load->view('reports/generateReport');
	}

	public function generate_report()
	{

		//collect input filters then fetch data from API
		$date = $this->input->post('date');
		$dateFro = substr($date, 0, 10);
		$dateTo = substr($date,  -10);
		$mealTime = $this->input->post('mealTime');
		$costcenter = $this->input->post('costcenter');
		$limit = 40;
		$deviceID= 546845493;
		$data	 = $this->fetchEvents($deviceID, $limit,  $dateFro, $dateTo, $mealTime, $costcenter);
		$i=0;
		$cleanarray = array();
		foreach ($data as $innerphrase) {
			if (is_array($innerphrase)) {
				foreach ($innerphrase as $value) {
					$cleanarray[$i] = $value;
					$i++;
				}
			}
		}

		$array2 =  array();  // create a new array
		$array2['contents']= $cleanarray; // add $cleanarray to the new array
		$this->load->view('reports/viewReport', $array2); // pass the new array as the parameter
	}

	public function partner()
	{
		$this->load->view('partners');
	}

	public function sendContactMail()
	{

		$from = 'info@callmetron.com';
		$to = 'contact@callmetron.com';
		$name = $this->input->post("name");
		$email = $this->input->post("email");
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
		$this->email->message('<table style="width:100%">
        <tr>
            <td>User Name: ' . $name . '</td>
        </tr>
        <tr><td>User Email: ' . $email . '</td></tr>
        <tr><td>Subject: ' . $subject . '</td></tr>
        <tr><td>Message: ' . $text . '</td></tr>
        
    </table>');

		try {
			$this->email->send();
			$message = 'Email Sent, We will be in touch ASAP.';
			$data = array(
				'message' => $message
			);
			$this->load->view('contact.php', $data);
		} catch (Exception $e) {
			$message = 'Email not sent! Please try again.';
			$data = array(
				'message' => $message
			);
			$this->load->view('contact.php', $data);
		}
	}

	public function sendPartnerMail()
	{

		$to = 'info@callmetron.com';
		$from = 'contact@callmetron.com';
		$name = $this->input->post("name");
		$email = $this->input->post("email");
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
		$this->email->message('<table style="width:100%">
        <tr><td>User Name: ' . $name . '</td></tr>
        <tr><td>User Email: ' . $email . '</td></tr>
        <tr><td>Subject: ' . $subject . '</td></tr>        
         <tr><td>Country: ' . $country . '</td></tr>        

    		</table>');


		try {
			$this->email->send();
			$message = 'Email Sent, We will be in touch ASAP.';
			$data = array(
				'message' => $message
			);
			$this->load->view('partners.php', $data);
		} catch (Exception $e) {
			$message = 'Email not sent! Please try again.';
			$data = array(
				'message' => $message
			);
			$this->load->view('partners.php', $data);
		}
	}

}
