/**
 *
 * Created by Misha on 02.12.2016.
 */

$navbarPhone = $(".navbar-phone")
$navbarPhone.on('mouseover', function(){
    $contactsBubble = $(".contacts-bubble");
    $contactsBubble.css('top', '60px');


    $contactsBubble.show();
});
$navbarPhone.on('mouseout', function(){
    $(".contacts-bubble").hide();
});