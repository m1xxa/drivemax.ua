/**
 *
 * Created by Misha on 02.12.2016.
 */

$navbarPhone = $(".navbar-phone");
$navbarPhone.on('mouseover', function(){
    $contactsBubble = $(".contacts-bubble");
    $contactsBubble.css('top', '60px');


    $contactsBubble.show();
});
$navbarPhone.on('mouseout', function(){
    $(".contacts-bubble").hide();
});

$(function () {

    var location = window.location.pathname;
    var cur_url = '/' + location.split('/').pop();

    $('#sidebar li').each(function () {

        var link = $(this).find('a').attr('href');

        if(location == link) $(this).addClass('active');

    });

    $('[data-toggle="popover"]').popover();


    $('.add-button-pjax').on('pjax:end', function(){
        $.pjax.reload('#cart-button-pjax');
    });

    $('.change-button-pjax').on('pjax:end', function(){
        $.pjax.reload('#cart-sum-pjax');
    });



});


