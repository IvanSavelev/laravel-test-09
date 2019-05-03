@extends('front.front')
@section('content_basis')
<div class="shop-layout-4" id="page">
  <nav id="menu">
    <ul>
      <li>
        <a href="index.html">Home</a>
        <ul>
          <li>
            <a href="index.html">Home Version 1</a>
          </li>
          <li>
            <a href="index-02.html">Home Version 2</a>
          </li>
          <li>
            <a href="index-03.html">Home Version 3</a>
          </li>
          <li>
            <a href="index-04.html">Home Version 4</a>
          </li>
        </ul>
      </li>
      <li>
        <a class="active" href="shop.html">Shop</a>
        <ul>
          <li>
            <a href="shop.html">Shop List</a>
          </li>
          <li>
            <a href="shop-02.html">Shop List Version 2</a>
          </li>
          <li>
            <a href="shop-03.html">Shop List Version 3</a>
          </li>
          <li>
            <a href="shop-04.html">Shop List Version 4</a>
          </li>
          <li>
            <a href="shop-detail.html">Shop Detail</a>
            <ul>
              <li>
                <a href="shop-detail.html">Shop Detail</a>
              </li>
              <li>
                <a href="shop-detail-02.html">Shop Detail Version 2</a>
              </li>
              <li>
                <a href="shop-detail-03.html">Shop Detail Version 3</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="wish-list.html">Wishlist</a>
          </li>
          <li>
            <a href="shop-cart.html">Shop Cart</a>
          </li>
          <li>
            <a href="check-out.html">Checkout</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="about.html">About</a>
      </li>
      <li>
        <a href="blog.html">Blog</a>
        <ul>
          <li>
            <a href="blog.html">Blog List Version 1</a>
          </li>
          <li>
            <a href="blog-02.html">Blog List Version 2</a>
          </li>
          <li>
            <a href="blog-03.html">Blog List Version 3</a>
          </li>
          <li>
            <a href="blog-04.html">Blog List Version 4</a>
          </li>
          <li>
            <a href="blog-detail.html">Blog Detail</a>
            <ul>
              <li>
                <a href="blog-detail.html">Blog Detail</a>
              </li>
              <li>
                <a href="blog-detail-02.html">Blog Detail Version 2</a>
              </li>
              <li>
                <a href="blog-detail-03.html">Blog Detail Version 3</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li>
        <a href="contact.html">Contact</a>
      </li>
      <li>
        <a href="faq.html">Feature</a>
        <ul>
          <li>
            <a href="404.html">404 Page</a>
          </li>
          <li>
            <a href="faq.html">Faq</a>
          </li>
          <li>
            <a href="login.html">Login</a>
          </li>
          <li>
            <a href="register.html">Register</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <header class="header-style-1">
    <div class="container">
      <div class="row">
        <div class="header-1-inner">
          <a class="brand-logo animsition-link" href="{{ route('front.index') }}">
            <img class="img-responsive" src="front/images/logo.png" alt="" />
          </a>
          <nav>
            <ul class="menu hidden-xs">
              <li>
                <a href="{{ route('front.index') }}">Home</a>
                <ul>
                  <li>
                    <a href="index.html">Home Version 1</a>
                  </li>
                  <li>
                    <a href="index-02.html">Home Version 2</a>
                  </li>
                  <li>
                    <a href="index-03.html">Home Version 3</a>
                  </li>
                  <li>
                    <a href="index-04.html">Home Version 4</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="active" href="shop.html">Shop</a>
                <ul>
                  <li>
                    <a href="shop.html">Shop List</a>
                  </li>
                  <li>
                    <a href="shop-02.html">Shop List Version 2</a>
                  </li>
                  <li>
                    <a href="shop-03.html">Shop List Version 3</a>
                  </li>
                  <li>
                    <a href="shop-04.html">Shop List Version 4</a>
                  </li>
                  <li>
                    <a href="shop-detail.html">Shop Detail</a>
                    <ul>
                      <li>
                        <a href="shop-detail.html">Shop Detail</a>
                      </li>
                      <li>
                        <a href="shop-detail-02.html">Shop Detail Version 2</a>
                      </li>
                      <li>
                        <a href="shop-detail-03.html">Shop Detail Version 3</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="wish-list.html">Wishlist</a>
                  </li>
                  <li>
                    <a href="shop-cart.html">Shop Cart</a>
                  </li>
                  <li>
                    <a href="check-out.html">Checkout</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="about.html">About</a>
              </li>
              <li>
                <a href="blog.html">Blog</a>
                <ul>
                  <li>
                    <a href="blog.html">Blog List Version 1</a>
                  </li>
                  <li>
                    <a href="blog-02.html">Blog List Version 2</a>
                  </li>
                  <li>
                    <a href="blog-03.html">Blog List Version 3</a>
                  </li>
                  <li>
                    <a href="blog-04.html">Blog List Version 4</a>
                  </li>
                  <li>
                    <a href="blog-detail.html">Blog Detail</a>
                    <ul>
                      <li>
                        <a href="blog-detail.html">Blog Detail</a>
                      </li>
                      <li>
                        <a href="blog-detail-02.html">Blog Detail Version 2</a>
                      </li>
                      <li>
                        <a href="blog-detail-03.html">Blog Detail Version 3</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li>
                <a href="contact.html">Contact</a>
              </li>
              <li>
                <a href="faq.html">Feature</a>
                <ul>
                  <li>
                    <a href="404.html">404 Page</a>
                  </li>
                  <li>
                    <a href="faq.html">Faq</a>
                  </li>
                  <li>
                    <a href="login.html">Login</a>
                  </li>
                  <li>
                    <a href="register.html">Register</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
          <aside class="right">
            <div class="widget widget-control-header">
              <div class="select-custom-wrapper">
                <select class="no-border">
                  <option>USD</option>
                  <option>VND</option>
                  <option>EUR</option>
                  <option>JPY</option>
                </select>
              </div>
            </div>
            <div class="widget widget-control-header widget-search-header">
              <a class="control btn-open-search-form js-open-search-form-header" href="#">
                <span class="lnr lnr-magnifier"></span>
              </a>
              <div class="form-outer">
                <button class="btn-close-form-search-header js-close-search-form-header">
                  <span class="lnr lnr-cross"></span>
                </button>
                <form>
                  <input placeholder="Search" />
                  <button class="search">
                    <span class="lnr lnr-magnifier"></span>
                  </button>
                </form>
              </div>
            </div>
            <div class="widget widget-control-header widget-shop-cart js-widget-shop-cart">
              <a class="control" href="shop-cart.html">
                <p class="counter">0</p>
                <span class="lnr lnr-cart"></span>
              </a>
            </div>
            <div class="widget widget-control-header hidden-lg hidden-md hidden-sm">
              <a class="navbar-toggle js-offcanvas-has-events" type="button" href="#menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </header>
  @yield('content')
</div>

<footer class="footer-style-1">
  <div class="container">
    <div class="row">
      <div class="footer-style-1-inner">
        <div class="widget-footer widget-text col-first col-small">
          <a href="#">
            <img class="logo-footer" src="front/images/logo.png" alt="Logo Organic" />
          </a>
          <div class="widget-link">
            <ul>
              <li>
                <span class="lnr lnr-map-marker icon"></span>
                <span>379 5th Ave New York, NYC 10018</span>
              </li>
              <li>
                <span class="lnr lnr-phone-handset icon"></span>
                <a href="tel:0123456789">(+1) 96 716 6879</a>
              </li>
              <li>
                <span class="lnr lnr-envelope icon"></span>
                <a href="mailto: contact@site.com">contact@site.com </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="widget-footer widget-link col-second col-medium">
          <div class="list-link">
            <h4 class="h4 heading">SHOP</h4>
            <ul>
              <li>
                <a href="#">Food</a>
              </li>
              <li>
                <a href="#">Farm</a>
              </li>
              <li>
                <a href="#">Health</a>
              </li>
              <li>
                <a href="#">Organic</a>
              </li>
            </ul>
          </div>
          <div class="list-link">
            <h4 class="h4 heading">SUPPORT</h4>
            <ul>
              <li>
                <a href="#">Contact Us</a>
              </li>
              <li>
                <a href="#">FAQ</a>
              </li>
              <li>
                <a href="#">Privacy Policy</a>
              </li>
              <li>
                <a href="#">Blog</a>
              </li>
            </ul>
          </div>
          <div class="list-link">
            <h4 class="h4 heading">MY ACCOUNT</h4>
            <ul>
              <li>
                <a href="#">Sign In</a>
              </li>
              <li>
                <a href="#">My Cart</a>
              </li>
              <li>
                <a href="#">My Wishlist</a>
              </li>
              <li>
                <a href="#">Check Out</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="widget-footer widget-newsletter-footer col-last col-small">
          <h4 class="h4 heading">NEWSLETTER</h4>
          <p>Subscribe now to get daily updates</p>
          <form class="organic-form form-inline btn-add-on circle border">
            <div class="form-group">
              <input class="form-control pill transparent" placeholder="Your Email..." type="email" />
              <button class="btn btn-brand circle" type="submit">
                <i class="fa fa-envelope-o"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="copy-right style-1">
    <div class="container">
      <div class="row">
        <div class="copy-right-inner">
          <p>Copyright © 2017 Designed by AuThemes. All rights reserved.</p>
          <div class="widget widget-footer widget-footer-creadit-card">
            <ul class="list-unstyle">
              <li>
                <a href="#">
                  <img src="front/images/icons/creadit-card-01.png" alt="creadit card" />
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="front/images/icons/creadit-card-02.png" alt="creadit card" />
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="front/images/icons/creadit-card-03.png" alt="creadit card" />
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="front/images/icons/creadit-card-04.png" alt="creadit card" />
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="modal fade" id="quick-view-product" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg modal-quickview woocommerce" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="woocommerce-product-gallery">
              <div class="main-carousel-product-quick-view">
                <div class="item">
                  <img class="img-responsive" src="front/images/product/01.jpg" alt="product thumbnail" />
                </div>
                <div class="item">
                  <img class="img-responsive" src="front/images/product/02.jpg" alt="product thumbnail" />
                </div>
                <div class="item">
                  <img class="img-responsive" src="front/images/product/03.jpg" alt="product thumbnail" />
                </div>
                <div class="item">
                  <img class="img-responsive" src="front/images/product/04.jpg" alt="product thumbnail" />
                </div>
                <div class="item">
                  <img class="img-responsive" src="front/images/product/05.jpg" alt="product thumbnail" />
                </div>
              </div>
              <div class="thumbnail-carousel-product-quickview">
                <div class="item">
                  <img class="img-responsive" src="front/images/product/01.jpg" alt="product thumbnail" />
                </div>
                <div class="item">
                  <img class="img-responsive" src="front/images/product/02.jpg" alt="product thumbnail" />
                </div>
                <div class="item">
                  <img class="img-responsive" src="front/images/product/03.jpg" alt="product thumbnail" />
                </div>
                <div class="item">
                  <img class="img-responsive" src="front/images/product/04.jpg" alt="product thumbnail" />
                </div>
                <div class="item">
                  <img class="img-responsive" src="front/images/product/05.jpg" alt="product thumbnail" />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="summary">
              <div class="desc">
                <div class="header-desc">
                  <h2 class="product-title">Sald</h2>
                  <p class="price">$2.00</p>
                </div>
                <div class="body-desc">
                  <div class="woocommerce-product-details-short-description">
                    <p>Duis vestibulum ante velit. Pellentesque orci felis, pharetra ut pharetra ut, interdum at mauris. Aenean efficitur aliquet libero sit amet scelerisque. Suspendisse efficitur mollis eleifend. Aliquam tortor nibh, venenatis quis
                      sem dapibus, varius egestas lorem a sollicitudin. </p>
                  </div>
                </div>
                <div class="footer-desc">
                  <form class="cart">
                    <div class="quantity buttons-added">
                      <input class="minus" value="-" type="button" />
                      <input class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" type="number" />
                      <input class="plus" value="+" type="button" />
                    </div>
                    <div class="group-btn-control-wrapper">
                      <button class="btn btn-brand no-radius">ADD TO CART</button>
                      <button class="btn btn-wishlist btn-brand-ghost no-radius">
                        <i class="fa fa-heart"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="product-meta">
                <p class="posted-in">Categories:
                  <a href="#" rel="tag">Food</a>
                </p>
                <p class="tagged-as">Tags:
                  <a href="#" rel="tag">Natural</a>,
                  <a href="#" rel="tag">Organic</a>,
                  <a href="#" rel="tag">Health</a>,
                  <a href="#" rel="tag">Green</a>,
                  <a href="#" rel="tag">Vegetable</a>
                </p>
                <p class="id">ID:
                  <a href="#">A203</a>
                </p>
              </div>
              <div class="widget-social align-left">
                <ul>
                  <li>
                    <a class="facebook" data-toggle="tooltip" title="Facebook" href="http://www.facebook.com/authemes">
                      <i class="fa fa-facebook"></i>
                    </a>
                  </li>
                  <li>
                    <a class="pinterest" data-toggle="tooltip" title="Pinterest" href="http://www.pinterest.com/authemes">
                      <i class="fa fa-pinterest"></i>
                    </a>
                  </li>
                  <li>
                    <a class="twitter" data-toggle="tooltip" title="Twitter" href="http://www.twitter.com/authemes">
                      <i class="fa fa-twitter"></i>
                    </a>
                  </li>
                  <li>
                    <a class="google-plus" data-toggle="tooltip" title="Google Plus" href="https://plus.google.com/authemes">
                      <i class="fa fa-google-plus"></i>
                    </a>
                  </li>
                  <li>
                    <a class="instagram" data-toggle="tooltip" title="Instagram" href="https://instagram.com/authemes">
                      <i class="fa fa-instagram"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
