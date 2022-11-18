@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Category'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Category Information</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#add-category"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Category</a>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card card-plain">
                                        <div class="card-header pb-0 text-left">
                                            <h3 class="font-weight-bolder text-info text-gradient">Add New Category</h3>
                                        </div>
                                        <div class="card-body">
                                            <form role="form text-left" id="add-category">
                                                <label>Category Name</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Category Name" aria-label="Category Name" aria-describedby="name-addon" id="add-category-value">
                                                </div>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0" id="create-category">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    $('#create-category').on('click',function (e) {
        console.log('click on save category');
        e.preventDefault();
        var addCategory = $( '#add-category-value' ).val();
        console.log(addCategory);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: "{{ route('add-new-category') }}",
            data: {name:addCategory},
            success: function (data) {
                console.log(data);
                swal("Successfully!",data.message, "success");
                location.reload();
            },
            error: function (err){
                console.error(err);
                var error = JSON.parse(err.responseText);
                swal("Error!",error.message, "error");
                location.reload();
            }       
        });
     });
</script>
@endpush

