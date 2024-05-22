<?php

namespace App\Services;

use GuzzleHttp\Client;

class PhoneValidationService
{
	private $apiKey;
    private $apiUrl;
	
	/**
     * This is the construct method for this class
     */
	public function __construct()
    {
        $this->apiKey = config('services.abstract_api.key');
        $this->apiUrl = 'https://phonevalidation.abstractapi.com/v1/';
    }
	
	/**
     * Get the information of that number in json Object.
     *
     * @param int $phoneNumber
     * @return json
     */
	public function vaildatePhone($phoneNumber)
    {
        $client = new Client();

        $response = $client->get($this->apiUrl, [
            'query' => [
                'api_key' => $this->apiKey,
                'phone' => $phoneNumber
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}