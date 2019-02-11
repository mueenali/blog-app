<!DOCTYPE html>
<html lang="en">
@section('title')
    <title>Blog Post</title>
@endsection

@include('includes.homePageHeader')
<body>

@include('includes.homeNavigation')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            @yield('content')

        </div>

        <!-- Blog Sidebar Widgets Column -->

    @include('includes.homeSidebar')
    <!-- Side Widget Well -->


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
