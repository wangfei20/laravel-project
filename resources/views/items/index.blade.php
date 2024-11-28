@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Items</div>
                <div class="card-body">

                    <h1 class="text-end">
                        <a href="/items/create" class="btn btn-info" role="button">
                        + Add New
                        </a>
                    </h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->sku }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td><div style="float:left;">
                                    <a href="{{ route('items.edit', $item->id) }}" 
                                                  class="btn btn-success btn-sm">Edit</a>
                                    </div>
                                    <div style="float:left; margin-left:5px;">
                                        <form method="post" action="/items/{{ $item->id }}" 
                                              onsubmit="return confirm('Delete Category? Are you sure?')">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <input type="submit" name="submit" value="Delete" 
                                                   class="btn btn-sm btn-danger btn-block"/>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>    


                </div>
            </div>
        </div><!-- .col-md-8 -->
    </div>    
</div>
@endsection

@section('scripts')
@endsection

@section('styles')
@endsection
