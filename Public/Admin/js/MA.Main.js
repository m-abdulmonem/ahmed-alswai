/**
 * Created by Mohamed Abdo on 05/28/2017.
 */

var buttonDelete = document.createElement("button-delete");
var deleteSocial = document.createElement("belete-social");
buttonDelete.addEventListener("click",function () {});
deleteSocial.addEventListener('click',function () {});
// Trigger Jquery Plugins
$(function () {
    'use strict';
    /**
     * Init Jquery Plugin
     */

    /**
     * Web Text Editor Plugin
     *
     * For Easy Paragraph Write
     */
   $('.text-area').froalaEditor({
       language: 'ar',
       height: 600,
       codeBeautifierOptions: {
           end_with_newline: true,
           indent_inner_html: true,
           extra_liners: "['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'blockquote', 'pre', 'ul', 'ol', 'table', 'dl']",
           brace_style: 'expand',
           indent_char: ' ',
           indent_size: 4,
           wrap_line_length: 0
       }
   });
    /**
     * Trigger SlimScroll Plugin
     *
     * For Change Scroll Down To Nice Scroll Down
     */
    $(".slimscroll-noti").slimScroll({
        position: 'left',
        size: "5px",
        color: '#98a6ad',
        height: '230px',
        wheelStep: 10
    });


    $(".picture").change(function () {
        readURL(this);
    });
    $('.images').change(function () {
        showMyImage(this);
    });
    $(".pass").hide();
    $(".clicked-pass").keydown(function () {
        if ($(".clicked-pass").val().length > 1){
            $(".pass").show();
        }
    });


    $(".btn-upload").hide();

    $('.lock').click(function () {

        ajax('/auth/lock-session',"redirect",'/auth/lock-screen')

    });




    var bool = $("input[type=bool]");
    bool.keyup(function () {
        var val = bool.val();
        if (val === "true" || val === "false")
            bool.css({
                "border":"1px solid #E3E3E3",
                "color":"inherit"
            });
        else{
            bool.css({
                "border":"1px solid red",
                "color":"red"
            })
        }
    });




   $(".bootstrap-tagsinput input").on("focus",function () {

       $(".settings-edit").keypress(function (ev) {
           var p = ev.which;
           if (p === 13){
               return false;
           }
       });

   });

    /**
     * Jquery Functions
     */

    $.fn.jAjax = function (url,data,result) {
        var ladda = $(this).ladda();
        ladda.ladda('start');
        $.ajax({
            type:"POST",
            url: url,
            data: data,
            success: function (response) {
                ladda.ladda('stop');
                if (result === "reload"){
                    location.reload = window.location.href;
                } else if (result === "redirect"){
                    window.location.href = redirect
                } else if(result === "log"){
                    console.log(response)
                } else if (result === "alert"){
                    alert(response);
                    location.reload();
                }
            }
        })
    }


});


/**
 * Ajax Methods Delete & Approve & Block
 */
$(function () {

    /**
     * Users Controller Ajax Methods
     */
    $("delete").click(function () {
        var data = {
            id:$(this).attr('id'),
            user:$(this).attr('user')
        };
        if (confirm("هل انت متأكد من حذف [ " + data.user + " ]"))
            $(this).jAjax("/admin/users/remove/",data,'alert');
    });
    $(".close").click(function () {
        var session = $(this).attr('session');
        if ($("form").hasEventListener('keyup')){
            if (confirm('هناك تغيرات لم يتم حفظها هل انت متأكد من انك تريد الإستمرار')){
                ajax("/ajax/remove-add-session" + session,'reload');
            }
        }
    });
    $("approve").click(function () {
        var id = $(this).attr('id');
        ajax('/admin/users/approve/' + id,'alert')
    });
    $("block").click(function () {
        var id = $(this).attr('id');
        var user = $(this).attr('user');
        if (confirm("هل انت متأكد من حظر ["  + user +"]")){
            ajax('/admin/users/block/'+id,'alert')
        }
    });
    $("unblock").click(function () {
        var id = $(this).attr("id");
        ajax("/admin/users/unblock/" + id,'alert');
    });
    $("resend").click(function () {
        var id = $(this).attr("id");
        ajax("/admin/users/resend/" + id,'alert');
    });


    /**
     * Pages Admin Controller
     */
    $('delete-page').click(function () {
        var data = {
            id: $(this).attr('id'),
            title:$(this).attr('user')
        };
        if (confirm("هل انت متأكد من حذف [ " + data.title + " ]")){
            $(this).jAjax('/admin/pages/remove/',data,'alert')
        }
    });

    /**
     * Settings Admin Controller
     */
    $('delete-social').click(function () {
        var data = {
          id: $(this).attr('id'),
          title:$(this).attr('user')
        };
        $(this).jAjax('/admin/settings/delete-social/',data,'alert');
    });


    /**
     * Admin Posts Controller Query
     */
    $(".status-edit").click(function () {
        var option = $(".status-option");

        if (option.hasClass("display")){
            $(this).text("Edit");
            option.removeClass("display");
        } else{
            $(this).text("Cancel");
            option.addClass("display");
        }

    });

    $(".visible-edit").click(function () {
        var option = $(".visible-option");

        if (option.hasClass("display")){
            $(this).text("Edit");
            option.removeClass("display");
        } else{
            $(this).text("Cancel");
            option.addClass("display");
        }

    });


    $(".visibility-select").change(function () {
        var option = $(".visibility-select");
        if (option.val() === "protected"){
            $(".pass").fadeIn(500,function () {
                $(this).addClass("display");
            });
        } else{
            $(".pass").fadeOut(500,function () {
                $(this).removeClass("display");
                $(this).addClass("none");
            });
        }
    });
    $(".visible-ok").click(function () {
        var select = $(".visibility-select");
        var changed = $(".visibility");
        var defaultVisibility = "Public";
        var option = $(".visible-option");
        var pass =$(".pass");

        if (select.val() !== null) {
            if(pass.val() !== null){
                changed.text(select.val());
            } else{
                changed.text(defaultVisibility);
            }
            if (option.hasClass("display")) {
                option.removeClass("display");
                $(".visible-edit").text("Edit");
            }
        } else {
            changed.text(defaultVisibility);
        }

    });

    $(".publish-edit").click(function () {
        var option = $(".publish-option");

        if (option.hasClass("display")){
            $(this).text("Edit");
            option.removeClass("display");
        } else{
            $(this).text("Cancel");
            option.addClass("display");
        }

    });


    $("ok").click(function () {

        var select = $(".select");
        var changed = $(".changed");
        var text = "Save As Draft";
        if (select.val() !== null){
            changed.attr('value', "Save As " + select.val());
            if ($(".status-option").hasClass("display")){
                $(".status").text(select.val());
                $(".status-option").removeClass("display");
                $("clicked").text("Edit");
            }
        } else{
            changed.attr('value',text);
        }

    });


    $("close").click(function () {
        var status = $(this).attr('status');

        if (status !== 0) {
            if (confirm("هل انت متأكد من إغلاق الموقع")) {
                ajax('/admin/settings/close/' + status, 'alert')
            }
        }
        else {
            ajax('/admin/settings/close/' + status, 'alert')
        }
    });




});


/**
 * JavaScript Functions
 */


$(".slider").hide();

/**
 *
 * @param input
 */
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".slider").show();
            $('.picture').attr('src', e.target.result);
            $(".profile").attr("src", reader.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function showMyImage(fileInput) {
    var files = fileInput.files;
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var imageType = /image.*/;
        if (!file.type.match(imageType)) {
            continue;
        }
        var img=document.getElementById("thumbnil");
        img.file = file;
        var reader = new FileReader();
        reader.onload = (function(aImg) {
            return function(e) {
                aImg.src = e.target.result;
            };
        })(img);
        reader.readAsDataURL(file);
    }
}


/**
 * Ajax Function
 * @param url
 * @param result
 * @param redirect
 */
function ajax(url,result,redirect) {

    var ajax = xmlHttp();
    var lodding = Ladda.create( document.querySelector('.ladda-button') ) ;

    ajax.onreadystatechange=function(){

        if (ajax.readyState === 4 && ajax.status === 200){
            lodding.stop();
            var response = ajax.responseText;
            if (result === "reload"){
                location.reload = window.location.href;
            } else if (result === "redirect"){
                window.location.href = redirect
            } else if(result === "log"){
                console.log(response)
            } else if (result === "alert"){
                alert(response);
                location.reload();
            }
            log(response)
        }else{
            lodding.start();
        }
    }
    ajax.open("GET",url,true);
    ajax.send();
}


/**
 *
 * @returns {*}
 */
function xmlHttp() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
}

/**
 *
 * @param data
 */
function log(data) {
    console.log(data);
}

/**
 *
 */
function reload() {
    location.reload();
}

/**
 *
 * @param url
 */
function redirct(url) {
    if (url === "self"){
        reload();
    } else{
        window.location.href = url;
    }
}
