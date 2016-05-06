<?php


	namespace LiftKit\Geolocation;

	use LiftKit\Curl\Curl;
	use LiftKit\Geolocation\Exception\InvalidIp;
	use LiftKit\Geolocation\Location\Location;


	class Geolocation
	{
		const IP_API_PREFIX  = 'http://ip-api.com/json/';
		const PRO_API_PREFIX = 'http://pro.ip-api.com/json/';
		protected $curl;
		private $apiKey;


		public function __construct ($apiKey = null)
		{
			$this->curl   = new Curl();
			$this->apiKey = $apiKey;
		}


		public function getLocationFromIp ($ipAddress)
		{
			if ($this->apiKey) {
				$url = self::PRO_API_PREFIX . $ipAddress . '?key=' . $this->apiKey;
			} else {
				$url = self::IP_API_PREFIX . $ipAddress;
			}

			$response = $this->curl->clear()
				->url($url)
				->execute();

			$responseData = json_decode($response, true);

			if ($responseData['status'] == 'success') {
				return new Location(
					$responseData['city'],
					$responseData['country'],
					$responseData['countryCode'],
					$responseData['lat'],
					$responseData['lon'],
					$responseData['regionName'],
					$responseData['region'],
					$responseData['zip']
				);
			} else {
				throw new InvalidIp($responseData['message']);
			}
		}
	}

