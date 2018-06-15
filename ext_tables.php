<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'CGB.Relax5event',
            'Event',
            'Relax5event Event'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('relax5event', 'Configuration/TypoScript', 'relax5event');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5event_domain_model_event', 'EXT:relax5event/Resources/Private/Language/locallang_csh_tx_relax5event_domain_model_event.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5event_domain_model_event');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5event_domain_model_entry', 'EXT:relax5event/Resources/Private/Language/locallang_csh_tx_relax5event_domain_model_entry.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5event_domain_model_entry');

    }
);
