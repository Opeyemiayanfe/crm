@extends('layouts.app')

@section('content')

<div class="container">
    @if(count($companies)>0)

    @if (session('status'))
    <div class="alert alert-success" role="alert" id="company_success_message">
        {{ session('status') }}
    </div>
    @endif
    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Logo</th>
            <th scope="col">Website</th>
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
          <tr>
            <th scope="row"></th>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
            <td><img src="/storage/company_logo/{{$company->logo}}" width="60" height="40"></td>
            <td>{{$company->website}}</td>
            <td>
              <form method="POST" action="/company/{{$company->company_id}}">
                @method('delete')
                @csrf
                <button type="submit">Delete</button>
              </form>
            </td>
            <td><a href="/company/{{$company->company_id}}/edit">Edit</a></td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      {{$companies->links('pagination::bootstrap-4')}}
    @else
      <div style="text-align: center;">
         <h2>No Data Yet</h2>
       </div>
    @endif
</div>

@endsection
