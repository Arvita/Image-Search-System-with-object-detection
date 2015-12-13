/*
	Ajax Loader
*/
var default_content="";

jQuery(document).ready(function() {
//$(".header").delegate("div", "click", function() {
    checkURL();	//check if the URL has a reference to a page and load it
    $('ul.nav li a').live('click',function(){ 
            checkURL(this.hash);	//.. and assign them a new onclick event, using their own hash as a parameter (#page1 for example)
    });
    setInterval("checkURL()",250);	//check for a change in the URL every 250 ms to detect if the history buttons have been used

});

var lasturl="";	//here we store the current URL hash

function checkURL(hash)
{
    if(!hash) hash=window.location.hash;	//if no parameter is provided, use the hash value from the current address
    if(hash != lasturl)	// if the hash value has changed
    {
        lasturl=hash;	//update the current hash
        loadPage(hash);	// and load the new page
    }
}

function loadPage(url)	//the function that loads pages via AJAX
{
    url=url.replace('#','');	//strip the #page part of the hash and leave only the page number
    $('#loading').css('visibility','visible');	//show the rotating gif animation
    $.ajax({	//create an ajax request to load_page.php
        type: "POST",
        url: "load_page.php",
        data: 'page='+url,	//with the page number as a parameter
        dataType: "html",	//expect html to be returned
        success: function(msg){
            if(parseInt(msg)!=0)	//if no errors
            {
                $('#pageContent').html(msg);	//load the returned html into pageContet
                $('#loading').css('visibility','hidden');	//and hide the rotating gif
            }
        }
    });
}


/*
    Slider
*/
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
});


/*
    Pretty Photo
*/
$(document).ready(function() {
    $("a[rel^='prettyPhoto']").prettyPhoto({social_tools: true});
});



/*
    Show latest tweets
*/
jQuery(function($) {
    $(".show-tweets").tweet({
        username: "anli_zaimi",
        page: 1,
        count: 10,
        loading_text: "loading ..."
    }).bind("loaded", function() {
        var ul = $(this).find(".tweet_list");
        var ticker = function() {
            setTimeout(function() {
                ul.find('li:first').animate( {marginTop: '-4em'}, 500, function() {
                    $(this).detach().appendTo(ul).removeAttr('style');
                });
                ticker();
            }, 5000);
        };
        ticker();
    });
});



/*
    Contact form
*/
jQuery(document).ready(function() {
    $('.contact-form form').submit(function() {

        $('.contact-form form .nameLabel').html('Name');
        $('.contact-form form .emailLabel').html('Email');
        $('.contact-form form .messageLabel').html('Message');

        var postdata = $('.contact-form form').serialize();
        $.ajax({
            type: 'POST',
            url: 'assets/sendmail.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                if(json.nameMessage != '') {
                    $('.contact-form form .nameLabel').append(' - <span class="violet" style="font-size: 13px; font-style: italic"> ' + json.nameMessage + '</span>');
                }
                if(json.emailMessage != '') {
                    $('.contact-form form .emailLabel').append(' - <span class="violet" style="font-size: 13px; font-style: italic"> ' + json.emailMessage + '</span>');
                }
                if(json.messageMessage != '') {
                    $('.contact-form form .messageLabel').append(' - <span class="violet" style="font-size: 13px; font-style: italic"> ' + json.messageMessage + '</span>');
                }
                if(json.nameMessage == '' && json.emailMessage == '' && json.messageMessage == '') {
                    $('.contact-form form').fadeOut('fast', function() {
                        $('.contact-form').append('<p><span class="violet">Thanks for contacting us!</span> We will get back to you very soon.</p>');
                    });
                }
            }
        });
        return false;
    });
});

