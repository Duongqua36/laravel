@extends('layout.index')
@section('title','product')
@section('content')
    <div id="accordion" style="width: 800px">
        <h5>Danh mục sản phẩm</h5>
        <a href="{{route('category.add')}}" class="btn btn-success mb-2"><i class="fas fa-plus-circle"></i></a>
        <div>
        {{showCategories($categories)}}
        </div>
</div>


    <?php
    function showCategories($categories, $parent_id = '', $char = 0)
    {
        foreach ($categories as $key => $item) {
            $hidden = '';
            if ($parent_id == '') {
                $hidden = 'show';
            }
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id) {
                echo '
               <div  id="collapse-' . $parent_id . '"
                 class="alert alert-info collapse ' . $hidden . '"
                 data-toggle="collapse"
                  data-target="#collapse-' . $item->id . '"
                   aria-expanded="true"
                    aria-controls="collapseOne"
                     style="margin-left: ' . $char . 'px">
                       <input type="checkbox"
                        id="master-' . $item->id . '"
                         class="sub_chk-' . $parent_id . ' checkbox_category"
                           onclick="setId(' . $item->id . ')"
                            data-id="' . $item->id . '">

                     <span> ' . $item->name . '</span>
<div style="float: right">
<a class="btn btn-sm btn-danger" href="' . $item->id . '/deleteCate">Xóa</a>
<a class="btn btn-sm btn-warning" href="' . $item->id . '/editCate">Sửa</a>
</div>
        </div>
               ';
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories, $item->id, $char + 30);
            }
        }
    }
    ?>
@endsection
