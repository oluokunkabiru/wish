@extends('pages.layouts.app')
@section('title', 'News')
@section('content')
<section class="inner-banner2 clearfix">
    <div class="container clearfix">
      <h2>News</h2>
    </div>
  </section>
  <section class="breadcumb-wrapper">
    <div class="container clearfix">
      <ul class="breadcumb">
        <li><a href="index-2.html">Home</a></li>
        <li><span>News</span></li>
      </ul>
    </div>
  </section>
  <!-- News Page-->
  <section class="core-projects sectpad">
    <div class="container clearfix">
      <div class="row">
        <div class="col-md-4 col-sm-12 pull-left news">
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
                <h2><span>Popular Posts</span></h2>
              </div>
              <div class="popular-post">
                <ul>
                  <li class="img-cap-effect">
                    <div class="img-box"><a href="news-details.html"><img src="images/news/popular-post1.jpg" alt="Awesome Image"></a></div>
                    <div class="content"><a href="#">
                        <h4>Duisau irure dolor</h4></a>
                      <p>in reprehenderit in volup tate velit esse cillum</p><span>02 Dec</span>
                    </div>
                  </li>
                  <li class="img-cap-effect">
                    <div class="img-box"><a href="news-details.html"><img src="images/news/popular-post2.jpg" alt="Awesome Image"></a></div>
                    <div class="content"><a href="#">
                        <h4>Duisau irure dolor</h4></a>
                      <p>in reprehenderit in volup tate velit esse cillum</p><span>02 Dec</span>
                    </div>
                  </li>
                  <li class="img-cap-effect">
                    <div class="img-box"><a href="news-details.html"><img src="images/news/popular-post3.jpg" alt="Awesome Image"></a></div>
                    <div class="content"><a href="#">
                        <h4>Duisau irure dolor</h4></a>
                      <p>in reprehenderit in volup tate velit esse cillum</p><span>02 Dec</span>
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
          <div class="single-post-wrapper">
            <!-- News 1-->
            <article class="single-blog-post img-cap-effect">
              <div class="img-box"><a href="news-details.html" class="image_hover"><img src="images/news/1.jpg" alt="" class="img-responsive zoom_img_effect"></a></div>
              <div class="meta-info">
                <div class="content-box">
                  <ul class="post-links">
                    <li><a href="#"><i class="fa fa-user"></i> By:  Michale John</a></li>
                    <li><a href="#"><i class="fa fa-tag"></i> Delivery across country</a></li>
                    <li><a href="#"><i class="fa fa-comments-o"></i> Comments: 8</a></li>
                  </ul>
                </div>
              </div>
              <h6>05 March 2016</h6>
              <h3>Cost for Industrial craftmanship</h3>
              <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, co nsect etur, adipisci velit.</p><a href="news-details.html" class="read-more btn submit">Read More</a>
            </article>
            <!-- News 2-->
            <article class="single-blog-post img-cap-effect">
              <div class="img-box"><a href="news-details.html" class="image_hover"><img src="images/news/2.jpg" alt="" class="img-responsive zoom_img_effect"></a></div>
              <div class="meta-info">
                <div class="content-box">
                  <ul class="post-links">
                    <li><a href="#"><i class="fa fa-user"></i> By:  Michale John</a></li>
                    <li><a href="#"><i class="fa fa-tag"></i> Delivery across country</a></li>
                    <li><a href="#"><i class="fa fa-comments-o"></i> Comments: 8</a></li>
                  </ul>
                </div>
              </div>
              <h6>05 March 2016</h6>
              <h3>Cost for Industrial craftmanship</h3>
              <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, co nsect etur, adipisci velit.</p><a href="news-details.html" class="read-more btn submit">Read More</a>
            </article>
            <!-- News 3-->
            <article class="single-blog-post img-cap-effect">
              <div class="img-box"><a href="news-details.html" class="image_hover"><img src="images/news/3.jpg" alt="" class="img-responsive zoom_img_effect"></a></div>
              <div class="meta-info">
                <div class="content-box">
                  <ul class="post-links">
                    <li><a href="#"><i class="fa fa-user"></i> By:  Michale John</a></li>
                    <li><a href="#"><i class="fa fa-tag"></i> Delivery across country</a></li>
                    <li><a href="#"><i class="fa fa-comments-o"></i> Comments: 8</a></li>
                  </ul>
                </div>
              </div>
              <h6>05 March 2016</h6>
              <h3>Cost for Industrial craftmanship</h3>
              <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, co nsect etur, adipisci velit.</p><a href="news-details.html" class="read-more btn submit">Read More</a>
            </article>
            <!-- News 4-->
            <article class="single-blog-post img-cap-effect">
              <div class="img-box"><a href="news-details.html" class="image_hover"><img src="images/news/4.jpg" alt="" class="img-responsive zoom_img_effect"></a></div>
              <div class="meta-info">
                <div class="content-box">
                  <ul class="post-links">
                    <li><a href="#"><i class="fa fa-user"></i> By:  Michale John</a></li>
                    <li><a href="#"><i class="fa fa-tag"></i> Delivery across country</a></li>
                    <li><a href="#"><i class="fa fa-comments-o"></i> Comments: 8</a></li>
                  </ul>
                </div>
              </div>
              <h6>05 March 2016</h6>
              <h3>Cost for Industrial craftmanship</h3>
              <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, co nsect etur, adipisci velit.</p><a href="news-details.html" class="read-more btn submit">Read More</a>
            </article>
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

