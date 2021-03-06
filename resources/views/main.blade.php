<!--main html every page uses  -->
<!DOCTYPE html>
<html lang="en">
    
  <head>
    <!--title of each page -->
    @include('partials/title')
    @include('partials/styles')
  </head>
    <body>
      @include('partials/navbar')
      <div class="container">
        @include('partials.messages')
        @yield('content')
      </div>
    @include('partials/footer')
    @include('partials/scripts')
    </body>

</html>