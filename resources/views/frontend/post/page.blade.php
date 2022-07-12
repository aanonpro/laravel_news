@extends('frontend.master')

@section('title',"$category->name")
@section('meta_description',"$category->meta_description")
@section('meta_keyword',"$category->meta_keywords")

@section('content')

  <style>
    .active{
    color: #2066d6 !important;
    }

  </style>

  <div class="content-wrapper">
    <div class="container">
      <div class="col-sm-12">
        <div class="card" data-aos="fade-up">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <h1 class="font-weight-600 mb-4" style="color: #032a63 !important;">
                  {{ $category->name }}
                </h1>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">

                @forelse ($post as $postitem)

                <div class="row">
                  <div class="col-sm-4 grid-margin">
                      <a class="text-decoration-none " href="{{ url('topic/'.$category->slug.'/'.$postitem->slug)  }}" >
                        <div class="rotate-img">
                            <img
                            src="{{ asset('uploads/post/'.$postitem->image_cover) }}"
                            alt="banner"
                            class="img-fluid"
                            />
                        </div>
                      </a>
                  </div>
                  <div class="col-sm-8 grid-margin">
                    <a class="text-decoration-none " style=" color:rgb(15, 14, 14);" href="{{ url('topic/'.$category->slug.'/'.$postitem->slug)  }}" >
                        <h2 class="font-weight-600 mb-2 " style=" display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden; color: #032a63 !important;">
                            {{ $postitem->title }}
                        </h2>
                    </a>
                    <p class="fs-13 text-muted mb-0">
                        <span class="mr-2">Posted On -</span>{{ $postitem->created_at->translatedFormat(' F j, Y') }} |
                        <span class="mr-2"> By -</span>{{ $postitem->user->name }}
                    </p>
                    <p class="fs-15 "  style=" display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;">
                        {!! $postitem->short_title !!}
                    </p>
                  </div>
                </div>

                @empty

                  <div class="row">
                    <div class="col-sm-8 grid-margin">
                      <h2 class="font-weight-600 mb-2">
                        No Post Available
                      </h2>
                    </div>
                  </div>

                @endforelse

              </div>
              <div class="col-lg-4">
                <h2 class=" text-primary font-weight-600">
                  Latest news
                </h2>

                @foreach ($latest_posts as $last_item)

                <div class="row">
                  <div class="col-sm-12">
                    <div class="border-bottom pb-4 pt-4">
                      <div class="row">
                        <div class="col-sm-8">
                            <a class="text-decoration-none " style=" color:rgb(15, 14, 14);" href="{{ url('topic/'.$category->slug.'/'.$last_item->slug)  }}" >
                          <h5 class="font-weight-600 mb-1" style="display: -webkit-box;
                          -webkit-line-clamp: 2;
                          -webkit-box-orient: vertical;
                          overflow: hidden; ">
                            {{ $last_item->title }}
                          </h5>
                            </a>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2">{{ $last_item->category->name}} </span>{{ $last_item->created_at->translatedFormat('F j , Y') }}
                          </p>
                        </div>
                        <div class="col-sm-4">
                            <a class="text-decoration-none " style=" color:rgb(15, 14, 14);" href="{{ url('topic/'.$category->slug.'/'.$last_item->slug)  }}" >

                                <div class="rotate-img">
                                    <img
                                    src="{{asset('uploads/post/'.$last_item->image_cover)}}"
                                    alt="banner"
                                    class="img-fluid"
                                    />
                                </div>
                            </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                @endforeach

                <div class="trending">
                  <h2 class="mb-4 text-primary font-weight-600">
                    Advertising
                  </h2>
                  <div class="mb-4">
                    <div class="rotate-img">
                      <img
                        src="{{asset('frontend/assets/images/art/art_4.png')}}"
                        alt="banner"
                        class="img-fluid"
                      />
                    </div>
                    <h3 class="mt-3 font-weight-600">
                      Virus Kills Member Of Advising Iran’s Supreme
                    </h3>
                    <p class="fs-13 text-muted mb-0">
                      <span class="mr-2">Photo </span>10 Minutes ago
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- pagination  --}}
          <div class="d-flex justify-content-center mt-5 mb-2">
              {{-- {{ $post->links() }} --}}
              <a wire:click="load" class="btn btn-primary text-light"> Load more...</a>
          </div>
          {{-- end pagination  --}}
        </div>
      </div>
    </div>

  </div>
  <!-- main-panel ends -->
  <!-- container-scroller ends -->

  

@endsection
