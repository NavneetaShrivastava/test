
@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <div class="card">
        <div class="card-header">
            <div class="row ">
                    @if (Auth::user()->type == '2')
                        <div class="col">
                            @php $dashboard='Buildings'; @endphp
                            <h3 >{{$dashboard}}</h3> 
                        </div>
                        <div class="col new-reseller" >
                            <a  href="{{route('admin.buildings.create')}}"><h3 class=" btn btn-success" >New Buildings</h3></a>  
                        </div>    
                    @else 
                        @php $dashboard= 'Buildings'; @endphp
                            <div class="col">
                                <h3 >{{$dashboard}}</h3> 
                            </div>
                    @endif
                    
            </div>
            </div>
            <div class="card-body">
            <div class="row mt-4">
                <div class="col-md-3 text-center">
                <h4 >Building name</h4>
                </div>

                <div class="col-md-3 text-center">
                <h4 >Address</h4>
                
                </div>

                <div class="col-md-3 text-center">
                <h4 >Created On</h4>
                
                </div>

            
    </div>
   @forelse($buildings as $building)
    
    <hr>
        <div class="row">
            <div class="col-md-3 text-center">
                <h5 >{{$building->b_name}}</h5>
            </div>

            <div class="col-md-3 text-center">
                <h5>{{$building->b_address}}</h5>
                
            </div>

            <div class="col-md-3 text-center">
                <h5>{{$building->created_at}}</h5>
                
            </div>
            <div class="col-md-3 text-center">
            <?php
            // $url = action('BuildingsController@create','{{$building->id}}');
            ?>
                <a href="{{route('admin.buildings.edit', $building->id)}}">Edit</a>
                <form action="{{route('admin.buildings.destroy', $building->id)}}" method="post">
              {{method_field('delete')}}
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are you sure')">
                </form>
                
                
            </div>
            
                
        </div>
        @empty
        <div class="row">
            <div class="col">
                    No buildings found
            </div>
        </div>
        @endforelse
            </div>
           
        </div>
        <a class="btn btn-primary m-4" href="{{ URL::previous() }}">Back </a>
    </div>
   
</div>

   
   
@endsection
