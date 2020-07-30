@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary float-left">Thêm mới sản phẩm</h4>
                </div>
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                        <form role="form" action="{!! route('product.store') !!}" method="POST" enctype="multipart/form-data">
                        @csrf    
                            <fieldset class="form-group">
                                <label>Tên Sản Phẩm :</label>
                                <input name="txtName" class="form-control" type="text">
                                <span class="text-danger">{!! $errors->first('txtName') !!}</span>
                            </fieldset>
    
                            <fieldset class="form-group">
                                <label>Ảnh :</label>
                                <input name="Fimg" class="form-control" type="file">
                            </fieldset>
    
                            <fieldset class="form-group">
                                <label>Số Lượng :</label>
                                <input name="txtQuantity" min="1" type="number" class="form-control">
                                <span class="text-danger">{!! $errors->first('txtQuantity') !!}</span>
                            </fieldset>
    
                            <fieldset class="form-group">
                                <label>Giá :</label>
                                <input name="txtPrice" type="number" class="form-control">
                                <span class="text-danger">{!! $errors->first('txtPrice') !!}</span>
                            </fieldset>
    
                            <div class="form-group">
                                <label>Danh Mục</label>
                                <select name="sltCate" class="form-control addCate">
                                    @foreach ($cat as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label>Loại Sản Phẩm</label>
                                <select name="sltProtype" class="form-control showPTbyCate">
                                    @foreach ($proctype as $item)
                                <option value="{{ $item["id"] }}">{{ $item["name"] }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label>Status</label>
                                <select name="sltStatus" class="form-control">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Không Hiển Thị</option>
                                </select>
                            </div>
    
                            <fieldset class="form-group">
                                <label>Khuyến Mãi :</label>
                                <input name="txtKhuyenMai" type="number" class="form-control">
                            </fieldset>
    
                            <fieldset class="form-group">
                                <label>Mô Tả :</label>
                                <textarea name="txtMota" id="product_add" cols="30" rows="10" class="form-control"></textarea>
                            </fieldset>

                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <button type="reset" class="btn btn-primary">Reset Button</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection