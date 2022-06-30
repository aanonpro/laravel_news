@extends('frontend.master')

@section('title',"Nisai News")
@section('meta_description',"Nisai News world news")
@section('meta_keyword',"Nisai News world news")

@section('content')


  <div class="content-wrapper">
    <div class="container">
      <div class="row" data-aos="fade-up">

        @foreach ($all_posts->take(1) as $all_post_item)

            <div class="col-xl-8 stretch-card grid-margin">
                <a class="text-decoration-none " href="{{ url('topic/'.$all_post_item->category->slug.'/'.$all_post_item->slug)  }}" >
                    <div class="position-relative">
                        <img
                        src="{{ asset('uploads/post/'.$all_post_item->image_cover) }}"
                        alt="banner"
                        class="img-fluid"
                        />
                        <div class="banner-content">
                        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                            {{ $all_post_item->category->name }}
                        </div>
                        {{-- <h1 class="mb-0">GLOBAL PANDEMIC</h1> --}}
                        <h1 class="mb-2 " style=" display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;">
                            {!! $all_post_item->short_title !!}
                        </h1>
                        <div class="fs-12">
                            <span class="mr-2">Posted On - </span>{{ $all_post_item->created_at->format('d-m-Y') }} |
                            <span class="mr-2">By - </span>{{$all_post_item->user->name}}
                        </div>
                        </div>
                    </div>
                </a>
            </div>

        @endforeach

        <div class="col-xl-4 stretch-card grid-margin">
          <div class="card bg-dark text-white">
            <div class="card-body">
              <h2>Latest news</h2>

              @foreach ($all_posts as $all_cate_item)

              <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between" >


                    <div class="pr-3">
                        <a  class="text-decoration-none text-white " href="{{ url('topic/'.$all_cate_item->category->slug.'/'.$all_cate_item->slug)  }}" >
                            <h5 style=" max-width: 175px; display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden; ">{{ $all_cate_item->title }}</h5>

                    <div class="fs-12">
                        <span class="mr-2"> {{ $all_cate_item->category->name }} </span> - {{$all_cate_item->created_at->format('d-m-Y')}}

                    </div>
                    </div>

                    <div class="rotate-img">
                    <img
                        src="{{ asset('uploads/post/'.$all_cate_item->image_cover) }}"
                        alt="thumb"
                        class="img-fluid img-lg" />
                    </div>
                </a>
              </div>

              @endforeach



            </div>
          </div>
        </div>
      </div>
      <div class="row" data-aos="fade-up">
        <div class="col-lg-3 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <h2>Category</h2>
              <ul class="vertical-menu">
                @foreach ($cate_item as $catelist_item )

                <li><a href="{{ url('topic/'.$catelist_item->slug) }}">{{$catelist_item->name}}</a></li>

                @endforeach

              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
                @php

                $cate_items = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
            @endphp
                @foreach ($all_posts as $home_all_post)

              <div class="row">
                <div class="col-sm-4 grid-margin">
                  <div class="position-relative">
                    <a  class="text-decoration-none " href="{{ url('topic/'.$home_all_post->category->slug.'/'.$home_all_post->slug)  }}" >

                        <div class="rotate-img">
                        <img
                            src="{{asset('uploads/post/'.$home_all_post->image_cover)}}"
                            alt="thumb"
                            class="img-fluid"
                        />
                        </div>
                        <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                                >{{$home_all_post->category->name}}</span>
                        </div>
                    </a>
                  </div>
                </div>

                <div class="col-sm-8  grid-margin">
                    <a  class="text-decoration-none text-dark " href="{{ url('topic/'.$home_all_post->category->slug.'/'.$home_all_post->slug)  }}" >

                        <h2 class="mb-2 font-weight-600" style=" display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;">
                            {{$home_all_post->title}}
                        </h2>
                    </a>
                  <div class="fs-13 mb-2">
                    <span class="mr-2">Posted On - </span>{{$home_all_post->created_at->format('d-m-Y')}} |
                    <span class="mr-2">By - </span>{{$home_all_post->user->name}}
                  </div>
                  <p class="mb-0"  style=" display: -webkit-box;
                  -webkit-line-clamp: 2;
                  -webkit-box-orient: vertical;
                  overflow: hidden;">
                    {{$home_all_post->short_title}}
                  </p>
                </div>
              </div>
              @endforeach
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
  <!-- container-scroller ends -->


@endsection
