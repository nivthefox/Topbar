(function($, undefined) {

var Topbar = function() {
    var self                            = this;
    var topbar                          = null;
    var content                         = '';

    self.setupTopbar = function() {
        $('#content').prepend('<div id="mw-writh-topbar"></div>');
        topbar                          = $('#mw-writh-topbar');
        topbar.append(content);
    };

    self.getContent = function() {
        $.ajax({
            url                         : mw.config.get('wgArticlePath').replace('$1', 'MediaWiki:Topbar?action=render'),
            success : function(data) {
                data                    = data.replace(/<!--(.*?)-->/gm, null);
                data                    = data.replace(/(\n|\r)/gm, null);

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