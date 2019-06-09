<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="footer-item clearfix">
                    <img src="{{logoImage()}}" alt="logo1" height="50px;"width=50px;>
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="footer-item">
                    <h4>Contact Us</h4>
                    <div class="f-border"></div>
                    <ul class="contact-info">
                        <li>
                            <i class="flaticon-pin"></i>20/F Green Road, Dhanmondi, Dhaka
                        </li>
                        <li>
                            <i class="flaticon-mail"></i><a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                        </li>
                        <li>
                            <i class="flaticon-phone"></i><a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                        </li>
                        <li>
                            <i class="flaticon-fax"></i>+0477 85X6 552
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="footer-item">
                    <h4>
                        Useful Links
                    </h4>
                    <div class="f-border"></div>
                    <ul class="links">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="{{url('about-us')}}">About Us</a>
                        </li>
                        <li>
                            <a href="services.html">Services</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact Us</a>
                        </li>
                        <li>
                            <a href="properties-details.html">Properties Details</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->

<!-- Sub footer start -->
<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <p class="copy">© 2019 <a href="#">Theme Vessel.</a> Trademarks and brands are the property of their respective owners.</p>
            </div>
        </div>
    </div>
</div>
<!-- Sub footer end -->

@include('layouts.footer_js');