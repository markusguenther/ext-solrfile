<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010-2012 Ingo Renner <ingo@typo3.org>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * File detector to detect files on a page which are embed using EXT:dam_filelinks
 *
 * @author	Ingo Renner <ingo@typo3.org>
 * @package	TYPO3
 * @subpackage	solr
 */
class tx_solr_fileindexer_filedetector_DamFileLinks extends tx_solr_fileindexer_filedetector_Abstract {

	/**
	 * List of observed content element types and observed fields for each type.
	 *
	 * @var	array
	 */
	protected $observedContentElementTypes = array(
		'uploads' => 'tx_damfilelinks_filelinks'
	);

	/**
	 * Finds the files used in a content element.
	 *
	 * @return	array	An array of files with path relative to the TYPO3 site root.
	 */
	protected function findFiles() {
		$damFiles = tx_dam_db::getReferencedFiles(
			'tt_content',
			$this->contentElementRecord['uid'],
			'tx_damfilelinks_filelinks'
		);

		return $damFiles['files'];
	}
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/solr/classes/fileindexer/filedetector/class.tx_solr_fileindexer_filedetector_damfilelinks.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/solr/classes/fileindexer/filedetector/class.tx_solr_fileindexer_filedetector_damfilelinks.php']);
}

?>