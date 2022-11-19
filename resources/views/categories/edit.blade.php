@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Categories'])
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
                                <a class="btn btn-secondary fa fa-arrow-left" href="{{ route('categories') }}"> Back</a>
                            </div>
                        </div>
                    </div>

                    
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">Edit Category</h3>
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
                            <form role="form text-left" action="{{ route('update-category') }}" method="Post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $category->id }}">

                                <label>Category Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="{{ $category->name }}" aria-label="Category Name" aria-describedby="name-addon" name="category_name" id="category-name-{{ $category->id }}">
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Update" class="btn btn-round bg-gradient-info w-10 mt-4 mb-0"/>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
  
</script>
@endpush