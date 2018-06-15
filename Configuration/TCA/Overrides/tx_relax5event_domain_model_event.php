<?php
$GLOBALS['TCA']['tx_relax5event_domain_model_event']['columns']['entries']['config']['appearance']['collapseAll'] = true;
$GLOBALS['TCA']['tx_relax5event_domain_model_event']['columns']['entries']['config']['appearance']['expandSingle'] = true;

$GLOBALS['TCA']['tx_relax5event_domain_model_event']['columns']['location'] = [
    'exclude' => 1,
    'label' => 'LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.location',
    'config' => [
        'appearance'       => array(
            'collapseAll'     => TRUE,
            'expandSingle'    => TRUE,
            'useCombination'  => 1,
            'useSortable'     => TRUE,
            'enabledControls' => array(
                'info',
                'new',
                'dragdrop',
                'sort',
                'hide',
                'delete',
                'localize'
            ),
        ),
        'type' => 'inline',
        'foreign_table' => 'tx_relax5event_event_address_mm',
        'foreign_field' => 'uid_local',
        'foreign_label' => 'uid_foreign',
        'foreign_selector' => 'uid_foreign',
        'foreign_unique' => 'uid_foreign',
        'foreign_sortby' => 'sorting',
        'maxitems' => 5
    ],
];
