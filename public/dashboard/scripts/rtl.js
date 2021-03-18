$('document').ready(function(){
    var url = window.location.href;
    var filename = url.substr(url.lastIndexOf("/"))
    $('li a').each(function(){
        var href = $(this).attr('href').substr($(this).attr('href').lastIndexOf("/"));
        if(href == filename)
        $(this).addClass('mm-active')
    })

})