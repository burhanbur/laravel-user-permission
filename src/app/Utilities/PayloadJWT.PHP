<?php

namespace App\Utilities;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

trait PayloadJWT
{
	public function userId()
	{
		$returnValue = null;		
		$token = JWTAuth::getToken();

		if ($token) {			
	        $payload = JWTAuth::getPayload($token)->toArray();

	        $returnValue = $payload['sub'];
		}

        return $returnValue;
	}
}