@extends('layout.main')

@section('content')
    <h3 style="text-align: center">Cart Items</h3>

    <div class="row">
        <table border="1">
            <thead>
            <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Size</th>
                <th>Action</th>
                <th>Price</th>

            </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $cartItem)
                <tr>
                    <td>{{$cartItem->name}}</td>
                    {{--<td>{{$cartItem->options->has('size')?$cartItem->options->size:''}}</td>--}}
                    <td width="50px">
                        {!! Form::open(['route'=>['cart.update',$cartItem->rowId], 'method'=>'PUT']) !!}
                        <input name="qty" type="text" value="{{$cartItem->qty}}">
                    </td>
                    <td width="200px">
                        <div>
                            {!! Form::select('size', ['small'=>'Small','medium'=>'Medium','large'=>'Large'], $cartItem->options->has('size')?$cartItem->options->size:'') !!}
                        </div>
                    </td>
                    <td>
                        <input style="float: left"  type="submit" class="button success small" value="Ok">
                        {!! Form::close() !!}

                        <form action="{{route('cart.destroy',$cartItem->rowId)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input class="button small alert" type="submit" value="Delete">
                        </form>
                    </td>
                    <td>{{$cartItem->price}}</td>
                </tr>
            @endforeach
            <tr>
                <td><b>Sub-Total: </b></td>
                <td>{{Cart::count()}}</td>
                <td></td>
                <td></td>
                <td>{{Cart::subtotal()}}</td>
            </tr>
            <tr>
                <td><b>Tax: </b></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{Cart::tax()}}</td>
            </tr>
            <tr>
                <td><b>Grand-Total: </b></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{Cart::total()}}</td>
            </tr>
            </tbody>
        </table>

        <center>
            <a href="{{url('/checkout')}}" class="button" style="alignment: center">Check Out</a>
        </center>
    </div>

    @endsection