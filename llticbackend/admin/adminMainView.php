<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html> <head>
<title><?php  print $this->title; ?></title>
<link href="adminMainView.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="tabs.js"></script>

</head>

<body onload="init()">
	<div id="header">
		<div id="logo">
		LLTIC, Inc.
		</div>
		<div id="title">
		Admin Page 
		</div>
		<div id="righthead" style="float: right;">
		<?php print $this->user; ?>&nbsp;
		(logout | preferences)
		</div>
	</div>
    <div id="tabs">
        <div class="tab" onclick="showTab(this,'employeetab')">Employees</div>
        <div class="tab" onclick="showTab(this,'inboxtab')">Inbox</div>
        <div class="tab" onclick="showTab(this,'filestab')">Files</div>
        <div class="tab" onclick="showTab(this,'historytab')">Client History</div>

    <div class="tabcontent">
      <div id="employeetab">
		<?php include 'employees_tab_table.php';?>

      </div>
            <div id="inboxtab" style="display: none;">
	<table id="inbox">
	  <tr>
	    <th>From</th>
	    <th>Subject</th>
	    <th>Date</th>
	 </tr>
	 <tr>
	   <td>john@somecomp.co.uk</td>
	   <td>How's the project coming along?</td>
	   <td>01-23-13</td>
	 </tr>

	  </table>

      </div>
      <div id="filestab" style="display: none;">
	<table id="files">
	  <tr>
	    <th>Filename</th>
	    <th>Origin</th>
	    <th>Type</th>
	    <th>Date</th>
	 </tr>
	 <tr>
	   <td>letter</td>
	   <td>Rich Thatherton</td>
	   <td>doc</td>
	   <td>01-23-13</td>
	 </tr>
	 <tr>
	   <td>report</td>
	   <td>Sam O'Brian</td>
	   <td>pdf</td>
	   <td>01-20-13</td>
	 </tr>

	  </table>


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
      </div>
      
</body> </html>
