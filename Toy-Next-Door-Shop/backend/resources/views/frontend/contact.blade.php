@extends ('layouts.frontend')

@section('content')

<div class="inquiry-item">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1628.6644877263057!2d100.51866170177965!3d13.860707385993885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b2fffffffff%3A0x66b03f15fcf83cdc!2z4LmA4Lit4Liq4Lie4Lil4Liy4LiZ4Liy4LiUIOC4i-C4teC4meC4teC5gOC4nuC4peC5h-C4geC4i-C5jCDguIfguLLguKHguKfguIfguKjguYzguKfguLLguJkt4LmB4LiE4Lij4Liy4Lii!5e0!3m2!1sth!2sth!4v1720420315667!5m2!1sth!2sth"
        width="1920" height="550" allowfullscreen="" loading="lazy" class="padding-medium"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="contact-us padding-large">
    <div class="container">
        <div class="row">
            <div class="contact-info col-lg-4 pb-3">
                <h2 class="display-7 text-uppercase text-dark">Contact info</h2>
                <div class="page-content d-flex flex-wrap">
                    <div class="col-lg-6 col-sm-12">
                        <div class="content-box text-dark pe-4 mb-5">
                            <h3 class="card-title text-uppercase text-decoration-underline">Store</h3>
                            <div class="contact-address pt-3">
                                <p>37, 39 ถนน รัตนาธิเบศร์ บางกระสอ อำเภอเมืองนนทบุรี นนทบุรี 11000</p>
                            </div>
                            <div class="contact-number">
                                <p>
                                    <a href="#">
                                        089 895 9036</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inquiry-item col-lg-8">
                <img src="images/contact.jpg"
                    alt="" width="90%">
            </div>
        </div>
@endsection