<?php
/**
 * Smarty Plugin
 *
 * @package Smarty
 * @subpackage PluginsFilter
 */

/**
 * Smarty htmlspecialchars variablefilter Plugin
 *
 * @param string                   $source input string
 * @param Smarty_Internal_Template $smarty Smarty object
 * @return string filtered output
 */
function smarty_variablefilter_htmlspecialchars($source, $smarty)
{
    return htmlspecialchars($source, ENT_QUOTES, SMARTY_RESOURCE_CHAR_SET);
}

?>