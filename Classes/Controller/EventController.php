<?php
namespace CGB\Relax5event\Controller;

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
 * EventController
 */
class EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * eventRepository
     *
     * @var \CGB\Relax5event\Domain\Repository\EventRepository
     * @inject
     */
    protected $eventRepository = null;

    /**
     * locationRepository
     *
     * @var \CGB\Relax5event\Domain\Repository\LocationRepository
     * @inject
     */
    protected $locationRepository = null;

    /**
     * ownerRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\OwnerRepository
     * @inject
     */
    protected $ownerRepository = null;

    /**
     * usergroupRepository
     *
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserGroupRepository
     * @inject
     */
    protected $usergroupRepository = null;

    /**
     * accessControlService
     *
     * @var \CGB\Accessmanager\Service\AccessControlService
     * @inject
     */
    protected $accessControlService = null;

    /**
     * action show
     *
     * @param \CGB\Relax5event\Domain\Model\Event $event
     * @return void
     */
    public function showAction(\CGB\Relax5event\Domain\Model\Event $event)
    {
        $this->view->assignMultiple([
            'event' => $event,
            'feUser' => $this->ownerRepository->findByUid($this->accessControlService->getFrontendUserUid()),
            'feUserUid' => $this->accessControlService->getFrontendUserUid(),
            'feUsergroupUids' => $this->accessControlService->getFrontendUserGroupsOrdered()
        ]);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \CGB\Relax5event\Domain\Model\Event $newEvent
     * @return void
     */
    public function createAction(\CGB\Relax5event\Domain\Model\Event $newEvent)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->eventRepository->add($newEvent);
        return json_encode(['success' => 'ok']);
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5event\Domain\Model\Event $event
     * @ignorevalidation $event
     * @return void
     */
    public function editAction(\CGB\Relax5event\Domain\Model\Event $event)
    {
        $possibleAddresses = $this->locationRepository->findAll();
        $this->view->assignMultiple([
            'event' => $event,
            'possibleAddresses' => $possibleAddresses
        ]);
    }

    /**
     * action initializeUpdate
     * reset default date format
     */
    public function initializeUpdateAction()
    {
        $this->arguments['event']->getPropertyMappingConfiguration()->forProperty('date')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_relax5core_general.datetime_format', 'relax5core'));
    }

    /**
     * action update
     *
     * @param \CGB\Relax5event\Domain\Model\Event $event
     * @return void
     */
    public function updateAction(\CGB\Relax5event\Domain\Model\Event $event)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->eventRepository->update($event);
        $result = \CGB\Relax5core\Service\DivService::objectToArray($event, '', "event_{$event->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5event\Domain\Model\Event $event
     * @return void
     */
    public function deleteAction(\CGB\Relax5event\Domain\Model\Event $event)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->eventRepository->remove($event);
        return json_encode(['success' => 'ok']);
    }

    /**
     * action addEntry
     *
     * @param \CGB\Relax5event\Domain\Model\Event $event
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @return void
     */
    public function addEntryAction(\CGB\Relax5event\Domain\Model\Event $event, \CGB\Relax5core\Domain\Model\Person $person)
    {
        $entry = $this->objectManager->get(\CGB\Relax5event\Domain\Model\Entry::class);
        $entry->setPerson($person);
        $entry->setRegistered(1);
        $entry->setPhone($person->getFirstContact());
        $event->addEntry($entry);
        $this->eventRepository->update($event);
    }

    /**
     * action fetchData
     *
     * @return void
     */
    public function fetchDataAction()
    {

    }
}
