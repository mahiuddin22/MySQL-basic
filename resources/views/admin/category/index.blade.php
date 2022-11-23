@extends('admin.admin_master')
@section('content')

    @if(Session::has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Success!</strong> {{Session::get('message')}}
        </div>
    @endif

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th style="width: 5%;">ID</th>
                        <th style="width: 15%;">Name</th>
                        <th style="width: 35%;">Description</th>
                        <th style="width: 15%;">Image</th>
                        <th style="width: 15%;">Status</th>
                        <th style="width: 20%;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key=>$category)
                        <tr style="box-shadow: 2px 2px 2px #CCCCCC;">
                            <td style="border-bottom: 1px solid #c4c4c4;">{{$key+1}}</td>
                            <td style="border-bottom: 1px solid #c4c4c4;">{{$category->name}}</td>
                            <td style="border-bottom: 1px solid #c4c4c4;" class="center">{!! $category->descriptions !!}</td>
                            <td style="border-bottom: 1px solid #c4c4c4;" class="center">
                                <img src="{{asset('storage/'.$category->image)}}" alt="default.png"
                                     style="height: 90px; width: 90px; border-radius: 5px; box-shadow: 2px 3px 4px #8c8c8c">
                            </td>
                            <td style="border-bottom: 1px solid #c4c4c4;" class="center">
                                @if($category->status == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-important">Inactive</span>
                                @endif
                            </td>
                            <td style="border-bottom: 1px solid #c4c4c4;" class="center">
                                @if($category->status == 1)
                                    <a class="btn btn-danger" href="{{route('catStatus',$category->id)}}">
                                        <i class="halflings-icon white eye-close"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{route('catStatus',$category->id)}}">
                                        <i class="halflings-icon white eye-open"></i>
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{url('/categories/'.$category->id.'/edit')}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <form action="{{url('/categories/'.$category->id)}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="halflings-icon white trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection
