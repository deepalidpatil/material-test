@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'materials'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Material Information</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('materials.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Material</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-4 p-3">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <strong> {{ session('status') }}</strong>
                            </div>
                        @endif
                        <table id="materials-table">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Opening Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materials as $material)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $material->name }}</td>
                                        <td>{{ $material->get_category->name }}</td>
                                        <td>{{ $material->balance }}</td>
                                        <td>
                                            <a href="{{ route('materials.edit',$material->id) }}" class="fa fa-pen" data-id="{{$material->id}}" style="color: blue;"></a> &nbsp;
                                                <abbr title="Deleted Material"><a href="" class="delete_material fa fa-trash" data-id="{{$material->id}}" data-route="{{route('materials.destroy',$material->id)}}" style="color: red;"></a></abbr>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Table --}}



                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    $('#materials-table').DataTable(); //datatable of materials

    $('.delete_material').on('click',  function (e) {
		e.preventDefault();
		var id = $(this).data('id');
        console.log('Delete Material Id '+id);
        var url = $(this).data('route');
        console.log('url : '+url);
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to see this Material!",
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
                    type : 'DELETE',
                    url: $(this).data('route'),
					data: {id:id},
					success: function (data) {
						console.log(data);
                        swal("Category has been deleted!", {
                            icon: "success",
                        }).then(function(isConfirm) {      //reload after button click
                            if (isConfirm) {
                                location.reload();
                            }
                        });
					},
					error: function (err){
						console.error(err);
					}       
				});
            } else {
                swal("Your Category is safe!");
            }
        });
    });

</script>
@endpush

