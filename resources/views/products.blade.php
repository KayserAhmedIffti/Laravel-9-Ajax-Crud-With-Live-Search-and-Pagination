<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Ajax CRUD</title>
  </head>
  <body>
    <div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <h2 class="my-5 text-center"> Apparel Products</h2>
            <a href="" class="btn btn-success my-3" data-toggle="modal" data-target="#addModal">Add product</a>
            <div class="table-data">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $key=>$product)
                      <tr>
                        <th>{{$key+1}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a href="" class="btn btn-success update_product_form" 
                            data-toggle="modal" 
                            data-target="#updateModal" 
                            data-id="{{$product->id}}"
                            data-name="{{$product->name}}"
                            data-price="{{$product->price}}"                       
                                                       
                            > {{--data-id =ajax catch data by this --}}
                              <i class="las la-edit"></i></a>                           
                            <a href="" class="btn btn-danger" > <i class="las la-times"></i></a>

                        </td>
                      </tr>
                      @endforeach
                    
                    </tbody>
                  </table>
                  {!! $products->links() !!} {{--It is for pagination--}}
            </div>
        </div>
    </div>
</div>

    </div>

    @include('add_product_modal')
    @include('update_product_modal')
    @include('product_js')
  </body>
</html>