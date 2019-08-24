$(document).ready(function(){
    $('.like--icon').on('click', function(e){
        e.preventDefault();

        var $link = $(e.currentTarget);
        $link.toggleClass("like--not-liked").toggleClass("like--liked");

        $(".like--number").html("test");
    });
});