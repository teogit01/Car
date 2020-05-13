<!doctype html>
<html class="no-js" lang="zxx">
    <head>
       @include('customer/layouts/head')
   </head>

   <body>
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.jpg" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        @include('customer/layouts/header')
        <!-- Header End -->
    </header>
    <main>

        <!-- Hero Area Start-->
        @include('customer/layouts/banner')
        <!--Hero Area End-->
        <!-- Popular Locations Start -->
        @include('customer/layouts/popular')
        
        <!-- Popular Locations End -->
        <!-- Services Area Start -->
        @include('customer/layouts/services')
        <!-- Services Area End -->
        <!-- Categories Area Start -->
        @include('customer/layouts/featured')
        
        <!-- Categories Area End -->
         <!-- peoples-visit Start -->
        @include('customer/layouts/peoples-visit') 
         
        <!-- peoples-visit End -->
        <!-- Testimonial Start -->

        @include('customer/layouts/testimonial') 
        
        <!-- Testimonial End -->
        <!-- Subscribe Area Start -->
        @include('customer/layouts/subscribe') 
       
        <!-- Subscribe Area End -->
        <!-- Blog Ara Start -->
        @include('customer/layouts/blog')  
        <!-- Blog Ara End -->

    </main>
    @include('customer/layouts/footer')
    <!-- Scroll Up -->
    @include('customer/layouts/gototop')


    <!-- JS here -->
		@include('customer/layouts/script')
        
    </body>
</html>