@extends('frontend.master')

@section('title',"home")
@section('meta_description',"home page")
@section('meta_keyword',"home page keywords")

{{-- @section('title',"$setting->meta_title")
@section('meta_description',"$setting->meta_description")
@section('meta_keyword',"$setting->meta_keyword") --}}

@section('content')

<style>

    .news-slide{
        font-family: 'Kantumruy Pro', sans-serif;
        font-weight: 600;
    }
    .latest{
        font-family: 'Kantumruy Pro', sans-serif;
    }
    .news-content{
        color: #383a3b !important;
        font-family: 'Kantumruy Pro', sans-serif;
    }
    .short_news{
        color: #383a3b !important;
        font-family: 'Roboto', sans-serif;
    }


    h1:hover{
        color: #ffffff !important;
        filter:brightness(1) !important;
        text-shadow: rgb(232, 232, 236) 0px 0 3px;
        /* text-shadow: 1px 1px 1px rgb(255, 255, 255), 0 0 0.1em #ffffff!important; */
  /* -webkit-filter:brightness(0.7) !important; */
    }
    h5:hover{
        color: #ffffff !important;
        filter:brightness(1) !important;
        text-shadow: rgb(232, 232, 236) 0px 0 2px;
  /* -webkit-filter:brightness(0.7) !important; */
    }

    .title_news:hover{
        color:  #585e61 !important;
        filter:brightness(1) !important;
        text-shadow: rgb(59, 59, 68) 0px 0 1px;
    }

    .cate{
        color: #1358be !important;
    }

</style>

  <div class="content-wrapper">
    <div class="container">
      <div class="row" data-aos="fade-up">

        @foreach ($all_posts->take(1) as $all_post_item)

            <div class="col-xl-8 stretch-card grid-margin"  >
                <a class="text-decoration-none" href="{{ url('topic/'.$all_post_item->category->slug.'/'.$all_post_item->slug)  }}" >
                    <div class="position-relative" >
                        <img
                        src="{{ asset('uploads/post/'.$all_post_item->image_cover) }}"
                        alt="banner"
                        class="img-fluid"
                        style=" max-width: 100%;
                        max-height820%;

                        object-fit: cover;
                       "

                        />
                        <div class="banner-content">
                        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                            {{ $all_post_item->category->name }}
                        </div>
                        {{-- <h1 class="mb-0">GLOBAL PANDEMIC</h1> --}}
                        <h1 title="{!! $all_post_item->title !!}" class="mb-2 news-slide" style=" display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;">
                            {!! $all_post_item->title !!}
                        </h1>
                        <div class="fs-12">
                            <span class="mr-2">Posted On - </span>{{ $all_post_item->created_at->translatedFormat(' F j, Y') }} |
                            <span class="mr-2">By - </span>{{$all_post_item->user->name}}
                        </div>
                        </div>
                    </div>
                </a>
            </div>

        @endforeach

        {{-- start latest news  --}}
        <div class="col-xl-4 stretch-card grid-margin">
          <div class="card bg-dark text-white">
            <div class="card-body">
              <h2>Latest news</h2>

              @foreach ($latest_news as $all_latest_item)

              <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between" >

                    <div class="pr-3">
                        <a  class="text-decoration-none text-white " href="{{ url('topic/'.$all_latest_item->category->slug.'/'.$all_latest_item->slug)  }}" >
                            <h5 title="{{ $all_latest_item->title }}" class="latest" style="display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden; ">{{ $all_latest_item->title }}</h5>

                    <div class="fs-12">
                        <span title="{{ $all_latest_item->category->name }} " class="mr-2 cate"> {{ $all_latest_item->category->name }} </span> - {{$all_latest_item->created_at->translatedFormat(' F j, Y')}}

                    </div>
                    </div>

                    <div class="rotate-img">
                    <img title="{{ $all_latest_item->title }}"
                        src="{{ asset('uploads/post/'.$all_latest_item->image_cover) }}"
                        alt="{{ $all_latest_item->name }}"
                        class="img-fluid img-lg" />
                    </div>
                </a>
              </div>

              @endforeach



            </div>
          </div>
        </div>
        {{-- end latest news  --}}

      </div>
      <div class="row" data-aos="fade-up">
        <div class="col-lg-3 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <h2>Category</h2>
              <ul class="vertical-menu">
                @foreach ($cate_item as $catelist_item )

                <li><a title="{{$catelist_item->name}}" href="{{ url('topic/'.$catelist_item->slug) }}">{{$catelist_item->name}}</a></li>

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
                            <img title="{{$home_all_post->title}}"
                                src="{{asset('uploads/post/'.$home_all_post->image_cover)}}"
                                alt="{{$home_all_post->name}}"
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

                            <h2 title="{{$home_all_post->title}}" class="mb-2 font-weight-600 title_news news-content" style=" display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden;">
                                {{$home_all_post->title}}
                            </h2>
                        </a>
                    <div class="fs-13 mb-2">
                        <span class="mr-2">Posted On - </span>{{$home_all_post->created_at->translatedFormat(' F j, Y')}} |
                        <span class="mr-2">By - </span>{{$home_all_post->user->name}}
                    </div>
                    <p class="mb-0 short_news"  style=" display: -webkit-box;
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
