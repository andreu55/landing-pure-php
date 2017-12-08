<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'Andreu García Martínez')</title>
	<meta name="description" content="Decorative &amp; interactive isometric &amp; 3D grids." />
	<meta name="keywords" content="isometric, grid, images, masonry, perspective" />

	<!-- Global Site Tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107688108-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-107688108-1');
	</script>

	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" integrity="sha256-HxaKz5E/eBbvhGMNwhWRPrAR9i/lG1JeT4mD6hCQ7s4=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.5/jquery.fullpage.min.css" integrity="sha256-MWBJX/7o3UIX5sMN/izdthod08WoIcWN0HOP7/X8+48=" crossorigin="anonymous" /> --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}" />

	{{-- <script src="{{ asset('js/modernizr.custom.js') }}"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha256-0rguYS0qgS6L4qVzANq4kjxPLtvnp5nn2nB5G1lWRv4=" crossorigin="anonymous"></script>
</head>
<body class="demo-2">

  {{-- @include('layouts.header') --}}

  @yield('content')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.3/imagesloaded.pkgd.min.js" integrity="sha256-97PclCl81H1LIZVHfv8azWgapzhRWQBhtYsy/AWkoAc=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.0/masonry.pkgd.min.js" integrity="sha256-YFADoQJIYFj+isdXssMGUrmsVNbVDfN5m8jPgVN+9m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dynamics.js/1.1.5/dynamics.min.js" integrity="sha256-KJT8Gf8olUvzOOOUg4gWhGDrAMEeligP2FzCI2WsBY0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/classie/1.0.1/classie.min.js" integrity="sha256-6O5DljdGA6AiaEVC/Zn8pNLNbQGparYTI9091fGX64k=" crossorigin="anonymous"></script>
	<script src="{{ asset('js/main.js') }}"></script>

	<script>

	(function() {
		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

		// new IsoGrid(document.querySelector('.isolayer--deco1'), {
		// 	transform : 'translateX(33vw) translateY(-340px) rotateX(45deg) rotateZ(45deg)',
		// 	stackItemsAnimation : {
		// 		properties : function(pos) {
		// 			return {
		// 				translateZ: (pos+1) * 30,
		// 				rotateZ: getRandomInt(-4, 4)
		// 			};
		// 		},
		// 		options : function(pos, itemstotal) {
		// 			return {
		// 				type: dynamics.bezier,
		// 				duration: 500,
		// 				points: [{"x":0,"y":0,"cp":[{"x":0.2,"y":1}]},{"x":1,"y":1,"cp":[{"x":0.3,"y":1}]}],
		// 				delay: (itemstotal-pos-1)*40
		// 			};
		// 		}
		// 	}
		// });
		new IsoGrid(document.querySelector('.isolayer--deco4'), {
			perspective: 3000,
			transform : 'translate3d(-200px,-200px,0) scale3d(0.8,0.8,1) rotateY(45deg) rotateZ(-10deg)',
			stackItemsAnimation : {
				properties : function(pos) {
					return {
						rotateX: (pos+1) * -2,
						translateZ: (pos+1) * 15,
						rotateZ: getRandomInt(-5, 5)
					};
				},
				options : function(pos, itemstotal) {
					return {
						// type: dynamics.spring,
						type: dynamics.bezier,
						duration: 450,
						points: [{"x":0,"y":0,"cp":[{"x":0.2,"y":1}]},{"x":1,"y":1,"cp":[{"x":0.3,"y":1}]}],
						delay: (itemstotal-pos-1)*30
					};
				}
			},
			onGridLoaded : function() {
				classie.add(document.body, 'grid-loaded');
			}
		});
	})();

	</script>

	{{-- Necesitamos jquery para lo que viene! --}}
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script>

	var $trigger = $('.modal-open');
	var $close = $('.modal-close');
	var $modal = $('.modal-box');

	$(window).on('resize', function() {
		var top = $trigger.offset().top + $trigger.outerHeight();
		var left = $trigger.offset().left;
		var width = $trigger.outerWidth();
		$trigger.attr({
			'data-top': top,
			'data-left': left,
			'data-width': width
		});
		$modal.css({
			top: top,
			left: left
		});
	}).trigger('resize');

	$trigger.on('click', function() {

		$('#modal-title').html($(this).data('title'));
		$('#modal-content').html($(this).data('content'));
		$('#modal-img').attr('src', $(this).attr('src'));
		$('.modal-url').attr('href', $(this).data('socialurl'));

		$modal.css({
			top: 0,
			left: 0,
			width: '100%',
			height: '100%'
		}).addClass('is-open');
	});

	$close.on('click', function() {
		var top = $trigger.offset().top + $trigger.outerHeight();
		var left = $trigger.offset().left;
		$modal.css({
			top: top,
			left: left,
			width: 0,
			height: '2px'
		}).removeClass('is-open');
	});

	// Si pulsan escape, se cierra el modal
	$(document).keyup(function(e) {
  	if (e.keyCode === 27) $close.trigger('click');
	});

	$("#send_button").click(function(){

		$("#send_button").html('<i class="fa fa-refresh fa-spin fa-fw"></i>');

		$.post("send.php",
		{
			email: $('#email').val(),
			message: $('#message').val()
		},
		function(data, status){
			if(status == 'success') {

				console.log(data);

				$("#send_button").html('Enviado!');
			}
		});
	});

	var colors = new Array(
		[67, 123, 154],
		[205, 226, 237],
		[203, 229, 236],
		[209, 215, 239]
		// [255, 244, 219],
		);

		var step = 0;
		//color table indices for:
		// current color left
		// next color left
		// current color right
		// next color right
		var colorIndices = [0,1,2,3];

		//transition speed
		var gradientSpeed = 0.002;

		function updateGradient()
		{

		if ( $===undefined ) return;

		var c0_0 = colors[colorIndices[0]];
		var c0_1 = colors[colorIndices[1]];
		var c1_0 = colors[colorIndices[2]];
		var c1_1 = colors[colorIndices[3]];

		var istep = 1 - step;
		var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
		var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
		var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
		var color1 = "rgb("+r1+","+g1+","+b1+")";

		var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
		var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
		var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
		var color2 = "rgb("+r2+","+g2+","+b2+")";

		$('#gradient').css({ background: "linear-gradient(20deg, "+color1+", "+color2+")" });

		step += gradientSpeed;
		if ( step >= 1 )
		{
			step %= 1;
			colorIndices[0] = colorIndices[1];
			colorIndices[2] = colorIndices[3];

			//pick two new target color indices
			//do not pick the same as the current one
			colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
			colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

		}
		}

		setInterval(updateGradient,10);

	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.5/jquery.fullpage.min.js" integrity="sha256-SwWHEBZICAfuD82HWp9i1VmxX0dXjllMm6cNKvucHAY=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				// anchors:['portfolio', 'info', 'contacto'],
				scrollingSpeed: 750,
				// css3: false,
				// lockAnchors: false,
				// keyboardScrolling: true,
				// animateAnchor: true,
				// dragAndMove: true,
			});
		});
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</body>
</html>
