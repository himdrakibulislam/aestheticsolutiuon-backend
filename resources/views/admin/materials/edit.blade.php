@extends('layouts.admin')
@section('title', 'edit Material')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h6 class="d-inline">Edit Material</h6>
                    <a href="{{ url('admin/materials') }}" class="btn btn-outline-primary btn-sm float-right">Back</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif


                    <form action="{{ url('admin/update-material/'.$material->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')
                        <img src="{{asset($material->image)}}" id="preview" width="100" height="70">
                        <br>
                        <label for="image">Image</label>
                        <input type="file" name="image" onchange="loadFile(event)" class="form-control mb-2 " >




                        <input type="text"
                        value="{{$material->name}}"
                        name="name" class="form-control my-4" placeholder="Name" required>

                        <textarea name="description" id="summernote" cols="30" rows="10">{{$material->description}}</textarea>

                        <div>
                            <button type="submit" class="btn btn-success float-right">UPDATE MATERIAL </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection


@push('custom-scripts')
    <script>
        // summernote
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: "Description"
            });
        });
    </script>
@endpush
