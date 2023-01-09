<?php
/*
Template Name: Property Tabs Template
*/
get_header();
?>
<div class="wp-container">
    <div class="custom-scroll-section custom-scroll-new-section">
        <div class="custom-scroll">
            <ul class="tabs">
                <li rel="tab1" class="active"><span> OVERVIEW </span></li>
                <li rel="tab2"><span> PROPERTY CONTACTS  </span></li>
                <li rel="tab3"><span> PROPERTY SPECIFICS  </span></li>
                <li rel="tab4"><span> BOOKING + COMMISSIONS  </span></li>
                <li rel="tab5"><span> OFFERS AND TRAININGS  </span></li>
                <li rel="tab6"><span> MARKETING  </span></li>
                <li rel="tab7"><span> AGENT REVIEWS  </span></li>
                <li rel="tab8" class="tab_last"><span> LINKS AND ARTICLES  </span></li>
            </ul>
        </div>
        <div class="tab_container property-container">
            <div class="tab_content" id="tab1">
                <div class="text-align-center property-main-title">
                    <h2>Property Overview </h2>
                </div>
                <div class="form-property">
                    <!-- Main details -->
                    <div class="main-title-wrap"><span> Main details</span></div>
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width50">
                            <label>property name</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>overline text</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>add location</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>attach header image</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                        <li class="width100">
                            <label>brief description</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width100">
                            <label>Long description</label>
                            <textarea></textarea>
                        </li>
                    </ul>
                    <!-- -------Addons------------- -->
                    <div class="main-title-wrap d-flex "> <span>Addons</span> <div class="button-add add-form"><a>add</a></div></div>
                    <ul class="d-flex flex-wrap main-wrap">
                        <div class="width100 d-flex flex-wrap label-margin">
                            <label class="width50 ">feature name</label>
                            <label class="width50 padding-left-30 ">SELECT ICON</label>
                        </div>
                        <ul class=" width100 appendTo-form">
                            <div class="form-clone-div d-flex flex-wrap form-clone-div-padding ">
                                <li class="width50">
                                    <input type="text" name="" value="" placeholder="">
                                </li>
                                <li class="width50 padding-left-30">
                                    <div class="select-icon d-flex  flex-wrap justify-content-space-between width100">
                                        <ul class="d-flex  flex-wrap add-form-c">
                                            <li><i class="fa fa-tag" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-phone" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-unlock-alt" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-coffee" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-credit-card-alt" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-wifi" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-coffee" aria-hidden="true"></i></li>
                                        </ul>     
                                        <div class="button-add"><a class="delete-btn" onclick="removeForm(jQuery(this));">DELETE</a></div>        
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </ul>
                    <!-- -------Promos------------- -->
                    <div class="main-title-wrap d-flex "> <span>Promos</span> <div class="button-add promos-add-form"><a>add</a></div></div>

                    <ul class="d-flex flex-wrap align-items-flex-end ">
                        <div class="width100 d-flex flex-wrap label-margin">
                            <label class="width50 ">promo name</label>
                            <label class="width50 padding-left-30 ">promo name</label>
                        </div>
                        <ul class="promos-appendTo-form width100">
                            <div class="promos-form-clone-div  d-flex flex-wrap align-items-flex-end form-clone-div-padding">
                                <li class="width50">
                                    <input type="text" name="" value="" placeholder="">
                                </li>
                                <li class="width40">
                                    <input type="url" name="" value="" placeholder="">
                                </li>
                                <li class="width10"><div class="button-add"><a class="delete-btn" onclick="promosremoveForm(jQuery(this));">DELETE</a></div></li>
                            </div>
                        </ul>
                    </ul>

                    <!-- Main property contact -->
                    <div class="main-title-wrap pt-100"><span>Main property contact</span></div>
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width50">
                            <label>first name</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>last name</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>phone</label>
                            <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                        </li>
                        <li class="width50">
                            <label>email</label>
                            <input type="email" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>department</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>attach image</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                    </ul>
                    <!-- Global Contact -->
                    <div class="main-title-wrap"><span>Global Contact</span></div>
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width50">
                            <label>first name</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>last name</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>phone</label>
                            <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                        </li>
                        <li class="width50">
                            <label>email</label>
                            <input type="email" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>department</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>attach image</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                    </ul>
                    <!-- Reviews -->
                    <div class="main-title-wrap"><span>Reviews</span></div>
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width100">
                            <label>reviewe’s name 1</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>DATE</label>
                            <input type="date" name="birthday" value="" placeholder="">
                        </li>
                       <li class="width50">
                            <div class="custom-file-upload">
                                <label>attach header image</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                        <li class="width100">
                            <label>REVIEW</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width100">
                            <label>reviewe’s name 2</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>DATE</label>
                            <input type="date" name="birthday" value="" placeholder="">
                        </li>
                            
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>attach reviewer’s headshot</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                        <li class="width100">
                            <label>REVIEW</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>review section image 1</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>review section image 2</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                    </ul> 
                    <!-- Rooms -->
                    <div class="main-title-wrap"><span>Rooms</span></div>  
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width50">
                            <label>Main title</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>attach image</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                        <li class="width100">
                            <label>description</label>
                            <textarea></textarea>
                            <textarea></textarea>
                        </li>
                        <li class="width100">
                            <label>featured room</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width100">
                            <label>featured room description</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                    </ul>
                    <!-- Restaurants -->
                    <div class="main-title-wrap"><span>Restaurants</span></div>  
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width50">
                            <label>Main title</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>attach image</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                        <li class="width100">
                            <label>description</label>
                            <textarea></textarea>
                            <textarea></textarea>
                        </li>
                    </ul>
                </div>
                <div class="save-btn  d-flex justify-content-flex-end"><a href="#">SAVE</a></div>
            </div>
            <div class="tab_content" id="tab2">
                <div class="text-align-center property-main-title">
                    <h2>Property Contacts</h2>
                </div>
                <div class="form-property">
                    <!-- Contacts -->
                    <div class="main-title-wrap d-flex"><span>Contacts</span><div class="button-add property-contacts-btn"><a>ADD CONTACT</a></div></div>
                    <ul class="d-flex align-items-flex-end main-wrap contacts-form">
                        <li class="contacts-img-width">
                            
                        </li>
                        <li>
                            <label>name</label>
                            
                        </li>
                        <li>
                            <label>email</label>
                            
                        </li>
                        <li>
                            <label>phone</label>
                            
                        </li>
                        <li>
                            <label>department</label>
                            
                        </li>
                        <li class="contacts-btn"></li>
                    </ul>
                    <div class="property-contacts property-contacts-appendTo-form">
                        <ul class="d-flex align-items-flex-end main-wrap contacts-form property-contacts-form-clone">
                            <li class="contacts-img contacts-img-width">
                                <img src="https://smartflyer.theglobalwebdev.com/new-website/wp-content/uploads/2022/08/agent-img.png">
                            </li>
                            <li>
                                <input type="text" name="" value="" placeholder="">
                            </li>
                            <li>
                                <input type="email" name="" value="" placeholder="">
                            </li>
                            <li>
                                <input type="tel" name="" value="" placeholder="">
                            </li>
                            <li>
                                <input type="email" name="" value="" placeholder="">
                            </li>
                            <li class=""><div class="button-add "><a class="delete-btn" onclick="propertycontactsremoveForm(jQuery(this));">DELETE</a></div></li>
                        </ul>
                    </div>
                    <!-- Contacts -->
                    <div class="main-title-wrap d-flex"><span>Images</span></div>
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width50">
                            <div class="custom-file-upload">
                                 <label>ATTACH side IMAGE</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="save-btn  d-flex justify-content-flex-end"><a href="#">SAVE</a></div>
            </div>
            <div class="tab_content" id="tab3">
                 <div class="text-align-center property-main-title">
                    <h2>Property Specifics</h2>
                </div>
                <div class="form-property">
                    <!-- Key Selling Points: -->
                    <div class="main-title-wrap d-flex"><span>Key Selling Points:</span></div>
                    <ul class="selling-point">
                        <li class="width100">
                            <textarea></textarea>
                        </li>
                    </ul>
                    <!-- Insider Tips -->
                    <div class=" property-specifics main-title-wrap d-flex"><span>Insider Tips</span></div>
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width100">
                            <label>wellness</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width100">
                            <label>bespoke experience</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width100">
                            <label>dining</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                    </ul>
                     <!-- Destination information -->
                    <div class="main-title-wrap d-flex"><span>Destination information</span></div>
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width100">
                            <label>Airport</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width100">
                            <label>seasonality</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>Airport location 1</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>Airport location 2</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                    </ul>
                    <!-- Images -->
                    <div class="main-title-wrap d-flex"><span>Images</span></div>
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>ATTACH side IMAGE</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>ATTACH BANNER IMAGE</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="save-btn  d-flex justify-content-flex-end"><a href="#">SAVE</a></div>
            </div>
            <div class="tab_content" id="tab4">
                <div class="text-align-center property-main-title">
                    <h2>Bookings + Commisons information</h2>
                </div>
                <div class="form-property">
                    <!-- Insider Tips -->
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width100">
                            <label>main information</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width100">
                            <label>how do i make a booking?</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width100">
                            <label>dining</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width100">
                            <label>what payment options do you offer?</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>   
                    </ul>
                    <!-- Images -->
                    <div class="main-title-wrap d-flex"><span>Images</span></div>
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>ATTACH SIDE IMAGE</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>ATTACH BANNER IMAGE</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="save-btn  d-flex justify-content-flex-end"><a href="#">SAVE</a></div>
            </div>
            <div class="tab_content" id="tab5">
                <div class="text-align-center property-main-title">
                    <h2>Offers and Trainings</h2>
                </div>
                <div class="form-property">
                    <!-- Short-Term Offers -->
                    <div class="main-title-wrap d-flex"><span>Short-Term Offers</span></div>
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width50">
                            <label>Offer A</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>Date</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width100">
                            <label>offer information</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>ATTACH side IMAGE</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                    </ul>
                    <!-- Short-Term Offers -->
                    <div class="main-title-wrap d-flex"><span>Short-Term Offers</span></div>
                    <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                        <li class="width50">
                            <label>Offer A</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <label>Date</label>
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width100">
                            <label>offer information</label>
                            <input type="text" name="" value="" placeholder="">
                            <input type="text" name="" value="" placeholder="">
                        </li>
                        <li class="width50">
                            <div class="custom-file-upload">
                                <label>ATTACH side IMAGE</label>
                                <input type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </li>
                    </ul>
                    <!-- Trainings -->
                    <div class="main-title-wrap d-flex"><span>Trainings</span><div class="button-add trainings-btn"><a href="#">add</a></div></div>
                    <div class="trainings-appendTo-form">
                        <div class="trainings-form-clone">
                            <ul class="d-flex flex-wrap align-items-flex-end main-wrap">
                                <li class="width33">
                                    <label>training TITLE A</label>
                                    <input type="text" name="" value="" placeholder="">
                                </li>
                                <li class="width33">
                                    <label>Date</label>
                                    <input type="date" name="" value="" placeholder="">
                                </li>
                                <li class="width33">
                                    <label>category</label>
                                    <input type="text" name="" value="" placeholder="">
                                </li>
                            </ul>
                            <ul class="selling-point">
                                <li class="width100">
                                    <label>training INFORMATION</label>
                                    <textarea></textarea>
                                </li>
                                <li class="width10 margin-left-auto"><div class="button-add text-align-right"><a class="delete-btn" onclick="trainingsremoveForm(jQuery(this));">DELETE</a></div></li>
                            </ul>
                        </div>
                    </div>
                    <div class="save-btn pt-100  d-flex justify-content-flex-end"><a href="#">SAVE</a></div>
                </div>
            </div>
            <div class="tab_content marketing-tab" id="tab6">
                 <div class="text-align-center property-main-title">
                    <h2>Marketing</h2>
                </div>
                <div class="form-property">
                    <!-- Logos -->
                    <div class="main-title-wrap d-flex "><span>Logos</span></div>
                    <div class="d-flex flex-wrap marketing-add-img align-items-flex-end">
                        <ul class="d-flex flex-wrap align-items-flex-end main-wrap width60">
                            <li class="width75">
                                <div class="custom-file-upload">
                                    <label>attach image</label>
                                    <input type="file" id="file" class="fileUpload" name="myfiles[]" multiple />
                                </div>
                            </li>
                            <li class="width10"><div class="button-add blue-bg"><a href="#">ADD</a></div></li>
                        </ul>
                        <div class="marketing-image-wrap width40">
                            <ul>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/close-img.png">
                                    <div class="image-name">logo.jpg</div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="main-title-wrap d-flex pt-100"><span>Social Media Story</span></div>
                    <div class="d-flex flex-wrap marketing-add-img align-items-flex-end">
                        <ul class="d-flex flex-wrap align-items-flex-end main-wrap width60">
                            <li class="width75">
                                <label>enter url</label>
                                <input type="url" name="" value="" placeholder="">
                            </li>
                            <li class="width10"><div class="button-add blue-bg"><a href="#">ADD</a></div></li>
                        </ul>
                        <div class="marketing-image-wrap width40">
                            <ul>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/close-img.png">
                                    <div class="image-name">www.story.com/story1</div>
                                </li>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/close-img.png">
                                    <div class="image-name">www.story.com/story1www.story.com/story1www.story.com/story1www.story.co</div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="main-title-wrap d-flex pt-100"><span>Other Files</span></div>
                    <div class="d-flex flex-wrap marketing-add-img align-items-flex-end">
                        <ul class="d-flex flex-wrap align-items-flex-end main-wrap width60">
                            <li class="width75">
                                <div class="custom-file-upload">
                                    <label>attach header image</label>
                                    <input type="file" id="file" name="myfiles[]" multiple />
                                </div>
                            </li>
                            <li class="width10"><div class="button-add blue-bg"><a href="#">ADD</a></div></li>
                        </ul>
                        <div class="marketing-image-wrap width40">
                            <ul>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/close-img.png">
                                    <div class="image-name">logo.jpg</div>
                                </li>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/close-img.png">
                                    <div class="image-name">logo.jpg</div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="main-title-wrap d-flex pt-100"><span>Hashtags</span></div>
                    <div class="d-flex flex-wrap marketing-add-img align-items-flex-end">
                        <ul class="d-flex flex-wrap align-items-flex-end main-wrap width60">
                            <li class="width75">
                                <label>add hashtag</label>
                                <input type="text" name="" value="" placeholder="">
                            </li>
                            <li class="width10"><div class="button-add blue-bg"><a href="#">ADD</a></div></li>
                        </ul>
                        <div class="marketing-image-wrap width40">
                            <ul>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/close-img.png">
                                    <div class="image-name">#hashtag</div>
                                </li>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/close-img.png">
                                    <div class="image-name">#hashtag1</div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="main-title-wrap d-flex pt-100"><span>Usernames</span></div>
                    <div class="d-flex flex-wrap marketing-add-img align-items-flex-end">
                        <ul class="d-flex flex-wrap align-items-flex-end main-wrap width60">
                            <li class="width75">
                                <label>add username</label>
                                <input type="text" name="" value="" placeholder="">
                            </li>
                            <li class="width10"><div class="button-add blue-bg"><a href="#">ADD</a></div></li>
                        </ul>
                        <div class="marketing-image-wrap width40">
                            <ul>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/close-img.png">
                                    <div class="image-name">@username1</div>
                                </li>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/close-img.png">
                                    <div class="image-name">@username2</div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="main-title-wrap d-flex pt-100"><span>Image Gallery</span></div>
                    <div class="d-flex flex-wrap marketing-add-img align-items-flex-end">
                        
                           
                                <ul class="d-flex flex-wrap align-items-flex-end main-wrap width60">
                                    <li class="width75">
                                        <div class="custom-file-upload">
                                            <label>ATTACH IMAGE</label>
                                            <input type="file" id="file" name="myfiles[]" multiple />
                                        </div>
                                    </li>
                                    <li class="width10"><div class="button-add blue-bg"><a href="#">ADD</a></div></li>
                                </ul>
                                <div class="marketing-image-wrap width40 marketing-appendTo-form">
                                    <ul class="marketing-form-clone" >
                                        <li>
                                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/close-img.png">
                                            <div class="image-name">image 1</div>
                                        </li>
                                    </ul>
                                </div>
                            
                        
                    </div>
                    <div class="save-btn pt-100  d-flex justify-content-flex-end"><a href="#">SAVE</a></div>
                </div>
            </div>
            <div class="tab_content" id="tab7">

            </div>
            <div class="tab_content" id="tab8">

            </div>
        </div>
    </div>
</div>

<style type="text/css">
    footer , .subscribe-instagram-section{ display: none;}
    .custom-scroll.fixed-header { position: fixed;top: 0;left: 0;right: 0;z-index: 1;}
</style>
<script type="text/javascript">
    jQuery(window).scroll(function(){

        if (jQuery(window).scrollTop() >= 100) {
            jQuery('.custom-scroll-new-section .custom-scroll').addClass('fixed-header');
        }
        else {
            jQuery('.custom-scroll-new-section .custom-scroll').removeClass('fixed-header');
        }
    });

    jQuery(document).ready(function(){
        jQuery(".add-form a").click(function () {
            jQuery(".form-clone-div:first").clone().appendTo(".appendTo-form");
            return false;
        });

        jQuery(".promos-add-form a").click(function () {
            jQuery(".promos-form-clone-div:first").clone().appendTo(".promos-appendTo-form");
            return false;
        });

        /* Property Contacts */

        jQuery(".property-contacts-btn a").click(function () {
            jQuery(".property-contacts-form-clone:first").clone().appendTo(".property-contacts-appendTo-form");
            return false;
        });

        /* trainings */

        jQuery(".trainings-btn a").click(function () {
            jQuery(".trainings-form-clone:first").clone().appendTo(".trainings-appendTo-form");
            return false;
        });


        jQuery(".marketing-add-img .blue-bg a").click(function () {
            jQuery(".marketing-form-clone:first").clone().appendTo(".marketing-appendTo-form");
            return false;
        });


    });

    function removeForm(e){
        if(jQuery('.form-clone-div').length > 1){
            e.closest('.form-clone-div').remove();
        }else{
            
        }
    }
    function promosremoveForm(e){
        if(jQuery('.promos-form-clone-div').length > 1){
            e.closest('.promos-form-clone-div').remove();
        }else{
            
        }
    }
    function propertycontactsremoveForm(e){
        if(jQuery('.property-contacts-form-clone').length > 1){
            e.closest('.property-contacts-form-clone').remove();
        }else{
            
        }
    }

     function trainingsremoveForm(e){
        if(jQuery('.trainings-form-clone').length > 1){
            e.closest('.trainings-form-clone').remove();
        }else{
            
        }
    }

     function trainingsremoveForm(e){
        if(jQuery('.trainings-form-clone').length > 1){
            e.closest('.trainings-form-clone').remove();
        }else{
            
        }
    }



    /*============= BROWSE image ======================*/
    
        ;(function($) {

                  // Browser supports HTML5 multiple file?
                  var multipleSupport = typeof jQuery('<input/>')[0].multiple !== 'undefined',
                      isIE = /msie/i.test( navigator.userAgent );

                  $.fn.customFile = function() {

                    return this.each(function() {

                      var $file = jQuery(this).addClass('custom-file-upload-hidden'), // the original file input
                          $wrap = jQuery('<div class="file-upload-wrapper">'),
                          $input = jQuery('<input type="text" class="file-upload-input fileUpload" />'),
                          // Button that will be used in non-IE browsers
                          $button = jQuery('<button type="button" class="file-upload-button input-button">BROWSE</button>'),
                          // Hack for IE
                          $label = jQuery('<label class="file-upload-button" for="'+ $file[0].id +'">BROWSE</label>');

                      // Hide by shifting to the left so we
                      // can still trigger events
                      $file.css({
                        position: 'absolute',
                        left: '-9999px'
                      });

                      $wrap.insertAfter( $file )
                        .append( $file, $input, ( isIE ? $label : $button ) );

                      // Prevent focus
                      $file.attr('tabIndex', -1);
                      $button.attr('tabIndex', -1);

                      $button.click(function () {
                        $file.focus().click(); // Open dialog
                      });

                      $file.change(function() {

                        var files = [], fileArr, filename;

                        // If multiple is supported then extract
                        // all filenames from the file array
                        if ( multipleSupport ) {
                          fileArr = $file[0].files;
                          for ( var i = 0, len = fileArr.length; i < len; i++ ) {
                            files.push( fileArr[i].name );
                          }
                          filename = files.join(', ');

                        // If not supported then just take the value
                        // and remove the path to just show the filename
                        } else {
                          filename = $file.val().split('\\').pop();
                        }

                        $input.val( filename ) // Set the value
                          .attr('title', filename) // Show filename in title tootlip
                          .focus(); // Regain focus

                      });

                      $input.on({
                        blur: function() { $file.trigger('blur'); },
                        keydown: function( e ) {
                          if ( e.which === 13 ) { // Enter
                            if ( !isIE ) { $file.trigger('click'); }
                          } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
                            // On some browsers the value is read-only
                            // with this trick we remove the old input and add
                            // a clean clone with all the original events attached
                            $file.replaceWith( $file = $file.clone( true ) );
                            $file.trigger('change');
                            $input.val('');
                          } else if ( e.which === 9 ){ // TAB
                            return;
                          } else { // All other keys
                            return false;
                          }
                        }
                      });

                    });

                  };

                  // Old browser fallback
                  if ( !multipleSupport ) {
                    jQuery( document ).on('change', 'input.customfile', function() {

                      var $this = jQuery(this),
                          // Create a unique ID so we
                          // can attach the label to the input
                          uniqId = 'customfile_'+ (new Date()).getTime(),
                          $wrap = $this.parent(),

                          // Filter empty input
                          $inputs = $wrap.siblings().find('.file-upload-input')
                            .filter(function(){ return !this.value }),

                          $file = jQuery('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

                      // 1ms timeout so it runs after all other events
                      // that modify the value have triggered
                      setTimeout(function() {
                        // Add a new input
                        if ( $this.val() ) {
                          // Check for empty fields to prevent
                          // creating new inputs when changing files
                          if ( !$inputs.length ) {
                            $wrap.after( $file );
                            $file.customFile();
                          }
                        // Remove and reorganize inputs
                        } else {
                          $inputs.parent().remove();
                          // Move the input so it's always last on the list
                          $wrap.appendTo( $wrap.parent() );
                          $wrap.find('input').focus();
                        }
                      }, 1);

                    });
                  }

        }(jQuery));

        jQuery('input[type=file]').customFile();
        

        var filename = jQuery('.custom-file-upload-hidden').val().replace(/C:\\fakepath\\/i, '')
        // console.log(filename);

        jQuery('.fileUpload').on('change', function() {
            var fileName = jQuery(this).val().replace(/C:\\fakepath\\/i, '');
            jQuery(this).parents('.marketing-add-img').find('.marketing-image-wrap .image-name').html(fileName);
        });


        /*  ****************** */
        if (jQuery(window).width() < 767) {

            /*mainmenu*/
            jQuery('ul.property-top-header').hide();
            jQuery('.property-header .property-menulinks').click(function() {
                jQuery('body').toggleClass('mobile-open');
                jQuery(this).next('ul.property-top-header').slideToggle(250);
                return false;
            });

            jQuery( ".custom-scroll .tabs" ).appendTo( jQuery( ".property-header .header-menu ul.property-top-header" ) );
            jQuery(".property-top-header .tabs > li").unwrap();

        }   


</script>
<?php get_footer(); ?>