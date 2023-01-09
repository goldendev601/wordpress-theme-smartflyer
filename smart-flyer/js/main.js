(function($) {
$(document).ready(function($) {

$('.article-content').fitVids();

//Global Variables

var vpWidth;

//Global Functions

function viewport() {

  var e = window, a = 'inner';

  if (!('innerWidth' in window )) {

    a = 'client';
    e = document.documentElement || document.body;

  }

  return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };

}

function mobileMoves() {

  if ($('.new-why-us').length) {

    var height = $('.new-why-us .video-wrap').outerHeight() + 50;
    $('.new-why-us').css('min-height', height + 'px');

  }

  if (vpWidth <= 1200) {

    if ($('.itinerary-intro .author-detail').length) {

      $('.details .author-detail').prependTo('.itinerary-intro .itinerary-wrapper');

    }

  }

  if (vpWidth <= 1200 && vpWidth > 800){

    if ($('.itinerary-intro .author-detail').length) {

      $('.author-detail .authors').on('afterChange init', function(){

        var last = $('.author-detail .authors .slick-track').children().last();
        var lastRight = last.offset().left + last.outerWidth();
        var cutoff = $('.author-detail').offset().left + $('.author-detail').outerWidth();

        console.log(lastRight);
        console.log(cutoff);

        if (lastRight <= cutoff) {

          $('.author-detail .authors .slick-next').addClass('slick-disabled');

        } else {

          $('.author-detail .authors .slick-next').removeClass('slick-disabled');

        }

      });

      $('.author-detail .authors').slick({

        variableWidth: true,
        infinite: false,
        prevArrow: '<span class="slick-prev"><svg class="chev-right"><use xlink:href="#chev-right"></use></svg></span>',
        nextArrow: '<span class="slick-next"><svg class="chev-right"><use xlink:href="#chev-right"></use></svg></span>',

      });

    }

    if ($('.itinerary-intro .credits').length) {

      $('.author-detail .credits').on('afterChange init', function(){

        var last = $('.author-detail .credits .slick-track').children().last();
        var lastRight = last.offset().left + last.outerWidth();
        var cutoff = $('.author-detail').offset().left + $('.author-detail').outerWidth();

        console.log(lastRight);
        console.log(cutoff);

        if (lastRight <= cutoff) {

          $('.author-detail .credits .slick-next').addClass('slick-disabled');

        } else {

          $('.author-detail .credits .slick-next').removeClass('slick-disabled');

        }

      });

      $('.author-detail .credits').slick({

        variableWidth: true,
        infinite: false,
        prevArrow: '<span class="slick-prev"><svg class="chev-right"><use xlink:href="#chev-right"></use></svg></span>',
        nextArrow: '<span class="slick-next"><svg class="chev-right"><use xlink:href="#chev-right"></use></svg></span>',

      });

    }

  }

  if (vpWidth <= 960) {

    if ($('.review').length) {

      $('.review-sidebar .review-agent').prependTo('.review .wrapper');

    }

    if ($('.agent').length) {

      $('.agent-sidebar .agent-meta').prependTo('.agent-sidebar .sticky');

    }

    if ($('.featured-agent').length) {

      $('.featured-agent .content > h2').appendTo('.featured-agent .profile');

    }

    if ($('.review-sidebar .review-detail-agents').length) {

      $('.review-sidebar .review-detail-agents').insertAfter('.main-quote');

    }

  } else {

    if ($('.review').length) {

      $('.review .wrapper .review-agent').prependTo('.review-sidebar');

    }

    if ($('.agent').length) {

      $('.agent-sidebar .agent-profile').prependTo('.agent-sidebar .sticky');

    }

  }

  if (vpWidth <= 860) {

    if ($('.offices-main').length) {

      $('#map-aus').appendTo('.na-map');
      $('#map-na').appendTo('.au-map');

    }

  } else {

    if ($('.offices-main').length) {

      $('#map-aus').appendTo('.au-map');
      $('#map-na').appendTo('.na-map');

    }

  }

  if (vpWidth <= 700) {

    if ($('.hp-thing').length) {

      //console.log('Test');
      $('.right-half').prependTo($('.hp-thing'));

    }

    if ($('.footer-mob').length) {

      $('.footer-logo').prependTo('.footer-mob');
      $('.footer-col.social-col').appendTo('.mob-socials');
      $('.footer-col p').prependTo('.credit');

    }

  }

  else {

    if ($('.hp-thing').length) {

      //console.log('Test');
      $('.right-half').appendTo($('.hp-thing'));

    }

    if ($('.footer-mob').length) {

      $('.footer-mob').next().prepend($('.footer-mob .footer-logo'));
      $('.footer-mob .social-col').appendTo('.footer-main .wrapper');
      $('.footer-mob').next().append($('.credit p'));

    }

  }

  if (vpWidth <= 600) {

    if ($('.featured-agents').length) {

      $('.agent').each(function() {

        $(this).find('.content > h3').appendTo($(this).find('.profile'));

      });

    }

    if ($('.agent-sidebar').length) {

      $('.agent-sidebar .agent-profile').prependTo('.agent-sidebar .sticky');

    }

  } else if (vpWidth > 600 && vpWidth <= 960){

    if ($('.agent-sidebar').length) {

      $('.agent-sidebar .agent-meta').prependTo('.agent-sidebar .sticky');

    }

  }

}

function authorWrapCheck() {

  $('.review-row-inner .author-wrap span').each(function() {

    var par = $(this).parents('.review-row-inner');
    var parBound = par.offset().left + par.outerWidth();
    var right = $(this).offset().left + $(this).outerWidth();

    if (right > parBound) {

      $(this).addClass('alt');

    }

  });

}

function articleShare() {

  var scroll = $(window).scrollTop();
  var scrollBot = scroll + $('.article-share').find('ul').outerHeight() + 84;
  var parTop;
  var parBot;

  if ($('.article-share').length) {

    parTop = $('.article-share').offset().top - 84;
    parBot = $('.article-share').offset().top + $('.article-share').outerHeight();

    console.log(scroll);
    console.log(parTop);
    console.log(scrollBot);
    console.log(parBot);

    if (scroll > parTop && scrollBot < parBot) {

      $('.article-share').addClass('fixed');
      $('.article-share').removeClass('bottom');

    } else if (scrollBot > parBot) {

      $('.article-share').addClass('bottom');
      $('.article-share').removeClass('fixed');

    } else {

      $('.article-share').removeClass('fixed');
      $('.article-share').removeClass('bottom');   

    }


    if (vpWidth < 880) {

      var article = $('.article-share').parent();

      if (scroll + viewport().height > article.offset().top + article.outerHeight()) {

        $('.article-share').addClass('hide');

      } else {

        $('.article-share').removeClass('hide');

      }

    }


  }

}

function reviewSizing() {

  $('.review-row').each(function() {

    if ($(this).find('.review-row-inner').height() > 90) {

      $(this).addClass('tall');

    }

  });

}

function reviewSliderSizes() {

  var imgHeight = 9999;

  $('.review-featured img').height('auto');

  $('.review-featured img').each(function() {

    if ($(this).height() < imgHeight && $(this).height() > 0) {

      imgHeight = $(this).height();

    }

  });

  if (imgHeight != 9999) {

    $('.review-featured img').height(imgHeight);

  }
  

  // if ($('.review-featured').hasClass('slick-initialized')) {

  //   $('.review-featured ').slick('setPosition');

  // }

  

}



function itineraryBlockCheck() {

  var scrollMid = $(window).scrollTop() + (viewport().height / 2);
  var min = $('.itinerary-article').offset().top;
  var topCheck;
  var botCheck;
  var tar;

  if (scrollMid > min) {

    $('.itinerary-article section').each(function() {

      // console.log('test 1');

      topCheck = $(this).offset().top;
      botCheck = topCheck + $(this).outerHeight();

      if (scrollMid > topCheck && scrollMid < botCheck) {

        tar = $(this).attr('id');
        // console.log(tar);

      }

    });

    $('#nav-' + tar).addClass('active').siblings().removeClass('active');

  }

}

$('.itinerary-nav span').on('click', function() {

  var dat = $(this).data('anchor');
  var tar = $('#' + dat).offset().top;
  $("html, body").animate({ scrollTop: tar }, 500);

});

$('.highlights-list a').on('click', function(e) {

  e.preventDefault();

  var dat = $(this).attr('href');
  var tar = $(dat).offset().top - 28;

  $("html, body").animate({ scrollTop: tar }, 500);

});

var sticky = false;

function stickMe() {

  var scroll = $(window).scrollTop() + viewport().height - 48;
  var scrollTop = $(window).scrollTop();
  

  $('.sticky').each(function() {

    if (scrollTop > $(this).parent().offset().top - 48 && scrollTop < $(this).parent().offset().top + $(this).parent().outerHeight()) {

      sticky = $(this);

    } 

  });

  if (sticky) {

    var stickyHeight = sticky.outerHeight();
    var par = sticky.parent();
    var parTop = par.offset().top;
    var parBot = parTop + par.outerHeight();
    var isFixed = $('.sticky.fixed').length;
    var parSticky = parTop + stickyHeight;
    var stickyTop = sticky.offset().top;


    if (stickyHeight > viewport().height) {

      if (scroll > parSticky && scroll < parBot) {

        sticky.addClass('fixed');
        sticky.removeClass('stuck');
        console.log('fixed');

      } else if (scroll > parBot) {

        sticky.addClass('stuck');
        sticky.removeClass('fixed');
        console.log('stuck');

      } else if (stickyTop < parTop && sticky.hasClass('fixed')) {
      
        sticky.removeClass('fixed');
        sticky.removeClass('stuck');
        console.log('none 1');

      } else {

        sticky.removeClass('fixed');
        sticky.removeClass('stuck');
        console.log('none 1');

      }

    } else {


      if (scrollTop > parTop - 48 && scrollTop < parBot - stickyHeight - 48) {

        sticky.addClass('fixed-top');
        sticky.removeClass('stuck');

      } else if (scrollTop > parBot - stickyHeight - 48) {

        sticky.addClass('stuck');
        sticky.removeClass('fixed-top');

      } else {

        sticky.removeClass('fixed-top');
        sticky.removeClass('stuck');

      }


    }

  }

}

if ($('.review-featured').length) {

  $('.review-featured').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true,
    centerPadding: '0px',
    arrows: false,
    slide: 'img',
    swipeToSlide: true,
    focusOnSelect: true
  });
}

function staySliderInit() {

  $('.stay-slide .content p').each(function() {

    var height = $(this).parent().outerHeight();
    var sHeight = $(this)[0].scrollHeight;

    // console.log(height);
    // console.log(sHeight);

    if (height > sHeight) {

      $(this).parent().outerHeight(sHeight);
      $(this).parent().addClass('short');
      $(this).parent().next().hide();

    }

  });

}

if ($('.stay-slider').length) {

  $('.stay-slider').slick({

    appendArrows: $('.stay-slider'),
    dots: false,
    infinite: false,
    slidesToShow: 2,
    slidesToScroll: 2,
    prevArrow: '<div class="prev-arrow"><svg class="slider-arrow"><use xlink:href="#slider-arrow"></use></svg></div>',
    nextArrow: '<div class="next-arrow"><svg class="slider-arrow"><use xlink:href="#slider-arrow"></use></svg></div>',
    responsive: [

      {

        breakpoint: 600,
        settings: {

          slidesToShow: 1.2,
          slidesToScroll: 1,

        }

      }

    ]

  });

  staySliderInit();

}

$('.stay-slider .content-cta').on('click', function() {

  var height = $(this).prev().outerHeight();
  var sHeight = $(this).prev().find('p')[0].scrollHeight;

  $(this).prev().outerHeight(sHeight).addClass('tall');
  $(this).hide();

});

$('.inner-slider-next').on('click', function() {

  $(this).parents('.inner-slider').find('.active').removeClass('active').next('.image-wrap').addClass('active');

  if (!$(this).parents('.inner-slider').find('.active').next('.image-wrap').length) {

    $(this).addClass('disabled');

  }

  $(this).parent().find('.inner-slider-prev').removeClass('disabled');

});

$('.inner-slider-prev').on('click', function() {

  $(this).parents('.inner-slider').find('.active').removeClass('active').prev('.image-wrap').addClass('active');

  if (!$(this).parents('.inner-slider').find('.active').prev('.image-wrap').length) {

    $(this).addClass('disabled');

  }

  $(this).parent().find('.inner-slider-next').removeClass('disabled');

});


//Functions on Load

$(window).on('load', function() {

  vpWidth = viewport().width;
  mobileMoves();

  if ($('.sticky').length) {

    stickMe();

  }

  if($('.review').length) {

    reviewSizing();

  }

  if ($('.review-featured').length) {
    //reviewSliderSizes();
    $(window).resize(); 
  }

  if ($('.featured-agent').length && viewport().width > 960) {

    var element = document.getElementById('hp-agent-bio');
    var ellipsis = new Ellipsis(element);

    ellipsis.calc();
    ellipsis.set();

  }

  if ($('.review-row-inner .author-wrap').length) {

    authorWrapCheck();

  }

  if ($('.itinerary-article').length) {

    itineraryBlockCheck();

    $('.itinerary-intro .details').css('min-height', $('.author-detail').outerHeight() + 'px');

  }

});


//Functions on Resize

$(window).on('resize', function() {

  vpWidth = viewport().width;
  mobileMoves();

  if ($('.sticky').length) {

    stickMe();

  }

  if ($('.review-featured').length) {
    //reviewSliderSizes();
  }

  if ($('.review-row-inner .author-wrap').length) {

    authorWrapCheck();

  }

});

//Functions on Scroll

$(window).on('scroll', function() {

  articleShare();

  if ($('.sticky').length) {

    stickMe();

  }

  if ($('.itinerary-article').length) {

    itineraryBlockCheck();

  }

});

//Functions on Click

$('body').on('click', '.whole-click', function()
{
	var new_window = false;
	var gotolink = $(this).find("a").attr("href");
	if ( $(this).find("a").attr("target") == '_blank')
		new_window = true;    
	if($(this).find("a.link-me").attr("href") !== undefined )
	{
	 gotolink = $(this).find("a.link-me").attr("href");
	 if ( $(this).find("a.link-me").attr('target') == '_blank')
	     new_window = true;    
	}
	if(new_window)
	 window.open(gotolink);
	else
	 window.location = gotolink;
});

$('body').on('click', '.whole-click-press-image', function()
{
	event.preventDefault()
	var image = $(this).find("a").attr("href");
	$('.agent-lightbox.press #press-image').attr('src',image);
	$('.agent-lightbox.press').fadeIn();
});


$('.hamburger').click(function() {

  $('#mobile-menu').slideToggle('slow');
  $(this).toggleClass('is-active');
  $('body, html').toggleClass('no-scroll');

});

$('.hp-why .col-4').click(function() {

  if (vpWidth <= 600) {

    $(this).find('.mob-arrow').toggleClass('flip');
    $(this).find('p').slideToggle();

  }

});

$('.review-row').click(function() {

  if ($(this).hasClass('tall')) {
    console.log('test');
    $(this).removeClass('tall').addClass('expanded');
  }

});

$('.dd-top').click(function() {

  $(this).siblings('.dd-top').removeClass('active').find('.dd').slideUp();
  $(this).parent().siblings().find('.dd').slideUp();
  $(this).find('.dd').slideToggle();
  $(this).toggleClass('active');

}).children().not('svg.arrow-down').click(function(e) {
  return false;
});

$('.dd-top span.name').click(function() {

	var $this = $(this).parent();
  $this.siblings('.dd-top').removeClass('active').find('.dd').slideUp();
  $this.parent().siblings().find('.dd').slideUp();
  $this.find('.dd').slideToggle();
  $this.toggleClass('active');

}).children().not('svg.arrow-down').click(function(e) {
  return false;
});

$('.lightbox-trigger').click(function() {

  $('.agent-lightbox.gallery').fadeIn();

});

$('.lb-close-trigger').click(function() {

  $(this).parent().fadeOut();

});

$('.lb-change-trigger').click(function() {

  var dir = $(this).data('dir');
  var cur = $('.agent-lightbox.gallery figure.active').data('slide');
  var total = $('.agent-lightbox.gallery figure').length;
  var next = cur + dir;

  if (next > total) {

    next = 1;

  } else if (next <= 0) {

    next = total;

  }

  $('.agent-lightbox.gallery figure.active').removeClass('active').fadeOut(function() {
    
    $('#slide-' + next).addClass('active').fadeIn();

  });

});

$('.au-trigger').click(function() {

  $(this).addClass('active');
  $(this).siblings().removeClass('active');
  $('.na-details').slideUp();
  $('.au-details').slideDown();

});

$('.na-trigger').click(function() {

  $(this).addClass('active');
  $(this).siblings().removeClass('active');
  $('.au-details').slideUp();
  $('.na-details').slideDown();

});

$('.inquires-modal-close').click(function() {

  $(this).parent().fadeOut();

});

$('.modal-trigger').click(function() {

  $('.inquires-modal').fadeIn();

});

$('.mobile-menu .button, .footer-cta, .review-cta').click(function(e) {
  e.preventDefault();
  $('.hamburger').removeClass('is-active');
  $('#mobile-menu').slideUp();
  $('.touch-slideout').addClass('open');
  $('body').addClass('no-scroll');

});

$('.touch-slideout > span, .touch-slideout .cover').click(function() {

  $('.touch-slideout').removeClass('open');
  $('body').removeClass('no-scroll');

});

$('.header-search-trigger, .mob-search-trigger').click(function() {

  $('.header-newsletter-trigger').removeClass('active');

  $('.header-newsletter').slideUp(function() {

    $('.header-search').slideToggle();
    
  });

  $('.header-search input').focus();

  $(this).toggleClass('active');

});

$('.header-newsletter-trigger').click(function() {

  $('.header-search-trigger').removeClass('active');

  $('.header-search').slideUp(function() {

    $('.header-newsletter').slideToggle();    

  });

  $(this).toggleClass('active');

});

$('.hp-dif-trigger').click(function() {

  $('html, body').animate({
    scrollTop: $('.hp-why').offset().top
  }, 700);

});

$('.article-share ul').click(function() {

  $(this).parent().toggleClass('open');

});

$('.mob-categories a.active').click(function(e) {

  e.preventDefault();

  $(this).toggleClass('spin').parent().find('.dd').slideToggle();

});

$('.team-filters .mob-filter-trigger').on('click', function() {

  $('.team-filters .input-wrap').toggleClass('active');

  if ($('.team-filters .input-wrap').hasClass('active')) {

    $('.team-filters .input-wrap').focus();

  }

});

$('.team-explore-cta').on('click', function() {

  console.log($('.team-grid').first().offset().top);

  $("html, body").animate({
    scrollTop: $('.team-grid').first().offset().top - 50
  }, 500);

});


$('.best-controls span').on('click', function() {

  var active = $('.best-posts-inner.active');
  var next = $(this).data('id');

  console.log(next);
  console.log(active);

  if (!active.hasClass(next)) {

    console.log('test-2');

    $(this).addClass('active').siblings().removeClass('active');
    $('.best-posts-inner.' + next).addClass('active').fadeIn().siblings().removeClass('active').fadeOut();
    $('.best-cta.' + next).addClass('active').siblings().removeClass('active');

  }

});



$(".single .article-content").each(function(){
	if($(this).is(':empty'))
		$(this).remove();
	if($.trim($(this).text()) == "")
		$(this).remove();
});


$(document).on('touchmove', function(e) {

    if ($('html').hasClass('no-scroll')) {

      e.preventDefault();

    }
    
});

$('.mobile-menu input').focusout(function() {

  $("html, body").animate({ scrollTop: 0 });

});

$('.city-trigger').on('click', function() {

  console.log("test");

  if (!$(this).hasClass('active')) {

    $(this).addClass('active').removeClass('hidden').siblings().removeClass('active').addClass('hidden');
    $('.team-filters ul').slideUp();
    $('.team-filters .city-filters').slideDown();

  } else {

    $(this).removeClass('active').siblings().removeClass('hidden');
    $('.team-filters ul').slideUp();
    $('.team-filters .city-filters').slideUp();

  }

});

$('.speciality-trigger').on('click', function() {

  console.log("test");

  if (!$(this).hasClass('active')) {

    $(this).addClass('active').removeClass('hidden').siblings().removeClass('active').addClass('hidden');
    $('.team-filters .city-filters').slideUp();
    $('.team-filters ul').slideDown();

  } else {

    $(this).removeClass('active').siblings().removeClass('hidden');
    $('.team-filters ul').slideUp();
    $('.team-filters .city-filters').slideUp();

  }

});

$('.agent-testimonials .dots span').on('click', function() {

  var data = $(this).data('id');

  $(this).addClass('active').siblings().removeClass('active');
  $('#quote-' + data).addClass('active').siblings().removeClass('active');

});


$('.team-dropdowns > span, .team-grid-controls > span').on('click', function() {

  $(this).find('.dd-top').slideToggle();

});

$('.team-dropdowns .dd-top > div > span, .team-grid-controls .dd-top > div > span').on('click', function() {

  $(this).next().slideToggle();

});



$(document).keyup(function(e) {
     if (e.keyCode == 27 && $('.inquires-modal').length) { 

      $('.inquires-modal').fadeOut();

    }
});



//*******************
//	Share Stuff - Twitter & Facebook - since we are using our own buttons
//*******************
$('body').on('click', '.article-share a', function(event)
{
	
	var link = this.href;			
	
	var width  = 575,
	    height = 400,
	    left   = ($(window).width()  - width)  / 2,
	    top    = ($(window).height() - height) / 2,
	    url    = link,
	    opts   = 'status=1' +
	             ',width='  + width  +
	             ',height=' + height +
	             ',top='    + top    +
	             ',left='   + left;
	
	window.open(url, 'twitter', opts);
	
	return false;
});	



//*******************
//	Load More Archive Pages
//*******************
$('.load-more.get-archive').on('click', function() {
	
	var $this = $(this);
	
	$('.load-more.get-archive .load-more-text').html('Loading...');
	
	var link_data = $(this).data();
	link_data.paged = link_data.paged+1;
	
	var data = {
		action: 'smartflyer_more_posts',
		data: link_data
	};
	
	$.post(ajaxurl, data, function(response)
	{
		response = $.parseJSON(response);
		$this.data('page',response.page);
		$this.data('exclude', response.exclude);
		
		$('.just-wrap.last .placeholder').before(response.content);	
		
		if(response.content == '')
			$('.load-more.get-archive').hide();	
		else
			$('.load-more.get-archive .load-more-text').html('Load More');	
		
		
		if(response.next_count <= 0)
			$('.load-more.get-archive').hide();
	    
	});

});


//*******************
//	Load More Review Pages
//*******************
$('.load-more.get-reviews').on('click', function() {
	
	var $this = $(this);
	
	$('.load-more.get-reviews .load-more-text').html('Loading...');
	
	var link_data = $(this).data();
	link_data.paged = link_data.paged+1;
	
	var data = {
		action: 'smartflyer_more_reviews',
		data: link_data
	};
	
	$.post(ajaxurl, data, function(response)
	{
		response = $.parseJSON(response);
		$this.data('page',response.page);
		$this.data('exclude', response.exclude);
		
		$('.reviews-main .first-placeholder').before(response.content);	
		
		if(response.content == '')
			$('.load-more.get-reviews').hide();	
		else
			$('.load-more.get-reviews .load-more-text').html('Load More');	
		
		
		if(response.next_count <= 0)
			$('.load-more.get-reviews').hide();
	    
	});

});



$( ".mc-form.mobile .arrow-right-large" ).click(function() {
	$( ".mc-form.mobile" ).submit();
});

//*******************
//	Mailchimp Stuff
//*******************
var ac_email = '';

$('.mc-form').on('submit', function(e) {
	 
	e.preventDefault();
	$('.mc-form.header .message, .mc-form.landing .message, .mc-form.footer .message, .mc-form.article .message, .mc-form.static .message').html('').removeClass('error').removeClass('success');
	
	ac_email = $(this).find('#mc-email').val();
	var form = $( this );
	
	if(!isEmail(ac_email))
	{
		$(this).find('.message').addClass('error');
		$(this).find('.message').html("Email is not valid.");
		
		return false;
	}
	
	
	$('.newsletter-modal').fadeIn();
	
	return false;
    
    
});

/*
$('#ninja_forms_field_36').click(function(){

  if($("#ninja_forms_field_50").is(':checked'))
    if($('#ninja_forms_field_22').val() != 'Email *' && $('#ninja_forms_field_22').val() != '' &&
      $('#ninja_forms_field_20').val() != 'First Name *' && $('#ninja_forms_field_20').val() != '' &&
        $('#ninja_forms_field_21').val() != 'Last Name *' && $('#ninja_forms_field_21').val() != '') {

      ac_email = $('#ninja_forms_field_22').val();
      $("#newsletter-ac").find('input[name=fname]').val($('#ninja_forms_field_20').val());
      $("#newsletter-ac").find('input[name=lname]').val($('#ninja_forms_field_21').val());
      $('#newsletter-ac').submit();
    }
});
 */


$('#newsletter-ac').on('submit', function(e) {

	e.preventDefault();
	$('#newsletter-ac .message').html('').removeClass('error').removeClass('success');
	
	var fname = $(this).find('input[name=fname]').val();
	var lname = $(this).find('input[name=lname]').val();
	var form = $( this );
	
	if(fname == '')
	{
		form.find('.message').addClass('error');
		form.find('.message').html("Please fill in first name.");
		
		return false;
	}
	if(lname == '')
	{
		form.find('.message').addClass('error');
		form.find('.message').html("Please fill in last name.");
		
		return false;
	}
	
	form.find('button').html("Subscribing...").attr("disabled", true);
    
    var data = {
		action: 'exsite_newsletter_ac',
		email: ac_email,
		fname: fname,
		lname: lname,
	};
	
	$.post(ajaxurl, data, function(response)
	{
		response = $.parseJSON(response);
		if(response.result == "error")
		{
			form.find('.message').addClass('error');
			form.find('.message').html(response.msg);			
		}
		
		if(response.result == "success"){
			form.find('.message').addClass('success');
			form.find('.message').html(response.msg);
		}
		
		form.find('button').html("Subscribe<svg class='arrow-right'><use xlink:href=\"#arrow-right\"></use></svg>").attr("disabled", false);
	});

	return false;
});


function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}



/*

$('.mc-form').ajaxChimp({
    url: 'https://smartflyer.us4.list-manage.com/subscribe/post?u=cb63808817bf526b3d0202f6b&amp;id=000d4f0546',
    callback: newsletter_submit
});

$('.newsletter_message').hide();

function newsletter_submit(resp,form)
{	
	var form_class = '';
		
	$('.mc-form.header .message,.mc-form.mobile .message, .mc-form.footer .message').html('').removeClass('error').removeClass('success');
	
	var parts = resp.msg.split(' - ', 2);
    if (parts[1] === undefined) {
        msg = resp.msg;
    } else {
        var i = parseInt(parts[0], 10);
        if (i.toString() === parts[0]) {
            index = parts[0];
            msg = parts[1];
        } else {
            index = -1;
            msg = resp.msg;
        }
    }
    

    if(form.hasClass('footer'))
    	form_class = '.mc-form.footer';
    
    if(form.hasClass('header'))
    	form_class = '.mc-form.header';
    
    if(form.hasClass('mobile'))
    	form_class = '.mc-form.mobile';
    	
    if(form.hasClass('hp'))
    	form_class = '.mc-form.hp';
    
    if(form.hasClass('single'))
    	form_class = '.mc-form.single';
    	
    if(form.hasClass('mobile-menu'))
    	form_class = '.mc-form.mobile-menu';
    
	
	if(resp.result == "error")
	{
		$(form_class+' .message').addClass('error');
		$(form_class+' .message').html(msg);			
	}
	
	if(resp.result == "success"){
		$(form_class+' .message').addClass('success');
		$(form_class+' .message').html(msg);
	}
}

*/



//*******************
//	Filters - Team Landing
//*******************


var QueryString = function () {
  // This function is anonymous, is executed immediately and 
  // the return value is assigned to QueryString!
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
        // If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = decodeURIComponent(pair[1]);
        // If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
      query_string[pair[0]] = arr;
        // If third or later entry with this name
    } else {
      query_string[pair[0]].push(decodeURIComponent(pair[1]));
    }
  } 
    return query_string;
}();


$('.reviews-filters .city span').click(function(event)
{	
	event.preventDefault();	
	var filter = $(this).data('filter');
	update_resources('location', filter);
});

$('.reviews-filters .spec span').click(function(event)
{	
	event.preventDefault();	
	var filter = $(this).data('filter');
	update_resources('specialty', filter);
});


$('.reviews-filters .sortby.team span').click(function(event)
{	
	event.preventDefault();	
	var filter = $(this).data('filter');
	update_resources('sort', filter);
});

$('.reviews-filters .management-click').click(function(event)
{	
	event.preventDefault();	
	var filter = 'yes';
	if($('.reviews-filters .management-click .box').hasClass('active'))
		filter = 'no';	
	update_resources('management', filter);
});

$('.new-why-us .next, .new-why-us .mob-next').on('click', function() {

  var next = $(this).parents('.content-wrap').find('.content.active').next('.content');
  console.log(next);

  if (next.length) {

    console.log('next');
    next.addClass('active').siblings().removeClass('active');
    $('#why-counter').html(next.data('id'));
    $('.sketches .active').removeClass('active').next().addClass('active');

  } else {

    console.log('no next');
    next = $(this).parents('.content-wrap').find('.content').first();
    next.addClass('active').siblings().removeClass('active');
    $('#why-counter').html(next.data('id'));
    $('.sketches img').first().addClass('active').siblings().removeClass('active');

  }
  

});

$('.new-why-us .prev').on('click', function() {

  var prev = $(this).parents('.content-wrap').find('.content.active').prev('.content');
  console.log(prev);

  if (prev.length) {

    console.log('prev');
    prev.addClass('active').siblings().removeClass('active');
    $('#why-counter').html(prev.data('id'));
    $('.sketches .active').removeClass('active').prev().addClass('active');

  } else {

    console.log('no prev');
    prev = $(this).parents('.content-wrap').find('.content').last();
    prev.addClass('active').siblings().removeClass('active');
    $('#why-counter').html(prev.data('id'));
    $('.sketches img').last().addClass('active').siblings().removeClass('active');

  }
  

});




$('.team-filters .city-filtering span.city').click(function(event)
{	
	event.preventDefault();	
	var filter = $(this).data('filter');
	update_resources('location', filter);
});

$('.team-filters .spec-filtering span.spec').click(function(event)
{	
	event.preventDefault();	
	var filter = $(this).data('filter');
	update_resources('specialty', filter);
});

$('.team-filters .team-cta').click(function(event)
{	
	event.preventDefault();	
	var filter = 'yes';
	update_resources('management', filter);
});


$('.team-filters input').keyup(function(e){
	if(e.keyCode == 13)
    {
		event.preventDefault();	
		update_resources('search', $(".team-filters input").val());
	}
});

$('.team-filters button').click(function(event){
	event.preventDefault();	
	update_resources('search', $(".team-filters input").val());
});



$('.search-tag').click(function(event){
	event.preventDefault();
	var filter = $(this).data('filter');
	update_resources('search', 'search-REMOVE');
});


$('.location-tag').click(function(event){
	event.preventDefault();
	var filter = $(this).data('filter');
	update_resources('location', 'location-REMOVE');
});


$('.specialty-tag').click(function(event){
	event.preventDefault();
	var filter = $(this).data('filter');
	update_resources('specialty', 'specialty-REMOVE');
});


function update_resources(type, filter)
{
	var url = window.location.href.split("?");	
	var add_to_url = '';
	
	if(type == 'location' && filter != 'location-REMOVE')
		add_to_url += '&location='+filter;
	else if(typeof QueryString.location !== 'undefined' && filter != 'location-REMOVE')
		add_to_url += '&location='+QueryString.location;
	
	
	if(type == 'specialty' && filter != 'specialty-REMOVE')
		add_to_url += '&specialty='+filter;
	else if(typeof QueryString.specialty !== 'undefined' && filter != 'specialty-REMOVE')
		add_to_url += '&specialty='+QueryString.specialty;
	
	if(type == 'management')
		add_to_url += '&management='+filter;
	else if(typeof QueryString.management !== 'undefined')
		add_to_url += '&management='+QueryString.management;
	
	if(type == 'search' && filter != 'search-REMOVE')
		add_to_url += '&search='+filter;
	else if(typeof QueryString.search !== 'undefined' && filter != 'search-REMOVE')
		add_to_url += '&search='+QueryString.search;
		
	if(type == 'sort')
		add_to_url += '&sort='+filter;
	else if(typeof QueryString.sort !== 'undefined')
		add_to_url += '&sort='+QueryString.sort;
	
		
	window.location = url[0]+'?'+add_to_url;    
}



var team_size = $(".reviews-main .agent .whole-click").length;
var load_teams = 16;
var x = load_teams; 
$('.reviews-main .agent.whole-click:lt('+load_teams+')').show();

$('.more-profiles').click(function () {
    x = (x+load_teams <= team_size) ? x+load_teams : team_size;
    $('.reviews-main .agent.whole-click:lt('+x+')').show();
    
    if(x>=team_size)
    	$('.more-profiles').hide();
});

//*******************
//	Filters - Reviews
//*******************

var hp_review_region = '';
var hp_review_style = '';

var hp_review_region_name = '';
var hp_review_style_name = '';

$('.home .hp-where-to .region .dd span').click(function(event)
{	
	event.preventDefault();	
	var filter = $(this).data('filter');
	$('.hp-where-to .dd-top.region .name').html('Loading...')
	hp_review_region = filter;
	hp_review_region_name = $(this).data('name');
	update_review_home();

  $(this).parents('.dd').slideUp();
  $(this).parents('.dd-top').removeClass('active');
	
});


$('.home .hp-where-to .style .dd span').click(function(event)
{	
	event.preventDefault();	
	var filter = $(this).data('filter');
	$('.hp-where-to .dd-top.style .name').html('Loading...')
	hp_review_style = filter;
	hp_review_style_name = $(this).data('name');
	update_review_home();
  $(this).parents('.dd').slideUp();
  $(this).parents('.dd-top').removeClass('active');
  
});

function update_review_home()
{
	var link_reviews_home = '/reviews/?';
	if(hp_review_region != '')
		link_reviews_home += 'region='+hp_review_region;
	
	if(hp_review_style != '')
		if(hp_review_region != '')
			link_reviews_home += '&style='+hp_review_style;
		else
			link_reviews_home += 'style='+hp_review_style;
	
	$('.hp-where-to .all-link').attr('href',link_reviews_home);
	

	var data = {
		action: 'smartflyer_home_reviews',
		data: {'region':hp_review_region,'style':hp_review_style}
	};
	
	$.post(ajaxurl, data, function(response)
	{
		response = $.parseJSON(response);		
		
		$('.hp-where-to .large-review').replaceWith(response.content_large);
		
		$('.hp-where-to .col .small-review').remove();
		$('.hp-where-to .col .controls').after(response.content_small);
		
		if(hp_review_region != '')
			$('.hp-where-to .dd-top.region .name').html(hp_review_region_name)
		if(hp_review_style != '')
			$('.hp-where-to .dd-top.style .name').html(hp_review_style_name)
	});
}


$('.reviews-filters .step-2').show();
$('.reviews-filters .region span').click(function(event)
{	
	var filter = $(this).data('filter');
	update_reviews('region', filter);
});
$('.reviews-filters .partners span').click(function(event)
{	
	var filter = $(this).data('filter');
	window.location  = filter;
});

$('.reviews-filters .style li').click(function(event)
{	
	event.preventDefault();	
	$(this).toggleClass('active');

  if ($(this).parent().find('.active').length) {

    console.log('test!');
    $(this).parents('.dd').find('.button').addClass('apply');

  }

});


$('.reviews-filters .dd-apply').click(function(event)
{	
	event.preventDefault();	
	var region = $('.reviews-filters .region span.active').data('filter');
	var style = '';
	$( ".reviews-filters .style li.active" ).each(function( index ) {
		style += '-'+$(this).data('filter');
	});
	$( ".reviews-filters .style li.selected" ).each(function( index ) {
		style += '-'+$(this).data('filter');
	});
	style = style.substring(1);
	update_reviews('style', style);
});


$('.reviews-filters .sortby.reviews span').click(function(event)
{	
	event.preventDefault();
	var filter = $(this).data('filter');
	update_reviews('sort', filter);
});

$('.reviews-tags .tag').click(function(){
	event.preventDefault();
	var filter = $(this).data('filter');	
	$( ".reviews-filters .style li.style_filter_"+filter ).removeClass('selected');
	$('.reviews-filters .dd-apply').click();
});


function update_reviews(type, filter)
{
	var url = window.location.href.split("?");	
	var add_to_url = '';
	
	if(type == 'region')
		add_to_url += '&region='+filter;
	else if(typeof QueryString.region !== 'undefined')
		add_to_url += '&region='+QueryString.region;
	
	if(filter != '')
	{
		if(type == 'style')
			add_to_url += '&style='+filter;
		else if(typeof QueryString.style !== 'undefined')
			add_to_url += '&style='+QueryString.style;
	}
	
	
	if(type == 'sort')
		add_to_url += '&sort='+filter;
	else if(typeof QueryString.sort !== 'undefined')
		add_to_url += '&sort='+QueryString.sort;
		
	window.location = '/reviews/?'+add_to_url;
}


$('.team-grid-controls .selection').click(function(){
	update_team_selections($(this))
});

$('.near-by-me-btn').click(function(){
  var default_city = $('#default-city').val();
  console.log(default_city.toLowerCase().replace(' ', '-'));
  var where = 'location';
	var text = default_city.toLowerCase().replace(' ', '-');
	$('.reviews-main.'+where).slideUp();
	$('.all-link-'+where).attr('href','/agents/?'+where+'='+text);
  var data = {
		action: 'smartflyer_team_selection',
		data: {
      where: 'location',
      filter: text,
      tax: 'agent_location'
    }
	};
  console.log(data);
  $.post(ajaxurl, data, function(response)
	{
		response = $.parseJSON(response);		
		$('.reviews-main.'+where).html(response.content);
		$('.reviews-main.'+where).slideDown();
	});
});


$('.team-grid-controls select.mobile-selections').on('change', function() {
	var text = $(this).find(":selected").text();
  update_team_selections($(this).find(":selected"), true)
  $(this).siblings('small').text(text);
});


function update_team_selections($this, mobile_sel = false)
{
	var where = $this.data('where');
	var text = $this.data('filter');
	$('.reviews-main.'+where).slideUp();
	$('.all-link-'+where).attr('href','/agents/?'+where+'='+$this.data('filter'));
	
	if(!mobile_sel)
	{
		$this.parent().hide().parents('.dd-top').hide();
		$this.parents('.dd-top').parent().find('small').text('Loading...');
	}
	var data = {
		action: 'smartflyer_team_selection',
		data: $this.data()
	};
	
	$.post(ajaxurl, data, function(response)
	{
		response = $.parseJSON(response);		
		$('.reviews-main.'+where).html(response.content);
		if(!mobile_sel)
		{
			$this.parents('.dd-top').parent().find('small').text(text);
		}
		$('.reviews-main.'+where).slideDown();
	});
}



$('.newsletter-modal__close, .newsletter-modal__shade').on('click', function() {

  $('.newsletter-modal').fadeOut();

});



$( "figcaption.wp-caption-text" ).replaceWith( "" );


jQuery('.ninja-forms-form').on('submitResponse', function(e, response) {
    if (response.errors === false)
    {
	    if(response.form_id == 14)
	    {
		    if(response.fields[49] == "checked")
		    {
			    $('.mc-form.footer #mc-email').val(response.fields[39]);
			    $('.mc-form.footer').submit();
		    }
	    }
	    
	    if(response.form_id == 9)
	    {
		    if(response.fields[50] == "checked")
		    {
			    $('.mc-form.footer #mc-email').val(response.fields[22]);
			    $('.mc-form.footer').submit();
		    }
	    }
	    
    }
});
  $('.agent-info').on("click", function(){
    var where = $('.agent-selection').find('option:selected').attr('data-where');
    var filter =  $('.agent-selection').find('option:selected').attr('data-filter');
    var url = document.URL + '/agents/?'+where+'='+filter;
    window.location.href = url;
  });
});
})(jQuery); 


