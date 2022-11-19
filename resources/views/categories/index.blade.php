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
                    
                    {{-- Model of add new category --}}
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

                    {{-- Table --}}
                    <div class="card-body pt-4 p-3">
                        <table id="categories-table">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#edit-category_{{$category->id }}" class="edit-category fa fa-pen" data-id="{{$category->id}}" style="color: red;"></a> &nbsp;
                                            <a href="" class="delete_category fa fa-trash" data-id="{{$category->id}}" style="color: red;"> </a>
                                            
                                                {{-- Model of Edit category --}}
                                                <div class="modal fade" id="edit-category_{{$category->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card card-plain">
                                                                    <div class="card-header pb-0 text-left">
                                                                        <h3 class="font-weight-bolder text-info text-gradient">Update Category</h3>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form role="form text-left" id="edit-category">
                                                                            <label>Category Name</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" value="{{ $category->name }}" aria-label="Category Name" aria-describedby="name-addon" id="add-category-value">
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <button type="button" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0" id="edit-category">Save</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>

    $('#categories-table').DataTable(); //datatable of categories

    // Delete category
    $('.delete_category').on('click',  function (e) {
		e.preventDefault();
		var id = $(this).data('id');
        console.log('Delete Category Id '+id);
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to see this category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: "get",
					url: "{{route('delete-category')}}",
					data: {id:id},
					success: function (data) {
						console.log(data);
                        swal("Category has been deleted!", {
                            icon: "success",
                        });
						location.href = "{{route('categories')}}";
					},
					error: function (err){
						console.error(err);
						swal("Something Went Wrong!");
					}       
				});
            } else {
                swal("Your Category is safe!");
            }
        });
    });

    // add new category
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
                location.href = "{{route('categories')}}";
            },
            error: function (err){
                console.error(err);
                var error = JSON.parse(err.responseText);
                swal("Error!",error.message, "error");
                location.href = "{{route('categories')}}";
            }           
        });
     });
</script>
@endpush

