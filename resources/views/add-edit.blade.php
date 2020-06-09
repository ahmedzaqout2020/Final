@extends('layouts.app')
@section('content')
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Products - ERP System</a>
    </div>
</nav>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- MESSAGES -->

            @if ($errors->any())
                <div class="alert alert-danger" >
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
            <!-- ADD Product FORM -->
            <div class="card card-body">


@if(isset($product))
                    <form method="post" action="{{url('update/'.$product->id)}}">

                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Product Title" autofocus >
                </div>
                <div class="form-group">
                    <textarea name="description" rows="2" class="form-control" placeholder="Product Description"></textarea>
                </div>
                <div class="form-group">
                    <input type="number" name="price" class="form-control" placeholder="Product Price" min="0">
                </div>
                <input type="submit" name="save_product" class="btn btn-success btn-block" value="Save Product">
            </form>
    @else
                    <form action="{{route('products')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Product Title" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Product Description"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" name="price" class="form-control" placeholder="Product Price" min="0">
                        </div>
                        <input type="submit" name="save_product" class="btn btn-success btn-block" value="Save Product">
                    </form>
    @endif
        </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
@forelse($products as $product)
                <tr>
                  <td> {{$product->title}}</td>
                    <td> {{$product->description}}</td>
                    <td> {{$product->price}}</td>
                    <td> {{$product->created_at}}</td>


                    <td>


                        <a href="edit/{{$product->id}}" class="btn btn-primary"><i class="fas fa-marker"></i>

                        </a>
                        |
                        <form action="{{url('delete/'.$product->id)}}" method="POST">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-danger pl-2"  onclick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</button>
                        </form>
                        {{-- <a href="delete.php?delId=5011" class="text-danger" onclick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a> --}}
                    </td>
                    </td>
                </tr>
    @empty
        Empty
    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>


@endsection
