@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Inward Outward,'])
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
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('orders.create') }}"><i class="fas fa-plus"></i> Add orders Quantity</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-4 p-3">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <strong> {{ session('status') }}</strong>
                            </div>
                        @endif
                        <table id="orders-table">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Material category</th>
                                    <th>Material name</th>
                                    <th>Opening balance</th>
                                    <th>Current balance</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->get_category->name ?? '' }}</td>
                                        <td>{{ $order->get_material->name ?? '' }}</td>
                                        <td>{{ $order->get_material->balance ?? '0' }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ date("d/m/Y", strtotime($order->date)) }}</td>

                                        <td>
                                            <a href="{{ route('materials.edit',$order->material_id) }}" class="fa fa-pen" data-id="{{$order->material_id}}" style="color: blue;"></a> &nbsp;
                                            <abbr title="Deleted Material"><a href="" class="delete_material fa fa-trash" data-id="{{$order->material_id}}" data-route="{{route('orders.destroy',$order->material_id)}}" style="color: red;"></a></abbr>
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
    $('#orders-table').DataTable(); //datatable of orderss

    $('.delete_material').on('click',  function (e) {
		e.preventDefault();
		var id = $(this).data('id');
        console.log('Delete Material Id '+id);
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to see this Material and records against this Material",
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
                        swal("Material has been deleted!", {
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
                swal("Your Material is safe!");
            }
        });
    });

</script>
@endpush

