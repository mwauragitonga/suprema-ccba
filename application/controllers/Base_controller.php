<?php

use Mpdf\Mpdf;
use Mpdf\MpdfException;

defined('BASEPATH') or exit('No direct script access allowed');

class Base_controller extends CI_Controller
{

	/**
	 * Base Controller for the Suprema  API  Consumer Application for Nairobi Bottlers Limited (Coke)
	 * Start Date : 27.01.2021
	 * @author  Mwaura Gitonga
	 *email: gitongakmwaura@gmail.com
	 * U70XDN
	 */
	public function index()
	{
		$this->load->view('reports/generateReport');
	}

	public function apiLogin()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://ccba.biostar2.com/api/login',/*CCBA*/
			//CURLOPT_URL => 'https://nairobigarage.biostar2.com/api/login',/*Nairobi Garage*/
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
	//	var_dump($response);

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
		if(!empty($sessionID)){
			$curl = curl_init();

			curl_setopt_array($curl, array(
			//	CURLOPT_URL => 'https://nairobigarage.biostar2.com/api/events/search',/*Nairobi Garage*/
				CURLOPT_URL => 'https://ccba.biostar2.com/api/events/search',/*CCBA*/

				CURLOPT_SSL_VERIFYPEER => false,
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
            },  {
                "column": "event_type_id.code",
                "operator" : 0,
                "values": [
                    "4865"
                ]
            },
            
            {
                "column": "datetime",
                "operator": 3,
                "values": [
                    "'.$startDate.'T00:00:00.000Z",
                    "'.$endDate.'T00:00:00.000Z"
                ]
            }
        ],
        "orders": [
            {
                "column": "datetime",
                "ascending": false
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
	public function  fetchUserInfoJson($userID="")
	{
		$readFile = file_get_contents("application/views/users.json");
		$jsonData = json_decode($readFile, true);
		$userArray = ($jsonData["UserCollection"]["rows"]);
		//var_dump($userArray);
		foreach ($userArray as $key => $value) {
			if ($value["user_id"] == $userID) {
			//	var_dump($value['user_custom_fields']);
				$size = sizeof($value['user_custom_fields']);
			//	var_dump($size);
				$costCentreName= "";
				$costCentreCode = 0;
				$userInfo = [];
				if ($size == 5) {
					if (!empty($value['user_custom_fields'][1]['item'])) {
						$costCentreName = $value['user_custom_fields'][1]['item'];
					} else {
						$costCentreName = 'No Cost Center Nam';
					}

					if (!empty($value['user_custom_fields'][2]['custom_field'])) {
						$costCentreCode = $value['user_custom_fields'][2]['custom_field']['id'];

					} else {
						$costCentreCode = 'No Cost Center Code';
					}

				}else if($size == 4) {

					if (!empty($value['user_custom_fields'][1]['custom_field'])) {
						$costCentreCode = $value['user_custom_fields'][1]['item'];
						$costCentreName = "No Cost Center Name";

					}

				}else if($size < 4){

										$costCentreCode = "No Cost Center Code";
					$costCentreName =  "No Cost Center Name";
					}

					$userInfo = array(
						'userID' => $value['user_id'],
						'username' => $value['name'],
						'costCenterCode' => $costCentreCode,
						'costCenterName' => $costCentreName
					);
				return $userInfo;

			}
			}

	}
	public function fetchUserInfoAPI($userID=""){
		//login and get session id
		$sessionID= $this->apiLogin();

		$curl = curl_init();
		//$userID=51830;
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://ccba.biostar2.com/api/users/'.$userID,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'bs-session-id: '. $sessionID,
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$decodedData= json_decode( $response, true);
		$data[]= ( $decodedData);
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
		//$data = ($array2['contents']);
		$costCentreName ='';
		$costCentreCode ='';
		$size= sizeof($array2['contents'][0]['user_custom_fields']);
		if($size == 5){
			if(!empty($array2['contents'][0]['user_custom_fields'][1]['item'])){
			$costCentreName= $array2['contents'][0]['user_custom_fields'][1]['item'];
		}else{
			$costCentreName ='No Cost Center Nam';
		}

			if(!empty($array2['contents'][0]['user_custom_fields'][2]['custom_field'])){

				$costCentreCode= $array2['contents'][0]['user_custom_fields'][2]['custom_field']['id'];
			}else{
				$costCentreCode ='No Cost Center Code';
			}

			$userInfo = array(
				'userID'=>$array2['contents'][0]['user_id'],
				'username' => $array2['contents'][0]['name'],
				'costCenterCode'=>$costCentreCode,
				'costCenterName'=>$costCentreName
			);
		}else{
	//		var_dump($array2['contents'][0]['user_custom_fields']);

			$userInfo = array(
				'userID'=>$array2['contents'][0]['user_id'],
				'username' => $array2['contents'][0]['name'],
				'costCenterCode'=>$array2['contents'][0]['user_custom_fields'][1]['item'],
				'costCenterName'=>"No  Cost Center Name"
			);
		}

		return ( $userInfo);

	}
	public function  email_report(){


	}
	public function prepareReport(){
		/*	prepare data for email title and body
			1.email address
			2.title(Event logs for day x to y )
			3.Body
			4.attachment(s)
		*/
		$email = $this->input->post("email");
		$startDate = $this->input->post("startDate");
		$endDate = $this->input->post("endDate");
		$dataJson = $this->input->post('data');
		$dataArray = json_decode(htmlspecialchars_decode($dataJson), true);

		$data[]= ( $dataArray);
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

		$arrayData = array(
			'contents'=> $array2,
			'startDate'=> $startDate,
			'endDate'=> $endDate
		);
		$mpdf = new Mpdf(array('tempDir' => APPPATH . '/views/reports/pdf/temp'));
		try {
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->debug = false;
			$html = $this->load->view('reports/pdf/templateOne', $arrayData);// pass the new array as the parameter
			$string_version = serialize($html);
			$mpdf->charset_in = 'utf-8';
			$mpdf->WriteHTML($string_version);
			$time = date('ymdhis');
			ob_clean();
		//	header('Content-Type: application/pdf');
			error_reporting(0);
			$mpdf->Output('Events Log Report' . $time . '.pdf', 'D');
		} catch (MpdfException $e) {
			echo $e->getMessage();
		}

		//email'
		try {
			$this->email($email, "Email Subject");
		} catch (Exception $exception) {
			//echo "error sending email";
		}
		$result = array('
			status' => 'true'
		);
		//var_dump($result);
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
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = 'carreltechlimited@gmail.com';
		$config['smtp_pass'] = 'Carrel@123';
		$config['smtp_crypto'] = 'ssl';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['auth'] = TRUE;

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from('carreltechlimited@gmail.com', 'Suprema API Reports');
		$this->email->to($mail);
		$this->email->subject($title);

		$files = scandir(APPPATH . 'views/reports/pdf/generatedFiles', SCANDIR_SORT_DESCENDING);
		$newest_file = $files[0];
		$this->email->message('Generated Report on ' . $title);
		$this->email->attach(APPPATH . 'views/reports/pdf/generatedFiles/' . $newest_file);
		try {
			if ($this->email->send()) {
				//echo 'Email sent';
			} else {
			//	echo 'Email not Sent';
			}
		//	unlink(APPPATH . 'views/reports/pdf/generatedFiles/' . $newest_file);

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
		$limit = 160;
		$deviceID= 546845493;/*CCBA*/
//		$deviceID= 545406683;/*Nairobi Garage*/
		$data = $this->fetchEvents($deviceID, $limit,  $dateFro, $dateTo, $mealTime, $costcenter);
		$count =0;
		$fullData = [];
		$summary =[];
		for ($x= 0 ; $x< (sizeof($data[0])); $x ++){
		//	$billingInfo = $this->fetchUserInfo($data[0][$x]['user_id']['user_id']);
			$billingInfo = $this->fetchUserInfoJson($data[0][$x]['user_id']['user_id']);
		//var_dump($billingInfo);
			$fullData[] =  array(
				'user_id'=> $data[0][$x]['user_id']['user_id'],
				'username'=> $data[0][$x]['user_id']['name'],
				'device_id'=> $data[0][$x]['device_id'],
				'user_group_id' => $data[0][$x]['user_group_id']['id'],
				'user_group_name' => $data[0][$x]['user_group_id']['name'],
				'event_type' => $data[0][$x]['event_type_id']['code'],
				'datetime' => $data[0][$x]['datetime'],
				'costCenterCode' => $billingInfo['costCenterCode'],
				'costCenterName' => $billingInfo['costCenterName'],

			);
		}

		$arrayData = array(
			'data'=> $fullData,
			'startDate'=> $dateFro,
			'endDate'=> $dateTo,
			'total_events' => sizeof($data[0])
		);
	//	var_dump($arrayData);
			$this->load->view('reports/viewReport', $arrayData); // pass the new array as the parameter
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



}
