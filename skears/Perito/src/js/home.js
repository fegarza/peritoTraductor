
$(document).ready(function(){
    
    $(".menu2").click(function(){
       $(".menu_opc").css("display","block"); 
         
    });
     $(".close").click(function(){
       $(".menu_opc").css("display","none"); 
        
    }); 
    
    
    $(window).scroll(function(){
        var scrollTop =$(window).scrollTop();
        //console.log(scrollTop);
        var headerHeight = $("header").height();
        if(scrollTop >= headerHeight){
            $("nav").css("background","white");
            $("nav").css("position","fixed");
            $("nav").css("border-bottom","4px solid #EE692C");
            $(".logo").css("color","#1a1a1a");
            $(".menu a").css("color","#1a1a1a");
        }else{
                        $("nav").css("position","absolute");

            $("nav").css("background","none");
            $("nav").css("border-bottom","0px");
            $(".logo").css("color","white");
            $(".menu a").css("color","white");

        }
    });
});
/*$(document).ready(function(){
    var sliders =  $('.slide').length;
    console.log("-> SLIDERS TOTALES: " + sliders);
    
    
    $('.slide').click(function(){
        if(sliders >1){
            var actualMargin = parseInt($('.slider_cont').css("margin-left")) * -1;
            console.log("-> MARGEN ACTUAL: " + actualMargin);
            var maxMargin =   sliders*$('.slide').width(); 
            console.log("-> SLIDER WIDTH: " + $('.slide').width());
            console.log("-> MAX MARGIN: " + maxMargin);
            var module = maxMargin % actualMargin;
            
            console.log(maxMargin + " / " + actualMargin + " da un modulo de " + module );
            
            if(module == 0 || actualMargin == -0){

             if((actualMargin + $('.slide').width()) >= maxMargin  ){
                $('.slider_cont').css("margin-left","0px");
                 console.log("xd");
            }else{
                var newMargin = (actualMargin * -1) - $('.slide').width(); 
                console.log(newMargin);
                var newMarginPX= String(newMargin) + "px";
                $('.slider_cont').css("margin-left",newMarginPX) ;
                console.log(newMarginPX);
            }}
            else{
                console.log("wait a moment please..");
            }
        }
    }); 
}); */