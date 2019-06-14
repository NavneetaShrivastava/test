
@extends('layouts.app')

@section('content')
<?php 
$id = $_GET['id'];
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php
                    $users = DB::table('users')->get();
                    $columns = Schema::getColumnListing('users');
  
                    
                
                    if(Auth::user()->type == '2' && $id != 0){
                        
                        $user = DB::table('users')->where('id', $id)->first();
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
                   
                    

                    
                
            
        </div>
    </div>
</div>
@endsection
