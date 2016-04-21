<?php


	namespace LiftKit\Geolocation;

	use LiftKit\Curl\Curl;
	use LiftKit\Geolocation\Exception\InvalidIp;
	use LiftKit\Geolocation\Location\Location;


	class Geolocation
	{
		const IP_API_PREFIX = 'http://ip-api.com/json/';
		protected $curl;


		public function __construct ()
		{
			$this->curl = new Curl();
		}


		public function getLocationFromIp ($ipAddress)
		{
			$response = $this->curl->clear()
				->url(self::IP_API_PREFIX . $ipAddress)
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

