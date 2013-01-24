// global javascript for rare.longnow.org

$(document).ready(function () {
    
    
    
    // The Membership/User Menu has a few tooltips. 
    $("#menu_dashboard_link").tooltip({
        offset: [10,0], 
        position: "bottom center", 
        delay: 20
    });
    $("#menu_newsletters_link").tooltip({
        offset: [10,0], 
        position: "bottom center", 
        delay:20
    });
    $("#menu_clockblog_link").tooltip({
        offset: [10,0], 
        position: "bottom center", 
        delay: 20
    });
            
          
          
          
    // rare navigation fixed to top on scroll
    var raremenu = $('#rare-nav-container');
    
    // set offset
    var rareMenuTop = $(raremenu).offset().top;
    
    var menuClone = $(raremenu).clone().addClass('fixed');
    
    function setRareFixed(){
        if(window.pageYOffset > rareMenuTop) {
            
            if(menuClone.parent().length === 0) {
                menuClone.appendTo($('#rare-nav-container').parent());
                
                // check for wordpress admin bar and adjust fixed position
                $('#rare-nav-container.fixed').css('top', function(index) {
                    return $('#wpadminbar').height();
                });
                
                raremenu.hide(); // hide original menu
                
            }
            
        } else if(menuClone.parent().length > 0) {
            
            menuClone.remove(); // hide clone menu
            raremenu.show(); // show original menu
        }
    }
    
    $(window).bind('scroll', function() {
       setRareFixed(); 
    });
            
            
            
    // hide/show global longnow link
    $('#longmenu-toggle').click(function(e){
                
        e.preventDefault(); // prevents link from firing
        var longmenu = $('#longnow-menu'); // longnow global menu
                
        $(longmenu).slideToggle('slow', function() { // slide the menu
                    
            if($(longmenu).is(':visible')){ // update hide/show link text
                
                $('#longmenu-toggle').html('Hide Longnow.org Menu <i class="ss-icon">&#xEE00;</i>');
                rareMenuTop = $(raremenu).offset().top; // reset rare menu offset for fixed menu position
                
            }else{
                
                $('#longmenu-toggle').html('Show Longnow.org Menu <i class="ss-icon">&#xEE00;</i>');
                rareMenuTop = $(raremenu).offset().top; // reset rare menu offset for fixed menu position
                setRareFixed(); // updates the rare menu incase offset is less than yoffset
            }
                    
        });
                
    });
    
    
    
    // remove link event
    $('a.mute').click(function() { return false; });
    
   
    
    // longphoto toggle size
    
    $('#longphoto-toggle').click(function(e){
                
        e.preventDefault(); // prevents link from firing
        var longphoto = $('#longphoto'); 
                    
        if($(longphoto).height() < 350 ){ // expand

            $("#longphoto").animate({height:815}, 1000, "easeInOutExpo", function() {
                $('#longphoto-toggle').html('<a href=""><i class="ss-icon">&#xF500;</i> Click to Close Full Painting <i class="ss-icon">&#xF500;</i></a>');
                $('#longphoto-description').show('slow');
                rareMenuTop = $(raremenu).offset().top; // reset rare menu offset for fixed menu position
            });
            
        }else{ // contract
            
            $('#longphoto-description').hide('slow');
            $("#longphoto").animate({height:311}, 1000, "easeInOutExpo", function() {
                $('#longphoto-toggle').html('<a href=""><i class="ss-icon">&#xF501;</i> Click to Expand Full Painting <i class="ss-icon">&#xF501;</i></a>');
                rareMenuTop = $(raremenu).offset().top; // reset rare menu offset for fixed menu position
                setRareFixed(); // updates the rare menu incase offset is less than yoffset
            });
        }
            
        
                
    });
    
    
    

    
    // set longphoto size on homepage to expanded
    if ($('body').hasClass('home')) {
        $("#longphoto").delay(2000).animate({height:815}, 1000, "easeInOutExpo", function() {
            $('#longphoto-description').show('slow');
            $('#longphoto-toggle').html('<a href=""><i class="ss-icon">&#xF500;</i> Click to Close Full Painting <i class="ss-icon">&#xF500;</i></a>');
            rareMenuTop = $(raremenu).offset().top; // reset rare menu offset for fixed menu position
        });
    }
    
      
      
});
