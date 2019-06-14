
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
                            Edit Profile
                        </li>
                        <li>
                            <a href="{{route('profile')}}"> All Reseller</a>
                        </li>
                        <li>
                            All Buildings
                        </li>
                    </ul> 
                @else
                    <ul>
                        <li>
                            Edit Profile
                        </li>
                        <li>
                            All Customer
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
                    
                    if(Auth::user()->type == '2'){
                        ?>
                    @foreach ($users as $user)
                        @if ($user->type == '1')
                    <a href="{{route('re_edit', ['id'=>$user->id])}} ">{{ $user->name }}</a>
                    <br/>
                    @endif
                @endforeach
              <?php
                    }else{
                       
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
                             <input type="text" class="form-control" value="{{$user->$col}}" name="{{$user->$col}}"/>
                             </div>
                            
                         </div>
                       
                         @endforeach
                         </div>
                         <input type="submit" class="btn btn-primary m-4" value="Update">
                         <a class="btn btn-primary m-4" href="{{ URL::previous() }}">Back </a>
                         </form>
                          
<?php
                    }
              ?>
                    </form>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
