@extends('admin.layout.admin')

@section('content')

    <h3>Orders</h3>
    <hr>

    <ul>
        {{--Passin Orders to get its info--}}
        @foreach($orders as $order)
            <li>
                <h4>Order by {{$order->user->name}} <br>
                    Total Price {{$order->total}}</h4>

                {{--To check if order delivered or not--}}
                <form action="{{route('toggle.deliver',$order->id)}}
                        " method="POST" class="pull-right" id="deliver-toggle">
                    {{csrf_field()}}
                    <label for="delivered">Delivered</label>
                    <input type="checkbox" value="1" name="delivered"
                            {{$order->delivered==1?"checked":"" }}>
                    <input type="submit" value="Submit">
                </form>

                {{--Get order details--}}
                <div class="clearfix"></div>
                <hr>
                <h5>Outfits</h5>

                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>qty</th>
                        <th>price</th>
                    </tr>

                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->pivot->qty}}</td>
                            <td>{{$item->pivot->total}}</td>
                        </tr>

                    @endforeach

                </table>
            </li>

        @endforeach

    </ul>
@endsection

