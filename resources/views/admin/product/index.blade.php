@extends('admin.layout.admin')

@section('content')

    <h3>OUTFITS</h3>

<ul class="container">

    {{--Display Products' details--}}
    @forelse($products as $product)

    <li class="row">

       <div class="col-md-8 col-lg-8 col-sm-12">

        <table class="table table-bordered text-center">
            <tr >
                <th class="text-center">Name</th>
                <th class="text-center">Category</th>
                <th class="text-center">Image</th>
                <th class="text-center">Price</th>
                <th class="text-center">Size</th>
                <th class="text-center">Edit Product</th>
                <th class="text-center">Delete Product</th>
            </tr>

            {{--Retrieve product details from DB--}}
            @forelse($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{count($product->category)?$product->
                    category->name:"N/A"}}</td>
                    <td>{{$product->image}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->size}}</td>
                    <td>

                        {{--Edit something about the product--}}
                    <a href="{{route('product.edit',$product->id)}}"
                       class="btn btn-primary btn-sm ">Edit Product</a>
                    </td>

                    <td>
                        {{--To delete a product--}}
                        <form action="{{route('product.destroy',$product->id)}}"
                         method="POST">

                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                          <input class="btn btn-sm btn-danger"
                                   type="submit" value="Delete">
                        </form>
                    </td>
                </tr>

            @endforeach
        </table>
      </div>
    </li>
</ul>

        @empty {{--When there is no outfits display that header--}}
        <h3>Empty Shop</h3>

    @endforelse

@endsection


