(function($, undefined) {

var Topbar = function() {
    var self                            = this;
    var topbar                          = null;
    var content                         = '';

    self.setupTopbar = function() {
        $('#content').prepend('<div id="mw-writh-topbar"></div>');
        topbar                          = $('#mw-writh-topbar');
    };

    self.getContent = function() {
        $.ajax({
            url                         : mw.config.get('wgArticlePath').replace('$1', 'MediaWiki:Topbar?action=render'),
            success : function(data) {
                console.log(data);
            }
        });
    };

    $(document).ready(self.getContent);
};

new Topbar();
})(jQuery);