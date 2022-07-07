<style>

  .active{
  color: #2066d6 !important;
  }

</style>

<div class="container-scroller">
    <div class="main-panel">
      <!-- partial:partials/_navbar.html -->
      <header id="header">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-top">
              <div class="d-flex justify-content-between align-items-center">
                <ul class="navbar-top-left-menu">

                </ul>
                <ul class="navbar-top-right-menu">

                </ul>
              </div>
            </div>
            <div class="navbar-bottom">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  @php
                    $setting = App\Models\Setting::find(1);
                  @endphp
                  @if ($setting)

                  <a class="navbar-brand" href="{{ url('/') }}"
                    ><img src="{{asset('uploads/settings/'.$setting->logo)}}" alt=""
                  /></a>

                  @endif
                </div>
                <div>
                  <button
                      class="navbar-toggler"
                      type="button"
                      data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent"
                      aria-expanded="false"
                      aria-label="Toggle navigation"
                    >
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  <div
                    class="navbar-collapse justify-content-center collapse"
                    id="navbarSupportedContent"
                  >
                    <ul
                      class="navbar-nav d-lg-flex justify-content-between align-items-center"
                    >
                      <li>
                        <button class="navbar-close">
                          <i class="mdi mdi-close"></i>
                        </button>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link {{ Request::is('/') ? 'active':'' }}" href="{{ url('/') }}">Home</a>
                      </li>
                        @php
                            $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
                        @endphp

                        @foreach ($categories as $cateitem)
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('topic/'.$cateitem->slug) ? 'active':'' }}" href="{{ url('topic/'.$cateitem->slug) }}">{{ $cateitem->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                  </div>
                </div>
                <ul class="social-media">

                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>
