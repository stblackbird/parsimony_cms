<?php
/**
 * Parsimony
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to contact@parsimony-cms.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Parsimony to newer
 * versions in the future. If you wish to customize Parsimony for your
 * needs please refer to http://www.parsimony.mobi for more information.
 *
 * @authors Julien Gras et Benoît Lorillot
 * @copyright  Julien Gras et Benoît Lorillot
 * @version  Release: 1.0
 * @category  Parsimony
 * @package core\fields
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace core\fields;

/**
 * @title Numeric
 * @description Numeric
 * @version 1
 * @browsers all
 * @php_version_min 5.3
 * @modules_dependencies core:1
 */

class numeric extends \field {

	protected $type = 'INT';
	protected $characters_max = 2;
	protected $regex = '^[1-9\-]?[0-9]*$';
	
	/**
	 * Validate field
	 * @param string $value
	 * @return string
	 */
	public function validate($value) {
		if(!$this->required && empty($value))
			return '';
		$length = strlen($value);
		if($length >= $this->characters_min && $length <= $this->characters_max)
			return filter_var($value, FILTER_VALIDATE_INT);
		else
			return FALSE;
	}

}

?>
