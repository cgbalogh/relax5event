<?php
namespace CGB\Relax5event\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class EntryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5event\Domain\Model\Entry
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5event\Domain\Model\Entry();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getRegisteredReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getRegistered()
        );
    }

    /**
     * @test
     */
    public function setRegisteredForIntSetsRegistered()
    {
        $this->subject->setRegistered(12);

        self::assertAttributeEquals(
            12,
            'registered',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getParticipantsReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getParticipants()
        );
    }

    /**
     * @test
     */
    public function setParticipantsForIntSetsParticipants()
    {
        $this->subject->setParticipants(12);

        self::assertAttributeEquals(
            12,
            'participants',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPhoneReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPhone()
        );
    }

    /**
     * @test
     */
    public function setPhoneForStringSetsPhone()
    {
        $this->subject->setPhone('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'phone',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail()
    {
        $this->subject->setEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'email',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getReminderReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getReminder()
        );
    }

    /**
     * @test
     */
    public function setReminderForDateTimeSetsReminder()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setReminder($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'reminder',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMessageReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMessage()
        );
    }

    /**
     * @test
     */
    public function setMessageForStringSetsMessage()
    {
        $this->subject->setMessage('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'message',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getResultReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getResult()
        );
    }

    /**
     * @test
     */
    public function setResultForStringSetsResult()
    {
        $this->subject->setResult('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'result',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPersonReturnsInitialValueForPerson()
    {
    }

    /**
     * @test
     */
    public function setPersonForPersonSetsPerson()
    {
    }
}
