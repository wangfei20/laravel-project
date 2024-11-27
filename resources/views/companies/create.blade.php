@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a Company</div>
                    <div class="card-body">
                        <form method="POST" action="/companies">
                            @csrf  
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" name="company" title="company" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/companies" class="btn btn-lg btn-danger w-100" style="margin-top:20px">Cancel</a>
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" value="Add Company" 
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
