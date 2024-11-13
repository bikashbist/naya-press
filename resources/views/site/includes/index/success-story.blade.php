<!-- Start of Search Courses
============================================= -->
<section id="search-course" class="search-course-section search-course-third">
    <div class="container">
        <div class="search-counter-up">
            <div class="version-four">
                <div class="row">
                    @if($data['success_story']->isEmpty())
                    <p>No success stories found.</p>
                   @else
                    @foreach ($data['success_story'] as $item)
                    <div class="col-md-3">
                        <div class="counter-icon-number">
                            <div class="counter-icon">
                                <i class="text-gradiant flaticon-graduation-hat"></i>
                            </div>
                            <div class="counter-number">
                                <span class="counter-count bold-font">{{ $item->students }} </span><span>M+</span>
                                <p>Students Enrolled</p>
                            </div>
                        </div>
                    </div>
                    <!-- /counter -->

                    <div class="col-md-3">
                        <div class="counter-icon-number">
                            <div class="counter-icon">
                                <i class="text-gradiant flaticon-book"></i>
                            </div>
                            <div class="counter-number">
                                <span class="counter-count bold-font">{{$item->online}}</span><span>+</span>
                                <p>Online Available Courses</p>
                            </div>
                        </div>
                    </div>
                    <!-- /counter -->

                    <div class="col-md-3">
                        <div class="counter-icon-number">
                            <div class="counter-icon">
                                <i class="text-gradiant flaticon-favorites-button"></i>
                            </div>
                            <div class="counter-number">
                                <span class="counter-count bold-font">{{$item->premimum}}</span><span>+</span>
                                <p>Premium Quality Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- /counter -->

                    <div class="col-md-3">
                        <div class="counter-icon-number">
                            <div class="counter-icon">
                                <i class="text-gradiant flaticon-group"></i>
                            </div>
                            <div class="counter-number">
                                <span class="counter-count bold-font">{{$item->teachers}}</span><span>+</span>
                                <p>Teachers Registered</p>
                            </div>
                        </div>
                    </div>
                    <!-- /counter -->
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Search Courses
============================================= -->
    