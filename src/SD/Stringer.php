<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 09/08/2017
 * Time: 16:57
 */

namespace SD;

/**
 * Helper class for providing printable values, mostly used for exception messages
 *
 * Class Stringer
 * @package SD
 */
class Stringer
{
	/**
	 * Returns the type of given variable as string value
	 * For null variable returns string 'NULL'
	 * For boolean variable returns string 'TRUE' or 'FALSE' depending on a value
	 * For array variable returns string 'ARRAY'
	 * For string variable the result will be the same as the given value.
	 * If an object with __toString implementation is passed, the same object will be returned as result
	 * In case of non-printable object, class name will be returned
	 * @param mixed $variable
	 * @return string
	 */
	public static function asString($variable)
	{
		switch (true) {
			case is_null($variable):
				$response = 'NULL';
				break;
			case is_bool($variable):
				$response = $variable ? 'TRUE' : 'FALSE';
				break;
			case is_array($variable):
				$response = 'ARRAY';
				break;
			case is_string($variable):
				$response = '"' . $variable . '"';
				break;
			case is_scalar($variable) || method_exists($variable, '__toString'):
				$response = $variable;
				break;
			case is_object($variable):
				$response = get_class($variable);
				break;
			default:
				$response = 'UNKNOWN';
				break;
		}

		return $response;
	}

	/**
	 * Returns the type of given variable as string value
	 *
	 * @param mixed $variable
	 * @return string
	 */
	public static function asType($variable)
	{
		return is_object($variable) ? get_class($variable) : gettype($variable);
	}
}