<?php
$cardDataFile = './data/cardData.json';
$pageDataFile = './data/pageData.json';

$cardData = file_exists($cardDataFile) ? json_decode(file_get_contents($cardDataFile), true) : [];
$pageData = file_exists($pageDataFile) ? json_decode(file_get_contents($pageDataFile), true) : [];

$GLOBALS['cardData'] = $cardData;
$GLOBALS['pageData'] = $pageData;
