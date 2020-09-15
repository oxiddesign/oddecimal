<?php
/*
//(C) OXID-Design 2020
//
// The source contained in this file is the property of the OXID-Design
// (Leipziger Allee 36, 76139 Karlsruhe, Germany, www.oxid-design.com).
//
// This software is protected by copyright law - it is NOT freeware.
//
// Any unauthorized use of this software is prohibited and will be
// prosecuted by civil and criminal law.
*/
$sMetadataVersion = '1.1';
$aModule = array(
    'id'          => 'oddecimal',
    'title'       => 'Preis mit 4 Nachkommastellen',
    'description' => array(
        'de' => 'Preis mit 4 Nachkommastellen',
        'en' => 'Price with 4 decimal places',
    ),
    'thumbnail'   => 'out/img/logo.png',
    'version'     => '1.0.0',
    'author'      => 'Rafig',
    'email'       => 'info@oxid-design.com',
    'url'         => 'https://www.oxid-design.com',
    'extend'      => array(
        'oxutilsview' => 'oxiddesign/oddecimal/core/oddecimal_utilsview',
        'oxlang'  => 'oxiddesign/oddecimal/core/oddecimal_lang'
    ),
    'files'       => array(),
    'events'      => array(),
    'blocks'      => array(),
    'templates'   => array(),
    'settings'    => array()
);
