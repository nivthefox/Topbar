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
 * @version     0.1.0
 */

(function($, undefined) {

/**
 * Class to create Topbar Navigation in a Mediawiki.
 */
var Topbar = function() {
    var self                            = this;
    var topbar                          = null;
    var content                         = '';

    /**
     * Adds the Topbar into the Mediawiki and inserts the content.
     */
    self.setupTopbar = function() {
        $('#content').prepend('<div id="mw-writh-topbar" class="clearfix"></div>');
        topbar                          = $('#mw-writh-topbar');
        topbar.append('<span class="mw-writh-glass">' + content + '</span>');
    };

    /**
     * Retrieves the content from Mediawiki:Topbar and cleans it up before calling setup.
     */
    self.getContent = function() {
        $.ajax({
            url                         : mw.config.get('wgArticlePath').replace('$1', 'MediaWiki:Topbar?action=render'),
            success : function(data) {
                data                    = data.replace(/<!--(.*?)-->/gm, '');
                data                    = data.replace(/(\n|\r)/gm, '');

                if (data.length > 0) {
                    content             = data;
                    self.setupTopbar();
                }
            }
        });
    };
    $(document).ready(self.getContent);
};

new Topbar();
})(jQuery);
