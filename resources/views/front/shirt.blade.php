@extends('layouts.main')

@section('title','Outfit')

@section('content')

    <!-- Outfits listing -->
    <div class="row">
        @foreach($shirts as $shirt)

        <div class="small-5 small-offset-1 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="{{url('images',$shirt->image)}}">
                        <img src="{{url('images',$shirt->image)}}"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="small-6 columns">
            <div class="item-wrapper">
                <h3 class="subheader">
                    <span class="price-tag">{{$shirt->price}}$</span>
                    SUMMER SHOP
                </h3>
                <div class="row">
                    <div class="large-12 columns">
                        <label>
                            Select Size
                            <select>
                                <option value="small">
                                    Small
                                </option>
                                <option value="medium">
                                    Medium
                                </option>
                                <option value="large">
                                    Large
                                </option>

                            </select>
                        </label>
                        {{--Add the outfit to cart--}}
                        <a href="{{route('cart.addItem',$shirt->id)}}"
                           class="button  expanded">
                            Add to Cart</a>
                    </div>
                </div>
        </div>
        </div>

        @endforeach
    </div>

@endsection