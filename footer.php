<footer class="footer img-overlay bg_img" style="background-image: url(assets/images/frontend/footer/61023b2b0ac1b1627536171.jpg);">
    <div class="footer__top">
        <div class="container">
            <div class="footer-info-area">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-9">
                        <ul class="footer-contact-list justify-content-lg-start justify-content-center">
                           <!-- <li>
                                <div class="icon">
                                    <i class="las la-phone-volume"></i>
                                </div>
                                <div class="content">
                                    <a href="tel:+88 01644 - 947 831">+8809638241654</a>
                                </div>
                            </li>-->
                            <li>
                                <div class="icon">
                                    <i class="las la-envelope"></i>
                                </div>
                                <div class="content">
                                    <a href="mailto:info@onblooder.com"><span class="__cf_email__" data-cfemail="5f3b3a32301f38323e3633713c3032">info@onblooder.com</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 text-lg-end text-center">
                        <a href="https://onblooder.com/apply_donor.php" class="btn btn--base">Apply as a Donor</a>
                    </div>
                </div>
            </div>

            <div class="row gy-5 justify-content-between">
                <div class="col-xl-4 col-lg-4 col-sm-8 order-lg-1 order-1">
                    <div class="footer-widget">
                        <a href="https://onblooder.com/" class="footer-logo"><img src="https://onblooder.com/assets/images/logoIcon/logo.png" alt="logo"></a>
                        <p class="mt-3">OnBlooder is a dedicated blood donation platform in Bangladesh, connecting voluntary blood donors with those in need. Join our community of compassionate donors, create your account, and contribute to saving lives. Together, let's make a difference in bridging the gap between blood supply and demand.</p>
                      <!--  <form class="subscribe-form mt-4">
                            <input type="email" name="email" id="emailSub" class="form--control" placeholder="Enter email address">
                            <button type="button" class="subscribe-btn"><i class="lab la-telegram-plane"></i></button>
                        </form>-->
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-6 order-lg-2 order-3">
                    <div class="footer-widget">
                        <h4 class="footer-widget__title">Short Links</h4>
                        <ul class="footer-links-list">
                                                            <li><a href="about-us.php">About</a></li>
                                                            <li><a href="donor.php">Donor</a></li>
                                                            <li><a href="blog.php">Blog</a></li>
                                                            <li><a href="contact.php">Contact</a></li>
                                                    </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-6 order-lg-3 order-4">
                    <div class="footer-widget">
                        <h4 class="footer-widget__title">Support</h4>
                        <ul class="footer-links-list">
                            <li><a href="contact.html">Support Center</a></li>
                            <li><a href="https://onblooder.com/apply_donor.php">Apply as a Donor</a></li>
                                                            <li><a href="menu/terms-of-service/43.html">Terms of Service</a></li>
                                                            <li><a href="menu/privacy-policy/42.html">Privacy Policy</a></li>
                                                    </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-4 order-lg-4 order-2">
                    <div class="footer-widget">
                        <ul class="footer-overview-list text-end">
                            <li class="footer-overview">
                                <h4 class="footer-overview__number">4523</h4>
                                <p class="footer-overview__caption">Donors</p>
                            </li>
                            <li class="footer-overview">
                                <h4 class="footer-overview__number">5324</h4>
                                <p class="footer-overview__caption">Volunteers</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright © 2024 <a href="https://onblooder.com/" class="text--base"> OnBlooder </a> All Right Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>

        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/templates/basic/frontend/js/lib/jquery-3.6.0.min.js"></script>
        <script src="assets/templates/basic/frontend/js/lib/bootstrap.bundle.min.js"></script>
        <script src="assets/templates/basic/frontend/js/lib/slick.min.js"></script>
        <script src="assets/templates/basic/frontend/js/lib/wow.min.js"></script>
        <script src="assets/templates/basic/frontend/js/lib/lightcase.js"></script>
        <script src="assets/templates/basic/frontend/js/app.js"></script>
                <script>
    (function () {
        'use strict';
        $(document).on('click','.subscribe-btn' , function(){
            var email = $("#emailSub").val();
            if(email){
                $.ajax({
                    headers: {"X-CSRF-TOKEN": "w4ARB189GTNH3jYa3LYnfHGJlpmYmNe8zBKZ9Olh",},
                    url:"#/subscribe",
                    method:"POST",
                    data:{email:email},
                    success:function(response)
                    {
                        if(response.success) {
                            notify('success', response.success);
                            $("#emailSub").val('');
                        }else{
                            $.each(response, function (i, val) {
                                notify('error', val);
                            });
                        }
                    }
                });
            }
            else{
                notify('error', "Please Input Your Email");
            }
        });

        $('.policy').on('click',function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.get('cookie/accept.json', function(response){
                $('.cookie__wrapper').addClass('d-none');
                notify('success', response);
            });
        });
    })();
</script>
                <link rel="stylesheet" href="assets/global/css/iziToast.min.css">
<script src="assets/global/js/iziToast.min.js"></script>

<script>
    "use strict";
    function notify(status,message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }
</script>
        <script>
            (function ($) {
                "use strict";
                $(".langSel").on("change", function() {
                    window.location.href = "#/change/"+$(this).val() ;
                });
            })(jQuery);
        </script>
            
        <script>
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5fe0b9b2a8a254155ab5421d/1eq2tap1m';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
  })();
</script>

<script>
if (window.top != window.self) {
    document.body.innerHTML += '<div style="position:fixed;top:0;width:100%;z-index:9999999;background:#f8d7da;color:#721c24;text-align:center; padding: 20px;"><p style="font-size:20px; font-weight: bold;">You are using this website under an external iframe!!</p><p style="font-size:16px; margin-top: 20px;">for a better experience, please browse directly instead of an external iframe.</p><a href="'+window.self.location+'" target="_blank" style=" margin-top:20px; color: #fff;background-color: #dc3545; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Browse Directly</a></div>';
}
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</html> 
