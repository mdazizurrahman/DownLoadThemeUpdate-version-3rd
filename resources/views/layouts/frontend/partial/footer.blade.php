 <!-- all footer -->
    <!-- Footer Area -->
    <footer>
        <section class="footer-area">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                            <div class="single-top-footer">
                                <i class="icofont-ui-call blue"></i>
                                <div class="single-top">
                                    <h6>7 999 8888 999</h6>
                                    <p>Call to our office at ant time</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                            <div class="single-top-footer">
                                <i class="icofont-envelope red"></i>
                                <div class="single-top">
                                    <h6>info@sitename.com</h6>
                                    <p>Our suppor team</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                            <div class="single-top-footer">
                                <i class="icofont-clock-time green"></i>
                                <div class="single-top">
                                    <h6>9:00 - 5:00</h6>
                                    <p>Monday to Saturday</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                            <div class="single-top-footer">
                                <i class="icofont-location-pin yellow"></i>
                                <div class="single-top">
                                    <h6>184 Main Street Victoria</h6>
                                    <p>Melbourne, Australia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="container">
                <div class="footer-meadle">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4">
                            <div class="single-meadle-footer">
                                <div class="title">
                                    <h3>About us</h3>
                                </div>
                                <div class="about-details">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                    <ul>
                                        <li><a href=""><i class="icofont-facebook"></i></a></li>
                                        <li><a href=""><i class="icofont-twitter"></i></a></li>
                                        <li><a href=""><i class="icofont-pinterest"></i></a></li>
                                        <li><a href=""><i class="icofont-instagram"></i></a></li>
                                        <li><a href=""><i class="icofont-skype"></i></a></li>
                                        <li><a href=""><i class="icofont-dribble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4">
                            <div class="single-meadle-footer">
                                <div class="title">
                                    <h3>Userful Links</h3>
                                </div>
                                <div class="link-area">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul>
                                                <li>
                                                    <a href="">
                                                        <i class="icofont-simple-right"></i>
                                                        Home
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="icofont-simple-right"></i>
                                                        About Us
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="icofont-simple-right"></i>
                                                        Our News
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="icofont-simple-right"></i>
                                                        Services
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="icofont-simple-right"></i>
                                                        Careers
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul>
                                                <li>
                                                    <a href="">
                                                        <i class="icofont-simple-right"></i>
                                                        Our Services
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="icofont-simple-right"></i>
                                                        Teams & Condition
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="icofont-simple-right"></i>
                                                        Shop
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="icofont-simple-right"></i>
                                                        Contact Us
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-4">
                            <div class="single-meadle-footer">
                                <div class="title">
                                    <h3>{{__('Email Newsletter')}}</h3>
                                </div>
                                <div class="newsletter-details">
                                    <form action="{{route('subscriber.store')}}" method="POST">
                                        @csrf
                                        <div class="row clearfix">
                                        <input name="email" type="email" placeholder="Email Address" />
                                        <button type="submit">{{__('SUBSCRIBE')}}</button>
                                    </form>
                                    <p>{{__('Sign up for new Recover Transportation & Logistics Company content, updates, surveys & offers')}}</p>
                                    <a href="">{{__('Privacy Policy')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Footer Area -->
        
        <!-- Footer Bottom Area -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="single-footer-bottom">
                            <p>@ 2019 <a href="">Dalax</a> Consulting Business, Finace</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="single-footer-bottom text-center">
                            <p>Designed by <a href="">hussainhridoy</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="single-footer-bottom">
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="assets/img/footer/footer-1.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="assets/img/footer/footer-2.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="assets/img/footer/footer-3.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="assets/img/footer/footer-4.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="assets/img/footer/footer-5.png" alt="" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Bottom Area -->
    <!-- all footer -->