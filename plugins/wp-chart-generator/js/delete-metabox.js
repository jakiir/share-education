jQuery(document).ready(function ($) {

    var busy = null;

    jQuery('#wp-chart-deletefield a').on( 'click',function( event ){
        var $current = $(this);
        event.preventDefault();
        if(busy){
            busy.abort();
        }

        busy = $.ajax({
          	type: "POST",
            url: $('#admin-ajax-url').val(),
            data: { 
              	action : 'nowdeletemeta', 
               	nonce : $('#wpchartgenerator_nonce').val(),
                postid : $('#post_id_chart').val(),
                datacount : $('#wpchart_countdata').val(),
                iddonnee : $(this).parent().parent().parent().attr('id')
            },
            beforeSend: function() {
               // $('.ajax-loader').show();
            },
            success: function( response ) {
            //alert(response);
            //$current.parent().parent().parent().remove();
            //$('#wpchart_countdata').val($('#wpchart_countdata').val()-1);
            location.reload();
            }
        });
    });
    return false;
});