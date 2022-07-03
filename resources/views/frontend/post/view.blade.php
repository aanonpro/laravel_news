@extends('frontend.master')

@section('title',"$post->meta_title")
@section('meta_description',"$post->meta_description")
@section('meta_keyword',"$post->meta_keyword")

@section('content')




  <div class="content-wrapper">
    <div class="container">
      <div class="col-sm-12">
        <div class="card" data-aos="fade-up">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8">
                <div>
                  <h1 class="font-weight-600 mb-1">
                    {!! $post->title !!}
                  </h1>
                  <p class="fs-13 text-muted mb-0">
                    <a class="text-decoration-none" style="color: #032a63;" href="{{ url('topic/'.$category->slug) }}">
                        <span class="mr-2">{{ $category->name }} </span>
                    </a>
                        {{ $post->created_at->format('d-m-Y') }}
                  </p>
                  {{-- <div>
                    <img
                      src="../assets/images/inner/inner_1.jpg"
                      alt="banner"
                      class="img-fluid mt-4 mb-4"
                    />
                  </div> --}}
                  <p class="mb-4 fs-15">
                    {!! $post->Description !!}
                  </p>
                </div>


              </div>
              <div class="col-lg-4">
                <h2 class="mb-4 text-primary font-weight-600">
                  Latest news
                </h2>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="border-bottom pb-4 pt-4">
                      <div class="row">
                        <div class="col-sm-8">

                            @foreach ($lastest_posts as $lastest_posts_item)

                            <a href="{{ url('topic/'.$lastest_posts_item->category->slug.'/'.$lastest_posts_item->slug) }}"  class="text-decoration-none text-dark">
                                <h5 class="font-weight-600 mb-1" style="display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden; ">
                                    {{$lastest_posts_item->title}}
                                </h5>
                            </a>

                            @endforeach

                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2"><a class="text-decoration-none" style="color: #032a63;"  href="{{ url('topic/'.$category->slug) }}">{{ $category->name }}</a> </span>
                            {{$lastest_posts_item->created_at->format('d-m-Y')}}
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
                {{-- <div class="row">
                  <div class="col-sm-12">
                    <div class="border-bottom pb-4 pt-4">
                      <div class="row">
                        <div class="col-sm-8">
                          <h5 class="font-weight-600 mb-1">
                            Premier League players join charity..
                          </h5>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2">Photo </span>10 Minutes ago
                          </p>
                        </div>
                        <div class="col-sm-4">
                          <div class="rotate-img">
                            <img
                              src="{{asset('frontend/assets/images/inner/inner_8.jpg')}}"
                              alt="banner"
                              class="img-fluid"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="pt-4">
                      <div class="row">
                        <div class="col-sm-8">
                          <h5 class="font-weight-600 mb-1">
                            UK Athletics board changed stance on..
                          </h5>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2">Photo </span>10 Minutes ago
                          </p>
                        </div>
                        <div class="col-sm-4">
                          <div class="rotate-img">
                            <img
                              src="{{asset('frontend/assets/images/inner/inner_9.jpg')}}"
                              alt="banner"
                              class="img-fluid"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
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
