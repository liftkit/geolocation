<?php


	namespace LiftKit\Geolocation\Location;


	class Location
	{
		private $city;
		private $country;
		private $countryCode;
		private $latitude;
		private $longitude;
		private $region;
		private $regionCode;
		private $zip;


		public function __construct (
			$city,
			$country,
			$countryCode,
			$latitude,
			$longitude,
			$region,
			$regionCode,
			$zip
		) {
			$this->city        = $city;
			$this->country     = $country;
			$this->countryCode = $countryCode;
			$this->latitude    = $latitude;
			$this->longitude   = $longitude;
			$this->region      = $region;
			$this->regionCode  = $regionCode;
			$this->zip         = $zip;
		}


		public function getCity ()
		{
			return $this->city;
		}


		public function getCountry ()
		{
			return $this->country;
		}


		public function getCountryCode ()
		{
			return $this->countryCode;
		}


		public function getLatitude ()
		{
			return $this->latitude;
		}


		public function getLongitude ()
		{
			return $this->longitude;
		}


		public function getRegion ()
		{
			return $this->region;
		}


		public function getRegionCode ()
		{
			return $this->regionCode;
		}


		public function getZip ()
		{
			return $this->zip;
		}
	}