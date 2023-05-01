  <footer class="footer area-bg">
      <div class="area-bg__inner">
          <div class="footer__main">
              <div class="container">
                  <div class="row">
                      <div class="col-md-3">
                          <div class="footer-section">
                              <a class="footer__logo" href="https://kmcjapan.co.jp/">
                                  <img class="img-responsive" src="{{URL::to('/')}}/assets/media/general/app_logo.png"
                                      alt="Logo" />
                              </a>
                              <div class="footer__info">KMC Japan Co. Ltd., is one of the leading automobile trading
                                  companies located in Fukuoka, Japan. We have a best quality collection of
                                  reconditioned / used vehicles and great experience to export all over the world.
                              </div>
                              <ul class="social-net list-inline">
                                  <li><a href="https://www.facebook.com/kmcjapancoltd" target="_blank"><i
                                              class="social_icons fa fa-facebook"></i></a></li>
                                  <li class="li-last"><a href="https://www.instagram.com/kmc.japan/" target="_blank"><i
                                              class="social_icons fa fa-instagram"></i></a>
                                  </li>
                                  <li><a href="https://www.youtube.com/" target="_blank"><i
                                              class="social_icons fa fa-youtube-play"></i></a> </li>
                              </ul>
                              <!-- end .social-list-->
                          </div>
                      </div>
                      <div class="col-md-4">
                          <section class="footer-section footer-section_list-columns">
                              <h3 class="footer-section__title ui-title-inner">Top Brands</h3>
                              <ul class="footer-list footer-list_columns list-unstyled">
                                  @foreach ($brand as $row)
                                  <li class="footer-list__item"><a class="footer-list__link"
                                          href="{{ url('car-list?id=' . $row->id) }}">{{ $row->name }}</a>
                                  </li>
                                  @endforeach

                              </ul>
                          </section>
                      </div>
                      <div class="col-md-2">
                          <section class="footer-section footer-section_list-one">
                              <h3 class="footer-section__title ui-title-inner">Categories</h3>
                              <ul class="footer-list list-unstyled">
                                  @foreach ($bodyStyle as $row)
                                  <li class="footer-list__item"><a class="footer-list__link"
                                          href="{{ url('car-list?bodyStyleId=' . $row->id) }}">{{ $row->name }}</a>
                                  </li>
                                  @endforeach
                              </ul>
                          </section>
                      </div>
                      <div class="col-md-3">
                          <section class="footer-section">
                              <h3 class="footer-section__title ui-title-inner">Address Information</h3>
                              <div class="footer-contact footer-contact_lg"><i class="icon fa fa-whatsapp"></i>Call
                                  us<span class="text-primary"> <a href="https://wa.me/message/7V6S7UP3J6UIC1"> (+81)
                                          70-8372-9196</a></span>
                              </div>
                              <div class="footer-contact footer-contact_lg"><i class="icon fa fa-fax"></i>Fax<span
                                      class="text-primary"> (+81)
                                      50-3183-9231</span>
                              </div>
                              <div class="footer-contact"><i class="icon icon-xs fa fa-envelope-o"></i>
                                  sales@kmcjapan.co.jp</div>
                              <div class="footer-contact"><i class="icon icon-lg fa fa-map-marker"></i>Fukuoka-shi,
                                  Higashi-ku, Hakozaki 1-10-11, Japan.812-0053</div>
                              <div class="footer-contact"><i class="icon fa fa-clock-o"></i>Mon - Fri : 0900am to 0600pm
                              </div>
                          </section>
                      </div>
                  </div>
              </div>
          </div>
          <div class="copyright">
              <div class="container">
                  <div class="row">
                      <div class="col-xs-12">Copyrights 2022<a class="copyright__brand" href="home.html">
                              KMC JAPAN CO., LTD.</a> All Rights Reserved<a class="copyright__link"
                              href="privacy-policy.html">Privacy Policy</a><a class="copyright__link"
                              href="{{url('terms-conditions')}}">Terms & Conditions</a>
                      </div>
                  </div>
              </div>
          </div><span class="btn-up" id="toTop">TOP</span>
      </div>
  </footer>
