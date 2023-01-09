jQuery( document ).ready(function() {
     /* BROWSE image */
   jQuery('.fileUpload').on('change', function() {
        var fileName = jQuery(this).val().replace(/C:\\fakepath\\/i, '');
        jQuery(this).next('.custom-file-label').html(fileName);
    });
}); 

/*detailed-policy*/

function DetailedPolicy() {
    jQuery(".detailed-policy-clone:first").clone().appendTo(".detailed-policy-append-to");

}

function DetailedPolicyremoveForm(e) {
    if (jQuery('.detailed-policy-clone ').length > 2) {
        e.closest('.detailed-policy-clone ').remove();
    } else {

    }
}

 /*detailed-policy*/

/*Marketing Assets*/
 function MarketingAssets() {
     jQuery(".marketing-assets-clone:first").clone().appendTo(".marketing-assets-append-to");

 }

 function MarketingAssetsRemoveForm(e) {
     if (jQuery('.marketing-assets-clone ').length > 2) {
         e.closest('.marketing-assets-clone ').remove();
     } else {

     }
 }

 /*Marketing Assets*/

 /*  Trainings */
 function Trainings() {
     jQuery(".Trainings-clone:first").clone().appendTo(".Trainings-append-to");

 }


 function TrainingsRemoveForm(e) {
     if (jQuery('.Trainings-clone').length > 2) {
        e.closest('.Trainings-clone').remove();
     } else {

     }
 }
 /*  Trainings */


 /* Others Assets */
 function OthersAssets() {
     jQuery(".others-assets-clone:first").clone().appendTo(".others-assets-append-to");

 }


 function OthersAssetsRemoveForm(e) {
     if (jQuery('.others-assets-clone').length > 2) {
        e.closest('.others-assets-clone').remove();
     } else {

     }
 }
 /* Others Assets */


 /* Others Assets */
 function updatesAssets() {
     jQuery(".updates-clone:nth-child(2)").clone().appendTo(".updates-append-to");

 }


 function UpdatesRemoveForm(e) {
     if (jQuery('.updates-clone').length > 2) {
        e.closest('.updates-clone').remove();
     } else {

     }
 }
 /* Others Assets */


  /* Others Assets */
 function commissions() {
     jQuery(".commissions-clone:nth-child(2)").clone().appendTo(".commissions-append-to");

 }


 function CommissionsRemoveForm(e) {
     if (jQuery('.commissions-clone').length > 2) {
        e.closest('.commissions-clone').remove();
     } else {

     }
 }
 /* Others Assets */



 /* Assets + Trainings  yacht-sea */
 function AssetsTrainingsAssets() {
     jQuery(".AssetsTrainin-clone:nth-child(2)").clone().appendTo(".AssetsTrainin-append-to");

 }


 function AssetsTrainingsRemoveForm(e) {
     if (jQuery('.AssetsTrainin-clone').length > 2) {
        e.closest('.AssetsTrainin-clone').remove();
     } else {

     }
 }
 /*  Assets + Trainings  yacht-sea  */

 
 /* Assets + Trainings  On site */
 function MarketingAssetsOnSite() {
     jQuery(".MarketingAssets-clone:nth-child(2)").clone().appendTo(".MarketingAssets-append-to");

 }


 function MarketingAssetsOnSiteRemoveForm(e) {
     if (jQuery('.MarketingAssets-clone').length > 2) {
        e.closest('.MarketingAssets-clone').remove();
     } else {

     }
 }
  /* Assets + Trainings  On site */



  /* Assets + Trainings  On site */
 function EducationalOnSite() {
     jQuery(".Educational-clone:nth-child(2)").clone().appendTo(".Educational-append-to");

 }


 function EducationalOnSiteRemoveForm(e) {
     if (jQuery('.Educational-clone').length > 2) {
        e.closest('.Educational-clone').remove();
     } else {

     }
 }
  /* Assets + Trainings  On site */


  /* Assets + Trainings  On site */
 function ArticlesOnSite() {
    jQuery(".Articles-clone:nth-child(2)").clone().appendTo(".Articles-append-to");

 }


 function ArticlesOnSitelOnSiteRemoveForm(e) {
     if (jQuery('.Articles-clone ').length > 2) {
        e.closest('.Articles-clone ').remove();
     } else {

     }
 }
  /* Assets + Trainings  On site */


/* Assets + Trainings  On site */
 function ArticlelinksOnSite() {
    jQuery(".Articlelinks-clone:nth-child(2)").clone().appendTo(".Articlelinks-append-to");

 }


 function ArticlelinksOnSiteRemoveForm(e) {
     if (jQuery('.Articlelinks-clone ').length > 2) {
        e.closest('.Articlelinks-clone ').remove();
     } else {

     }
 }
  /* Assets + Trainings  On site */


/* Client Benefits */
 function ClientBenefits() {
    jQuery(".ClientBenefits-clone:nth-child(2)").clone().appendTo(".ClientBenefits-append-to");

 }


 function ClientBenefitsRemoveForm(e) {
     if (jQuery('.ClientBenefits-clone ').length > 2) {
        e.closest('.ClientBenefits-clone ').remove();
     } else {

     }
 }
  /* Assets + Trainings  On site */
  

  /* Participating Properties */
  function ParticipatingProperties() {
    jQuery(".ParticipatingProperties-clone:nth-child(2)").clone().appendTo(".ParticipatingProperties-append-to");

 }


 function ParticipatingPropertiesRemoveForm(e) {
     if (jQuery('.ParticipatingProperties-clone ').length > 2) {
        e.closest('.ParticipatingProperties-clone ').remove();
     } else {

     }
 }
  /* Participating Properties */

/* Key Selling Points / Insider TIps */
  function SellingPoints() {
    jQuery(".SellingPoints-clone:nth-child(2)").clone().appendTo(".SellingPoints-append-to");

 }

/* Key Selling Points / Insider TIps */



  /* Links */
  function Linksbrand() {
    jQuery(".Links-clone:nth-child(2)").clone().appendTo(".Links-append-to");

 }


 function LinksbrandRemoveForm(e) {
     if (jQuery('.Links-clone ').length > 3) {
        e.closest('.Links-clone').remove();
     } else {

     }
 }
  /* Links*/



  /* Links */
  function Articlesbrand() {
    jQuery(".Articlesbrand-clone:nth-child(2)").clone().appendTo(".Articlesbrand-append-to");

 }


 function ArticlesbrandRemoveForm(e) {
     if (jQuery('.Articlesbrand-clone ').length > 3) {
        e.closest('.Articlesbrand-clone').remove();
     } else {

     }
 }
  /* Links*/

    /* Links */
  function MarketingAssetsBrand() {
    jQuery(".MarketingAssetsBrand-clone:nth-child(2)").clone().appendTo(".MarketingAssetsBrand-append-to");

 }


 function ArticlesbrandRemoveForm(e) {
     if (jQuery('.MarketingAssetsBrand-clone ').length > 3) {
        e.closest('.MarketingAssetsBrand-clone').remove();
     } else {

     }
 }
/* Links*/

/* Links */
  function VirtuosoAmenities() {
    jQuery(".updates-clone-new:nth-child(2)").clone().appendTo(".updates-append-to-new");

 }


 function VirtuosoAmenitiesRemoveForm(e) {
     if (jQuery('.updates-clone-new ').length > 3) {
        e.closest('.updates-clone-new').remove();
     } else {

     }
 }
/* Links*/


/* Links */
  function TrainingsAdd() {
    jQuery(".Trainings-clone:nth-child(2)").clone().appendTo(".Trainings-append-to");

 }


 function TrainingsRemoveForm(e) {
     if (jQuery('.Trainings-clone').length > 3) {
        e.closest('.Trainings-clone').remove();
     } else {

     }
 }
/* Links*/





jQuery(document).ready(function() {
    jQuery(".set > a").on("click", function() {
        if (jQuery(this).hasClass("active")) {
            jQuery(this).removeClass("active");
            jQuery(this)
                .siblings(".content")
                .slideUp(200);
            jQuery(".set > a i")
                .removeClass("fa-angle-up")
                .addClass("fa-angle-down");
        } else {
            jQuery(".set > a i")
                .removeClass("fa-angle-up")
                .addClass("fa-angle-down");
            jQuery(this)
                .find("i")
                .removeClass("fa-angle-down")
                .addClass("fa-angle-up");
            jQuery(".set > a").removeClass("active");
            jQuery(this).addClass("active");
            jQuery(".content").slideUp(200);
            jQuery(this)
                .siblings(".content")
                .slideDown(200);
        }
    });


        jQuery('.hitlist-img-list .slider-img-list').slick({
          dots: true,
          infinite: false,
          speed: 300,
          slidesToShow: 1,
          arrows: false,
          variableWidth: true
        });


});
















// ------------------------
function addLogo() {
    $(".marketing-logos-ul:first").clone().appendTo("#marketing-logos");
}

function socialMediaStory() {
    $(".social-media--story-ul:first").clone().appendTo("#socialMediaStory");
    return false;
}

function otherFiles() {
    $(".other-files-ul:first").clone().appendTo("#otherFiles");
    return false;
}

function hashtags() {
    $(".hashtags-ul:first").clone().appendTo("#hashtags");
    return false;
}

function usernames() {
    $(".usernames-ul:first").clone().appendTo("#usernames");
    return false;
}

function imageGallery() {
    $(".image-gallery-ul:first").clone().appendTo("#imageGallery");
    return false;
}









jQuery(document).ready(function($) { 
    if($(window).width() < 1200){
        jQuery('.header-info .mainmenu li:has(ul)').addClass('parent'); 
     
        jQuery('.header-info a.menulinks').click(function() {
            jQuery(this).next('ul').slideToggle(250);
            jQuery('body').toggleClass('mobile-open'); 
            jQuery('.header-info .mainmenu li.parent ul').slideUp(250);
            jQuery('a.child-triggerm').removeClass('child-open');
            return false;
         });     
         
        jQuery('.header-info .mainmenu li.parent > a').after('<a class="child-triggerm"><span></span></a>');
        
        jQuery('.header-info .mainmenu a.child-triggerm').click(function() {
            jQuery(this).parent().siblings('li').find('a.child-triggerm').removeClass('child-open');
            jQuery(this).parent().siblings('li').find('ul').slideUp(250);
            jQuery(this).next('ul').slideToggle(250);
            jQuery(this).toggleClass('child-open');
            return false;
        });
            
    }
  
    jQuery(".header-info .header-admin .inner").click(function(){
        jQuery(".header-info .dropdown-login").slideToggle();
    });

    // jQuery("body").click(function(){
    //     jQuery(".header-info .dropdown-login").hide();
    // });
    
});