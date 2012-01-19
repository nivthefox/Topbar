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
 * @edited      19th January 2012
 * @version     0.2.0
 */

// Validate entrypoint.
if ( !defined( 'MEDIAWIKI' ) ) {
    die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

/**
 * Sets up the Topbar hooks.
 */
class TopbarHooks {

    /**
     * Constructs the TopbarHooks class.
     */
    public function __construct() {
        global $wgHooks;

        // Setup hooks.
        $wgHooks['BeforePageDisplay'][]               = 'TopbarHooks::hookBeforePageDisplay';
    }

    /**
     * Adds the topbar navigation to the page.
     *
     * @static
     * @param &$out         OutputPage  The Page being rendered
     * @param &$skin        Skin        The Skin object that will be used to render the page.
     * @return bool
     */
    public static function hookBeforePageDisplay(&$out, &$skin) {
        wfDebugLog('Topbar', __METHOD__);

        global $wgScriptPath;

        $out->addScriptFile($wgScriptPath . '/extensions/Topbar/js/Topbar.js');
        $out->addStyle($wgScriptPath . '/extensions/Topbar/css/Topbar.css');
        return true;
    }
}