<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="footer-item clearfix">
                    {!! logoImage() !!}
                    <div class="text">
                        <p style="font-family:auto;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="footer-item">
                    <h4>Contact Us</h4>
                    <div class="f-border"></div>
                    <ul class="contact-info">
                        <li>
                            <i class="flaticon-pin"></i>201, gulmohar enclave, block-D, scheme no. 94, Indore 452001 (MP)
                        </li>
                        <li>
                            <i class="flaticon-mail"></i><a href="mailto:sales@hotelempire.com">appleblossomshelter@gmail.com</a>
                        </li>
                        <li>
                            <i class="flaticon-phone"></i><a href="tel:+55-417-634-7071">9827749830</a>
                        </li>
                        <li>
                            <i class="flaticon-fax"></i>9009992617
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
                            <a href="{{url('')}}">Home</a>
                        </li>
                        <li>
                           <a href="{{url('about-us')}}">About Us</a>
                        </li>
                        <li>
                           <a href="{{url('contact-us')}}">Contact Us</a>
                        </li>
                        <li>
                           <a href="{{url('faq')}}">Faq</a>
                        </li>
                        
                       <li>
                           <a href="{{url('terms-conditions')}}">Terms and Conditions</a>
                       </li>
                       <!-- <li>
                           <a href="properties-details.html">Privacy Policies</a>
                       </li>
                       <li>
                           <a href="properties-details.html">Careers</a>
                       </li> -->
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
                <p class="copy">© Apple blossom shelters</p>
            </div>
            <div class="col-lg-4 col-md-4">
                <ul class="social-list clearfix">
                    <li><a href="https://www.facebook.com/appleblossomshelters/?__tn__=%2Cd%2CP-R&eid=ARAAfn2QMwuPvZ-BgyWl8DDroh5waPTyTz9LFHMS2-hxGTCH3shm5B3HMGnXnAcTys-6qo2IQYE2wIMU" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/appleblossomshelters_/?hl=en" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
                    <!-- <li><a href="#" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="google" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li> -->
                    
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sub footer end -->

@include('layouts.footer_js');