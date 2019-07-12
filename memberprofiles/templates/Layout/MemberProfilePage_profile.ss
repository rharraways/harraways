<section class="CNT fz14">
    <div class="container">
        <div class="row text-center justify-content-center py-4 cbl">
            <div class="col-12 ">      
                <img src="$ThemeDir/images/leaf.png" class="center  img-fluid" alt="">
                 <h1 class="fwb">$Title</h1>
                 $Content
             </div>
             <% if $DownloadingFiles.Count %>
                  <% loop $DownloadingFiles %>
                       
                                
                                  <div   class="col-md-12">
                                       <h3>    <a class="downloadlink" href="$Link" download="$Image.URL">$title</a> </h3>
                                                         
                                  </div>
                                 
                            
                          
                     <% end_loop %>  

              <% else %>

                      <div   class="col-md-12">
                           <h3>    No File to download </h3>
                      
                             
                      </div>
                <% end_if %>     
            </div>
</section>

<section class="FRM">
    <div class="conainer">  
           <div class="row">  

                              
                         <div style="margin-bottom:25px;" class="col-md-6 col-centered text-center bgelg">
                            <a href="/Security/logout" class="btn text-uppercase fz14 py-2 px-3" type="submit">Log out</a>
                     
                             $Form
                            
                          </div>
            </div>
    
    </div>
</section>
