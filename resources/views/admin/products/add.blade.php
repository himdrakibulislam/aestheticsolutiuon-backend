@extends('layouts.admin')
@section('title','products')
@section('content')
<div class="content-wrapper">
   <div class="content">
    <div class="card">
      <div class="card-header">
          <h6 class="d-inline">Add Product</h6>


        


          <a href="{{url('admin/products')}}" class="btn btn-outline-primary btn-sm float-right">Back</a>
      </div>
      <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-warning">
              @foreach ($errors->all() as $error)
                  <div>{{$error}}</div>
              @endforeach
            </div>
        @endif


       <form action="{{url('admin/products')}}" enctype="multipart/form-data" method="POST">
         @csrf
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="seo-tags-tab" data-toggle="tab" data-target="#seo-tags" type="button" role="tab" aria-controls="seo-tags" aria-selected="false">SEO Tags</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="details-tab" data-toggle="tab" data-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="product-image-tab" data-toggle="tab" data-target="#product-image" type="button" role="tab" aria-controls="product-image" aria-selected="false">Product Image</button>
          </li>
         
      </ul>
        {{-- tab contents --}}
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane border p-3 fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

              {{-- category --}}
              <div class="mb-3">
                  <label>
                    Select Category <h2 class="text-danger d-inline">*</h2>
                  </label>
                <select 
                  name="category_id"
                  class="form-control my-2 @error('category_id') is-invalid @enderror"
                  value="{{old('category_id')}}"
                  required>
                  <option>Select One</option>
                  @foreach ($categories as $category)
                      <option value="{{$category->id}}"
                       
                        >
                        {{$category->name}}</option>
                  @endforeach
                 </select> 
              </div>
              @error('category_id')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
             @enderror
               {{-- name --}}
               <div class="mb-3">
                <label>Name <h2 class="text-danger d-inline">*</h2></label>
                <input 
                type="text"
                name="name"
                class="form-control  @error('name') is-invalid @enderror"
                value="{{old('name')}}"
                required>
               </div>
               @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
               {{-- slug --}}
               {{-- <div class="mb-3">
                <label>Slug</label>
                <input 
                type="text"
                name="slug"
                value="{{old('slug')}}"
                class="form-control  @error('slug') is-invalid @enderror"
                >
               </div>
                 @error('slug')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror --}}
                {{-- brand --}}
              <div class="mb-3">
                  <label>
                    Select Brand
                    <h2 class="text-danger d-inline">*</h2>
                  </label>
                <select 
                  name="brand"
                
                  class="form-control my-2 @error('brand_id')is-invalid @enderror"
                  required>
                  <option>Select One</option>
                  @foreach ($brands as $brand)
                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                 </select>
              </div>
                 @error('brand_id')
                 <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror
            {{-- small description --}}
            <div class="mb-3">
              <label>
                Small Description (500 Words)
              </label>
              <textarea 
              id="summernote"
              name="small_description"
              rows="4"
              value="{{old('small_description')}}"
              class="form-control my-2 @error('small_description') is-invalid @enderror"
              >
            </textarea>
            </div>
            @error('small_description')
            <div class="alert alert-danger">
              {{ $message }}
            </div>
           @enderror
            {{-- description --}}
            <div class="mb-3">
              <label>
                Description
                <h2 class="text-danger d-inline">*</h2>
              </label>
              <textarea 
              
              name="description"
              value="{{old('description')}}"
              rows="4"
              class="form-control my-2 @error('description') is-invalid @enderror"
              required>
            </textarea>
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
                 {{-- <div class="mb-3">
                  <label>
                    Meta Keyword
                  </label>
                  <textarea 
                  name="meta_keyword"
                  value="{{old('meta_keyword')}}"
                  rows="4"
                  class="form-control my-2  @error('meta_keyword') is-invalid @enderror"
                  >
                </textarea>
                </div>
                @error('meta_keyword')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror --}}



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
            {{-- details section --}}
          <div class="tab-pane border p-3 fade" id="details" role="tabpanel" aria-labelledby="details-tab">

              <div class="row">
                  {{-- original price --}}
                  <div class="col-md-4">
                      <label>
                        Original Price
                        <h2 class="text-danger d-inline">*</h2>
                      </label>
                      <input 
                      type="number" 
                      value="{{old('original_price')}}"
                      name="original_price"
                      class="form-control @error('original_price') is-invalid @enderror"
                      required
                      >
                  </div>
                  @error('original_price')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror
                  {{-- selling price --}}
                  <div class="col-md-4">
                      <label>
                        Selling Price
                        <h2 class="text-danger d-inline">*</h2>
                      </label>
                      <input 
                      type="number" 
                      value="{{old('selling_price')}}"
                      name="selling_price"
                      class="form-control @error('selling_price') is-invalid @enderror"
                      required
                      >
                  </div>
                  @error('selling_price')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror
                  {{-- quantity --}}
                  <div class="col-md-4">
                      <label>
                        Quantity
                        <h2 class="text-danger d-inline">*</h2>
                      </label>
                      <input 
                      type="number" 
                      name="quantity"
                      value="{{old('quantity')}}"
                      class="form-control @error('quantity') is-invalid @enderror"
                      required
                      >
                  </div>
                  @error('quantity')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror

                 {{-- sizes --}}
                 <div class="col-md-12">
                  <label>
                   Sizes
                  </label>
                   <fieldset>
                    <input name='sizes' placeholder='Sizes' value=''>
                  </fieldset>
                  @error('sizes')
                      <div class="alert alert-danger">
                        {{ $message }}
                      </div>
                    @enderror
                 </div>

                  {{-- trending --}}
                  <div class="col-md-3 my-2">
                      <label>Trending</label>
                      <input type="checkbox" name="trending" 
                      value="{{old('trending')}}"
                      class="@error('trending') is-invalid @enderror"
                      style="width:20px; height:20px">
                  </div>
                  @error('trending')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror
                  {{-- status --}}
                  <div class="col-md-3 my-2">

                      <label >Visibility</label>
                      <input type="checkbox" name="status"
                      value="{{old('status')}}"
                      class="@error('status') is-invalid @enderror"
                      style="width:20px; height:20px">
                  </div>
                  @error('status')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror



              </div>
          </div>

          {{--  product-image section --}}
          <div class="tab-pane border p-3 fade" id="product-image" role="tabpanel" aria-labelledby="product-image-tab">
            <div class="my-3">
              <label> 
                Upload Product Images
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
  

       {{-- product color--}}
       <div class="tab-pane border p-3 fade" id="product-color" role="tabpanel" aria-labelledby="product-color-tab">
        <div class="mb-3">
          <label>Select Color</label>
          <div class="row">
            {{-- @forelse ($colors as $colorItem)
                <div class="col-md-3 p-2 border mb-3">
                 Color : <input 
                 type="checkbox" 
                 class="mb-2" 
                 name="colors[{{$colorItem->id}}]" 
                 value="{{$colorItem->id}}">
                   colors : {1,2}
                  {{$colorItem->name}}
                  <br>
                  quantity[1] : user input like 1 
                    result quanity : {colorId:userinput}
                    demo quantity : {1:3,2:4} 
                   
                  Quantity : 
                  <input 
                  type="number"
                  name="colorQuantity[{{$colorItem->id}}]"
                  style="width:70px; border:1px solid;">
                </div>

            @empty
                <div class="col-md-12">
                  <h3>No color</h3>
                </div>
            @endforelse --}}
          </div>
        </div>

      </div>
       {{-- submit --}}
      <div>
        <button type="submit" class="btn btn-outline-success float-right">ADD PRODUCT</button>
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






