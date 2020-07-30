@extends('admin.layout.master')
@section('title')
    Xem Loại Sản Phẩm
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <h4 class="m-0 font-weight-bold text-primary float-left">Product Type</h4>
        <a href="{{ url('admin/category/create') }}" class="h6 btn btn-success float-right add-cate" data-toggle="modal" data-target=".FrmAdd">Thêm Mới Loại Sản Phẩm</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proctype as $key => $value)
                        <tr>
                            <td>{!! $key+1 !!}</td>
                            <td>{!! $value->name !!}</td>
                            <td>{!! $value->slug !!}</td>
                            <td>
                                <?php $cate = DB::table('category')->where('id',$value->cate_id)->first(); if(isset($cate)){ echo $cate->name; } ?>
                            </td>
                            <td>
                                @if($value->status==1)
                                    {{ "Hiển thị" }}
                                @else
                                    {{ "Không hiển thị" }}
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-primary editProductType" data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger deleteProductType" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

            <div class="pull-right">{{ $proctype->links() }}</div>
        </div>
    </div>
</div>
{{-- ADD --}}
<div class="modal fade FrmAdd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Loại Sản Phẩm</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="row" style="margin: 5px">
                <div class="col-lg-12">
                    <form role="form" action="{{ route('producttype.store') }}" method="POST">
                        @csrf
                            <fieldset class="form-group">
                                <label>Tên Loại Sản Phẩm :</label>
                                <input name="txtName" class="form-control add_name" placeholder="Enter text">
                            </fieldset>

                            <div class="form-group">
                                <label>Danh Mục</label>
                                <select name="sltCate" class="form-control add_status">
                                    @foreach ($cat as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="sltStatus" class="form-control add_status">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Không Hiển Thị</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success add">Submit</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                    </form>
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
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa loại sản phẩm: <span class="titleProductType"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                        <form role="form">
                            <fieldset class="form-group">
                                <label>Tên Loại Sản Phẩm :</label>
                                <input name="name" class="form-control nameProductType" placeholder="Enter text">
                                <span class="text-danger errors"></span>
                            </fieldset>
                            <div class="form-group">
                                <label>Danh Mục</label>
                                <select name="cate_id" class="form-control cate_idProductType">
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control statusProductType">
                                    <option value="1" class="hienProductType">Hiển Thị</option>
                                    <option value="0" class="anProductType">Không Hiển Thị</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success updateProductType">Save</button>
                <button class="btn btn-secondary cancelProductType" type="button" data-dismiss="modal">Cancel</button>
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
                <button type="button" class="btn btn-success delProductType">Có</button>
                <button class="btn btn-secondary not-delProductType" type="button" data-dismiss="modal">Không</button>
            <div>
        </div>
    </div>
</div>



@endsection
