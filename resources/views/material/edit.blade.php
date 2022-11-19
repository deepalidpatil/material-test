@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Materials'])
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
                                <a class="btn btn-secondary fa fa-arrow-left" href="{{ route('materials.index') }}"> Back</a>
                            </div>
                        </div>
                    </div>

                    
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">Edit Material</h3>
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
                            <form role="form text-left" action="{{ route('materials.update',$material->id) }}" method="Post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $material->id }}">
                                <label>Material Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="{{ $material->name }}" aria-label="Material Name" aria-describedby="name-addon" name="name">
                                </div>

                                <label for="category">Material Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="">Select Material Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($material->category_id == $category->id )
                                            selected
                                        @endif>{{ $category->name }} </option>
                                    @endforeach
                                </select>

                                <label>Opening Balance</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" value="{{ $material->balance }}" step="0.01" min="0" name="balance" >
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