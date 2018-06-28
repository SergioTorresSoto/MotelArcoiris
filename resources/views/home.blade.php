@extends('layouts.app')

@section('content')


        <div class="col-md-12">
            
                <h3>Dashboard</h3>
                <hr/>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            
        </div>
    
@endsection
