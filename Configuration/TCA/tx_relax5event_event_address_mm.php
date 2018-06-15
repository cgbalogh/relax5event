<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}
return array(
	'ctrl'      => array(
		'title'     => 'Relation table',
		'label' => 'uid_foreign',
		'hideTable' => TRUE,
		'sortby'    => 'sorting',
	),
	'columns'   => array(
		'uid_local' => Array(
			'label'  => 'Event',
			'config' => Array(
				'type'          => 'select',
				'foreign_table' => 'tx_relax5event_domain_model_event',
				'size'          => 1,
				'minitems'      => 0,
				'maxitems'      => 1,
			),
		),
		'uid_foreign'   => Array(
			'label'  => 'Location',
			'config' => Array(
				'type'                => 'select',
                'items'               => [['',0]],
				'foreign_table'       => 'tx_relax5core_domain_model_address',
				'foreign_table_where' => ' AND sys_language_uid IN (0,-1) AND tx_relax5core_domain_model_address.pid = ###CURRENT_PID###',
				'size'                => 1,
				'minitems'            => 0,
				'maxitems'            => 1,
			),
		),
	),
	'types'     => array(
		'0' => array('showitem' => 'uid_local,uid_foreign')
	),
	'palettes'  => array()
);