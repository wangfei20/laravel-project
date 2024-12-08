@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a Item</div>
                    <div class="card-body">
                        <form method="POST" action="/items">
                            @csrf  
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" title="name"
                                           value="{{ old('name') }}" />        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="description">description</label>
                                    <input type="text" class="form-control" name="description" title="description" 
                                            value="{{ old('description') }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="sku">sku</label>
                                    <input type="text" class="form-control" name="sku" title="sku"
                                    value="{{ old('sku') }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="price">price</label>
                                    <input type="text" class="form-control" name="price" title="price" 
                                    value="{{ old('price') }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="quantity">quantity</label>
                                    <input type="text" class="form-control" name="quantity" title="quantity" 
                                    value="{{ old('quantity') }}"/>
                                </div>
                            </div>
                            
                            
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" title="name" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="description">description</label>
                                    <input type="text" class="form-control" name="description" title="description" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="sku">sku</label>
                                    <input type="text" class="form-control" name="sku" title="sku" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="price">price</label>
                                    <input type="text" class="form-control" name="price" title="price" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="quantity">quantity</label>
                                    <input type="text" class="form-control" name="quantity" title="quantity" />
                                </div>
                            </div>-->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="picture">Picture</label>
                                    <input type="file" name="picture" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id">
                                        <option value="">Select a Category</option>
                                        @foreach ($item->categories as $category)
                                            <option value="{{ $category->id }}" selected="{{ $category->id === old('category_id') }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/items" class="btn btn-lg btn-danger w-100" style="margin-top:20px">Cancel</a>
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" value="Add Item" 
                                    class="btn btn-lg btn-primary w-100" style="margin-top:20px" />
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
