jQuery(document).ready(function(){jQuery("#gmc-insert-recipe-button").click(function(){tinyMCE.activeEditor.execCommand("mceInsertContent",false,"[recipe "+jQuery("#gmc-insert-recipe-list").val()+"]");tinyMCEPopup.close();return false});jQuery('a[id^="gmc-print-options"]').click(function(){var a=this.id.substring(18);jQuery("#gmc-print-options-box-"+a).toggle();return false});jQuery('a[id^="gmc-print-full"]').click(function(){var a=this.id.substring(15);jQuery("#gmc-print-options-box-"+a).hide();var b=window.open();b.document.open();b.document.write("<!DOCTYPE html>"+"<html>"+"<head>"+"<link rel='stylesheet' id='recipe-template-css'  href='"+jQuery("#recipe-template-css").attr("href")+"' type='text/css' media='all' />"+'<style type="text/css">body { width:800px; margin: 0 auto; } .gmc-web-hidden {display:block} .gmc-print-hidden { display: none !important }</style>'+"</head>"+jQuery("#gmc-print-"+a).html()+"</html>");b.document.close();b.print();b.close();return false});jQuery('a[id^="gmc-print-main"]').click(function(){var a=this.id.substring(15);jQuery("#gmc-print-options-box-"+a).hide();var b=window.open();b.document.open();b.document.write("<!DOCTYPE html>"+"<html>"+"<head>"+"<link rel='stylesheet' id='recipe-template-css'  href='"+jQuery("#recipe-template-css").attr("href")+"' type='text/css' media='all' />"+'<style type="text/css">body { width:800px; margin: 0 auto; } .gmc-web-hidden {display:block} .gmc-print-hidden, .gmc-step-photo { display: none !important }</style>'+"</head>"+jQuery("#gmc-print-"+a).html()+"</html>");b.document.close();b.print();b.close();return false});jQuery('a[id^="gmc-print-text"]').click(function(){var a=this.id.substring(15);jQuery("#gmc-print-options-box-"+a).hide();var b=window.open();b.document.open();b.document.write("<!DOCTYPE html>"+"<html>"+"<head>"+"<link rel='stylesheet' id='recipe-template-css'  href='"+jQuery("#recipe-template-css").attr("href")+"' type='text/css' media='all' />"+'<style type="text/css">body { width:800px; margin: 0 auto; } .gmc-web-hidden {display:block} table.gmc-recipe-summary { float: left} .gmc-print-hidden, .gmc-recipe-main-photo, .gmc-step-photo { display: none !important }</style>'+"</head>"+jQuery("#gmc-print-"+a).html()+"</html>");b.document.close();b.print();b.close();return false})})