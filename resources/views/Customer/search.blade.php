@extends('layout.app')
@section('title', 'Result')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('search.store')}}" >
            @csrf
        <div class="input-group mb-4 mt-4">
            <input type="text" class="form-control form-control-lg input_search border-right-0" id="inlineFormInputGroup" value=""
            name="name"
            >
            <div class="input-group-prepend">
                <button type="submit" class="btn input-group-text bg-white border_search border-left-0 text-primary"><i class="feather-search">

                    </i></button>
            </div>
        </div>

        </form>

    </div>
@endsection
