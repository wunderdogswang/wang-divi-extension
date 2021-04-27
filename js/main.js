( function( $ ) {
 
$( document ).on( 'mousewheel DOMMouseScroll', function( event ) {
 
if ( ( $( '.et_pb_side_nav' ).length === 0 ) || $( 'html, body' ).is( ':animated' ) ) return;
 
event.preventDefault();
 
var direction = event.originalEvent.wheelDelta || -event.originalEvent.detail;
var $position = $( '.et_pb_side_nav' ).find( '.active' );
var $target;
 
if( direction < 0 ) {
$target = $( $position ).parent().next();
} else {
$target = $( $position ).parent().prev();
}
if ( $( $target.length ) !== 0 ) {
$( $target ).children( 'a' ).trigger( "click" );
}
} );
} )( jQuery );


        function ismatch(str){
            var ret = null;
            var tab = ['data-aos_', 'data-aos-delay_', 'data-aos-duration_', 'data-aos-easing_'];
            Object.values(tab).forEach( function (value) {
                if (String(str).match(value)){
                    ret = str.split('_');
                    return false;
                }
            });
            return ret;
        }
        jQuery(document).ready(function ($) {
            $('.text-anim').each(function () {
                var $this = $(this);
                var tab = $this.attr('class').split(' ');
                var keep;
                Object.values(tab).forEach(function (item) {
                    var ello = ismatch(item) 
                    if (ello !== null)
                        $this.attr(ello[0], ello[1]);
                    });
                    
                });
                AOS.init();
            });                     

jQuery(document).ready(function($){
	$('.first-logos-flex').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 1000,
		arrows: true,
		dots: false,
		loop:true,
		pauseOnHover: true,
		infinite: true,
		centerMode: true,
		prevArrow:"<img class='first-logos prev' src='http://quantum.wunderdogs.xyz/wp-content/uploads/2021/04/arrow.svg'>",
		nextArrow:"<img class='first-logos next' src='http://quantum.wunderdogs.xyz/wp-content/uploads/2021/04/arrow.svg'>",
		centerPadding:'1vw',
		responsive: [
 	{
  		breakpoint: 1008,
  		settings: {
  		slidesToShow: 2,
  		slidesToScroll: 1
  			}
		},
  	{
		breakpoint: 767,
		settings: {
		slidesToShow: 1
			}
		}]
	});
});
	
jQuery(document).ready(function($){
   $('.carousel-content').slick({
    });    
  });



jQuery(document).ready(function($){
	$('.business-slides').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		arrows: true,
		dots: false,
		loop:true,
		pauseOnHover: true,
		infinite: true,
		centerMode: true,
		prevArrow:"<img class='business-slide prev' src='http://quantum.wunderdogs.xyz/wp-content/uploads/2021/04/arrow.svg'>",
		nextArrow:"<img class='business-slide next' src='http://quantum.wunderdogs.xyz/wp-content/uploads/2021/04/arrow.svg'>",
		centerPadding:'0px',
		responsive: [
  	{
 		 breakpoint: 1008,
  		settings: {
  		slidesToShow: 1,
  		slidesToScroll: 1
  	}
	},
  {
		breakpoint: 767,
		settings: {
		slidesToShow: 1
			}
		}]
	});
});



const images = document.querySelectorAll(".img-container");

const removeOverlay = overlay => {
	let tl = gsap.timeline();

	tl.to(overlay, {
		duration: 1.4,
		ease: "Power2.easeInOut",
		width: "0%"
	});

	return tl;
};

const scaleInImage = image => {
	let tl = gsap.timeline();

	tl.from(image, {
		duration: 1.4,
		scale: 1.4,
		ease: "Power2.easeInOut"
	});

	return tl;
};

images.forEach(image => {
  
	gsap.set(image, {
		visibility: "visible"
	});
  
	const overlay = image.querySelector('.img-overlay');
	const img = image.querySelector("img");

	const masterTL = gsap.timeline({ paused: true });
	masterTL
    .add(removeOverlay(overlay))
    .add(scaleInImage(img), "-=1.4");
  
  
  let options = {
    threshold: 0
  }

	const io = new IntersectionObserver((entries, options) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				masterTL.play();
			} else {
        masterTL.progress(0).pause()
      }
		});
	}, options);

	io.observe(image);
});


// our team & portfolio code
function getPortfolioPopupContent(postId){
	var nonce = jQuery('.portfolio-card-row').attr('data-portfolio-nonce');
	var posts = jQuery('.portfolio-card-row').attr('data-posts');

	jQuery('.ajax-spinner').removeClass('hide');
	jQuery.ajax({
		type: 'post',
		dataType: 'json',
		url: et_pb_custom.ajaxurl,
		data: {
			action: 'get_portfolio',
			nonce: nonce,
			postId: postId,
			posts: posts
		},
		success: function (response) {
			if( jQuery('.popup-portfolio').length === 0 ){
				jQuery('body').append('<div class="popup-portfolio"></div>')

				jQuery('.popup-portfolio').click(function(){
					jQuery('.popup-portfolio').remove();
				})
			}

			jQuery('.popup-portfolio').html(response.html);

			jQuery('.popup-portfolio-row').click(function(event){
				event.stopPropagation();
			})

			jQuery('.popup-portfolio-close').click(function(){
				jQuery('.popup-portfolio').remove();
			})

			jQuery('.popup-team-paginavigation--back, .popup-team-paginavigations--next').click(function(){
				var postId = jQuery(this).attr('data-post-id');

				jQuery('.popup-portfolio').remove();
				getPortfolioPopupContent(postId);
			});

			jQuery('.ajax-spinner').addClass('hide');
		}
	});
}

function getTeamPopupContent(postId){
	var nonce = jQuery('.team-card-row-wrapper').attr('data-team-nonce');
	var posts = jQuery('.team-card-row').attr('data-posts');

	jQuery('.ajax-spinner').removeClass('hide');
	jQuery.ajax({
		type: 'post',
		dataType: 'json',
		url: et_pb_custom.ajaxurl,
		data: {
			action: 'get_team',
			nonce: nonce,
			postId: postId,
			posts: posts,
		},
		success: function (response) {
			if( jQuery('.popup-team').length === 0 ){
				jQuery('body').append('<div class="popup-team"></div>')

				jQuery('.popup-team').click(function(){
					jQuery('.popup-team').remove();
				})
			}

			jQuery('.popup-team').html(response.html);

			jQuery('.popup-team-row').click(function(event){
				event.stopPropagation();
			})

			jQuery('.popup-team-close').click(function(){
				jQuery('.popup-team').remove();
			})

			jQuery('.popup-team-paginavigation--back, .popup-team-paginavigations--next').click(function(){
				var postId = jQuery(this).attr('data-post-id');

				jQuery('.popup-team').remove();
				getTeamPopupContent(postId);
			});

			jQuery('.ajax-spinner').addClass('hide');
		}
	});
}

function addTeamCardClickEvent(){
	jQuery('.team-card').click(function(){
		var postId = jQuery(this).attr('data-post-id');

		getTeamPopupContent(postId);
	})
}

function teamCategorySortFunc(termId, sortType){
	var nonce = jQuery('.our-team-category-row').attr('data-get-team-list-nonce');
	jQuery('.our-team-category-row').attr('data-term-id', termId);

	jQuery('.ajax-spinner').removeClass('hide');
		
	jQuery.ajax({
		type: 'post',
		dataType: 'json',
		url: et_pb_custom.ajaxurl,
		data: {
			action: 'get_team_list',
			nonce: nonce,
			termId: termId,
			sortType: sortType
		},
		success: function (response) {
			jQuery('.team-card-row-wrapper').html(response.html);
			addTeamCardClickEvent();
			jQuery('.ajax-spinner').addClass('hide');
		}
	});
}

jQuery(document).ready(function(){
	addTeamCardClickEvent();

	jQuery('.team-category').click(function(){
		jQuery('.team-category').removeClass('active');
		jQuery(this).addClass('active');

		var termId = jQuery(this).attr('data-term-id');

		teamCategorySortFunc(termId, '');
	})

	jQuery('.our-team-sort').change(function(){
		var sortType = jQuery(this).val();
		var termId = jQuery('.our-team-category-row').attr('data-term-id');

		teamCategorySortFunc(termId, sortType);
	})

	jQuery('.portfolio-category').click(function(){
		jQuery('.portfolio-category').removeClass('active');
		jQuery(this).addClass('active');

		var termId = jQuery(this).attr('data-term-id');

		if( termId === '0' ){
			jQuery('.portfolio-card-col').removeClass('hide');
		} else {
			jQuery('.portfolio-card-col').addClass('hide');
			jQuery('.portfolio-card-col-term-' + termId).removeClass('hide');
		}

		var postIdStr = '';

		jQuery('.portfolio-card-col').not('.hide').each(function(i, elem){
			var postId = jQuery('.portfolio-card', elem).attr('data-post-id');
			postIdStr += postId + ',';
		})

		jQuery('.portfolio-card-row').attr('data-posts', postIdStr);
	})

	jQuery('.portfolio-card').click(function(){
		var postId = jQuery(this).attr('data-post-id');
		
		getPortfolioPopupContent(postId);
	})
});