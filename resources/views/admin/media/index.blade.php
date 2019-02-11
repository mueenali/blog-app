@extends('layouts.admin')


@section('content')
    @if($photos)
        <form action="/media/delete" method="post" class="form-inline">
            {{csrf_field()}}
            {{method_field('delete')}}
            <div class="form-group">
                <select name="checkbox" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="btn btn-danger">
            </div>

            <table class="table table-dark">
                <thead>
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created_At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td><input type="checkbox" name="checkbox[]" value="{{$photo->id}}" class="checkBoxs"></td>
                        <th scope="row">{{$photo->id}}</th>
                        <td><img height="70" src="{{$photo->path}}"></td>
                        <td>{{$photo->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
        </form>
        @section('scripts')
            <script src="{{asset('js/media.js')}}"></script>
        @endsection
<div class="row ">
    <div class="col-sm-6 col-sm-offset-5">
        {{$photos->links()}}
    </div>
</div>
@stop
