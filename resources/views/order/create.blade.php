@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Inward Outward'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Inward Outward</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn btn-secondary fa fa-arrow-left" href="{{ route('orders.index') }}"> Back</a>
                            </div>
                        </div>
                    </div>

                    
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">Material Inward Outward</h3>
                        </div>
                        <div class="card-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form role="form text-left" action="{{ route('orders.store') }}" method="Post">
                                @csrf

                                <label for="category">Material Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="">Select Material Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }} </option>
                                    @endforeach
                                </select>

                                <label for="category">Material Name</label>
                                <select class="form-control" id="material" name="material">
                                    <option value="">Select Material</option>
                                </select>

                                <div class="form-group">
                                    <label for="example-date-input" class="form-control-label">Date</label>
                                    <input class="form-control" name="date" type="date" value="<?php echo date('Y-m-d');?>" id="example-date-input">
                                </div>

                                <label>Material inward-outward quantity</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="Material inward-outward quantity(1.00)" step="0.01" name="quantity" >
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Save" class="btn btn-round bg-gradient-info w-10 mt-4 mb-0"/>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    $(document).ready(function(){  
        $('#category').on('change',function(){
            // $("#stateselect").change(function(){
        var category = $('#category').val();
        console.log('category:'+category);
        $.ajax({
            url:"{{ route('get-category-material') }}",
            method:"GET",
            data: {category:category},
            success: function(result){
                console.log(result);
                $("#material").empty();
                if(JSON.parse(result) == null){
                    console.log("no data found");
                }
                $.each(JSON.parse(result), function(k, v){
                if (k!= null) {
                    console.log("data found");
                    var div_data="<option value="+v.id+">"+v.name+"</option>";
                    console.log(div_data);
                    $(div_data).appendTo('#material'); 
                } else {
                    console.log("data found");
                    var div_data="<option value="+' '+">No Material found against selected category</option>";
                    console.log(div_data);
                    $(div_data).appendTo('#material'); 
                }
                    
                });  
            },
            error: function(err){
                console.log(err);
            }
        });
    // });
		});
    });
</script>
@endpush