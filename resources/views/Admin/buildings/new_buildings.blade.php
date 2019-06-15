
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php
                    $columns = Schema::getColumnListing('buildings');
                    
                    ?>
    

                      <form method="post" action="{{route('admin.buildings.store')}}" enctype="multipart/form-data">
                     
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                         <h4 class="page-heading">Create Building</h4>
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
                         <input class="btn btn-primary m-4" type="submit" value="Create Building">
                         <a class="btn btn-primary m-4" href="{{ URL::previous() }}">Back </a>
                         </form>
            
        </div>
    </div>
</div>
@endsection
