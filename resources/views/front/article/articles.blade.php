@extends('front.basis')
@section('content')
  <section class="sub-header shop-layout-1">
    <img class="rellax bg-overlay" src="images/sub-header/02.jpg" alt="">
    <div class="overlay-call-to-action"></div>
    <h3 class="heading-style-3">Blog</h3>
  </section>
  <section class="boxed-sm">
    <div class="container">
      <div class="row main">
        <div class="row blog-h reverse flex multi-row">
          <div class="col-md-4">
            <div class="post">
              <div class="img-wrapper js-set-bg-blog-thumb">
                <a href="blog-detail.html">
                  <img src="images/blog/01.jpg" alt="Image" />
                </a>
              </div>
              <div class="desc">
                <h4>
                  <a href="blog-detail.html">Beauty With Orchid Products</a>
                </h4>
                <p class="meta">
                  <span class="time">Feberuary 05, 2017</span>
                  <span class="comment">2</span>
                </p>
                <p>Etiam at varius diam, id blandit erat. Suspendisse eget volutpat risus, id venenatis justo. Fusce elementum ligula elit. Duis ultricies ultrices nibh, a tincidunt risus pretium eleifend. </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="post">
              <div class="img-wrapper js-set-bg-blog-thumb">
                <a href="blog-detail.html">
                  <img src="images/blog/02.jpg" alt="Image" />
                </a>
              </div>
              <div class="desc">
                <h4>
                  <a href="blog-detail.html">Green Vegetables Are Good For Healthy</a>
                </h4>
                <p class="meta">
                  <span class="time">January 30, 2017</span>
                  <span class="comment">0</span>
                </p>
                <p>Vivamus consectetur nulla mattis lorem ultricies, ac congue tellus consectetur. Vivamus sed purus volutpat, varius mauris id, tempus augue. Nuefd ans congue liquam.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="post">
              <div class="img-wrapper js-set-bg-blog-thumb">
                <a href="blog-detail.html">
                  <img src="images/blog/03.jpg" alt="Image" />
                </a>
              </div>
              <div class="desc">
                <h4>
                  <a href="blog-detail.html">Refreshing Green Smoothie Recipe</a>
                </h4>
                <p class="meta">
                  <span class="time">January 20, 2017</span>
                  <span class="comment">4</span>
                </p>
                <p>Praesent efficitur felis eu luctus vestibulum. In hac habitasse platea dictumst. Nam egestas eu nisl ac pellentesque. Duis congue suscipit lorem vel congue. </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="post">
              <div class="img-wrapper js-set-bg-blog-thumb">
                <a href="blog-detail.html">
                  <img src="images/blog/04.jpg" alt="Image" />
                </a>
              </div>
              <div class="desc">
                <h4>
                  <a href="blog-detail.html">Growing Your Own Orchid Food</a>
                </h4>
                <p class="meta">
                  <span class="time">January 02, 2017</span>
                  <span class="comment">2</span>
                </p>
                <p>Phasellus vitae metus eu purus tincidunt fermentum eu id nisl. In gravida nec augue at pulvinar. Aenean at nunc a tellus posuere elementum. Suspendisse neque ante, consectetur quis odio blandit vundsl.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="post">
              <div class="img-wrapper js-set-bg-blog-thumb">
                <a href="blog-detail.html">
                  <img src="images/blog/05.jpg" alt="Image" />
                </a>
              </div>
              <div class="desc">
                <h4>
                  <a href="blog-detail.html">Food Heaven Made Easy</a>
                </h4>
                <p class="meta">
                  <span class="time">December 23, 2016</span>
                  <span class="comment">2</span>
                </p>
                <p>Etiam id tortor eget dui volutpat tincidunt placerat convallis neque. Nullam vulputate arcu lectus. Ut vestibulum fringilla nibh et imperdiet. Curabitur ullamcorper rhoncus libero vitae consectetur.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="post">
              <div class="img-wrapper js-set-bg-blog-thumb">
                <a href="blog-detail.html">
                  <img src="images/blog/06.jpg" alt="Image" />
                </a>
              </div>
              <div class="desc">
                <h4>
                  <a href="blog-detail.html">The Nutritional Benefits of Orchid Fruits</a>
                </h4>
                <p class="meta">
                  <span class="time">December 11, 2016</span>
                  <span class="comment">6</span>
                </p>
                <p>Aliquam erat volutpat. Cras sollicitudin, sapien ut hendrerit varius, sapien massa auctor neque, eget convallis ligula ligula et libero. Pellentesque commodo nec tortor.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <nav>
              <ul class="pagination pagination-style-2">
                <li>
                  <a class="prev page-numbers" href="#">
                    <i class="fa fa-long-arrow-left"></i>
                  </a>
                </li>
                <li>
                  <a class="page-numbers" href="#">3</a>
                </li>
                <li>
                  <a class="page-numbers" href="#">4</a>
                </li>
                <li>
                  <span class="page-numbers current">5</span>
                </li>
                <li>
                  <a class="next page-numbers" href="#">
                    <i class="fa fa-long-arrow-right"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('script_down')



  <script src="/front/js/library/jquery.min.js"></script>
  <script src="/front/js/library/bootstrap.min.js"></script>
  <script src="/front/js/function-check-viewport.js"></script>
  <script src="/front/js/library/slick.min.js"></script>
  <script src="/front/js/library/select2.full.min.js"></script>
  <script src="/front/js/library/imagesloaded.pkgd.min.js"></script>
  <script src="/front/js/library/jquery.mmenu.all.min.js"></script>
  <script src="/front/js/library/rellax.min.js"></script>
  <script src="/front/js/library/isotope.pkgd.min.js"></script>
  <script src="/front/js/library/bootstrap-notify.min.js"></script>
  <script src="/front/js/library/bootstrap-slider.js"></script>
  <script src="/front/js/library/in-view.min.js"></script>
  <script src="/front/js/library/countUp.js"></script>
  <script src="/front/js/library/animsition.min.js"></script>

  <script src="/front/js/global.js"></script>
  <script src="/front/js/config-mm-menu.js"></script>
  <script src="/front/js/config-set-bg-blog-thumb.js"></script>

@endsection