$(document).ready(function(){
	$('.zoom').mouseenter(function(){
		//$(this).fadeTo('fast', 0.25);
		//$(this).animate({width:"150px",height:"150px",left:"-25px",top:"-25px"}, 400);
	});
	$('.zoom').mouseleave(function(){
		//$(this).fadeTo('fast', 1);
		//$(this).animate({width:"100px",height:"100px",left:"+25px",top:"+25px"}, 100);
	});
	$('.zoom').click(function(){
		//$(this).fadeTo('fast', 1);
		//$(this).animate({width:"150px",height:"150px",left:"-25px",top:"-25px"}, 400);
	});
	$("img").click(function(){   
		var img = $(this);  
		var src = img.attr('src'); 
		$("body").append("<div class='popup' style='position: fixed;'>"+
			"<div class='popup_bg'></div>"+
			"<img style='max-width: 400px; margin-top: 100px;' src='"+src+
			"' class='popup_img' />"+
			"</div>");
		$(".popup").fadeIn(800); 
		$(".popup_bg").click(function(){  
			$(".popup").fadeOut(800);  
			setTimeout(function() {  
				$(".popup").remove(); 
			}, 800);
		});
	});
});