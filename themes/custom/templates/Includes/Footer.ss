<div class="footer-container">
    <footer class="CP yel">
        <div class="container">
            <div class="row" style="margin-top:20px;">
                <div class="col-md-3 col-sm-12" style="margin-top:20px;">
                    <a class="navbar-brand" href="$BaseHref/Home" style="max-width: 150px"><img src="$ThemeDir/images/circlelogo_harraways.png" class="w-10" style="width:100%;" alt=""></a>
                </div>
                <div class="col-md-2 col-sm-12 " style="margin-top:20px;">
                    <footerH2>CONTACT</footerH2>
                    <% if $SiteConfig.Address %>
                        <p> <footerText>$SiteConfig.Address</footerText></p>
                    <% end_if %>
                    <% if $SiteConfig.Phone %>
                        <p><footerText>$SiteConfig.Phone</footerText></p>
                    <% end_if %>
                    <% if $SiteConfig.Fax %>
                        <p><footerText> $SiteConfig.Fax</footerText></p>
                    <% end_if %>
                    <% if $SiteConfig.FreePhone %>
                        <p><footerText> $SiteConfig.FreePhone</footerText></p>
                    <% end_if %>
                    <% if $SiteConfig.Email %>
                        <p><footerText> $SiteConfig.Email</footerText></p>
                    <% end_if %>
                </div>
                <div class="col-md-2 col-sm-12" style="margin-top:20px;">
                    <footerH2>INFORMATION </footerH2>
                    <p><footerText>$SiteConfig.Information</footerText></p>
                </div>
                <div class="col-md-2 col-sm-12 site-map" style="margin-top:20px;">
                    <footerH2>SITE MAP</footerH2>
                    <% loop $Menu(1) %>
                        <p><footerText> <a href="$Link" class="cbl footer">$MenuTitle.XML</a></footerText></p>
                    <% end_loop %>
                </div>
                <div class="col-md-3 col-sm-12" style="margin-top:25px;margin-bottom:20px;">
                    <footerH2> JOIN US ONLINE
                        <a target="_blank" href="$SiteConfig.Facebook" ><img src="$ThemeDir/images/facebook-icon.png" style="height:30px;" class="img-fluid" alt=""></a>
                        <a style="margin-left:4px;" target="_blank" href="$SiteConfig.Instagram" ><img src="$ThemeDir/images/instagram-icon.png" style="height:30px;" class="img-fluid" alt=""></a>
                        <div class="col-md-12">
                            <footerH2>
                                <a style="margin-top:4px;"  href="$BaseHref/admin">  admin login</a>
                            </footerH2>
                        </div>
                    </footerH2>
                </div>
            </div>
        </div>
    </footer>
</div>

    