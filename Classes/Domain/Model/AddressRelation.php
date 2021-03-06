<?php
namespace CGB\Relax5event\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Lorenz Ulrich <lorenz.ulrich@visol.ch>, visol digitale Dienstleistungen GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * AddressRelation
 */
class AddressRelation extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Event
	 *
	 * @var \CGB\Relax5event\Domain\Model\Event
	 */
	protected $event;

	/**
	 * Address
	 *
	 * @var \CGB\Relax5core\Domain\Model\Address
	 */
	protected $address;

    /**
     * 
     * @return \CGB\Relax5event\Domain\Model\Event
     */
    function getEvent() {
        return $this->event;
    }

    /**
     * 
     * @return \CGB\Relax5core\Domain\Model\Address
     */
    function getAddress() {
        return $this->address;
    }

    /**
     * 
     * @param \CGB\Relax5event\Domain\Model\Event $event
     */
    function setEvent(\CGB\Relax5event\Domain\Model\Event $event) {
        $this->event = $event;
    }

    /**
     * 
     * @param \CGB\Relax5core\Domain\Model\Address $address
     */
    function setAddress($address) {
        $this->address = $address;
    }



}