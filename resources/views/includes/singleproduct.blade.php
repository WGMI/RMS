<div class="col-md-4 col-sm-4">
	<!-- event item -->
	<div class="event-item">
		<!-- image -->
		<a href="#"><img class="img-responsive" src="{{asset('storage/'.$product->image)}}" alt="foodpic" /></a>
		<!-- heading -->
		<h4><a href="#">{{$product->name}}</a></h4>
		<!-- sub text -->
		<span class="sub-text">{!!$product->description!!}</span>
		<!-- paragraph -->
		<p>{{$product->presentPrice()}}</p>
		<div class="text-center">
			<form action="/cart" method="POST"> 
				@csrf
				<input type="hidden" name="id" value="{{$product->id}}">
				<input type="hidden" name="name" value="{{$product->name}}">
				<input type="hidden" name="price" value="{{$product->price}}">
				<button type="submit" class="button button-plain">Add To Cart</button>
			</form>
		</div>
	</div>
</div>