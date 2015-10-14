<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

$strReturn .= '<div class="breadcramp col_padlr_20 clear_fix">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	$strReturn .= '<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a>';
}

$strReturn .= '</div>';

return $strReturn;
