// global javascript for rare.longnow.org

$(document).ready(function () {
    
                    
          
    // rare navigation menu
    var raremenu = $('#rare-nav-container');
    
    // set offset of rare nav menu to page top
    var rareMenuTop = $(raremenu).offset().top;
    
    // clone rare nav menu for fixed menu
    var menuClone = $(raremenu).clone('true, true').addClass('fixed');
    
    // function to set the rare nav menu clone as a fixed menu
    function setRareFixed(){
        
        if(window.pageYOffset > rareMenuTop) { // check if page has scrolled down to original rare nav menu
            
            if(menuClone.parent().length === 0) {
                
                menuClone.appendTo($('#rare-nav-container').parent());
                
                // check for wordpress admin bar and adjust fixed position
                $('#rare-nav-container.fixed').css('top', function(index) {
                    
                    return $('#wpadminbar').height(); // get height of wordpress admin bar to offset fixed menu
                    
                });
                
                raremenu.hide(); // hide original menu
                
            }
            
        } else if(menuClone.parent().length > 0) {
            
            menuClone.remove(); // hide clone menu
            raremenu.show(); // show original menu
        }
    }
    
    
    
    // as page is scrolled down, watch for rare nav menu to hit the top of the viewport
    $(window).bind('scroll', function() {
       setRareFixed(); 
    });
            
            
            
    // hide/show global longnow link
    $('#longmenu-toggle').click(function(e){
                
        e.preventDefault(); // prevents link from firing
        var longmenu = $('#longnow-menu'); // longnow global menu
                
        $(longmenu).slideToggle('slow', function() { // slide the menu
                    
            if($(longmenu).is(':visible')){ // update hide/show link text
                
                $('#longmenu-toggle').html('hide longnow.org menu <i class="ss-icon">&#xED50;</i>');
                rareMenuTop = $(raremenu).offset().top; // reset rare menu offset for fixed menu position
                
            }else{
                
                $('#longmenu-toggle').html('show longnow.org menu <i class="ss-icon">&#xED50;</i>');
                rareMenuTop = $(raremenu).offset().top; // reset rare menu offset for fixed menu position
                setRareFixed(); // updates the rare menu incase offset is less than yoffset
            }
                    
        });
                
    });
    
    
    
    // remove link event for longnow.org disabled menu items
    $('a.mute').click(function() { return false; });
    
   
    
//     expand/contract rare painting   

//     $('#longphoto-toggle').click(function(e){
//                
//        e.preventDefault(); // prevents link from firing
//        var longphoto = $('#longphoto'); // rare painting
//                    
//        if($(longphoto).height() < 350 ){ // expand
//    
//            $("#longphoto").animate({height:815}, 1000, "easeInOutExpo", function() {
//                
//                $('#longphoto-toggle').html('<a href=""><i class="ss-icon">&#xF500;</i> Click to Close Full Painting <i class="ss-icon">&#xF500;</i></a>');
//                $('#longphoto-description').show('slow');
//                $('#longphoto-mission-premise').show('slow');
//                rareMenuTop = $(raremenu).offset().top; // reset rare menu offset for fixed menu position
//                
//            });
//            
//        }else{ // contract
//            
//            $('#longphoto-description').hide('slow');
//            $('#longphoto-mission-premise').hide('slow');
//            
//            $("#longphoto").animate({height:311}, 1000, "easeInOutExpo", function() {
//                
//                $('#longphoto-toggle').html('<a href=""><i class="ss-icon">&#xF501;</i> Click to Expand Full Painting <i class="ss-icon">&#xF501;</i></a>');
//                rareMenuTop = $(raremenu).offset().top; // reset rare menu offset for fixed menu position
//                setRareFixed(); // updates the rare menu incase offset is less than yoffset
//                
//            });
//        }
//            
//     });
    
    
    
    // expanding search box in rare navigation
    rareNavSearch = $('#rare-search input[type=text]');
    
    $(rareNavSearch).live({ // add live so the rare nav clone is watched
        
        "focus":
            
           function() {
           
            $(this).css({ width: '245px' }); // expand search box. transition is css based
            $('#rare-nav-main > li:nth-last-child(2)').animate({ opacity: 0 }, function() { $(this).css('visibility', 'hidden'); }); // fade out and hide link so not clickable
            $('#rare-nav-main > li:last-child').animate({ opacity: 0 }, function() { $(this).css('visibility', 'hidden'); });
            
           },
           
        "blur":
            
           function() {
           
             $(this).css({ width: '45px' }); // contract search box
             $('#rare-nav-main > li:nth-last-child(2)').animate({ opacity: 1 }, function() { $(this).css('visibility', 'visible'); });
             $('#rare-nav-main > li:last-child').animate({ opacity: 1 }, function() { $(this).css('visibility', 'visible'); });
             
           }
           
       }
       
    );
    
    
    // show gone painting key on hover
    $("#painting-key-holder").hover(
        function () {
            $('#painting-key-box').show();
        },
        function () {
            $('#painting-key-box').hide();
        }
    );
        
        
   // home page FAQ accordion
   $('#home-section-6 ul .heading').click(function(e){
       
        e.preventDefault();
        $(this).toggleClass('expanded');
        $(this).closest('li').find('.content').not(':animated').slideToggle('slow');
        
    });
    
    // display image caption on top of image
    $("img.caption").each(function() {
        
        var imageToCaption = this;
        
        // get the caption
        var imageCaption = $(imageToCaption).attr("data-hint");
 
        if (imageCaption != '') {
            
            var imgWidth = $(imageToCaption).width();
            
            // wrap the image with a container
            if ( $(imageToCaption).hasClass("alignleft") ) {
                $(imageToCaption).wrap('<div class="img-caption-wrapper alignleft">');
                $(imageToCaption).removeClass("alignleft");
            } else if ( $(imageToCaption).hasClass("alignright") ) {
                $(imageToCaption).wrap('<div class="img-caption-wrapper alignright">');
                $(imageToCaption).removeClass("alignright");
            } else if ( $(imageToCaption).hasClass("aligncenter") ) {
                $(imageToCaption).wrap('<div class="img-caption-wrapper aligncenter">');
                $(imageToCaption).removeClass("aligncenter");
            } else {
                $(imageToCaption).wrap('<div class="img-caption-wrapper">');
            }
            
            
            $("<span class='img-caption'>"+imageCaption+"</span></div>")
            .css({
                "width": (imgWidth - 50) +"px"
                })
            .insertAfter(imageToCaption);
        }
 
    });
      
      
});
