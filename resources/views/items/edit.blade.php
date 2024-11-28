@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Category</div>
                    <div class="card-body">
                        <form method="POST" action="/items/{{ $item->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH"/>  

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" title="name"
                                           value="{{ old('name', $item->name) }}" />        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="description">description</label>
                                    <input type="text" class="form-control" name="description" title="description" 
                                            value="{{ old('description', $item->description) }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="sku">sku</label>
                                    <input type="text" class="form-control" name="sku" title="sku"
                                    value="{{ old('sku', $item->sku) }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="price">price</label>
                                    <input type="text" class="form-control" name="price" title="price" 
                                    value="{{ old('price', $item->price) }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="quantity">quantity</label>
                                    <input type="text" class="form-control" name="quantity" title="quantity" 
                                    value="{{ old('quantity', $item->quantity) }}"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id">
                                        <option value="">Select a Category</option>
                                        @foreach ($item->categories as $category)
                                            <option value="{{ $category->id }}" selected="{{ $category->id === $item->category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/categories" class="btn btn-lg btn-danger w-100" style="margin-top:20px">Cancel</a>
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" value="Save Category" 
                                    class="btn btn-lg btn-success w-100" style="margin-top:20px" />
                                </div>
                            </div>
                            
                        </form>

                    </div>
                </div>
            </div><!-- .col-md-8 -->
        </div>    
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection
