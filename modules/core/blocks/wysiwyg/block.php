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
 * @package core/blocks
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace core\blocks;

/**
 * @title Wysiwyg
 * @description displays a rich text editor
 * @version 1
 * @browsers all
 * @php_version_min 5.3
 * @modules_dependencies core:1
 */
class wysiwyg extends code {

	public function saveConfigs() {
		\tools::file_put_contents(PROFILE_PATH . $this->getConfig('viewPath'), $_POST['editor']);
	}

	public function setContent($html) {
		if (\app::getClass('user')->VerifyConnexion() && $_SESSION['behavior'] == 2) {
			return \tools::file_put_contents(PROFILE_PATH . $this->getConfig('viewPath'), \tools::sanitize($html));
		}
		return FALSE;
	}

	public function saveWYSIWYGAction($html) {
		if ($this->setContent($html) !== FALSE) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public static function loadExternalFiles() {
		\app::$request->page->addJSFile('lib/HTML5editor/HTML5editor.js');
		\app::$request->page->addCSSFile('lib/HTML5editor/HTML5editor.css');
		\app::$request->page->addJSFile('core/blocks/wysiwyg/edit.js');
		\app::$request->page->addCSSFile('lib/editinline.css');
	}

}
\app::addListener('editLoad', array('core\blocks\wysiwyg', 'loadExternalFiles'));
?>
