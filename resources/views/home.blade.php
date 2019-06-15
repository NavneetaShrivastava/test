
@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <div class="row ">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h2>Profile Picture</h2>
                </div>
                <div class="card-body">
                @if (Auth::user()->type == '2')
                <ul>
                        <li>
                        <a href="{{route('re_edit', ['id' => Auth::user()->id])}}">   Edit Profile </a>
                        </li>
                        <li>
                            <a href="{{route('all_reseller')}}"> All Reseller</a>
                        </li>
                        <li>
                        <a href="{{route('admin.buildings.index')}}">  All Buildings </a>
                        </li>
                    </ul> 
                @else
                    <ul>
                        <li>
                        <a href="{{route('re_edit', ['id' => Auth::user()->id])}}">  Edit Profile </a>
                        </li>
                        <li>
                        <a href="{{route('customers')}}">   All Customer </a>
                        </li>
                        <li>
                            History
                        </li>
                    </ul> 
                    @endif
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                        <div class="col">
                            <div class="row">
                                    <div class="col" >
                                        @if (Auth::user()->type == '2')
                                        @php $dashboard='Admin'; @endphp
                                        <h3 >{{$dashboard}}</h3> 
                                    </div>
                                    <div class="col new-reseller" >
                                        <a  href="{{route('profile', ['id' => 0])}} "><h3 class=" btn btn-success" >New Reseller</h3></a>  
                                    </div>
                                        @else 
                                        @php $dashboard= Auth::user()->name ; @endphp
                                    <div class="col">
                                        <h3 >{{$dashboard}}</h3> 
                                    </div>
                                    
                                        @endif
                                
                            </div>
                        
               
                
                </div>
             
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php
                    $users = DB::table('users')->get();
                    $columns = Schema::getColumnListing('users');
                    //var_dump($columns[1]);
                 
                       
                       $user = DB::table('users')->where('id', Auth::user()->id)->first();
                        $columns = Schema::getColumnListing('users');
                        
                        ?>
                        <form method="post" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                         <h4 class="page-heading">Edit User</h4>
                         <div class="form-group">
                         @foreach ($columns as $col)
                         <div class="row mb-3 ">
                        
                             <div class="col-2">
                             
                                 <label class="control-label" for="<?php echo $col; ?>"><?php echo $col; ?></label>
                              </div>
                              
                             <div class="col-9">
                             <input type="text" class="form-control home" value="{{$user->$col}}" name="{{$user->$col}}" disabled/>
                             </div>
                            
                         </div>
                       
                         @endforeach
                         </div>
                         <a href="{{route('re_edit', ['id' => Auth::user()->id])}}" class="btn btn-primary m-4"> Update Profile </a>
                         <a class="btn btn-primary m-4" href="{{ URL::previous() }}">Back </a>
                         </form>
                          
<?php
                    
              ?>
                    </form>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
