<?php
namespace CGB\Relax5event\Controller;

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
 * LocationController
 */
class LocationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * locationRepository
     *
     * @var \CGB\Relax5event\Domain\Repository\LocationRepository
     * @inject
     */
    protected $locationRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $locations = $this->locationRepository->findAll();
        $this->view->assign('locations', $locations);
    }

    /**
     * action show
     *
     * @param \CGB\Relax5event\Domain\Model\Location $location
     * @return void
     */
    public function showAction(\CGB\Relax5event\Domain\Model\Location $location)
    {
        $this->view->assign('location', $location);
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
     * @param \CGB\Relax5event\Domain\Model\Location $newLocation
     * @return void
     */
    public function createAction(\CGB\Relax5event\Domain\Model\Location $newLocation)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->locationRepository->add($newLocation);

        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5event\Domain\Model\Location $location
     * @ignorevalidation $location
     * @return void
     */
    public function editAction(\CGB\Relax5event\Domain\Model\Location $location)
    {
        $this->view->assign('location', $location);
    }

    /**
     * action update
     *
     * @param \CGB\Relax5event\Domain\Model\Location $location
     * @return void
     */
    public function updateAction(\CGB\Relax5event\Domain\Model\Location $location)
    {
        // $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->locationRepository->update($location);
        $result = \CGB\Relax5core\Service\DivService::objectToArray($location, '', "location_{$location->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5event\Domain\Model\Location $location
     * @return void
     */
    public function deleteAction(\CGB\Relax5event\Domain\Model\Location $location)
    {
        // $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->locationRepository->remove($location);
        $result['success'] = 'ok';
        return json_encode($result);
    }
}
