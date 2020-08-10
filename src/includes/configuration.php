<?php

/**
 * @file Loads the configuration into global variables.
 *
 * The value for each option are loaded from:
 *
 * - a list of default values
 * - a config file in the form of a PHP file, if it exists.
 * - environment variables.
 *
 * This is to ease the development within a Docker container, but also the deployment on a simple Apache host.
 *
 * For the list of variables set, see in the body of the load_default_options function.
 */

/**
 * Sets a configuration option from an environment variable, if set.
 * @param $key Name of the environment variable to read - and also name of the global variable it will set.
 */
function set_var_from_env_if_set($key)
{
    $value = getenv($key);
    if ($value !== false) {
        $GLOBALS[$key] = $value;
    }
}

/**
 * Joins a path.
 *
 * @param $dir Directory name
 * @param $file File name
 */
function join_path($dir, $file)
{
    $result = $file;
    if ($dir !== '') {
        $result = $dir . '/' . $file;
    }
    return $result;
}

/**
 * Loads the default configuration options.
 */
function load_default_options()
{
    $GLOBALS['CONFIG_MYSQL_DATABASE'] = 'appartmentmanagement';
    $GLOBALS['CONFIG_MYSQL_HOST'] = 'localhost';
    $GLOBALS['CONFIG_MYSQL_PASSWORD'] = 'abc123...';
    $GLOBALS['CONFIG_MYSQL_PORT'] = '3306';
    $GLOBALS['CONFIG_MYSQL_USER'] = 'root';
    $GLOBALS['CONFIG_WEBSITE_ROOT_URL'] = 'http://localhost/appartmentmanagementsystem/';
    
}
/**
 * Checks if a string starts with a given pattern.
 */
function string_starts_with($string, $pattern)
{
    return substr($string, 0, strlen($pattern)) === $pattern;
}

/**
 * Returns an array with all configuration options.
 */
function get_configuration_options()
{
    $ret = array();

    foreach ($GLOBALS as $k => $val) {
        if (string_starts_with($k, 'CONFIG')) {
            // error_log(__FILE__ . ': ' . $k . "=" . $val);
            $ret[$k] = $val;
        }
    }
    return $ret;
}

/**
 * Loads all custom environement variables, if they are set.
 */
function load_custom_env_vars_if_set()
{
    $all = get_configuration_options();
    $keys = array_keys($all);
    foreach ($keys as $k) {
        set_var_from_env_if_set($k);
    }
}

/**
 * Loads all the configuration options for this Web site.
 *
 * Loads, in that order: (the last value found overrides the other ones)
 * - default values
 * - custom.config.php file
 * - environment variables, if set.
 */
function load_config_options($custom_config_file = 'custom.config.php')
{
    static $is_loaded = false;
    if ($is_loaded === true) {
        error_log(__FILE__ . ': Already loaded the config options');
        return;
    }
    // 1) Load the default values:
    load_default_options();

    // 2) Load the custom values from custom.config.php:
    $prefix = dirname(__DIR__);
    $full_path_to_custom = join_path($prefix, $custom_config_file);
    error_log(__FILE__ . ': custom config file: ' . $full_path_to_custom);
    if (file_exists($full_path_to_custom)) {
        error_log(__FILE__ . ': Loading custom config from file ' . $full_path_to_custom);
        // Override the globals with the ones set in that file:
        require_once $full_path_to_custom;
    } else {
        error_log(__FILE__ . ': Not loading custom config from file ' . $full_path_to_custom);
    }

    // 3) Load the environment variables, if set:
    load_custom_env_vars_if_set();
    $is_loaded = true;
}

/**
 * Prints all our configuration options.
 */
function print_configuration_options()
{
    $options = get_configuration_options();
    echo ("<h1>Configuration options:</h1>\n");
    echo ("<ul>\n");
    foreach ($options as $k => $val) {
        printf("<li>%0s: %0s</li>", $k, $val);
    }
    echo ("</ul>\n");
    echo ("</div>\n");
}

// Now, let's load the configuration options:
load_config_options();