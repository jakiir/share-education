jQuery(function($) {
     $('.button-add-wp-chart-groupfield a').on('click',function(){
     	var number = $('.wp-chart-groupfield').length + 1;
     	var donnee = "<div class='wp-chart-groupfield' id="+number+"><div class='wp-chart-titlefield'>"+objectL10n.DonneeT+" "+number+"<span id='wp-chart-deletefield'><a href='#''>"+objectL10n.supprimerT+"</a></span></div><div class='line'><label for='wpchartgenerator_legende_"+number+"'>"+objectL10n.LegendeT+"</label><input type='text' id='wpchartgenerator_legende_"+number+"' name='wpchartgenerator_legende_"+number+"' style='width:100%;'></div><div class='line'><label for='wpchartgenerator_value_"+number+"'>"+objectL10n.valeurT+"</label><input type='number' id='wpchartgenerator_value_"+number+"' name='wpchartgenerator_value_"+number+"' style='width:100%;'></div><div class='line'><label for='wpchartgenerator_color_"+number+"'>"+objectL10n.couleurT+"</label><input value='#000000'class='color-picker' type='text' id='wpchartgenerator_color_"+number+"' name='wpchartgenerator_color_"+number+"' style='width:100%;'></div></div>";
     	$(donnee).hide().appendTo(".data-content").fadeIn(400);
     	$('#wpchart_countdata').val(number);
        $("#"+number+" .color-picker").spectrum({
            showInitial: true,
            showButtons: false,
            preferredFormat: "hex",
            showInput:true
        });
        jQuery('#wp-chart-deletefield a').on( 'click',function( event ){
            event.preventDefault;
            var current = $(this).parent().parent().parent();
            $(current).fadeOut(400, function() { $(current).remove(); });
            return false;
        });
     	return false
     });

     $('#wpchart_countdata').val($('.wp-chart-groupfield').length);

     $(".color-picker").spectrum({
        showInitial: true,
        showButtons: false,
        preferredFormat: "hex",
        showInput: true
    });

    $('a.wpchart-copyshortcode').zclip({
		path:'http://www.steamdev.com/zclip/js/ZeroClipboard.swf',
		copy:$('#wpchartgenerator_shortcode').text(),
		afterCopy:function(){
			$(this).text(objectL10n.copieokT).fadeIn(800);
            setTimeout(function() {
                $('a.wpchart-copyshortcode').text(objectL10n.copieT);
            }, 1000);
		}
	});
});