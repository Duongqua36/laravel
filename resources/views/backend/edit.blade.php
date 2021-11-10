@extends('layout.index')
@section('title', 'edit')
@section('content')

    <body>
    <div class="row">
        <form class="col-lg-9" method="post" action="{{route('product.update',$product->id)}}"
              enctype="multipart/form-data" id="form-add">
            @csrf
            <div>
                <div>
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" name="title" id="title-edit" value="{{$product->title}}">
                </div>
                <div>
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea type="text" class="ckeditor" name="description" id="description-edit">{{$product->description}}
                    </textarea>
                </div>
                <div>
                    <label for="price" class="form-label">Giá sản phẩm</label>
                    <input type="number" class="form-control" name="price" id="price-edit" value="{{$product->price}}">
                </div>
                <div>
                    <label for="">Thương hiệu</label>
                    <select name="brand_id" class="form-control">
                        @foreach($brands as  $brand)
                            @if($brand->id == $product->brand_id)
                                <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                            @else
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Thể loại</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as  $category)
                            @if($category->id == $product->category_id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <img src="https://buildercorp.id/assets/document/preview.jpg" alt="" id="finder" width="40" height="40">
                    <input type="text" id="update_image" name="image">
                    <button type="button" onclick="selectFileWithCKFinder('finder')">chọn</button>
                    <button type="button" onclick="deleteImage()">xóa</button>
                    <script>
                        function deleteImage(){
                            document.getElementById('finder').src="https://buildercorp.id/assets/document/preview.jpg";
                            document.getElementById('update_image').value='';
                        }
                        function selectFileWithCKFinder(elementId){
                            CKFinder.modal({
                                chooseFiles:true,
                                width:800,
                                height:600,
                                onInit:function (finder){
                                    finder.on('files:choose', function (evt){
                                        let file = evt.data.files.first();
                                       document.getElementById(elementId).src =file.getUrl();
                                       document.getElementById('update_image').value=file.getUrl();
                                    });
                                    finder.on('file:choose:resizedImage',function (evt){
                                        let output = document.getElementById( elementId );
                                        output.value = evt.data.resizedUrl;
                                    });
                                }
                            });
                        }
                    </script>

                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary " id="add-product">Edit</button>
                </div>
            </div>
        </form>
        <div class="col-lg-3">
            <div class="col-6">
                <label for="price" class="form-label">Ngày tạo</label>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
    <!-- ck finder   -->
    <script type="text/javascript">
        CKEDITOR.replace('description-edit', {
            filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
    </script>
@endsection

