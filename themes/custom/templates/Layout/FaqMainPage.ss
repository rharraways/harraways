 <div class="container">
             <div class="row text-center cbl py-12 flex-lg-row ">
                     <div class="col-md-12" style="margin-bottom:30px;" >
                                <div class="container">
                                       <a href="$FaqBannerPageImageLink.Link"> <img id=""  src="$FaqBannerPageImage.URL" class="img-fluid" alt=""></a>
                               </div>

                     </div>
             </div>

 </div>


 <div class="container" style="margin-bottom:20px";>

     <div class="row text-center cbl py-12 flex-lg-row " style="margin-top:20px;">
         <% loop $ListPageByType('FaqPage') %>

         <div class="col-md-3" style="margin-top:25px;">

             <a href="$LINK"> <img id=""  src="$PlaceHolderImage.URL" class="img-fluid" alt=""></a>

             <p><a href="$Link" class="cbl"> $ShortTitle </a></p>


         </div>

         <% end_loop %>
     </div>

 </div>


 <div class="container">
        <div class="row text-center justify-content-center py-7 cbl">
          <div class="col-8 " style="margin-top:20px;">

                 $Content
             <div class="col-md-12 py-2">
             <input style="margin-bottom:10px;" type="button" class="btn bgbl text-uppercase fwb text-white w-100 fz18" onclick="location.href='$BaseHref/contact-us';" value="SEND US AN EMAIL" />

            </div>


          </div>
        </div>
</div>