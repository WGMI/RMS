@extends('app')
@section('content')
<div class="wrapper">
			<!-- banner -->
			<div class="banner">
				<div class="container">
					<!-- heading -->
					<h2>Strathmore Cafeteria</h2>
					<!-- paragraph -->
					<p>Breakfast • Lunch • Snacks • Drinks • Desserts • Juices • African •  All delivered to your door.</p>
				</div>
			</div>
			<!-- banner end -->
		
			
			<!-- events -->
			<div class="event" id="event">
				<div class="container">
					<div class="default-heading">
						<!-- heading -->
						
						<h2>Today's Specials</h2>
					</div>
					<div class="row">
						@forelse($products as $product)
							@include('includes.singleproduct')
						@empty
						The cafeteria is not open today
						@endforelse
						
				</div>
				<br><br>
				<div class="container text-center">
					<a href="/menu" class="btn btn-warning">See More</a>
				</div>
			</div>
			<!-- events end -->
			
			<!-- footer -->
			<footer>
				<div class="container">
					<p><a href="#">Home</a> | <a href="#work">works</a> | <a href="#team">Team</a> | <a href="#contact">Contact</a></p>
					<div class="social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
					</div>
					<!-- copy right -->
					<!-- This theme comes under Creative Commons Attribution 4.0 Unported. So don't remove below link back -->
					<p class="copy-right">Copyright &copy; 2020 <a href="#">Strathmore Cafeteria</a> | Designed By : <a href="http://www.indioweb.in/portfolio">IndioWeb</a>, All rights reserved. </p>
				</div>
			</footer>

		</div>
		
		
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="js/custom.js"></script>
@endsection
			