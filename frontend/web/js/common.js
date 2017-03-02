/**
 * Created by anton on 02.03.17.
 */

$(document).ready(function () {
    $('.share-button').click(function(e){
        e.preventDefault();
        var link = e.currentTarget;
        var url = $(link).attr('href');
        window.open(url,'','toolbar=0,status=0,width=640,height=480');
    });


    $(".flash-message>a").on('click', function(e){
        e.preventDefault();
        $(".flash-message").hide();
    });

});
