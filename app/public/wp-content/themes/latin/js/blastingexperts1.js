jQuery(document).ready( function($){
	//custom blastingexperts scripts

	/* init functions */
	revealPosts();
	
	/* variable decalarations */
	var carousel = '.blastingexperts-carousel-thumb';
	var last_scroll = 0;
	
	/* carousel functions */
	blastingexperts_get_bs_thumbs(carousel);

	$(carousel).on('slid.bs.carousel', function(){
		blastingexperts_get_bs_thumbs(carousel);
	});
	
	function blastingexperts_get_bs_thumbs( carousel ){

		var nextThumb = $('.carousel-item.active').find('.next-image-preview').data('image');
		var prevThumb = $('.carousel-item.active').find('.prev-image-preview').data('image');
		$(carousel).find('.carousel-control-next.right').find('.thumbnail-container').css({ 'background-image' : 'url('+nextThumb+')' });
		$(carousel).find('.carousel-control-prev.left').find('.thumbnail-container').css({ 'background-image' : 'url('+prevThumb+')' });
	}

	/* Ajax load post functions */
	$(document).on('click','.blastingexperts-load-more:not(.loading)', function(){
	
		var that = $(this);
		var page = $(this).data('page');
		var newPage = page+1;
		var ajaxurl = that.data('url');
		var prev = that.data('prev');
		var archive = that.data('archive');
		
		if( typeof prev === 'undefined' ){
			prev = 0;
		}
		
		if( typeof archive === 'undefined' ){
			archive = 0;
		}
		
		that.addClass('loading').find('.text').slideUp(320);
		that.find('.blastingexperts-icon').addClass('spin');
		
		$.ajax({
			
			url : ajaxurl,
			type : 'post',
			data : {
				
				page : page,
				prev : prev,
				archive : archive,
				action: 'blastingexperts_load_more'
				
			},
			error : function( response ){
				console.log(response);
			},
			success : function( response ){
				
				if( response == 0 ){
					
					$('.blastingexperts-posts-container').append( '<div class="text-center container-load-next"><h3>Haz llegado al final!</h3><p>No hay más posts para cargar.</p></div>' );
					that.slideUp(320);
					
				} else {
					
					setTimeout(function(){
				
						if( prev == 1 ){
							$('.blastingexperts-posts-container').prepend( response );
							newPage = page-1;
						} else {
							$('.blastingexperts-posts-container').append( response );
						}
						
						if( newPage == 1 ){
							
							that.slideUp(320);
							
						} else {
							
							that.data('page', newPage);
						
							that.removeClass('loading').find('.text').slideDown(320);
							that.find('.blastingexperts-icon').removeClass('spin');
							
						}
						
						revealPosts();
						
					}, 1000);
					
				}
				
				
			}
			
		});
		
	});

	
	/* helper functions */
	function revealPosts(){

		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();
		
		var posts = $('article:not(.reveal)');
		var i = 0;
		
		setInterval(function(){
			
			if( i >= posts.length ) return false;
			
			var el = posts[i];
			$(el).addClass('reveal').find('.blastingexperts-carousel-thumb').carousel();
			
			i++
			
		}, 200);
		
	}
	
	function isVisible( element ){
		
		var scroll_pos = $(window).scrollTop();
		var window_height = $(window).height();
		var el_top = $(element).offset().top;
		var el_height = $(element).height();
		var el_bottom = el_top + el_height;
		return ( ( el_bottom - el_height*0.25 > scroll_pos ) && ( el_top < ( scroll_pos+0.5*window_height ) ) );
		
	}	
	

/*
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
	 Contact form                    
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
*/

	/* contact form submission */
	$('#blastingexpertsContactForm').on('submit', function(e){

		e.preventDefault();

		$('.has-error').removeClass('has-error');
		$('.js-show-feedback').removeClass('js-show-feedback');

		var form = $(this),
				name = form.find('#name').val(),
				email = form.find('#email').val(),
				message = form.find('#message').val(),
				ajaxurl = form.data('url');

		if( name === '' ){
			$('#name').parent('.form-group').addClass('has-error');
			return;
		}

		if( email === '' ){
			$('#email').parent('.form-group').addClass('has-error');
			return;
		}

		if( message === '' ){
			$('#message').parent('.form-group').addClass('has-error');
			return;
		}

		form.find('input, button, textarea').attr('disabled','disabled');
		$('.js-form-submission').addClass('js-show-feedback');

		$.ajax({			
			url : ajaxurl,
			type : 'post',
			data : {				
				name : name,
				email : email,
				message : message,
				action: 'latin_save_user_contact_form'				
			},
			error : function( response ){
				$('.js-form-submission').removeClass('js-show-feedback');
				$('.js-form-error').addClass('js-show-feedback');
				form.find('input, button, textarea').removeAttr('disabled');
			},
			success : function( response ){
				if( response == 0 ){
					
					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-error').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled');
					},1500);

				} else {					
					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-success').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled').val('');
					},1500);
				}
			}
			
		});

	});
	

/*
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
	 Newsletter form                    
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
*/

	/* Newsletter form submission */
	$('#beNewsletterForm').on('submit', function(e){

		e.preventDefault();

		$('.has-error').removeClass('has-error');
		$('.js-show-feedback').removeClass('js-show-feedback');

		var form = $(this),
			email = form.find('#email').val(),
			ajaxurl = form.data('url');

		if( email === '' ){
			$('#email').parent('.form-group').addClass('has-error');
			return;
		}

		form.find('input, button').attr('disabled','disabled');
		$('.js-form-submission').addClass('js-show-feedback');

		$.ajax({
			
			url : ajaxurl,
			type : 'post',
			data : {
				
				email : email,
				action: 'be_save_user_newsletter_form'
				
			},
			error : function( response ){
				$('.js-form-submission').removeClass('js-show-feedback');
				$('.js-form-error').addClass('js-show-feedback');
				form.find('input, button').removeAttr('disabled');
			},
			success : function( response ){

				if( response == 0 ){
					
					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-error').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled');
					},1500);

				} else {
					
					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-success').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled').val('');
					},1500);

				}
			}
			
		});

	});



/*
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
	 Freelance form                    
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
*/

	/* freelance form submission */
	$('#beFreelanceForm').on('submit', function(e){
		
		e.preventDefault();
		
		$('.has-error').removeClass('has-error');
		$('.js-show-feedback').removeClass('js-show-feedback');
		
		var form = $(this),
		name = form.find('#nombre').val(),
		apellido = form.find('#apellido').val(),
		email = form.find('#email').val(),
		profesion = form.find('#profesion').val(),
		pais_residencia = form.find('#pais_residencia').val(),
		perfil_linkedin = form.find('#perfil_linkedin').val(),
				perfil_facebook = form.find('#perfil_facebook').val(),
				experiencia1 = form.find('#experiencia1').val(),
				experiencia2 = form.find('#experiencia2').val(),
				experiencia3 = form.find('#experiencia3').val(),
				message = form.find('#message').val(),
				ajaxurl = form.data('url');
				
		if( name === '' ){
			$('#nombre').parent('.form-group').addClass('has-error');
			return;
		}

		if( apellido === '' ){
			$('#apellido').parent('.form-group').addClass('has-error');
			return;
		}		
		
		if( email === '' ){
			$('#email').parent('.form-group').addClass('has-error');
			return;
		}

		if( profesion === '' ){
			$('#profesion').parent('.form-group').addClass('has-error');
			return;
		}
		
		if( pais_residencia === '' ){
			$('#pais_residencia').parent('.form-group').addClass('has-error');
			return;
		}

		if( experiencia1 === '' ){
			$('#experiencia1').parent('.form-group').addClass('has-error');
			return;
		}

		if( experiencia2 === '' ){
			$('#experiencia2').parent('.form-group').addClass('has-error');
			return;
		}

		if( experiencia3 === '' ){
			$('#experiencia3').parent('.form-group').addClass('has-error');
			return;
		}

		form.find('input, button, textarea').attr('disabled','disabled');
		$('.js-form-submission').addClass('js-show-feedback');

		$.ajax({
			
			url : ajaxurl,
			type : 'post',
			data : {
				
				name : name,
				apellido : apellido,				
				email : email,
				profesion : profesion,
				pais_residencia : pais_residencia,
				perfil_linkedin : perfil_linkedin,
				perfil_facebook : perfil_facebook,
				experiencia1 : experiencia1,
				experiencia2 : experiencia2,
				experiencia3 : experiencia3,				
				message : message,
				action: 'be_save_user_freelance_form'
				
			},
			error : function( response ){
				$('.js-form-submission').removeClass('js-show-feedback');
				$('.js-form-error').addClass('js-show-feedback');
				form.find('input, button, textarea').removeAttr('disabled');
			},
			success : function( response ){
				if( response == 0 ){
					
					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-error').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled');
					},1500);

				} else {
					
					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-success').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled').val('');
					},1500);

				}
			}
			
		});

	});


/*
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
	 Archive Portafolio              
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
*/

/* ----- ---- Portafolio flipped card ---- ----- */

// Flip card
$(".flip-card .flip-card-inner").click(function(evt) {
	// resolves issues in some cases. only allows this method to run for a click event on the element
	evt.stopImmediatePropagation();
	$(this).toggleClass("flipped");
  });

// Prevent flipped the button 'VER MAS' when click 
  $(".btn-card-portafolio").click(function(evt) {
	  
	evt.stopImmediatePropagation();

  });

	/* ----- ---- archive-portafolio - list vs grid view ---- ----- */

	function showList(e) {
		var $gridCont = $('.grid-container');
		e.preventDefault();
		$gridCont.hasClass('list-view') ? $gridCont.removeClass('list-view') : $gridCont.addClass('list-view');
	  }
	  function gridList(e) {
		var $gridCont = $('.grid-container')
		e.preventDefault();
		$gridCont.removeClass('list-view');
	  }
	  
	  $(document).on('click', '.btn-grid', gridList);
	  $(document).on('click', '.btn-list', showList);	

/*
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
	 Single Product                   
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
*/

/* ----- ---- Gallery Magic PopUp---- ----- */

$(document).ready(function() {
	$('.zoom-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});
});



  /*
  ======================================= 
  NAVBAR
  ======================================= 
  */

  //---------------------- STICKY --------------------

var navBar = $("#topNav");
var hdrHeight = $("header").height();
var latincorrosionNavIcon = document.querySelector('.latincorrosion-nav-icon');

$(window).scroll(function() {
  if( $(this).scrollTop() > hdrHeight + 50) {
    navBar.addClass("navScrolled");
	latincorrosionNavIcon.style.opacity = 1;
  } else {
    navBar.removeClass("navScrolled");
	latincorrosionNavIcon.style.opacity = 0;
  }
});













  /*
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
	 SIDEBAR                    
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
*/
	
/* sidebar functions */
$(document).on('click', '.js-toggleSidebar', function() {
	$( '.blastingexperts-sidebar' ).toggleClass( 'sidebar-closed' );
	// $( 'body' ).toggleClass( 'no-scroll' );
	// $( '.sidebar-overlay' ).fadeToggle( 320 );
});


/* ----- ---- portafolio-widget accordion---- ----- */
// var accordion = document.getElementsByClassName("portafolio-widget");
// var i;

// for (i = 0; i < accordion.length; i++) {
// 	accordion[i].addEventListener("click", function() {
// 	this.classList.toggle("active");
// 	var panel = this.nextElementSibling;
// 	if (panel.style.maxHeight) {
// 		panel.style.maxHeight = null;
// 	} else {
// 		panel.style.maxHeight = panel.scrollHeight + "px";
// 	} 
// 	});
// }

/* ----- ---- category-widget accordion---- ----- */
    var accordions = document.getElementsByClassName("category-widget");
    var i;
    var openAccordion = null;

    for (i = 0; i < accordions.length; i++) {
        accordions[i].addEventListener("click", function() {
            if (this.classList.contains("active")) {
                // Clicked accordion is already open, so close it
                this.classList.remove("active");
                this.nextElementSibling.style.maxHeight = null;
                openAccordion = null;
            } else {
                // Close currently open accordion, if any
                if (openAccordion) {
                    openAccordion.classList.remove("active");
                    openAccordion.nextElementSibling.style.maxHeight = null;
                }

                // Open clicked accordion
                this.classList.add("active");
                this.nextElementSibling.style.maxHeight = this.nextElementSibling.scrollHeight + "px";
                openAccordion = this;
            }
        });
    }

/*
======================================= 
DROPDOWN
======================================= 
*/

/*----------- Recordar quitar los comentarios al subir este archivo a las paginas LIVE -----------*/


/*----------- Menu Dropdown open on Hover -----------*/

// $('.dropdown').hover(function() { 
// 	$(this).addClass('show'); 
// 	$(this).find('.dropdown-menu').addClass('show');
// }, 	

// 	function() {
// 		$(this).removeClass('show'); 
// 		$(this).find('.dropdown-menu').removeClass('show');
// });



// $('.megamenu').hover(function() { 
// 	$(this).find('.dropdown-menu').addClass('show'); // muestra el megamenu on hover
// 	$(document).find('.megamenu-overlay').show(); // oscurece web al mostrar el megamenu on hover

// }, 	

// 	function() {
// 		$(this).find('.dropdown-menu').removeClass('show'); // oculta el megamenu on hover out
// 		$(document).find('.megamenu-overlay').hide(); // quita oscurecimiento web al quitar el megamenu on hover out
// });

$('.megamenu').hover(function() { 
  $(this).find('.dropdown-menu').addClass('show').removeClass('hidden'); // show the mega menu on hover
  $(document).find('.megamenu-overlay').show(); // dim the web when showing the mega menu on hover

}, 	

function() {
  $(this).find('.dropdown-menu').addClass('hidden').removeClass('show'); // hide the mega menu on hover out
  $(document).find('.megamenu-overlay').hide(); // remove dimming from the web when hiding the mega menu on hover out
});



// $('.dropdown').hover(function() { 
// 	$(this).addClass('show'); 
// 	$(this).find('.dropdown-menu').addClass('show');
// 	// $(document).find('.megamenu-overlay').addClass('megamenu-overlay-show');
// 	$(document).find('.megamenu-overlay').show();
	
// }, 	

// function() {
// 	$(this).removeClass('show'); 
// 	$(this).find('.dropdown-menu').removeClass('show');
// 	// $(document).find('.megamenu-overlay').removeClass('megamenu-overlay-show');
// 	$(document).find('.megamenu-overlay').hide();
// });


	

// function() {
// 	// $(this).removeClass('show'); 
// 	// $(this).find('.dropdown-menu').removeClass('show');
// 	// $(document).find('.megamenu-overlay').removeClass('megamenu-overlay-show');
// 	$(document).find('.megamenu-overlay').hide();
// });


// $(document).on('click', '.megamenu', function() {
// $(document).on('hover', '.megamenu', function() {
// 	$(this).toggleClass( 'show' );
// 	$( 'body' ).toggleClass( 'no-scroll' );
// });

// let link = document.querySelector(".megamenu");
//   link.addEventListener("click", event => {
//     console.log("Nope.");
//     event.preventDefault();
// 	this.blur();
// 	window.focus();
//   });

// let link = document.querySelector(".megamenu");
//   link.addEventListener("click", event => {
//     console.log("Nope.");
// 		// $(document).find('.megamenu-overlay').show();
// 		// $(document).toggleClass( '.megamenu-overlay' );
// 		$(document).find('.megamenu-overlay').fadeToggle();
	
// 	});


// $('.megamenu').hover(function() { 
// 		$(this).addClass('show'); 
// 		$(this).find('.dropdown-menu').addClass('show');
// 		    	$( '.megamenu-overlay' ).fadeToggle(0);
// 	}, 	

// 	function() {
// 		$(this).removeClass('show'); 
// 		$(this).find('.dropdown-menu').removeClass('show');
// 		$( '.megamenu-overlay' ).fadeToggle(0);
// 	}

// );

// $('.megamenu').clic(function() { 
// 		$(this).addClass('show'); 
// 		$(this).find('.dropdown-menu').addClass('show');
// 	}, 	

// 	function() {
// 		$(this).removeClass('show'); 
// 		$(this).find('.dropdown-menu').removeClass('show');
// 	}
// );

// $(document).on('click', '.megamenu', function() {
// $(document).on('hover', '.megamenu', function() {
// 	$(this).toggleClass( 'show' );
// 	$( 'body' ).toggleClass( 'no-scroll' );
// });

// $( "megamenu" )
//   .mouseover(function() {
// 			$(this).addClass('show'); 

//   })
//   .mouseout(function() {
//     $( this ).find( "span" ).text( "mouse out " );
//   });



/*
// ======================================= 
MEGAMENU
======================================= 
*/

/* megamenu fade background*/
	// $('.dropdown').hover(function() { 
    // 	$( '.megamenu-overlay' ).fadeToggle(0);
    // });

	// $( '.megamenu-overlay' ).show();


	// $('.megamenu').hover(function() { 
    // 	$( '.megamenu-overlay' ).show();
    // });


/*----------- PREVENT DEFAULT MEGAMENU -----------*/
// function megamenuTaxonomyPrevent(e) {
// 	e.stopPropagation();
//   }  
//   $(document).on('click', '.menu-item-type-taxonomy', megamenuTaxonomyPrevent);

//   function megamenuTypePostPrevent(e) {
// 	e.stopPropagation();
//   }  
//   $(document).on('click', '.menu-item-type-post_type', megamenuTypePostPrevent);

/*
// ======================================= 
SCROLL
======================================= 
*/

	/* Main Menu scroll function */
	$(window).scroll( function(){		
		var scroll = $(window).scrollTop();		
		if( Math.abs( scroll - last_scroll ) > $(window).height()*0.1 ) {
			last_scroll = scroll;			
			$('.page-limit').each(function( index ){				
				if( isVisible( $(this) ) ){					
					history.replaceState( null, null, $(this).attr("data-page") );
					return(false);					
				}				
			});			
		}		
	});



	//Button Up Scroll
	const scrollToTopButton = document.getElementById('scroll-to-top');

	$(window).scroll(function(){		
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			scrollToTopButton.style.display = 'block';
		} else {
			scrollToTopButton.style.display = 'none';
		}
	});

	scrollToTopButton.addEventListener('click', function() {
		const scrollToTop = window.setInterval(function() {
			const pos = window.pageYOffset;
			if (pos > 0) {
			window.scrollTo(0, pos - 20); // how far to scroll on each step
			} else {
			window.clearInterval(scrollToTop);
			}
		}, 4); // how often to scroll (in ms)		
	});










  















  /*
  ======================================= 
  Load defered videos
  ======================================= 
  */
//   $(window).load(function(e) {
// 	$('[data-src-defer]').each(function(index, element) {
// 		$(element).attr('src', $(element).attr('data-src-defer'));
// 	});
// });











}); /* ----- ---- jquery ---- ----- */







/*
======================================= 
Vtiger
======================================= 
*/

// Vtiger Form Script
// window.addEventListener("load",function(){!function(e){var t={},n=document.createElement("a");n.href=e;for(var o=n.search.substring(1).split("&"),a=0;a<o.length;a++){var r=o[a].split("=");r[0]&&(t[r[0]]=decodeURIComponent(r[1]),localStorage.setItem(r[0],r[1]))}}(window.location.href) gtag('event', 'conversion', {'send_to': 'AW-10897693065/_hGmCPn2_LwDEImztswo'}); });




window.addEventListener("load",function(){!function(e){var t={},n=document.createElement("a");n.href=e;for(var o=n.search.substring(1).split("&"),a=0;a<o.length;a++){var r=o[a].split("=");r[0]&&(t[r[0]]=decodeURIComponent(r[1]),localStorage.setItem(r[0],r[1]))}}(window.location.href)});






// window.addEventListener("load", function() { var N=navigator.appName, ua=navigator.userAgent, tem;var M=ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);if(M && (tem= ua.match(/version\/([\.\d]+)/i))!= null) M[2]= tem[1];M=M? [M[1], M[2]]: [N, navigator.appVersion, "-?"];var browserName = M[0];var form = document.getElementById("__vtigerWebForm_3"), inputs = form.elements; form.onsubmit = function() { document.getElementById("vtigerFormSubmitBtn_3").disabled=true;var required = [], att, val; var startDate;var endDate;var endDate1;for (var i = 0; i < inputs.length; i++) { att = inputs[i].getAttribute("required"); val = inputs[i].value; type = inputs[i].type; if(inputs[i].name == "birthday"){birthdayDate = new Date(inputs[i].value);todayDate = new Date();todayDate.setHours(0,0,0,0);birthdayDate.setHours(0,0,0,0);if(birthdayDate >= todayDate){alert("Date of Birth should be less than Today's Date.");document.getElementById("vtigerFormSubmitBtn_3").disabled=false;return false;}}if(inputs[i].name=="support_start_date" || inputs[i].name=="startdate"){startDate = inputs[i].value;}if(inputs[i].name=="support_end_date" || inputs[i].name=="targetenddate" || inputs[i].name=="enddate"){endDate = inputs[i].value;}if(inputs[i].name=="actualenddate"){endDate1 = inputs[i].value;}if(type == "email") {if(val != "") {var elemLabel = inputs[i].getAttribute("data-label");var emailFilter = /^[_/a-zA-Z0-9]+([!"#$%&()*+,./:;<=>?\^_`{|}~-]?[a-zA-Z0-9/_/-])*@[a-zA-Z0-9]+([\_\-\.]?[a-zA-Z0-9]+)*\.([\-\_]?[a-zA-Z0-9])+(\.?[a-zA-Z0-9]+)?$/;var illegalChars= /[\(\)\<\>\,\;\:\"\[\]]/ ;if (!emailFilter.test(val)) {alert("For "+ elemLabel +" field please enter valid email address"); document.getElementById("vtigerFormSubmitBtn_3").disabled=false;return false;} else if (val.match(illegalChars)) {alert(elemLabel +" field contains illegal characters"); document.getElementById("vtigerFormSubmitBtn_3").disabled=false; return false;}}}if(startDate){if(typeof startDate !== "undefined") {if(endDate){if(typeof endDate !== "undefined") {startDate = new Date(startDate);endDate = new Date(endDate);if(endDate < startDate){alert("End Date should be greater than or equal to Start Date");document.getElementById("vtigerFormSubmitBtn_3").disabled = false;return false;}}}if(endDate1){if(typeof endDate1 !== "undefined") {startDate = new Date(startDate);endDate1 = new Date(endDate1);if(endDate1 < startDate){alert("End Date should be greater than or equal to Start Date");document.getElementById("vtigerFormSubmitBtn_3").disabled = false;return false;}}}}}if (att != null) { if (val.replace(/^\s+|\s+$/g, "") == "") { required.push(inputs[i].getAttribute("label")); } } } if (required.length > 0) { alert("The following fields are required: " + required.join()); document.getElementById("vtigerFormSubmitBtn_3").disabled=false;return false; } var numberTypeInputs = document.querySelectorAll("input[type=number]");for (var i = 0; i < numberTypeInputs.length; i++) { val = numberTypeInputs[i].value;var elemLabel = numberTypeInputs[i].getAttribute("label");var elemDataType = numberTypeInputs[i].getAttribute("datatype");if(val != "") {if(elemDataType == "double") {var numRegex = /^[+-]?\d+(\.\d+)?$/;}else{var numRegex = /^[+-]?\d+$/;}if (!numRegex.test(val)) {alert("For "+ elemLabel +" field please enter valid number"); document.getElementById("vtigerFormSubmitBtn_3").disabled=false; return false;}}}var dateTypeInputs = document.querySelectorAll("input[type=date]");for (var i = 0; i < dateTypeInputs.length; i++) {dateVal = dateTypeInputs[i].value;var elemLabel = dateTypeInputs[i].getAttribute("label");if(dateVal != "") {var dateRegex = /^[1-9][0-9]{3}-(0[1-9]|1[0-2]|[1-9]{1})-(0[1-9]|[1-2][0-9]|3[0-1]|[1-9]{1})$/;if(!dateRegex.test(dateVal)) {alert("For "+ elemLabel +" field please enter valid date in required format"); document.getElementById("vtigerFormSubmitBtn_3").disabled=false; return false;}}}var inputElems = document.getElementsByTagName("input");var totalFileSize = 0;for(var i = 0; i < inputElems.length; i++) {if(inputElems[i].type.toLowerCase() === "file") {var file = inputElems[i].files[0];if(typeof file !== "undefined") {var totalFileSize = totalFileSize + file.size;}}}if(totalFileSize > 52428800) {alert("Maximum allowed file size including all files is 50MB.");document.getElementById("vtigerFormSubmitBtn_3").disabled=false;return false;}var inputElem = document.querySelectorAll("input[type=file]");var fileSize = 0;for(var i = 0; i < inputElem.length; i++) {if(inputElem[i].type.toLowerCase() ===  "file") {if(inputElem[i].hasAttribute("selectedTypeImage")) {var imageFile = inputElem[i].files[0];var fileSize = imageFile.size;}}if(fileSize > 5242880) {alert("Maximum allowed image size is 5MB.");document.getElementById("vtigerFormSubmitBtn_3").disabled=false;return false;}}document.getElementById("vtigerFormSubmitBtn_3").disabled = true;var recaptchaResponse = form.getElementsByClassName("g-recaptcha-response")[0].value;if (recaptchaResponse) {var currentUrl = window.location.href;var urlHash = window.location.hash;currentUrl = currentUrl.replace(urlHash, "");currentUrl = currentUrl.replace("#", "");currentUrl = currentUrl.split("?");currentUrl = currentUrl[0];var currentUrlTag = document.createElement("input");currentUrlTag.type = "hidden";currentUrlTag.name = "current_url";currentUrlTag.value = currentUrl;document.getElementById("__vtigerWebForm_3").appendChild(currentUrlTag);return true;} else {alert("Captcha not verified. Please verify captcha.");document.getElementById("vtigerFormSubmitBtn_3").disabled = false;return false;}};var getParams=function(a){var e={},t=document.createElement('a');t.href=a;for(var r=t.search.substring(1).split('&'),l=0;l<r.length;l++){var o=r[l].split('=');if(o[0]){var c=decodeURIComponent(o[1]);c&&(e[o[0]]=c,c&&localStorage.setItem(o[0],c))}}return e};document.querySelectorAll('[data-type=storage]').forEach(a=>{if(a){var e=a.getAttribute('data-param'),t=localStorage.getItem(e);t&&(a.value=t)}});var allParameters=getParams(window.location.href);Object.keys(allParameters).length>0&&document.querySelectorAll('[data-type=url]').forEach(a=>{if(a){var e=a.getAttribute('data-param');allParameters[e]&&(a.value=allParameters[e])}})});















//Hidden Fields
window.addEventListener("load",function(){!function(e){var t={},n=document.createElement("a");n.href=e;for(var o=n.search.substring(1).split("&"),a=0;a<o.length;a++){var r=o[a].split("=");r[0]&&(t[r[0]]=decodeURIComponent(r[1]),localStorage.setItem(r[0],r[1]))}}(window.location.href)})
		


















