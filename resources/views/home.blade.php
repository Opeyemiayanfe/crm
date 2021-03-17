@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" id="company_success_message">
                            {{ session('status') }}
                        </div>
                    @endif

                   <h3>Companies</h3>
                    <span><a href="/company/create">Add company</a></span><br>
                    <span><a href="/company">View all</a></span>
                    <h3>Employees</h3>
                    <span><a href="/employee/create">Add Employee</a></span><br>
                    <span><a href="/employee">View all</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
