var home = { 

	init: function(){ 
		this.animacao();
		this.carousel();
		this.mobileMenu();
		this.menuOnipage();
	},

	animacao: function(){ 
		AOS.init();
	},

	carousel: function(){ 
		 var _owl = $('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:20,
		    nav:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:2
		        },
		        1000:{
		            items:3
		        }
		    }
		});
	},

	mobileMenu: function(){ 
		$(".close-menu a").click(function(){ 

			$(".main-menu").hide();
			return false;
		});
	},

	menuOnipage: function(){ 

		$('.nav-main').onePageNav({
	      currentClass: 'current-menu-item'
	    });

	    $(".nav-main a").click(function(){ 
	    	var $anchor = $(this);

	    	 $('html, body').stop().animate({
	            scrollTop: $($anchor.attr('href')).offset().top
	        }, 1500);

	        return false;
	    });

	   
	}
}

$(document).ready(function(){ 
	home.init();
});
