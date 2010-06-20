$(document).ready(function(){
	$(".deletebut").fadeTo("fast", 0.55);
	$(".editbut").fadeTo("fast", 0.55);
	$(".previewbut").fadeTo("fast", 0.55);

	$(".previewbut").hover(function(){
		$(this).fadeTo("fast", 1);
	});
	$(".previewbut").mouseleave(function(){
		$(this).fadeTo("fast", 0.55);
	});

	$(".editbut").hover(function(){
		$(this).fadeTo("fast", 1);
	});
	$(".editbut").mouseleave(function(){
		$(this).fadeTo("fast", 0.55);
	});

	$(".deletebut").hover(function(){
		$(this).fadeTo("fast", 1);
	});
	$(".deletebut").mouseleave(function(){
		$(this).fadeTo("fast", 0.55);
	});
});
