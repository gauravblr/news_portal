size=parseInt($('p').css('font-size'));
$("#big").on("click",function(){
  size=size+2;
   $(".text-decor p").css("font-size",size + "px");
});
$("#normal").on("click",function(){
  size=16;
   $(".text-decor p").css("font-size",size + "px");
});
$("#small").on("click",function(){
    size=size-2;
    if(size>12){
        $(".text-decor p").css("font-size",size+ "px");
    } else {
       $(".text-decor p").css("font-size",14+ "px");
    }
});

$("#news-slider8").owlCarousel({
    items : 4,
    itemsDesktop:[1199,3],
    itemsDesktopSmall:[980,2],
    itemsMobile : [550,1],
    pagination:true,
    autoPlay:true,
    responsiveClass:true,
});

$("#news-slider10").owlCarousel({
    items : 4,
    itemsDesktop:[1199,3],
    itemsDesktopSmall:[980,2],
    itemsMobile : [550,1],
    pagination:true,
    autoPlay:true,
    responsiveClass:true,
});
