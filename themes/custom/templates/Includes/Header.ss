<div class="container">
    <header>
        <div style="margin-top:20px;" class="row cbl py-12 flex-lg-row ">

            <div class="col-md-3  col-5 order-md-1 order-1">
                <a class="navbar-brand" href="$BaseHref/Home" id="logo"><img src="$ThemeDir/images/logo3.png"  style="width:100%;" alt=""></a>
            </div>

            <div class="col-md-5 order-md-2 col-12 offset-md-4   order-3" style="">

                <form id="SearchForm_SearchForm"  method="get" action="/home/SearchForm?Search=" class="form-inline my-2 my-lg-0 justify-content-center">

                    <a  href="$BaseHref/storefinder" ><img src="$ThemeDir/images/storeloc.png" style="height:60px;" class="img-fluid" alt="">
                    </a>
                    <input id="SearchForm_SearchForm_"  name="Search" class="form-control mr-sm-2 cbl bout-bl fz14" type="search" placeholder="" value="" aria-label="Search">
                    <button id="SearchForm_SearchForm_action_results" name="action_results" class="btn bgbl text-white border-0 my-2 my-sm-0 text-uppercase fz14 py-2 px-3" type="submit">Search</button>
                </form>
            </div>


            <div class="col-md-12  col-5 order-md-3 order-2">
                <nav class=" navbar navbar-expand-xl navbar-light" style="margin-top:-5px;">
                    <div class="">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse text-center text-xl-left" id="navbarSupportedContent">
                            <% include Navigation %>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

</div>




