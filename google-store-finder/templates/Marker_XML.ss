<?xml version="1.0"?>
<markers>

<% loop $locations %> <marker storename="{$StoreName}" name="{$Name}" productname="{$ProductName}" address="{$Address}" lat="{$Latitude}" lng="{$Longitude}" /><% end_loop %>

</markers>