<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html> <head>
<title><?php  print $this->title; ?></title>
<style type="text/css">
div#tabs
{
   margin-left: 0px;
   margin-bottom: 0px;
   padding: 0px;
   float: left;
   clear: right;
   width: 1080px;

}
.tab
{
   position: relative;
   background-color: #CCCCCC;
   padding-left: 5px;
   padding-bottom: 0px;
   margin-bottom: 0px;
   margin-left: 0px;
   border: 1px solid;
   border-top-left-radius: 5px;
border-top-right-radius: 5px;
   width: 20%;
   float: left;
}
.tabcontent
{
margin-left: 0px;
 padding-left: 10px;
 padding-right: 16px;
 padding-bottom: 10%;
 padding-top: 10px;
 margin-top: 0px;
 clear: left;
   float: left;

   border-left: 1px solid;
   border-right: 1px solid;
   border-bottom: 1px solid;
   border
	width: 100%;

}

.employeetab
{
	width: 80%;
}
div.tab:hover
{
  background-color: #CCCCFF;
}
table
{
    width: 90%;
}
th
{
   border: 1px solid;
   text-align: left;
}
</style>
<script type="text/javascript">
var currentTab = null;
var lastDisplay = null;
var maxZ = 1;
function init()
{
  setTabs();
 
}
function setTabs()
{
    var menuTabs = new Array();
    var allElems = new Array();
    allElems = document.getElementsByTagName("*");
    for(var i = 0; i <allElems.length;i++)
    {
	if(allElems[i].className == "tab")
	    menuTabs.push(allElems[i]);
    }
    currentTab = menuTabs[0];
    lastDisplay = document.getElementById("employeetab");
    currentTab.style.backgroundColor = "white";
    currentTab.style.borderBottom = "0px";
}
function showTab(arg,id)
      {
       
      var last = currentTab;
      currentTab = arg;
      last.style.backgroundColor = "#CCCCCC";
      last.style.borderBottom = "1px solid";
      currentTab.style.backgroundColor = "white";
      currentTab.style.borderBottom = "0px";

      var element = document.getElementById(id);
      lastDisplay.style.display = "none";
      lastDisplay = document.getElementById(id);
      element.style.display = "inline";
      }
</script>
</head>

<body onload="init()">
	<div id='header'>
	LLTIC Admin Page (<?php print $this->user; ?>) &nbsp;
	Preferences
	</div>
    <div id="tabs">
        <div class="tab" onclick="showTab(this,'employeetab')">Employees</div>
        <div class="tab" onclick="showTab(this,'inboxtab')">Inbox</div>
        <div class="tab" onclick="showTab(this,'filestab')">Files</div>
        <div class="tab" onclick="showTab(this,'historytab')">Client History</div>
	</div>
    <div class="tabcontent">
      <div id="employeetab">
		<?php include 'employees_tab_table.php';?>

      </div>
      <div id="historytab" style="display: none;">
	<table id="history">
	  <tr>
	    <th>Completed Client Case</th>
	    <th>Date</th>
	 </tr>
	 <tr>
	   <td>Rick Thatherton</td>
	   <td>01-23-13</td>
	 </tr>

	  </table>
      </div>
      </div>
   
      
</body> </html>
