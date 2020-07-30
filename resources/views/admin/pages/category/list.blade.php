@extends('admin.layout.master')
@section('title')
    Xem Danh Mục
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <h4 class="m-0 font-weight-bold text-primary float-left">Category</h4>
        <a href="{{ url('admin/category/create') }}" class="h6 btn btn-success float-right add-cate" data-toggle="modal" data-target=".FrmAdd">Thêm Danh Mục</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cat as $key => $value)
                        <tr>
                            <td>{!! $key+1 !!}</td>
                            <td>{!! $value->name !!}</td>
                            <td>{!! $value->slug !!}</td>
                            <td>
                                @if($value->status==1)
                                    {{ "Hiển thị" }}
                                @else
                                    {{ "Không hiển thị" }}
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-primary edit" data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger delete" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

            <div class="pull-right">{{ $cat->links() }}</div>
        </div>
    </div>
</div>

{{-- Add --}}
<div class="modal fade FrmAdd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Danh Mục</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="row" style="margin: 5px">
                <div class="col-lg-12">
                    {{-- <form role="form" action="{{ route('category.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf --}}
                            <fieldset class="form-group">
                                <label>Tên Danh Mục :</label>
                                <input type="text" name="txtName" class="form-control add_name" placeholder="Enter text" required>
                                <div class="invalid-feedback">
                                    Yêu cầu điền tên Danh mục
                                </div>
                                
                            </fieldset>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="sltStatus" class="form-control add_status">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Không Hiển Thị</option>
                                </select>
                            </div>
                            <button class="btn btn-success add">Submit</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
        
      </div>
    </div>
  </div>

<!-- Edit Modal-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa <span class="txtTitle"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                        <form role="form">
                            <fieldset class="form-group">
                                <label>Tên Danh Mục :</label>
                                <input name="name" class="form-control name" placeholder="Enter text">
                                <span class="text-danger errors"></span>
                            </fieldset>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control status">
                                    <option value="1" class="hien">Hiển Thị</option>
                                    <option value="0" class="an">Không Hiển Thị</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success update">Save</button>
                <button class="btn btn-secondary cancel" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- delete Modal-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left: 183px;">
                <button type="button" class="btn btn-success del">Có</button>
                <button class="btn btn-secondary not-del" type="button" data-dismiss="modal">Không</button>
            <div>
        </div>
    </div>
</div>



@endsection
