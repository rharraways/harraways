<div class="">
	<div class="row">
		<div class="col-md-12">  
		    <img src="$ThemeDir/images/leaf.png" class="center  img-fluid" alt="">
			<!--<h1 style="text-align:center;">$Title</h1>-->
		</div>
		<div class="col-md-12 col-centered text-center">     
			$Content
		</div>
	</div>
	<div class="clear"></div>
	   <div class="conainer">  
			<div class="row">  
		        <div style="margin-bottom:25px;" class="col-md-6 col-centered text-center">
                    <div class="row">
                        <div  id="logins"  class="col-md-6 activetab float-md-right">
                            <h3> 
                                <a href="#" class="tablinks" onclick="openC(event, 'login')">
                                    <%t MemberProfiles.LOGINHEADER "Log in" %>
                                </a>
                            </h3> 
                        </div>

                        <div  id="slash">
                            <h3>/</h3> 
                        </div>

                                
                        <div id="registers" class="col-md-6 nonactivetab float-md-left">
                            <h3>
                                <a href="#" class="tablinks" onclick="openC(event, 'register')">Register</a>
                            </h3> 
                        </div>
			        </div>					  	 				  
					<div class="col-md-12">
				        <div id="login" class="tabcontent">
				            <!--<p>If you already have an account, you can login in below</p>-->
	                        $LoginForm
						</div>
						<div id="register" class="tabcontent">
							<!--<h2><%t MemberProfiles.REGISTER "Register" %></h2> -->
							$Form
						</div>
				    </div>
			    </div>
			</div>
            <div class="clear"></div>










<script>
document.getElementsByClassName('tablinks')[0].click()
function openC(evt, name) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(name).style.display = "block";
    evt.currentTarget.className += " active";

     if(name == "login")
    {
          $('#logins').addClass('activetab');
          $('#logins').removeClass('nonactivetab');
          $('#registers').removeClass('activetab');
          $('#registers').addClass('nonactivetab');
          var loginele = document.getElementById('logins');
          loginele.style.float = (loginele.style.float === 'left' ? 'right' : 'left');

          var registerele = document.getElementById('registers');
          registerele.style.float = (registerele.style.float === 'left' ? 'right' : 'left');
    }
    else if(name == "register")
    {
          $('#registers').addClass('activetab');
          $('#registers').removeClass('nonactivetab');
          $('#logins').removeClass('activetab');
          $('#logins').addClass('nonactivetab');

          var loginele = document.getElementById('logins');
          loginele.style.float = (loginele.style.float === 'left' ? 'right' : 'left');

          var registerele = document.getElementById('registers');
          registerele.style.float = (registerele.style.float === 'left' ? 'right' : 'left');
    }
}
</script>
		


