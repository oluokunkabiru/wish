@extends('pages.layouts.app')
@section('title', 'Shop')
@section('content')
<section class="inner-banner2 clearfix">
    <div class="container clearfix">
      <h2 class="text-center">Shop Page</h2>
    </div>
  </section>
  <section class="breadcumb-wrapper">
    <div class="container clearfix">
      <ul class="breadcumb">
        <li><a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><span>Shop Page</span></li>
      </ul>
    </div>
  </section>
  <!-- News Page-->
  <section class="core-projects sectpad shop-page">
    <div class="container clearfix">
      <div class="row">
        <div class="col-md-4 col-sm-12 pull-left">
          <div>
            <!-- Search-->
            <div class="widget-search-blog">
              <div class="row widget-inner">
                <form action="#" method="get" class="search-form">
                  <div class="input-group">
                    <input type="search" placeholder="Enter Search keywords" class="form-control"><span class="input-group-addon">
                      <button type="submit"><i class="icon icon-Search"></i></button></span>
                  </div>
                </form>
              </div>
            </div>
            <div class="single-sidebar-widget">
              <div class="sec-title">
                <h2><span>Categories</span></h2>
              </div>
              <div class="categories">
                <ul>
                  <li><a href="#">Chemistry of Petrolium Filteration</a></li>
                  <li><a href="#">Alluminium Strength Depends</a></li>
                  <li><a href="#">Solar Panel Working Process</a></li>
                  <li><a href="#">Advanced Materials Innovation</a></li>
                  <li><a href="#">Metal Manufacturing Process</a></li>
                  <li><a href="#">Construction and Architecture</a></li>
                </ul>
              </div>
            </div>
            <div class="single-sidebar-widget">
              <div class="sec-title">
                <h2><span>Best Seller</span></h2>
              </div>
              <div class="popular-post best-seller">
                <ul>
                  <li class="img-cap-effect">
                    <div class="img-box"><a href="news-details.html"><img src="{{ asset('assets/images/shop/popular-item1.jpg') }}" alt="Awesome Image"></a></div>
                    <div class="content"><a href="#">
                        <h4>INdustrial tools</h4></a>
                      <p>$68.99</p><a href="product.html" class="read-more">More Info</a>
                    </div>
                  </li>
                  <li class="img-cap-effect">
                    <div class="img-box"><a href="news-details.html"><img src="{{ asset('assets/images/shop/popular-item2.jpg') }}" alt="Awesome Image"></a></div>
                    <div class="content"><a href="#">
                        <h4>INdustrial tools</h4></a>
                      <p>$68.99</p><a href="product.html" class="read-more">More Info</a>
                    </div>
                  </li>
                  <li class="img-cap-effect">
                    <div class="img-box"><a href="news-details.html"><img src="{{ asset('assets/images/shop/popular-item3.jpg') }}" alt="Awesome Image"></a></div>
                    <div class="content"><a href="#">
                        <h4>INdustrial tools</h4></a>
                      <p>$68.99</p><a href="product.html" class="read-more">More Info</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="single-sidebar-widget">
              <div class="sec-title">
                <h2><span>Text widget</span></h2>
              </div>
              <div class="text-box">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore que laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi arch itecto beatae vitae dict eaque ipsa quae.</p>
              </div>
            </div>
            <div class="single-sidebar-widget">
              <div class="sec-title">
                <h2><span>Tag clouds</span></h2>
              </div>
              <div class="tag-cloud">
                <ul>
                  <li><a href="#">Warehouse</a></li>
                  <li><a href="#">Ocean frieght</a></li>
                  <li><a href="#">logistic</a></li>
                  <li><a href="#">land transport</a></li>
                  <li><a href="#">cost shipment</a></li>
                  <li><a href="#">Air frieght</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-sm-12 pull-right">
          <!-- News-->
          <div class="section_header color">
            <h2>featured Products</h2>
          </div>
          <div class="row shop-item-wrapper">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="single-shop-item">
                <div class="img-box"><img src="{{ asset('assets/images/shop/1.jpg') }}" alt="Awesome Image"></div>
                <div class="content"><a href="product.html">
                    <h3>Industrial Tools</h3></a>
                  <div class="review-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span class="price">$68.99</span><a href="product.html" class="thm-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="single-shop-item">
                <div class="img-box"><img src="{{ asset('assets/images/shop/2.jpg') }}" alt="Awesome Image"></div>
                <div class="content"><a href="product.html">
                    <h3>Industrial Tools</h3></a>
                  <div class="review-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span class="price">$68.99</span><a href="product.html" class="thm-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="single-shop-item">
                <div class="img-box"><img src="{{ asset('assets/images/shop/3.jpg') }}" alt="Awesome Image"></div>
                <div class="content"><a href="product.html">
                    <h3>Industrial Tools</h3></a>
                  <div class="review-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span class="price">$68.99</span><a href="product.html" class="thm-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="single-shop-item">
                <div class="img-box"><img src="{{ asset('assets/images/shop/4.jpg') }}" alt="Awesome Image"></div>
                <div class="content"><a href="product.html">
                    <h3>Industrial Tools</h3></a>
                  <div class="review-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span class="price">$68.99</span><a href="product.html" class="thm-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="single-shop-item">
                <div class="img-box"><img src="{{ asset('assets/images/shop/5.jpg') }}" alt="Awesome Image"></div>
                <div class="content"><a href="product.html">
                    <h3>Industrial Tools</h3></a>
                  <div class="review-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span class="price">$68.99</span><a href="product.html" class="thm-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="single-shop-item">
                <div class="img-box"><img src="{{ asset('assets/images/shop/6.jpg') }}" alt="Awesome Image"></div>
                <div class="content"><a href="product.html">
                    <h3>Industrial Tools</h3></a>
                  <div class="review-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span class="price">$68.99</span><a href="product.html" class="thm-btn">Add To Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="section_header color mt30">
            <h2>featured Products</h2>
          </div>
          <div class="row shop-item-wrapper">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="single-shop-item">
                <div class="img-box"><img src="{{ asset('assets/images/shop/1.jpg') }}" alt="Awesome Image"></div>
                <div class="content"><a href="product.html">
                    <h3>Industrial Tools</h3></a>
                  <div class="review-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span class="price">$68.99</span><a href="product.html" class="thm-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="single-shop-item">
                <div class="img-box"><img src="{{ asset('assets/images/shop/2.jpg') }}" alt="Awesome Image"></div>
                <div class="content"><a href="product.html">
                    <h3>Industrial Tools</h3></a>
                  <div class="review-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span class="price">$68.99</span><a href="product.html" class="thm-btn">Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="single-shop-item">
                <div class="img-box"><img src="images/shop/3.jpg" alt="Awesome Image"></div>
                <div class="content"><a href="product.html">
                    <h3>Industrial Tools</h3></a>
                  <div class="review-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span class="price">$68.99</span><a href="product.html" class="thm-btn">Add To Cart</a>
                </div>
              </div>
            </div>
          </div>
          <ul class="page-navigation text-left">
            <li><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
@endsection
