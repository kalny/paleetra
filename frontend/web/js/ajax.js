/**
 * Created by anton on 22.02.17.
 */

$(function() {
    $(".flash-message>a").on('click', function(e){
        e.preventDefault();
        $(".flash-message").hide();
    });
});