 <div class="header-area header-transparent">
    <div class="main-header">
     <div class="header-bottom  header-sticky">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-xl-2 col-lg-2 col-md-1">
                    <div class="logo">
                      <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                  </div>
              </div>
              <div class="col-xl-10 col-lg-10 col-md-8">
                <!-- Main-menu -->
                <div class="main-menu f-right d-none d-lg-block">
                    <nav>
                    
                        <ul id="navigation">   
                             <li class = "dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                <i class="flag-icon flag-icon-us"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right p-0">
                                    <a href="{{route('language.index', ['en'])}}" class="dropdown-item active">
                                    <i class="fas fa-flag-usa"></i>
                                    EngLish
                                    </a>

                                    <a href="{{route('language.index', ['vi'])}}" class="dropdown-item">
                                    <i class="flag-icon flag-icon-vn mr-2"></i> VietNam
                                    </a>
                                </div>
                            </li>
                            
                              
                                                                                                                                                   
                            <li><a href="index.html">{{__('Home') }}</a></li>
                            <li><a href="about.html">{{__('About') }}</a></li>
                            
                            <li><a href="#">Page</a>
                                <ul class="submenu">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog_details.html">Blog Details</a></li>
                                    <li><a href="elements.html">Element</a></li>
                                    <li><a href="listing_details.html">Listing details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">{{__('Contact') }}</a></li>
                            <li>
                                <a href="{{route('cart.index')}}">
                                    <i class="fas fa-shopping-cart fa-2x"></i>
                                    <div class="badge badge-danger">
                                        @auth
                                        {{Cart::session(auth()->id())->getContent()->count()}}
                                        @else
                                        0
                                        @endauth
                                    </div>
                                </a>
                            </li>
                            
                            <li class="login"><a href="#">
                                <i class="ti-user"></i>{{__('Sign in or Register') }}</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>