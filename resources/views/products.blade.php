<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>Ajex CRUD</title>
  </head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                    <h2 class="my-5 text-center">Laravel Ajex CRUD</h2>
                    <a href="" class="my-4 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Products</a>
                
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
                            <th>{{ $key+1 }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                              <a href="" class="btn btn-success update_product_form" data-bs-toggle="modal" data-bs-target="#updateModal"
                                data-id="{{ $product->id }}"
                                data-name="{{ $product->name }}"
                                data-price="{{ $product->price }}"
                              ><i class="fa-solid fa-pen-to-square"></i></a>
                              <a href="" class="btn btn-danger delete_product" data-id="{{ $product->id }}"><i class="fa-solid fa-xmark"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {!! $products->links() !!}
                </div>

            </div>
        </div>
    </div>

    @include('add_product');
    @include('update_product');
    @include('product_js');
    {!! Toastr::message() !!}
    
  </body>
</html>