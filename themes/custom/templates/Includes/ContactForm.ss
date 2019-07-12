
<form $FormAttributes>



<% if Message %>
      <p id="{$FormName}_error" class="message $MessageType">$Message</p>
   <% else %>
      <p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
   <% end_if %>



<fieldset>
       
      
          <div class="col-md-12" style="margin-top:20px;">
           

             <div class="row">
                  <div class="col-md-6 py-2">
                    $Fields.dataFieldByName(Name) 
                  </div>

                  <div class="col-md-6 py-2">
                    $Fields.dataFieldByName(Email)  
                  </div>
              </div>


             

               <div class="row">
                  <div class="col-md-6 py-2">
                     $Fields.dataFieldByName(Phone) 
                  </div>

                  <div class="col-md-6 py-2">
                     $Fields.dataFieldByName(WhereDidYouFindUs) 
                  </div>
              </div>

              <div class="row">
                    <div class="col-md-12 py-2">
                       $Fields.dataFieldByName(Message) 
                    </div>
                  </div>
                  
                  
             
           
          </div>
   
      
    </fieldset>
 

    <% if Actions %>

      <div class="Actions">
         <% control Actions %>$Field<% end_control %>
      </div>
   <% end_if %>
</form>
</form>