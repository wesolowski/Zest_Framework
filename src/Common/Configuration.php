<?php

/**
 * This file is part of the Zest Framework.
 *
 * @author   Malik Umer Farooq <lablnet01@gmail.com>
 * @author-profile https://www.facebook.com/malikumerfarooq01/
 *
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 * @since 3.0.0
 *
 * @license MIT
 */

namespace Zest\Common;
use Zest\Data\Conversion;

class Configuration

{

	/**
	* Get the key form config file
	*
	* @since 3.0.0
	*
	* @return mixed
	*/
	public function get()
	{
		$data = $this->arrayChangeCaseKey($this->parseData());
		
		return Conversion::arrayObject($data);
	}

	/**
	* Prase the config file
	*
	* @since 3.0.0
	*
	* @return array
	*/	
	public function parseData()
	{
		$data = [];
		$file = "../Config/App.php";
		if (file_exists($file)) {
			$data += require $file;
		}

		return $data;
	}	

	/**
	* Change the key of array to lower case
	*
	* @param (array) $array valid array
	*
	* @since 3.0.0
	*
	* @author => http://php.net/manual/en/function.array-change-key-case.php#114914
	*
	* @return array
	*/
	public function arrayChangeCaseKey($array)
	{
	    return array_map(function($item){
	        if(is_array($item))
	            $item = $this->arrayChangeCaseKey($item);
	        return $item;
	    },array_change_key_case($array));
	}
}