@include('public.head')
    <!-- extra head options -->
    </head>
    <body>
        @include('public.header')

        <div class="about-story">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="story-img">
                            <img src="assets/img/bio/bio.png" alt="">
                            <div class="about-logo">
                                <h3>Khary</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="story-details pl-50">
                            <div class="story-details-top">
                                <h2>WELCOME TO <span>Kharygoart</span></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam debitis deleniti, ipsum consequatur culpa doloremque quia. Itaque possimus illo, blanditiis cum praesentium natus assumenda accusantium sequi beatae ad dignissimos repudiandae?. </p>
                            </div>
                            <div class="story-details-bottom">
                                <h4>Quick Blurb</h4>
                                <p>
                                    My custom cake toppers are all hand sculpted and hand painted just for you, 
                                    at the time you order. More than 12 years creating unique pieces for special events!
                                </p>
                            </div>
                            <div class="story-details-bottom">
                                <h4>Interests</h4>
                                <p>Painting, sculpture, design, drawing, clay, mixed art techniques. </p>
                            </div>
                            <div class="story-details-bottom">
                                <h4>Skills and Techniques</h4>
                                <p>Industrial Designer, Art & Design Director, Children's book Illustrator, graphical designer, sculpture, professional painter. </p>
                            </div>
                            <div class="story-details-bottom">
                                <h4>Location</h4>
                                <p>Mansfield, TX, United States. </p>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('public.footer')
        @include('public.modals')
        @include('public.foot')
        <!-- extra foot options -->
    </body>
</html>