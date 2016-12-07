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
    console.log('loaction is: ' + location);
    var cur_url = '/' + location.split('/').pop();
    console.log('cur_url is: ' + cur_url);

    $('#sidebar li').each(function () {

        var link = $(this).find('a').attr('href');
        console.log('link is: ' + link);

        if(location == link) $(this).addClass('active');

    });

});
