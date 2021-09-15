<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<form method="get" action="#">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1"> Tiêu đề danh mục</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" >
    </div>
    <div class="form-group">
        <select class="form-control" id="exampleFormControlSelect1" name="parent_id" >
            <option value="">--Danh mục sản phẩm--</option>
            {{showCategories($categories)}}
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>

<?php
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id)
        {
            // Xử lý hiển thị chuyên mục
            echo '<option value="'.$item->id.'">'.$char.$item->name.'</option>';
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item->id, $char.'|---');
        }
    }
}
?>
