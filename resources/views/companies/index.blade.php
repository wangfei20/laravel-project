@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>
                <div class="card-body">
                    @php
                        //dd($companies)   
                    @endphp

                    <h1 class="text-end">
                        <a href="/companies/create" class="btn btn-info" role="button">
                        + Add New
                        </a>
                    </h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->company }}</td>
                                {{--
                                   <td>
                                    @foreach($company->series as $series)
                                        {{ $series->name }}, 
                                    @endforeach
                                   </td>
                                --}}
                                <td><div style="float:left;">
                                    <a href="{{ route('companies.edit', $company->id) }}" 
                                                  class="btn btn-success btn-sm">Edit</a>
                                    </div>
                                    <div style="float:left; margin-left:5px;">
                                        <form method="post" action="/companies/{{ $company->id }}" 
                                              onsubmit="return confirm('Delete Company? Are you sure?')">
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
