@extends('fcontent::layouts.app') 
@section('content')
<div class="row">
    <div class="col-lg-12">

        <h1 class="page-header">Page List</h1>
    @include('fcontent::errors._check')

        <p>
            <a href="{{route('fcontent.page.insert')}}" class='btn btn-primary'><i class='fa fa-plus'></i> Insert Page</a>
        </p>

        <table class='table table-hover table-dashed table-bordered'>
            <thead>
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        Name
                    </td>
                    <td>
                        Fields
                    </td>
                    <td>
                        Path
                    </td>
                    <td>
                        Last Update
                    </td>
                    <td>

                    </td>
                </tr>
            </thead>

            <tbody>
                @foreach($pages as $page)

                <tr>
                    <td>
                        {{$page->id}}
                    </td>
                    <td>
                        {{$page->name}}
                    </td>
                    <td>
                        {{count($page->fields)}}
                    </td>
                    <td>
                        {{$page->path}}
                    </td>
                    <td>
                        {{$page->updated_at}}
                    </td>
                    <td>
                        
                            <a title="Refresh content" href={{route( 'fcontent.page.reload', [ 'id'=> $page->id])}} class='btn btn-primary tip btn-sm'><i class='fa fa-refresh'></i></a>
                            <a title="Edit content" href={{route('fcontent.page.editContent', ['id' => $page->id])}} class='btn btn-success tip btn-sm margin-left'><i class='fa fa-pencil'></i></a>
                       
                    </td>
                </tr>

                @endforeach
            </tbody>
            

        </table>

        {!! $pages->render() !!}

    </div>
</div>
@endsection