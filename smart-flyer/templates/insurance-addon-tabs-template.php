<?php
/*
Template Name: Insurance Addon Form Template
*/

get_header();
if (!post_password_required()) {
?>
  <div class="insurance-form-title">
    <div class="title">
        Insurance Form
    </div>
    <div class="complete">
        Complete 20%
        <div class="complete-form">
            <div class="complete-grey" style="width:20%"></div>
        </div>
    </div>
</div>
<div class="insurance-addon-form">
    <div class="wp-container">
        <div class="custom-scroll-section custom-scroll-new-section">
            <div class="custom-scroll">
                <div class="container-custom-scroll">
                    <ul class="tabs">
                        <li rel="tab1" class="active"><span> contacts </span></li>
                        <li rel="tab2"><span>policy specific </span></li>
                        <li rel="tab3"><span> booking process  </span></li>
                        <li rel="tab4"><span> assets training</span></li>
                        <li rel="tab5"><span> commissions  </span></li>
                        <li rel="tab6"><span> updates </span></li>
                    </ul>
                </div>
            </div>
            <div class="tab_container container insurance-addon-tab-content">
                <div class="tab_content" id="tab1">
                    <div class="main-title">
                        <h2>Contacts</h2>
                    </div>
                    <div class="form-property">
                        <form action="" method="" accept-charset="utf-8">
                            <div class="form-wrap">
                                <div class="title">Sales</div>
                                <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                                    <li class="width50">
                                        <label>property name</label>
                                        <input type="text" name="" id="" value="" placeholder="Jim Osbourne">
                                    </li>
                                    <li class="width50">
                                        <label>phone</label>
                                        <input type="text" name="" id="" value="" placeholder="Regional Sales Manager, NY and PA">
                                    </li>
                                    <li class="width50">
                                        <label>phone</label>
                                        <input type="tel" id="phone" name="phone" pattern="877-575-4814" placeholder="877-575-4814">
                                    </li>
                                    <li class="width50">
                                        <label>email</label>
                                        <input type="email" name="" id="" value="" placeholder="JIM.OSBORNE@TRAVELEXINSURANCE.COM ">
                                    </li>
                                    <li  class="width50">
                                        <label>attach image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input fileUpload" id="site_plan" name="site_plan_relative_url">
                                            <label class="custom-file-label" for="site_plan" aria-describedby="site_plan">Choose  file</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-wrap">
                                <div class="title">Commissions</div>
                                <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                                    <li class="width50">
                                        <label>property name</label>
                                        <input type="text" name="" id="" value="" placeholder="Jim Osbourne">
                                    </li>
                                    <li class="width50">
                                        <label>phone</label>
                                        <input type="text" name="" id="" value="" placeholder="Regional Sales Manager, NY and PA">
                                    </li>
                                    <li class="width50">
                                        <label>phone</label>
                                        <input type="tel" id="phone" name="phone" pattern="877-575-4814" placeholder="877-575-4814">
                                    </li>
                                    <li class="width50">
                                        <label>email</label>
                                        <input type="email" name="" id="" value="" placeholder="JIM.OSBORNE@TRAVELEXINSURANCE.COM ">
                                    </li>
                                    <li  class="width50">
                                        <label>attach image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input fileUpload" id="site_plan" name="site_plan_relative_url">
                                            <label class="custom-file-label" for="site_plan" aria-describedby="site_plan">Choose  file</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-wrap">
                                <div class="title">Global</div>
                                <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                                    <li class="width50">
                                        <label>property name</label>
                                        <input type="text" name="" id="" value="" placeholder="Jim Osbourne">
                                    </li>
                                    <li class="width50">
                                        <label>phone</label>
                                        <input type="text" name="" id="" value="" placeholder="Regional Sales Manager, NY and PA">
                                    </li>
                                    <li class="width50">
                                        <label>phone</label>
                                        <input type="tel" id="phone" name="phone" pattern="877-575-4814" placeholder="877-575-4814">
                                    </li>
                                    <li class="width50">
                                        <label>email</label>
                                        <input type="email" name="" id="" value="" placeholder="JIM.OSBORNE@TRAVELEXINSURANCE.COM ">
                                    </li>
                                    <li  class="width50">
                                        <label>attach image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input fileUpload" id="site_plan" name="site_plan_relative_url">
                                            <label class="custom-file-label" for="site_plan" aria-describedby="site_plan">Choose  file</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="save-btn  d-flex justify-content-flex-end">
                                <div class="success-message">
                                    <!-- <span id="property_overview"></span> -->
                                </div>
                                <a href="javascript:void(0)" data-tab="property_overview" class="overview_sumbit">SAVE</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab_content" id="tab2">
                    <div class="main-title">
                        <h2>policy specific </h2>
                        <div class="form-property">
                            <form>
                                <div class="form-wrap">
                                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                                        <li class="width100">
                                            <label>Maximum Total Trip Cost Coverage</label>
                                            <input type="text" name="">
                                        </li>
                                        <li class="width100">
                                            <label>Maximum Price Per Traveler Coverage</label>
                                            <input type="text" name="">
                                        </li>
                                        <li class="width100">
                                            <label>Booking restrictions i.e. Booking window must be prior to 20 days pre-departure or no date or limit to when a policy can be created.</label>
                                            <input type="text" name="">
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-property">
                                    <div class="main-title-wrap d-flex">
                                        <span>Detailed Policy Coverage i.e. Brochures and Flyers</span>
                                        <div class="button-add">
                                            <a onclick="DetailedPolicy()">ADD</a>
                                        </div>
                                    </div>
                                    <div class="detailed-policy-wrap-to width100 ">
                                        <div class="detailed-policy-label ">
                                            <ul class="flex-wrap d-flex">
                                                <li class="width50">
                                                    <label>NAME</label>
                                                </li>
                                                 <li class="width50">
                                                    <label>link</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="form-clone-div d-flex flex-wrap form-clone-div-padding detailed-policy-append-to">
                                        <ul class="detailed-policy-clone flex-wrap d-flex width100">
                                            <li class="width50 d-flex search-input align-items-center">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="search" name="articles[0][articles_title][0]" value="" class="articles__title" placeholder="">
                                            </li>
                                            <li class="width50 padding-left-30">
                                                <div class="select-icon d-flex  flex-wrap justify-content-space-between width100">
                                                    <div class="links-wrap search-input width75 d-flex align-items-center">
                                                        <i class="fa fa-link" aria-hidden="true"></i>
                                                        <input type="url" name="articles[0][articles_url][0]" value="" class="articles_url">
                                                    </div>
                                                    <div class="button-add"><a class="delete-btn" onclick="DetailedPolicyremoveForm(jQuery(this));">DELETE</a></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
                                <div class="save-btn  d-flex justify-content-flex-end">
                                    <div class="success-message">
                                        <!-- <span id="property_overview"></span> -->
                                    </div>
                                    <a href="javascript:void(0)" data-tab="property_overview" class="overview_sumbit">SAVE</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab_content" id="tab3">
                    <div class="main-title">
                        <h2>booking process </h2>
                        <div class="form-property">
                            <form>
                                <div class="form-wrap">
                                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                                        <li class="width100">
                                            <label>Best Way to Book: On website/direct, via sales contact, specified booking portal for SF etc.</label>
                                            <input type="link" name="" placeholder="https://smartflyer.travelexinsurance.com/index.aspx?go=bp&location=32-0402BHollo&navigation=off">
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-wrap">
                                    <div class="title">Booking portal log-ins</div>
                                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                                        <li class="width50">
                                            <label>USERNAME</label>
                                            <input type="text" name="" id="" value="" placeholder="smartflyer">
                                        </li>
                                        <li class="width50">
                                            <label>PASSWORD</label>
                                            <input type="text" name="" id="" value="" placeholder="deepsmarts">
                                        </li>
                                        <li class="width50">
                                            <label>Id</label>
                                            <input type="text" name="" id="" value="" placeholder="32-0402">
                                        </li>
                                    </ul>
                                </div>
                                <div class="save-btn  d-flex justify-content-flex-end">
                                <div class="success-message">
                                    <!-- <span id="property_overview"></span> -->
                                </div>
                                <a href="javascript:void(0)" data-tab="property_overview" class="overview_sumbit">SAVE</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab_content" id="tab4">
                    <div class="main-title form-main-wrap">
                        <h2>Assets + Training</h2>
                        <div class="form-property">
                            <form>
                                <div class="form-wrap">
                                    <div class="title">Logo and Images</div>
                                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                                        <li class="width50">
                                            <label>ATTACH Logo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input fileUpload" id="site_plan" name="site_plan_relative_url">
                                                <label class="custom-file-label" for="site_plan" aria-describedby="site_plan"></label>
                                            </div>
                                        </li>
                                        <li class="width50">
                                            <label>ATTACH header image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input fileUpload" id="site_plan" name="site_plan_relative_url">
                                                <label class="custom-file-label" for="site_plan" aria-describedby="site_plan"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="main-title-wrap d-flex">
                                    <span>Marketing Assets</span>
                                    <div class="button-add">
                                        <a onclick="MarketingAssets()">ADD</a>
                                    </div>
                                </div>
                                <ul class="d-flex flex-wrap marketing-assets-append-to padding-left-right">
                                    <ul class="marketing-assets-clone flex-wrap d-flex width100">
                                        <li class="width50 search-input align-items-center">
                                            <label class="label-margin">NAME</label>
                                            <div class="d-flex">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="search" name="articles[0][articles_title][0]" value="" class="articles__title" placeholder="">
                                            </div>
                                        </li>
                                        <li class="width50">
                                            <div class="select-icon d-flex  flex-wrap justify-content-space-between width100 align-items-flex-end">
                                                <div class="links-wrap search-input width75 ">
                                                    <label class="label-margin">link</label>
                                                    <div class="d-flex">
                                                        <i class="fa fa-link" aria-hidden="true"></i>
                                                        <input type="url" name="articles[0][articles_url][0]" value="" class="articles_url">
                                                    </div>
                                                </div>
                                                <div class="button-add"><a class="delete-btn" onclick="MarketingAssetsRemoveForm(jQuery(this));">DELETE</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="marketing-assets-clone flex-wrap d-flex width100">
                                        <li class="width50 search-input align-items-center">
                                            <label class="label-margin">NAME</label>
                                            <div class="d-flex">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="search" name="articles[0][articles_title][0]" value="" class="articles__title" placeholder="">
                                            </div>
                                        </li>
                                        <li class="width50">
                                            <div class="select-icon d-flex  flex-wrap justify-content-space-between width100 align-items-flex-end">
                                                <div class="links-wrap search-input width75 ">
                                                    <label class="label-margin">link</label>
                                                    <div class="d-flex">
                                                        <i class="fa fa-link" aria-hidden="true"></i>
                                                        <input type="url" name="articles[0][articles_url][0]" value="" class="articles_url">
                                                    </div>
                                                </div>
                                                <div class="button-add"><a class="delete-btn" onclick="MarketingAssetsRemoveForm(jQuery(this));">DELETE</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="marketing-assets-clone flex-wrap d-flex width100">
                                        <li class="width50 search-input align-items-center">
                                            <label class="label-margin">NAME</label>
                                            <div class="d-flex">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="search" name="articles[0][articles_title][0]" value="" class="articles__title" placeholder="">
                                            </div>
                                        </li>
                                        <li class="width50">
                                            <div class="select-icon d-flex  flex-wrap justify-content-space-between width100 align-items-flex-end">
                                                <div class="links-wrap search-input width75 ">
                                                    <label class="label-margin">link</label>
                                                    <div class="d-flex">
                                                        <i class="fa fa-link" aria-hidden="true"></i>
                                                        <input type="url" name="articles[0][articles_url][0]" value="" class="articles_url">
                                                    </div>
                                                </div>
                                                <div class="button-add"><a class="delete-btn" onclick="MarketingAssetsRemoveForm(jQuery(this));">DELETE</a></div>
                                            </div>
                                        </li>
                                    </ul>

                                </ul>

                                <div class="main-title-wrap d-flex">
                                    <span>Trainings</span>
                                    <div class="button-add">
                                        <a onclick="Trainings()">ADD</a>
                                    </div>
                                </div>
                                <ul class="  d-flex flex-wrap Trainings-append-to  padding-left-right">
                                    <ul class="Trainings-clone flex-wrap d-flex width100">
                                        <li class="width50 search-input align-items-center">
                                            <label class="label-margin">NAME</label>
                                            <div class="d-flex">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="search" name="articles[0][articles_title][0]" value="" class="articles__title" placeholder="">
                                            </div>
                                        </li>
                                        <li class="width50 ">
                                            <div class="select-icon d-flex  flex-wrap justify-content-space-between width100 align-items-flex-end">
                                                <div class="links-wrap search-input width75 ">
                                                    <label class="label-margin">link</label>
                                                    <div class="d-flex">
                                                        <i class="fa fa-link" aria-hidden="true"></i>
                                                        <input type="url" name="articles[0][articles_url][0]" value="" class="articles_url">
                                                    </div>
                                                </div>
                                                <div class="button-add"><a class="delete-btn" onclick="TrainingsRemoveForm(jQuery(this));">DELETE</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </ul>

                                <div class="main-title-wrap d-flex">
                                    <span>Others</span>
                                    <div class="button-add">
                                        <a onclick="OthersAssets()">ADD</a>
                                    </div>
                                </div>
                                <ul class="  d-flex flex-wrap others-assets-append-to padding-left-right">
                                    <ul class="others-assets-clone flex-wrap d-flex width100">
                                        <li class="width50 search-input align-items-center">
                                            <label class="label-margin">NAME</label>
                                            <div class="d-flex">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="search" name="articles[0][articles_title][0]" value="" class="articles__title" placeholder="">
                                            </div>
                                        </li>
                                        <li class="width50 ">
                                            <div class="select-icon d-flex  flex-wrap justify-content-space-between width100 align-items-flex-end">
                                                <div class="links-wrap search-input width75 ">
                                                    <label class="label-margin">link</label>
                                                    <div class="d-flex">
                                                        <i class="fa fa-link" aria-hidden="true"></i>
                                                        <input type="url" name="articles[0][articles_url][0]" value="" class="articles_url">
                                                    </div>
                                                </div>
                                                <div class="button-add"><a class="delete-btn" onclick="OthersAssetsRemoveForm(jQuery(this));">DELETE</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </ul>
                                <div class="save-btn  d-flex justify-content-flex-end">
                                    <div class="success-message">
                                        <!-- <span id="property_overview"></span> -->
                                    </div>
                                    <a href="javascript:void(0)" data-tab="property_overview" class="overview_sumbit">SAVE</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab_content" id="tab5">
                    <div class="main-title">
                        <h2>commissions</h2>
                    </div>
                    <div class="form-property">
                        <form>
                            <div class="main-title-wrap d-flex flex-wrap">
                                <span>Policies</span>
                                <div class="button-add">
                                    <a onclick="commissions()">ADD</a>
                                </div>
                                <div class="width100 policies-des">
                                    <p>Please list the different commissionable insurance policies available for our advisors to book. For example: Annual, per-trip, CFAR etc.</p>
                                </div>
                            </div>
                            <ul class="d-flex flex-wrap commissions-append-to">
                                <ul class="commissions-clone flex-wrap d-flex width100">
                                    <li class="width100 search-input align-items-center">
                                        <label class="label-margin">TITLE</label>
                                        <input type="text" name="" placeholder="SmartFlyer Plan">
                                    </li>
                                    <li class="width100 search-input align-items-center textarea-div">
                                        <label class="label-margin">description</label>
                                        <textarea>Created with SmartFlyer customers in mind, this comprehensive travel protection plan gives you and your loved ones options when unexpected situations affect your trip. Let us help you Dream. Explore. Travel On.</textarea>
                                    </li>
                                    <li class="width100 text-align-right">
                                        <div class="button-add"><a class="delete-btn" onclick="CommissionsRemoveForm(jQuery(this));">DELETE</a></div>
                                    </li>
                                </ul>
                                <ul class="commissions-clone flex-wrap d-flex width100">
                                    <li class="width100 search-input align-items-center">
                                        <label class="label-margin">TITLE</label>
                                        <input type="text" name="" placeholder="SmartFlyer Plan">
                                    </li>
                                    <li class="width100 search-input align-items-center textarea-div">
                                        <label class="label-margin">description</label>
                                        <textarea>Created with SmartFlyer customers in mind, this comprehensive travel protection plan gives you and your loved ones options when unexpected situations affect your trip. Let us help you Dream. Explore. Travel On.</textarea>
                                    </li>
                                    <li class="width100 text-align-right">
                                        <div class="button-add"><a class="delete-btn" onclick="CommissionsRemoveForm(jQuery(this));">DELETE</a></div>
                                    </li>
                                </ul>
                            </ul>
                            <div class="width100 policies-des commssion-details">
                                <label>Commssion Details</label>
                                <p>paid automatically, if paid at time when the policy is created or when the client travels, requires an invoice, commission invoices required after a certain period, etc.</p>
                                <input type="text" name="">
                            </div>
                            <div class="save-btn  d-flex justify-content-flex-end">
                                    <div class="success-message">
                                        <!-- <span id="property_overview"></span> -->
                                    </div>
                                    <a href="javascript:void(0)" data-tab="property_overview" class="overview_sumbit">SAVE</a>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="tab_content" id="tab6">
                    <div class="main-title">
                        <h2>Updates</h2>
                        <div class="form-property">
                            <form>
                                <div class="main-title-wrap d-flex">
                                    <span>Updates</span>
                                    <div class="button-add">
                                        <a onclick="updatesAssets()">ADD</a>
                                    </div>
                                </div>
                                <ul class="d-flex flex-wrap updates-append-to  padding-left-right">
                                    <ul class="updates-clone flex-wrap d-flex width100">
                                        <li class="width50 search-input align-items-center">
                                            <label class="label-margin">NAME</label>
                                            <div class="d-flex">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="search" name="articles[0][articles_title][0]" value="" class="articles__title" placeholder="">
                                            </div>
                                        </li>
                                        <li class="width50 ">
                                            <div class="select-icon d-flex  flex-wrap justify-content-space-between width100 align-items-flex-end">
                                                <div class="links-wrap search-input width75 ">
                                                    <label class="label-margin">link</label>
                                                    <div class="d-flex">
                                                        <i class="fa fa-link" aria-hidden="true"></i>
                                                        <input type="url" name="articles[0][articles_url][0]" value="" class="articles_url">
                                                    </div>
                                                </div>
                                                <div class="button-add"><a class="delete-btn" onclick="UpdatesRemoveForm(jQuery(this));">DELETE</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="updates-clone flex-wrap d-flex width100 ">
                                        <li class="width50 search-input align-items-center">
                                            <label class="label-margin">NAME</label>
                                            <div class="d-flex">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="search" name="articles[0][articles_title][0]" value="" class="articles__title" placeholder="">
                                            </div>
                                        </li>
                                        <li class="width50 ">
                                            <div class="select-icon d-flex  flex-wrap justify-content-space-between width100 align-items-flex-end">
                                                <div class="links-wrap search-input width75 ">
                                                    <label class="label-margin">link</label>
                                                    <div class="d-flex">
                                                        <i class="fa fa-link" aria-hidden="true"></i>
                                                        <input type="url" name="articles[0][articles_url][0]" value="" class="articles_url">
                                                    </div>
                                                </div>
                                                <div class="button-add"><a class="delete-btn" onclick="UpdatesRemoveForm(jQuery(this));">DELETE</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
</script>   

<?php
} 
get_footer();
?>