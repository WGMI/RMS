@extends('app')
@section('content')

<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif

            @if(Cart::count() > 0)
                <h2>{{Cart::count()}} item(s) in cart</h2>        

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Cart::content() as $item)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset('storage/'.$item->model->image)}}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{$item->model->name}}</a></h4>
                            </div>
                        </div></td>
                        <td class="col-sm-1" style="text-align: center">
                        <button class="btn btn-warning qtyadd" data-id="{{$item->rowId}}">+</button>
                        <input type="hidden" name="qty" id="newqty" value="{{$item->qty + 1}}">
                        <!--<form action="/cart/{{$item->rowId}}" method="POST">
                            @csrf
                            {{method_field('PATCH')}}
                            <input type="hidden" name="qty" value="{{$item->qty + 1}}">
                            <button class="btn btn-warning qtyadd">+</button>
                        </form>-->
                        <br><br>
                        <p>{{$item->qty}}</p>
                        <br>
                        <button class="btn btn-warning qtyminus" data-id="{{$item->rowId}}">-</button>
                        <input type="hidden" name="qty" id="newqtyless" value="{{$item->qty - 1}}">
                        <!--<form action="/cart/{{$item->rowId}}" method="POST">
                            @csrf
                            {{method_field('PATCH')}}
                            <input type="hidden" name="qty" value="{{$item->qty - 1}}">
                            <button class="btn btn-warning">-</button>
                        </form>-->
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->model->presentPrice()}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{presentPrice($item->subtotal)}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                        	<form action="/cart/{{$item->rowId}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="Submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                    <!--<tr>
                        <td class="col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Product name</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>
                            </div>
                        </div></td>
                        <td class="col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="2">
                        </td>
                        <td class="col-md-1 text-center"><strong>$4.99</strong></td>
                        <td class="col-md-1 text-center"><strong>$9.98</strong></td>
                        <td class="col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>40 Ksh</strong></h5></td>
                    </tr>
                    -->
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>{{Cart::total()}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
	                        <a href="/menu" type="button" class="btn btn-default">
	                            <span class="glyphicon glyphicon-shopping-cart"></span> Back To Menu
	                        </a>
                    	</td>
                        <td>
	                        <a href="/checkout" type="button" class="btn btn-success">
	                            Checkout <span class="glyphicon glyphicon-play"></span>
	                        </a>
                    	</td>
                    </tr>
                </tbody>
            </table>

            @else

            <h2>No items in cart</h2>
            <a href="/menu" type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Back To Menu
                            </a>

            @endif

        </div>
    </div>
</div>
@endsection

@section('extra-js')
    <script src="{{asset('js/app.js')}}">
        
    </script>

    <script>
        (function(){
            const classname = document.querySelectorAll('.qtyadd')
            const newQuantity = Number(document.getElementById('newqty').value)
            Array.from(classname).forEach(function(element){
                element.addEventListener('click',function(){
                    const rowId = element.getAttribute('data-id')
                    axios.patch(`/cart/${rowId}`, {
                        quantity:newQuantity 
                    })
                    .then(function (response) {
                        console.log(response);
                        window.location.href = 'cart'
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                })
            })
        })();

        (function(){
            const classname = document.querySelectorAll('.qtyminus')
            const newQuantity = Number(document.getElementById('newqtyless').value)
            Array.from(classname).forEach(function(element){
                element.addEventListener('click',function(){
                    const rowId = element.getAttribute('data-id')
                    axios.patch(`/cart/${rowId}`, {
                        quantity:newQuantity 
                    })
                    .then(function (response) {
                        console.log(response);
                        window.location.href = 'cart'
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                })
            })
        })();
    </script>
@endsection