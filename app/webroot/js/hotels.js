/**
 * Hotels
 *
 * for HotelsController
 */
var Hotels = {};

/**
 * functions to execute when document is ready
 *
 * only for HotelsController
 *
 * @return void
 */
Hotels.documentReady = function() {
    Hotels.filter();
    Hotels.addMeta();
    Hotels.removeMeta();
}

/**
 * Submits form for filtering Hotels
 *
 * @return void
 */
Hotels.filter = function() {
    $('.hotels div.actions a.filter').click(function() {
        $('.hotels div.filter').slideToggle();
        return false;
    });

    $('#FilterAddForm div.submit input').click(function() {
        $('#FilterAddForm').submit();
        return false;
    });

    $('#FilterAdminIndexForm').submit(function() {
        var filter = '';
		var q='';
		
        // type
        if ($('#FilterType').val() != '') {
            filter += 'type:' + $('#FilterType').val() + ';';
        }

        // status
        if ($('#FilterStatus').val() != '') {
            filter += 'status:' + $('#FilterStatus').val() + ';';
        }

        // promoted
        if ($('#FilterPromote').val() != '') {
            filter += 'promote:' + $('#FilterPromote').val() + ';';
        }
        
        //query string
        if($('#FilterQ').val() != '') {
            q=$('#FilterQ').val();
        }
        var loadUrl = Croogo.basePath + 'admin/hotels/index/';
        if (filter != '') {
            loadUrl += 'filter:' + filter;
        }
        if (q != '') {
            if (filter == '') {
                loadUrl +='q:'+q;
            } else {
                loadUrl +='/q:'+q;
            }
        }
        
        window.location = loadUrl;
        return false;
    });
}

/**
 * add meta field
 *
 * @return void
 */
Hotels.addMeta = function() {
    $('a.add-meta').click(function() {
        $.get(Croogo.basePath+'admin/hotels/add_meta/', function(data) {
            $('#meta-fields div.clear').before(data);
            $('div.meta a.remove-meta').unbind();
            Hotels.removeMeta();
        });
        return false;
    });
}

/**
 * remove meta field
 *
 * @return void
 */
Hotels.removeMeta = function() {
    $('div.meta a.remove-meta').click(function() {
        var aRemoveMeta = $(this);
        if (aRemoveMeta.attr('rel') != '') {
            $.getJSON(Croogo.basePath+'admin/hotels/delete_meta/'+$(this).attr('rel')+'.json', function(data) {
                if (data.success) {
                    aRemoveMeta.parents('.meta').remove();
                } else {
                    // error
                }
            });
        } else {
            aRemoveMeta.parents('.meta').remove();
        }
        return false;
    });
}

/**
 * Create slugs based on title field
 *
 * @return void
 */
Hotels.slug = function() {
    $("#HotelTitle").slug({
        slug:'slug',
        hide: false
    });
}

/**
 * document ready
 *
 * @return void
 */
$(document).ready(function() {
    if (Croogo.params.controller == 'hotels') {
        Hotels.documentReady();
        if (Croogo.params.action == 'admin_add') {
            Hotels.slug();
        }
    }
});
