<?php
namespace CGB\Relax5event\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class EventTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5event\Domain\Model\Event
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5event\Domain\Model\Event();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDate()
        );
    }

    /**
     * @test
     */
    public function setDateForDateTimeSetsDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'date',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMaxParticipantsReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getMaxParticipants()
        );
    }

    /**
     * @test
     */
    public function setMaxParticipantsForIntSetsMaxParticipants()
    {
        $this->subject->setMaxParticipants(12);

        self::assertAttributeEquals(
            12,
            'maxParticipants',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMinParticipantsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMinParticipants()
        );
    }

    /**
     * @test
     */
    public function setMinParticipantsForStringSetsMinParticipants()
    {
        $this->subject->setMinParticipants('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'minParticipants',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLocationReturnsInitialValueForAddress()
    {
    }

    /**
     * @test
     */
    public function setLocationForAddressSetsLocation()
    {
    }

    /**
     * @test
     */
    public function getEntriesReturnsInitialValueForEntry()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getEntries()
        );
    }

    /**
     * @test
     */
    public function setEntriesForObjectStorageContainingEntrySetsEntries()
    {
        $entry = new \CGB\Relax5event\Domain\Model\Entry();
        $objectStorageHoldingExactlyOneEntries = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneEntries->attach($entry);
        $this->subject->setEntries($objectStorageHoldingExactlyOneEntries);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneEntries,
            'entries',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addEntryToObjectStorageHoldingEntries()
    {
        $entry = new \CGB\Relax5event\Domain\Model\Entry();
        $entriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $entriesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($entry));
        $this->inject($this->subject, 'entries', $entriesObjectStorageMock);

        $this->subject->addEntry($entry);
    }

    /**
     * @test
     */
    public function removeEntryFromObjectStorageHoldingEntries()
    {
        $entry = new \CGB\Relax5event\Domain\Model\Entry();
        $entriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $entriesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($entry));
        $this->inject($this->subject, 'entries', $entriesObjectStorageMock);

        $this->subject->removeEntry($entry);
    }
}
