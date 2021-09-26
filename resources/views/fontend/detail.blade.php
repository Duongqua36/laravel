<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('fontend/demo.css')}}">
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<!-- header -->
<div id="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-lg-3 col-md-3 col-sm-12">
                <h1><a href="#"><img src="{{asset('fontend/image/logo-hqgroup.png')}}" alt=""
                                     width="40" height="40"></a></h1>
            </div>
            <div id="search" class="col-lg-6 col-md-6 col-sm-12">
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
<!--end header -->

<div class="row">
    <div class="col-lg-5 mt-5">
        <div class="card mb-3">
            <img class="card-img img-fluid" src="{{asset('fontend/image/product_1.jpg')}}" alt="Card image cap"
                 id="product-detail">
        </div>

    </div>
    <div class="col-lg-7 mt-5">
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="h2">{{$products->title}}</h1>
                <p class="h3 py-2">Giá bán: <span>{{$products->price .'đ'}}</span></p>
                <p class="py-2">
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                </p>
{{--                <ul class="list-inline">--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <h6></h6>--}}
{{--                    </li>--}}
{{--                </ul>--}}

                <h6>Description:</h6>
                <p>
                <ul>
                    <li>Bảo mật vân tay</li>
                    <li>Chụp ảnh sắc nét, chụp nhanh, quay video với hiệu ứng slow-motion dễ dàng </li>
                    <li>Hệ điều hành iOS 8 đẹp mắt </li>
                    <li>Vi xử lý 64bit cao cấp A7 và vi xử lý cảm biến chuyển động M7 </li>
                    <li>Pin dung lượng cao 2915 mAh, Wifi nhanh hơn, tích hợp NFC
                        hướng nhiều đến các lợi ích đặc biệt là khả năng kết nối với hệ điều hành OS X Yosemite 10.10</li>
                </ul>
                </p>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <h6>Avaliable Color :</h6>
                    </li>
                    <li class="list-inline-item">
                        <p class="text-muted"><strong>White </strong></p>
                    </li>
                </ul>
                <form action="" method="GET">
                    <input type="hidden" name="product-title" value="Activewear">
                    <div class="row pb-3">
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                        </div>
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To
                                Cart
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>


