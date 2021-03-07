@extends('pages.layouts.app')
@section('title', 'Project Details')
@section('content')
<section class="inner-banner2 clearfix">
    <div class="container clearfix">
      <h2>Projects</h2>
    </div>
  </section>
  <section class="breadcumb-wrapper">
    <div class="container clearfix">
      <ul class="breadcumb">
        <li><a href="index-2.html"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="projects.html">PROJECTS</a></li>
        <li><span>Oil Plant Project</span></li>
      </ul>
    </div>
  </section>
  <!-- Projects  Details-->
  <section class="core-projects sectpad">
    <div class="container clearfix">
      <div class="pro-det-img"><img src="images/projects/pro-de-img1.jpg" alt=""></div>
      <div class="pro-content clearfix">
        <h1>Oil Plant Project</h1>
        <h4>Project Desciption</h4>
        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
      </div>
      <div class="projects_hours clearfix">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <p>Project Starting Date<span>12.01.2016</span></p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <p>Project End<span>In Progress</span></p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <p>Category<span>Resarch</span></p>
          </div>
        </div>
      </div>
      <div class="project-con clearfix">
        <h2>Agricauture Process</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="project-scop clearfix">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 pro-img"><img src="images/projects/pro-de-img2.jpg" alt=""></div>
          <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            <h3>Work Scope</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <ul class="scope-item">
              <li>Financial Responsibility to Our Clients</li>
              <li>Superior Quality and Craftsmanship</li>
              <li>Quality and Value to the Projects We Deliver</li>
              <li>Highest Standards in Cost Control</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
