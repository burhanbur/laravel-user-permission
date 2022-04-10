<?php

namespace App\Utilities;

trait ErrorMessage
{
	public function errMessage($ex)
	{
		$returnValue = null;

		if ($ex) {
			$returnValue = $ex->getMessage().' in file '.$ex->getFile().' at line '.$ex->getLine();
		}

        return $returnValue;
	}
}