@extends('frontend.master')

@section('title',"$post->meta_title")
@section('meta_description',"$post->meta_description")
@section('meta_keyword',"$post->meta_keyword")

@section('content')

<style>

    .title{
         font-size: 24px !important;
        line-height: 38px !important;
        margin-bottom: 10px !important;
        color: #383a3b !important;
        font-family: 'Kantumruy Pro', sans-serif;
    }
    .relate , .popular{
        color: #383a3b !important;
        font-family: 'Kantumruy Pro', sans-serif;
    }

</style>


  <div class="content-wrapper">
    <div class="container">
      <div class="col-sm-12">
        <div class="card" data-aos="fade-up">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8">
                <div>
                  <h1 class="font-weight-600 mb-1 title">
                    {!! $post->title !!}
                  </h1>
                  <p class="fs-13 text-muted mb-0">
                    <a class="text-decoration-none" style="color: #032a63;" href="{{ url('topic/'.$category->slug) }}">
                        <span class="mr-2">{{ $category->name }} </span>
                    </a>
                        {{ $post->created_at->translatedFormat('l , F j , Y') }}
                  </p>

                  <p class="mb-4 fs-15">
                    {!! $post->Description !!}
                  </p>
                </div>

                {{-- <div class="fb-like" data-href="{{ url('/topic/'.$post) }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div> --}}

                <div id="fb-root" class="mt-4"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0&appId=303841328305629&autoLogAppEvents=1" nonce="Irhx79gB"></script>

                <div class="fb-like" data-href="{{url('topic/'.$category->slug.'/'.$post->slug)}}"
                data-layout="standard"
                data-action="like"
                data-size="small"
                data-show-faces="false"
                data-share="true">
                </div>
              </div>
            <div class="col-lg-4">
                <h2 class=" text-primary font-weight-600">
                  Relate Post
                </h2>

                @foreach ($lastest_posts as $lastest_posts_item)

                <div class="row">
                  <div class="col-sm-12">
                    <div class="border-bottom pb-4 pt-4">
                      <div class="row">
                        <div class="col-sm-8">
                            <a href="{{ url('topic/'.$lastest_posts_item->category->slug.'/'.$lastest_posts_item->slug) }}"  class="text-decoration-none text-dark">
                                <h5 class="font-weight-600 mb-1 relate" style="display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden; ">
                                    {{$lastest_posts_item->title}}
                                </h5>
                            </a>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2"><a class="text-decoration-none" style="color: #032a63;"  href="{{ url('topic/'.$category->slug) }}">{{ $category->name }}</a> </span>
                            {{$lastest_posts_item->created_at->translatedFormat(' F j , Y')}}
                          </p>
                        </div>
                        <div class="col-sm-4">
                            <a href="{{ url('topic/'.$lastest_posts_item->category->slug.'/'.$lastest_posts_item->slug) }}"  class="text-decoration-none text-dark">

                                <div class="rotate-img">
                                    <img
                                    src="{{asset('uploads/post/'.$lastest_posts_item->image_cover)}}"
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
                    <div >
                      <img
                        src="{{asset('frontend/assets/images/inner/inner_10.jpg')}}"
                        alt="banner"
                        class="img-fluid"
                      />
                    </div>

                  </div>

                </div>
                {{-- popular post  --}}

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
                                  <h5 class="font-weight-600 mb-1 popular" style="display: -webkit-box;
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
        </div>
      </div>
    </div>
  </div>
  <!-- main-panel ends -->
  <!-- container-scroller ends -->


@endsection
