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

/**
 * Sets up the Topbar hooks.
 */
class TopbarHooks {

    /**
     * Constructs the TopbarHooks class.
     */
    public function __construct() {
        global $wgHooks;

        $wgHooks['SkinTemplateNavigation'][]               = 'TopbarHooks::skinTemplateNavigation';
    }

    public static function skinTemplateNavigation(&$template, &$links) {
        echo '<pre>'; print_r( $template ); print_r( $links); echo '</pre>';
    }
}