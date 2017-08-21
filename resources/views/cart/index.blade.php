@extends('layouts.main')

@section('content')
    <div class="row">

        <h3>Cart Items</h3>


        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>qty</th>
                <th>size</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            {{--Retrieving cart's items' details--}}
            @foreach($cartItems as $cartItem)
                <tr>
                    <td>{{$cartItem->name}}</td>
                    <td>{{$cartItem->price}}</td>

                    <td width="50px">
                        {!! Form::open(['route' => ['cart.update',$cartItem->rowId],
                        'method' => 'PUT']) !!}
                        <input name="qty" type="text"
                               value="{{$cartItem->qty}}">
                    </td>
                    <td>
                        {{--Size selection--}}
                        <div > {!! Form::select
                        ('size', ['small'=>'Small','medium'=>'Medium','large'=>'Large'] ,
                        $cartItem->options->has('size')?$cartItem->options->size:'' ) !!}
                           </div>
                    </td>

                    <td>
                        {{--To approve quantity --}}
                        <input style="float: left"  type="submit"
                               class="button success small"
                               value="Ok">
                        {!! Form::close() !!}

                        {{--Delete item from cart--}}
                        <form action="{{route('cart.destroy',$cartItem->rowId)}}"
                              method="POST">
                           {{csrf_field()}}
                           {{method_field('DELETE')}}

                           <input class="button small alert" type="submit" value="Delete">
                         </form>
                    </td>
                </tr>
            @endforeach

            <tr>
                <td></td>
                <td>
                    Total : {{Cart::total()-Cart::tax()}} $
                </td>
                <td>Items: {{Cart::count()}} {{--Number of items--}}

                </td>
                <td></td>
                <td></td>

            </tr>
            </tbody>
        </table>

        {{--Create the order and go to insert your address info--}}
        <a href="{{route('checkout.shipping')}}" class="button">Checkout</a>
    </div>



@endsection