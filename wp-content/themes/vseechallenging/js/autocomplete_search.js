;(function($){
    $(function() {
        $(".vsee-search-keyword").bind("change paste keyup", function() {
            if ($(this).val()) {
                var data = {
                    action: 'autocomplete_search_user',
                    security : VseeAutocompleteSearchAjax.security,
                    keyword: $(this).val()
                };
                $(".vsee-loading").show();
                $.post(VseeAutocompleteSearchAjax.ajaxurl, data, function(response) {
                    $(".vsee-search-ajax").show();
                    $(".vsee-search-ajax ul").html(response);
                }).done(function() {
                    $(".vsee-loading").hide();
                }).fail(function() {
                    $(".vsee-loading").hide();
                });
            } else {
                $(".vsee-search-ajax ul").html("");
                $(".vsee-search-ajax").hide();
            }
        });
    });
})(jQuery);