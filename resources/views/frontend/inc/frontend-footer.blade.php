<!-- partial:partials/_footer.html -->
<footer>
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-5">
            <img src="{{asset('frontend/assets/images/logo.svg')}}" class="footer-logo" alt="" />
            <h5 class="font-weight-normal mt-4 mb-5">
              Newspaper is your news, entertainment, music fashion website. We
              provide you with the latest breaking news and videos straight from
              the entertainment industry.
            </h5>
            <ul class="social-media mb-3">
            </ul>
          </div>
          <div class="col-sm-4">
            <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
            @php
                $post_footer = App\Models\Post::where('status','0')->get();
                $cate_item = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
            @endphp
            @foreach ($post_footer->take(3) as $recent_post)
            <div class="row">
                <div class="col-sm-12">
                  <div class="footer-border-bottom pb-2">
                    <div class="row">

                        <div class="col-3 mt-1">
                          <a  class="text-decoration-none text-white " href="{{ url('topic/'.$recent_post->category->slug.'/'.$recent_post->slug)  }}" >
                          <img title=" {{ $recent_post->title }}"
                            src="{{asset('uploads/post/'.$recent_post->image_cover)}}"
                            alt=" {{ $recent_post->name }}"
                            class="img-fluid"/>
                          </a>
                        </div>

                      <div class="col-9">
                        <a  class="text-decoration-none text-white " href="{{ url('topic/'.$recent_post->category->slug.'/'.$recent_post->slug)  }}" >
                            <h5 title="{{ $recent_post->title }}" class="font-weight-600" style="display: -webkit-box;
                            -webkit-line-clamp: 3;
                            -webkit-box-orient: vertical;
                            overflow: hidden; ">
                            {{ $recent_post->title }}
                            </h5>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach


          </div>
          <div class="col-sm-3">
            <h3 class="font-weight-bold mb-3">CATEGORIES</h3>

            @foreach ($cate_item as $all_footer_cate)
            <div class="footer-border-bottom pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="text-light" href="{{ url('topic/'.$all_footer_cate->slug) }}">
                        <h5 title="{{ $all_footer_cate->name }}" class="mb-0 font-weight-600">{{ $all_footer_cate->name }}</h5>
                    </a>
                  {{-- <div class="count">1</div> --}}
                </div>
              </div>
            @endforeach


          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="d-sm-flex justify-content-between align-items-center">
              <div class="fs-14 font-weight-600">
                © 2022 | All rights reserved.
              </div>
              {{-- <div class="fs-14 font-weight-600">
                Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">BootstrapDash</a>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

