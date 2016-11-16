<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsModifierCompiler
 */

/**
 * Smarty Person modifier plugin
 *
 * Type:     modifier<br>
 * Name:     Person<br>
 * Purpose:  designate Person value for empty variables
 *
 * @link http://www.smarty.net/manual/en/language.modifier.Person.php Person (Smarty online manual)
 * @author Uwe Tews
 * @param array $params parameters
 * @return string with compiled code
 */
function smarty_modifiercompiler_default ($params, $compiler)
{
    $output = $params[0];
    if (!isset($params[1])) {
        $params[1] = "''";
    }
    
    array_shift($params);
    foreach ($params as $param) {
        $output = '(($tmp = @' . $output . ')===null||$tmp===\'\' ? ' . $param . ' : $tmp)';
    }
    return $output;
}

?>