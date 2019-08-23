<div class="container">
        <div class="bgelp" ">
             <div class="row text-center justify-content-center py-7 cbl">
                <div class="col-4 ">
                     <div  class="center" style="max-width: 60px;">
                        <img style="margin-top:10px;width:100%;" src="$ThemeDir/images/leaf2.png" class="img-fluid" alt="">
                      </div>
                      <h1 class="text-uppercase">$ShortTitle</h1>
                </div>
              </div>
      </div>




<div class="container">
          <div class="row  cbl py-12 flex-lg-row ">

                    <div class="col-md-6" style="padding-right:20px; border-right: 1px solid #1F2C63;">

                           <% loop $LeftFaqSections %>

                                           <h1 style="text-align:center;">$Title</h1>
                                             <div class="row py-7 cbl">
                                              <div class="col-12 ">

                                                    $FirstContent

                                              </div>
                                            </div>
                                                               <!--check if video present -->
                                           <% if $FeaturedVideo %>

                                                 <div id="faqvideo" class="container">
                                                   <div class="row text-center justify-content-center py-12 cbl">
                                                    <div class="embed-responsive embed-responsive-16by9 my-5">
                                                      <iframe class="embed-responsive-item" src="$FeaturedVideo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>$FeaturedVideo.Raw</iframe>
                                                    </div>
                                                 </div>
                                            </div>

                                           <% else_if ContentImage %>

                                                  <div class="row text-center justify-content-center py-7 cbl">
                                                     <div class="col-12 ">
                                                         <a href="$ContentImageLink.Link"> <img id="" src="$ContentImage.URL" class="img-fluid" alt=""></a>

                                                      </div>
                                                 </div>
                                            <% end_if %>
                                            <div class="row  py-7 cbl">
                                              <div class="col-12 ">

                                                    $SecondContent

                                              </div>
                                            </div>
                                <% end_loop %>
                      </div>






                    <div class="col-md-6">
                             <% loop $RightFaqSections %>

                                           <h1 style="text-align:center;">$Title</h1>
                                             <div class="row py-7 cbl">
                                              <div class="col-12 ">

                                                    $FirstContent

                                              </div>
                                            </div>
                                                               <!--check if video present -->
                                           <% if $FeaturedVideo %>

                                                 <div id="faqvideo" class="container">
                                                   <div class="row text-center justify-content-center py-12 cbl">
                                                    <div class="embed-responsive embed-responsive-16by9 my-5">
                                                      <iframe class="embed-responsive-item" src="$FeaturedVideo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>$FeaturedVideo.Raw</iframe>
                                                    </div>
                                                 </div>
                                            </div>

                                           <% else_if ContentImage %>

                                                  <div class="row py-7 cbl">
                                                     <div class="col-12 ">
                                                         <a href="$ContentImageLink.Link"> <img id="" src="$ContentImage.URL" class="img-fluid" alt=""></a>


                                                  </div>
                                                 </div>
                                            <% end_if %>
                                            <div class="row py-7 cbl">
                                              <div class="col-12 ">

                                                    $SecondContent

                                              </div>
                                            </div>
                                <% end_loop %>
                      </div>


        </div>
</div>