<?php
/**
 * __          __   _ _   _                  _
 * \ \        / /  (_) | | |                | |
 *  \ \  /\  / / __ _| |_| |__    _ __   ___| |_
 *   \ \/  \/ / '__| | __| '_ \  | '_ \ / _ \ __|
 *    \  /\  /| |  | | |_| | | |_| | | |  __/ |_
 *     \/  \/ |_|  |_|\__|_| |_(_)_| |_|\___|\__|
 *
 * @author      Kevin Kragenbrink <kevin@writh.net>
 * @created     18th January 2012
 * @edited      18th January 2012
 * @version     0.1.0
 */

// Validate entrypoint.
if ( !defined( 'MEDIAWIKI' ) ) {
    die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

// Setup globals.
$wgTopbarSettings                                           = Array();

/**
 * Stores settings to be used by other Topbar classes.
 */
class TopbarSettings {

    /**
     * Constructs the TopbarSettings class.
     */
    public function __construct() {
        global $wgTopbarSettings;

        foreach ($this->settings AS $key => $value) {
            $this->settings[$key]                           = $wgTopbarSettings[$key] || $value;
        }
    }

    /**
     * Verifies that a setting exists, then sets it.
     * @param   $key        String
     * @param   $value      mixed
     * @throws  Exception
     */
    public function __set($key, $value) {
        if (in_array($key, $this->settings)) {
            $this->settings[$key]                           = $value;
        }
        else {
            throw new Exception("Invalid Topbar setting.");
        }
    }

    /**
     * Returns a setting.
     * @param   $key        String
     * @return  mixed
     */
    public function __get($key) {
        return $this->settings[$key];
    }

    private $settings = array(

    );
}