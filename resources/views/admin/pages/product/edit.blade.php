@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary float-left">Sửa sản phẩm</h4>
                </div>
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label>Tên Sản Phẩm :</label>
                            <input name="txtName" class="form-control nameProduct" type="text" value="{!! $product->name !!}">
                            <span class="text-danger">{!! $errors->first('txtName') !!}</span>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>Ảnh :</label>
                            <img src="{!! url('upload/img/product').'/'.$product->image !!}" alt="" class="imgProduct" width="150" height="150">
                            <input name="Fimg" class="form-control" type="file">

                        </fieldset>

                        <fieldset class="form-group">
                            <label>Số Lượng :</label>
                            <input name="txtQuantity" min="1" type="number" class="form-control" value="{!! $product->quantity !!}">
                            <span class="text-danger">{!! $errors->first('txtQuantity') !!}</span>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>Giá :</label>
                            <input name="txtPrice" type="number" class="form-control" value="{!! $product->price !!}">
                            <span class="text-danger">{!! $errors->first('txtPrice') !!}</span>
                        </fieldset>

                        <div class="form-group">
                            <label>Danh Mục</label>
                            <select name="sltCate" class="form-control cateProduct">
                                @foreach ($cat as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Loại Sản Phẩm</label>
                            <select name="sltProtype" class="form-control showPTbyCateProduct">
                                @foreach ($proctype as $item)
                            <option value="{{ $item["id"] }}">{{ $item["name"] }}</option>
                                @endforeach
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
                            <input name="txtKhuyenMai" type="number" class="form-control" value="{!! $product->promotion !!}">
                        </fieldset>

                        <fieldset class="form-group">
                            <label>Mô Tả :</label>
                            <textarea name="txtMota" id="MotaEditProduct" cols="30" rows="10" class="form-control" value="{!! old('txtMota',isset($product) ? $product->description :null) !!}"></textarea>
                            <script type="text/javascript">ckeditor('txtMota');</script>
                        </fieldset>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection