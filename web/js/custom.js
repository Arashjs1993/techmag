
$(document).ready(function(){
    $('.hamburger').click(function(){
        $('nav').toggleClass('active');
        $('.hamburger').toggleClass('Toggle');
    })

    //menu dropdown control
    $('.main-link').each(function(){
        $(this).on('click',function(){
            $(this).find('ul').css('display','block');
            $(this.firstChild).css('border-bottom','3px solid red');
        })
    })
    $('.main-link').each(function(){
        $(this).on('mouseleave',function(){
            $(this).find('ul').css('display','none');
            $(this.firstChild).css('border-bottom','none');
        })
    })
    $('.main-link').each(function(){
        $(this).on('mouseover',function(){
            $(this.firstChild).css('border-bottom','3px solid red');
            $(this).find('ul').css('display','block');
        })
    })
})
