/**
* Author: LimpidThemes
* Version: 1.0
* Description: Javascript file for the Pathshala Template
* Date: 28-04-2017
**/

/**********************************************************
		BEGIN: PARENT TESTIMONIAL && TEACHER
**********************************************************/
jQuery(document).ready(function($){
	
	"use strict";
	
	if(jQuery().owlCarousel){
		//Parent testimonial
		jQuery("#parentTestimonial").owlCarousel({
			loop:true,
			margin:10,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true,
					loop: true
				},
				991:{
					items:1,
					nav:true,
					loop: true
				},
				1170:{
					items:2,
					nav:true,
					loop:true
				}
			}		
		});
		
		//Teacher 
		jQuery("#ourTeacher").owlCarousel({
			loop:true,
			margin:10,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true,
					loop: true
				},
				991:{
					items:2,
					nav:true,
					loop: true
				},
				1170:{
					items:3,
					nav:true,
					loop:true
				}
			}		
		});
	}
	//Datepicker
	jQuery("#studentDOB").datepicker();
	jQuery("#dptDate").datepicker();
	
	//accordion
	jQuery( "#pathshalaAccordion" ).accordion({
		collapsible:true,
		icons: { "header": "fa fa-plus", "activeHeader": "fa fa-minus" },
		heightStyle: "content"
	});
});
