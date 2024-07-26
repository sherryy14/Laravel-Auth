<!-- main-footer -->
<footer class="main-footer light">
    <div class="footer-top">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 big-column">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
                            <div class="footer-widget logo-widget">
                                <figure class="footer-logo"><a href="#"><img
                                            src="{{ asset('assets/images/footer-logo.png') }}" alt=""></a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>Top Brand</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        @foreach ($brands as $brand)
                                            <li><a href="{{ $brand['route'] }}">{{ $brand['name'] }}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>Useful Link</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="#">News & Tips</a></li>
                                        {{-- <li><a href="#">About Us</a></li> --}}
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Our Shop</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 big-column">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Contact</h3>
                                </div>
                                <ul class="info-list clearfix">
                                    <li><i class="flaticon-maps-and-flags"></i>4708 Ruecker Wall, Kassandratown, HI</li>
                                    <li><i class="flaticon-phone-ringing"></i><a href="tel:23055873407">+2(305)
                                            587-3407</a></li>
                                    <li><i class="flaticon-email"></i><a
                                            href="mailto:info@example.com">info@example.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget newsletter-widget">
                                <div class="widget-title">
                                    <h3>Newsletter</h3>
                                </div>
                                <div class="widget-content">
                                    <p>4708 Ruecker Wall, Kassandratown, HI 97729</p>
                                    <form id="subscribeFormFooter" class="newsletter-form">
                                        <div id="message-footer" class="message"></div>
                                        <div class="form-group">
                                            <input type="email" id="email-footer" placeholder="Enter your email">
                                            <button type="submit" class="theme-btn-three">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container clearfix">
            <ul class="cart-list pull-left clearfix">
                <li><a href="#"><img src="{{ asset('assets/images/resource/card-1.png') }}" alt=""></a>
                </li>
                <li><a href="#"><img src="{{ asset('assets/images/resource/card-2.png') }}" alt=""></a>
                </li>
                <li><a href="#"><img src="{{ asset('assets/images/resource/card-3.png') }}" alt=""></a>
                </li>
                <li><a href="#"><img src="{{ asset('assets/images/resource/card-4.png') }}" alt=""></a>
                </li>
            </ul>
            <div class="copyright pull-right">
                <ul class="footer-social clearfix">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                </ul>
                {{-- get current year  --}}

                <p><a href="#">Syncvogue</a> &copy; @php echo date('Y'); @endphp All Right Reserved</p>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->


<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-long-arrow-alt-up"></i>
</button>
</div>


<!-- jequery plugins -->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/validation.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/js/appear.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.js') }}"></script>
<script src="{{ asset('assets/js/jquery.bootstrap-touchspin.js') }}"></script>
<script src="{{ asset('assets/js/bxslider.js') }}"></script>

<!-- map-js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
<script src="{{ asset('assets/js/gmaps.js') }}"></script>
<script src="{{ asset('assets/js/map-helper.js') }}"></script>

<!-- main-js -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script>
    // Update cart quantity
    function updateCartIcon() {
        fetch("{{ route('cart.getTotals') }}")
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector('.shop-cart span').textContent = data.totalQuantity;
                } else {
                    console.error('Failed to fetch cart totals.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    updateCartIcon();

    document.addEventListener('DOMContentLoaded', function() {
        if (!localStorage.getItem('subscribePopupClosed')) {
            setTimeout(function() {
                document.getElementById('subscribePopup').classList.add('show');
                document.getElementById('overlay').classList.add('show');
            }, 5000);
        }

        if (document.getElementById('closeIcon')) {
            document.getElementById('closeIcon').addEventListener('click', function() {
                document.getElementById('subscribePopup').classList.remove('show');
                document.getElementById('overlay').classList.remove('show');
                localStorage.setItem('subscribePopupClosed', 'true');
            });
        }

        // Susbcribe Popup
        document.getElementById('subscribeForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const email = document.getElementById('email').value;
            const agree = document.getElementById('agree').checked;
            if (email === '') {
                displayMessage('Email is required.', 'error');
                return;
            }
            if (!agree) {
                displayMessage('You must agree to the terms before subscribing.', 'error');
                return;
            }

            fetch("{{ route('subscribers') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        email
                    })
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        displayMessage('Subscription successful!', 'success');
                        document.getElementById('subscribeForm').classList.add('d-none')
                        document.getElementById('notice').classList.add('d-none')
                        document.getElementById('success-box').classList.remove('d-none')
                        // setTimeout(() => {
                        //     document.getElementById('subscribePopup').classList.remove(
                        //         'show');
                        //     document.getElementById('overlay').classList.remove('show');
                        // }, 1000);
                        localStorage.setItem('subscribePopupClosed', 'true');
                    } else {
                        displayMessage('This email is already subscribed.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    displayMessage('An error occurred. Please try again.', 'error');
                });
        });

        // Footer Susbcribe
        document.getElementById('subscribeFormFooter').addEventListener('submit', function(event) {
            event.preventDefault();
            const email = document.getElementById('email-footer').value;
            if (email === '') {
                displayFooterMessage('Email is required.', 'error');
                return;
            }

            fetch("{{ route('subscribers') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        email
                    })
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        displayFooterMessage('Subscription successful!', 'success');
                        setTimeout(() => {
                            displayFooterMessage('', 'success');
                        }, 2000);
                        localStorage.setItem('subscribePopupClosed', 'true');
                    } else {
                        displayFooterMessage('This email is already subscribed.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    displayFooterMessage('An error occurred. Please try again.', 'error');
                });
        });


        function displayMessage(message, type) {
            const messageContainer = document.getElementById('message');
            messageContainer.textContent = message;
            messageContainer.className = `message ${type}`;
        }

        function displayFooterMessage(message, type) {
            const messageContainer = document.getElementById('message-footer');
            messageContainer.textContent = message;
            messageContainer.className = `message ${type}`;
        }

    });
</script>

{{-- <script type="text/javascript">
    function googleTranslateElementInit() {
                new google.translate.TranslateElement(
                    {
                        pageLanguage: 'en',
                        includedLanguages: 'en,ar',
                        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
                    },
                    'google_translate_element'
                );

      var $googleDiv = $("#google_translate_element .skiptranslate");
      var $googleDivChild = $("#google_translate_element .skiptranslate div");
      $googleDivChild.next().remove();

      $googleDiv.contents().filter(function(){
          return this.nodeType === 3 && $.trim(this.nodeValue) !== '';
      }).remove();

    }
    </script> --}}
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
</body><!-- End of .page_wrapper -->

</html>
