@extends('app')
@section('content')

<div class="wrapper">
			
			<!-- events -->
			<div class="event" id="event">
				<div class="container">
					<div class="default-heading">
						<!-- heading -->
						
						@if(session()->has('success'))
			                <div class="alert alert-success">
			                    {{session()->get('success')}}
			                </div>
			            @endif
						<h2>Today's Menu</h2>
						<h4>{{$categoryName}}</h3>
					</div>
					<div>
						<select name="categories" onchange="location = this.value;">
							<option value="">Select Category</option>
							<option value="{{route('menu')}}">All</option>
							@foreach($categories as $c)
								<option value="{{route('menu',['category' => $c->slug])}}">{{$c->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="row">
						@forelse($products as $product)
							@include('includes.singleproduct')
						@empty
							<br>
							No food items found
						@endforelse
				</div>
				<br><br>
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
			