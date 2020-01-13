var home = { 

	init: function(){ 
		this.animacao();
		this.carousel();
		this.mobileMenu();
		this.menuOnipage();
		this.formulario();
		this.Buscar();
	},

	animacao: function(){ 
		AOS.init();
	},

	carousel: function(){ 

		var itens = Math.ceil($(".item").length / 3);

		var _dotsHtml = "";

		for(var i = 0; i < itens; i++)
		{
			if(i == 0)
			{
				_dotsHtml += '<span class="active"></span>';
			}
			else
			{
				_dotsHtml += '<span></span>';
			}
		}

		$("#dotsCarousel").html(_dotsHtml);

		 var _owl = $('.owl-carousel').owlCarousel({
		    loop:true,
		    dots: false,
		    margin:18,
		    nav:false,
		    onChanged: home.owlCallback,
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

		$('.nextSlider').click(function() {
		    _owl.trigger('next.owl.carousel');
		    return false;
		});

		$('.prevSlider').click(function() {
		    _owl.trigger('prev.owl.carousel');
		    return false;
		});

		$("#dotsCarousel span").on("click" , function(){ 
			var _index = $(this).index() * 3;
			 _owl.trigger('to.owl.carousel', _index);
			return false;
		});
	},

	owlCallback: function(event)
	{
		var _index = event.item.index;
		var _pageSize = event.page.size;
		var _pageActive = Math.floor(_index  /  _pageSize );

		if(_pageActive > 0)
		{
			_pageActive = _pageActive - 1;
		}

		$(".dots span:eq(" + _pageActive + ")").addClass("active").siblings().removeClass("active");
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
	},

	Buscar: function(){ 
		$(".input-buscar").keypress(function(){ 
			var _value = $(this).val();
			if(_value != "")
			{
				var _url = $(this).data('url');
				$(".result-search ").show();

				$.get( _url, { s: _value }, function( data ) {
				  $( ".result-search .result-search-content" ).html( data );

				  $(".close-search").on("click", function(){ 
				  		$(".input-buscar").val('');
						$(".result-search ").hide();
						$( ".result-search .result-search-content" ).html('');
					});
				});
			}
			else{
				$(".result-search ").hide();
				$( ".result-search .result-search-content" ).html('');
			}
			
		});


		$(".input-buscar").blur(function(){ 
			$(this).val('');
			$(".result-search ").hide();
			$( ".result-search .result-search-content" ).html('');
		});
	}
}

$(document).ready(function(){ 
	home.init();
});


