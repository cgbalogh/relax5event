<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CGB.Relax5event',
            'Event',
            [
                'Event' => 'fetchData, new, create, edit, update, delete, show, addEntry',
                'Location' => 'list, new, create, edit, update, delete',
                'Entry' => 'edit, update, delete, sms'
            ],
            // non-cacheable actions
            [
                'Event' => 'fetchData, new, create, edit, update, delete, show, addEntry',
                'Location' => 'list, new, create, edit, update, delete',
                'Entry' => 'edit, update, delete, sms'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    event {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('relax5event') . 'Resources/Public/Icons/user_plugin_event.svg
                        title = LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event
                        description = LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.description
                        tt_content_defValues {
                            CType = list
                            list_type = relax5event_event
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder


$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
  'relax5-icon-event',
  \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
  ['source' => 'EXT:relax5event/Resources/Public/Images/relax-icon-event.png']
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
        wizards.newContentElement.wizardItems.plugins {
            elements {
                event >
            }
        }
        wizards.newContentElement.wizardItems.relax5 {
            elements {
                event {
                    icon >
                    iconIdentifier = relax5-icon-event
                    title = LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.ce
                    description = LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.description.ce
                    tt_content_defValues {
                        CType = list
                        list_type = relax5event_event
                    }
                }
            }
            show = *
        }
   }'
);