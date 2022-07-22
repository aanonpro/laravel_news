@extends('frontend.master')

@section('title',"$category->name")
@section('meta_description',"$category->meta_description")
@section('meta_keyword',"$category->meta_keywords")

@section('content')

    <style>

        .page-news, .relate-page, .popular-page{
            color: #383a3b !important;
            font-family: 'Kantumruy Pro', sans-serif;
        }
        .short-page-news{
            font-family: 'Roboto', sans-serif;
        }

    .active{
    color: #2066d6 !important;
    }

    .pagination {
    padding-bottom: 10px !important;
    padding-top: 10px !important;
    }

    .pagination .page-item.active .page-link, .pagination .page-item:hover .page-link, .pagination .page-item:focus .page-link, .pagination .page-item:active .page-link {
    color: #ffffff !important;
    }

    .pagination .page-item .page-link {
        border-color: #e6e7e8;
        /* color: #ffffff !important; */
        font-size: 14px !important;
        font-weight: 500 !important;
        /* padding: 15px 64px; */
    }
    .page-item.active .page-link {
        z-index: 3;
        /* color: #fff !important; */
        background-color: #032a63 !important;
        border-color: #032a63;
    }
    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem !important;
        margin-left: -1px !important;
        line-height: 1.25 !important;
        color: #032a63 !important;
        background-color: #fff ;
        border: 1px solid #dee2e6;
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
                                <h2 class="font-weight-600 mb-2 page-news" style=" display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;">
                                    {{ $postitem->title }}
                                </h2>
                            </a>
                        <p class="fs-13 text-muted mb-0" style="color: #032a63 !important;">
                            <span class="mr-2">Posted On -</span>{{ $postitem->created_at->translatedFormat(' F j, Y') }} |
                            <span class="mr-2"> By -</span>{{ $postitem->user->name }}
                        </p>
                        <p class="fs-15 short-page-news "  style=" display: -webkit-box;
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
                 Relate Post
                </h2>
                @foreach ($latest_posts as $last_item)

                <div class="row">
                  <div class="col-sm-12">
                    <div class="border-bottom pb-4 pt-4">
                      <div class="row">
                        <div class="col-sm-8">
                            <a class="text-decoration-none " style=" color:rgb(15, 14, 14);" href="{{ url('topic/'.$last_item->category->slug.'/'.$last_item->slug)  }}" >
                          <h5 class="font-weight-600 mb-1 relate-page" style="display: -webkit-box;
                          -webkit-line-clamp: 2;
                          -webkit-box-orient: vertical;
                          overflow: hidden; ">
                            {{ $last_item->title }}
                          </h5>
                            </a>
                          <p class="fs-13 text-muted mb-0" >
                            <span class="mr-2" style="color: #032a63 !important;">{{ $last_item->category->name}} </span>{{ $last_item->created_at->translatedFormat('F j , Y') }}
                          </p>
                        </div>
                        <div class="col-sm-4">
                            <a class="text-decoration-none " style=" color:rgb(15, 14, 14);" href="{{ url('topic/'.$last_item->category->slug.'/'.$last_item->slug) }}" >

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
                  </div>

                </div>
                {{-- popular post --}}

                <h2 class=" text-primary font-weight-600">
                    Popular Post
                </h2>

                  @foreach ($popular_posts as $p_item)
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="border-bottom pb-4 pt-4">
                        <div class="row">
                          <div class="col-sm-8">


                              <a href="{{ url('topic/'.$p_item->category->slug.'/'.$p_item->slug) }}"  class="text-decoration-none text-dark">
                                  <h5 class="font-weight-600 mb-1 popular-page" style="display: -webkit-box;
                                  -webkit-line-clamp: 2;
                                  -webkit-box-orient: vertical;
                                  overflow: hidden; ">
                                      {{$p_item->title}}
                                  </h5>
                              </a>


                            <p class="fs-13 text-muted mb-0">
                              <span class="mr-2"><a class="text-decoration-none" style="color: #032a63;"  href="{{ url('topic/'.$category->slug) }}">{{ $category->name }}</a> </span>
                              {{$p_item->created_at->translatedFormat(' F j , Y')}}
                            </p>
                          </div>
                          <div class="col-sm-4">
                              <a href="{{ url('topic/'.$p_item->category->slug.'/'.$p_item->slug) }}"  class="text-decoration-none text-dark">

                                  <div class="rotate-img">
                                      <img
                                      src="{{asset('uploads/post/'.$p_item->image_cover)}}"
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

              </div>
            </div>
          </div>

          <div class="d-flex justify-content-center mt-5">
            {{ $post->links() }}
          </div>

        </div>
      </div>
    </div>

  </div>
  <!-- main-panel ends -->
  <!-- container-scroller ends -->


@endsection
