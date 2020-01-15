// JavaScript Document
jQuery(document).ready(function(){	
	
	jQuery('#create').on('click', function(){
		
	if (jQuery('#fb').css('display') == 'none')	{
		jQuery('#fb')[0].reset();
		jQuery('#fb').show();
		jQuery('#result_link').show();
		var html_link = '<textarea rows="5" cols="50"></textarea>';
		jQuery('#result_link').append(html_link);
		jQuery('#create').val('Закрыть генератор');
	} else{
		jQuery('#fb').hide();
		//jQuery('#fb')[0].reset();
		jQuery('#result_link').empty();
		jQuery('#result_link').hide();
		jQuery('#create').val('Открыть генератор');
		jQuery('#buttons').hide();
	}
	});
	
	jQuery('#fb').on('keyup change', 'input, select', function(){
	
	var born1 = jQuery("#born1").val();
	var born2 = jQuery("#born2").val();
	var sex = jQuery("#sex option:selected").val();
	var time1 = jQuery("#time1 option:selected").val();
	var param1 = jQuery("#param1 option:selected").val();
	var incl_param1 = jQuery("#incl_param1").val();
	var time2 = jQuery("#time2 option:selected").val();
	var param2 = jQuery("#param2 option:selected").val();
	var incl_param2 = jQuery("#incl_param2").val();
	var time3 = jQuery("#time3 option:selected").val();
	var param3 = jQuery("#param3 option:selected").val();
	var incl_param3 = jQuery("#incl_param3").val();
	var link = 'https://facebook.com/search/';	
	
	if (born1) {link += born1+'/after/users-born/';}
			if (born2) {link += born2 +'/before/users-born/';}
			if (sex  !== 'dnm') {link += sex +'/';}
			if (incl_param1) {link += 'str/'+ incl_param1.replace(/\s/g,"%20")+'/pages-named/'+ param1 +'/';
			if (time1 !== 'prORpa'){link += time1 +'/';}}
			if (incl_param2) {link += 'str/'+ incl_param2.replace(/\s/g,"%20")+'/pages-named/'+ param2 +'/';
			if (time2 !== 'prORpa'){link += time2 +'/';}}
			if (incl_param3) {link += 'str/'+ incl_param3.replace(/\s/g,"%20")+'/pages-named/'+ param3 +'/';
			if (time3 !== 'prORpa'){link += time3 +'/';}}
			link += 'intersect/';
		jQuery('#result_link textarea' ).empty();
		jQuery('#result_link textarea' ).append(link);	
		
	if (link !== 'https://facebook.com/search/' && link !== 'https://facebook.com/search/intersect/')	{
		
		jQuery('#buttons').show();
	} else {
		jQuery('#result_link textarea' ).empty();
		jQuery('#buttons').hide();
	}
		
		
						});
	
	jQuery('#copy_btn').on('click', function(){
		jQuery('#result_link textarea').select();
    	document.execCommand('copy');
			});
	jQuery('#open_btn').on('click', function(){
		var href = jQuery('#result_link textarea').text();
		window.open(href);
		
			}); 
	
	
});
	
