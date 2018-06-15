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
 * EntryController
 */
class EntryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * entryRepository
     *
     * @var \CGB\Relax5event\Domain\Repository\EntryRepository
     * @inject
     */
    protected $entryRepository = null;

    /**
     * action edit
     *
     * @param \CGB\Relax5event\Domain\Model\Entry $entry
     * @ignorevalidation $entry
     * @return void
     */
    public function editAction(\CGB\Relax5event\Domain\Model\Entry $entry)
    {
        $this->view->assign('entry', $entry);
    }

    /**
     * action initializeUpdate
     * reset default date format
     */
    public function initializeUpdateAction()
    {
        $this->arguments['entry']->getPropertyMappingConfiguration()->forProperty('reminder')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_relax5core_general.datetime_format', 'relax5core'));
    }

    /**
     * action update
     *
     * @param \CGB\Relax5event\Domain\Model\Entry $entry
     * @return void
     */
    public function updateAction(\CGB\Relax5event\Domain\Model\Entry $entry)
    {
        // $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->entryRepository->update($entry);
        $result = \CGB\Relax5core\Service\DivService::objectToArray($entry, '', "entry_{$entry->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5event\Domain\Model\Entry $entry
     * @return void
     */
    public function deleteAction(\CGB\Relax5event\Domain\Model\Entry $entry)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->entryRepository->remove($entry);
        $this->redirect('list');
    }

    /**
     * action sms
     *
     * @param \CGB\Relax5event\Domain\Model\Entry $entry
     * @param \CGB\Relax5event\Domain\Model\Event $event
     * @param string $message
     * @param bool $execute
     * @ignorevalidation $message
     * @ignorevalidation $event
     * @return void
     */
    public function smsAction(
        \CGB\Relax5event\Domain\Model\Entry $entry, 
        \CGB\Relax5event\Domain\Model\Event $event = null, 
        $message = '', 
        $execute = false
    )
    {
        if (! $execute) {
            $this->view->assignMultiple([
                'entry' => $entry,
                'event' => $event,
            ]);
        } else {
            if (! $event) {
                $event = $entry->getEvent();
            }
            
            $force = true;
            if ($event && $entry->getPhone() && (! $entry->getReminder() or $force)) {
                $number = $entry->getPhone();
                $number = '00' . preg_replace("/[^-0-9.0-9]/", "", $number);
        
                $text = $message;
                $text = str_replace('###EVENTNAME###', $event->getName(), $text);
                $text = str_replace('###EVENTDATE###', $event->getDate()->format('d.m.Y \u\m H.i'), $text);
                $text = str_replace('###EVENTLOCATION###', $event->getLocation()->getName() . ' ' . $event->getLocation()->getAddress()->getAddressCompound(), $text);
                $text = str_replace('###REGISTERED###', $entry->getRegistered(), $text);
                $text = str_replace('###NAME###', $entry->getPerson()->getFirstName() . ' ' . $entry->getPerson()->getLastName(), $text);
                $text = str_replace('###LASTNAME###', $entry->getPerson()->getLastName(), $text);
                
                $url = $this->settings['sms'] . 
                    '&nummer=' . $number .
                    '&text=' . urlencode(utf8_decode($text));
                
                $smsSent = \CGB\Relax5event\Service\SmsService::sms($url);
                
                $entry->setResult(utf8_encode($smsSent));
                $entry->setMessage($text);
                if (strpos($smsSent, $number . '...OK') !== false) {
                   $entry->setReminder(new \DateTime);
                }
            }
            
            $this->entryRepository->update($entry);

            $result = \CGB\Relax5core\Service\DivService::objectToArray($entry, '', "entry_{$entry->getUid()}_");
            $result['success'] = 'ok';
            $result['message'] = $message;
            $result['actions'][] = [
                'jQcmd' => 'execFN',
                'jQdata' => 'modalMessageInvoke("SMS", "Ihre Nachricht wurde gesendet!", "Ok");',
            ];
            return json_encode($result);
        }
    }
}
