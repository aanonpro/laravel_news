@extends('frontend.master')

@section('title',"$category->name")
@section('meta_description',"$category->meta_description")
@section('meta_keyword',"$category->meta_keywords")

@section('content')



<!-- partial -->
{{-- <div class="flash-news-banner">
    <div class="container">
      <div class="d-lg-flex align-items-center justify-content-between"> --}}
        {{-- <div class="d-flex align-items-center">
          <span class="badge badge-dark mr-3">Flash news</span>
          <p class="mb-0">
            Lorem Ipsum has been the industry's standard dummy text ever
            since the 1500s.
          </p>
        </div> --}}
        {{-- <div class="d-flex">
          <span class="mr-3 text-danger">Wed, March 4, 2020</span>
          <span class="text-danger">30°C,London</span>
        </div>
      </div>
    </div>
  </div> --}}
  <div class="content-wrapper">
    <div class="container">
      <div class="col-sm-12">
        <div class="card" data-aos="fade-up">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <h1 class="font-weight-600 mb-4">
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
                                overflow: hidden;">
                                    {{ $postitem->title }}
                                </h2>
                            </a>
                        <p class="fs-13 text-muted mb-0">
                            <span class="mr-2">Posted On -</span>{{ $postitem->created_at->format('d-m-Y') }} |
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
                <h2 class="mb-4 text-primary font-weight-600">
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
                            <span class="mr-2">{{ $last_item->category->name}} </span>{{ $last_item->created_at->format('d-m-Y') }}
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

          {{-- <div class="your-paginate mt-3">
            {{ $post->links()}}sdsffe
        </div> --}}
        </div>
      </div>
    </div>

  </div>
  <!-- main-panel ends -->
  <!-- container-scroller ends -->



@endsection
