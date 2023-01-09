jQuery(document).ready(function($) {

	
	var colWidth = jQuery(".grid-item").width();

	window.onresize = function(){
		var colWidth = jQuery(".grid-item").width();
	}
	// console.log(colWidth);

	// var $grid = jQuery(".grid").masonry({
	//   // options
	//   itemSelector: ".grid-item",
	//   columnWidth: ".grid-item",
	//   // percentPosition: true,
	//   gutter: 10,
	//   fitWidth: true
	// });

	// $grid.imagesLoaded().progress(function() {
	// 	$grid.masonry("layout");
	// });


	jQuery('.see-more-photo').click(function() {
		jQuery(".see-more-photos-wrap").show();

		var $grid = jQuery(".grid").masonry({
		  // options
		  itemSelector: ".grid-item",
		  columnWidth: "100",
		  // percentPosition: true,
		  gutter: 10,
		  fitWidth: true
		});
		$grid.imagesLoaded().progress(function() {
			$grid.masonry("layout");
		});
		$('.grid').masonry('reloadItems');
	})

	jQuery('.close-right-arrow').click(function() {
		jQuery(".see-more-photos-wrap").hide();
	})

	
	jQuery('.review-featured-section').slick({
		infinite:false,
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows:false,
		responsive: [
	    {
	      breakpoint: 1025,
	      settings: {
	        arrows: false,
	        slidesToShow: 3
	      }
	    },
	     {
	      breakpoint: 768,
	      settings: {
	        arrows: false,
	        slidesToShow: 2
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        arrows: false,
	        slidesToShow: 1
	      }
	    }
	  ]
	});	

	jQuery('.agent-view-content-wrap  .partners-filter .inner').slick({
		infinite:false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		arrows:false,
	});
	
	// partners load more
	var current_page = 1;
	$('#load-more-partners').on('click', function() {
		current_page ++;
		var region = $('.partners-main-filter-wrap .region').val()
		var style = $('.partners-main-filter-wrap .style').val()
		var partners = $('.partners-main-filter-wrap .partners').val()
		var filter = {}
		if (region) {
			filter.region = region
		}
		if (style) {
			filter.style = style
		}
		if (partners) {
			filter.partners = partners
		}
		$.ajax({
			type: 'POST',
			url: '/wp-admin/admin-ajax.php',
			dataType: 'html',
			data: {
			  action: 'smartflyer_partners',
			  paged: current_page,
				...filter,
			},
			success: function (res) {
				console.log(res);
			  $('.partners-filter').append(res);
			}
		});
	})
	
	$('#filter-partners').on('click', function() {
		current_page = 1;
		var region = $('.partners-main-filter-wrap .region').val()
		var style = $('.partners-main-filter-wrap .style').val()
		var partners = $('.partners-main-filter-wrap .partners').val()
		var filter = {}
		if (region) {
			filter.region = region
		}
		if (style) {
			filter.style = style
		}
		if (partners) {
			filter.partners = partners
		}
		$.ajax({
			type: 'POST',
			url: '/wp-admin/admin-ajax.php',
			dataType: 'html',
			data: {
			  action: 'smartflyer_partners',
			  paged: current_page,
				... filter,
			},
			success: function (res) {
			  $('.partners-filter').html(res);
			}
		});
	})

	$('.load-more-press').on('click', function() {
		current_page ++;
		var post_id = $('#post_id').val()
		$.ajax({
			type: 'POST',
			url: '/wp-admin/admin-ajax.php',
			dataType: 'html',
			data: {
			  action: 'smartflyer_press',
			  paged: current_page,
			  agent: post_id
			},
			success: function (res) {
			  $('.press-wrap ul').append(res);
			}
		});
	})

	$('.load-more-recognition').on('click', function() {
		$('.hide-content').show();
	})

	$('.partner-slider-main .slider-img-list.slider-img-list-slider').slick({
		infinite:false,
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows:false,
		responsive: [
	    {
	      breakpoint: 1025,
	      settings: {
	        arrows: false,
	        slidesToShow: 3
	      }
	    },
	     {
	      breakpoint: 768,
	      settings: {
	        arrows: false,
	        slidesToShow: 2
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        arrows: false,
	        slidesToShow: 1
	      }
	    }
	  ]
	});	

	if (jQuery('.form-select').length) {
		jQuery(".region").select2({
			placeholder: "Select region",
			allowClear: true
		});
		jQuery(".style").select2({
			placeholder: "Select style",
			allowClear: true
		});
		jQuery(".partners").select2({
			placeholder: "Select partners",
			allowClear: true
		});
	}

	jQuery('.plan-trip-form').hide();
	jQuery('.plan-a-trip-btn').click(function () {
		console.log('in');
		jQuery('html').addClass('plan-trip-form-open');
		jQuery('.plan-trip-form').show();
	})
	jQuery('.close-btn').click(function () {
		jQuery('html').removeClass('plan-trip-form-open');
		jQuery('.plan-trip-form').hide();
	})

	jQuery( ".destination-name li a" ).hover(function() {
		jQuery('.destination-map .image').hide();

		var countryClass = jQuery(this).parent().attr('class');
		jQuery( '.' + countryClass ).show();

	});

	if (jQuery(window).width() < 767) {
		jQuery('.property-contacts-main-slider-1').slick({
			infinite:false,
			slidesToShow: 1,
			slidesToScroll: 1,
			variableWidth: true,
			arrows:false,
			// centerMode: true,
			// centerPadding: '60px',
		});
		jQuery('.property-contacts-main-slider-2').slick({
			infinite:false,
			slidesToShow: 1,
			slidesToScroll: 1,
			variableWidth: true,
			// centerMode: true,
			arrows:false,
			// centerPadding: '60px',
		});
		jQuery('.offers-trainings .see-flyer-section').slick({
			infinite:true,
			slidesToShow: 1,
			slidesToScroll: 1,
			variableWidth: true,
			// centerMode: true,
			arrows:false,
			// centerPadding: '60px',
		});
		jQuery('.marketing-image-gallery .wrapper').slick({
			slidesToShow: 1,
			infinite:false,
			slidesToScroll: 1,
			variableWidth: true,
			arrows:true
		});
		jQuery('.links-articles .slider-img-list').slick({
			slidesToShow: 1,
			infinite:false,
			slidesToScroll: 1,
			variableWidth: true,
			arrows:false
		});

		jQuery(".booking-commission .selling-points-right").appendTo(".booking-commission .selling-points-left");
		jQuery(".offers-trainings-section .inner .left h3").prependTo(".offers-trainings-section .inner");
		jQuery(".marketing-image-gallery").appendTo(".marketing.tab_content ");
		jQuery(".reviews .title .submit-comment").appendTo(".reviews > .container ");
		
		jQuery(".menulinks").prependTo(".header-menu .menu-header-container ");
	}

	jQuery('.accordion__header').click(function(e) {
		e.preventDefault();
		var currentIsActive = jQuery(this).hasClass('is-active');
		jQuery(this).parent('.accordion').find('> *').removeClass('is-active');
		if (currentIsActive != 1) {
			jQuery(this).addClass('is-active');
			jQuery(this).next('.accordion__body').addClass('is-active');
		}
	});

	

	// tabbed content
	// http://www.entheosweb.com/tutorials/css/tabs.asp
	jQuery(".tab_content").hide();
	jQuery(".tab_content:first").show();

	/* if in tab mode */
	jQuery("ul.tabs li").click(function() {

		jQuery(".tab_content").hide();
		var activeTab = jQuery(this).attr("rel");
		jQuery("#" + activeTab).fadeIn();

		jQuery("ul.tabs li").removeClass("active");
		jQuery(this).addClass("active");

		jQuery(".tab_drawer_heading").removeClass("d_active");
		jQuery(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");

	});
	/* if in drawer mode */
	jQuery(".tab_drawer_heading").click(function() {

		jQuery(".tab_content").hide();
		var d_activeTab = jQuery(this).attr("rel");
		jQuery("#" + d_activeTab).fadeIn();

		jQuery(".tab_drawer_heading").removeClass("d_active");
		jQuery(this).addClass("d_active");

		jQuery("ul.tabs li").removeClass("active");
		jQuery("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
	});


	/* Extra class "tab_last" 
	   to add border to right side
	   of last tab */
	jQuery('ul.tabs li').last().addClass("tab_last");
	

	if(jQuery(window).width() < 1400 && jQuery(window).width() >= 768){
	
		
		jQuery('.property-reviews-header .mainmenu li:has(ul)').addClass('parent');

		jQuery('.property-reviews-header a.menulinks').click(function() {
			jQuery(this).next('ul').slideToggle(250);
			jQuery('body').toggleClass('mobile-open');
			jQuery('.property-reviews-header .mainmenu li.parent ul').slideUp(250);
			jQuery('.property-reviews-header a.child-triggerm').removeClass('child-open');
			return false;
		});

		jQuery('.property-reviews-header .mainmenu li.parent > a').after('<a class="child-triggerm"><span></span></a>');	

		jQuery('.property-reviews-header .mainmenu a.child-triggerm').click(function() {
			jQuery(this).parent().siblings('li').find('a.child-triggerm').removeClass('child-open');
			jQuery(this).parent().siblings('li').find('ul').slideUp(250);
			jQuery(this).next('ul').slideToggle(250);
			jQuery(this).toggleClass('child-open');
			return false;
		});

	}
	if(jQuery(window).width() < 1400){	
		jQuery(".property-reviews-header .header-admin").prependTo(".property-reviews-header .mainmenu");
	}

	if(jQuery(window).width() < 767){
			jQuery( ".menulinks" ).prependTo( ".menu-header-container" );

		jQuery('.mainmenu li:has(ul)').addClass('parent');

		jQuery('a.menulinks').click(function() {
			jQuery(this).next('ul').slideToggle(250);
			jQuery('body').toggleClass('mobile-open');
			jQuery('.mainmenu li.parent ul').slideUp(250);
			jQuery('a.child-triggerm').removeClass('child-open');
			return false;
		});

		jQuery('.mainmenu li.parent > a').after('<a class="child-triggerm"><span></span></a>');

		jQuery('.mainmenu a.child-triggerm').click(function() {
			jQuery(this).parent().siblings('li').find('a.child-triggerm').removeClass('child-open');
			jQuery(this).parent().siblings('li').find('ul').slideUp(250);
			jQuery(this).next('ul').slideToggle(250);
			jQuery(this).toggleClass('child-open');
			return false;
		});

		jQuery(".property-reviews-header .search-icon").click(function(){
			jQuery(".mobile-search").show();
		});

		jQuery(".mobile-close-search").click(function(){
			jQuery(".mobile-search").hide();
		});

		

	}
	// if(jQuery(window).width() >= 768){
	// 	jQuery('.mainmenu li:has(ul)').addClass('parent');

	// 	jQuery('.mainmenu li.parent > a').after('<a class="child-triggerm child-open"><span></span></a>');
	// 	jQuery('.mainmenu a.child-triggerm').hover(function() {
			
	// 		jQuery(this).parent().siblings('li').find('a.child-triggerm ').removeClass('child-open');
	// 		jQuery(this).parent().siblings('li').find('ul').slideUp(250);
	// 		jQuery(this).next('ul').slideToggle(250);
	// 		jQuery(this).toggleClass('child-open');
	// 		return false;
	// 	});

	// }

	// jQuery(".search-icon").click(function() {
	// 	jQuery(".search-box").toggle();
	// 	jQuery(".search-box input[type='text']").focus();
	// 	return;
	// });
	
	/* fix header */
	jQuery(window).scroll(function() {
		if (jQuery(window).scrollTop() >= 100) {
			jQuery('.header-main ').addClass('fixed-nev_bar');
		} else {
			jQuery('.header-main').removeClass('fixed-nev_bar');
		}
	});

	jQuery('.home-slider-main .slider-content').each(function(i, item) {
		var length = jQuery('.slider-content').length;
		if (length > 4) {
			jQuery('.home-slider-main .slider-img-list-slider').slick({
				centerMode: true,
				centerPadding: '100px',
				slidesToShow: 3,
				arrows: false,
				autoplay: true,
				autoplaySpeed: 2000,
				responsive: [{
					breakpoint: 991,
					settings: {
						arrows: false,
						centerMode: true,
						centerPadding: '40px',
						slidesToShow: 2
					}
				}, {
					breakpoint: 768,
					settings: {
						arrows: false,
						centerMode: true,
						centerPadding: '40px',
						slidesToShow: 2
					}
				}, {
					breakpoint: 480,
					settings: {
						arrows: false,
						centerMode: true,
						centerPadding: '40px',
						slidesToShow: 1
					}
				}]
			});
		}
	});
	
	
	jQuery('.destination-slider').slick({
		arrows:true,
		infinite: true,
	});

	// jQuery('a[href^="#"]').on('click', function(e) {
	// 	var header_new = jQuery(".header-main").outerHeight();
	// 	e.preventDefault();
	// 	var target = this.hash;
	// 	var $target = jQuery(target);
	// 	jQuery('html, body').stop().animate({
	// 		'scrollTop': $target.offset().top - header_new
	// 	}, 900, 'swing', function() {});
	// });


	if (jQuery(window).width() < 767) {
		jQuery(".mobile-partners-filter .filter-btn ").click(function() {
			jQuery(".partners-main-filter").addClass("filter-open");
			jQuery('body').addClass('mobile-filter-open');
		});
		jQuery(".partners-main-filter .close-filter ").click(function() {
			jQuery(".partners-main-filter").removeClass("filter-open");
			jQuery('body').removeClass('mobile-filter-open');
		});

		jQuery(".exclusives-section .details-wrap").appendTo(".exclusives-main-wrap .image-wrap");
		jQuery(".restaurants-sec .restaurants-menu").appendTo(".restaurants-sec .restaurants-img");
		return false;

		

	}

	if(jQuery('.property-reviews-header').length){
		var fixed_navigation_height = jQuery('.header-main').innerHeight();
		jQuery('.review-hero-banner-new').css({'top': fixed_navigation_height});
	}

	jQuery('.custom-scroll-section .custom-scroll ul li a').click(function(e) {
    e.preventDefault(); //prevent the "normal" behaviour which would be a "hard" jump

    var target = jQuery(this).attr("href"); //Get the target
    jQuery('html, body').stop().animate({ scrollTop: $(target).offset().top }, 2000, function() {
         location.hash = target;  //attach the hash (#jumptarget) to the pageurl
     });

    return false;
});
 
});

AOS.init({
	duration:600,
  })


jQuery('.activeClass').on("click", function(){
	$(this).closest('ul').find('li').removeClass('active');
	$(this).closest('li').addClass('active');
});

jQuery(function() {
	jQuery(".reviews .exclusives-left").slice(0, 3).show();
	jQuery("body").on('click touchstart', '.load-more', function(e) {
		e.preventDefault();
		jQuery(".reviews .exclusives-left:hidden").slice(0, 3).slideDown();
		if (jQuery(".reviews .exclusives-left:hidden").length == 0) {
			jQuery(".load-more-btn").css('display', 'none');
		}
	});
	return false;
});

jQuery(function() {
	var fixed_navigation_height = jQuery('.header-main').innerHeight();
	jQuery(window).scroll(function () {
		var scrollTop     = jQuery(window).scrollTop(),
		    elementOffset = jQuery('#stickybox').offset(),
		    distance      = (elementOffset - scrollTop);
		var boxInitialTop = jQuery('#stickybox').offset();
		// console.log("fixed_navigation_height"+fixed_navigation_height);
		// console.log("distance"+distance);
		if (distance <= fixed_navigation_height) {
			jQuery('#stickybox').css({position: 'sticky', top: fixed_navigation_height});
			jQuery('.banner-text-sticky').css({display:'block'});
		} else {
			jQuery('#stickybox').css({position: 'unset', top: 'unset'});
			jQuery('.banner-text-sticky').css({display:'none'});
		}
	});
});

jQuery('#region, #style, #partners').on("change", function () {
    var region = jQuery('#region').val();
    var style = jQuery('#style').val();
    var partners = jQuery('#partners').val();

    var form_data = new FormData();
    form_data.append('region', region);
    form_data.append('style', style);
    form_data.append('partners', partners);
    form_data.append('action', 'filter_property')
    jQuery.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        url: ajax_object.ajaxurl,
        data: form_data,
        success: function (responseData) {
            var array_format = JSON.parse(responseData);
            jQuery('.partners-filter').html(array_format.responseHtml);
        }
    });



});


jQuery(function () {
	jQuery(".preferred-partners-logos li").slice(0, 15).addClass('image-filter').show();
	jQuery(document).on('click', '.load-more-partners', function (e) {
		jQuery(".preferred-partners-logos li").show().slice(0, 25).addClass('image-filter');
		//e.preventDefault();
		console.log("In");
		jQuery(".preferred-partners-logos li").slice(0, 25).addClass('image-filter');
		if (jQuery(".preferred-partners-logos li:hidden").length == 0) {
			jQuery(".load-more").css('display', 'none');
		}
		/*jQuery('html,body').animate({
			scrollTop: $(this).offset().top
		}, 1000);*/
		return false;
	});
});