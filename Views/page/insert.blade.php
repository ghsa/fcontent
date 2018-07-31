@extends('fcontent::layouts.app') 
@section('content')
<div class="row">
    <div class="col-lg-12">

        <h1 class="page-header">Insert Page</h1>
    @include('fcontent::errors._check')

        <div class="row">

            {!! Form::open(['route' => 'fcontent.page.save']) !!}

            <div class="form-group col-sm-8">
                <label for="path">Path name relative to resources folder</label> 
                {!! Form::text('path', null, ['class' =>'form-control']) !!}
            </div>


            <div class="form-group col-sm-12">
                <button type="submit" class='btn btn-primary'><i class='fa fa-save'></i> Save</button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection