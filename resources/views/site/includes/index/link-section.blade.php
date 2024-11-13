<div class="about-section">
    <div class="st-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-7">
                    <!---------------------------- News slider ------------------------------->
                    <div class="news-slider-section">
                        <h2>समाचारहरु</h2>
                        @if(isset($data['link']))
                        @foreach($data['link'] as $row)
                        <div class="news-slider owl-carousel">
                            <div class="news-slider__item">
                                <h4 class="news-slider__item-title card-title">
                                    <a href="{{$row->url}}" target="_blank">{{ $row->name }}</a>
                                </h4>
                            </div>

                        </div>
                        @endforeach

                        @endif
                    </div>

                    <!---------------X------------- News slider ---------------X---------------->

                </div>
                <!-- <div class="col-xs-12 col-md-5">
                    <div class="with-pttrns-box">
                        <div class="fb-block">
                            <div id="fb-root"></div>
                            <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v8.0" nonce="abT39gs2"></script>
                            <div style="width:100%;" class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/Censusnepal-100119991821399/" data-tabs="timeline" data-width="500" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;container_width=463&amp;hide_cover=true&amp;href=https%3A%2F%2Fwww.facebook.com%2FCensusnepal-100119991821399%2F&amp;locale=en_US&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=timeline&amp;width=500"><span style="vertical-align: bottom; width: 463px; height: 500px;"><iframe name="f2e9cd2adab28d4" width="500px" height="1000px" data-testid="fb:page Facebook Social Plugin" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v8.0/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df1df69b1c295b38%26domain%3Dcensusnepal.cbs.gov.np%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fcensusnepal.cbs.gov.np%252Ff17ef2cfe908918%26relation%3Dparent.parent&amp;container_width=463&amp;hide_cover=true&amp;href=https%3A%2F%2Fwww.facebook.com%2FCensusnepal-100119991821399%2F&amp;locale=en_US&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=timeline&amp;width=500" style="border: none; visibility: visible; width: 463px; height: 500px;" class=""></iframe></span></div>


                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>