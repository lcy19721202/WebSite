<?php

add_action('init', 'of_options');
if (!function_exists('of_options')) {

    function of_options() {
        // VARIABLES
        $themename = 'Business-Grow Theme';
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = inkthemes_get_option('of_options');
        //Front page on/off
        $file_rename = array("on" => "On", "off" => "Off");
        $showhide_sections = array("Show" => "Show", "Hide" => "Hide");
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        //Stylesheet Reader
        $alt_stylesheets = array("black" => "black", "dark-green" => "dark-green", "green" => "green", "teal-green" => "teal-green", "blue" => "blue", "yellow" => "yellow", "red" => "red", "orange" => "orange");
        $lan_stylesheets = array("Default" => "Default");
        // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }

        // Populate OptionsFramework option in array for use in theme
        $contact_option = array("on" => "On", "off" => "Off");
        $captcha_option = array("on" => "On", "off" => "Off");
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }
        // If using image radio buttons, define a directory path
        $imagepath = get_template_directory_uri() . '/images/';

        $options = array();
        $options[] = array("name" => "General Settings",
            "type" => "heading");

        $options[] = array("name" => "Custom Logo",
            "desc" => "Upload a logo for your Website. The recommended size for the logo is 250px width x 50px height.",
            "id" => "inkthemes_logo",
            "type" => "upload");

        $options[] = array("name" => "Custom Favicon",
            "desc" => "Here you can upload a Favicon for your Website. Specified size is 16px x 16px.",
            "id" => "inkthemes_favicon",
            "type" => "upload");

        $options[] = array("name" => "Contact Number",
            "desc" => "Mention your contact number here through which users can interact to you directly.",
            "id" => "inkthemes_contact_number",
            "std" => "",
            "type" => "text");

        //Background Image
        $options[] = array("name" => "Background Image",
            "desc" => "Choose a suitable background image that will complement your website.",
            "id" => "inkthemes_bodybg",
            "type" => "upload");


        $options[] = array("name" => "Mobile Navigation Menu",
            "desc" => "Enter your mobile navigation menu text",
            "id" => "inkthemes_nav",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Tracking Code",
            "desc" => "Paste your Google Analytics (or other) tracking code here.",
            "id" => "inkthemes_analytics",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Front Page On/Off",
            "desc" => "If the front page option is active then home page will appear otherwise blog page will display.",
            "id" => "re_nm",
            "std" => "on",
            "type" => "radio",
            "options" => $file_rename);

        $options[] = array("name" => "Optional Menu on Home Page",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Optional Menu Title",
            "desc" => "Here you can create a page menu that will display in menu section on your featured homepage besides the default featured home page menu. It is optional.",
            "id" => "inkthemes_opt_menu_heading",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Optional Menu Link",
            "desc" => "Here you can mention a URL for the optional menu that will redirect the users to the a particular page.",
            "id" => "inkthemes_opt_menu_link",
            "std" => "",
            "type" => "text");

        //Home Page Slider Setting
        $options[] = array("name" => "Slider Settings",
            "type" => "heading");

        //Slider Speed Setting	
        $options[] = array("name" => "Slider Speed",
            "desc" => "Set the speed of the slider in milliseconds. For e.g. if you want to set the speed of the slider for 8 seconds then enter 8000 in the field or if you want to set the slider speed for 2.5 seconds then enter 2500 in the field.",
            "id" => "inkthemes_slider_speed",
            "std" => "3000",
            "type" => "text");

        //First Slider
        $options[] = array("name" => "First Slider",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "First Slider Image",
            "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_slideimage1",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "First Slider Heading",
            "desc" => "Mention the heading for the First slider.",
            "id" => "inkthemes_sliderheading1",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Link for First slider",
            "desc" => "Mention the URL for first image.",
            "id" => "inkthemes_Sliderlink1",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "First Slider Description",
            "desc" => "Here mention a short description for the First slider heading.",
            "id" => "inkthemes_sliderdes1",
            "std" => "",
            "type" => "textarea");


        //Second Slider
        $options[] = array("name" => "Second Slider",
            "type" => "saperate",
            "class" => "saperator");
        $options[] = array("name" => "Second Slider Image",
            "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_slideimage2",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Second Slider Heading",
            "desc" => "Mention the heading for the Second slider.",
            "id" => "inkthemes_sliderheading2",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Link for Second slider",
            "desc" => "Mention the URL for Second image.",
            "id" => "inkthemes_Sliderlink2",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Second Slider Description",
            "desc" => "Here mention a short description for the Second slider heading.",
            "id" => "inkthemes_sliderdes2",
            "std" => "",
            "type" => "textarea");

        //Third Slider
        $options[] = array("name" => "Third Slider",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Third Slider Image",
            "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_slideimage3",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Third Slider Heading",
            "desc" => "Mention the heading for the Third slider.",
            "id" => "inkthemes_sliderheading3",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Link for Third slider",
            "desc" => "Mention the URL for Third image.",
            "id" => "inkthemes_Sliderlink3",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Third Slider Description",
            "desc" => "Here mention a short description for the Third slider heading.",
            "id" => "inkthemes_sliderdes3",
            "std" => "",
            "type" => "textarea");


        //Fourth Slider
        $options[] = array("name" => "Fourth Slider",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Fourth Slider Image",
            "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_slideimage4",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Fourth Slider Heading",
            "desc" => "Mention the heading for the Fourth slider.",
            "id" => "inkthemes_sliderheading4",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Link for Fourth slider",
            "desc" => "Mention the URL for Fourth image.",
            "id" => "inkthemes_Sliderlink4",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Fourth Slider Description",
            "desc" => "Here mention a short description for the Fourth slider heading.",
            "id" => "inkthemes_sliderdes4",
            "std" => "",
            "type" => "textarea");


        //Fifth Slider
        $options[] = array("name" => "Fifth Slider",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Fifth Slider Image",
            "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_slideimage5",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Fifth Slider Heading",
            "desc" => "Mention the heading for the Fifth slider.",
            "id" => "inkthemes_sliderheading5",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Link for Fifth slider",
            "desc" => "Mention the URL for Fifth image.",
            "id" => "inkthemes_Sliderlink5",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Fifth Slider Description",
            "desc" => "Here mention a short description for the Fifth slider heading.",
            "id" => "inkthemes_sliderdes5",
            "std" => "",
            "type" => "textarea");


        //Sixth Slider
        $options[] = array("name" => "Sixth Slider",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Sixth Slider Image",
            "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_slideimage6",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Sixth Slider Heading",
            "desc" => "Mention the heading for the Sixth slider.",
            "id" => "inkthemes_sliderheading6",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Link for Sixth slider",
            "desc" => "Mention the URL for Sixth image.",
            "id" => "inkthemes_Sliderlink6",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Sixth Slider Description",
            "desc" => "Here mention a short description for the Sixth slider heading.",
            "id" => "inkthemes_sliderdes6",
            "std" => "",
            "type" => "textarea");

        //Seventh Slider
        $options[] = array("name" => "Seventh Slider",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Seventh Slider Image",
            "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_slideimage7",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Seventh Slider Heading",
            "desc" => "Mention the heading for the Seventh slider.",
            "id" => "inkthemes_sliderheading7",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Link for Seventh slider",
            "desc" => "Mention the URL for Seventh image.",
            "id" => "inkthemes_Sliderlink7",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Seventh Slider Description",
            "desc" => "Here mention a short description for the Seventh slider heading.",
            "id" => "inkthemes_sliderdes7",
            "std" => "",
            "type" => "textarea");

        //Eighth Slider
        $options[] = array("name" => "Eighth Slider",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Eighth Slider Image",
            "desc" => "The optimal size of the image is 1600 px wide x 600 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_slideimage8",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Eighth Slider Heading",
            "desc" => "Mention the heading for the Eighth slider.",
            "id" => "inkthemes_sliderheading8",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Link for Eighth slider",
            "desc" => "Mention the URL for Eighth image.",
            "id" => "inkthemes_Sliderlink8",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Eighth Slider Description",
            "desc" => "Here mention a short description for the Eighth slider heading.",
            "id" => "inkthemes_sliderdes8",
            "std" => "",
            "type" => "textarea");

        //****=============================================================================****//
        //Homepage Feature Area Section1
        $options[] = array("name" => "Homepage Feature Area",
            "type" => "heading");

        $options[] = array("name" => "Featured Heading",
            "desc" => "Mention the punch line for your business here.",
            "id" => "inkthemes_page_main_heading",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Featured Sub Heading",
            "desc" => "Mention the tagline for your business here that will complement the punch line.",
            "id" => "inkthemes_page_sub_heading",
            "std" => "",
            "type" => "textarea");
		
		$options[] = array("name" => "Show or Hide this section.",
            "desc" => "Hide or show this section on homepage. By default is shown.",
            "id" => "inkthemes_featured_section_onoff",
            "std" => "Show",
            "type" => "radio",
            "options" => $showhide_sections);

        //****=============================================================================****//
        //Home Page Our Services Section 2		
        $options[] = array("name" => "Homepage Services Section",
            "type" => "heading");


        $options[] = array("name" => "Heading",
            "desc" => "Here you can mention a suitable heading for your services. It will also appear on the home page menu.",
            "id" => "inkthemes_our_services_heading",
            "std" => "",
            "type" => "text");

        // Services block 1

        $options[] = array("name" => "First block",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "First Image",
            "desc" => "The optimal size of the image is 264 px wide x 264 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_our_services_image1",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Title 1",
            "desc" => "Here you can mention a suitable title that will display the title in services section.",
            "id" => "inkthemes_our_services_title1",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Link for Title 1",
            "desc" => "Mention the URL for Title 1",
            "id" => "inkthemes_services_title_link1",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Description 1",
            "desc" => "Here you can mention a suitable title that will display the small description in services section.",
            "id" => "inkthemes_our_services_desc1",
            "std" => "",
            "type" => "textarea");


        // Services block 2

        $options[] = array("name" => "Second Block",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Second Image",
            "desc" => "The optimal size of the image is 264 px wide x 264 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_our_services_image2",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Title 2",
            "desc" => "Here you can mention a suitable title that will display the title in services section.",
            "id" => "inkthemes_our_services_title2",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Link for Title 2",
            "desc" => "Mention the URL for Title2",
            "id" => "inkthemes_services_title_link2",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Description 2",
            "desc" => "Here you can mention a suitable title that will display the small description in services section.",
            "id" => "inkthemes_our_services_desc2",
            "std" => "",
            "type" => "textarea");


        // Services block 3

        $options[] = array("name" => "Third block",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Third Image",
            "desc" => "The optimal size of the image is 264 px wide x 264 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_our_services_image3",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Title 3",
            "desc" => "Here you can mention a suitable title that will display the title in services section.",
            "id" => "inkthemes_our_services_title3",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Link for Title 3",
            "desc" => "Mention the URL for Title 3",
            "id" => "inkthemes_services_title_link3",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Description 3",
            "desc" => "Here you can mention a suitable title that will display the small description in services section.",
            "id" => "inkthemes_our_services_desc3",
            "std" => "",
            "type" => "textarea");


        // Services block 4

        $options[] = array("name" => "Fourth block",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Fourth Image",
            "desc" => "The optimal size of the image is 264 px wide x 264 px height, but it can be varied as per your requirement.",
            "id" => "inkthemes_our_services_image4",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Title 4",
            "desc" => "Here you can mention a suitable title that will display the title in services section.",
            "id" => "inkthemes_our_services_title4",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Link for Title 4",
            "desc" => "Mention the URL for Title 4",
            "id" => "inkthemes_services_title_link4",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Description 4",
            "desc" => "Here you can mention a suitable title that will display the small description in services section.",
            "id" => "inkthemes_our_services_desc4",
            "std" => "",
            "type" => "textarea");

		$options[] = array("name" => "Show or Hide this section.",
            "desc" => "Hide or show this section on homepage. By default it is shown.",
            "id" => "inkthemes_services_section_onoff",
            "std" => "Show",
            "type" => "radio",
            "options" => $showhide_sections);

        //****=============================================================================****//
        //Home Page Blog Section 3		
        $options[] = array("name" => "Homepage Recent Blogs Section",
            "type" => "heading");

        // blog block 1
        $options[] = array("name" => "Blog Heading",
            "desc" => "Here you can mention a suitable heading that will display as blog heading on home page. Also display on the menu.",
            "id" => "inkthemes_recent_blog_heading",
            "std" => "",
            "type" => "text");
		
		$options[] = array("name" => "All Post Link",
			"desc" =>  "Optional, leave blank if you don't want to show All Posts link below your Recent Blogs section on homepage.",
            "type" => "saperate",
            "class" => "saperator");
		
		 $options[] = array("name" => "Link Url",
            "desc" => "Go to create a new page, enter some title, select Blog Template from the right option, and publish it. Copy the url of that page and paste here. ",
            "id" => "inkthemes_all_post_link",
            "std" => "",
            "type" => "text");
			
		$options[] = array("name" => "Link Text",
            "desc" => "Add your link text here.",
            "id" => "inkthemes_all_post_link_text",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "To show your recent posts on home page you need to insert the feature image of the blog while publishing it.",
            "desc" => "",
            "id" => "",
            "std" => "",
            "type" => "");
		
		$options[] = array("name" => "Show or Hide this section.",
            "desc" => "Hide or show this section on homepage. By default it is shown.",
            "id" => "inkthemes_blog_section_onoff",
            "std" => "Show",
            "type" => "radio",
            "options" => $showhide_sections);
        //****=============================================================================****//
        //Home Page Gallery 4		
        $options[] = array("name" => "Gallery Feature",
            "type" => "heading");

        // gallery block 1
        $options[] = array("name" => "Gallery and Portfolio Heading",
            "desc" => "Here you can mention a suitable heading that will display as your Gallery title on home page. Also display on the menu. ",
            "id" => "inkthemes_gallery_portfolio_heading",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "To customize this section please go to Gallery and Portfolio option.",
            "desc" => "",
            "id" => "",
            "std" => "",
            "type" => "");
			
		$options[] = array("name" => "Show or Hide this section.",
		"desc" => "Hide or show this section on homepage. By default it is shown.",
		"id" => "inkthemes_gallery_section_onoff",
		"std" => "Show",
		"type" => "radio",
		"options" => $showhide_sections);
        //****=============================================================================****//
        //Home Page Contact Section 5		
        $options[] = array("name" => "Contact Section",
            "type" => "heading");

        // contact block 0
        $options[] = array("name" => "Contact Heading",
            "desc" => "Here you can mention a suitable heading that will display as your contact title on home page. Also display on the menu.",
            "id" => "inkthemes_our_contact_heading",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Contact Form Sub Heading",
            "desc" => "Here you can mention a suitable heading of your inbuilt contact form that will display on home page.",
            "id" => "inkthemes_our_contact_input_iframe_heading",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Contact Iframe Code",
            "desc" => "Paste the embed code of your contact form here to show it on your website. Create your own form at formget.com/app. Leave blank if you want to use default wordpress contact form.",
            "id" => "inkthemes_contact_iframe_code",
            "std" => "",
            "type" => "textarea");

        // contact block 1
        $options[] = array("name" => "Contact Address Heading",
            "desc" => "Here you can mention a suitable heading that will display as contact address heading on the right side of home page under contact section.",
            "id" => "inkthemes_our_contact_sub_heading",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Business Address",
            "desc" => "Here you can put your business address that will display on home page of your website.",
            "id" => "inkthemes_contact_address",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Contact Number",
            "desc" => "Here you can mention your contact number that will appear on home page.",
            "id" => "inkthemes_contact_phone_no",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Contact Email",
            "desc" => "Here you can mention your email id that will appear on home page.",
            "id" => "inkthemes_ontact_email",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => " Your Website",
            "desc" => "Here you can mention your website name that will appear on home page.",
            "id" => "inkthemes_contact_website",
            "std" => "",
            "type" => "text");

        // contact block 2

        $options[] = array("name" => "Location Map",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Location Map Heading",
            "desc" => "Here you can mention a suitable heading for your location map that will appear on home page under contact section.",
            "id" => "inkthemes_contact_location_map_heading",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Map Iframe Code",
            "desc" => "Go to https://maps.google.com/ and generate the map for your location. Just copy only the iframe code i.e. code within &lt;iframe&gt; and &lt;/iframe&gt; and paste it here. This will show the map location of your business on the Website.",
            "id" => "inkthemes_contact_map",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Recaptcha Public Key",
            "desc" => "Go to http://www.google.com/recaptcha/admin/create to Create your Private key",
            "id" => "recaptcha_public",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Recaptcha Private Key",
            "desc" => "Go to http://www.google.com/recaptcha/admin/create to Create your Private key",
            "id" => "recaptcha_private",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Recaptcha On/Off",
            "desc" => "If the recaptcha option is on then contact page and front-page contact section will appear with a captcha otherwise without a captcha. By default it is on.",
            "id" => "inkthemes_recaptcha_option",
            "std" => "on",
            "type" => "radio",
            "options" => $file_rename);
			
		$options[] = array("name" => "Show or Hide this section.",
		"desc" => "Hide or show this section on homepage. By default it is shown.",
		"id" => "inkthemes_contact_section_onoff",
		"std" => "Show",
		"type" => "radio",
		"options" => $showhide_sections);

		//****=============================================================================****//
		//****=========Optional Menu Frontpage ============================================****//
//****=============================================================================****//
//****-----------This code is used for creating f styleshteet options----------****//							
//****=============================================================================****//
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
        $options[] = array("name" => "Styling Options",
            "type" => "heading");
        $options[] = array("name" => "Theme Stylesheet",
            "desc" => "Select the color of the theme from different available colors.",
            "id" => "inkthemes_altstylesheet",
            "std" => "orange",
            "type" => "select",
            "options" => $alt_stylesheets);
        $options[] = array("name" => "Theme Language",
            "desc" => "By default the theme content displays from left to right which you can change to right to left i.e. switching it to RTL.",
            "id" => "inkthemes_lanstylesheet",
            "std" => "Default",
            "type" => "select",
            "options" => $lan_stylesheets);
        $options[] = array("name" => "Custom CSS",
            "desc" => "Quickly add your custom CSS code to your theme by writing the code in this block.",
            "id" => "inkthemes_customcss",
            "std" => "",
            "type" => "textarea");

//****=============================================================================****//
//****-------------This code is used for creating social logos options-------------****//					
//****=============================================================================****//

        $options[] = array("name" => "Social Icons",
            "type" => "heading");

        $options[] = array("name" => "Facebook URL",
            "desc" => "Mention the URL of your Facebook here.",
            "id" => "inkthemes_facebook",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Twitter URL",
            "desc" => "Mention the URL of your Twitter here.",
            "id" => "inkthemes_twitter",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Google+ URL",
            "desc" => "Mention the URL of your Google+ here.",
            "id" => "inkthemes_google",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Rss Feed URL",
            "desc" => "Mention the URL of your Rss Feed here.",
            "id" => "inkthemes_rss",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Pinterest URL",
            "desc" => "Mention the URL of your Pinterest here.",
            "id" => "inkthemes_pinterest",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "YouTube URL",
            "desc" => "Mention the URL of your YouTube here.",
            "id" => "inkthemes_youtube",
            "std" => "",
            "type" => "text");
		$options[] = array("name" => "Vimeo URL",
            "desc" => "Mention the URL of your Vimeo here.",
            "id" => "inkthemes_vimeo",
            "std" => "",
            "type" => "text");

		$options[] = array("name" => "Linkedin URL",
            "desc" => "Mention the URL of your Linkedin here.",
            "id" => "inkthemes_linkedin",
            "std" => "",
            "type" => "text");

//****=============================================================================****//
//****-------------This code is used for creating Bottom Footer Setting options-------------****//					
//****=============================================================================****//			
        $options[] = array("name" => "Footer Settings",
            "type" => "heading");
        $options[] = array("name" => "Footer Text",
            "desc" => "Write the text here that will be displayed on the footer i.e. at the bottom of the Website.",
            "id" => "inkthemes_footertext",
            "std" => "",
            "type" => "textarea");
        //------------------------------------------------------------------//
//-------------This code is used for creating SEO description-------//							
//------------------------------------------------------------------//						
        $options[] = array("name" => "SEO Options",
            "type" => "heading");
        $options[] = array("name" => "Meta Keywords (comma separated)",
            "desc" => "Meta keywords provide search engines with additional information about topics that appear on your site. This only applies to your home page. Keyword Limit Maximum 8",
            "id" => "inkthemes_keyword",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Meta Description",
            "desc" => "You should use meta descriptions to provide search engines with additional information about topics that appear on your site. This only applies to your home page.Optimal Length for Search Engines, Roughly 155 Characters",
            "id" => "inkthemes_description",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Meta Author Name",
            "desc" => "You should write the full name of the author here. This only applies to your home page.",
            "id" => "inkthemes_author",
            "std" => "",
            "type" => "textarea");

        inkthemes_update_option('of_template', $options);
        inkthemes_update_option('of_themename', $themename);
        inkthemes_update_option('of_shortname', $shortname);
    }

}
?>
