<!-- Start of slider section
		============================================= -->
        <section id="slide" class="slider-section" style="max-width: 1250px; margin-left: 135px; margin-top: 50px;">
            <div id="slider-item" class="slider-item-details">
                @foreach($data['slider'] as $row)
                <div class="slider-area slider-bg-1 relative-position" style="background-image: url({{asset($row->image)}});">
                    <div class="slider-text">
                        <div class="section-title mb20 headline text-center">
                            <div class="layer-1-1">
                                @if($data['lang'] == 1)
                                <span class="subtitle text-uppercase">Welcome To Khumjung Secondary School</span>
                                @else
                                <span class="subtitle text-uppercase">खुम्जुङ माध्यमिक विद्यालयमा स्वागत छ</span>
                                @endif
                            </div>
                            <div class="layer-1-3">
                                @if($data['lang'] == 1)
                                <h2><span>Education</span> For A<br> Better <span>Tomorrow.</span></h2>
                                 @else
                                <h2><span>सुनौलो</span> भविष्यको<br> लागि <span>शिक्षा</span></h2>
                                @endif
                            </div>
                        </div>
                        <div class="layer-1-4">
                            <div id="course-btn">
                                <div class="genius-btn  text-center text-uppercase ul-li-block bold-font">
                                    @if($data['lang'] == 1)
                                    <a href="#">Read More <i class="fas fa-caret-right"></i></a>
                                     @else
                                    <a href="#">थप पढ्नुहोस्<i class="fas fa-caret-right"></i></a>
                                     @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <!-- End of slider section
            ============================================= -->