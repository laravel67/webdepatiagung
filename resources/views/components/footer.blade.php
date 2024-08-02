<style>
    /*FOOTER*/

    footer {
        background: #16222A;
        background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
        background: linear-gradient(59deg, #3A6073, #16222A);
        color: white;
        margin-top: 100px;
    }

    footer a {
        color: #fff;
        font-size: 14px;
        transition-duration: 0.2s;
    }

    footer a:hover {
        color: #FA944B;
        text-decoration: none;
    }

    .copy {
        font-size: 12px;
        padding: 10px;
        border-top: 1px solid #FFFFFF;
    }

    .footer-middle {
        padding-top: 2em;
        color: white;
    }


    /*SOCİAL İCONS*/

    /* footer social icons */

    ul.social-network {
        list-style: none;
        display: inline;
        margin-left: 0 !important;
        padding: 0;
    }

    ul.social-network li {
        display: inline;
        margin: 0 5px;
    }


    /* footer social icons */

    .social-network a.icoFacebook:hover {
        background-color: #3B5998;
    }

    .social-network a.icoIntagsram:hover {
        background-color: #ec1793;
    }

    .social-network a.icoTwitter:hover {
        background-color: #2b62fb;
    }

    .social-network a.icoYoutube:hover {
        background-color: #ce0000;
    }

    .social-network a.icoFacebook:hover i,
    .social-network a.icoLinkedin:hover i {
        color: #fff;
    }

    .social-network a.socialIcon:hover,
    .socialHoverClass {
        color: #44BCDD;
    }


    .social-circle li a {
        display: inline-block;
        position: relative;
        margin: 0 auto 0 auto;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        text-align: center;
        width: 30px;
        height: 30px;
        font-size: 15px;
    }

    .social-circle li i {
        margin: 0;
        line-height: 30px;
        text-align: center;
    }

    .social-circle li a:hover i,
    .triggeredHover {
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -ms--transform: rotate(360deg);
        transform: rotate(360deg);
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        -o-transition: all 0.2s;
        -ms-transition: all 0.2s;
        transition: all 0.2s;
    }

    .social-circle i {
        color: #595959;
        -webkit-transition: all 0.8s;
        -moz-transition: all 0.8s;
        -o-transition: all 0.8s;
        -ms-transition: all 0.8s;
        transition: all 0.8s;
    }

    .social-network a {
        background-color: #F9F9F9;
    }
</style>

<footer class="mainfooter" role="contentinfo">
    <div class="footer-middle">
        <div class="container-fluid">
            <div class="row mb-3 justify-content-evenly d-flex">
                <div class="col-md-3 col-sm-6 mb-2">
                    <div class="footer-pad">
                        <h4 class="mb-0">Lokasi</h4>
                        <div class="d-flex justify-content-center">
                            <iframe class="im-fluid"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.7180776012533!2d102.14206927590374!3d-2.2588481977212735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e07ef64cec017%3A0x299840a2f9393ae8!2sPonpes%20Salafiyah%20Depati%20Agung!5e0!3m2!1sid!2sid!4v1713380940592!5m2!1sid!2sid"
                                width="400" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-pad">
                        <h4 class="mb-0">Layanan</h4>
                        <ul class="list-unstyled">
                            <li><a href="#"></a></li>
                            <li><a href="{{ route('ppdb.home') }}">Info PPDB</a></li>
                            <li><a href="#">Jadwal Kegiatan</a></li>
                            <li><a href="#">Kurikulum</a></li>
                            <li><a href="{{ route('posts') }}">Berita</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4 class="mb-0">Hubungi Kami</h4>
                        <ul class="list-unstyled">
                            <li style="list-style: square;">
                                Ponpes Salafiyah Depati Agung beralamat di Pulau Raman, Muara Siau, Merangin Regency,
                                Jambi 37371, Indonesia.
                            </li>
                            <li style="list-style: square;">
                                Telepon: 0853-7850-7111
                            </li>
                            <li style="list-style: square;">
                                Email: ppsdepatiagung@gmail.com
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 class="mb-0">Ikuti Kami</h4>
                    <ul class="social-network social-circle">
                        <li><a href="https://web.facebook.com/pps.depatiagung.3" target="_blank" class="icoFacebook"
                                title="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/pps.depati.agung/" target="_blank" class="icoIntagsram"
                                title="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/@ppsdepatiagung3797" target="_blank" class="icoYoutube"
                                title="Youtube"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 copy">
                    <p class="text-center"> Hak Cipta &copy; PonpesDepatiAgung 2024.</p>
                </div>
            </div>
        </div>
    </div>
</footer>