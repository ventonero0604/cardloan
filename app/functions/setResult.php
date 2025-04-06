<?php

// データの取得
if (!empty($topData['rankingCardName'])) {
  $ranking1stDataId = isset($topData['rankingCardName'][0]) ? $topData['rankingCardName'][0] : null;
  $ranking2ndDataId = isset($topData['rankingCardName'][1]) ? $topData['rankingCardName'][1] : null;
  $ranking3rdDataId = isset($topData['rankingCardName'][2]) ? $topData['rankingCardName'][2] : null;

  $ranking1stFiltered = array_filter($GLOBALS['cardData'], function ($card) use ($ranking1stDataId) {
    return $card['id'] === $ranking1stDataId;
  });
  $GLOBALS['ranking1stData'] = reset($ranking1stFiltered);

  $ranking2ndFiltered = array_filter($GLOBALS['cardData'], function ($card) use ($ranking2ndDataId) {
    return $card['id'] === $ranking2ndDataId;
  });
  $GLOBALS['ranking2ndData'] = reset($ranking2ndFiltered);

  $ranking3rdFiltered = array_filter($GLOBALS['cardData'], function ($card) use ($ranking3rdDataId) {
    return $card['id'] === $ranking3rdDataId;
  });
  $GLOBALS['ranking3rdData'] = reset($ranking3rdFiltered);
} else {
  $GLOBALS['ranking1stData'] = null;
  $GLOBALS['ranking2ndData'] = null;
  $GLOBALS['ranking3rdData'] = null;
}

// レート表示or星表示のフラグ値を設定
$GLOBALS['displayStar'] = isset($topData['displayStar']) ? $topData['displayStar'] : false;

// ランキングスコアデータの取得
$rankingScoreValues = isset($topData['rankingScoreValue']) && is_array($topData['rankingScoreValue']) ? $topData['rankingScoreValue'] : [];
$GLOBALS['ranking1stScore'] = isset($rankingScoreValues[0]) ? $rankingScoreValues[0] : 0;
$GLOBALS['ranking2ndScore'] = isset($rankingScoreValues[1]) ? $rankingScoreValues[1] : 0;
$GLOBALS['ranking3rdScore'] = isset($rankingScoreValues[2]) ? $rankingScoreValues[2] : 0;


// 銀行ランキングデータの取得
if (!empty($topData['rankingBankCardName'])) {
  $bankRanking1stDataId = isset($topData['rankingBankCardName'][0]) ? $topData['rankingBankCardName'][0] : null;
  $bankRanking2ndDataId = isset($topData['rankingBankCardName'][1]) ? $topData['rankingBankCardName'][1] : null;
  $bankRanking3rdDataId = isset($topData['rankingBankCardName'][2]) ? $topData['rankingBankCardName'][2] : null;

  $bankRanking1stFiltered = array_filter($GLOBALS['cardData'], function ($card) use ($bankRanking1stDataId) {
    return $card['id'] === $bankRanking1stDataId;
  });
  $GLOBALS['bankRanking1stData'] = reset($bankRanking1stFiltered);

  $bankRanking2ndFiltered = array_filter($GLOBALS['cardData'], function ($card) use ($bankRanking2ndDataId) {
    return $card['id'] === $bankRanking2ndDataId;
  });
  $GLOBALS['bankRanking2ndData'] = reset($bankRanking2ndFiltered);

  $bankRanking3rdFiltered = array_filter($GLOBALS['cardData'], function ($card) use ($bankRanking3rdDataId) {
    return $card['id'] === $bankRanking3rdDataId;
  });
  $GLOBALS['bankRanking3rdData'] = reset($bankRanking3rdFiltered);
} else {
  $GLOBALS['bankRanking1stData'] = null;
  $GLOBALS['bankRanking2ndData'] = null;
  $GLOBALS['bankRanking3rdData'] = null;
}

// 銀行ランキングスコアデータの取得
$bankRankingScoreValues = isset($topData['rankingBankScoreValue']) && is_array($topData['rankingBankScoreValue']) ? $topData['rankingBankScoreValue'] : [];
$GLOBALS['bankRanking1stScore'] = isset($bankRankingScoreValues[0]) ? $bankRankingScoreValues[0] : 0;
$GLOBALS['bankRanking2ndScore'] = isset($bankRankingScoreValues[1]) ? $bankRankingScoreValues[1] : 0;
$GLOBALS['bankRanking3rdScore'] = isset($bankRankingScoreValues[2]) ? $bankRankingScoreValues[2] : 0;

// 特集orタブテーブルの表示フラグ値を設定
$GLOBALS['displayTabTables'] = isset($topData['displayTabTables']) ? $topData['displayTabTables'] : false;

// ランキングスコアデータの取得


// 0~3の引数を受け取って、それに応じたアイコンを返す
function getIconByType($type)
{
  switch ($type) {
    case 0:
      return '<img src="images/ico_compare_line.svg" alt="">';
    case 1:
      return '<img src="images/ico_compare_circle_double.svg" alt="">';
    case 2:
      return '<img src="images/ico_compare_circle_single.svg" alt="">';
    case 3:
      return '<img src="images/ico_compare_triangle.svg" alt="">';
    default:
      return '<img src="images/ico_compare_line.svg" alt="">';
  }
}
