<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,date,description,max_participants,min_participants,location_text,location,entries',
        'iconfile' => 'EXT:relax5event/Resources/Public/Icons/tx_relax5event_domain_model_event.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, date, description, max_participants, min_participants, location_text, location, entries',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, date, description, max_participants, min_participants, location_text, location, entries, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_relax5event_domain_model_event',
                'foreign_table_where' => 'AND tx_relax5event_domain_model_event.pid=###CURRENT_PID### AND tx_relax5event_domain_model_event.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.date',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'datetime',
                'default' => time()
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            'defaultExtras' => 'richtext:rte_transform'
        ],
        'max_participants' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.max_participants',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'min_participants' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.min_participants',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'location_text' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.location_text',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'location' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.location',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_relax5core_domain_model_address',
                'foreign_field' => 'event',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
        'entries' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5event/Resources/Private/Language/locallang_db.xlf:tx_relax5event_domain_model_event.entries',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_relax5event_domain_model_entry',
                'foreign_field' => 'event',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
    
    ],
];
