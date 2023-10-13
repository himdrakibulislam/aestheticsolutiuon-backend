@extends('layouts.admin')
@section('title',$blog->title)
@section('content')
<section class="content-wrapper">
    <div class="content row ">
      <div class="col-md-2"></div>
      <div class="col-md-8 text-black">
        <div class="card p-2 ">
         
            
            <div class="d-flex mx-2 border p-2 rounded">
              @if ($blog->admin->photoURL)
              <img 
              class="img-circle elevation-2 "
              width="40"
              height="40"
              src="{{$blog->admin->photoURL}}"
             alt="img">
                  @else
                  <h3 class="">
                    <i class="far fa-user"></i>
                  </h3>
              @endif
              


              <div class="mx-2">
                <small class="badge bg-green ">Author  </small>
                 <span class="d-block fw-bold">
                  {{$blog->admin->name}}</span>
                 <small>{{$blog->admin->email}}</small>
                
              </div>
            </div>
        
        <h3>{{$blog->title}}</h3>
        {!!$blog->short_description!!}
        <img 
        src="{{asset($blog->banner)}}" 
        class="d-block"
        width="100%"
        height="50%"
        alt="banner_image">
       
       <b class="my-2 text-right">File Size : {{number_format(filesize($blog->banner) / 1024,2)}} KB </b>
        <div class="">
            {!!$blog->description!!}
        </div>
      <hr>
        {{-- <div class="my-1">
            <p>Comments ({{$blog->comments->count()}})</p>
            @if ($blog->comments->count() > 0)
            @foreach ($blog->comments as $row)
               <div class="d-flex">
                <div class="mx-4 mb-4">
                <img 
                class="img-circle elevation-2 "
                width="40"
                height="40"
                src="{{$row->user->photoURL ? asset($row->user->photoURL) : asset('assets/dist/img/avatar.png')
              }}"
                 alt="user">
                </div>
                <div>
                    <span class="fw-bold">{{$row->user->name}}</span><br>
                    <small class="font-thin">{{$row->user->email}}</small>
                    <p class="text-justify">{{$row->content}}</p>
                </div>
               </div>
               @foreach ($row->replies as $reply)
               <div class="d-flex ml-5">
                <div class="mx-4 mb-4">
                <img 
                class="img-circle elevation-2 "
                width="40"
                height="40"
                src="{{ $reply->user->photoURL ? asset($reply->user->photoURL) : asset('assets/dist/img/avatar.png') }}"
                 alt="user">
                </div>
                <div>
                    <span class="fw-bold">{{$reply->user_name}}</span><br>
                    <small class="font-thin">{{$reply->user->email}}</small>
                    <p class="text-justify">{{$reply->content}}</p>
                </div>
               </div>
               @endforeach
            @endforeach
            @else
            <p class="font-bold text-center my-4">No Comments</p>
            @endif

            <hr>
        
        </div> --}}

        <button class="btn btn-danger w-100"
            data-toggle="modal" data-target="#exampleModalCenter"
            >Detele Blog</button>
        </div>
      </div>
      <div class="col-md-2"></div>

      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Do you want to delete this post ? 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
              <form action="{{url('admin/post/delete/'.$blog->id)}}" method="POST">
                @csrf
                @method('Delete')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

