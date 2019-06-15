@extends('layouts.app')

@section('content')
<?php 
$id = $_GET['id'];
?>
<div class="jumbotron">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
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
                  <form method="post" action="profile/update" enctype="multipart/form-data">
                       {{ csrf_field() }}
                        <h4 class="page-heading">Create New User</h4>
                        <div class="form-group">
                        @foreach ($columns as $col)
                        <div class="row mb-3 ">
                       
                            <div class="col-2">
                            
                                <label class="control-label" for="<?php echo $col; ?>"><?php echo $col; ?></label>
                             </div>
                       
                            <div class="col-9">
                            <input type="text" class="form-control" value="" name="{{$col}}"/>
                            </div>
                           
                        </div>
                      
                        @endforeach
                        </div>
                        <input type="submit" class="btn btn-primary m-4" value="Create">
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
