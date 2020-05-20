@extends('app')
@section('content')
<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <br><br>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="POST" action="/checkout">
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="/cart">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                            @foreach(Cart::content() as $item)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{asset('storage/'.$item->model->image)}}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{$item->model->name}}</div>
                                    <div class="col-xs-12"><small>Quantity: <span>{{$item->qty}}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6>{{presentPrice($item->subtotal())}}</h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            @endforeach
                            
                            <!--<div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span>$</span><span>200.00</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Shipping</small>
                                    <div class="pull-right"><span>-</span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>-->
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><h2><span>{{presentPrice(Cart::total())}}</span></h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}" />
                                    <p style="color: red">@error('first_name') {{$message}} @enderror</p>
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}" />
                                    <p style="color: red">@error('last_name') {{$message}} @enderror</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" value="{{old('city')}}" />
                                    <p style="color: red">@error('city') {{$message}} @enderror</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="{{old('address')}}" />
                                    <p style="color: red">@error('address') {{$message}} @enderror</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Estate/Area/Location:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="estate" class="form-control" value="{{old('estate')}}" />
                                    <p style="color: red">@error('estate') {{$message}} @enderror</p>
                                </div>
                            </div>
                            <!--
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="" />
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="{{old('phone_number')}}" /><p style="color: red">@error('phone_number') {{$message}} @enderror</p></div>
                                
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                @if(auth()->user())
                                    <div class="col-md-12"><input type="text" name="email" class="form-control" value="{{auth()->user()->email}}" readonly /><p style="color: red">@error('email') {{$message}} @enderror</p></div>
                                @else
                                    <div class="col-md-12"><input type="text" name="email" class="form-control" value="{{old('email')}}" /><p style="color: red">@error('email') {{$message}} @enderror</p></div>
                                @endif
                            </div>
                            <input type="hidden" name="amount" value="{{Cart::total()}}">
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    
                            <div class="form-group">
                                <div class="col-md-12">
                                    <span>Pay secure using iLabPay.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>
                @csrf
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
@endsection