@extends('admin.layout.master')
@section('title')
    Danh Sách Sản Phẩm
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <h4 class="m-0 font-weight-bold text-primary float-left">Danh Sách Sản Phẩm</h4>
        <a href="{{ url('admin/product/create') }}" class="h6 btn btn-success float-right add-cate">Thêm Mới Sản Phẩm</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Thông Tin</th>
                        <th>Category</th>
                        <th>Loại Sản Phẩm</th>
                        <th>Status</th>
                        <th>Ngày thêm</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $key => $value)
                        <tr>
                            <td>{!! $key+1 !!}</td>
                            <td>{!! $value->name !!}</td>
                            <td>
                                <b>Đơn Giá</b>: {!! number_format($value->price, 0, ' ', '.') !!} VNĐ
                                <br>
                                <b>Khuyến Mãi</b>: {!! number_format($value->promotion, 0, ' ', '.') !!} VNĐ
                                <br>
                                <b>Số Lượng</b>: {!! $value->quantity !!}
                                <br>
                                <b>Hình Minh Họa</b>: 
                                <img src="{!! url('upload/img/product').'/'.$value->image !!}" alt="" width="100" height="100">
                            </td>
                            <td>
                                <?php $cate = DB::table('category')->where('id',$value->cate_id)->first(); if(isset($cate)){ echo $cate->name; } ?>
                            </td>
                            <td>
                                <?php $protype = DB::table('producttype')->where('id',$value->productType_id)->first(); if(isset($protype)){ echo $protype->name; } ?>
                            </td>
                            <td>
                                @if($value->status==1)
                                    {{ "Hiển thị" }}
                                @else
                                    {{ "Không hiển thị" }}
                                @endif
                            </td>
                            <td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans() !!}</td>
                            
                            <td>
                                <button href="" class="btn btn-primary editProduct" data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger deleteProduct" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
{{-- Pagination --}}
            <div class="pull-right">{{ $product->links() }}</div>

        </div>
    </div>
</div>

<!-- Edit Modal-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa Sản phẩm: <span class="titleProductType"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="FrmUpdateProduct" role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            
                                <fieldset class="form-group">
                                    <label>Tên Sản Phẩm :</label>
                                    <input name="txtName" class="form-control nameProduct" type="text">
                                </fieldset>
        
                                <fieldset class="form-group">
                                    <label>Ảnh :</label>
                                    <img src="" alt="" class="imgProduct" width="150" height="150">
                                    <input name="Fimg" class="form-control" type="file">
        
                                </fieldset>
        
                                <fieldset class="form-group">
                                    <label>Số Lượng :</label>
                                    <input name="txtQuantity" min="1" type="number" class="form-control quantityProduct">
                                </fieldset>
        
                                <fieldset class="form-group">
                                    <label>Giá :</label>
                                    <input name="txtPrice" type="number" class="form-control priceProduct">
                                </fieldset>
        
                                <div class="form-group">
                                    <label>Danh Mục</label>
                                    <select name="sltCate" class="form-control cateProduct">
                                        
                                    </select>
                                </div>
        
                                <div class="form-group">
                                    <label>Loại Sản Phẩm</label>
                                    <select name="sltProtype" class="form-control showPTbyCateProduct">
                                        
                                    </select>
                                </div>
        
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="sltStatus" class="form-control sttProduct">
                                        <option value="1" class="hienProduct">Hiển Thị</option>
                                        <option value="0" class="anProduct">Không Hiển Thị</option>
                                    </select>
                                </div>
        
                                <fieldset class="form-group">
                                    <label>Khuyến Mãi :</label>
                                    <input name="txtKhuyenMai" type="number" class="form-control promoProduct">
                                </fieldset>
        
                                <fieldset class="form-group">
                                    <label>Mô Tả :</label>
                                    <textarea name="txtMota" id="product_edit" cols="30" rows="10" class="form-control"></textarea>
                                </fieldset>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" id="updatepd" class="btn btn-success" value="Save">
                    <button class="btn btn-secondary cancelProduct" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </form>
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
                <button type="button" class="btn btn-success delProduct">Có</button>
                <button class="btn btn-secondary not-delProduct" type="button" data-dismiss="modal">Không</button>
            <div>
        </div>
    </div>
</div>



@endsection
