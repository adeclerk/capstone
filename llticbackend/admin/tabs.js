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
    
    currentTab.style.backgroundColor = "white";
    currentTab.style.borderBottom = "0px";

    lastDisplay = document.getElementById("employeetab");
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