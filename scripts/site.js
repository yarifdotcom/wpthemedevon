$ = jQuery;

const xhtml = $('html');
const header = $('header');
let xcontentHolder = $('#content-holder');
//------------ hamburger animation
$(document).on('click','button.navbar-toggle', function(){
    if(xhtml.hasClass('menu-active')){
        menuclose();
    } else {
        menuopen();
    }
});

function menuclose(){
    //console.log('close');
    xhtml.addClass('menu-close');
    
    setTimeout(function() { 
        xhtml.removeClass('menu-active').removeClass('menu-close').removeClass('menu-prep').removeClass('no-scroll');
    }, 500); 
}

function menuopen(){
    xhtml.addClass('menu-active').addClass('no-scroll');
}


var isSafari = window.safari !== undefined;
if (isSafari) xhtml.addClass('is-safari');


///////////////////////////// Add styles to allow extra transitions on menu open
//var start = 15;
//var factor = 15;
//var count = 1;
//$('.big-nav li').each(function(){
//    $(this).css('transform', 'translateX(' + (start + count * factor) +  '%)');
//    count++;
//});


//---------------------------------------------------
// BARBA
//---------------------------------------------------

$('document').ready(function(){
    var transEffect = Barba.BaseTransition.extend({
        
        start: function(){
            xhtml.addClass('outgoing');
            this.newContainerLoading.then(val => this.fadeInNewcontent($(this.newContainer)));
        },
        
        fadeInNewcontent: function(nc) {
            
            var _this = this;
            

            $('#transition-mask').addClass('transitioning');
            
            setTimeout(function() {  // wait while transition mask fades in

                menuclose();

                
                $(this.oldContainer).css({'display': 'none'}); // hide old content
                nc.css({'visibility':'visible', 'opacity': '1', 'display': 'block'}); // show new content
                
                window.scrollTo(0, 0); // reset scrolling to top (maybe unneccesary?)

                xhtml.removeClass('is-home not-home');
                if($(nc).hasClass('home')){
                    xhtml.addClass('is-home');
                } else {
                    xhtml.addClass('not-home');
                }
                
                if($(nc).hasClass('tax-collection')){
                    header.addClass('tax-collection');
                } else {
                    header.removeClass('tax-collection');
                } 
                
                if($(nc).hasClass('tax-product_cat')){
                    header.addClass('tax-product_cat');
                } else {
                    header.removeClass('tax-product_cat');
                }
                
                if($(nc).hasClass('post-type-archive-in_situ')){
                    header.addClass('post-type-archive-in_situ');
                } else {
                    header.removeClass('post-type-archive-in_situ');
                }               
                
                if($(nc).hasClass('single-in_situ')){
                    header.addClass('single-in_situ');
                } else {
                    header.removeClass('single-in_situ');
                }  
                
      
                
                
                xcontentHolder = '';
                
                //gsap.globalTimeline.clear();
                //gsap.killTweensOf('*');
                let Alltrigger = ScrollTrigger.getAll()
                for (let i = 0; i < Alltrigger.length; i++) { 
                    Alltrigger[i].kill(true) 
                }
                
                //$('header .logo-holder').kill(); 
                
                
                $('header .logo-holder, header .logo-holder a').attr('style', '')
                
                $('header').removeClass('page-template-home nav-up nav-down'); 
                xhtml.removeClass('no-scroll white-header start-logo')
                $('.drop.active').removeClass('active');
            
            
                
                _this.done(); // tell barba we're done, which will remove old content completely
                xhtml.removeClass('outgoing').addClass('incoming');

                
                // do something based on incoming page -------------------------------/////
/*                var curPage = $(nc).attr('data-namespace');
                
                if(curPage === 'home'){                    
                    var curPos = $('.pageBuilder').first().offset().top;
                    $("html, body").animate({ scrollTop: winHeight }, 0);
                    
                } else {
                }*/

                
                
                
                reLoad(); // re-call javascript
                
                setTimeout(function() {  // wait time specified to hold on overlay
                        
                    $('#transition-mask').removeClass('transitioning');
                    
                    xcontentHolder = $('#content-holder');

                    setTimeout(function() {  // wait time before fade in content
                        xhtml.removeClass('incoming');
                    }, 500); // holds this long

                }, 1000); // holds this long on overlay                
                
                
                
                // send google analytics info
//                gtag('event', 'page_view', {
//                    'page_title': document.title,
//                    'page_location': location.href,
//                    'page_path': location.pathname,
//                });          
                

            }, 250); // Fade in overlay
            
            
        }
    });

    Barba.Pjax.getTransition = function() {
        return transEffect;
    }
    
     //ignore rules
    Barba.Pjax.originalPreventCheck = Barba.Pjax.preventCheck;
    Barba.Pjax.preventCheck = function(evt, element) {
        if (!Barba.Pjax.originalPreventCheck(evt, element)) {
            return false;
        }

        // ignore pdf links
        if (/.pdf/.test(element.href.toLowerCase())) {
            return false;
        }

        // additional (besides .no-barba) ignore links with these classes
        // ab-item is for wp admin toolbar links
        var ignoreClasses = ['product-link', 'no-barba', 'input[type="submit"]'];
        for (var i = 0; i < ignoreClasses.length; i++) { 
            if (element.classList.contains(ignoreClasses[i])) {
                return false;
            }
        }

        return true;
    };  
    
    
    
    Barba.Dispatcher.on('newPageReady', function(current, prev, container) { // return page scroll to top
        history.scrollRestoration = 'manual';
    });
    Barba.Pjax.start();
});










//---------------------------------------------------
// main menu underline update   
//---------------------------------------------------

$('.big-nav li').click(function(){
    
    var xthis = $(this);
    //setTimeout(function() { 
        $('.current-menu-item').removeClass('current-menu-item');
        xthis.addClass('current-menu-item'); 
    //}, 1000);   
    
})

$('body').on('click', '#content-holder a'  , function(){
        var linkUrl = $(this).attr('href');
            
    setTimeout(function() { 
        $('.current-menu-item').removeClass('current-menu-item');
        $('[href="' + linkUrl +  '"]').parent('li').addClass('current-menu-item'); 
    }, 1000);     

})




//---------------------------------------------------
// General variables
//---------------------------------------------------

var xwindow = $(window);
var xbody = $('body');
//var xcontentHolder = $('#content-holder');

var winHeight;
var winWidth;
var scrolled;

function updateVariables(){
    winHeight = xwindow.height();
    winWidth = xwindow.width();
    scrolled = xwindow.scrollTop();
}

updateVariables();
















//---------------------------------------------------
// Initialise SLider
//---------------------------------------------------

function sliderInit(){ 

    $('.slider').each(function(){
        var xslider = $(this);
        
        if(xslider.hasClass('featured-slider')){
            
            var randomNum;
            xslider.on('init reInit', function(event, slick, currentSlide, nextSlide){
                var thisCount = slick.slideCount;
                randomNum = Math.floor(Math.random() * thisCount);
            });                
            
            xslider.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
                var i = (currentSlide ? currentSlide : 0) + 1;
                xslider.parents('.row').find('.slider-count p').html('<span>' + i + '</span><span> / </span><span>' + slick.slideCount + '</span>');
            });    

            xslider.slick({
                arrows: false,
                dots: true, 
                autoplay: false,
                pauseOnHover: false,
                fade:true
            });           
            
            xslider.slick('slickGoTo', randomNum);            
            
            
        } else if(xslider.parents('.col').hasClass('main-gallery-col')) {
            
            xslider.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
                var i = (currentSlide ? currentSlide : 0) + 1;
                xslider.parents('.row').find('.slider-count p').html('<span>' + i + '</span><span> / </span><span>' + slick.slideCount + '</span>');
            });    

            xslider.slick({
                arrows: false,
                dots: true, 
                autoplay: false,
                pauseOnHover: false,
                fade:true

            });              
            
        } else if(xslider.hasClass('collections-slider')) {
            
            var randomNum;
            xslider.on('init reInit', function(event, slick, currentSlide, nextSlide){
                var thisCount = slick.slideCount;
                randomNum = Math.floor(Math.random() * thisCount);
            });              
            
            
            xslider.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
                var i = (currentSlide ? currentSlide : 0) + 1;
                xslider.parents('.row').find('.slider-count p').html('<span>' + i + '</span><span> / </span><span>' + slick.slideCount + '</span>');
            });    

            xslider.slick({
                arrows: false,
                dots: true, 
                autoplay: false,
                pauseOnHover: false,
            });   
            
                
            xslider.slick('slickGoTo', randomNum);            
            
            
        } else {
            
            
            
            
            xslider.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
                var i = (currentSlide ? currentSlide : 0) + 1;
                xslider.parents('.row').find('.slider-count p').html('<span>' + i + '</span><span> / </span><span>' + slick.slideCount + '</span>');
            });    

            xslider.slick({
                arrows: false,
                dots: true, 
                autoplay: false,
                pauseOnHover: false,
            });              
            
        }
        

        
    });
        
} // end sliderInit

sliderInit();


$(document).on('click','.slick-active, .hover.right-hover', function(){
    $(this).parents('.row').find('.slider').slick('slickNext');
    
});
$(document).on('click','.hover.left-hover, .slick-slide:not(.slick-active)', function(){
    $(this).parents('.row').find('.slider').slick('slickPrev');
});





//---------------------------------------------------
// Keypresses
//---------------------------------------------------


$(document).on('keydown',function(e) {
    if (e.keyCode == 27) { //  escape
        
    if(xhtml.hasClass('menu-active')){
        menuclose();
    } 
    $('.drop.active').removeClass('active');    
    xhtml.removeClass('no-scroll white-header');
        
        //else if(xhtml.hasClass('noScroll') && xcontentHolder.hasClass('page-template-about') ){
        //$('article.active').removeClass('active');
        //xhtml.removeClass('noScroll') ;   
    //}
 
    } else if (e.keyCode === 37){ // left
        $('.slider').slick('slickPrev');
		
    } else if (e.keyCode === 39){// right
         $('.slider').slick('slickNext');
    }
});




//---------------------------------------------------
// Home Gallery randomiser
//---------------------------------------------------
function getRandomArbitrary(min, max) { // random helper function
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
}


var activeSlide;
var vidSrc = '';

function homeGallery(){
    
    var xgallerySlide = $('#gallery-section .gallery-item');
    
    if(xgallerySlide){
        
        var galleryCount = xgallerySlide.length;
        var randomNum = getRandomArbitrary(0, galleryCount);
        
        activeSlide = xgallerySlide.eq( randomNum );
        activeSlide.addClass('chosen');
        var activeImg = activeSlide.find('img');

        var thisSrc = activeImg.attr('data-src');
        var thisSrcSet = activeImg.attr('data-srcset');
        
        activeImg.attr('srcset', thisSrcSet);
        activeImg.attr('src', thisSrc);
        
        
        

        
    } 
    
}

homeGallery();


window.onload = function() {
    setTimeout(function() {  // wait time before fade in content
        if(activeSlide.hasClass('vid-item')){
            let curItem = activeSlide.find('.itemVideo');
            vidSrc = curItem.attr('data-src');
            curItem.html(vidSrc);
        } 
    }, 3000); // wait this long

}

//---------------------------------------------------
// GSAP / Scrolltrigger
//---------------------------------------------------
//---------------------------------------------------
//---------------------------------------------------
//---------------------------------------------------
//---------------------------------------------------
//---------------------------------------------------
//---------------------------------------------------
//---------------------------------------------------
//---------------------------------------------------
//---------------------------------------------------
gsap.registerPlugin(ScrollTrigger);
//ScrollTrigger.addEventListener("refreshInit", stickyUpdates);

let topDist =  '';
let titleHeight =  '';
let secondTrigger =  '';

let secondOffset01 =  '';
let secondOffset02 =  '';
let secondDistance =  '';

var finalWidth = '';
var finalTop = '';


function stickyUpdates(){
    if($('#content-holder').hasClass('single-product')){
        topDist =  $('#pin-main h1').offset().top;
        titleHeight = $('#pin-main h1').height();
        secondTrigger = topDist + titleHeight;
    }
    
    if($('.secondary-gallery-col').length ){
        secondOffset01 = $('.secondary-gallery-col').offset().top;
        secondOffset02 = $('.secondary-placeholder').offset().top;
        secondDistance = secondOffset02 - secondOffset01;
        //console.log('trig:' + secondTrigger + '  dist' + secondDistance);


        //console.log(titleHeight);
    }
    
    if($('#content-holder').hasClass('home')){
        updateVariables();
        //console.log('stic');
        finalWidth = '7.14vw';
        //finalTop = '1.5vw';
        finalTop = '1.5vw';
        if(winWidth >= 1800){
            finalWidth = '128.52px';
            finalTop = '27px';
        }
        //console.log(finalTop + ' xxx  ' + finalWidth);

    }    
    
    
    
}




function scrollAnims(){
    
    if(winWidth > 767){
        gsap.to('#content-holder',  {
            
            scrollTrigger: {
                trigger: '#content-holder',
                ease: 'linear', 
                start: 'top top',
                end: '+=35%', 
                scrub: 0,
                
                //immediateRender: false,
                //toggleActions: "play reverse reverse reverse",
                onEnter: endScroll,
                onLeave: startScroll,
                onEnterBack: endScroll,
                onLeaveBack: endScroll,  
                invalidateOnRefresh: true
            },
        }); 
    }
    

       
    if($('#content-holder').hasClass('home')){ 
        //var startWidth = '90vw';

        
        
        if(winWidth > 767){
        
            gsap.fromTo('header .logo-holder',  { ////// fade in canvas 
                //transform: 'translateY(100vh)',
                width: () => '90vw',
                //translateY(calc(100vh - 96%)) ;
                y: () => '98.3vh',
                //yPercent: '-96',
                ease: 'linear', 
            },{
                //scale: 1,
                //transform: 'translateY(0)',
                y: () => (window.innerWidth >= 1800 ? "27px" : "1.6vw"),
                //yPercent: '0',
                //width: () => finalWidth,
                width: () => (window.innerWidth >= 1800 ? "128.52px" : "7.14vw"),

                ease: 'linear', 
                scrollTrigger: {
                    trigger: '#content-holder',
                    ease: 'linear', 
                    start: '-0.01% top',
                    end: '+=95.4%', 
                    scrub: 0,

                    //immediateRender: false,
                    //toggleActions: "play reverse reverse reverse",
                    //onEnter: startLogo,
                    onLeave: blackLogo,
                    onEnterBack: whiteLogo,
                    //onLeaveBack: endLogo,  
                    invalidateOnRefresh: true,

                },
            });    
            
        
            gsap.fromTo('header .established-logo',  { ////// fade in canvas
                opacity: '1',

            },{


                //scale: 1,
                opacity: '0',
                ease: 'linear', 
                scrollTrigger: {
                    trigger: '#content-holder',
                    start: 'top top',
                    end: '+=50%',
                    scrub: 0, 


                },
            });              
            
            
        } 
        
        
        
        
        
        if(winWidth > 767){

        
            gsap.to('#content-holder',  {

                scrollTrigger: {
                    trigger: '#content-holder',
                    ease: 'linear', 
                    start: 'top top',
                    end: '+=130%', 
                    scrub: 0,

                    //immediateRender: false,
                    //toggleActions: "play reverse reverse reverse",
                    onEnter: startLogo,
                    onLeave: releaseMenu,
                    onEnterBack: lockMenu,
                    //onLeaveBack: endLogo,  
                },
            });      
        }
        

        

        
        
        
        if(winWidth > 767){
            gsap.to('#intro-section .col',  { ////// fade in canvas
                //scale: 1,
                opacity: '1',
                y:'0', 
                //duration:0.5,
                ease: 'linear', 

                scrollTrigger: { 
                    trigger: '#intro-section',
                    //start: winHeight * 1.2,
                    //end: "bottom top",
                    start: "top 80%", // when the top of the trigger hits the top of the viewport
                    end: "+=40%", // end after scrolling 500px beyond the start                

                    scrub: 0,
                    //pin:true,
                    //immediateRender: false
                    //toggleActions: "play none none reverse",
                }
            })  
        
            gsap.to('#collections-section .collections-col',  { ////// fade in canvas
                //scale: 1,
                //opacity: '1',
                x:'-5vw', 
                //duration:0.5,
                ease: 'linear', 

                scrollTrigger: { 
                    trigger: '#collections-section',
                    //start: winHeight * 1.2,
                    end: "bottom top",
                    //start: "top 80%", // when the top of the trigger hits the top of the viewport
                    start: "top bottom", // end after scrolling 500px beyond the start                

                    scrub: 0,
                    //pin:true,
                    //immediateRender: false
                    //toggleActions: "play none none reverse",
                }
            })              
            
            
            
        }
        
        
        
        

        
        //---------------------------------------------------
        // Home page small featured widths
        //---------------------------------------------------
            
        let contWidth = $('#featured-small-section .row').width();
        let rowWidth = 0;
        let rowItems = $('#featured-small-section article');
        
        let endGsap = "+=100%";
        if(winWidth < 768){
            endGsap = "+=200%";
        }
        
        rowItems.each(function(){
            rowWidth += $(this).outerWidth(true);
        });

        //console.log (rowWidth + '  - ' + contWidth);
        gsap.to('#featured-small-section .row',  { ////// fade in canvas
            //scale: 1,
            //opacity: '1',
            x:-1 * (rowWidth - contWidth),  
            //duration:0.5,
            ease: 'linear', 

            scrollTrigger: { 
                trigger: '#featured-small-section .container-fluid',
                //start: winHeight * 1.2,
                //end: "top 20%",
                end: endGsap,
                //start: "top 80%", // when the top of the trigger hits the top of the viewport
                start: "top 30%", // end after scrolling 500px beyond the start                
                
                scrub: 0,
                pin:true,
                //immediateRender: false
                //toggleActions: "play none none reverse",
            }
        })          
        
        
        
        
        
    } /////// if is home
    
    if(winWidth > 767){
    
         if($('#content-holder').hasClass('tax-collection')){ 

            gsap.to('#content-holder.tax-collection',  {

                scrollTrigger: {
                    trigger: '#content-holder.tax-collection',
                    ease: 'linear', 
                    start: 'top top',
                    end: '+=30%', 
                    scrub: 0,

                    //immediateRender: false,
                    //toggleActions: "play reverse reverse reverse", 
                    onLeave: headerBlack,
                    onEnterBack: headerWhite,
                    //onLeaveBack: endLogo,  
                },
            });     

            gsap.to('#main-gallery-col',  {

                yPercent:"-50",

                scrollTrigger: {
                    trigger: '#content-holder.tax-collection',
                    ease: 'linear', 
                    start: 'top top',
                    end: '+=50%', 
                    scrub: 0,

                    //immediateRender: false,
                    //toggleActions: "play reverse reverse reverse", 
                    //onLeave: headerBlack,
                    //onEnterBack: headerWhite,
                    //onLeaveBack: endLogo,  
                },
            });    





         } // if tax-collection
    }
    
    if(winWidth > 767){
        if($('#content-holder').hasClass('page-template-about')){ 

            boxes = gsap.utils.toArray('.materials-col');

            boxes.forEach((box) => {

                let q = gsap.utils.selector(box);
                //let word = gsap.utils.selector(q("img"));

                let st = ScrollTrigger.create({
                    trigger: box,
                    pin: q(".inner"), 
                    start: 'top 10%',

                    pinSpacing: true,
                    end: '+=70%',
                 });
            }); 


         } // if tax-collection    
    }
    
    

        if($('#content-holder').hasClass('single-product')){ 

            setTimeout(function() { 
                $('#content-holder').addClass('loaded');
            }, 200); 
            
            
    if(winWidth > 767){
            

           // let contWidth = $('#featured-small-section .row').width();
           // let rowWidth = 0;
           // let rowItems = $('#featured-small-section article');

            //rowItems.each(function(){
            //    rowWidth += $(this).outerWidth(true);
            //});

            //console.log (rowWidth + '  - ' + contWidth);




            //let endDist =  winHeight - topHeight ;


            //stickyUpdates();

            gsap.to('#pin-main',  { ////// fade in canvas
                //scale: 1,
                //opacity: '1',
                //x:-1 * (rowWidth - contWidth),  
                //duration:0.5,
                ease: 'linear', 

                scrollTrigger: { 
                    trigger: '#pin-main', 
                    //start: winHeight * 1.2,
                    //end: "top 20%",
                    //end: "+=" + endDist, 
                    end: "+=100%",
                    //start: "top 80%", // when the top of the trigger hits the top of the viewport
                    start: "top top", // end after scrolling 500px beyond the start                

                    scrub: 0,
                    pin:true,
                    //immediateRender: false
                    //toggleActions: "play none none reverse",
                    invalidateOnRefresh: true
                }
            })                            


            if($('.secondary-gallery-col').length ){
                gsap.to('#pin-secondary',  { ////// fade in canvas
                    //scale: 1,
                    //opacity: '1',
                    //x:-1 * (rowWidth - contWidth),  
                    //duration:0.5,
                    ease: 'linear', 

                    scrollTrigger: { 
                        trigger: '#pin-secondary',
                        //start: winHeight * 1.2,
                        //end: "top 20%",
                        //end: "+=" + endDist, 
                        //end: "+=" + secondDistance,
                        end: () => "+=" + ($('.secondary-placeholder').offset().top - $('.secondary-gallery-col').offset().top),
                        //start: "top 80%", // when the top of the trigger hits the top of the viewport
                        start: () =>  "top " + ($('#pin-main h1').offset().top + $('#pin-main h1').height()), // end after scrolling 500px beyond the start                
                        pinSpacing: false,
                        scrub: 0,
                        pin:true,
                        //immediateRender: false
                        //toggleActions: "play none none reverse",
                        invalidateOnRefresh: true
                    }
                })      
            }





    }


        } // if single product     

    
    
    
    
}





stickyUpdates();
scrollAnims();
 
// trigger scrollevent
//$(document).dispatchEvent(new CustomEvent('scroll'))
//$(document).get(0).dispatchEvent(new Event('scroll'));


function blackLogo(){
    xhtml.addClass('black-logo');
}
function whiteLogo(){
    xhtml.removeClass('black-logo');
}
function startLogo(){
    xhtml.addClass('start-logo');
}
function endLogo(){
    //xhtml.removeClass('start-logo');  
    //xhtml.addClass('allow-menu');

}

function releaseMenu(){
    xhtml.addClass('release-menu');
}
function lockMenu(){
    xhtml.removeClass('release-menu');
}

function headerBlack(){
    xcontentHolder.addClass('headerBlack')
}
function headerWhite(){
    xcontentHolder.removeClass('headerBlack')
}


function startScroll(){
    xhtml.removeClass('start')
}
function endScroll(){
    xhtml.addClass('start')
}



//---------------------------------------------------
// Nav dropdown
//---------------------------------------------------
$(document).on('click','.drop .trigger', function(){
    
    var xdrop = $(this).parents('.drop');
    
    if(xdrop.hasClass('active')){
        xdrop.removeClass('active');
        if(winWidth > 767){
            xhtml.removeClass('no-scroll white-header')
        }
    } else {
        $('.drop.active').removeClass('active');
        xdrop.addClass('active');
        if(winWidth > 767){
            xhtml.addClass('no-scroll white-header');
        }
        if(xdrop.hasClass('search-drop')){
            xdrop.find('.search-field').focus();
        }
    }

});



//---------------------------------------------------
// Hide Header on on scroll down
//---------------------------------------------------

    if(winWidth > 767){

        var didScroll;
        var lastScrollTop = 0;
        var delta = 150;

        var xHeader = $('header.main-header');
        
        var navbarHeight = xHeader.outerHeight(); 
        

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            scrolled = xwindow.scrollTop();

            if(scrolled === '0' && xHeader.hasClass('nav-up')){
                xHeader.removeClass('nav-up').addClass('nav-down');
            }
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 50);

        function hasScrolled() {
            var st = $(this).scrollTop();

            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;

            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight){
                // Scroll Down
                xHeader.removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    xHeader.removeClass('nav-up').addClass('nav-down');
                }
            }

            lastScrollTop = st;
        }
    }




//---------------------------------------------------
// Choose Gradient based on time of day
//---------------------------------------------------

var today = new Date();
var time = today.getHours();
//console.log('here');

if(time <= 5 || time >= 21){
    //console.log('10');
    $('#transition-mask').addClass('gradient10'); 
} else if(time >= 6 && time <= 9){
    //console.log('20');
    $('#transition-mask').addClass('gradient20');
} else if (time >= 10 && time <= 16){
    //console.log('30');
    $('#transition-mask').addClass('gradient30');
} else if (time >= 17 && time <= 20){
    //console.log('40');
    $('#transition-mask').addClass('gradient40');
}


//---------------------------------------------------
// Product Menu hovers
//---------------------------------------------------
if(winWidth > 767){

    $(document).on({
        mouseenter: function () {
            $(this).parents('ul').addClass('hover-active');
        },
        mouseleave: function () {
            $(this).parents('ul').removeClass('hover-active');
        }
    }, ".dropdown a"); //pass the element as an argument to .on
}







//---------------------------------------------------
// Image enlarge
//---------------------------------------------------



$(document).on('click','.woocommerce-product-gallery', function(){
    var xparent = $(this).parents('.woo-gallery-col');
    var $clone = xparent.find('img').clone();
    xparent.find('#enlarge-holder').html($clone).addClass('active');
});

$(document).on('click','.woo-gallery-col .img-outer', function(){
    var xparent = $(this).parents('.woo-gallery-col');
    var $clone = xparent.find('.img-outer img').clone();
    xparent.find('#enlarge-holder').html($clone).addClass('active').find('img').attr('sizes', '(min-width: 768px) 100vw, 100vw');
});

$(document).on('click','#enlarge-holder', function(){
    var xparent = $(this).parents('.woo-gallery-col');
    $(this).removeClass('active').html('');
});



//---------------------------------------------------
// Quote Placeholders
//---------------------------------------------------

function placeHolders(){
    if($('#content-holder').hasClass('page-template-quote')){
        $('#rqa-name').attr('placeholder', 'Name');
        $('#rqa-email').attr('placeholder', 'Email');
        $('#rqa-message').attr('placeholder', 'Additional Information'); 
        
    }    
}

placeHolders();



//---------------------------------------------------
// RE-CALL any JS
//---------------------------------------------------

    

function reLoad(){
    sliderInit();
    homeGallery();
    scrollAnims();
    placeHolders();
}



$(window).resize(function() {
    updateVariables();
    ScrollTrigger.refresh();
    //stickyUpdates();
});






