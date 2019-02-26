<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
         {!! Form::open(['method'=>'POST','action' => 'HomeController@search']) !!}
             <div class="form-group">
                 {!!Form::text('search',null,['class'=>'form-control'])!!}
             </div>
        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>

    {!! Form::close() !!}
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    @include('includes.categoriesWell')

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>
