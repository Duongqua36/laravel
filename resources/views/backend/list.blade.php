@extends('layout.index')
@section('title', 'product')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Table with Add and Delete Row Feature</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }
        .table-wrapper {
            width: 1000px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }
        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }
        .table-title .add-new i {
            margin-right: 4px;
        }
        table.table {
            table-layout: fixed;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table th:last-child {
            width: 100px;
        }
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }
        table.table td a.add {
            color: #27C46B;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #E34724;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }
        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }
        table.table .form-control.error {
            border-color: #f50000;
        }
        table.table td .add {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function(){
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +
                    '<td><input type="checkbox"  name="name"></td>' +
                    '<td><input type="text" class="form-control" name="title" id="title"></td>' +
                    '<td><input type="text" class="form-control" name="description" id="description"></td>' +
                    '<td><input type="number" class="form-control" name="price" id="price"></td>' +
                    '<td><input type="number" class="form-control" name="brand" id="brand"></td>' +
                    '<td><input type="number" class="form-control" name="category_id" id="category_id"></td>' +
                    '<td><input type="file" class="form-control" name="image" id="image"></td>' +
                    '<td>' + actions + '</td>' +
                    '</tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            // Add row on add button click
            $(document).on("click", ".add", function(){
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');
                input.each(function(){
                    if(!$(this).val()){
                        $(this).addClass("error");
                        empty = true;
                    } else{
                        $(this).removeClass("error");
                    }
                });
                $(this).parents("tr").find(".error").first().focus();
                if(!empty){
                    input.each(function(){
                        $(this).parent("td").html($(this).val());
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }
            });
            // Edit row on edit button click
            $(document).on("click", ".edit", function(){
                $(this).parents("tr").find("td:not(:last-child)").each(function(){
                    $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });
            // Delete row on delete button click
            $(document).on("click", ".delete", function(){
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });
        });
    </script>
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

    <!-- product -->
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><input type="checkbox" id="master"></th>
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
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
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
                    <td><img src="{{asset('/image/'.$product->image)}}" width="40" height="40"></td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
</body>
</html>

