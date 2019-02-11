<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                @if($categories)
                    @foreach($categories as $category)
                        <li><a href="#">{{$category->name}}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
