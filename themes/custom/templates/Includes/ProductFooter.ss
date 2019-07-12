<PageFooter>
<div class="row text-center cbl py-12 flex-lg-row " style="margin-top:20px;">
    <% loop $ListPageByType('ProductHomePage') %>
    <div class="col-md-12" style="margin-bottom:30px;" >
        <div class="container">
            <a> <img id="" style="width: 100%; height: 417.5px;" src="$ProductBannerPageImage.URL" class="img-fluid" alt=""></a>


        </div>


    </div>
    <% end_loop %>
</div>


<section>
    <div style="margin-bottom:20px;" class="container">
        <div class="row instagram-photos-title">

            <div class="row col-md-7 col-centered text-center">
                <div class="divider col-md-12 text-center">
                    <hr class="left"/>
                    <div  class="center" style="max-width: 60px;">
                        <img style="margin-top:10px;width:100%;" src="$ThemeDir/images/leaf2.png" class="img-fluid" alt="">
                    </div>

                    <hr class="right" />
                </div>


                <% if $SiteConfig.InstagramIframe %>
                <script src="//lightwidget.com/widgets/lightwidget.js"></script>
                <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/c71d7fd691c85c60aa1aa22898ba3527.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
                <% end_if %>

            </div>
        </div>

    </div>

</section>
</PageFooter>