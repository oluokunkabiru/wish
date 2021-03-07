@extends('pages.layouts.app')
@section('title', 'About')

@section('content')
 <!-- Inner Header-->
 <section class="inner-banner2 clearfix">
    <div class="container clearfix">
      <h2>About us</h2>
    </div>
  </section>
  <section class="breadcumb-wrapper">
    <div class="container clearfix">
      <ul class="breadcumb">
        <li><a href="index-2.html">Home</a></li>
        <li><span>About Us</span></li>
      </ul>
    </div>
  </section>
  <section class="about-tab-box sectpad">
    <div class="container clearfix">
      <div class="row">
        <div class="col-sm-4 col-lg-3">
          <div class="tab-title-box">
            <ul role="tablist" class="clearfix">
              <li data-tab-name="history"><a href="#history" aria-controls="history" role="tab" data-toggle="tab">Our VISION</a></li>
              <li data-tab-name="mission" class="active"><a href="#mission" aria-controls="mission" role="tab" data-toggle="tab">Our VALUES</a></li>
              <li data-tab-name="vision"><a href="#vision" aria-controls="vision" role="tab" data-toggle="tab">Our MISSION</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-8 col-lg-9">
          <div class="tab-content-box tab-content about-tab">
            <div id="history" class="single-tab-content tab-pane fade">
              <h2>Our VISION</h2>
              <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
              <p>sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
              <div class="row">
                <div class="col-sm-12 abot-img"><img src="images/about/abt-img1.jpg" alt="" class="img-responsive"><img src="images/about/abt-img2.jpg" alt="" class="img-responsive"></div>
              </div>
            </div>
            <div id="mission" class="single-tab-content tab-pane fade in active">
              <h2>Our VALUES</h2>
              <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
              <p>sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
              <div class="row">
                <div class="col-sm-12 abot-img"><img src="images/about/abt-img1.jpg" alt="" class="img-responsive"><img src="images/about/abt-img2.jpg" alt="" class="img-responsive"></div>
              </div>
            </div>
            <div id="vision" class="single-tab-content tab-pane fade">
              <h2>Our MISSION</h2>
              <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
              <p>sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
              <div class="row">
                <div class="col-sm-12 abot-img"><img src="images/about/abt-img1.jpg" alt=""><img src="images/about/abt-img2.jpg" alt=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- features Section-->
  <div class="features-section">
    <div class="features-image"><img src="images/features/1.jpg" alt=""></div>
    <div class="features-area">
      <div class="features">
        <div class="features-content">
          <div class="media">
            <div class="media-left"><a href="#"><img src="images/features/phone.png" alt=""></a></div>
            <div class="media-body">
              <h4 class="media-heading">24/7 availality</h4>
              <p>Lorem ipsum dolor sit amet, consectetur elit. Vestibulum nec odio ipsum. Suspe ndisse cursus malesuada facilisis.</p>
            </div>
          </div>
          <div class="media">
            <div class="media-left"><a href="#"><img src="images/features/icon.png" alt=""></a></div>
            <div class="media-body">
              <h4 class="media-heading">No hidden cost</h4>
              <p>Lorem ipsum dolor sit amet, consectetur elit. Vestibulum nec odio ipsum. Suspe ndisse cursus malesuada facilisis.</p>
            </div>
          </div>
        </div>
        <div class="features-content">
          <div class="media">
            <div class="media-left"><a href="#"><img src="images/features/icon2.png" alt=""></a></div>
            <div class="media-body">
              <h4 class="media-heading">Certified Mechanics</h4>
              <p>Lorem ipsum dolor sit amet, consectetur elit. Vestibulum nec odio ipsum. Suspe ndisse cursus malesuada facilisis.</p>
            </div>
          </div>
          <div class="media">
            <div class="media-left"><a href="#"><img src="images/features/hand.png" alt=""></a></div>
            <div class="media-body">
              <h4 class="media-heading">Affordable prices</h4>
              <p>Lorem ipsum dolor sit amet, consectetur elit. Vestibulum nec odio ipsum. Suspe ndisse cursus malesuada facilisis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Team-->
  <section class="sectpad team-area">
    <div class="container clearfix">
      <div class="section_header color">
        <h2>Our Dedicated Team</h2>
      </div>
      <div class="row">
        <div class="our-team">
          <div class="col-sm-6 col-md-3 team">
            <div class="team-images row m0"><img src="images/team/1.png" alt=""></div>
            <ul class="nav social-icons">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
            <div class="team-content"><a href="#">
                <h4>John Martin</h4></a>
              <p>Machine Engineer</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 team">
            <div class="team-images row m0"><img src="images/team/2.png" alt=""></div>
            <ul class="nav social-icons">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
            <div class="team-content"><a href="#">
                <h4>John Martin</h4></a>
              <p>Machine Engineer</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 team">
            <div class="team-images row m0"><img src="images/team/3.png" alt=""></div>
            <ul class="nav social-icons">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
            <div class="team-content"><a href="#">
                <h4>John Martin</h4></a>
              <p>Machine Engineer</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 team">
            <div class="team-images row m0"><img src="images/team/4.png" alt=""></div>
            <ul class="nav social-icons">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
            <div class="team-content"><a href="#">
                <h4>John Martin</h4></a>
              <p>Machine Engineer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- testimonial-->
  <section class="sectpad testimonial-area">
    <div class="container clearfix">
      <div class="section_header">
        <h2>What our client says</h2>
      </div>
      <div class="testimonial-sliders">
        <div class="item">
          <div class="media testimonial">
            <div class="media-left"><a href="#"><img src="images/testimonial/1.jpg" alt=""></a></div>
            <div class="media-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><a href="#">-  John Michale</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="media testimonial">
            <div class="media-left"><a href="#"><img src="images/testimonial/2.jpg" alt=""></a></div>
            <div class="media-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><a href="#">-  John Michale</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="media testimonial">
            <div class="media-left"><a href="#"><img src="images/testimonial/3.jpg" alt=""></a></div>
            <div class="media-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><a href="#">-  John Michale</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="media testimonial">
            <div class="media-left"><a href="#"><img src="images/testimonial/4.jpg" alt=""></a></div>
            <div class="media-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><a href="#">-  John Michale</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="media testimonial">
            <div class="media-left"><a href="#"><img src="images/testimonial/5.jpg" alt=""></a></div>
            <div class="media-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><a href="#">-  John Michale</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="media testimonial">
            <div class="media-left"><a href="#"><img src="images/testimonial/6.jpg" alt=""></a></div>
            <div class="media-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><a href="#">-  John Michale</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Our Clients-->
  <section class="our-client sectpad">
    <div class="container clearfix">
      <div class="section_header">
        <h2>Our Clients</h2>
      </div>
      <div class="client-carousel">
        <div class="client-slider">
          <div class="item"><img src="images/clients/1.jpg" alt=""></div>
          <div class="item"><img src="images/clients/2.jpg" alt=""></div>
          <div class="item"><img src="images/clients/3.jpg" alt=""></div>
          <div class="item"><img src="images/clients/4.jpg" alt=""></div>
          <div class="item"><img src="images/clients/5.jpg" alt=""></div>
          <div class="item"><img src="images/clients/6.jpg" alt=""></div>
        </div>
      </div>
    </div>
  </section>
 
@endsection

