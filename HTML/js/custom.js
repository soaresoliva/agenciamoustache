var home = { 

	init: function(){ 
		this.animacao();
		this.carousel();
		this.mobileMenu();
		this.menuOnipage();
		this.formulario();
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
			$(".main-menu").removeClass('show');
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

	    	$(".main-menu").removeClass('show');
	        return false;
	    });
	},

	formulario: function(){ 
		$.mask.definitions['~'] = "[+-]";
		$(".date-mask").mask("99/99/9999", {placeholder:"dd/mm/yyyy"});
		$(".fone-mask").mask("(99) 9999-9999?");
		$(".cep-mask").mask("99999-999", { completed: function() {  home.getCep(); } });
	},

	getCep: function(){

		var _cep = $(".cep-mask").val().replace("-", "");

		$.ajax({
		  url: 'https://viacep.com.br/ws/' + _cep + '/json/',
		  dataType: 'jsonp',
		  crossDomain: true,
		  contentType: "application/json",
		  
		}).done(function(data){

			if(data.logradouro.length > 0)
			{
				$("input[name=Endereco]").val(data.logradouro);
			}

			if(data.bairro.length > 0)
			{
				$("input[name=Bairro]").val(data.bairro);
			}

			if(data.localidade.length > 0)
			{
				$("input[name=Cidade]").val(data.localidade);
			}

			if(data.uf.length > 0)
			{
				$("input[name=Estado]").val(data.uf);
			}

	    }).fail(function(jqXHR, textStatus, msg){
	       alert("cep não encontrado");
	    }); 
	}
}

$(document).ready(function(){ 
	home.init();
});


