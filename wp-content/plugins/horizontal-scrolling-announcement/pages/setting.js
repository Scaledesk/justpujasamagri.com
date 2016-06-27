// Plugin Name: Horizontal scrolling announcement
// Plugin URI: http://www.gopiplus.com/work/2010/07/18/horizontal-scrolling-announcement/
// Author: Gopi Ramasamy

function hsa_submit()
{
	if(document.form_hsa.hsa_text.value=="")
	{
		alert("Please enter the announcement text.")
		document.form_hsa.hsa_text.focus();
		return false;
	}
	else if(document.form_hsa.hsa_status.value=="")
	{
		alert("Please select the display status.")
		document.form_hsa.hsa_status.focus();
		return false;
	}
	else if(document.form_hsa.hsa_order.value=="")
	{
		alert("Please enter the display order, only number.")
		document.form_hsa.hsa_order.focus();
		return false;
	}
	else if(isNaN(document.form_hsa.hsa_order.value))
	{
		alert("Please enter the display order, only number.")
		document.form_hsa.hsa_order.focus();
		return false;
	}
	else if(document.form_hsa.hsa_group.value == "" || document.form_hsa.hsa_group.value == "Select")
	{
		alert("Please select the announcement group.")
		document.form_hsa.hsa_group.focus();
		return false;
	}
}

function hsa_delete(id)
{
	if(confirm("Do you want to delete this record?"))
	{
		document.frm_hsa_display.action="options-general.php?page=horizontal-scrolling-announcement&ac=del&did="+id;
		document.frm_hsa_display.submit();
	}
}	

function hsa_redirect()
{
	window.location = "options-general.php?page=horizontal-scrolling-announcement";
}

function hsa_help()
{
	window.open("http://www.gopiplus.com/work/2010/07/18/horizontal-scrolling-announcement/");
}