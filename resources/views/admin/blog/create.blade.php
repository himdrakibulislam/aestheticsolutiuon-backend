@extends('layouts.admin')
@section('title','Create Post')
@section('content')
<section class="content-wrapper">
    <div class="content mb-4">
        <hr>
            <div class="d-flex justify-content-between"> 
                <h4 class="">Create Post</h4>

                <a href="{{url('admin/blogs')}}"
                class="btn btn-info"
                >
                <i class="fas fa-arrow-left"></i>
                Back</a>
            </div>
        <hr>
       
        <div class="my-3">
            <form action="{{route('store.post')}}" method="POST"
            enctype="multipart/form-data"
            >
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
            @endif
            
            <label for="title">Title</label>
            <input type="text" 
            name="title"
            class="form-control mb-3"
            placeholder="Title"
            value="{{old('title')}}"
            >

            <label for="short_descriiption">Short Description</label>

            <textarea name="short_description" id="shortdescription" cols="20" class="form-control" rows="5"></textarea>

            <label for="short_descriiption"> Description</label>

            <textarea name="description" id="description" cols="30" rows="10"
            class="form-control"
            ></textarea>

           <label for="image" class="d-block">Banner (1300/650)</label>

    
           

           <div class="custom-file">
    
            <input type="file"
            onchange="loadFile(event,'400','200')"
            class="custom-file-input"
            name="banner"
            id="banner" required>
            <label class="custom-file-label" for="input">Choose file</label>
            </div>
            
           
            <div class="my-2">
                <img id="preview">
            </div>

            <label for="status" class="">Status</label>
            <input type="checkbox" class="p-4" name="status" class="" id="">

            <label for="meta_title" class="d-block">Meta Title</label>
            <input type="text" 
            class="form-control"
            name="meta_title"
            placeholder="Meta Title"
            >
            <label for="meta_title" class="d-block">Meta Description</label>
            
            <textarea 
            cols="10" rows="5"
            class="form-control"
            name="meta_description"
            placeholder="Meta Description"
            >

            </textarea>


            <label for="meta_title" class="d-block">Meta Keywords</label>
            <input type="text" 
            class="form-control"
            name="meta_keywords"
            placeholder="Meta Keywords"
            >
            
            <button 
            type="submit" 
            class="btn btn-success w-50 mt-3 "
            >Create Post</button>
            </form>
        </div>
        
    </div>
  </section>
@endsection

@push('custom-scripts')
    <script>
        // summernote 

         $('#shortdescription').summernote({
        placeholder: 'Short Description',
        tabsize: 2,
        height: 100});

         $('#description').summernote({
        placeholder: 'Description',
        tabsize: 2,
        height: 300});

        
    </script>
@endpush