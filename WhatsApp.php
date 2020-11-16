<?php


class WhatsApp {

	protected $phoneArtisan;
	protected $message;
	protected $order = array();
	protected $apiUrl;
	protected $wrap;




	function __construct(){

	}

	function __destruct(){
		$this->phone = NULL;
		$this->message = NULL;
		$this->order = NULL;
	}


	public function getPhoneArtisan(){
		return $this->phoneArtisan;
	}
	public function phoneArtisan($phoneArtisan){
		$this->phoneArtisan = $phoneArtisan;
	}



	public function getMessage(){
		return $this->message;
	}
	public function message(){
		$this->message = 'Ciao, Ho appena effettuato un ordine sul tuo sito. | Ho preso: ';

			foreach ($this->order['details'] as $key => $value) {
				$this->message .= $value['qt'] . " di " . $value['product'] . " ";
			}

		$this->message .= ' | %0a Il mio nome è: ' . $this->order['contactName']
						. ', %0a il mio numero di telefono: ' . $this->order['contactPhone']
						. ', %0a il mio indirizzo è: ' . $this->order['contactAddress']
						. ' %0a e gradirei la consegna nella fascia oraria delle ' . $this->order['hourDelivery']
						. ', grazie';
	}




	public function getApiUrl(){
		return $this->apiUrl;
	}
	public function apiUrl(){
		$this->apiUrl = 'https://api.whatsapp.com/send?phone=' . $this->phoneArtisan . '&text=';
	}




	public function getOrder(){
		return $this->order;
	}
	public function setOrder($order){
		$this->order = $order;
	}

	public function orderContactName($contactName){
		$this->order['contactName'] = $contactName;
	}
	public function orderContactPhone($contactPhone){
		$this->order['contactPhone'] = $contactPhone;
	}
	public function orderContactEmail($email){
		$this->order['email'] = $email;
	}
	public function orderHourDelivery($hourDelivery){
		$this->order['hourDelivery'] = $hourDelivery;
	}
	public function orderContactAddress($contactAddress){
		$this->order['contactAddress'] = $contactAddress;
	}
	public function orderProducts($prod, $qt){
		foreach ($prod as $key => $value) {
			$this->order['details'][$key]['product'] = $value;
			$this->order['details'][$key]['qt'] = $qt[$key] . " gr";
		}
	}


	public function buildOrder(){
		$this->wrap = $this->apiUrl.$this->message;
	}


	public function sendOrder(){
		header('Location: '.$this->wrap);
	}










}

?>