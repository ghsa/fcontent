@extends('fcontent::layouts.app') 
@section('content')
<div class="row">
    <div class="col-lg-12">

        <h2 class="page-header">Edit Content Page</h2>
        <h4>{{$page->name}}</h4>
        <hr>
        
    @include('fcontent::errors._check')

        <div class="row">

            {!! Form::open(['route' => 'fcontent.page.saveContent', 'enctype' => 'multipart/form-data']) !!} {!! Form::hidden('page_id', $page->id); !!} 
            @foreach($page->fields as $field)

            <div class="col-sm-12 form-group field-group">
                <label for="{{$field->name}}"><b>{{$field->getProperName()}}</b></label> 
                @if($field->type == FContent\Models\Field::TYPE_TEXT)
                    <input type="text" name="{{$field->getFormName()}}" value="{{$field->value}}" class='form-control'> 
                @elseif($field->type == FContent\Models\Field::TYPE_HTML)
                    <textarea class='form-control summernote' name='{{$field->getFormName()}}'>{{$field->value}}</textarea>
                @elseif($field->type == FContent\Models\Field::TYPE_IMAGE || $field->type == FContent\Models\Field::TYPE_FILE)
                    <div class="row">
                        @if($field->type == FContent\Models\Field::TYPE_IMAGE && !empty($field->value))
                            <div class="col-sm-2">
                                <img src="/{{$field->value}}" style='width: 100%' >
                            </div>

                        @endif
                        <div class="col-sm-2">
                            
                            <input type="file" name="{{$field->getFormName()}}" class='form-control' />
                        </div>
                        <div class="col-sm-1">
                            @if(!empty($field->value))
                                <a href="/{{$field->value}}" target="_blank" class='btn btn-success'><i class='fa fa-eye'></i> Open</a>
                            @endif
                        </div>
                    </div>
                @endif
                

            </div>

            @endforeach


            <div class="form-group col-sm-12">
                <button type="submit" class='btn btn-primary'><i class='fa fa-save'></i> Save</button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection