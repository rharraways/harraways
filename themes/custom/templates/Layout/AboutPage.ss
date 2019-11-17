<div class="container about-container">
    <div class="container banner-container">
        <div class="row cbl py-12 flex-lg-row ">
            <div class="col-md-12" style="margin-bottom:30px;" >
                <div id="textoverimage" class="container">
                    <a href="$AboutBannerPageImageLink.Link"> <img id=""  src="$AboutBannerPageImage.URL" class="img-fluid" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <% loop $AboutSections %>
        <div class="container">
            <div class="row  cbl py-4 flex-lg-row d-flex-column-reverse m-flex-column-non-reverse">
                <div class="col-md-12 text-center">
                    <div  class="center" style="max-width: 60px;">
                        <img style="margin-top:10px;width:100%;" src="$ThemeDir/images/leaf2.png" class="img-fluid" alt="">
                    </div>
                    <h1 class="fwb" style="margin-bottom:20px;">$title</h1>
                </div>
                <div class="col-md-12">
                    <italicText>$Content</italicText>
                </div>
                <div class="col-md-12">
                    <% if $ContentImage %>
                        <a href="$ContentImageLink.Link"> <img id=""  src="$ContentImage.URL" class="img-fluid" alt=""></a>
                    <% end_if %>
                </div>
            </div>
        </div>
    <% end_loop %>

    <% loop $AboutVideos %>
        <% if $FeaturedVideo %>
            <div class="container">
                <div class="row text-center justify-content-center py-4 cbl">
                    <div class="col-md-8">
                        <div  class="center" style="max-width: 60px;">
                            <img style="margin-top:10px;width:100%;" src="$ThemeDir/images/leaf2.png" class="img-fluid" alt="">
                        </div>
                        <h1 class="fwb">$FeaturedVideoTitle</h1>
                        <div class="embed-responsive embed-responsive-16by9 my-5">
                              <iframe class="embed-responsive-item" src="$FeaturedVideo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>$FeaturedVideo.Raw</iframe>
                        </div>
                        <h1 class="fwb mt-0 pt-0"> <a style="text-decoration: underline;" target="_blank" href="$BlogLink" class="cbl">$BlogText</a> </h1>
                    </div>
                </div>
            </div>
        <% end_if %>
    <% end_loop %>

    <!--<div class="container">
        <div class="row text-center justify-content-center py-7 cbl">
            <div class="col-8 " style="margin-top:20px;">
                <div class="col-md-12 py-2">
                    <input style="margin-bottom:10px;" type="button" class="btn bgbl text-uppercase fwb text-white w-100 fz18" onclick="location.href='$BaseHref/B2B';" value="B2B" />
                </div>
            </div>
        </div>
    </div>-->
</div>




