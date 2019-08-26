<footer class="container-fliud">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 list-m">
                    <img src="{{asset('img/icons/pausa-logo-white.png')}}" alt="">
                    <p><strong>Copyright 2019 - All rights reserved</strong></p>
                    <p>powered by <strong><a href="https://www.mediaimpact.pe/" target="_blank">Media Impact</a></strong></p>
                </div>
                <div class="col-sm-4 liksf">
                    <!-- <h4>{!!trans('footer.foot2')!!}</h4> -->
                    <p><a href="{{asset($language . '/politica-viaje')}}">{!!trans('footer.foot3')!!}</a></p>
                    <p><a href="{{asset($language . '/terminos-condiciones')}}">{!!trans('footer.foot4')!!}</a></p>
                    <p><a href="{{asset($language . '/politica-privacidad')}}">{!!trans('footer.foot5')!!}</a></p>
                    <p><a href="{{asset($language . '/libro_reclamos')}}">{!!trans('footer.foot6')!!}</a></p>
                </div>
                <div class="col-sm-4 text-right">
                    <p class="follow-us">{!!trans('footer.foot1')!!}</p>
                    <div class="social-media">
                        <a href="https://www.facebook.com/pausa.travel/" target="_blank"><img src="{{asset('img/icons/facebook.png')}}" alt=""></a>
                        <a href="https://www.instagram.com/pausa.travel/" target="_blank"><img src="{{asset('img/icons/instagram.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
