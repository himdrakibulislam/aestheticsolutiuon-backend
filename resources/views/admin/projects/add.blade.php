@extends('layouts.admin')
@section('title','products')
@section('content')
<div class="content-wrapper">
   <div class="content">
    <div class="card">
      <div class="card-header">
          <h6 class="d-inline">Add Product</h6>


        


          <a href="{{url('admin/projects')}}" class="btn btn-outline-primary btn-sm float-right">Back</a>
      </div>
      <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-warning">
              @foreach ($errors->all() as $error)
                  <div>{{$error}}</div>
              @endforeach
            </div>
        @endif


       <form action="{{url('admin/project')}}" enctype="multipart/form-data" method="POST">
         @csrf
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="product-image-tab" data-toggle="tab" data-target="#product-image" type="button" role="tab" aria-controls="product-image" aria-selected="false">Product Image</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="seo-tags-tab" data-toggle="tab" data-target="#seo-tags" type="button" role="tab" aria-controls="seo-tags" aria-selected="false">SEO Tags</button>
          </li>
          
          
         
      </ul>
        {{-- tab contents --}}
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane border p-3 fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="mb-3">
              <label>Location <h2 class="text-danger d-inline">*</h2></label>
              <input 
              type="text"
              name="location"
              class="form-control  @error('location') is-invalid @enderror"
              value="{{old('location')}}"
              required>

              @error('location')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
             </div>


              <div class="row">
                 
               
    
               {{-- photograph --}}
               <div class="mb-3 col-md-6">
                <label>Photograph  </label>
                
                <input 
                type="text"
                name="photograph"
                class="form-control  @error('photograph') is-invalid @enderror"
                value="{{old('photograph')}}"
                >
                @error('photograph')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
               </div>

               <div class="mb-3 col-md-6 ">
                <label>Sector <span class="text-danger d-inline">*</span></label>
                
                <select name="sector" class="form-control" id="" required>
                  <option value="" selected>Select </option>
                  <option value="Commercial" >Commercial </option>
                  <option value="Residential" >Residential </option>
                </select>

               
               </div>
              </div>
              
             
            
            
         
            {{-- description --}}
            <div class="mb-3">
              <label>
                Description
                <h2 class="text-danger d-inline">*</h2>
              </label>
              <textarea 
              id="summernote"
              name="description"
              value="{{old('description')}}"
              rows="4"
              class="form-control my-2 @error('description') is-invalid @enderror"
              required>
            </textarea>
            </div>

            <div>
              <textarea name="youtube" 
              class="form-control mt-2"
              placeholder="Youtube Code"
              id="" cols="10" rows="5"></textarea>
            </div>
          </div>
          @error('description')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
         @enderror
    
        
         {{-- seo section --}}
          <div class="tab-pane border p-3 fade" id="seo-tags" role="tabpanel" aria-labelledby="seo-tags-tab">
               {{-- meta title --}}
               <div class="mb-3">
                  <label >Meta Title</label>
                  <input 
                  type="text"
                  value="{{old('meta_title')}}"
                  name="meta_title"
                  class="form-control @error('meta_title') is-invalid @enderror"
                  >
                 </div>
                 @error('meta_title')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror

                 {{-- meta keywords --}}
                 <label>
                  Meta Keyword
                </label>
                 <fieldset>
                  <input name='meta_keyword' placeholder='Keyword' value=''>
                </fieldset>
                @error('meta_keyword')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
               

                 {{-- meta description --}}
                 <div class="mb-3">
                  <label>
                    Meta Description
                  </label>
                  <textarea 
                  name="meta_description"
                  value="{{old('meta_description')}}"
                  rows="4"
                  class="form-control my-2 @error('meta_description') is-invalid @enderror"
                  >
                </textarea>
                </div>

          </div>
          @error('meta_description')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
         @enderror
    

          {{--  product-image section --}}
          <div class="tab-pane border p-3 fade" id="product-image" role="tabpanel" aria-labelledby="product-image-tab">
            <div class="my-3">
              <label> 
                Upload Project Images
                <h2 class="text-danger d-inline">*</h2>
              </label>
              <input 
              type="file"
              class="form-control"
              onchange="loadFiles(event)"
              name="image[]"
              
              multiple 
              class="form-control @error('image') is-invalid @enderror" 
              required>
            </div>
            @error('image')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
            @enderror
            {{-- preview image --}}
            <div class="my-3" id="previews">
              
            </div>
          </div>
      </div>
  

      

      </div>
       {{-- submit --}}
      <div>
        <button type="submit" class="btn btn-success float-right">ADD PROJECT </button>
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
  $('#summernote').summernote(); 
  });

  (() => {
    // keyword
  var inputElm = document.querySelector('input[name=meta_keyword]')
  
  const mockAjax = (timeout => (RES, duration) => {
    clearTimeout(timeout); // abort last request
    return new Promise((resolve, reject) => timeout = setTimeout(resolve, duration || 0, RES))
  })()
  
  let tagify = new Tagify(inputElm)
  
  // tagify.on('edit:start', ({detail}) => tagify.setTagTextNode(detail.tag, detail.data.value))
  tagify.on('edit:updated', ({detail: {tagify}}) => {
      tagify.DOM.input.focus()
  });
  
  inputElm && inputElm.addEventListener('change', () => console.log("CHANGED!")  )
  //sizes
  var sizes = document.querySelector('input[name=sizes]')
  

  
  let tagifySizes = new Tagify(sizes)
  
  // tagify.on('edit:start', ({detail}) => tagify.setTagTextNode(detail.tag, detail.data.value))
  tagifySizes.on('edit:updated', ({detail: {tagifySizes}}) => {
    tagifySizes.DOM.input.focus()
  });
  
  sizes && sizes.addEventListener('change', () => console.log("CHANGED!")  )
  })()
</script>
@endpush






