
@extends('layouts.app')

@section('content')
@php
$users = DB::table('users')->get();
   @endphp
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                    <div class="row ">
                        @if (Auth::user()->type == '2')
                            <div class="col">
                                @php $dashboard='All Resellers'; @endphp
                                    <h3 >{{$dashboard}}</h3> 
                            </div>
                            <div class="col new-reseller" >
                                <a  href="{{route('new_buildings', ['id' => 0])}} "><h3 class=" btn btn-success" >Add Reseller</h3></a>  
                            </div>        
                        @endif
                    
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="row">
                            <div class="col-md-4 text-center">
                                <h4 >Reseller name</h4>
                            </div>

                            <div class="col-md-4 text-center">
                                <h4 >Reseller Email</h4>
                                        
                            </div>

                            <div class="col-md-4 text-center">
                                <h4 >Created On</h4>
                                        
                            </div>
                        </div>
                    </div>
                @if (Auth::user()->type == '2')

                    @foreach ($users as $user)
                        @if ($user->type == '1')
                        <hr>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <h5 >{{$user->name}}</h5>
                                </div>

                                <div class="col-md-4 text-center">
                                    <h5>{{$user->email}}</h5>
                                </div>

                                <div class="col-md-4 text-center">
                                    <h5>{{$user->created_at}}</h5>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                    </div>
                        
                    <a class="btn btn-primary m-4" href="{{ URL::previous() }}">Back </a>
        </div>
    </div>
</div>

@endsection