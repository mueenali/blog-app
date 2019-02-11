<!DOCTYPE html>
<html lang="en">

@include('includes.homePageHeader')
@section('title')
    <title>Blog Home</title>
@endsection
<body>

<!-- Navigation -->
@include('includes.homeNavigation')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
    @yield('content')
    <!-- Blog Sidebar Widgets Column -->
        @include('includes.homeSidebar')

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    @include('includes.homePageFooter')

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>

</body>

</html>
