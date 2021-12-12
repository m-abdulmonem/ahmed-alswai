$(function () {

	
	$(".carousel-item img").height($(window).height());
	$(".carousel-item img").width($(window).width());

	/*
	 * Our Projects Section
	 */
	 $(".list ul li").click(function(){
	 	$(this).addClass("active").siblings().removeClass("active");
	 });
	

	$("button.btn-menu").click(function(){
		$(".menu ul").toggleClass("border-top");//.slideToggle(300);
		$(".header .menu ul li").toggleClass("show-menu");
	});






	// Trigger Plugins

	$("html").niceScroll({
        cursorcolor: "#da514e",
		background: "#32373D",
        cursorwidth: '8px',
        cursorborder: "none",
        cursorborderradius:0
	});

	/*
	 * Auth Filtering
	 */
	$(".user-input").blur(function(){
		if ($(this).val() === "") {
			$(this).addClass("error-form");
			$(".user").addClass("error-label");
			$(".user").html("Username Can Not Be Empty");
		} else{
			$(this).removeClass("error-form");
			$(".user").removeClass("error-label");
		}
	});
	$(".pass-input").blur(function(){
		if ($(this).val() === "") {
			$(this).addClass("error-form");
			$(".pass").addClass("error-label");
			$(".pass").html("Password Can Not Be Empty");
		} else{
			$(this).removeClass("error-form");
			$(".pass").removeClass("error-label");
		}
	});
	
	$(".login").click(function(){
		if ($(".user-input").val() === "" && $(".pass-input").val() === "") {
			$(".text-errors").addClass("errors-style").html("Sorry! You Can Not Left Fields Empty");
			// $(".text-errors")
			$(".user-input").addClass("error-form");
			$(".pass-input").addClass("error-form");
		} 
	});
	/**
	 * Language toogle
	 */
	$("lang").click(function () {
		var param = $(this).attr('id');
		MA_Ajax('/ajax/lang/'+param);
    });


    // Slider
    (function autoSlider() {

    	$(".testim .active").each(function () {
    		if (!$(this).is(":last-child")){
    			$(this).delay(3000).fadeOut(1000,function () {
    				$(this).removeClass('active').next().addClass('active').fadeIn();
    				autoSlider();
                });
			} else{
    			$(this).delay(3000).fadeOut(1000,function () {
					$(this).removeClass("active");
					$('.testim div').eq(0).addClass('active').fadeIn();
					autoSlider();
                });
			}
        });

    }());


});

/**
 * Loader Trigger
 */
var myVar;
function loader() {
	myVar = setTimeout(showPageContent,3000);
}

function showPageContent() {
    $(".loader").addClass("display-none");
    $(".loader-content").addClass("display-block");
    $(".loader-content").removeClass("display-none");
}

function MA_Ajax(MA_url) {
    var xmlhttp = xmlHttp();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState===4 && xmlhttp.status===200) {
            var MA_result =  xmlhttp.responseText;
			var w = window.location.href = window.location.href;
        }
    }
    xmlhttp.open("GET",MA_url,true);
    xmlhttp.send();
}


function xmlHttp() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
}