@extends('layout.index')
@section('title', 'product')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<p>Tất cả sản phẩm</p>
<div class="container">
    <form action="{{route('product.filter')}}" method="get">
        <div class="row">
            <div class="col-4">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm"><i
                                class="far fa-calendar-check"></i></span>
                    </div>
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                           name="id"     placeholder="ID" value="{{$old_data->id??''}}">
                </div>
            </div>
            <div class="col-4">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm"><i
                                class="far fa-calendar-check"></i></span>
                    </div>
                    <input type="text" name="title" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                           placeholder="Title" value="{{$old_data->title??''}}">
                </div>
            </div>
            <div class="col-4">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm"><i
                                class="far fa-calendar-check"></i></span>
                    </div>
                    <?php
                    $brand_id = $old_data->id??'';
                    ?>
                    <select name="brand" class="form-control">
                        <option value="">--Tất cả thương hiệu--</option>
                        @foreach($brands as $brand)
                            @if($brand_id == $brand->id)
                                <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                            @else
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm"><i
                                class="far fa-calendar-check"></i></span>
                    </div>
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                           placeholder="Từ" value="{{$old_data->price_to??''}}">
                </div>
            </div>
            <div class="col-3">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm"><i
                                class="far fa-calendar-check"></i></span>
                    </div>
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                           placeholder="Đến" value="{{$old_data->price_from??''}}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-light" ><i class="fas fa-search"> Tìm kiếm</i></button>
        <button type="button" class="btn btn-light"><i class="fas fa-times"></i> reset</button>
    </form>
    <div class="row">
        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
            <i class="far fa-trash-alt"> xóa đã chọn</i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Xác nhận xóa
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
                        <button type="button" class="btn btn-danger delete_all" data-url="{{ url('deleteAll') }}">xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="col-12"><h2></h2></div>
        <a href="{{route('product.create')}}" class="btn btn-success mb-2"><i class="fas fa-plus-circle"></i></a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><input type="checkbox" id="master"></th>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Giá sản phẩm</th>
                <th>Thương hiệu</th>
                <th>Thể loại</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key => $product)
                <tr>
                    <th><input type="checkbox" class="delete" data-id="{{$product->id}}"></th>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $product->title }}</td>
                    <td>{!! $product->description !!}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @if($product->brand)
                            <p>{{$product->brand->name}}</p>
                        @else
                            <p> Chưa phân loại brand</p>
                        @endif
                    </td>
                    <td>
                        @if($product->category_id)
                            <p>{{$product->categories->name}}</p>
                        @else
                            <p> Chưa phân loại category</p>
                        @endif
                    </td>
                    <td><img src="{{$product->image}}" width="40" height="40"></td>
                    <td>
                        <a href="{{route('product.destroy',$product->id)}}" class="btn btn-outline-danger"
                           onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-outline-warning"
                           id="update-product"><i class="far fa-edit"></i></a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>




<script type="text/javascript">
    $('#master').on('click', function (e) {
        if ($(this).is(':checked', true)) {
            $(".delete").prop('checked', true);
        } else {
            $(".delete").prop('checked', false);
        }
    });
    $('.delete_all').on('click', function (e) {
        var allVals = [];
        $(".delete:checked").each(function () {
            allVals.push($(this).attr('data-id'));
        });
        if (allVals.length <= 0) {
            alert("Vui lòng chọn sản phẩm cần xóa.");
        } else {
            var join_selected_values = allVals.join(",");
            $.ajax({
                url: $(this).data('url'),
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: 'ids=' + join_selected_values,
                success: function (data) {
                    $(".delete:checked").each(function () {
                        $(this).parents("tr").remove();
                    });
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });
            $.each(allVals, function (index, value) {
                $('table tr').filter("[data-row-id='" + value + "']").remove();
            });
        }
    });
    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        onConfirm: function (event, element) {
            element.trigger('confirm');
        }
    });
    $(document).on('confirm', function (e) {
        var ele = e.target;
        e.preventDefault();
        $.ajax({
            url: ele.href,
            type: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                if (data['success']) {
                    $("#" + data['tr']).slideUp("slow");
                    alert(data['success']);
                } else if (data['error']) {
                    alert(data['error']);
                } else {
                    alert('Rất tiếc, đã xảy ra lỗi!!');
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
        return false;
    });
</script>
@endsection
</body>
</html>
