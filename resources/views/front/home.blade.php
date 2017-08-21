@extends('layouts.main')

@section('content')
    {{--Display the Cover Photo--}}
    <section class="hero text-center">
        <br><br><br><br><br><br>
        <h2>
            <strong style="color: #23527c; margin-left: 50%" >
                SUMMER SHAKER
            </strong>
        </h2>
        <br>
        {{--Direct to outfits--}}
        <a href="{{url('/shirts')}}">
            <button class="button large" style="margin-left: 50%">Check out My Outfits</button>
        </a>
    </section>

    <br/>

    <div class="subheader text-center">
        <h2>
            Stay Classy with ME!
        </h2>
    </div>

    <!-- Latest outfits -->
    <div class="row">

        {{--Retrive outfits from DB, display it as 4 images at each line--}}
        @forelse($shirts->chunk(4) as $chunk)
            @foreach($chunk as $shirt)

            <div class="small-3 medium-3 large-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">

                        {{--Add selecte outfit to cart--}}
                        <a href="{{route('cart.addItem',$shirt->id)}}"
                           class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        {{--Display image by clickng it--}}
                        <a href="{{route('shirt',$shirt->id)}}">
                            <img src="{{url('images',$shirt->image)}}"/>
                        </a>
                    </div>

                    {{--Outfit details--}}
                    <a href="{{route('shirt')}}">
                        <h3>
                            {{$shirt->name}}
                        </h3>
                    </a>
                    <h5>
                        ${{$shirt->price}}

                    </h5>
                    <p>
                        {{$shirt->description}}
                    </p>
                </div>
            </div>
     @endforeach

        @empty {{--Display this sentence when there is no iutfits--}}
            <h3>Empty Shop, Wait for us</h3>

        @endforelse
    </div>

    {{--Footer--}}
    <div class="row section4">
        <div class="col-lg-8 col-lg-offset-1 col-xs-12">
            <div class="section4-left text-left">
                <p class="footer">
                    &copy 2017 Aseel Saad, All Rights Reserved
                </p>
            </div>
        </div>
    </div>
@endsection