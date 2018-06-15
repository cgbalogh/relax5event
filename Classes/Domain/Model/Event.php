<?php
namespace CGB\Relax5event\Domain\Model;

/***
 *
 * This file is part of the "relax5event" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Christoph Balogh <cb@lustige-informatik.at>
 *
 ***/

/**
 * Event
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * Date
     *
     * @var \DateTime
     */
    protected $date = null;

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * MAximum Participants
     *
     * @var int
     */
    protected $maxParticipants = 0;

    /**
     * Minimum Participants
     *
     * @var int
     */
    protected $minParticipants = 0;

    /**
     * locationText
     *
     * @var string
     */
    protected $locationText = '';

    /**
     * Location
     *
     * @var \CGB\Relax5event\Domain\Model\Location
     * @lazy
     */
    protected $location = null;

    /**
     * Entries
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5event\Domain\Model\Entry>
     * @cascade remove
     * @lazy
     */
    protected $entries = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->entries = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the maxParticipants
     *
     * @return int $maxParticipants
     */
    public function getMaxParticipants()
    {
        return $this->maxParticipants;
    }

    /**
     * Sets the maxParticipants
     *
     * @param int $maxParticipants
     * @return void
     */
    public function setMaxParticipants($maxParticipants)
    {
        $this->maxParticipants = $maxParticipants;
    }

    /**
     * Returns the minParticipants
     *
     * @return int $minParticipants
     */
    public function getMinParticipants()
    {
        return $this->minParticipants;
    }

    /**
     * Sets the minParticipants
     *
     * @param int $minParticipants
     * @return void
     */
    public function setMinParticipants($minParticipants)
    {
        $this->minParticipants = $minParticipants;
    }

    /**
     * Returns the locationText
     *
     * @return string $locationText
     */
    public function getLocationText()
    {
        return $this->locationText;
    }

    /**
     * Sets the locationText
     *
     * @param string $locationText
     * @return void
     */
    public function setLocationText($locationText)
    {
        $this->locationText = $locationText;
    }

    /**
     * Returns the location
     *
     * @return \CGB\Relax5event\Domain\Model\Location $location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location
     *
     * @param \CGB\Relax5event\Domain\Model\Location $location
     * @return void
     */
    public function setLocation(\CGB\Relax5event\Domain\Model\Location $location)
    {
        $this->location = $location;
    }

    /**
     * Adds a Entry
     *
     * @param \CGB\Relax5event\Domain\Model\Entry $entry
     * @return void
     */
    public function addEntry(\CGB\Relax5event\Domain\Model\Entry $entry)
    {
        $this->entries->attach($entry);
    }

    /**
     * Removes a Entry
     *
     * @param \CGB\Relax5event\Domain\Model\Entry $entryToRemove The Entry to be removed
     * @return void
     */
    public function removeEntry(\CGB\Relax5event\Domain\Model\Entry $entryToRemove)
    {
        $this->entries->detach($entryToRemove);
    }

    /**
     * Returns the entries
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5event\Domain\Model\Entry> $entries
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * Sets the entries
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5event\Domain\Model\Entry> $entries
     * @return void
     */
    public function setEntries(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $entries)
    {
        $this->entries = $entries;
    }

    /**
     * @return int
     */
    public function getEntriesCount()
    {
        return $this->entries->count();
    }

    /**
     * @return int
     */
    public function getRegisteredTotal()
    {
        $total = 0;
        foreach ($this->entries as $entry) {
            $total += $entry->getRegistered();
        }
        return $total;
    }

    /**
     * @return int
     */
    public function getParticipantsTotal()
    {
        $total = 0;
        foreach ($this->entries as $entry) {
            $total += $entry->getParticipants();
        }
        return $total;
    }
    
}
