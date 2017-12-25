<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    //
    public function dashboard(){
    	return view('manage.dashboard');
    }

    public function index(){
    	return redirect()->route('manage.dashboard');
    }

    public function managefront(){
    	$carousel = self::getCurrentCarouselSpecs();
    	$p = self::getPrivacyPolicy();
    	$tos = self::getTermsOfUse();
    	return view('manage.front')->withCurrentCarousel($carousel)->withPrivacy($p)->withTos($tos);
    }

    static function getCurrentCarouselSpecs(){
    	return self::$carousel;
    }

    static function getPrivacyPolicy(){
    	return self::$privacy_policy;
    }

    static function getTermsOfUse(){
    	return self::$tos;
    }

    static function setCurrentCarouselSpecs(){

    }

    static $carousel = [
    	[
    		"img_src" => "images/carousel/red-bg.jpg",
    		"img_alt" => "First Slide",
    		"heading" => "Hey there.",
    		"text_body" => "Hello i'm David Iloba, a graphic designer and photographer.Welcome to my homepage, while you're around, please feel free to browse the images and share my links to your friends.",
    		"link_text" => "Contact Me",
    		"link_ref" => "#", 
    		"index" => "1"
    	],
    	[
    		"img_src" => "images/carousel/drone-bg.jpg",
    		"img_alt" => "Second Slide",
    		"heading" => "Another example headline.",
    		"text_body" => "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.",
    		"link_text" => "Learn more",
    		"link_ref" => "#",
    		"index" => "2"
    	],
    	[
    		"img_src" => "images/carousel/girl-bg.jpg",
    		"img_alt" => "Third Slide",
    		"heading" => "One more for good measure.",
    		"text_body" => "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.",
    		"link_text" => "Browse Gallery",
    		"link_ref" => "#",
    		"index" => "3"
    	]
    ];

    static $privacy_policy = "Privacy Policy text";
    static $tos = "terms of use";
}
