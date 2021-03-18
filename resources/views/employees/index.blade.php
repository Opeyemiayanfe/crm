@extends('layouts.app')

@section('content')

<div class="container">
    @if(count($employee)>0)

    @if (session('status'))
    <div class="alert alert-success" role="alert" id="company_success_message">
        {{ session('status') }}
    </div>
    @endif
    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Company Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
        @foreach($employee as $employ)
          <tr>
            <th scope="row"></th>
            <td>{{$employ->firstname}}</td>
            <td>{{$employ->lastname}}</td>
            <td>{{$employ->name}}</td>
            <td>{{$employ->email}}</td>
            <td>{{$employ->phone}}</td>
            <td>
              <form method="POST" action="/employee/{{$employ->employee_id}}">
                @method('delete')
                @csrf
                <button type="submit">Delete</button>
              </form>

            </td>
            <td><a href="/employee/{{$employ->employee_id}}/edit">Edit</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$employee->links('pagination::bootstrap-4')}}
    @else
<div style="text-align:center">
<h2>No Data Yet</h2>
</div>
    @endif
</div>

@endsection
