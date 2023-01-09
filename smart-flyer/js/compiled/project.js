'use strict';

(function ($) {
  $(document).ready(function ($) {

    $('.article-content').fitVids();

    //Global Variables

    var vpWidth;

    //Global Functions

    function viewport() {

      var e = window,
          a = 'inner';

      if (!('innerWidth' in window)) {

        a = 'client';
        e = document.documentElement || document.body;
      }

      return { width: e[a + 'Width'], height: e[a + 'Height'] };
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

      if (vpWidth <= 1200 && vpWidth > 800) {

        if ($('.itinerary-intro .author-detail').length) {

          $('.author-detail .authors').on('afterChange init', function () {

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
            nextArrow: '<span class="slick-next"><svg class="chev-right"><use xlink:href="#chev-right"></use></svg></span>'

          });
        }

        if ($('.itinerary-intro .credits').length) {

          $('.author-detail .credits').on('afterChange init', function () {

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
            nextArrow: '<span class="slick-next"><svg class="chev-right"><use xlink:href="#chev-right"></use></svg></span>'

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
      } else {

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

          $('.agent').each(function () {

            $(this).find('.content > h3').appendTo($(this).find('.profile'));
          });
        }

        if ($('.agent-sidebar').length) {

          $('.agent-sidebar .agent-profile').prependTo('.agent-sidebar .sticky');
        }
      } else if (vpWidth > 600 && vpWidth <= 960) {

        if ($('.agent-sidebar').length) {

          $('.agent-sidebar .agent-meta').prependTo('.agent-sidebar .sticky');
        }
      }
    }

    function authorWrapCheck() {

      $('.review-row-inner .author-wrap span').each(function () {

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
        //console.log(scroll);
        //console.log($('.article-share').offset().top);

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

      $('.review-row').each(function () {

        if ($(this).find('.review-row-inner').height() > 90) {

          $(this).addClass('tall');
        }
      });
    }

    function reviewSliderSizes() {

      var imgHeight = 9999;

      $('.review-featured img').height('auto');

      $('.review-featured img').each(function () {

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

      var scrollMid = $(window).scrollTop() + viewport().height / 2;
      var min = $('.itinerary-article').offset().top;
      var topCheck;
      var botCheck;
      var tar;

      if (scrollMid > min) {

        $('.itinerary-article section').each(function () {

          console.log('test 1');

          topCheck = $(this).offset().top;
          botCheck = topCheck + $(this).outerHeight();

          if (scrollMid > topCheck && scrollMid < botCheck) {

            tar = $(this).attr('id');
            console.log(tar);
          }
        });

        $('#nav-' + tar).addClass('active').siblings().removeClass('active');
      }
    }

    $('.itinerary-nav span').on('click', function () {

      var dat = $(this).data('anchor');
      var tar = $('#' + dat).offset().top;
      $("html, body").animate({ scrollTop: tar }, 500);
    });

    $('.highlights-list a').on('click', function (e) {

      e.preventDefault();

      var dat = $(this).attr('href');
      var tar = $(dat).offset().top - 28;

      $("html, body").animate({ scrollTop: tar }, 500);
    });

    var sticky = false;

    function stickMe() {

      var scroll = $(window).scrollTop() + viewport().height - 48;
      var scrollTop = $(window).scrollTop();

      $('.sticky').each(function () {

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

      $('.stay-slide .content p').each(function () {

        var height = $(this).parent().outerHeight();
        var sHeight = $(this)[0].scrollHeight;

        console.log(height);
        console.log(sHeight);

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
        responsive: [{

          breakpoint: 600,
          settings: {

            slidesToShow: 1.2,
            slidesToScroll: 1

          }

        }]

      });

      staySliderInit();
    }

    $('.stay-slider .content-cta').on('click', function () {

      var height = $(this).prev().outerHeight();
      var sHeight = $(this).prev().find('p')[0].scrollHeight;

      $(this).prev().outerHeight(sHeight).addClass('tall');
      $(this).hide();
    });

    $('.inner-slider-next').on('click', function () {

      $(this).parents('.inner-slider').find('.active').removeClass('active').next('.image-wrap').addClass('active');

      if (!$(this).parents('.inner-slider').find('.active').next('.image-wrap').length) {

        $(this).addClass('disabled');
      }

      $(this).parent().find('.inner-slider-prev').removeClass('disabled');
    });

    $('.inner-slider-prev').on('click', function () {

      $(this).parents('.inner-slider').find('.active').removeClass('active').prev('.image-wrap').addClass('active');

      if (!$(this).parents('.inner-slider').find('.active').prev('.image-wrap').length) {

        $(this).addClass('disabled');
      }

      $(this).parent().find('.inner-slider-next').removeClass('disabled');
    });

    //Functions on Load

    $(window).load(function () {

      vpWidth = viewport().width;
      mobileMoves();

      if ($('.sticky').length) {

        stickMe();
      }

      if ($('.review').length) {

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

    $(window).on('resize', function () {

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

    $(window).on('scroll', function () {

      articleShare();

      if ($('.sticky').length) {

        stickMe();
      }

      if ($('.itinerary-article').length) {

        itineraryBlockCheck();
      }
    });

    //Functions on Click

    $('body').on('click', '.whole-click', function () {
      var new_window = false;
      var gotolink = $(this).find("a").attr("href");
      if ($(this).find("a").attr("target") == '_blank') new_window = true;
      if ($(this).find("a.link-me").attr("href") !== undefined) {
        gotolink = $(this).find("a.link-me").attr("href");
        if ($(this).find("a.link-me").attr('target') == '_blank') new_window = true;
      }
      if (new_window) window.open(gotolink);else window.location = gotolink;
    });

    $('body').on('click', '.whole-click-press-image', function () {
      event.preventDefault();
      var image = $(this).find("a").attr("href");
      $('.agent-lightbox.press #press-image').attr('src', image);
      $('.agent-lightbox.press').fadeIn();
    });

    $('.hamburger').click(function () {

      $('#mobile-menu').slideToggle('slow');
      $(this).toggleClass('is-active');
      $('body, html').toggleClass('no-scroll');
    });

    $('.hp-why .col-4').click(function () {

      if (vpWidth <= 600) {

        $(this).find('.mob-arrow').toggleClass('flip');
        $(this).find('p').slideToggle();
      }
    });

    $('.review-row').click(function () {

      if ($(this).hasClass('tall')) {
        console.log('test');
        $(this).removeClass('tall').addClass('expanded');
      }
    });

    $('.dd-top').click(function () {

      $(this).siblings('.dd-top').removeClass('active').find('.dd').slideUp();
      $(this).parent().siblings().find('.dd').slideUp();
      $(this).find('.dd').slideToggle();
      $(this).toggleClass('active');
    }).children().not('svg.arrow-down').click(function (e) {
      return false;
    });

    $('.dd-top span.name').click(function () {

      var $this = $(this).parent();
      $this.siblings('.dd-top').removeClass('active').find('.dd').slideUp();
      $this.parent().siblings().find('.dd').slideUp();
      $this.find('.dd').slideToggle();
      $this.toggleClass('active');
    }).children().not('svg.arrow-down').click(function (e) {
      return false;
    });

    $('.lightbox-trigger').click(function () {

      $('.agent-lightbox.gallery').fadeIn();
    });

    $('.lb-close-trigger').click(function () {

      $(this).parent().fadeOut();
    });

    $('.lb-change-trigger').click(function () {

      var dir = $(this).data('dir');
      var cur = $('.agent-lightbox.gallery figure.active').data('slide');
      var total = $('.agent-lightbox.gallery figure').length;
      var next = cur + dir;

      if (next > total) {

        next = 1;
      } else if (next <= 0) {

        next = total;
      }

      $('.agent-lightbox.gallery figure.active').removeClass('active').fadeOut(function () {

        $('#slide-' + next).addClass('active').fadeIn();
      });
    });

    $('.au-trigger').click(function () {

      $(this).addClass('active');
      $(this).siblings().removeClass('active');
      $('.na-details').slideUp();
      $('.au-details').slideDown();
    });

    $('.na-trigger').click(function () {

      $(this).addClass('active');
      $(this).siblings().removeClass('active');
      $('.au-details').slideUp();
      $('.na-details').slideDown();
    });

    $('.inquires-modal-close').click(function () {

      $(this).parent().fadeOut();
    });

    $('.modal-trigger').click(function () {

      $('.inquires-modal').fadeIn();
    });

    $('.mobile-menu .button, .footer-cta, .review-cta').click(function (e) {
      e.preventDefault();
      $('.hamburger').removeClass('is-active');
      $('#mobile-menu').slideUp();
      $('.touch-slideout').addClass('open');
      $('body').addClass('no-scroll');
    });

    $('.touch-slideout > span, .touch-slideout .cover').click(function () {

      $('.touch-slideout').removeClass('open');
      $('body').removeClass('no-scroll');
    });

    $('.header-search-trigger, .mob-search-trigger').click(function () {

      $('.header-newsletter-trigger').removeClass('active');

      $('.header-newsletter').slideUp(function () {

        $('.header-search').slideToggle();
      });

      $('.header-search input').focus();

      $(this).toggleClass('active');
    });

    $('.header-newsletter-trigger').click(function () {

      $('.header-search-trigger').removeClass('active');

      $('.header-search').slideUp(function () {

        $('.header-newsletter').slideToggle();
      });

      $(this).toggleClass('active');
    });

    $('.hp-dif-trigger').click(function () {

      $('html, body').animate({
        scrollTop: $('.hp-why').offset().top
      }, 700);
    });

    $('.article-share ul').click(function () {

      $(this).parent().toggleClass('open');
    });

    $('.mob-categories a.active').click(function (e) {

      e.preventDefault();

      $(this).toggleClass('spin').parent().find('.dd').slideToggle();
    });

    $('.team-filters .mob-filter-trigger').on('click', function () {

      $('.team-filters .input-wrap').toggleClass('active');

      if ($('.team-filters .input-wrap').hasClass('active')) {

        $('.team-filters .input-wrap').focus();
      }
    });

    $('.team-explore-cta').on('click', function () {

      console.log($('.team-grid').first().offset().top);

      $("html, body").animate({
        scrollTop: $('.team-grid').first().offset().top - 50
      }, 500);
    });

    $('.best-controls span').on('click', function () {

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

    $(".single .article-content").each(function () {
      if ($(this).is(':empty')) $(this).remove();
      if ($.trim($(this).text()) == "") $(this).remove();
    });

    $(document).on('touchmove', function (e) {

      if ($('html').hasClass('no-scroll')) {

        e.preventDefault();
      }
    });

    $('.mobile-menu input').focusout(function () {

      $("html, body").animate({ scrollTop: 0 });
    });

    $('.city-trigger').on('click', function () {

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

    $('.speciality-trigger').on('click', function () {

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

    $('.agent-testimonials .dots span').on('click', function () {

      var data = $(this).data('id');

      $(this).addClass('active').siblings().removeClass('active');
      $('#quote-' + data).addClass('active').siblings().removeClass('active');
    });

    $('.team-dropdowns > span, .team-grid-controls > span').on('click', function () {

      $(this).find('.dd-top').slideToggle();
    });

    $('.team-dropdowns .dd-top > div > span, .team-grid-controls .dd-top > div > span').on('click', function () {

      $(this).next().slideToggle();
    });

    $(document).keyup(function (e) {
      if (e.keyCode == 27 && $('.inquires-modal').length) {

        $('.inquires-modal').fadeOut();
      }
    });

    //*******************
    //	Share Stuff - Twitter & Facebook - since we are using our own buttons
    //*******************
    $('body').on('click', '.article-share a', function (event) {

      var link = this.href;

      var width = 575,
          height = 400,
          left = ($(window).width() - width) / 2,
          top = ($(window).height() - height) / 2,
          url = link,
          opts = 'status=1' + ',width=' + width + ',height=' + height + ',top=' + top + ',left=' + left;

      window.open(url, 'twitter', opts);

      return false;
    });

    //*******************
    //	Load More Archive Pages
    //*******************
    $('.load-more.get-archive').on('click', function () {

      var $this = $(this);

      $('.load-more.get-archive .load-more-text').html('Loading...');

      var link_data = $(this).data();
      link_data.paged = link_data.paged + 1;

      var data = {
        action: 'smartflyer_more_posts',
        data: link_data
      };

      $.post(ajaxurl, data, function (response) {
        response = $.parseJSON(response);
        $this.data('page', response.page);
        $this.data('exclude', response.exclude);

        $('.just-wrap.last .placeholder').before(response.content);

        if (response.content == '') $('.load-more.get-archive').hide();else $('.load-more.get-archive .load-more-text').html('Load More');

        if (response.next_count <= 0) $('.load-more.get-archive').hide();
      });
    });

    //*******************
    //	Load More Review Pages
    //*******************
    $('.load-more.get-reviews').on('click', function () {

      var $this = $(this);

      $('.load-more.get-reviews .load-more-text').html('Loading...');

      var link_data = $(this).data();
      link_data.paged = link_data.paged + 1;

      var data = {
        action: 'smartflyer_more_reviews',
        data: link_data
      };

      $.post(ajaxurl, data, function (response) {
        response = $.parseJSON(response);
        $this.data('page', response.page);
        $this.data('exclude', response.exclude);

        $('.reviews-main .first-placeholder').before(response.content);

        if (response.content == '') $('.load-more.get-reviews').hide();else $('.load-more.get-reviews .load-more-text').html('Load More');

        if (response.next_count <= 0) $('.load-more.get-reviews').hide();
      });
    });

    $(".mc-form.mobile .arrow-right-large").click(function () {
      $(".mc-form.mobile").submit();
    });

    //*******************
    //	Mailchimp Stuff
    //*******************
    var ac_email = '';

    $('.mc-form').on('submit', function (e) {

      e.preventDefault();
      $('.mc-form.header .message, .mc-form.landing .message, .mc-form.footer .message, .mc-form.article .message, .mc-form.static .message').html('').removeClass('error').removeClass('success');

      ac_email = $(this).find('#mc-email').val();
      var form = $(this);

      if (!isEmail(ac_email)) {
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

    $('#newsletter-ac').on('submit', function (e) {

      e.preventDefault();
      $('#newsletter-ac .message').html('').removeClass('error').removeClass('success');

      var fname = $(this).find('input[name=fname]').val();
      var lname = $(this).find('input[name=lname]').val();
      var form = $(this);

      if (fname == '') {
        form.find('.message').addClass('error');
        form.find('.message').html("Please fill in first name.");

        return false;
      }
      if (lname == '') {
        form.find('.message').addClass('error');
        form.find('.message').html("Please fill in last name.");

        return false;
      }

      form.find('button').html("Subscribing...").attr("disabled", true);

      var data = {
        action: 'exsite_newsletter_ac',
        email: ac_email,
        fname: fname,
        lname: lname
      };

      $.post(ajaxurl, data, function (response) {
        response = $.parseJSON(response);
        if (response.result == "error") {
          form.find('.message').addClass('error');
          form.find('.message').html(response.msg);
        }

        if (response.result == "success") {
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
      for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        // If first entry with this name
        if (typeof query_string[pair[0]] === "undefined") {
          query_string[pair[0]] = decodeURIComponent(pair[1]);
          // If second entry with this name
        } else if (typeof query_string[pair[0]] === "string") {
          var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
          query_string[pair[0]] = arr;
          // If third or later entry with this name
        } else {
          query_string[pair[0]].push(decodeURIComponent(pair[1]));
        }
      }
      return query_string;
    }();

    $('.reviews-filters .city span').click(function (event) {
      event.preventDefault();
      var filter = $(this).data('filter');
      update_resources('location', filter);
    });

    $('.reviews-filters .spec span').click(function (event) {
      event.preventDefault();
      var filter = $(this).data('filter');
      update_resources('specialty', filter);
    });

    $('.reviews-filters .sortby.team span').click(function (event) {
      event.preventDefault();
      var filter = $(this).data('filter');
      update_resources('sort', filter);
    });

    $('.reviews-filters .management-click').click(function (event) {
      event.preventDefault();
      var filter = 'yes';
      if ($('.reviews-filters .management-click .box').hasClass('active')) filter = 'no';
      update_resources('management', filter);
    });

    $('.new-why-us .next, .new-why-us .mob-next').on('click', function () {

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

    $('.new-why-us .prev').on('click', function () {

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

    $('.team-filters .city-filtering span.city').click(function (event) {
      event.preventDefault();
      var filter = $(this).data('filter');
      update_resources('location', filter);
    });

    $('.team-filters .spec-filtering span.spec').click(function (event) {
      event.preventDefault();
      var filter = $(this).data('filter');
      update_resources('specialty', filter);
    });

    $('.team-filters .team-cta').click(function (event) {
      event.preventDefault();
      var filter = 'yes';
      update_resources('management', filter);
    });

    $('.team-filters input').keyup(function (e) {
      if (e.keyCode == 13) {
        event.preventDefault();
        update_resources('search', $(".team-filters input").val());
      }
    });

    $('.team-filters button').click(function (event) {
      event.preventDefault();
      update_resources('search', $(".team-filters input").val());
    });

    $('.search-tag').click(function (event) {
      event.preventDefault();
      var filter = $(this).data('filter');
      update_resources('search', 'search-REMOVE');
    });

    $('.location-tag').click(function (event) {
      event.preventDefault();
      var filter = $(this).data('filter');
      update_resources('location', 'location-REMOVE');
    });

    $('.specialty-tag').click(function (event) {
      event.preventDefault();
      var filter = $(this).data('filter');
      update_resources('specialty', 'specialty-REMOVE');
    });

    function update_resources(type, filter) {
      var url = window.location.href.split("?");
      var add_to_url = '';

      if (type == 'location' && filter != 'location-REMOVE') add_to_url += '&location=' + filter;else if (typeof QueryString.location !== 'undefined' && filter != 'location-REMOVE') add_to_url += '&location=' + QueryString.location;

      if (type == 'specialty' && filter != 'specialty-REMOVE') add_to_url += '&specialty=' + filter;else if (typeof QueryString.specialty !== 'undefined' && filter != 'specialty-REMOVE') add_to_url += '&specialty=' + QueryString.specialty;

      if (type == 'management') add_to_url += '&management=' + filter;else if (typeof QueryString.management !== 'undefined') add_to_url += '&management=' + QueryString.management;

      if (type == 'search' && filter != 'search-REMOVE') add_to_url += '&search=' + filter;else if (typeof QueryString.search !== 'undefined' && filter != 'search-REMOVE') add_to_url += '&search=' + QueryString.search;

      if (type == 'sort') add_to_url += '&sort=' + filter;else if (typeof QueryString.sort !== 'undefined') add_to_url += '&sort=' + QueryString.sort;

      window.location = url[0] + '?' + add_to_url;
    }

    var team_size = $(".reviews-main .agent.whole-click").size();
    var load_teams = 16;
    var x = load_teams;
    $('.reviews-main .agent.whole-click:lt(' + load_teams + ')').show();

    $('.more-profiles').click(function () {
      x = x + load_teams <= team_size ? x + load_teams : team_size;
      $('.reviews-main .agent.whole-click:lt(' + x + ')').show();

      if (x >= team_size) $('.more-profiles').hide();
    });

    //*******************
    //	Filters - Reviews
    //*******************

    var hp_review_region = '';
    var hp_review_style = '';

    var hp_review_region_name = '';
    var hp_review_style_name = '';

    $('.home .hp-where-to .region .dd span').click(function (event) {
      event.preventDefault();
      var filter = $(this).data('filter');
      $('.hp-where-to .dd-top.region .name').html('Loading...');
      hp_review_region = filter;
      hp_review_region_name = $(this).data('name');
      update_review_home();

      $(this).parents('.dd').slideUp();
      $(this).parents('.dd-top').removeClass('active');
    });

    $('.home .hp-where-to .style .dd span').click(function (event) {
      event.preventDefault();
      var filter = $(this).data('filter');
      $('.hp-where-to .dd-top.style .name').html('Loading...');
      hp_review_style = filter;
      hp_review_style_name = $(this).data('name');
      update_review_home();
      $(this).parents('.dd').slideUp();
      $(this).parents('.dd-top').removeClass('active');
    });

    function update_review_home() {
      var link_reviews_home = '/reviews/?';
      if (hp_review_region != '') link_reviews_home += 'region=' + hp_review_region;

      if (hp_review_style != '') if (hp_review_region != '') link_reviews_home += '&style=' + hp_review_style;else link_reviews_home += 'style=' + hp_review_style;

      $('.hp-where-to .all-link').attr('href', link_reviews_home);

      var data = {
        action: 'smartflyer_home_reviews',
        data: { 'region': hp_review_region, 'style': hp_review_style }
      };

      $.post(ajaxurl, data, function (response) {
        response = $.parseJSON(response);

        $('.hp-where-to .large-review').replaceWith(response.content_large);

        $('.hp-where-to .col .small-review').remove();
        $('.hp-where-to .col .controls').after(response.content_small);

        if (hp_review_region != '') $('.hp-where-to .dd-top.region .name').html(hp_review_region_name);
        if (hp_review_style != '') $('.hp-where-to .dd-top.style .name').html(hp_review_style_name);
      });
    }

    $('.reviews-filters .step-2').show();
    $('.reviews-filters .region span').click(function (event) {
      var filter = $(this).data('filter');
      update_reviews('region', filter);
    });
    $('.reviews-filters .partners span').click(function (event) {
      var filter = $(this).data('filter');
      window.location = filter;
    });

    $('.reviews-filters .style li').click(function (event) {
      event.preventDefault();
      $(this).toggleClass('active');

      if ($(this).parent().find('.active').length) {

        console.log('test!');
        $(this).parents('.dd').find('.button').addClass('apply');
      }
    });

    $('.reviews-filters .dd-apply').click(function (event) {
      event.preventDefault();
      var region = $('.reviews-filters .region span.active').data('filter');
      var style = '';
      $(".reviews-filters .style li.active").each(function (index) {
        style += '-' + $(this).data('filter');
      });
      $(".reviews-filters .style li.selected").each(function (index) {
        style += '-' + $(this).data('filter');
      });
      style = style.substring(1);
      update_reviews('style', style);
    });

    $('.reviews-filters .sortby.reviews span').click(function (event) {
      event.preventDefault();
      var filter = $(this).data('filter');
      update_reviews('sort', filter);
    });

    $('.reviews-tags .tag').click(function () {
      event.preventDefault();
      var filter = $(this).data('filter');
      $(".reviews-filters .style li.style_filter_" + filter).removeClass('selected');
      $('.reviews-filters .dd-apply').click();
    });

    function update_reviews(type, filter) {
      var url = window.location.href.split("?");
      var add_to_url = '';

      if (type == 'region') add_to_url += '&region=' + filter;else if (typeof QueryString.region !== 'undefined') add_to_url += '&region=' + QueryString.region;

      if (filter != '') {
        if (type == 'style') add_to_url += '&style=' + filter;else if (typeof QueryString.style !== 'undefined') add_to_url += '&style=' + QueryString.style;
      }

      if (type == 'sort') add_to_url += '&sort=' + filter;else if (typeof QueryString.sort !== 'undefined') add_to_url += '&sort=' + QueryString.sort;

      window.location = '/reviews/?' + add_to_url;
    }

    $('.team-grid-controls .selection').click(function () {
      update_team_selections($(this));
    });

    $('.team-grid-controls select.mobile-selections').on('change', function () {
      var text = $(this).find(":selected").text();
      update_team_selections($(this).find(":selected"), true);
      $(this).siblings('small').text(text);
    });

    function update_team_selections($this) {
      var mobile_sel = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

      var where = $this.data('where');
      var text = $this.data('filter');
      $('.reviews-main.' + where).slideUp();
      $('.all-link-' + where).attr('href', '/agents/?' + where + '=' + $this.data('filter'));

      if (!mobile_sel) {
        $this.parent().hide().parents('.dd-top').hide();
        $this.parents('.dd-top').parent().find('small').text('Loading...');
      }
      var data = {
        action: 'smartflyer_team_selection',
        data: $this.data()
      };

      $.post(ajaxurl, data, function (response) {
        response = $.parseJSON(response);
        $('.reviews-main.' + where).html(response.content);
        if (!mobile_sel) {
          $this.parents('.dd-top').parent().find('small').text(text);
        }
        $('.reviews-main.' + where).slideDown();
      });
    }

    $('.newsletter-modal__close, .newsletter-modal__shade').on('click', function () {

      $('.newsletter-modal').fadeOut();
    });

    $("figcaption.wp-caption-text").replaceWith("");

    jQuery('.ninja-forms-form').on('submitResponse', function (e, response) {
      if (response.errors === false) {
        if (response.form_id == 14) {
          if (response.fields[49] == "checked") {
            $('.mc-form.footer #mc-email').val(response.fields[39]);
            $('.mc-form.footer').submit();
          }
        }

        if (response.form_id == 9) {
          if (response.fields[50] == "checked") {
            $('.mc-form.footer #mc-email').val(response.fields[22]);
            $('.mc-form.footer').submit();
          }
        }
      }
    });
  });
})(jQuery);
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm1haW4uanMiXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCJmaXRWaWRzIiwidnBXaWR0aCIsInZpZXdwb3J0IiwiZSIsIndpbmRvdyIsImEiLCJkb2N1bWVudEVsZW1lbnQiLCJib2R5Iiwid2lkdGgiLCJoZWlnaHQiLCJtb2JpbGVNb3ZlcyIsImxlbmd0aCIsIm91dGVySGVpZ2h0IiwiY3NzIiwicHJlcGVuZFRvIiwib24iLCJsYXN0IiwiY2hpbGRyZW4iLCJsYXN0UmlnaHQiLCJvZmZzZXQiLCJsZWZ0Iiwib3V0ZXJXaWR0aCIsImN1dG9mZiIsImNvbnNvbGUiLCJsb2ciLCJhZGRDbGFzcyIsInJlbW92ZUNsYXNzIiwic2xpY2siLCJ2YXJpYWJsZVdpZHRoIiwiaW5maW5pdGUiLCJwcmV2QXJyb3ciLCJuZXh0QXJyb3ciLCJhcHBlbmRUbyIsImluc2VydEFmdGVyIiwibmV4dCIsInByZXBlbmQiLCJhcHBlbmQiLCJlYWNoIiwiZmluZCIsImF1dGhvcldyYXBDaGVjayIsInBhciIsInBhcmVudHMiLCJwYXJCb3VuZCIsInJpZ2h0IiwiYXJ0aWNsZVNoYXJlIiwic2Nyb2xsIiwic2Nyb2xsVG9wIiwic2Nyb2xsQm90IiwicGFyVG9wIiwicGFyQm90IiwidG9wIiwiYXJ0aWNsZSIsInBhcmVudCIsInJldmlld1NpemluZyIsInJldmlld1NsaWRlclNpemVzIiwiaW1nSGVpZ2h0IiwiaXRpbmVyYXJ5QmxvY2tDaGVjayIsInNjcm9sbE1pZCIsIm1pbiIsInRvcENoZWNrIiwiYm90Q2hlY2siLCJ0YXIiLCJhdHRyIiwic2libGluZ3MiLCJkYXQiLCJkYXRhIiwiYW5pbWF0ZSIsInByZXZlbnREZWZhdWx0Iiwic3RpY2t5Iiwic3RpY2tNZSIsInN0aWNreUhlaWdodCIsImlzRml4ZWQiLCJwYXJTdGlja3kiLCJzdGlja3lUb3AiLCJoYXNDbGFzcyIsImRvdHMiLCJzcGVlZCIsInNsaWRlc1RvU2hvdyIsImNlbnRlck1vZGUiLCJjZW50ZXJQYWRkaW5nIiwiYXJyb3dzIiwic2xpZGUiLCJzd2lwZVRvU2xpZGUiLCJmb2N1c09uU2VsZWN0Iiwic3RheVNsaWRlckluaXQiLCJzSGVpZ2h0Iiwic2Nyb2xsSGVpZ2h0IiwiaGlkZSIsImFwcGVuZEFycm93cyIsInNsaWRlc1RvU2Nyb2xsIiwicmVzcG9uc2l2ZSIsImJyZWFrcG9pbnQiLCJzZXR0aW5ncyIsInByZXYiLCJsb2FkIiwicmVzaXplIiwiZWxlbWVudCIsImdldEVsZW1lbnRCeUlkIiwiZWxsaXBzaXMiLCJFbGxpcHNpcyIsImNhbGMiLCJzZXQiLCJuZXdfd2luZG93IiwiZ290b2xpbmsiLCJ1bmRlZmluZWQiLCJvcGVuIiwibG9jYXRpb24iLCJldmVudCIsImltYWdlIiwiZmFkZUluIiwiY2xpY2siLCJzbGlkZVRvZ2dsZSIsInRvZ2dsZUNsYXNzIiwic2xpZGVVcCIsIm5vdCIsIiR0aGlzIiwiZmFkZU91dCIsImRpciIsImN1ciIsInRvdGFsIiwic2xpZGVEb3duIiwiZm9jdXMiLCJmaXJzdCIsImFjdGl2ZSIsImlzIiwicmVtb3ZlIiwidHJpbSIsInRleHQiLCJmb2N1c291dCIsImtleXVwIiwia2V5Q29kZSIsImxpbmsiLCJocmVmIiwidXJsIiwib3B0cyIsImh0bWwiLCJsaW5rX2RhdGEiLCJwYWdlZCIsImFjdGlvbiIsInBvc3QiLCJhamF4dXJsIiwicmVzcG9uc2UiLCJwYXJzZUpTT04iLCJwYWdlIiwiZXhjbHVkZSIsImJlZm9yZSIsImNvbnRlbnQiLCJuZXh0X2NvdW50Iiwic3VibWl0IiwiYWNfZW1haWwiLCJ2YWwiLCJmb3JtIiwiaXNFbWFpbCIsImZuYW1lIiwibG5hbWUiLCJlbWFpbCIsInJlc3VsdCIsIm1zZyIsInJlZ2V4IiwidGVzdCIsIlF1ZXJ5U3RyaW5nIiwicXVlcnlfc3RyaW5nIiwicXVlcnkiLCJzZWFyY2giLCJzdWJzdHJpbmciLCJ2YXJzIiwic3BsaXQiLCJpIiwicGFpciIsImRlY29kZVVSSUNvbXBvbmVudCIsImFyciIsInB1c2giLCJmaWx0ZXIiLCJ1cGRhdGVfcmVzb3VyY2VzIiwidHlwZSIsImFkZF90b191cmwiLCJzcGVjaWFsdHkiLCJtYW5hZ2VtZW50Iiwic29ydCIsInRlYW1fc2l6ZSIsInNpemUiLCJsb2FkX3RlYW1zIiwieCIsInNob3ciLCJocF9yZXZpZXdfcmVnaW9uIiwiaHBfcmV2aWV3X3N0eWxlIiwiaHBfcmV2aWV3X3JlZ2lvbl9uYW1lIiwiaHBfcmV2aWV3X3N0eWxlX25hbWUiLCJ1cGRhdGVfcmV2aWV3X2hvbWUiLCJsaW5rX3Jldmlld3NfaG9tZSIsInJlcGxhY2VXaXRoIiwiY29udGVudF9sYXJnZSIsImFmdGVyIiwiY29udGVudF9zbWFsbCIsInVwZGF0ZV9yZXZpZXdzIiwicmVnaW9uIiwic3R5bGUiLCJpbmRleCIsInVwZGF0ZV90ZWFtX3NlbGVjdGlvbnMiLCJtb2JpbGVfc2VsIiwid2hlcmUiLCJqUXVlcnkiLCJlcnJvcnMiLCJmb3JtX2lkIiwiZmllbGRzIl0sIm1hcHBpbmdzIjoiOztBQUFBLENBQUMsVUFBU0EsQ0FBVCxFQUFZO0FBQ2JBLElBQUVDLFFBQUYsRUFBWUMsS0FBWixDQUFrQixVQUFTRixDQUFULEVBQVk7O0FBRTlCQSxNQUFFLGtCQUFGLEVBQXNCRyxPQUF0Qjs7QUFFQTs7QUFFQSxRQUFJQyxPQUFKOztBQUVBOztBQUVBLGFBQVNDLFFBQVQsR0FBb0I7O0FBRWxCLFVBQUlDLElBQUlDLE1BQVI7QUFBQSxVQUFnQkMsSUFBSSxPQUFwQjs7QUFFQSxVQUFJLEVBQUUsZ0JBQWdCRCxNQUFsQixDQUFKLEVBQWdDOztBQUU5QkMsWUFBSSxRQUFKO0FBQ0FGLFlBQUlMLFNBQVNRLGVBQVQsSUFBNEJSLFNBQVNTLElBQXpDO0FBRUQ7O0FBRUQsYUFBTyxFQUFFQyxPQUFRTCxFQUFHRSxJQUFFLE9BQUwsQ0FBVixFQUEyQkksUUFBU04sRUFBR0UsSUFBRSxRQUFMLENBQXBDLEVBQVA7QUFFRDs7QUFFRCxhQUFTSyxXQUFULEdBQXVCOztBQUVyQixVQUFJYixFQUFFLGFBQUYsRUFBaUJjLE1BQXJCLEVBQTZCOztBQUUz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NEJBQUgsRUFBa0NpTSxXQUFsQyxDQUErQyxFQUEvQzs7QUFHQVcsV0FBTyxtQkFBUCxFQUE0QjFMLEVBQTVCLENBQStCLGdCQUEvQixFQUFpRCxVQUFTWixDQUFULEVBQVkwSSxRQUFaLEVBQXNCO0FBQ25FLFVBQUlBLFNBQVM2RCxNQUFULEtBQW9CLEtBQXhCLEVBQ0E7QUFDQyxZQUFHN0QsU0FBUzhELE9BQVQsSUFBb0IsRUFBdkIsRUFDQTtBQUNDLGNBQUc5RCxTQUFTK0QsTUFBVCxDQUFnQixFQUFoQixLQUF1QixTQUExQixFQUNBO0FBQ0MvTSxjQUFFLDJCQUFGLEVBQStCeUosR0FBL0IsQ0FBbUNULFNBQVMrRCxNQUFULENBQWdCLEVBQWhCLENBQW5DO0FBQ0EvTSxjQUFFLGlCQUFGLEVBQXFCdUosTUFBckI7QUFDQTtBQUNEOztBQUVELFlBQUdQLFNBQVM4RCxPQUFULElBQW9CLENBQXZCLEVBQ0E7QUFDQyxjQUFHOUQsU0FBUytELE1BQVQsQ0FBZ0IsRUFBaEIsS0FBdUIsU0FBMUIsRUFDQTtBQUNDL00sY0FBRSwyQkFBRixFQUErQnlKLEdBQS9CLENBQW1DVCxTQUFTK0QsTUFBVCxDQUFnQixFQUFoQixDQUFuQztBQUNBL00sY0FBRSxpQkFBRixFQUFxQnVKLE1BQXJCO0FBQ0E7QUFDRDtBQUVEO0FBQ0osS0F0QkQ7QUF3QkMsR0Evd0REO0FBZ3hEQyxDQWp4REQsRUFpeERHcUQsTUFqeERIIiwiZmlsZSI6InByb2plY3QuanMiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oJCkge1xuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oJCkge1xuXG4kKCcuYXJ0aWNsZS1jb250ZW50JykuZml0VmlkcygpO1xuXG4vL0dsb2JhbCBWYXJpYWJsZXNcblxudmFyIHZwV2lkdGg7XG5cbi8vR2xvYmFsIEZ1bmN0aW9uc1xuXG5mdW5jdGlvbiB2aWV3cG9ydCgpIHtcblxuICB2YXIgZSA9IHdpbmRvdywgYSA9ICdpbm5lcic7XG5cbiAgaWYgKCEoJ2lubmVyV2lkdGgnIGluIHdpbmRvdyApKSB7XG5cbiAgICBhID0gJ2NsaWVudCc7XG4gICAgZSA9IGRvY3VtZW50LmRvY3VtZW50RWxlbWVudCB8fCBkb2N1bWVudC5ib2R5O1xuXG4gIH1cblxuICByZXR1cm4geyB3aWR0aCA6IGVbIGErJ1dpZHRoJyBdICwgaGVpZ2h0IDogZVsgYSsnSGVpZ2h0JyBdIH07XG5cbn1cblxuZnVuY3Rpb24gbW9iaWxlTW92ZXMoKSB7XG5cbiAgaWYgKCQoJy5uZXctd2h5LXVzJykubGVuZ3RoKSB7XG5cbiAgICB2YXIgaGVpZ2h0ID0gJCgnLm5ldy13aHktdXMgLnZpZGVvLXdyYXAnKS5vdXRlckhlaWdodCgpICsgNTA7XG4gICAgJCgnLm5ldy13aHktdXMnKS5jc3MoJ21pbi1oZWlnaHQnLCBoZWlnaHQgKyAncHgnKTtcblxuICB9XG5cbiAgaWYgKHZwV2lkdGggPD0gMTIwMCkge1xuXG4gICAgaWYgKCQoJy5pdGluZXJhcnktaW50cm8gLmF1dGhvci1kZXRhaWwnKS5sZW5ndGgpIHtcblxuICAgICAgJCgnLmRldGFpbHMgLmF1dGhvci1kZXRhaWwnKS5wcmVwZW5kVG8oJy5pdGluZXJhcnktaW50cm8gLml0aW5lcmFyeS13cmFwcGVyJyk7XG5cbiAgICB9XG5cbiAgfVxuXG4gIGlmICh2cFdpZHRoIDw9IDEyMDAgJiYgdnBXaWR0aCA+IDgwMCl7XG5cbiAgICBpZiAoJCgnLml0aW5lcmFyeS1pbnRybyAuYXV0aG9yLWRldGFpbCcpLmxlbmd0aCkge1xuXG4gICAgICAkKCcuYXV0aG9yLWRldGFpbCAuYXV0aG9ycycpLm9uKCdhZnRlckNoYW5nZSBpbml0JywgZnVuY3Rpb24oKXtcblxuICAgICAgICB2YXIgbGFzdCA9ICQoJy5hdXRob3ItZGV0YWlsIC5hdXRob3JzIC5zbGljay10cmFjaycpLmNoaWxkcmVuKCkubGFzdCgpO1xuICAgICAgICB2YXIgbGFzdFJpZ2h0ID0gbGFzdC5vZmZzZXQoKS5sZWZ0ICsgbGFzdC5vdXRlcldpZHRoKCk7XG4gICAgICAgIHZhciBjdXRvZmYgPSAkKCcuYXV0aG9yLWRldGFpbCcpLm9mZnNldCgpLmxlZnQgKyAkKCcuYXV0aG9yLWRldGFpbCcpLm91dGVyV2lkdGgoKTtcblxuICAgICAgICBjb25zb2xlLmxvZyhsYXN0UmlnaHQpO1xuICAgICAgICBjb25zb2xlLmxvZyhjdXRvZmYpO1xuXG4gICAgICAgIGlmIChsYXN0UmlnaHQgPD0gY3V0b2ZmKSB7XG5cbiAgICAgICAgICAkKCcuYXV0aG9yLWRldGFpbCAuYXV0aG9ycyAuc2xpY2stbmV4dCcpLmFkZENsYXNzKCdzbGljay1kaXNhYmxlZCcpO1xuXG4gICAgICAgIH0gZWxzZSB7XG5cbiAgICAgICAgICAkKCcuYXV0aG9yLWRldGFpbCAuYXV0aG9ycyAuc2xpY2stbmV4dCcpLnJlbW92ZUNsYXNzKCdzbGljay1kaXNhYmxlZCcpO1xuXG4gICAgICAgIH1cblxuICAgICAgfSk7XG5cbiAgICAgICQoJy5hdXRob3ItZGV0YWlsIC5hdXRob3JzJykuc2xpY2soe1xuXG4gICAgICAgIHZhcmlhYmxlV2lkdGg6IHRydWUsXG4gICAgICAgIGluZmluaXRlOiBmYWxzZSxcbiAgICAgICAgcHJldkFycm93OiAnPHNwYW4gY2xhc3M9XCJzbGljay1wcmV2XCI+PHN2ZyBjbGFzcz1cImNoZXYtcmlnaHRcIj48dXNlIHhsaW5rOmhyZWY9XCIjY2hldi1yaWdodFwiPjwvdXNlPjwvc3ZnPjwvc3Bhbj4nLFxuICAgICAgICBuZXh0QXJyb3c6ICc8c3BhbiBjbGFzcz1cInNsaWNrLW5leHRcIj48c3ZnIGNsYXNzPVwiY2hldi1yaWdodFwiPjx1c2UgeGxpbms6aHJlZj1cIiNjaGV2LXJpZ2h0XCI+PC91c2U+PC9zdmc+PC9zcGFuPicsXG5cbiAgICAgIH0pO1xuXG4gICAgfVxuXG4gICAgaWYgKCQoJy5pdGluZXJhcnktaW50cm8gLmNyZWRpdHMnKS5sZW5ndGgpIHtcblxuICAgICAgJCgnLmF1dGhvci1kZXRhaWwgLmNyZWRpdHMnKS5vbignYWZ0ZXJDaGFuZ2UgaW5pdCcsIGZ1bmN0aW9uKCl7XG5cbiAgICAgICAgdmFyIGxhc3QgPSAkKCcuYXV0aG9yLWRldGFpbCAuY3JlZGl0cyAuc2xpY2stdHJhY2snKS5jaGlsZHJlbigpLmxhc3QoKTtcbiAgICAgICAgdmFyIGxhc3RSaWdodCA9IGxhc3Qub2Zmc2V0KCkubGVmdCArIGxhc3Qub3V0ZXJXaWR0aCgpO1xuICAgICAgICB2YXIgY3V0b2ZmID0gJCgnLmF1dGhvci1kZXRhaWwnKS5vZmZzZXQoKS5sZWZ0ICsgJCgnLmF1dGhvci1kZXRhaWwnKS5vdXRlcldpZHRoKCk7XG5cbiAgICAgICAgY29uc29sZS5sb2cobGFzdFJpZ2h0KTtcbiAgICAgICAgY29uc29sZS5sb2coY3V0b2ZmKTtcblxuICAgICAgICBpZiAobGFzdFJpZ2h0IDw9IGN1dG9mZikge1xuXG4gICAgICAgICAgJCgnLmF1dGhvci1kZXRhaWwgLmNyZWRpdHMgLnNsaWNrLW5leHQnKS5hZGRDbGFzcygnc2xpY2stZGlzYWJsZWQnKTtcblxuICAgICAgICB9IGVsc2Uge1xuXG4gICAgICAgICAgJCgnLmF1dGhvci1kZXRhaWwgLmNyZWRpdHMgLnNsaWNrLW5leHQnKS5yZW1vdmVDbGFzcygnc2xpY2stZGlzYWJsZWQnKTtcblxuICAgICAgICB9XG5cbiAgICAgIH0pO1xuXG4gICAgICAkKCcuYXV0aG9yLWRldGFpbCAuY3JlZGl0cycpLnNsaWNrKHtcblxuICAgICAgICB2YXJpYWJsZVdpZHRoOiB0cnVlLFxuICAgICAgICBpbmZpbml0ZTogZmFsc2UsXG4gICAgICAgIHByZXZBcnJvdzogJzxzcGFuIGNsYXNzPVwic2xpY2stcHJldlwiPjxzdmcgY2xhc3M9XCJjaGV2LXJpZ2h0XCI+PHVzZSB4bGluazpocmVmPVwiI2NoZXYtcmlnaHRcIj48L3VzZT48L3N2Zz48L3NwYW4+JyxcbiAgICAgICAgbmV4dEFycm93OiAnPHNwYW4gY2xhc3M9XCJzbGljay1uZXh0XCI+PHN2ZyBjbGFzcz1cImNoZXYtcmlnaHRcIj48dXNlIHhsaW5rOmhyZWY9XCIjY2hldi1yaWdodFwiPjwvdXNlPjwvc3ZnPjwvc3Bhbj4nLFxuXG4gICAgICB9KTtcblxuICAgIH1cblxuICB9XG5cbiAgaWYgKHZwV2lkdGggPD0gOTYwKSB7XG5cbiAgICBpZiAoJCgnLnJldmlldycpLmxlbmd0aCkge1xuXG4gICAgICAkKCcucmV2aWV3LXNpZGViYXIgLnJldmlldy1hZ2VudCcpLnByZXBlbmRUbygnLnJldmlldyAud3JhcHBlcicpO1xuXG4gICAgfVxuXG4gICAgaWYgKCQoJy5hZ2VudCcpLmxlbmd0aCkge1xuXG4gICAgICAkKCcuYWdlbnQtc2lkZWJhciAuYWdlbnQtbWV0YScpLnByZXBlbmRUbygnLmFnZW50LXNpZGViYXIgLnN0aWNreScpO1xuXG4gICAgfVxuXG4gICAgaWYgKCQoJy5mZWF0dXJlZC1hZ2VudCcpLmxlbmd0aCkge1xuXG4gICAgICAkKCcuZmVhdHVyZWQtYWdlbnQgLmNvbnRlbnQgPiBoMicpLmFwcGVuZFRvKCcuZmVhdHVyZWQtYWdlbnQgLnByb2ZpbGUnKTtcblxuICAgIH1cblxuICAgIGlmICgkKCcucmV2aWV3LXNpZGViYXIgLnJldmlldy1kZXRhaWwtYWdlbnRzJykubGVuZ3RoKSB7XG5cbiAgICAgICQoJy5yZXZpZXctc2lkZWJhciAucmV2aWV3LWRldGFpbC1hZ2VudHMnKS5pbnNlcnRBZnRlcignLm1haW4tcXVvdGUnKTtcblxuICAgIH1cblxuICB9IGVsc2Uge1xuXG4gICAgaWYgKCQoJy5yZXZpZXcnKS5sZW5ndGgpIHtcblxuICAgICAgJCgnLnJldmlldyAud3JhcHBlciAucmV2aWV3LWFnZW50JykucHJlcGVuZFRvKCcucmV2aWV3LXNpZGViYXInKTtcblxuICAgIH1cblxuICAgIGlmICgkKCcuYWdlbnQnKS5sZW5ndGgpIHtcblxuICAgICAgJCgnLmFnZW50LXNpZGViYXIgLmFnZW50LXByb2ZpbGUnKS5wcmVwZW5kVG8oJy5hZ2VudC1zaWRlYmFyIC5zdGlja3knKTtcblxuICAgIH1cblxuICB9XG5cbiAgaWYgKHZwV2lkdGggPD0gODYwKSB7XG5cbiAgICBpZiAoJCgnLm9mZmljZXMtbWFpbicpLmxlbmd0aCkge1xuXG4gICAgICAkKCcjbWFwLWF1cycpLmFwcGVuZFRvKCcubmEtbWFwJyk7XG4gICAgICAkKCcjbWFwLW5hJykuYXBwZW5kVG8oJy5hdS1tYXAnKTtcblxuICAgIH1cblxuICB9IGVsc2Uge1xuXG4gICAgaWYgKCQoJy5vZmZpY2VzLW1haW4nKS5sZW5ndGgpIHtcblxuICAgICAgJCgnI21hcC1hdXMnKS5hcHBlbmRUbygnLmF1LW1hcCcpO1xuICAgICAgJCgnI21hcC1uYScpLmFwcGVuZFRvKCcubmEtbWFwJyk7XG5cbiAgICB9XG5cbiAgfVxuXG4gIGlmICh2cFdpZHRoIDw9IDcwMCkge1xuXG4gICAgaWYgKCQoJy5ocC10aGluZycpLmxlbmd0aCkge1xuXG4gICAgICAvL2NvbnNvbGUubG9nKCdUZXN0Jyk7XG4gICAgICAkKCcucmlnaHQtaGFsZicpLnByZXBlbmRUbygkKCcuaHAtdGhpbmcnKSk7XG5cbiAgICB9XG5cbiAgICBpZiAoJCgnLmZvb3Rlci1tb2InKS5sZW5ndGgpIHtcblxuICAgICAgJCgnLmZvb3Rlci1sb2dvJykucHJlcGVuZFRvKCcuZm9vdGVyLW1vYicpO1xuICAgICAgJCgnLmZvb3Rlci1jb2wuc29jaWFsLWNvbCcpLmFwcGVuZFRvKCcubW9iLXNvY2lhbHMnKTtcbiAgICAgICQoJy5mb290ZXItY29sIHAnKS5wcmVwZW5kVG8oJy5jcmVkaXQnKTtcblxuICAgIH1cblxuICB9XG5cbiAgZWxzZSB7XG5cbiAgICBpZiAoJCgnLmhwLXRoaW5nJykubGVuZ3RoKSB7XG5cbiAgICAgIC8vY29uc29sZS5sb2coJ1Rlc3QnKTtcbiAgICAgICQoJy5yaWdodC1oYWxmJykuYXBwZW5kVG8oJCgnLmhwLXRoaW5nJykpO1xuXG4gICAgfVxuXG4gICAgaWYgKCQoJy5mb290ZXItbW9iJykubGVuZ3RoKSB7XG5cbiAgICAgICQoJy5mb290ZXItbW9iJykubmV4dCgpLnByZXBlbmQoJCgnLmZvb3Rlci1tb2IgLmZvb3Rlci1sb2dvJykpO1xuICAgICAgJCgnLmZvb3Rlci1tb2IgLnNvY2lhbC1jb2wnKS5hcHBlbmRUbygnLmZvb3Rlci1tYWluIC53cmFwcGVyJyk7XG4gICAgICAkKCcuZm9vdGVyLW1vYicpLm5leHQoKS5hcHBlbmQoJCgnLmNyZWRpdCBwJykpO1xuXG4gICAgfVxuXG4gIH1cblxuICBpZiAodnBXaWR0aCA8PSA2MDApIHtcblxuICAgIGlmICgkKCcuZmVhdHVyZWQtYWdlbnRzJykubGVuZ3RoKSB7XG5cbiAgICAgICQoJy5hZ2VudCcpLmVhY2goZnVuY3Rpb24oKSB7XG5cbiAgICAgICAgJCh0aGlzKS5maW5kKCcuY29udGVudCA+IGgzJykuYXBwZW5kVG8oJCh0aGlzKS5maW5kKCcucHJvZmlsZScpKTtcblxuICAgICAgfSk7XG5cbiAgICB9XG5cbiAgICBpZiAoJCgnLmFnZW50LXNpZGViYXInKS5sZW5ndGgpIHtcblxuICAgICAgJCgnLmFnZW50LXNpZGViYXIgLmFnZW50LXByb2ZpbGUnKS5wcmVwZW5kVG8oJy5hZ2VudC1zaWRlYmFyIC5zdGlja3knKTtcblxuICAgIH1cblxuICB9IGVsc2UgaWYgKHZwV2lkdGggPiA2MDAgJiYgdnBXaWR0aCA8PSA5NjApe1xuXG4gICAgaWYgKCQoJy5hZ2VudC1zaWRlYmFyJykubGVuZ3RoKSB7XG5cbiAgICAgICQoJy5hZ2VudC1zaWRlYmFyIC5hZ2VudC1tZXRhJykucHJlcGVuZFRvKCcuYWdlbnQtc2lkZWJhciAuc3RpY2t5Jyk7XG5cbiAgICB9XG5cbiAgfVxuXG59XG5cbmZ1bmN0aW9uIGF1dGhvcldyYXBDaGVjaygpIHtcblxuICAkKCcucmV2aWV3LXJvdy1pbm5lciAuYXV0aG9yLXdyYXAgc3BhbicpLmVhY2goZnVuY3Rpb24oKSB7XG5cbiAgICB2YXIgcGFyID0gJCh0aGlzKS5wYXJlbnRzKCcucmV2aWV3LXJvdy1pbm5lcicpO1xuICAgIHZhciBwYXJCb3VuZCA9IHBhci5vZmZzZXQoKS5sZWZ0ICsgcGFyLm91dGVyV2lkdGgoKTtcbiAgICB2YXIgcmlnaHQgPSAkKHRoaXMpLm9mZnNldCgpLmxlZnQgKyAkKHRoaXMpLm91dGVyV2lkdGgoKTtcblxuICAgIGlmIChyaWdodCA+IHBhckJvdW5kKSB7XG5cbiAgICAgICQodGhpcykuYWRkQ2xhc3MoJ2FsdCcpO1xuXG4gICAgfVxuXG4gIH0pO1xuXG59XG5cbmZ1bmN0aW9uIGFydGljbGVTaGFyZSgpIHtcblxuICB2YXIgc2Nyb2xsID0gJCh3aW5kb3cpLnNjcm9sbFRvcCgpO1xuICB2YXIgc2Nyb2xsQm90ID0gc2Nyb2xsICsgJCgnLmFydGljbGUtc2hhcmUnKS5maW5kKCd1bCcpLm91dGVySGVpZ2h0KCkgKyA4NDtcbiAgdmFyIHBhclRvcDtcbiAgdmFyIHBhckJvdDtcblxuICBpZiAoJCgnLmFydGljbGUtc2hhcmUnKS5sZW5ndGgpIHtcblxuICAgIHBhclRvcCA9ICQoJy5hcnRpY2xlLXNoYXJlJykub2Zmc2V0KCkudG9wIC0gODQ7XG4gICAgcGFyQm90ID0gJCgnLmFydGljbGUtc2hhcmUnKS5vZmZzZXQoKS50b3AgKyAkKCcuYXJ0aWNsZS1zaGFyZScpLm91dGVySGVpZ2h0KCk7XG4gICAgLy9jb25zb2xlLmxvZyhzY3JvbGwpO1xuICAgIC8vY29uc29sZS5sb2coJCgnLmFydGljbGUtc2hhcmUnKS5vZmZzZXQoKS50b3ApO1xuXG4gICAgaWYgKHNjcm9sbCA+IHBhclRvcCAmJiBzY3JvbGxCb3QgPCBwYXJCb3QpIHtcblxuICAgICAgJCgnLmFydGljbGUtc2hhcmUnKS5hZGRDbGFzcygnZml4ZWQnKTtcbiAgICAgICQoJy5hcnRpY2xlLXNoYXJlJykucmVtb3ZlQ2xhc3MoJ2JvdHRvbScpO1xuXG4gICAgfSBlbHNlIGlmIChzY3JvbGxCb3QgPiBwYXJCb3QpIHtcblxuICAgICAgJCgnLmFydGljbGUtc2hhcmUnKS5hZGRDbGFzcygnYm90dG9tJyk7XG4gICAgICAkKCcuYXJ0aWNsZS1zaGFyZScpLnJlbW92ZUNsYXNzKCdmaXhlZCcpO1xuXG4gICAgfSBlbHNlIHtcblxuICAgICAgJCgnLmFydGljbGUtc2hhcmUnKS5yZW1vdmVDbGFzcygnZml4ZWQnKTtcbiAgICAgICQoJy5hcnRpY2xlLXNoYXJlJykucmVtb3ZlQ2xhc3MoJ2JvdHRvbScpOyAgIFxuXG4gICAgfVxuXG5cbiAgICBpZiAodnBXaWR0aCA8IDg4MCkge1xuXG4gICAgICB2YXIgYXJ0aWNsZSA9ICQoJy5hcnRpY2xlLXNoYXJlJykucGFyZW50KCk7XG5cbiAgICAgIGlmIChzY3JvbGwgKyB2aWV3cG9ydCgpLmhlaWdodCA+IGFydGljbGUub2Zmc2V0KCkudG9wICsgYXJ0aWNsZS5vdXRlckhlaWdodCgpKSB7XG5cbiAgICAgICAgJCgnLmFydGljbGUtc2hhcmUnKS5hZGRDbGFzcygnaGlkZScpO1xuXG4gICAgICB9IGVsc2Uge1xuXG4gICAgICAgICQoJy5hcnRpY2xlLXNoYXJlJykucmVtb3ZlQ2xhc3MoJ2hpZGUnKTtcblxuICAgICAgfVxuXG4gICAgfVxuXG5cbiAgfVxuXG59XG5cbmZ1bmN0aW9uIHJldmlld1NpemluZygpIHtcblxuICAkKCcucmV2aWV3LXJvdycpLmVhY2goZnVuY3Rpb24oKSB7XG5cbiAgICBpZiAoJCh0aGlzKS5maW5kKCcucmV2aWV3LXJvdy1pbm5lcicpLmhlaWdodCgpID4gOTApIHtcblxuICAgICAgJCh0aGlzKS5hZGRDbGFzcygndGFsbCcpO1xuXG4gICAgfVxuXG4gIH0pO1xuXG59XG5cbmZ1bmN0aW9uIHJldmlld1NsaWRlclNpemVzKCkge1xuXG4gIHZhciBpbWdIZWlnaHQgPSA5OTk5O1xuXG4gICQoJy5yZXZpZXctZmVhdHVyZWQgaW1nJykuaGVpZ2h0KCdhdXRvJyk7XG5cbiAgJCgnLnJldmlldy1mZWF0dXJlZCBpbWcnKS5lYWNoKGZ1bmN0aW9uKCkge1xuXG4gICAgaWYgKCQodGhpcykuaGVpZ2h0KCkgPCBpbWdIZWlnaHQgJiYgJCh0aGlzKS5oZWlnaHQoKSA+IDApIHtcblxuICAgICAgaW1nSGVpZ2h0ID0gJCh0aGlzKS5oZWlnaHQoKTtcblxuICAgIH1cblxuICB9KTtcblxuICBpZiAoaW1nSGVpZ2h0ICE9IDk5OTkpIHtcblxuICAgICQoJy5yZXZpZXctZmVhdHVyZWQgaW1nJykuaGVpZ2h0KGltZ0hlaWdodCk7XG5cbiAgfVxuICBcblxuICAvLyBpZiAoJCgnLnJldmlldy1mZWF0dXJlZCcpLmhhc0NsYXNzKCdzbGljay1pbml0aWFsaXplZCcpKSB7XG5cbiAgLy8gICAkKCcucmV2aWV3LWZlYXR1cmVkICcpLnNsaWNrKCdzZXRQb3NpdGlvbicpO1xuXG4gIC8vIH1cblxuICBcblxufVxuXG5cblxuZnVuY3Rpb24gaXRpbmVyYXJ5QmxvY2tDaGVjaygpIHtcblxuICB2YXIgc2Nyb2xsTWlkID0gJCh3aW5kb3cpLnNjcm9sbFRvcCgpICsgKHZpZXdwb3J0KCkuaGVpZ2h0IC8gMik7XG4gIHZhciBtaW4gPSAkKCcuaXRpbmVyYXJ5LWFydGljbGUnKS5vZmZzZXQoKS50b3A7XG4gIHZhciB0b3BDaGVjaztcbiAgdmFyIGJvdENoZWNrO1xuICB2YXIgdGFyO1xuXG4gIGlmIChzY3JvbGxNaWQgPiBtaW4pIHtcblxuICAgICQoJy5pdGluZXJhcnktYXJ0aWNsZSBzZWN0aW9uJykuZWFjaChmdW5jdGlvbigpIHtcblxuICAgICAgY29uc29sZS5sb2coJ3Rlc3QgMScpO1xuXG4gICAgICB0b3BDaGVjayA9ICQodGhpcykub2Zmc2V0KCkudG9wO1xuICAgICAgYm90Q2hlY2sgPSB0b3BDaGVjayArICQodGhpcykub3V0ZXJIZWlnaHQoKTtcblxuICAgICAgaWYgKHNjcm9sbE1pZCA+IHRvcENoZWNrICYmIHNjcm9sbE1pZCA8IGJvdENoZWNrKSB7XG5cbiAgICAgICAgdGFyID0gJCh0aGlzKS5hdHRyKCdpZCcpO1xuICAgICAgICBjb25zb2xlLmxvZyh0YXIpO1xuXG4gICAgICB9XG5cbiAgICB9KTtcblxuICAgICQoJyNuYXYtJyArIHRhcikuYWRkQ2xhc3MoJ2FjdGl2ZScpLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuXG4gIH1cblxufVxuXG4kKCcuaXRpbmVyYXJ5LW5hdiBzcGFuJykub24oJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG5cbiAgdmFyIGRhdCA9ICQodGhpcykuZGF0YSgnYW5jaG9yJyk7XG4gIHZhciB0YXIgPSAkKCcjJyArIGRhdCkub2Zmc2V0KCkudG9wO1xuICAkKFwiaHRtbCwgYm9keVwiKS5hbmltYXRlKHsgc2Nyb2xsVG9wOiB0YXIgfSwgNTAwKTtcblxufSk7XG5cbiQoJy5oaWdobGlnaHRzLWxpc3QgYScpLm9uKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcblxuICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgdmFyIGRhdCA9ICQodGhpcykuYXR0cignaHJlZicpO1xuICB2YXIgdGFyID0gJChkYXQpLm9mZnNldCgpLnRvcCAtIDI4O1xuXG4gICQoXCJodG1sLCBib2R5XCIpLmFuaW1hdGUoeyBzY3JvbGxUb3A6IHRhciB9LCA1MDApO1xuXG59KTtcblxudmFyIHN0aWNreSA9IGZhbHNlO1xuXG5mdW5jdGlvbiBzdGlja01lKCkge1xuXG4gIHZhciBzY3JvbGwgPSAkKHdpbmRvdykuc2Nyb2xsVG9wKCkgKyB2aWV3cG9ydCgpLmhlaWdodCAtIDQ4O1xuICB2YXIgc2Nyb2xsVG9wID0gJCh3aW5kb3cpLnNjcm9sbFRvcCgpO1xuICBcblxuICAkKCcuc3RpY2t5JykuZWFjaChmdW5jdGlvbigpIHtcblxuICAgIGlmIChzY3JvbGxUb3AgPiAkKHRoaXMpLnBhcmVudCgpLm9mZnNldCgpLnRvcCAtIDQ4ICYmIHNjcm9sbFRvcCA8ICQodGhpcykucGFyZW50KCkub2Zmc2V0KCkudG9wICsgJCh0aGlzKS5wYXJlbnQoKS5vdXRlckhlaWdodCgpKSB7XG5cbiAgICAgIHN0aWNreSA9ICQodGhpcyk7XG5cbiAgICB9IFxuXG4gIH0pO1xuXG4gIGlmIChzdGlja3kpIHtcblxuICAgIHZhciBzdGlja3lIZWlnaHQgPSBzdGlja3kub3V0ZXJIZWlnaHQoKTtcbiAgICB2YXIgcGFyID0gc3RpY2t5LnBhcmVudCgpO1xuICAgIHZhciBwYXJUb3AgPSBwYXIub2Zmc2V0KCkudG9wO1xuICAgIHZhciBwYXJCb3QgPSBwYXJUb3AgKyBwYXIub3V0ZXJIZWlnaHQoKTtcbiAgICB2YXIgaXNGaXhlZCA9ICQoJy5zdGlja3kuZml4ZWQnKS5sZW5ndGg7XG4gICAgdmFyIHBhclN0aWNreSA9IHBhclRvcCArIHN0aWNreUhlaWdodDtcbiAgICB2YXIgc3RpY2t5VG9wID0gc3RpY2t5Lm9mZnNldCgpLnRvcDtcblxuXG4gICAgaWYgKHN0aWNreUhlaWdodCA+IHZpZXdwb3J0KCkuaGVpZ2h0KSB7XG5cbiAgICAgIGlmIChzY3JvbGwgPiBwYXJTdGlja3kgJiYgc2Nyb2xsIDwgcGFyQm90KSB7XG5cbiAgICAgICAgc3RpY2t5LmFkZENsYXNzKCdmaXhlZCcpO1xuICAgICAgICBzdGlja3kucmVtb3ZlQ2xhc3MoJ3N0dWNrJyk7XG4gICAgICAgIGNvbnNvbGUubG9nKCdmaXhlZCcpO1xuXG4gICAgICB9IGVsc2UgaWYgKHNjcm9sbCA+IHBhckJvdCkge1xuXG4gICAgICAgIHN0aWNreS5hZGRDbGFzcygnc3R1Y2snKTtcbiAgICAgICAgc3RpY2t5LnJlbW92ZUNsYXNzKCdmaXhlZCcpO1xuICAgICAgICBjb25zb2xlLmxvZygnc3R1Y2snKTtcblxuICAgICAgfSBlbHNlIGlmIChzdGlja3lUb3AgPCBwYXJUb3AgJiYgc3RpY2t5Lmhhc0NsYXNzKCdmaXhlZCcpKSB7XG4gICAgICBcbiAgICAgICAgc3RpY2t5LnJlbW92ZUNsYXNzKCdmaXhlZCcpO1xuICAgICAgICBzdGlja3kucmVtb3ZlQ2xhc3MoJ3N0dWNrJyk7XG4gICAgICAgIGNvbnNvbGUubG9nKCdub25lIDEnKTtcblxuICAgICAgfSBlbHNlIHtcblxuICAgICAgICBzdGlja3kucmVtb3ZlQ2xhc3MoJ2ZpeGVkJyk7XG4gICAgICAgIHN0aWNreS5yZW1vdmVDbGFzcygnc3R1Y2snKTtcbiAgICAgICAgY29uc29sZS5sb2coJ25vbmUgMScpO1xuXG4gICAgICB9XG5cbiAgICB9IGVsc2Uge1xuXG5cbiAgICAgIGlmIChzY3JvbGxUb3AgPiBwYXJUb3AgLSA0OCAmJiBzY3JvbGxUb3AgPCBwYXJCb3QgLSBzdGlja3lIZWlnaHQgLSA0OCkge1xuXG4gICAgICAgIHN0aWNreS5hZGRDbGFzcygnZml4ZWQtdG9wJyk7XG4gICAgICAgIHN0aWNreS5yZW1vdmVDbGFzcygnc3R1Y2snKTtcblxuICAgICAgfSBlbHNlIGlmIChzY3JvbGxUb3AgPiBwYXJCb3QgLSBzdGlja3lIZWlnaHQgLSA0OCkge1xuXG4gICAgICAgIHN0aWNreS5hZGRDbGFzcygnc3R1Y2snKTtcbiAgICAgICAgc3RpY2t5LnJlbW92ZUNsYXNzKCdmaXhlZC10b3AnKTtcblxuICAgICAgfSBlbHNlIHtcblxuICAgICAgICBzdGlja3kucmVtb3ZlQ2xhc3MoJ2ZpeGVkLXRvcCcpO1xuICAgICAgICBzdGlja3kucmVtb3ZlQ2xhc3MoJ3N0dWNrJyk7XG5cbiAgICAgIH1cblxuXG4gICAgfVxuXG4gIH1cblxufVxuXG5pZiAoJCgnLnJldmlldy1mZWF0dXJlZCcpLmxlbmd0aCkge1xuXG4gICQoJy5yZXZpZXctZmVhdHVyZWQnKS5zbGljayh7XG4gICAgZG90czogZmFsc2UsXG4gICAgaW5maW5pdGU6IHRydWUsXG4gICAgc3BlZWQ6IDMwMCxcbiAgICBzbGlkZXNUb1Nob3c6IDEsXG4gICAgY2VudGVyTW9kZTogdHJ1ZSxcbiAgICB2YXJpYWJsZVdpZHRoOiB0cnVlLFxuICAgIGNlbnRlclBhZGRpbmc6ICcwcHgnLFxuICAgIGFycm93czogZmFsc2UsXG4gICAgc2xpZGU6ICdpbWcnLFxuICAgIHN3aXBlVG9TbGlkZTogdHJ1ZSxcbiAgICBmb2N1c09uU2VsZWN0OiB0cnVlXG4gIH0pO1xufVxuXG5mdW5jdGlvbiBzdGF5U2xpZGVySW5pdCgpIHtcblxuICAkKCcuc3RheS1zbGlkZSAuY29udGVudCBwJykuZWFjaChmdW5jdGlvbigpIHtcblxuICAgIHZhciBoZWlnaHQgPSAkKHRoaXMpLnBhcmVudCgpLm91dGVySGVpZ2h0KCk7XG4gICAgdmFyIHNIZWlnaHQgPSAkKHRoaXMpWzBdLnNjcm9sbEhlaWdodDtcblxuICAgIGNvbnNvbGUubG9nKGhlaWdodCk7XG4gICAgY29uc29sZS5sb2coc0hlaWdodCk7XG5cbiAgICBpZiAoaGVpZ2h0ID4gc0hlaWdodCkge1xuXG4gICAgICAkKHRoaXMpLnBhcmVudCgpLm91dGVySGVpZ2h0KHNIZWlnaHQpO1xuICAgICAgJCh0aGlzKS5wYXJlbnQoKS5hZGRDbGFzcygnc2hvcnQnKTtcbiAgICAgICQodGhpcykucGFyZW50KCkubmV4dCgpLmhpZGUoKTtcblxuICAgIH1cblxuICB9KTtcblxufVxuXG5pZiAoJCgnLnN0YXktc2xpZGVyJykubGVuZ3RoKSB7XG5cbiAgJCgnLnN0YXktc2xpZGVyJykuc2xpY2soe1xuXG4gICAgYXBwZW5kQXJyb3dzOiAkKCcuc3RheS1zbGlkZXInKSxcbiAgICBkb3RzOiBmYWxzZSxcbiAgICBpbmZpbml0ZTogZmFsc2UsXG4gICAgc2xpZGVzVG9TaG93OiAyLFxuICAgIHNsaWRlc1RvU2Nyb2xsOiAyLFxuICAgIHByZXZBcnJvdzogJzxkaXYgY2xhc3M9XCJwcmV2LWFycm93XCI+PHN2ZyBjbGFzcz1cInNsaWRlci1hcnJvd1wiPjx1c2UgeGxpbms6aHJlZj1cIiNzbGlkZXItYXJyb3dcIj48L3VzZT48L3N2Zz48L2Rpdj4nLFxuICAgIG5leHRBcnJvdzogJzxkaXYgY2xhc3M9XCJuZXh0LWFycm93XCI+PHN2ZyBjbGFzcz1cInNsaWRlci1hcnJvd1wiPjx1c2UgeGxpbms6aHJlZj1cIiNzbGlkZXItYXJyb3dcIj48L3VzZT48L3N2Zz48L2Rpdj4nLFxuICAgIHJlc3BvbnNpdmU6IFtcblxuICAgICAge1xuXG4gICAgICAgIGJyZWFrcG9pbnQ6IDYwMCxcbiAgICAgICAgc2V0dGluZ3M6IHtcblxuICAgICAgICAgIHNsaWRlc1RvU2hvdzogMS4yLFxuICAgICAgICAgIHNsaWRlc1RvU2Nyb2xsOiAxLFxuXG4gICAgICAgIH1cblxuICAgICAgfVxuXG4gICAgXVxuXG4gIH0pO1xuXG4gIHN0YXlTbGlkZXJJbml0KCk7XG5cbn1cblxuJCgnLnN0YXktc2xpZGVyIC5jb250ZW50LWN0YScpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuXG4gIHZhciBoZWlnaHQgPSAkKHRoaXMpLnByZXYoKS5vdXRlckhlaWdodCgpO1xuICB2YXIgc0hlaWdodCA9ICQodGhpcykucHJldigpLmZpbmQoJ3AnKVswXS5zY3JvbGxIZWlnaHQ7XG5cbiAgJCh0aGlzKS5wcmV2KCkub3V0ZXJIZWlnaHQoc0hlaWdodCkuYWRkQ2xhc3MoJ3RhbGwnKTtcbiAgJCh0aGlzKS5oaWRlKCk7XG5cbn0pO1xuXG4kKCcuaW5uZXItc2xpZGVyLW5leHQnKS5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcblxuICAkKHRoaXMpLnBhcmVudHMoJy5pbm5lci1zbGlkZXInKS5maW5kKCcuYWN0aXZlJykucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpLm5leHQoJy5pbWFnZS13cmFwJykuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuXG4gIGlmICghJCh0aGlzKS5wYXJlbnRzKCcuaW5uZXItc2xpZGVyJykuZmluZCgnLmFjdGl2ZScpLm5leHQoJy5pbWFnZS13cmFwJykubGVuZ3RoKSB7XG5cbiAgICAkKHRoaXMpLmFkZENsYXNzKCdkaXNhYmxlZCcpO1xuXG4gIH1cblxuICAkKHRoaXMpLnBhcmVudCgpLmZpbmQoJy5pbm5lci1zbGlkZXItcHJldicpLnJlbW92ZUNsYXNzKCdkaXNhYmxlZCcpO1xuXG59KTtcblxuJCgnLmlubmVyLXNsaWRlci1wcmV2Jykub24oJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG5cbiAgJCh0aGlzKS5wYXJlbnRzKCcuaW5uZXItc2xpZGVyJykuZmluZCgnLmFjdGl2ZScpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKS5wcmV2KCcuaW1hZ2Utd3JhcCcpLmFkZENsYXNzKCdhY3RpdmUnKTtcblxuICBpZiAoISQodGhpcykucGFyZW50cygnLmlubmVyLXNsaWRlcicpLmZpbmQoJy5hY3RpdmUnKS5wcmV2KCcuaW1hZ2Utd3JhcCcpLmxlbmd0aCkge1xuXG4gICAgJCh0aGlzKS5hZGRDbGFzcygnZGlzYWJsZWQnKTtcblxuICB9XG5cbiAgJCh0aGlzKS5wYXJlbnQoKS5maW5kKCcuaW5uZXItc2xpZGVyLW5leHQnKS5yZW1vdmVDbGFzcygnZGlzYWJsZWQnKTtcblxufSk7XG5cblxuLy9GdW5jdGlvbnMgb24gTG9hZFxuXG4kKHdpbmRvdykubG9hZChmdW5jdGlvbigpIHtcblxuICB2cFdpZHRoID0gdmlld3BvcnQoKS53aWR0aDtcbiAgbW9iaWxlTW92ZXMoKTtcblxuICBpZiAoJCgnLnN0aWNreScpLmxlbmd0aCkge1xuXG4gICAgc3RpY2tNZSgpO1xuXG4gIH1cblxuICBpZigkKCcucmV2aWV3JykubGVuZ3RoKSB7XG5cbiAgICByZXZpZXdTaXppbmcoKTtcblxuICB9XG5cbiAgaWYgKCQoJy5yZXZpZXctZmVhdHVyZWQnKS5sZW5ndGgpIHtcbiAgICAvL3Jldmlld1NsaWRlclNpemVzKCk7XG4gICAgJCh3aW5kb3cpLnJlc2l6ZSgpOyBcbiAgfVxuXG4gIGlmICgkKCcuZmVhdHVyZWQtYWdlbnQnKS5sZW5ndGggJiYgdmlld3BvcnQoKS53aWR0aCA+IDk2MCkge1xuXG4gICAgdmFyIGVsZW1lbnQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnaHAtYWdlbnQtYmlvJyk7XG4gICAgdmFyIGVsbGlwc2lzID0gbmV3IEVsbGlwc2lzKGVsZW1lbnQpO1xuXG4gICAgZWxsaXBzaXMuY2FsYygpO1xuICAgIGVsbGlwc2lzLnNldCgpO1xuXG4gIH1cblxuICBpZiAoJCgnLnJldmlldy1yb3ctaW5uZXIgLmF1dGhvci13cmFwJykubGVuZ3RoKSB7XG5cbiAgICBhdXRob3JXcmFwQ2hlY2soKTtcblxuICB9XG5cbiAgaWYgKCQoJy5pdGluZXJhcnktYXJ0aWNsZScpLmxlbmd0aCkge1xuXG4gICAgaXRpbmVyYXJ5QmxvY2tDaGVjaygpO1xuXG4gICAgJCgnLml0aW5lcmFyeS1pbnRybyAuZGV0YWlscycpLmNzcygnbWluLWhlaWdodCcsICQoJy5hdXRob3ItZGV0YWlsJykub3V0ZXJIZWlnaHQoKSArICdweCcpO1xuXG4gIH1cblxufSk7XG5cblxuLy9GdW5jdGlvbnMgb24gUmVzaXplXG5cbiQod2luZG93KS5vbigncmVzaXplJywgZnVuY3Rpb24oKSB7XG5cbiAgdnBXaWR0aCA9IHZpZXdwb3J0KCkud2lkdGg7XG4gIG1vYmlsZU1vdmVzKCk7XG5cbiAgaWYgKCQoJy5zdGlja3knKS5sZW5ndGgpIHtcblxuICAgIHN0aWNrTWUoKTtcblxuICB9XG5cbiAgaWYgKCQoJy5yZXZpZXctZmVhdHVyZWQnKS5sZW5ndGgpIHtcbiAgICAvL3Jldmlld1NsaWRlclNpemVzKCk7XG4gIH1cblxuICBpZiAoJCgnLnJldmlldy1yb3ctaW5uZXIgLmF1dGhvci13cmFwJykubGVuZ3RoKSB7XG5cbiAgICBhdXRob3JXcmFwQ2hlY2soKTtcblxuICB9XG5cbn0pO1xuXG4vL0Z1bmN0aW9ucyBvbiBTY3JvbGxcblxuJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBmdW5jdGlvbigpIHtcblxuICBhcnRpY2xlU2hhcmUoKTtcblxuICBpZiAoJCgnLnN0aWNreScpLmxlbmd0aCkge1xuXG4gICAgc3RpY2tNZSgpO1xuXG4gIH1cblxuICBpZiAoJCgnLml0aW5lcmFyeS1hcnRpY2xlJykubGVuZ3RoKSB7XG5cbiAgICBpdGluZXJhcnlCbG9ja0NoZWNrKCk7XG5cbiAgfVxuXG59KTtcblxuLy9GdW5jdGlvbnMgb24gQ2xpY2tcblxuJCgnYm9keScpLm9uKCdjbGljaycsICcud2hvbGUtY2xpY2snLCBmdW5jdGlvbigpXG57XG5cdHZhciBuZXdfd2luZG93ID0gZmFsc2U7XG5cdHZhciBnb3RvbGluayA9ICQodGhpcykuZmluZChcImFcIikuYXR0cihcImhyZWZcIik7XG5cdGlmICggJCh0aGlzKS5maW5kKFwiYVwiKS5hdHRyKFwidGFyZ2V0XCIpID09ICdfYmxhbmsnKVxuXHRcdG5ld193aW5kb3cgPSB0cnVlOyAgICBcblx0aWYoJCh0aGlzKS5maW5kKFwiYS5saW5rLW1lXCIpLmF0dHIoXCJocmVmXCIpICE9PSB1bmRlZmluZWQgKVxuXHR7XG5cdCBnb3RvbGluayA9ICQodGhpcykuZmluZChcImEubGluay1tZVwiKS5hdHRyKFwiaHJlZlwiKTtcblx0IGlmICggJCh0aGlzKS5maW5kKFwiYS5saW5rLW1lXCIpLmF0dHIoJ3RhcmdldCcpID09ICdfYmxhbmsnKVxuXHQgICAgIG5ld193aW5kb3cgPSB0cnVlOyAgICBcblx0fVxuXHRpZihuZXdfd2luZG93KVxuXHQgd2luZG93Lm9wZW4oZ290b2xpbmspO1xuXHRlbHNlXG5cdCB3aW5kb3cubG9jYXRpb24gPSBnb3RvbGluaztcbn0pO1xuXG4kKCdib2R5Jykub24oJ2NsaWNrJywgJy53aG9sZS1jbGljay1wcmVzcy1pbWFnZScsIGZ1bmN0aW9uKClcbntcblx0ZXZlbnQucHJldmVudERlZmF1bHQoKVxuXHR2YXIgaW1hZ2UgPSAkKHRoaXMpLmZpbmQoXCJhXCIpLmF0dHIoXCJocmVmXCIpO1xuXHQkKCcuYWdlbnQtbGlnaHRib3gucHJlc3MgI3ByZXNzLWltYWdlJykuYXR0cignc3JjJyxpbWFnZSk7XG5cdCQoJy5hZ2VudC1saWdodGJveC5wcmVzcycpLmZhZGVJbigpO1xufSk7XG5cblxuJCgnLmhhbWJ1cmdlcicpLmNsaWNrKGZ1bmN0aW9uKCkge1xuXG4gICQoJyNtb2JpbGUtbWVudScpLnNsaWRlVG9nZ2xlKCdzbG93Jyk7XG4gICQodGhpcykudG9nZ2xlQ2xhc3MoJ2lzLWFjdGl2ZScpO1xuICAkKCdib2R5LCBodG1sJykudG9nZ2xlQ2xhc3MoJ25vLXNjcm9sbCcpO1xuXG59KTtcblxuJCgnLmhwLXdoeSAuY29sLTQnKS5jbGljayhmdW5jdGlvbigpIHtcblxuICBpZiAodnBXaWR0aCA8PSA2MDApIHtcblxuICAgICQodGhpcykuZmluZCgnLm1vYi1hcnJvdycpLnRvZ2dsZUNsYXNzKCdmbGlwJyk7XG4gICAgJCh0aGlzKS5maW5kKCdwJykuc2xpZGVUb2dnbGUoKTtcblxuICB9XG5cbn0pO1xuXG4kKCcucmV2aWV3LXJvdycpLmNsaWNrKGZ1bmN0aW9uKCkge1xuXG4gIGlmICgkKHRoaXMpLmhhc0NsYXNzKCd0YWxsJykpIHtcbiAgICBjb25zb2xlLmxvZygndGVzdCcpO1xuICAgICQodGhpcykucmVtb3ZlQ2xhc3MoJ3RhbGwnKS5hZGRDbGFzcygnZXhwYW5kZWQnKTtcbiAgfVxuXG59KTtcblxuJCgnLmRkLXRvcCcpLmNsaWNrKGZ1bmN0aW9uKCkge1xuXG4gICQodGhpcykuc2libGluZ3MoJy5kZC10b3AnKS5yZW1vdmVDbGFzcygnYWN0aXZlJykuZmluZCgnLmRkJykuc2xpZGVVcCgpO1xuICAkKHRoaXMpLnBhcmVudCgpLnNpYmxpbmdzKCkuZmluZCgnLmRkJykuc2xpZGVVcCgpO1xuICAkKHRoaXMpLmZpbmQoJy5kZCcpLnNsaWRlVG9nZ2xlKCk7XG4gICQodGhpcykudG9nZ2xlQ2xhc3MoJ2FjdGl2ZScpO1xuXG59KS5jaGlsZHJlbigpLm5vdCgnc3ZnLmFycm93LWRvd24nKS5jbGljayhmdW5jdGlvbihlKSB7XG4gIHJldHVybiBmYWxzZTtcbn0pO1xuXG4kKCcuZGQtdG9wIHNwYW4ubmFtZScpLmNsaWNrKGZ1bmN0aW9uKCkge1xuXG5cdHZhciAkdGhpcyA9ICQodGhpcykucGFyZW50KCk7XG4gICR0aGlzLnNpYmxpbmdzKCcuZGQtdG9wJykucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpLmZpbmQoJy5kZCcpLnNsaWRlVXAoKTtcbiAgJHRoaXMucGFyZW50KCkuc2libGluZ3MoKS5maW5kKCcuZGQnKS5zbGlkZVVwKCk7XG4gICR0aGlzLmZpbmQoJy5kZCcpLnNsaWRlVG9nZ2xlKCk7XG4gICR0aGlzLnRvZ2dsZUNsYXNzKCdhY3RpdmUnKTtcblxufSkuY2hpbGRyZW4oKS5ub3QoJ3N2Zy5hcnJvdy1kb3duJykuY2xpY2soZnVuY3Rpb24oZSkge1xuICByZXR1cm4gZmFsc2U7XG59KTtcblxuJCgnLmxpZ2h0Ym94LXRyaWdnZXInKS5jbGljayhmdW5jdGlvbigpIHtcblxuICAkKCcuYWdlbnQtbGlnaHRib3guZ2FsbGVyeScpLmZhZGVJbigpO1xuXG59KTtcblxuJCgnLmxiLWNsb3NlLXRyaWdnZXInKS5jbGljayhmdW5jdGlvbigpIHtcblxuICAkKHRoaXMpLnBhcmVudCgpLmZhZGVPdXQoKTtcblxufSk7XG5cbiQoJy5sYi1jaGFuZ2UtdHJpZ2dlcicpLmNsaWNrKGZ1bmN0aW9uKCkge1xuXG4gIHZhciBkaXIgPSAkKHRoaXMpLmRhdGEoJ2RpcicpO1xuICB2YXIgY3VyID0gJCgnLmFnZW50LWxpZ2h0Ym94LmdhbGxlcnkgZmlndXJlLmFjdGl2ZScpLmRhdGEoJ3NsaWRlJyk7XG4gIHZhciB0b3RhbCA9ICQoJy5hZ2VudC1saWdodGJveC5nYWxsZXJ5IGZpZ3VyZScpLmxlbmd0aDtcbiAgdmFyIG5leHQgPSBjdXIgKyBkaXI7XG5cbiAgaWYgKG5leHQgPiB0b3RhbCkge1xuXG4gICAgbmV4dCA9IDE7XG5cbiAgfSBlbHNlIGlmIChuZXh0IDw9IDApIHtcblxuICAgIG5leHQgPSB0b3RhbDtcblxuICB9XG5cbiAgJCgnLmFnZW50LWxpZ2h0Ym94LmdhbGxlcnkgZmlndXJlLmFjdGl2ZScpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKS5mYWRlT3V0KGZ1bmN0aW9uKCkge1xuICAgIFxuICAgICQoJyNzbGlkZS0nICsgbmV4dCkuYWRkQ2xhc3MoJ2FjdGl2ZScpLmZhZGVJbigpO1xuXG4gIH0pO1xuXG59KTtcblxuJCgnLmF1LXRyaWdnZXInKS5jbGljayhmdW5jdGlvbigpIHtcblxuICAkKHRoaXMpLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgJCh0aGlzKS5zaWJsaW5ncygpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcbiAgJCgnLm5hLWRldGFpbHMnKS5zbGlkZVVwKCk7XG4gICQoJy5hdS1kZXRhaWxzJykuc2xpZGVEb3duKCk7XG5cbn0pO1xuXG4kKCcubmEtdHJpZ2dlcicpLmNsaWNrKGZ1bmN0aW9uKCkge1xuXG4gICQodGhpcykuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAkKHRoaXMpLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuICAkKCcuYXUtZGV0YWlscycpLnNsaWRlVXAoKTtcbiAgJCgnLm5hLWRldGFpbHMnKS5zbGlkZURvd24oKTtcblxufSk7XG5cbiQoJy5pbnF1aXJlcy1tb2RhbC1jbG9zZScpLmNsaWNrKGZ1bmN0aW9uKCkge1xuXG4gICQodGhpcykucGFyZW50KCkuZmFkZU91dCgpO1xuXG59KTtcblxuJCgnLm1vZGFsLXRyaWdnZXInKS5jbGljayhmdW5jdGlvbigpIHtcblxuICAkKCcuaW5xdWlyZXMtbW9kYWwnKS5mYWRlSW4oKTtcblxufSk7XG5cbiQoJy5tb2JpbGUtbWVudSAuYnV0dG9uLCAuZm9vdGVyLWN0YSwgLnJldmlldy1jdGEnKS5jbGljayhmdW5jdGlvbihlKSB7XG4gIGUucHJldmVudERlZmF1bHQoKTtcbiAgJCgnLmhhbWJ1cmdlcicpLnJlbW92ZUNsYXNzKCdpcy1hY3RpdmUnKTtcbiAgJCgnI21vYmlsZS1tZW51Jykuc2xpZGVVcCgpO1xuICAkKCcudG91Y2gtc2xpZGVvdXQnKS5hZGRDbGFzcygnb3BlbicpO1xuICAkKCdib2R5JykuYWRkQ2xhc3MoJ25vLXNjcm9sbCcpO1xuXG59KTtcblxuJCgnLnRvdWNoLXNsaWRlb3V0ID4gc3BhbiwgLnRvdWNoLXNsaWRlb3V0IC5jb3ZlcicpLmNsaWNrKGZ1bmN0aW9uKCkge1xuXG4gICQoJy50b3VjaC1zbGlkZW91dCcpLnJlbW92ZUNsYXNzKCdvcGVuJyk7XG4gICQoJ2JvZHknKS5yZW1vdmVDbGFzcygnbm8tc2Nyb2xsJyk7XG5cbn0pO1xuXG4kKCcuaGVhZGVyLXNlYXJjaC10cmlnZ2VyLCAubW9iLXNlYXJjaC10cmlnZ2VyJykuY2xpY2soZnVuY3Rpb24oKSB7XG5cbiAgJCgnLmhlYWRlci1uZXdzbGV0dGVyLXRyaWdnZXInKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG5cbiAgJCgnLmhlYWRlci1uZXdzbGV0dGVyJykuc2xpZGVVcChmdW5jdGlvbigpIHtcblxuICAgICQoJy5oZWFkZXItc2VhcmNoJykuc2xpZGVUb2dnbGUoKTtcbiAgICBcbiAgfSk7XG5cbiAgJCgnLmhlYWRlci1zZWFyY2ggaW5wdXQnKS5mb2N1cygpO1xuXG4gICQodGhpcykudG9nZ2xlQ2xhc3MoJ2FjdGl2ZScpO1xuXG59KTtcblxuJCgnLmhlYWRlci1uZXdzbGV0dGVyLXRyaWdnZXInKS5jbGljayhmdW5jdGlvbigpIHtcblxuICAkKCcuaGVhZGVyLXNlYXJjaC10cmlnZ2VyJykucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuXG4gICQoJy5oZWFkZXItc2VhcmNoJykuc2xpZGVVcChmdW5jdGlvbigpIHtcblxuICAgICQoJy5oZWFkZXItbmV3c2xldHRlcicpLnNsaWRlVG9nZ2xlKCk7ICAgIFxuXG4gIH0pO1xuXG4gICQodGhpcykudG9nZ2xlQ2xhc3MoJ2FjdGl2ZScpO1xuXG59KTtcblxuJCgnLmhwLWRpZi10cmlnZ2VyJykuY2xpY2soZnVuY3Rpb24oKSB7XG5cbiAgJCgnaHRtbCwgYm9keScpLmFuaW1hdGUoe1xuICAgIHNjcm9sbFRvcDogJCgnLmhwLXdoeScpLm9mZnNldCgpLnRvcFxuICB9LCA3MDApO1xuXG59KTtcblxuJCgnLmFydGljbGUtc2hhcmUgdWwnKS5jbGljayhmdW5jdGlvbigpIHtcblxuICAkKHRoaXMpLnBhcmVudCgpLnRvZ2dsZUNsYXNzKCdvcGVuJyk7XG5cbn0pO1xuXG4kKCcubW9iLWNhdGVnb3JpZXMgYS5hY3RpdmUnKS5jbGljayhmdW5jdGlvbihlKSB7XG5cbiAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICQodGhpcykudG9nZ2xlQ2xhc3MoJ3NwaW4nKS5wYXJlbnQoKS5maW5kKCcuZGQnKS5zbGlkZVRvZ2dsZSgpO1xuXG59KTtcblxuJCgnLnRlYW0tZmlsdGVycyAubW9iLWZpbHRlci10cmlnZ2VyJykub24oJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG5cbiAgJCgnLnRlYW0tZmlsdGVycyAuaW5wdXQtd3JhcCcpLnRvZ2dsZUNsYXNzKCdhY3RpdmUnKTtcblxuICBpZiAoJCgnLnRlYW0tZmlsdGVycyAuaW5wdXQtd3JhcCcpLmhhc0NsYXNzKCdhY3RpdmUnKSkge1xuXG4gICAgJCgnLnRlYW0tZmlsdGVycyAuaW5wdXQtd3JhcCcpLmZvY3VzKCk7XG5cbiAgfVxuXG59KTtcblxuJCgnLnRlYW0tZXhwbG9yZS1jdGEnKS5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcblxuICBjb25zb2xlLmxvZygkKCcudGVhbS1ncmlkJykuZmlyc3QoKS5vZmZzZXQoKS50b3ApO1xuXG4gICQoXCJodG1sLCBib2R5XCIpLmFuaW1hdGUoe1xuICAgIHNjcm9sbFRvcDogJCgnLnRlYW0tZ3JpZCcpLmZpcnN0KCkub2Zmc2V0KCkudG9wIC0gNTBcbiAgfSwgNTAwKTtcblxufSk7XG5cblxuJCgnLmJlc3QtY29udHJvbHMgc3BhbicpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuXG4gIHZhciBhY3RpdmUgPSAkKCcuYmVzdC1wb3N0cy1pbm5lci5hY3RpdmUnKTtcbiAgdmFyIG5leHQgPSAkKHRoaXMpLmRhdGEoJ2lkJyk7XG5cbiAgY29uc29sZS5sb2cobmV4dCk7XG4gIGNvbnNvbGUubG9nKGFjdGl2ZSk7XG5cbiAgaWYgKCFhY3RpdmUuaGFzQ2xhc3MobmV4dCkpIHtcblxuICAgIGNvbnNvbGUubG9nKCd0ZXN0LTInKTtcblxuICAgICQodGhpcykuYWRkQ2xhc3MoJ2FjdGl2ZScpLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgICQoJy5iZXN0LXBvc3RzLWlubmVyLicgKyBuZXh0KS5hZGRDbGFzcygnYWN0aXZlJykuZmFkZUluKCkuc2libGluZ3MoKS5yZW1vdmVDbGFzcygnYWN0aXZlJykuZmFkZU91dCgpO1xuICAgICQoJy5iZXN0LWN0YS4nICsgbmV4dCkuYWRkQ2xhc3MoJ2FjdGl2ZScpLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuXG4gIH1cblxufSk7XG5cblxuXG4kKFwiLnNpbmdsZSAuYXJ0aWNsZS1jb250ZW50XCIpLmVhY2goZnVuY3Rpb24oKXtcblx0aWYoJCh0aGlzKS5pcygnOmVtcHR5JykpXG5cdFx0JCh0aGlzKS5yZW1vdmUoKTtcblx0aWYoJC50cmltKCQodGhpcykudGV4dCgpKSA9PSBcIlwiKVxuXHRcdCQodGhpcykucmVtb3ZlKCk7XG59KTtcblxuXG4kKGRvY3VtZW50KS5vbigndG91Y2htb3ZlJywgZnVuY3Rpb24oZSkge1xuXG4gICAgaWYgKCQoJ2h0bWwnKS5oYXNDbGFzcygnbm8tc2Nyb2xsJykpIHtcblxuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgfVxuICAgIFxufSk7XG5cbiQoJy5tb2JpbGUtbWVudSBpbnB1dCcpLmZvY3Vzb3V0KGZ1bmN0aW9uKCkge1xuXG4gICQoXCJodG1sLCBib2R5XCIpLmFuaW1hdGUoeyBzY3JvbGxUb3A6IDAgfSk7XG5cbn0pO1xuXG4kKCcuY2l0eS10cmlnZ2VyJykub24oJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG5cbiAgY29uc29sZS5sb2coXCJ0ZXN0XCIpO1xuXG4gIGlmICghJCh0aGlzKS5oYXNDbGFzcygnYWN0aXZlJykpIHtcblxuICAgICQodGhpcykuYWRkQ2xhc3MoJ2FjdGl2ZScpLnJlbW92ZUNsYXNzKCdoaWRkZW4nKS5zaWJsaW5ncygpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKS5hZGRDbGFzcygnaGlkZGVuJyk7XG4gICAgJCgnLnRlYW0tZmlsdGVycyB1bCcpLnNsaWRlVXAoKTtcbiAgICAkKCcudGVhbS1maWx0ZXJzIC5jaXR5LWZpbHRlcnMnKS5zbGlkZURvd24oKTtcblxuICB9IGVsc2Uge1xuXG4gICAgJCh0aGlzKS5yZW1vdmVDbGFzcygnYWN0aXZlJykuc2libGluZ3MoKS5yZW1vdmVDbGFzcygnaGlkZGVuJyk7XG4gICAgJCgnLnRlYW0tZmlsdGVycyB1bCcpLnNsaWRlVXAoKTtcbiAgICAkKCcudGVhbS1maWx0ZXJzIC5jaXR5LWZpbHRlcnMnKS5zbGlkZVVwKCk7XG5cbiAgfVxuXG59KTtcblxuJCgnLnNwZWNpYWxpdHktdHJpZ2dlcicpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuXG4gIGNvbnNvbGUubG9nKFwidGVzdFwiKTtcblxuICBpZiAoISQodGhpcykuaGFzQ2xhc3MoJ2FjdGl2ZScpKSB7XG5cbiAgICAkKHRoaXMpLmFkZENsYXNzKCdhY3RpdmUnKS5yZW1vdmVDbGFzcygnaGlkZGVuJykuc2libGluZ3MoKS5yZW1vdmVDbGFzcygnYWN0aXZlJykuYWRkQ2xhc3MoJ2hpZGRlbicpO1xuICAgICQoJy50ZWFtLWZpbHRlcnMgLmNpdHktZmlsdGVycycpLnNsaWRlVXAoKTtcbiAgICAkKCcudGVhbS1maWx0ZXJzIHVsJykuc2xpZGVEb3duKCk7XG5cbiAgfSBlbHNlIHtcblxuICAgICQodGhpcykucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2hpZGRlbicpO1xuICAgICQoJy50ZWFtLWZpbHRlcnMgdWwnKS5zbGlkZVVwKCk7XG4gICAgJCgnLnRlYW0tZmlsdGVycyAuY2l0eS1maWx0ZXJzJykuc2xpZGVVcCgpO1xuXG4gIH1cblxufSk7XG5cbiQoJy5hZ2VudC10ZXN0aW1vbmlhbHMgLmRvdHMgc3BhbicpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuXG4gIHZhciBkYXRhID0gJCh0aGlzKS5kYXRhKCdpZCcpO1xuXG4gICQodGhpcykuYWRkQ2xhc3MoJ2FjdGl2ZScpLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuICAkKCcjcXVvdGUtJyArIGRhdGEpLmFkZENsYXNzKCdhY3RpdmUnKS5zaWJsaW5ncygpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcblxufSk7XG5cblxuJCgnLnRlYW0tZHJvcGRvd25zID4gc3BhbiwgLnRlYW0tZ3JpZC1jb250cm9scyA+IHNwYW4nKS5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcblxuICAkKHRoaXMpLmZpbmQoJy5kZC10b3AnKS5zbGlkZVRvZ2dsZSgpO1xuXG59KTtcblxuJCgnLnRlYW0tZHJvcGRvd25zIC5kZC10b3AgPiBkaXYgPiBzcGFuLCAudGVhbS1ncmlkLWNvbnRyb2xzIC5kZC10b3AgPiBkaXYgPiBzcGFuJykub24oJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG5cbiAgJCh0aGlzKS5uZXh0KCkuc2xpZGVUb2dnbGUoKTtcblxufSk7XG5cblxuXG4kKGRvY3VtZW50KS5rZXl1cChmdW5jdGlvbihlKSB7XG4gICAgIGlmIChlLmtleUNvZGUgPT0gMjcgJiYgJCgnLmlucXVpcmVzLW1vZGFsJykubGVuZ3RoKSB7IFxuXG4gICAgICAkKCcuaW5xdWlyZXMtbW9kYWwnKS5mYWRlT3V0KCk7XG5cbiAgICB9XG59KTtcblxuXG5cbi8vKioqKioqKioqKioqKioqKioqKlxuLy9cdFNoYXJlIFN0dWZmIC0gVHdpdHRlciAmIEZhY2Vib29rIC0gc2luY2Ugd2UgYXJlIHVzaW5nIG91ciBvd24gYnV0dG9uc1xuLy8qKioqKioqKioqKioqKioqKioqXG4kKCdib2R5Jykub24oJ2NsaWNrJywgJy5hcnRpY2xlLXNoYXJlIGEnLCBmdW5jdGlvbihldmVudClcbntcblx0XG5cdHZhciBsaW5rID0gdGhpcy5ocmVmO1x0XHRcdFxuXHRcblx0dmFyIHdpZHRoICA9IDU3NSxcblx0ICAgIGhlaWdodCA9IDQwMCxcblx0ICAgIGxlZnQgICA9ICgkKHdpbmRvdykud2lkdGgoKSAgLSB3aWR0aCkgIC8gMixcblx0ICAgIHRvcCAgICA9ICgkKHdpbmRvdykuaGVpZ2h0KCkgLSBoZWlnaHQpIC8gMixcblx0ICAgIHVybCAgICA9IGxpbmssXG5cdCAgICBvcHRzICAgPSAnc3RhdHVzPTEnICtcblx0ICAgICAgICAgICAgICcsd2lkdGg9JyAgKyB3aWR0aCAgK1xuXHQgICAgICAgICAgICAgJyxoZWlnaHQ9JyArIGhlaWdodCArXG5cdCAgICAgICAgICAgICAnLHRvcD0nICAgICsgdG9wICAgICtcblx0ICAgICAgICAgICAgICcsbGVmdD0nICAgKyBsZWZ0O1xuXHRcblx0d2luZG93Lm9wZW4odXJsLCAndHdpdHRlcicsIG9wdHMpO1xuXHRcblx0cmV0dXJuIGZhbHNlO1xufSk7XHRcblxuXG5cbi8vKioqKioqKioqKioqKioqKioqKlxuLy9cdExvYWQgTW9yZSBBcmNoaXZlIFBhZ2VzXG4vLyoqKioqKioqKioqKioqKioqKipcbiQoJy5sb2FkLW1vcmUuZ2V0LWFyY2hpdmUnKS5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcblx0XG5cdHZhciAkdGhpcyA9ICQodGhpcyk7XG5cdFxuXHQkKCcubG9hZC1tb3JlLmdldC1hcmNoaXZlIC5sb2FkLW1vcmUtdGV4dCcpLmh0bWwoJ0xvYWRpbmcuLi4nKTtcblx0XG5cdHZhciBsaW5rX2RhdGEgPSAkKHRoaXMpLmRhdGEoKTtcblx0bGlua19kYXRhLnBhZ2VkID0gbGlua19kYXRhLnBhZ2VkKzE7XG5cdFxuXHR2YXIgZGF0YSA9IHtcblx0XHRhY3Rpb246ICdzbWFydGZseWVyX21vcmVfcG9zdHMnLFxuXHRcdGRhdGE6IGxpbmtfZGF0YVxuXHR9O1xuXHRcblx0JC5wb3N0KGFqYXh1cmwsIGRhdGEsIGZ1bmN0aW9uKHJlc3BvbnNlKVxuXHR7XG5cdFx0cmVzcG9uc2UgPSAkLnBhcnNlSlNPTihyZXNwb25zZSk7XG5cdFx0JHRoaXMuZGF0YSgncGFnZScscmVzcG9uc2UucGFnZSk7XG5cdFx0JHRoaXMuZGF0YSgnZXhjbHVkZScsIHJlc3BvbnNlLmV4Y2x1ZGUpO1xuXHRcdFxuXHRcdCQoJy5qdXN0LXdyYXAubGFzdCAucGxhY2Vob2xkZXInKS5iZWZvcmUocmVzcG9uc2UuY29udGVudCk7XHRcblx0XHRcblx0XHRpZihyZXNwb25zZS5jb250ZW50ID09ICcnKVxuXHRcdFx0JCgnLmxvYWQtbW9yZS5nZXQtYXJjaGl2ZScpLmhpZGUoKTtcdFxuXHRcdGVsc2Vcblx0XHRcdCQoJy5sb2FkLW1vcmUuZ2V0LWFyY2hpdmUgLmxvYWQtbW9yZS10ZXh0JykuaHRtbCgnTG9hZCBNb3JlJyk7XHRcblx0XHRcblx0XHRcblx0XHRpZihyZXNwb25zZS5uZXh0X2NvdW50IDw9IDApXG5cdFx0XHQkKCcubG9hZC1tb3JlLmdldC1hcmNoaXZlJykuaGlkZSgpO1xuXHQgICAgXG5cdH0pO1xuXG59KTtcblxuXG4vLyoqKioqKioqKioqKioqKioqKipcbi8vXHRMb2FkIE1vcmUgUmV2aWV3IFBhZ2VzXG4vLyoqKioqKioqKioqKioqKioqKipcbiQoJy5sb2FkLW1vcmUuZ2V0LXJldmlld3MnKS5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcblx0XG5cdHZhciAkdGhpcyA9ICQodGhpcyk7XG5cdFxuXHQkKCcubG9hZC1tb3JlLmdldC1yZXZpZXdzIC5sb2FkLW1vcmUtdGV4dCcpLmh0bWwoJ0xvYWRpbmcuLi4nKTtcblx0XG5cdHZhciBsaW5rX2RhdGEgPSAkKHRoaXMpLmRhdGEoKTtcblx0bGlua19kYXRhLnBhZ2VkID0gbGlua19kYXRhLnBhZ2VkKzE7XG5cdFxuXHR2YXIgZGF0YSA9IHtcblx0XHRhY3Rpb246ICdzbWFydGZseWVyX21vcmVfcmV2aWV3cycsXG5cdFx0ZGF0YTogbGlua19kYXRhXG5cdH07XG5cdFxuXHQkLnBvc3QoYWpheHVybCwgZGF0YSwgZnVuY3Rpb24ocmVzcG9uc2UpXG5cdHtcblx0XHRyZXNwb25zZSA9ICQucGFyc2VKU09OKHJlc3BvbnNlKTtcblx0XHQkdGhpcy5kYXRhKCdwYWdlJyxyZXNwb25zZS5wYWdlKTtcblx0XHQkdGhpcy5kYXRhKCdleGNsdWRlJywgcmVzcG9uc2UuZXhjbHVkZSk7XG5cdFx0XG5cdFx0JCgnLnJldmlld3MtbWFpbiAuZmlyc3QtcGxhY2Vob2xkZXInKS5iZWZvcmUocmVzcG9uc2UuY29udGVudCk7XHRcblx0XHRcblx0XHRpZihyZXNwb25zZS5jb250ZW50ID09ICcnKVxuXHRcdFx0JCgnLmxvYWQtbW9yZS5nZXQtcmV2aWV3cycpLmhpZGUoKTtcdFxuXHRcdGVsc2Vcblx0XHRcdCQoJy5sb2FkLW1vcmUuZ2V0LXJldmlld3MgLmxvYWQtbW9yZS10ZXh0JykuaHRtbCgnTG9hZCBNb3JlJyk7XHRcblx0XHRcblx0XHRcblx0XHRpZihyZXNwb25zZS5uZXh0X2NvdW50IDw9IDApXG5cdFx0XHQkKCcubG9hZC1tb3JlLmdldC1yZXZpZXdzJykuaGlkZSgpO1xuXHQgICAgXG5cdH0pO1xuXG59KTtcblxuXG5cbiQoIFwiLm1jLWZvcm0ubW9iaWxlIC5hcnJvdy1yaWdodC1sYXJnZVwiICkuY2xpY2soZnVuY3Rpb24oKSB7XG5cdCQoIFwiLm1jLWZvcm0ubW9iaWxlXCIgKS5zdWJtaXQoKTtcbn0pO1xuXG4vLyoqKioqKioqKioqKioqKioqKipcbi8vXHRNYWlsY2hpbXAgU3R1ZmZcbi8vKioqKioqKioqKioqKioqKioqKlxudmFyIGFjX2VtYWlsID0gJyc7XG5cbiQoJy5tYy1mb3JtJykub24oJ3N1Ym1pdCcsIGZ1bmN0aW9uKGUpIHtcblx0IFxuXHRlLnByZXZlbnREZWZhdWx0KCk7XG5cdCQoJy5tYy1mb3JtLmhlYWRlciAubWVzc2FnZSwgLm1jLWZvcm0ubGFuZGluZyAubWVzc2FnZSwgLm1jLWZvcm0uZm9vdGVyIC5tZXNzYWdlLCAubWMtZm9ybS5hcnRpY2xlIC5tZXNzYWdlLCAubWMtZm9ybS5zdGF0aWMgLm1lc3NhZ2UnKS5odG1sKCcnKS5yZW1vdmVDbGFzcygnZXJyb3InKS5yZW1vdmVDbGFzcygnc3VjY2VzcycpO1xuXHRcblx0YWNfZW1haWwgPSAkKHRoaXMpLmZpbmQoJyNtYy1lbWFpbCcpLnZhbCgpO1xuXHR2YXIgZm9ybSA9ICQoIHRoaXMgKTtcblx0XG5cdGlmKCFpc0VtYWlsKGFjX2VtYWlsKSlcblx0e1xuXHRcdCQodGhpcykuZmluZCgnLm1lc3NhZ2UnKS5hZGRDbGFzcygnZXJyb3InKTtcblx0XHQkKHRoaXMpLmZpbmQoJy5tZXNzYWdlJykuaHRtbChcIkVtYWlsIGlzIG5vdCB2YWxpZC5cIik7XG5cdFx0XG5cdFx0cmV0dXJuIGZhbHNlO1xuXHR9XG5cdFxuXHRcblx0JCgnLm5ld3NsZXR0ZXItbW9kYWwnKS5mYWRlSW4oKTtcblx0XG5cdHJldHVybiBmYWxzZTtcbiAgICBcbiAgICBcbn0pO1xuXG4vKlxuJCgnI25pbmphX2Zvcm1zX2ZpZWxkXzM2JykuY2xpY2soZnVuY3Rpb24oKXtcblxuICBpZigkKFwiI25pbmphX2Zvcm1zX2ZpZWxkXzUwXCIpLmlzKCc6Y2hlY2tlZCcpKVxuICAgIGlmKCQoJyNuaW5qYV9mb3Jtc19maWVsZF8yMicpLnZhbCgpICE9ICdFbWFpbCAqJyAmJiAkKCcjbmluamFfZm9ybXNfZmllbGRfMjInKS52YWwoKSAhPSAnJyAmJlxuICAgICAgJCgnI25pbmphX2Zvcm1zX2ZpZWxkXzIwJykudmFsKCkgIT0gJ0ZpcnN0IE5hbWUgKicgJiYgJCgnI25pbmphX2Zvcm1zX2ZpZWxkXzIwJykudmFsKCkgIT0gJycgJiZcbiAgICAgICAgJCgnI25pbmphX2Zvcm1zX2ZpZWxkXzIxJykudmFsKCkgIT0gJ0xhc3QgTmFtZSAqJyAmJiAkKCcjbmluamFfZm9ybXNfZmllbGRfMjEnKS52YWwoKSAhPSAnJykge1xuXG4gICAgICBhY19lbWFpbCA9ICQoJyNuaW5qYV9mb3Jtc19maWVsZF8yMicpLnZhbCgpO1xuICAgICAgJChcIiNuZXdzbGV0dGVyLWFjXCIpLmZpbmQoJ2lucHV0W25hbWU9Zm5hbWVdJykudmFsKCQoJyNuaW5qYV9mb3Jtc19maWVsZF8yMCcpLnZhbCgpKTtcbiAgICAgICQoXCIjbmV3c2xldHRlci1hY1wiKS5maW5kKCdpbnB1dFtuYW1lPWxuYW1lXScpLnZhbCgkKCcjbmluamFfZm9ybXNfZmllbGRfMjEnKS52YWwoKSk7XG4gICAgICAkKCcjbmV3c2xldHRlci1hYycpLnN1Ym1pdCgpO1xuICAgIH1cbn0pO1xuICovXG5cblxuJCgnI25ld3NsZXR0ZXItYWMnKS5vbignc3VibWl0JywgZnVuY3Rpb24oZSkge1xuXG5cdGUucHJldmVudERlZmF1bHQoKTtcblx0JCgnI25ld3NsZXR0ZXItYWMgLm1lc3NhZ2UnKS5odG1sKCcnKS5yZW1vdmVDbGFzcygnZXJyb3InKS5yZW1vdmVDbGFzcygnc3VjY2VzcycpO1xuXHRcblx0dmFyIGZuYW1lID0gJCh0aGlzKS5maW5kKCdpbnB1dFtuYW1lPWZuYW1lXScpLnZhbCgpO1xuXHR2YXIgbG5hbWUgPSAkKHRoaXMpLmZpbmQoJ2lucHV0W25hbWU9bG5hbWVdJykudmFsKCk7XG5cdHZhciBmb3JtID0gJCggdGhpcyApO1xuXHRcblx0aWYoZm5hbWUgPT0gJycpXG5cdHtcblx0XHRmb3JtLmZpbmQoJy5tZXNzYWdlJykuYWRkQ2xhc3MoJ2Vycm9yJyk7XG5cdFx0Zm9ybS5maW5kKCcubWVzc2FnZScpLmh0bWwoXCJQbGVhc2UgZmlsbCBpbiBmaXJzdCBuYW1lLlwiKTtcblx0XHRcblx0XHRyZXR1cm4gZmFsc2U7XG5cdH1cblx0aWYobG5hbWUgPT0gJycpXG5cdHtcblx0XHRmb3JtLmZpbmQoJy5tZXNzYWdlJykuYWRkQ2xhc3MoJ2Vycm9yJyk7XG5cdFx0Zm9ybS5maW5kKCcubWVzc2FnZScpLmh0bWwoXCJQbGVhc2UgZmlsbCBpbiBsYXN0IG5hbWUuXCIpO1xuXHRcdFxuXHRcdHJldHVybiBmYWxzZTtcblx0fVxuXHRcblx0Zm9ybS5maW5kKCdidXR0b24nKS5odG1sKFwiU3Vic2NyaWJpbmcuLi5cIikuYXR0cihcImRpc2FibGVkXCIsIHRydWUpO1xuICAgIFxuICAgIHZhciBkYXRhID0ge1xuXHRcdGFjdGlvbjogJ2V4c2l0ZV9uZXdzbGV0dGVyX2FjJyxcblx0XHRlbWFpbDogYWNfZW1haWwsXG5cdFx0Zm5hbWU6IGZuYW1lLFxuXHRcdGxuYW1lOiBsbmFtZSxcblx0fTtcblx0XG5cdCQucG9zdChhamF4dXJsLCBkYXRhLCBmdW5jdGlvbihyZXNwb25zZSlcblx0e1xuXHRcdHJlc3BvbnNlID0gJC5wYXJzZUpTT04ocmVzcG9uc2UpO1xuXHRcdGlmKHJlc3BvbnNlLnJlc3VsdCA9PSBcImVycm9yXCIpXG5cdFx0e1xuXHRcdFx0Zm9ybS5maW5kKCcubWVzc2FnZScpLmFkZENsYXNzKCdlcnJvcicpO1xuXHRcdFx0Zm9ybS5maW5kKCcubWVzc2FnZScpLmh0bWwocmVzcG9uc2UubXNnKTtcdFx0XHRcblx0XHR9XG5cdFx0XG5cdFx0aWYocmVzcG9uc2UucmVzdWx0ID09IFwic3VjY2Vzc1wiKXtcblx0XHRcdGZvcm0uZmluZCgnLm1lc3NhZ2UnKS5hZGRDbGFzcygnc3VjY2VzcycpO1xuXHRcdFx0Zm9ybS5maW5kKCcubWVzc2FnZScpLmh0bWwocmVzcG9uc2UubXNnKTtcblx0XHR9XG5cdFx0XG5cdFx0Zm9ybS5maW5kKCdidXR0b24nKS5odG1sKFwiU3Vic2NyaWJlPHN2ZyBjbGFzcz0nYXJyb3ctcmlnaHQnPjx1c2UgeGxpbms6aHJlZj1cXFwiI2Fycm93LXJpZ2h0XFxcIj48L3VzZT48L3N2Zz5cIikuYXR0cihcImRpc2FibGVkXCIsIGZhbHNlKTtcblx0fSk7XG5cblx0cmV0dXJuIGZhbHNlO1xufSk7XG5cblxuZnVuY3Rpb24gaXNFbWFpbChlbWFpbCkge1xuICB2YXIgcmVnZXggPSAvXihbYS16QS1aMC05Xy4rLV0pK1xcQCgoW2EtekEtWjAtOS1dKStcXC4pKyhbYS16QS1aMC05XXsyLDR9KSskLztcbiAgcmV0dXJuIHJlZ2V4LnRlc3QoZW1haWwpO1xufVxuXG5cblxuLypcblxuJCgnLm1jLWZvcm0nKS5hamF4Q2hpbXAoe1xuICAgIHVybDogJ2h0dHBzOi8vc21hcnRmbHllci51czQubGlzdC1tYW5hZ2UuY29tL3N1YnNjcmliZS9wb3N0P3U9Y2I2MzgwODgxN2JmNTI2YjNkMDIwMmY2YiZhbXA7aWQ9MDAwZDRmMDU0NicsXG4gICAgY2FsbGJhY2s6IG5ld3NsZXR0ZXJfc3VibWl0XG59KTtcblxuJCgnLm5ld3NsZXR0ZXJfbWVzc2FnZScpLmhpZGUoKTtcblxuZnVuY3Rpb24gbmV3c2xldHRlcl9zdWJtaXQocmVzcCxmb3JtKVxue1x0XG5cdHZhciBmb3JtX2NsYXNzID0gJyc7XG5cdFx0XG5cdCQoJy5tYy1mb3JtLmhlYWRlciAubWVzc2FnZSwubWMtZm9ybS5tb2JpbGUgLm1lc3NhZ2UsIC5tYy1mb3JtLmZvb3RlciAubWVzc2FnZScpLmh0bWwoJycpLnJlbW92ZUNsYXNzKCdlcnJvcicpLnJlbW92ZUNsYXNzKCdzdWNjZXNzJyk7XG5cdFxuXHR2YXIgcGFydHMgPSByZXNwLm1zZy5zcGxpdCgnIC0gJywgMik7XG4gICAgaWYgKHBhcnRzWzFdID09PSB1bmRlZmluZWQpIHtcbiAgICAgICAgbXNnID0gcmVzcC5tc2c7XG4gICAgfSBlbHNlIHtcbiAgICAgICAgdmFyIGkgPSBwYXJzZUludChwYXJ0c1swXSwgMTApO1xuICAgICAgICBpZiAoaS50b1N0cmluZygpID09PSBwYXJ0c1swXSkge1xuICAgICAgICAgICAgaW5kZXggPSBwYXJ0c1swXTtcbiAgICAgICAgICAgIG1zZyA9IHBhcnRzWzFdO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgaW5kZXggPSAtMTtcbiAgICAgICAgICAgIG1zZyA9IHJlc3AubXNnO1xuICAgICAgICB9XG4gICAgfVxuICAgIFxuXG4gICAgaWYoZm9ybS5oYXNDbGFzcygnZm9vdGVyJykpXG4gICAgXHRmb3JtX2NsYXNzID0gJy5tYy1mb3JtLmZvb3Rlcic7XG4gICAgXG4gICAgaWYoZm9ybS5oYXNDbGFzcygnaGVhZGVyJykpXG4gICAgXHRmb3JtX2NsYXNzID0gJy5tYy1mb3JtLmhlYWRlcic7XG4gICAgXG4gICAgaWYoZm9ybS5oYXNDbGFzcygnbW9iaWxlJykpXG4gICAgXHRmb3JtX2NsYXNzID0gJy5tYy1mb3JtLm1vYmlsZSc7XG4gICAgXHRcbiAgICBpZihmb3JtLmhhc0NsYXNzKCdocCcpKVxuICAgIFx0Zm9ybV9jbGFzcyA9ICcubWMtZm9ybS5ocCc7XG4gICAgXG4gICAgaWYoZm9ybS5oYXNDbGFzcygnc2luZ2xlJykpXG4gICAgXHRmb3JtX2NsYXNzID0gJy5tYy1mb3JtLnNpbmdsZSc7XG4gICAgXHRcbiAgICBpZihmb3JtLmhhc0NsYXNzKCdtb2JpbGUtbWVudScpKVxuICAgIFx0Zm9ybV9jbGFzcyA9ICcubWMtZm9ybS5tb2JpbGUtbWVudSc7XG4gICAgXG5cdFxuXHRpZihyZXNwLnJlc3VsdCA9PSBcImVycm9yXCIpXG5cdHtcblx0XHQkKGZvcm1fY2xhc3MrJyAubWVzc2FnZScpLmFkZENsYXNzKCdlcnJvcicpO1xuXHRcdCQoZm9ybV9jbGFzcysnIC5tZXNzYWdlJykuaHRtbChtc2cpO1x0XHRcdFxuXHR9XG5cdFxuXHRpZihyZXNwLnJlc3VsdCA9PSBcInN1Y2Nlc3NcIil7XG5cdFx0JChmb3JtX2NsYXNzKycgLm1lc3NhZ2UnKS5hZGRDbGFzcygnc3VjY2VzcycpO1xuXHRcdCQoZm9ybV9jbGFzcysnIC5tZXNzYWdlJykuaHRtbChtc2cpO1xuXHR9XG59XG5cbiovXG5cblxuXG4vLyoqKioqKioqKioqKioqKioqKipcbi8vXHRGaWx0ZXJzIC0gVGVhbSBMYW5kaW5nXG4vLyoqKioqKioqKioqKioqKioqKipcblxuXG52YXIgUXVlcnlTdHJpbmcgPSBmdW5jdGlvbiAoKSB7XG4gIC8vIFRoaXMgZnVuY3Rpb24gaXMgYW5vbnltb3VzLCBpcyBleGVjdXRlZCBpbW1lZGlhdGVseSBhbmQgXG4gIC8vIHRoZSByZXR1cm4gdmFsdWUgaXMgYXNzaWduZWQgdG8gUXVlcnlTdHJpbmchXG4gIHZhciBxdWVyeV9zdHJpbmcgPSB7fTtcbiAgdmFyIHF1ZXJ5ID0gd2luZG93LmxvY2F0aW9uLnNlYXJjaC5zdWJzdHJpbmcoMSk7XG4gIHZhciB2YXJzID0gcXVlcnkuc3BsaXQoXCImXCIpO1xuICBmb3IgKHZhciBpPTA7aTx2YXJzLmxlbmd0aDtpKyspIHtcbiAgICB2YXIgcGFpciA9IHZhcnNbaV0uc3BsaXQoXCI9XCIpO1xuICAgICAgICAvLyBJZiBmaXJzdCBlbnRyeSB3aXRoIHRoaXMgbmFtZVxuICAgIGlmICh0eXBlb2YgcXVlcnlfc3RyaW5nW3BhaXJbMF1dID09PSBcInVuZGVmaW5lZFwiKSB7XG4gICAgICBxdWVyeV9zdHJpbmdbcGFpclswXV0gPSBkZWNvZGVVUklDb21wb25lbnQocGFpclsxXSk7XG4gICAgICAgIC8vIElmIHNlY29uZCBlbnRyeSB3aXRoIHRoaXMgbmFtZVxuICAgIH0gZWxzZSBpZiAodHlwZW9mIHF1ZXJ5X3N0cmluZ1twYWlyWzBdXSA9PT0gXCJzdHJpbmdcIikge1xuICAgICAgdmFyIGFyciA9IFsgcXVlcnlfc3RyaW5nW3BhaXJbMF1dLGRlY29kZVVSSUNvbXBvbmVudChwYWlyWzFdKSBdO1xuICAgICAgcXVlcnlfc3RyaW5nW3BhaXJbMF1dID0gYXJyO1xuICAgICAgICAvLyBJZiB0aGlyZCBvciBsYXRlciBlbnRyeSB3aXRoIHRoaXMgbmFtZVxuICAgIH0gZWxzZSB7XG4gICAgICBxdWVyeV9zdHJpbmdbcGFpclswXV0ucHVzaChkZWNvZGVVUklDb21wb25lbnQocGFpclsxXSkpO1xuICAgIH1cbiAgfSBcbiAgICByZXR1cm4gcXVlcnlfc3RyaW5nO1xufSgpO1xuXG5cbiQoJy5yZXZpZXdzLWZpbHRlcnMgLmNpdHkgc3BhbicpLmNsaWNrKGZ1bmN0aW9uKGV2ZW50KVxue1x0XG5cdGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHRcblx0dmFyIGZpbHRlciA9ICQodGhpcykuZGF0YSgnZmlsdGVyJyk7XG5cdHVwZGF0ZV9yZXNvdXJjZXMoJ2xvY2F0aW9uJywgZmlsdGVyKTtcbn0pO1xuXG4kKCcucmV2aWV3cy1maWx0ZXJzIC5zcGVjIHNwYW4nKS5jbGljayhmdW5jdGlvbihldmVudClcbntcdFxuXHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1x0XG5cdHZhciBmaWx0ZXIgPSAkKHRoaXMpLmRhdGEoJ2ZpbHRlcicpO1xuXHR1cGRhdGVfcmVzb3VyY2VzKCdzcGVjaWFsdHknLCBmaWx0ZXIpO1xufSk7XG5cblxuJCgnLnJldmlld3MtZmlsdGVycyAuc29ydGJ5LnRlYW0gc3BhbicpLmNsaWNrKGZ1bmN0aW9uKGV2ZW50KVxue1x0XG5cdGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHRcblx0dmFyIGZpbHRlciA9ICQodGhpcykuZGF0YSgnZmlsdGVyJyk7XG5cdHVwZGF0ZV9yZXNvdXJjZXMoJ3NvcnQnLCBmaWx0ZXIpO1xufSk7XG5cbiQoJy5yZXZpZXdzLWZpbHRlcnMgLm1hbmFnZW1lbnQtY2xpY2snKS5jbGljayhmdW5jdGlvbihldmVudClcbntcdFxuXHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1x0XG5cdHZhciBmaWx0ZXIgPSAneWVzJztcblx0aWYoJCgnLnJldmlld3MtZmlsdGVycyAubWFuYWdlbWVudC1jbGljayAuYm94JykuaGFzQ2xhc3MoJ2FjdGl2ZScpKVxuXHRcdGZpbHRlciA9ICdubyc7XHRcblx0dXBkYXRlX3Jlc291cmNlcygnbWFuYWdlbWVudCcsIGZpbHRlcik7XG59KTtcblxuJCgnLm5ldy13aHktdXMgLm5leHQsIC5uZXctd2h5LXVzIC5tb2ItbmV4dCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuXG4gIHZhciBuZXh0ID0gJCh0aGlzKS5wYXJlbnRzKCcuY29udGVudC13cmFwJykuZmluZCgnLmNvbnRlbnQuYWN0aXZlJykubmV4dCgnLmNvbnRlbnQnKTtcbiAgY29uc29sZS5sb2cobmV4dCk7XG5cbiAgaWYgKG5leHQubGVuZ3RoKSB7XG5cbiAgICBjb25zb2xlLmxvZygnbmV4dCcpO1xuICAgIG5leHQuYWRkQ2xhc3MoJ2FjdGl2ZScpLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgICQoJyN3aHktY291bnRlcicpLmh0bWwobmV4dC5kYXRhKCdpZCcpKTtcbiAgICAkKCcuc2tldGNoZXMgLmFjdGl2ZScpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKS5uZXh0KCkuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuXG4gIH0gZWxzZSB7XG5cbiAgICBjb25zb2xlLmxvZygnbm8gbmV4dCcpO1xuICAgIG5leHQgPSAkKHRoaXMpLnBhcmVudHMoJy5jb250ZW50LXdyYXAnKS5maW5kKCcuY29udGVudCcpLmZpcnN0KCk7XG4gICAgbmV4dC5hZGRDbGFzcygnYWN0aXZlJykuc2libGluZ3MoKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG4gICAgJCgnI3doeS1jb3VudGVyJykuaHRtbChuZXh0LmRhdGEoJ2lkJykpO1xuICAgICQoJy5za2V0Y2hlcyBpbWcnKS5maXJzdCgpLmFkZENsYXNzKCdhY3RpdmUnKS5zaWJsaW5ncygpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcblxuICB9XG4gIFxuXG59KTtcblxuJCgnLm5ldy13aHktdXMgLnByZXYnKS5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcblxuICB2YXIgcHJldiA9ICQodGhpcykucGFyZW50cygnLmNvbnRlbnQtd3JhcCcpLmZpbmQoJy5jb250ZW50LmFjdGl2ZScpLnByZXYoJy5jb250ZW50Jyk7XG4gIGNvbnNvbGUubG9nKHByZXYpO1xuXG4gIGlmIChwcmV2Lmxlbmd0aCkge1xuXG4gICAgY29uc29sZS5sb2coJ3ByZXYnKTtcbiAgICBwcmV2LmFkZENsYXNzKCdhY3RpdmUnKS5zaWJsaW5ncygpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcbiAgICAkKCcjd2h5LWNvdW50ZXInKS5odG1sKHByZXYuZGF0YSgnaWQnKSk7XG4gICAgJCgnLnNrZXRjaGVzIC5hY3RpdmUnKS5yZW1vdmVDbGFzcygnYWN0aXZlJykucHJldigpLmFkZENsYXNzKCdhY3RpdmUnKTtcblxuICB9IGVsc2Uge1xuXG4gICAgY29uc29sZS5sb2coJ25vIHByZXYnKTtcbiAgICBwcmV2ID0gJCh0aGlzKS5wYXJlbnRzKCcuY29udGVudC13cmFwJykuZmluZCgnLmNvbnRlbnQnKS5sYXN0KCk7XG4gICAgcHJldi5hZGRDbGFzcygnYWN0aXZlJykuc2libGluZ3MoKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG4gICAgJCgnI3doeS1jb3VudGVyJykuaHRtbChwcmV2LmRhdGEoJ2lkJykpO1xuICAgICQoJy5za2V0Y2hlcyBpbWcnKS5sYXN0KCkuYWRkQ2xhc3MoJ2FjdGl2ZScpLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuXG4gIH1cbiAgXG5cbn0pO1xuXG5cblxuXG4kKCcudGVhbS1maWx0ZXJzIC5jaXR5LWZpbHRlcmluZyBzcGFuLmNpdHknKS5jbGljayhmdW5jdGlvbihldmVudClcbntcdFxuXHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1x0XG5cdHZhciBmaWx0ZXIgPSAkKHRoaXMpLmRhdGEoJ2ZpbHRlcicpO1xuXHR1cGRhdGVfcmVzb3VyY2VzKCdsb2NhdGlvbicsIGZpbHRlcik7XG59KTtcblxuJCgnLnRlYW0tZmlsdGVycyAuc3BlYy1maWx0ZXJpbmcgc3Bhbi5zcGVjJykuY2xpY2soZnVuY3Rpb24oZXZlbnQpXG57XHRcblx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcdFxuXHR2YXIgZmlsdGVyID0gJCh0aGlzKS5kYXRhKCdmaWx0ZXInKTtcblx0dXBkYXRlX3Jlc291cmNlcygnc3BlY2lhbHR5JywgZmlsdGVyKTtcbn0pO1xuXG4kKCcudGVhbS1maWx0ZXJzIC50ZWFtLWN0YScpLmNsaWNrKGZ1bmN0aW9uKGV2ZW50KVxue1x0XG5cdGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHRcblx0dmFyIGZpbHRlciA9ICd5ZXMnO1xuXHR1cGRhdGVfcmVzb3VyY2VzKCdtYW5hZ2VtZW50JywgZmlsdGVyKTtcbn0pO1xuXG5cbiQoJy50ZWFtLWZpbHRlcnMgaW5wdXQnKS5rZXl1cChmdW5jdGlvbihlKXtcblx0aWYoZS5rZXlDb2RlID09IDEzKVxuICAgIHtcblx0XHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1x0XG5cdFx0dXBkYXRlX3Jlc291cmNlcygnc2VhcmNoJywgJChcIi50ZWFtLWZpbHRlcnMgaW5wdXRcIikudmFsKCkpO1xuXHR9XG59KTtcblxuJCgnLnRlYW0tZmlsdGVycyBidXR0b24nKS5jbGljayhmdW5jdGlvbihldmVudCl7XG5cdGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHRcblx0dXBkYXRlX3Jlc291cmNlcygnc2VhcmNoJywgJChcIi50ZWFtLWZpbHRlcnMgaW5wdXRcIikudmFsKCkpO1xufSk7XG5cblxuXG4kKCcuc2VhcmNoLXRhZycpLmNsaWNrKGZ1bmN0aW9uKGV2ZW50KXtcblx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcblx0dmFyIGZpbHRlciA9ICQodGhpcykuZGF0YSgnZmlsdGVyJyk7XG5cdHVwZGF0ZV9yZXNvdXJjZXMoJ3NlYXJjaCcsICdzZWFyY2gtUkVNT1ZFJyk7XG59KTtcblxuXG4kKCcubG9jYXRpb24tdGFnJykuY2xpY2soZnVuY3Rpb24oZXZlbnQpe1xuXHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuXHR2YXIgZmlsdGVyID0gJCh0aGlzKS5kYXRhKCdmaWx0ZXInKTtcblx0dXBkYXRlX3Jlc291cmNlcygnbG9jYXRpb24nLCAnbG9jYXRpb24tUkVNT1ZFJyk7XG59KTtcblxuXG4kKCcuc3BlY2lhbHR5LXRhZycpLmNsaWNrKGZ1bmN0aW9uKGV2ZW50KXtcblx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcblx0dmFyIGZpbHRlciA9ICQodGhpcykuZGF0YSgnZmlsdGVyJyk7XG5cdHVwZGF0ZV9yZXNvdXJjZXMoJ3NwZWNpYWx0eScsICdzcGVjaWFsdHktUkVNT1ZFJyk7XG59KTtcblxuXG5mdW5jdGlvbiB1cGRhdGVfcmVzb3VyY2VzKHR5cGUsIGZpbHRlcilcbntcblx0dmFyIHVybCA9IHdpbmRvdy5sb2NhdGlvbi5ocmVmLnNwbGl0KFwiP1wiKTtcdFxuXHR2YXIgYWRkX3RvX3VybCA9ICcnO1xuXHRcblx0aWYodHlwZSA9PSAnbG9jYXRpb24nICYmIGZpbHRlciAhPSAnbG9jYXRpb24tUkVNT1ZFJylcblx0XHRhZGRfdG9fdXJsICs9ICcmbG9jYXRpb249JytmaWx0ZXI7XG5cdGVsc2UgaWYodHlwZW9mIFF1ZXJ5U3RyaW5nLmxvY2F0aW9uICE9PSAndW5kZWZpbmVkJyAmJiBmaWx0ZXIgIT0gJ2xvY2F0aW9uLVJFTU9WRScpXG5cdFx0YWRkX3RvX3VybCArPSAnJmxvY2F0aW9uPScrUXVlcnlTdHJpbmcubG9jYXRpb247XG5cdFxuXHRcblx0aWYodHlwZSA9PSAnc3BlY2lhbHR5JyAmJiBmaWx0ZXIgIT0gJ3NwZWNpYWx0eS1SRU1PVkUnKVxuXHRcdGFkZF90b191cmwgKz0gJyZzcGVjaWFsdHk9JytmaWx0ZXI7XG5cdGVsc2UgaWYodHlwZW9mIFF1ZXJ5U3RyaW5nLnNwZWNpYWx0eSAhPT0gJ3VuZGVmaW5lZCcgJiYgZmlsdGVyICE9ICdzcGVjaWFsdHktUkVNT1ZFJylcblx0XHRhZGRfdG9fdXJsICs9ICcmc3BlY2lhbHR5PScrUXVlcnlTdHJpbmcuc3BlY2lhbHR5O1xuXHRcblx0aWYodHlwZSA9PSAnbWFuYWdlbWVudCcpXG5cdFx0YWRkX3RvX3VybCArPSAnJm1hbmFnZW1lbnQ9JytmaWx0ZXI7XG5cdGVsc2UgaWYodHlwZW9mIFF1ZXJ5U3RyaW5nLm1hbmFnZW1lbnQgIT09ICd1bmRlZmluZWQnKVxuXHRcdGFkZF90b191cmwgKz0gJyZtYW5hZ2VtZW50PScrUXVlcnlTdHJpbmcubWFuYWdlbWVudDtcblx0XG5cdGlmKHR5cGUgPT0gJ3NlYXJjaCcgJiYgZmlsdGVyICE9ICdzZWFyY2gtUkVNT1ZFJylcblx0XHRhZGRfdG9fdXJsICs9ICcmc2VhcmNoPScrZmlsdGVyO1xuXHRlbHNlIGlmKHR5cGVvZiBRdWVyeVN0cmluZy5zZWFyY2ggIT09ICd1bmRlZmluZWQnICYmIGZpbHRlciAhPSAnc2VhcmNoLVJFTU9WRScpXG5cdFx0YWRkX3RvX3VybCArPSAnJnNlYXJjaD0nK1F1ZXJ5U3RyaW5nLnNlYXJjaDtcblx0XHRcblx0aWYodHlwZSA9PSAnc29ydCcpXG5cdFx0YWRkX3RvX3VybCArPSAnJnNvcnQ9JytmaWx0ZXI7XG5cdGVsc2UgaWYodHlwZW9mIFF1ZXJ5U3RyaW5nLnNvcnQgIT09ICd1bmRlZmluZWQnKVxuXHRcdGFkZF90b191cmwgKz0gJyZzb3J0PScrUXVlcnlTdHJpbmcuc29ydDtcblx0XG5cdFx0XG5cdHdpbmRvdy5sb2NhdGlvbiA9IHVybFswXSsnPycrYWRkX3RvX3VybDsgICAgXG59XG5cblxuXG52YXIgdGVhbV9zaXplID0gJChcIi5yZXZpZXdzLW1haW4gLmFnZW50Lndob2xlLWNsaWNrXCIpLnNpemUoKTtcbnZhciBsb2FkX3RlYW1zID0gMTY7XG52YXIgeCA9IGxvYWRfdGVhbXM7IFxuJCgnLnJldmlld3MtbWFpbiAuYWdlbnQud2hvbGUtY2xpY2s6bHQoJytsb2FkX3RlYW1zKycpJykuc2hvdygpO1xuXG4kKCcubW9yZS1wcm9maWxlcycpLmNsaWNrKGZ1bmN0aW9uICgpIHtcbiAgICB4ID0gKHgrbG9hZF90ZWFtcyA8PSB0ZWFtX3NpemUpID8geCtsb2FkX3RlYW1zIDogdGVhbV9zaXplO1xuICAgICQoJy5yZXZpZXdzLW1haW4gLmFnZW50Lndob2xlLWNsaWNrOmx0KCcreCsnKScpLnNob3coKTtcbiAgICBcbiAgICBpZih4Pj10ZWFtX3NpemUpXG4gICAgXHQkKCcubW9yZS1wcm9maWxlcycpLmhpZGUoKTtcbn0pO1xuXG4vLyoqKioqKioqKioqKioqKioqKipcbi8vXHRGaWx0ZXJzIC0gUmV2aWV3c1xuLy8qKioqKioqKioqKioqKioqKioqXG5cbnZhciBocF9yZXZpZXdfcmVnaW9uID0gJyc7XG52YXIgaHBfcmV2aWV3X3N0eWxlID0gJyc7XG5cbnZhciBocF9yZXZpZXdfcmVnaW9uX25hbWUgPSAnJztcbnZhciBocF9yZXZpZXdfc3R5bGVfbmFtZSA9ICcnO1xuXG4kKCcuaG9tZSAuaHAtd2hlcmUtdG8gLnJlZ2lvbiAuZGQgc3BhbicpLmNsaWNrKGZ1bmN0aW9uKGV2ZW50KVxue1x0XG5cdGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHRcblx0dmFyIGZpbHRlciA9ICQodGhpcykuZGF0YSgnZmlsdGVyJyk7XG5cdCQoJy5ocC13aGVyZS10byAuZGQtdG9wLnJlZ2lvbiAubmFtZScpLmh0bWwoJ0xvYWRpbmcuLi4nKVxuXHRocF9yZXZpZXdfcmVnaW9uID0gZmlsdGVyO1xuXHRocF9yZXZpZXdfcmVnaW9uX25hbWUgPSAkKHRoaXMpLmRhdGEoJ25hbWUnKTtcblx0dXBkYXRlX3Jldmlld19ob21lKCk7XG5cbiAgJCh0aGlzKS5wYXJlbnRzKCcuZGQnKS5zbGlkZVVwKCk7XG4gICQodGhpcykucGFyZW50cygnLmRkLXRvcCcpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcblx0XG59KTtcblxuXG4kKCcuaG9tZSAuaHAtd2hlcmUtdG8gLnN0eWxlIC5kZCBzcGFuJykuY2xpY2soZnVuY3Rpb24oZXZlbnQpXG57XHRcblx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcdFxuXHR2YXIgZmlsdGVyID0gJCh0aGlzKS5kYXRhKCdmaWx0ZXInKTtcblx0JCgnLmhwLXdoZXJlLXRvIC5kZC10b3Auc3R5bGUgLm5hbWUnKS5odG1sKCdMb2FkaW5nLi4uJylcblx0aHBfcmV2aWV3X3N0eWxlID0gZmlsdGVyO1xuXHRocF9yZXZpZXdfc3R5bGVfbmFtZSA9ICQodGhpcykuZGF0YSgnbmFtZScpO1xuXHR1cGRhdGVfcmV2aWV3X2hvbWUoKTtcbiAgJCh0aGlzKS5wYXJlbnRzKCcuZGQnKS5zbGlkZVVwKCk7XG4gICQodGhpcykucGFyZW50cygnLmRkLXRvcCcpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcbiAgXG59KTtcblxuZnVuY3Rpb24gdXBkYXRlX3Jldmlld19ob21lKClcbntcblx0dmFyIGxpbmtfcmV2aWV3c19ob21lID0gJy9yZXZpZXdzLz8nO1xuXHRpZihocF9yZXZpZXdfcmVnaW9uICE9ICcnKVxuXHRcdGxpbmtfcmV2aWV3c19ob21lICs9ICdyZWdpb249JytocF9yZXZpZXdfcmVnaW9uO1xuXHRcblx0aWYoaHBfcmV2aWV3X3N0eWxlICE9ICcnKVxuXHRcdGlmKGhwX3Jldmlld19yZWdpb24gIT0gJycpXG5cdFx0XHRsaW5rX3Jldmlld3NfaG9tZSArPSAnJnN0eWxlPScraHBfcmV2aWV3X3N0eWxlO1xuXHRcdGVsc2Vcblx0XHRcdGxpbmtfcmV2aWV3c19ob21lICs9ICdzdHlsZT0nK2hwX3Jldmlld19zdHlsZTtcblx0XG5cdCQoJy5ocC13aGVyZS10byAuYWxsLWxpbmsnKS5hdHRyKCdocmVmJyxsaW5rX3Jldmlld3NfaG9tZSk7XG5cdFxuXG5cdHZhciBkYXRhID0ge1xuXHRcdGFjdGlvbjogJ3NtYXJ0Zmx5ZXJfaG9tZV9yZXZpZXdzJyxcblx0XHRkYXRhOiB7J3JlZ2lvbic6aHBfcmV2aWV3X3JlZ2lvbiwnc3R5bGUnOmhwX3Jldmlld19zdHlsZX1cblx0fTtcblx0XG5cdCQucG9zdChhamF4dXJsLCBkYXRhLCBmdW5jdGlvbihyZXNwb25zZSlcblx0e1xuXHRcdHJlc3BvbnNlID0gJC5wYXJzZUpTT04ocmVzcG9uc2UpO1x0XHRcblx0XHRcblx0XHQkKCcuaHAtd2hlcmUtdG8gLmxhcmdlLXJldmlldycpLnJlcGxhY2VXaXRoKHJlc3BvbnNlLmNvbnRlbnRfbGFyZ2UpO1xuXHRcdFxuXHRcdCQoJy5ocC13aGVyZS10byAuY29sIC5zbWFsbC1yZXZpZXcnKS5yZW1vdmUoKTtcblx0XHQkKCcuaHAtd2hlcmUtdG8gLmNvbCAuY29udHJvbHMnKS5hZnRlcihyZXNwb25zZS5jb250ZW50X3NtYWxsKTtcblx0XHRcblx0XHRpZihocF9yZXZpZXdfcmVnaW9uICE9ICcnKVxuXHRcdFx0JCgnLmhwLXdoZXJlLXRvIC5kZC10b3AucmVnaW9uIC5uYW1lJykuaHRtbChocF9yZXZpZXdfcmVnaW9uX25hbWUpXG5cdFx0aWYoaHBfcmV2aWV3X3N0eWxlICE9ICcnKVxuXHRcdFx0JCgnLmhwLXdoZXJlLXRvIC5kZC10b3Auc3R5bGUgLm5hbWUnKS5odG1sKGhwX3Jldmlld19zdHlsZV9uYW1lKVxuXHR9KTtcbn1cblxuXG4kKCcucmV2aWV3cy1maWx0ZXJzIC5zdGVwLTInKS5zaG93KCk7XG4kKCcucmV2aWV3cy1maWx0ZXJzIC5yZWdpb24gc3BhbicpLmNsaWNrKGZ1bmN0aW9uKGV2ZW50KVxue1x0XG5cdHZhciBmaWx0ZXIgPSAkKHRoaXMpLmRhdGEoJ2ZpbHRlcicpO1xuXHR1cGRhdGVfcmV2aWV3cygncmVnaW9uJywgZmlsdGVyKTtcbn0pO1xuJCgnLnJldmlld3MtZmlsdGVycyAucGFydG5lcnMgc3BhbicpLmNsaWNrKGZ1bmN0aW9uKGV2ZW50KVxue1x0XG5cdHZhciBmaWx0ZXIgPSAkKHRoaXMpLmRhdGEoJ2ZpbHRlcicpO1xuXHR3aW5kb3cubG9jYXRpb24gID0gZmlsdGVyO1xufSk7XG5cbiQoJy5yZXZpZXdzLWZpbHRlcnMgLnN0eWxlIGxpJykuY2xpY2soZnVuY3Rpb24oZXZlbnQpXG57XHRcblx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcdFxuXHQkKHRoaXMpLnRvZ2dsZUNsYXNzKCdhY3RpdmUnKTtcblxuICBpZiAoJCh0aGlzKS5wYXJlbnQoKS5maW5kKCcuYWN0aXZlJykubGVuZ3RoKSB7XG5cbiAgICBjb25zb2xlLmxvZygndGVzdCEnKTtcbiAgICAkKHRoaXMpLnBhcmVudHMoJy5kZCcpLmZpbmQoJy5idXR0b24nKS5hZGRDbGFzcygnYXBwbHknKTtcblxuICB9XG5cbn0pO1xuXG5cbiQoJy5yZXZpZXdzLWZpbHRlcnMgLmRkLWFwcGx5JykuY2xpY2soZnVuY3Rpb24oZXZlbnQpXG57XHRcblx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcdFxuXHR2YXIgcmVnaW9uID0gJCgnLnJldmlld3MtZmlsdGVycyAucmVnaW9uIHNwYW4uYWN0aXZlJykuZGF0YSgnZmlsdGVyJyk7XG5cdHZhciBzdHlsZSA9ICcnO1xuXHQkKCBcIi5yZXZpZXdzLWZpbHRlcnMgLnN0eWxlIGxpLmFjdGl2ZVwiICkuZWFjaChmdW5jdGlvbiggaW5kZXggKSB7XG5cdFx0c3R5bGUgKz0gJy0nKyQodGhpcykuZGF0YSgnZmlsdGVyJyk7XG5cdH0pO1xuXHQkKCBcIi5yZXZpZXdzLWZpbHRlcnMgLnN0eWxlIGxpLnNlbGVjdGVkXCIgKS5lYWNoKGZ1bmN0aW9uKCBpbmRleCApIHtcblx0XHRzdHlsZSArPSAnLScrJCh0aGlzKS5kYXRhKCdmaWx0ZXInKTtcblx0fSk7XG5cdHN0eWxlID0gc3R5bGUuc3Vic3RyaW5nKDEpO1xuXHR1cGRhdGVfcmV2aWV3cygnc3R5bGUnLCBzdHlsZSk7XG59KTtcblxuXG4kKCcucmV2aWV3cy1maWx0ZXJzIC5zb3J0YnkucmV2aWV3cyBzcGFuJykuY2xpY2soZnVuY3Rpb24oZXZlbnQpXG57XHRcblx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcblx0dmFyIGZpbHRlciA9ICQodGhpcykuZGF0YSgnZmlsdGVyJyk7XG5cdHVwZGF0ZV9yZXZpZXdzKCdzb3J0JywgZmlsdGVyKTtcbn0pO1xuXG4kKCcucmV2aWV3cy10YWdzIC50YWcnKS5jbGljayhmdW5jdGlvbigpe1xuXHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuXHR2YXIgZmlsdGVyID0gJCh0aGlzKS5kYXRhKCdmaWx0ZXInKTtcdFxuXHQkKCBcIi5yZXZpZXdzLWZpbHRlcnMgLnN0eWxlIGxpLnN0eWxlX2ZpbHRlcl9cIitmaWx0ZXIgKS5yZW1vdmVDbGFzcygnc2VsZWN0ZWQnKTtcblx0JCgnLnJldmlld3MtZmlsdGVycyAuZGQtYXBwbHknKS5jbGljaygpO1xufSk7XG5cblxuZnVuY3Rpb24gdXBkYXRlX3Jldmlld3ModHlwZSwgZmlsdGVyKVxue1xuXHR2YXIgdXJsID0gd2luZG93LmxvY2F0aW9uLmhyZWYuc3BsaXQoXCI/XCIpO1x0XG5cdHZhciBhZGRfdG9fdXJsID0gJyc7XG5cdFxuXHRpZih0eXBlID09ICdyZWdpb24nKVxuXHRcdGFkZF90b191cmwgKz0gJyZyZWdpb249JytmaWx0ZXI7XG5cdGVsc2UgaWYodHlwZW9mIFF1ZXJ5U3RyaW5nLnJlZ2lvbiAhPT0gJ3VuZGVmaW5lZCcpXG5cdFx0YWRkX3RvX3VybCArPSAnJnJlZ2lvbj0nK1F1ZXJ5U3RyaW5nLnJlZ2lvbjtcblx0XG5cdGlmKGZpbHRlciAhPSAnJylcblx0e1xuXHRcdGlmKHR5cGUgPT0gJ3N0eWxlJylcblx0XHRcdGFkZF90b191cmwgKz0gJyZzdHlsZT0nK2ZpbHRlcjtcblx0XHRlbHNlIGlmKHR5cGVvZiBRdWVyeVN0cmluZy5zdHlsZSAhPT0gJ3VuZGVmaW5lZCcpXG5cdFx0XHRhZGRfdG9fdXJsICs9ICcmc3R5bGU9JytRdWVyeVN0cmluZy5zdHlsZTtcblx0fVxuXHRcblx0XG5cdGlmKHR5cGUgPT0gJ3NvcnQnKVxuXHRcdGFkZF90b191cmwgKz0gJyZzb3J0PScrZmlsdGVyO1xuXHRlbHNlIGlmKHR5cGVvZiBRdWVyeVN0cmluZy5zb3J0ICE9PSAndW5kZWZpbmVkJylcblx0XHRhZGRfdG9fdXJsICs9ICcmc29ydD0nK1F1ZXJ5U3RyaW5nLnNvcnQ7XG5cdFx0XG5cdHdpbmRvdy5sb2NhdGlvbiA9ICcvcmV2aWV3cy8/JythZGRfdG9fdXJsO1xufVxuXG5cbiQoJy50ZWFtLWdyaWQtY29udHJvbHMgLnNlbGVjdGlvbicpLmNsaWNrKGZ1bmN0aW9uKCl7XG5cdHVwZGF0ZV90ZWFtX3NlbGVjdGlvbnMoJCh0aGlzKSlcbn0pO1xuXG5cbiQoJy50ZWFtLWdyaWQtY29udHJvbHMgc2VsZWN0Lm1vYmlsZS1zZWxlY3Rpb25zJykub24oJ2NoYW5nZScsIGZ1bmN0aW9uKCkge1xuXHR2YXIgdGV4dCA9ICQodGhpcykuZmluZChcIjpzZWxlY3RlZFwiKS50ZXh0KCk7XG4gIHVwZGF0ZV90ZWFtX3NlbGVjdGlvbnMoJCh0aGlzKS5maW5kKFwiOnNlbGVjdGVkXCIpLCB0cnVlKVxuICAkKHRoaXMpLnNpYmxpbmdzKCdzbWFsbCcpLnRleHQodGV4dCk7XG59KTtcblxuXG5mdW5jdGlvbiB1cGRhdGVfdGVhbV9zZWxlY3Rpb25zKCR0aGlzLCBtb2JpbGVfc2VsID0gZmFsc2UpXG57XG5cdHZhciB3aGVyZSA9ICR0aGlzLmRhdGEoJ3doZXJlJyk7XG5cdHZhciB0ZXh0ID0gJHRoaXMuZGF0YSgnZmlsdGVyJyk7XG5cdCQoJy5yZXZpZXdzLW1haW4uJyt3aGVyZSkuc2xpZGVVcCgpO1xuXHQkKCcuYWxsLWxpbmstJyt3aGVyZSkuYXR0cignaHJlZicsJy9hZ2VudHMvPycrd2hlcmUrJz0nKyR0aGlzLmRhdGEoJ2ZpbHRlcicpKTtcblx0XG5cdGlmKCFtb2JpbGVfc2VsKVxuXHR7XG5cdFx0JHRoaXMucGFyZW50KCkuaGlkZSgpLnBhcmVudHMoJy5kZC10b3AnKS5oaWRlKCk7XG5cdFx0JHRoaXMucGFyZW50cygnLmRkLXRvcCcpLnBhcmVudCgpLmZpbmQoJ3NtYWxsJykudGV4dCgnTG9hZGluZy4uLicpO1xuXHR9XG5cdHZhciBkYXRhID0ge1xuXHRcdGFjdGlvbjogJ3NtYXJ0Zmx5ZXJfdGVhbV9zZWxlY3Rpb24nLFxuXHRcdGRhdGE6ICR0aGlzLmRhdGEoKVxuXHR9O1xuXHRcblx0JC5wb3N0KGFqYXh1cmwsIGRhdGEsIGZ1bmN0aW9uKHJlc3BvbnNlKVxuXHR7XG5cdFx0cmVzcG9uc2UgPSAkLnBhcnNlSlNPTihyZXNwb25zZSk7XHRcdFxuXHRcdCQoJy5yZXZpZXdzLW1haW4uJyt3aGVyZSkuaHRtbChyZXNwb25zZS5jb250ZW50KTtcblx0XHRpZighbW9iaWxlX3NlbClcblx0XHR7XG5cdFx0XHQkdGhpcy5wYXJlbnRzKCcuZGQtdG9wJykucGFyZW50KCkuZmluZCgnc21hbGwnKS50ZXh0KHRleHQpO1xuXHRcdH1cblx0XHQkKCcucmV2aWV3cy1tYWluLicrd2hlcmUpLnNsaWRlRG93bigpO1xuXHR9KTtcbn1cblxuXG5cbiQoJy5uZXdzbGV0dGVyLW1vZGFsX19jbG9zZSwgLm5ld3NsZXR0ZXItbW9kYWxfX3NoYWRlJykub24oJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG5cbiAgJCgnLm5ld3NsZXR0ZXItbW9kYWwnKS5mYWRlT3V0KCk7XG5cbn0pO1xuXG5cblxuJCggXCJmaWdjYXB0aW9uLndwLWNhcHRpb24tdGV4dFwiICkucmVwbGFjZVdpdGgoIFwiXCIgKTtcblxuXG5qUXVlcnkoJy5uaW5qYS1mb3Jtcy1mb3JtJykub24oJ3N1Ym1pdFJlc3BvbnNlJywgZnVuY3Rpb24oZSwgcmVzcG9uc2UpIHtcbiAgICBpZiAocmVzcG9uc2UuZXJyb3JzID09PSBmYWxzZSlcbiAgICB7XG5cdCAgICBpZihyZXNwb25zZS5mb3JtX2lkID09IDE0KVxuXHQgICAge1xuXHRcdCAgICBpZihyZXNwb25zZS5maWVsZHNbNDldID09IFwiY2hlY2tlZFwiKVxuXHRcdCAgICB7XG5cdFx0XHQgICAgJCgnLm1jLWZvcm0uZm9vdGVyICNtYy1lbWFpbCcpLnZhbChyZXNwb25zZS5maWVsZHNbMzldKTtcblx0XHRcdCAgICAkKCcubWMtZm9ybS5mb290ZXInKS5zdWJtaXQoKTtcblx0XHQgICAgfVxuXHQgICAgfVxuXHQgICAgXG5cdCAgICBpZihyZXNwb25zZS5mb3JtX2lkID09IDkpXG5cdCAgICB7XG5cdFx0ICAgIGlmKHJlc3BvbnNlLmZpZWxkc1s1MF0gPT0gXCJjaGVja2VkXCIpXG5cdFx0ICAgIHtcblx0XHRcdCAgICAkKCcubWMtZm9ybS5mb290ZXIgI21jLWVtYWlsJykudmFsKHJlc3BvbnNlLmZpZWxkc1syMl0pO1xuXHRcdFx0ICAgICQoJy5tYy1mb3JtLmZvb3RlcicpLnN1Ym1pdCgpO1xuXHRcdCAgICB9XG5cdCAgICB9XG5cdCAgICBcbiAgICB9XG59KTtcblxufSk7XG59KShqUXVlcnkpOyBcblxuXG4iXX0=
