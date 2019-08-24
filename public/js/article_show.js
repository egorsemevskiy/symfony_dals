$(document).ready(function(){
    $('.like--icon').on('click', function(e){
        e.preventDefault();

        var $link = $(e.currentTarget);
        $link.toggleClass("like--not-liked").toggleClass("like--liked");

        $.ajax({
            method: 'POST',
            url: $link.attr('href')
        }).done(function(data){
            $(".like--number").html(data.likes);
        });
    });
});