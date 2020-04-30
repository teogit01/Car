<div class="popular-location section-padding30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                @yield('popular-title')
                <div class="section-tittle text-center mb-80">
                    <span>Most visited places</span>
                    <h2>Popular Locations</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @yield('popular-content')
            
        </div>
        <!-- More Btn -->
        <div class="row justify-content-center">
            <div class="room-btn pt-20">
                <a href="catagori.html" class="btn view-btn1">View All Places</a>
            </div>
        </div>
    </div>
</div>