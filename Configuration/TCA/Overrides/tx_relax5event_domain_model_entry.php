<?php
$GLOBALS['TCA']['tx_relax5event_domain_model_entry']['ctrl']['label'] = 'person';
$GLOBALS['TCA']['tx_relax5event_domain_model_entry']['ctrl']['hideTable'] = true;

$GLOBALS['TCA']['tx_relax5event_domain_model_entry']['types']['1'] = ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, registered, participants, phone, email, reminder, message, result'];

$GLOBALS['TCA']['tx_relax5event_domain_model_entry']['columns']['event'] = 
    [
        'exclude' => true,
        'label' => 'LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_entry.event',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tx_relax5event_domain_model_event',
            'minitems' => 0,
            'maxitems' => 1,
            'appearance' => [
                'collapseAll' => 0,
                'levelLinksPosition' => 'top',
                'showSynchronizationLink' => 1,
                'showPossibleLocalizationRecords' => 1,
                'showAllLocalizationLink' => 1
            ],
        ],
    ];