<?php
namespace CGB\Relax5event\Domain\Model;

/***
 *
 * This file is part of the "relax5event" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Christoph Balogh <cb@lustige-informatik.at>
 *
 ***/

/**
 * Entry
 */
class Entry extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Registered
     *
     * @var int
     */
    protected $registered = 0;

    /**
     * Participants
     *
     * @var int
     */
    protected $participants = 0;

    /**
     * Phone
     *
     * @var string
     */
    protected $phone = '';

    /**
     * Email
     *
     * @var string
     */
    protected $email = '';

    /**
     * Reminder
     *
     * @var \DateTime
     */
    protected $reminder = null;

    /**
     * Reminder
     *
     * @var string
     */
    protected $message = '';

    /**
     * Result
     *
     * @var string
     */
    protected $result = '';

    /**
     * Person
     *
     * @var \CGB\Relax5core\Domain\Model\Person
     */
    protected $person = null;

    /**
     * Event
     *
     * @var \CGB\Relax5event\Domain\Model\Event
     */
    protected $event = null;
    
    /**
     * Returns the registered
     *
     * @return int $registered
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * Sets the registered
     *
     * @param int $registered
     * @return void
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;
    }

    /**
     * Returns the participants
     *
     * @return int $participants
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Sets the participants
     *
     * @param int $participants
     * @return void
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
    }

    /**
     * Returns the phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets the phone
     *
     * @param string $phone
     * @return void
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the reminder
     *
     * @return \DateTime $reminder
     */
    public function getReminder()
    {
        return $this->reminder;
    }

    /**
     * Sets the reminder
     *
     * @param \DateTime $reminder
     * @return void
     */
    public function setReminder(\DateTime $reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * Returns the message
     *
     * @return string $message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets the message
     *
     * @param string $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Returns the result
     *
     * @return string $result
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Sets the result
     *
     * @param string $result
     * @return void
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * Returns the person
     *
     * @return \CGB\Relax5core\Domain\Model\Person $person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Sets the person
     *
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @return void
     */
    public function setPerson(\CGB\Relax5core\Domain\Model\Person $person)
    {
        $this->person = $person;
    }
    
    
    /**
     * 
     * @return \CGB\Relax5event\Domain\Model\Event
     */
    public function getEvent() {
        return $this->event;
    }
    
}
