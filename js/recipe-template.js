jQuery(document).ready(function(){function a(){if(jQuery("#recipe-template-css").length>0)return jQuery("#recipe-template-css").attr("href");else return jQuery(".gmcPrintCssPath:first").val()}jQuery('a[id^="gmc-print-options"]').click(function(){var a=this.id.substring(18);jQuery("#gmc-print-options-box-"+a).toggle();return false});jQuery('a[id^="gmc-print-full"]').click(function(){var b=this.id.substring(15);jQuery("#gmc-print-options-box-"+b).hide();var c=a();var d=window.open();d.document.open();d.document.write("<!DOCTYPE html>"+"<html>"+"<head>"+'<link rel="stylesheet" id="recipe-template-css" href="'+c+'" type="text/css" media="all" />'+'<style type="text/css">body { width:800px; margin: 0 auto; } .gmc-web-hidden {display:block} .gmc-print-hidden { display: none !important }</style>'+"</head>"+jQuery("#gmc-print-"+b).html()+"</html>");d.document.close();d.print();d.close();return false});jQuery('a[id^="gmc-print-main"]').click(function(){var b=this.id.substring(15);jQuery("#gmc-print-options-box-"+b).hide();var c=a();var d=window.open();d.document.open();d.document.write("<!DOCTYPE html>"+"<html>"+"<head>"+"<link rel='stylesheet' id='recipe-template-css'  href='"+c+"' type='text/css' media='all' />"+'<style type="text/css">body { width:800px; margin: 0 auto; } .gmc-web-hidden {display:block} .gmc-print-hidden, .gmc-step-photo { display: none !important }</style>'+"</head>"+jQuery("#gmc-print-"+b).html()+"</html>");d.document.close();d.print();d.close();return false});jQuery('a[id^="gmc-print-text"]').click(function(){var b=this.id.substring(15);jQuery("#gmc-print-options-box-"+b).hide();var c=a();var d=window.open();d.document.open();d.document.write("<!DOCTYPE html>"+"<html>"+"<head>"+"<link rel='stylesheet' id='recipe-template-css'  href='"+c+"' type='text/css' media='all' />"+'<style type="text/css">body { width:800px; margin: 0 auto; } .gmc-web-hidden {display:block} table.gmc-recipe-summary { float: left} .gmc-print-hidden, .gmc-recipe-main-photo, .gmc-step-photo { display: none !important }</style>'+"</head>"+jQuery("#gmc-print-"+b).html()+"</html>");d.document.close();d.print();d.close();return false})})