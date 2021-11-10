<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>shop</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('fontend/demo.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="{{asset('ckeditor')}}"></script>
    <script src="{{asset('ckfinder')}}"></script>
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<!--header-->
<div id="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-lg-3 col-md-3 col-sm-12">
                <h1><a href="#"><img src="{{asset('fontend/image/logo-hqgroup.png')}}" alt=""
                                     width="40" height="40"></a></h1>
            </div>
            <div id="search"  class="col-lg-6 col-md-6 col-sm-12">
                <form action="{{route('product.search2')}}" method="get" class="form-inline my-2 my-lg-0">
                    <input class="form-control " type="text" placeholder="Search..." aria-label="Search" name="keyword">
                    <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search fa-sm"></i></button>
                </form>
            </div>
            <div id="cart" class="col-lg-3 col-md-3 col-sm-12">
                <a href="#"><i class="fas fa-cart-plus"></i></a><span>8</span>
            </div>
        </div>
    </div>
</div>
<!--end header-->


<!--body-->
<div id="body">
    <div class="container">
        <div class="row">
            <!--menu-->
            <div id="menu" class="col-lg-12 col-md-12 col-sm-12">
                <ul>
                    <li><a href="#"></a>Iphone</li>
                    <li><a href="#"></a>Samsung</li>
                    <li><a href="#"></a>Nokia</li>
                    <li><a href="#"></a>lenovo</li>
                    <li><a href="#"></a>Sony</li>
                    <li><a href="#"></a>Vertu</li>
                </ul>
            </div>
            <!--end menu-->
        </div>
        <div class="row mt-2">
            <!-- main-content -->
            <div id="main-content" class="col-lg-8 col-md-8 col-sm-12">
                <!-- slide -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100"
                                 src="{{asset('fontend/image/ss8.jpg')}}"
                                 alt="First slide" width="550" height="450">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                 src="{{asset('fontend/image/s7.jpg')}}"
                                 alt="Second slide" width="550" height="450">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                 src="{{asset('fontend/image/s6.jpg')}}"
                                 alt="Third slide" width="550" height="450">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- end slide -->

                <!-- product -->
                <div class="products">
                    <h3>Sản phẩm bán chạy</h3>

                    <div class="card-deck products-list">
                        @foreach($products as $product)
                            <div class="m-2">

                        <div class="card products-item">
                            <a href="{{route('product.detail',$product['id'])}}">
                                <img src="{{asset('fontend/image/product_1.jpg')}}"></a>
                            <h4>{{$product['title']}}</h4>
                            <p> Giá bán :<span>{{$product['price'].'đ'}}</span></p>
                        </div>
                            </div>
                        @endforeach

                    </div>

                </div>
                <!-- end product -->
            </div>
            <!--end main-content -->

            <!-- slibar -->
            <div id="slibar" class="col-lg-4 col-md-0 col-sm-0">
                <div class="banner-item mb-2">
                    <a href="#"><img src="{{asset('fontend/image/s11.jpg')}}"
                                     class="img-fluid " alt=""></a>
                </div>
                <div class="banner-item ">
                    <a href="#"><img
                            src="{{asset('fontend/image/s5.jpg')}}"
                            class="img-fluid mb-2" alt=""></a>
                </div>
                <div class="banner-item">
                    <a href="#"><img src="{{asset('fontend/image/s8.jpg')}}"
                                     class="img-fluid mb-2" alt=""></a>
                </div>
                <div class="banner-item">
                    <a href=""><img src="{{asset('fontend/image/s10.jpg')}}"
                                    class="img-fluid mb-2" alt=""></a>
                </div>
            </div>
            <!-- end slibar -->
        </div>
    </div>
</div>
<!--end body-->


<!--footer-top-->
<div id="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h2><a href="#"><img src="{{asset('fontend/image/logo-hqgroup.png')}}" width="60" height="60"
                                     alt=""></a></h2>
                <p>
                    HQ GROUPS là công ty trẻ, năng động, linh hoạt dễ thích nghi với sự thay đổi.
                    Chúng tôi tạo ra mạng lưới các CREATOR với khả năng sản xuất sáng tạo liên tục
                    chia sẻ các khoảnh khắc chiến thắng với hàng triệu người dùng trực tuyến.
                    Liên kết các không gian mạng mở ra mạng lưới xã hội ảo nhiều màu sắc
                </p>
            </div>
            <div id="address" class="col-lg-3 col-md-6 col-sm-12">
                <h5>ĐỊA CHỈ</h5>
                <p>37 Nguyễn Văn Huyên - Phường Quan Hoa - Cầu Giấy - Hà Nội</p>
            </div>
            <div id="business" class="col-lg-3 col-md-6 col-sm-12">
                <h5>LĨNH VỰC KINH DOANH</h5>
                <ul>
                    <li>Gaming</li>
                    <li>Agency</li>
                    <li>Software</li>
                    <li>Studio</li>
                    <li>Esport</li>
                    <li>Center</li>
                </ul>
            </div>
            <div id="hotline" class="col-lg-3 col-md-6 col-sm-12">
                <h5>LIÊN HỆ</h5>
                <p>Phone : 0242.246.2020</p>
                <p>Email : lienhe.hq@hqgroups.vn</p>
            </div>
        </div>
    </div>
</div>
<!--end footer-top-->

<!--footer-bottom-->
<div id="footer-bottom">
</div>
<!--end footer-bottom-->

</body>
</html>
