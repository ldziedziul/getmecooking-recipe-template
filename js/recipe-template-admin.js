jQuery.extend({
  getIframeUrlVars: function(){
    var vars = [], hash;
    var myhref=jQuery("#TB_iframeContent").attr('src');
    if (myhref.indexOf("#")!=-1) {
      myhref2 = myhref.substr(0,myhref.indexOf('#'));
      myhref=myhref2;
    }
    var hashes = myhref.slice(myhref.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getIframeUrlVar: function(name){
    return jQuery.getIframeUrlVars()[name];
  }
});

function doSteps() {
  jQuery('textarea[id^="gmc-admin-new-step"]').live("focus", function(){
    var currentId = this.id.substring(19);
    var newId = parseFloat(jQuery('.gmc-singlestep').length) + 1;
    var cloned = jQuery('#gmc-steps-step-' + currentId).html();
    
    var stepTitle = new RegExp('>[0-9]+</span>', "i");    
    cloned = cloned.replace(stepTitle,'>' + newId + '</span>');
  
    cloned = cloned.replace('gmc-admin-new-step-'+ currentId, 'gmc-admin-new-step-'+ newId);
    cloned = '<div id="gmc-steps-step-'+ newId +'" class="gmc-singlestep postbox ">' + cloned + '</div>';
    
    jQuery(cloned).appendTo('#gmc-stepslist');
    
    jQuery('#gmc-steps-step-' + newId +' textarea.autoResize').autoResize({
      extraSpace: 20,
      minHeight: 32
    });
    
    jQuery('#gmc-admin-new-step-' + currentId).removeAttr('id');
  });
  
  /*jQuery("#gmc-stepslist").sortable({
    stop: function(event, ui) {
      var i=1;
      jQuery("#gmc-stepslist .gmc-stepnumber").each(function(index, value) {
        jQuery(value).html(i);
        i++;
      });
    }
  });*/
}

function doIngredients() {
  jQuery('input[id^="gmc-admin-new-ingredient"]').live("focus", function(){
    var currentId = this.id.substring(25);
    var newId = parseFloat(jQuery('.gmc-singleingredient').length) + 1;
    var cloned = jQuery('#gmc-ingredients-ingredient-' + currentId).html();
        
    var ingredientTitle = new RegExp('>[0-9]+</span>', "i");
    cloned = cloned.replace(ingredientTitle,'>' + newId + '</span>');
    
    //cloned = cloned.replace(ingredientTitle,'<span class="gmc-ingredientnumber">' + newId + '</span>'); //IE7/8 dont have the quotes
    cloned = cloned.replace('gmc-admin-new-ingredient-'+ currentId, 'gmc-admin-new-ingredient-'+ newId);    
    
    var ingredientOrder = new RegExp('id="gmc-recipeingredientorder-' + currentId + '" type="hidden" value="[0-9]+"', "i"); //IE7/8 dont have the quotes so re-ordering unsaved ingredients wont save the new order
    cloned = cloned.replace(ingredientOrder, 'id="gmc-recipeingredientorder-' + newId + '" type="hidden" value="' + newId + '"');    

    var uniqueString = new RegExp('unique-ingred', 'g');
    cloned = cloned.replace(uniqueString, 'unique-ingred1');
    
    cloned = '<tr id="gmc-ingredients-ingredient-'+ newId +'" class="gmc-singleingredient">' + cloned + '</tr>';

    //start of improved drop down
    // var ingredientDropDown = new RegExp('id="(.*)" class="chzn-select chzn-done"', "i");
    // var match = ingredientDropDown.exec(cloned);
    
    // var replace = match[1];
    // var re = new RegExp(replace, 'g');
    // cloned = cloned.replace(re, 'abc'); //TODO random string, not abc
    //end of improved drop down
    
    var styleCss = new RegExp('color.*;', "g");
    cloned = cloned.replace(styleCss, "");
    
    jQuery('#ingredientsTable tr:last').after(cloned);
    jQuery('#ingredientsTable tr:last').hide().fadeIn();
    
    jQuery('#gmc-admin-new-ingredient-' + currentId).attr('id', ''); //removeAttr gives IE7 bug
  });
  
  jQuery( ".sortable" ).bind( "sortupdate", function(event, ui) {
    jQuery('input[name="gmc-recipeingredientorder[]"]').each(function(index) {
      jQuery(this).val(index + 1);
    });
  });
}

function doLoadCorrectTab() {
  if (jQuery('#recipe-data')[0]) {
    jQuery('#recipe-data').tabs({
      select: function(event, ui) {
          jQuery("#gmc-selected-tab").val(ui.tab.hash.substring(1));
          return true;
      }
    }); 
  }
  
  var currentTab = getUrlEncodedKey('gmc-tab');
  
  jQuery("#recipe-data").tabs().tabs("select", currentTab);
  jQuery("#gmc-selected-tab").val(currentTab);
  
  var gmcAdd = getUrlEncodedKey('gmc-add');
  
  if (gmcAdd == 'step')
  {
    jQuery("#gmc-addstep").show();
    jQuery("#gmc-show-addstep").hide();
    jQuery("#gmc-stepslistbox").hide();
    jQuery('#gmc-step-added').hide().fadeIn(1500);
  }  
  else if (gmcAdd == 'ingredient')
  {
    jQuery("#gmc-addingredient").show();
    jQuery("#gmc-show-addingredient").hide();
    jQuery("#gmc-ingredientslistbox").hide();
    jQuery('#gmc-ingredient-added').hide().fadeIn(1500);
  }
}

function doFeaturedImage() {
  // place meta box before standard post edit field
  if (jQuery('#postdiv')[0] && jQuery('#gmc-addstep')[0]) {
    jQuery('#gmc-post-thumbnail').insertBefore('#postdiv');
  } else if (jQuery('#postdivrich')[0] && jQuery('#gmc-addstep')[0]) {
    jQuery('#gmc-post-thumbnail').insertBefore('#postdivrich');
  }
}

function doPublishHide() {
  if (jQuery("#gmc-recipe-main")[0]) { // only for Recipes
    jQuery("#submitdiv .hndle span").html(saveRecipeMessage);
    
    var publish=jQuery("#publish").val();
    
    if (publish=="Publish") {
      jQuery("#publish").val(saveRecipeMessage);
      
    } else if (publish=="Update") {
      jQuery("#publish").val(updateRecipeMessage);
      
    } else if (publish=="Submit for Review") {
      jQuery("#publish").val(submitRecipeForReviewMessage);
      
    } else if (publish=="Schedule") {
      jQuery("#publish").val(scheduleRecipeForPublishingMessage);
    }
  }
}

function getUrlEncodedKey(key, query) {
  if (!query)
      query = window.location.search;    
  var re = new RegExp("[?|&]" + key + "=(.*?)&");
  var matches = re.exec(query + "&");
  if (!matches || matches.length < 2)
      return "";
  return decodeURIComponent(matches[1].replace("+", " "));
}

function doResizeTextAreas() {
  jQuery('textarea.autoResize').autoResize({
    extraSpace: 20,
    minHeight: 32
  });
}

function doModifyRichTextEditor() {
  if (jQuery('#editor-toolbar').length == 0)
  {
    jQuery('#postdivrich').appendTo('#gmc-note-desc');
    
    if (jQuery('#gmc-note').length > 0)
    {
      jQuery('#wp-content-media-buttons').remove();
    }
  }
  else
  {
    //Old version of WordPress calls this instead
    jQuery('#editor-toolbar, #editorcontainer, #post-status-info').appendTo('#gmc-note-desc');
  }
}

function doChangeSaveMessages() {
  if(typeof postPublishedMessage !== 'undefined')
  {
    jQuery("#message:contains('Post published')").html(postPublishedMessage);
    jQuery("#message:contains('Post updated')").html(postUpdatedMessage);
  }
}

function doLoadInitialRegionDiv() {
  if (jQuery('#gmc-use-custom-region').val() == 'Y')
  {
    jQuery('#gmc-standard-region-area').hide();
  }
  else
  {
    jQuery('#gmc-custom-region-area').hide();
  }

  jQuery("#gmc-show-custom-region").click(function(){
    jQuery("#gmc-use-custom-region").val('Y');
    jQuery("#gmc-standard-region-area").hide();
    jQuery("#gmc-custom-region-area").show();
    return false;
  });
  
  jQuery("#gmc-show-standard-region").click(function(){
    jQuery("#gmc-use-custom-region").val('');
    jQuery("#gmc-custom-region-area").hide();
    jQuery("#gmc-standard-region-area").show();
    return false;
  });
}

function doLoadInitialMeasurementDiv() {
  jQuery('.gmc-use-custom-measurement').each(function() {
    var id = jQuery(this)[0].id.substring(27);
    if(jQuery(this).val() == 'Y')
    {      
      jQuery('#gmc-standard-measurement-area-' + id).hide();
    }
    else
    {
      jQuery('#gmc-custom-measurement-area-' + id).hide();
    }
  });
    
  jQuery(".gmc-show-custom-measurement").live("click", function(){
    var id = this.id.substring(28);
    jQuery("#gmc-use-custom-measurement-" + id).val('Y');
    jQuery("#gmc-standard-measurement-area-" + id).hide();
    jQuery("#gmc-custom-measurement-area-" + id).show();
    return false;
  });
  
  jQuery(".gmc-show-standard-measurement").live("click", function(){
    var id = this.id.substring(30);
    jQuery("#gmc-use-custom-measurement-" + id).val('');
    jQuery("#gmc-custom-measurement-area-" + id).hide();
    jQuery("#gmc-standard-measurement-area-" + id).show();
    return false;
  });
}

function doConfirmationPrompts() {
  jQuery(".gmc-delete-ingredient").click(function(){
    var id = this.id.substring(25);
    jQuery("#gmc-ingredient-to-delete").val(id);
    jConfirm(confirmDeleteIngredientMessage, confirmDeleteIngredientTitle, function (r) {
      if (r) {
        jQuery('#post').submit();
      }
    });
    return false;
  });
  
  jQuery(".gmc-delete-step").click(function(){
    var id = this.id.substring(19);
    jQuery("#gmc-step-to-delete").val(id);
    jConfirm(confirmDeleteStepMessage, confirmDeleteStepTitle, function (r) {
      if (r) {
        jQuery('#post').submit();
      }
    });
    return false;
  });
  
  jQuery("#gmc-reset-css").click(function(){
    jConfirm(confirmResetCssMessage, confirmResetCssTitle, function (r) {
      if (r) {
        jQuery("#gmc_resetcss").val('Y');
        jQuery('#save-settings').click();
      }
    });
    return false;
  });
}

jQuery(function () {
  doFeaturedImage();
  doModifyRichTextEditor();
  doResizeTextAreas();
  doChangeSaveMessages();
  doLoadInitialRegionDiv();
  doLoadInitialMeasurementDiv();
  doConfirmationPrompts();
  doLoadCorrectTab();
  doSteps();
  doIngredients();
  doPublishHide();
  doLoadInitialSourceDiv();
  doPopulateTextInputHints();
  doGuide();
  
  if(jQuery("#gmc-shortcodecss").length)
  {
    var csseditor = CodeMirror.fromTextArea(document.getElementById("gmc-shortcodecss"), { mode: "css", lineNumbers: true });
  }
  
  jQuery("input.colors").miniColors({
    change: function(hex, rgb) {
    }
  });
  
  jQuery(".chzn-select").chosen();
  
  jQuery(".sortable").sortable({
      items: "tr:not(.ui-state-disabled)"
    });	
  
  jQuery('#publish').click(function() {
    jQuery(this).hide();
  });
  
  jQuery('.gmc-tooltip').tooltip({tipClass: 'gmc-tooltip-text'});
  
  jQuery('#gmc-insert-recipe-button').click(function() {
    tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[gmc_recipe '+jQuery('#gmc-insert-recipe-list').val()+']');
    tinyMCEPopup.close();
  
    return false;
  });
});

function doLoadInitialSourceDiv() {  
  showSourceDiv();
  
  jQuery("#gmc-source-type").change(function(e) { 
    showSourceDiv();
  });
}

function showSourceDiv() {
  jQuery('#gmc-source-author, #gmc-source-author-url, #gmc-source-book, #gmc-source-book-url, #gmc-source-mag, #gmc-source-mag-url, #gmc-source-website, #gmc-source-website-url').hide();
  
  if (jQuery('#gmc-source-type').val() == 'Author')
  {
    jQuery('#gmc-source-author, #gmc-source-author-url').show();
  }
  else if (jQuery('#gmc-source-type').val() == 'Book')
  {
    jQuery('#gmc-source-book, #gmc-source-book-url').show();
  }
  else if (jQuery('#gmc-source-type').val() == 'Magazine')
  {
    jQuery('#gmc-source-mag, #gmc-source-mag-url').show();
  }
  else if (jQuery('#gmc-source-type').val() == 'Website')
  {
    jQuery('#gmc-source-website, #gmc-source-website-url').show();
  }
}

function doPopulateTextInputHints() {
  var hintColour = '#666';  
  
  jQuery('.gmc-ingredient-name-hint').each(function() {
    if(jQuery(this).val() == '')
      jQuery(this).val(ingredientName).css('color', hintColour);
  });
  
  jQuery('.gmc-ingredient-name-hint').live("focus", function(){
    if (jQuery(this).val() == ingredientName)
      jQuery(this).val('').removeAttr('style');
  });

  jQuery('.gmc-ingredient-name-hint').live("blur", function(){
    if(jQuery(this).val() == '')
      jQuery(this).val(ingredientName).css('color', hintColour);
  });
  
  jQuery('.gmc-ingredient-note-hint').each(function() {
    if(jQuery(this).val() == '')
      jQuery(this).val(ingredientNote).css('color', hintColour);
  });
  
  jQuery('.gmc-ingredient-note-hint').live("focus", function(){
    if (jQuery(this).val() == ingredientNote)
      jQuery(this).val('').removeAttr('style');
  });

  jQuery('.gmc-ingredient-note-hint').live("blur", function(){
    if(jQuery(this).val() == '')
      jQuery(this).val(ingredientNote).css('color', hintColour);
  });
  
  jQuery('.gmc-ingredient-quantity-hint').each(function() {
    if(jQuery(this).val() == '')
      jQuery(this).val(ingredientQuantity).css('color', hintColour);
  });
  
  jQuery('.gmc-ingredient-quantity-hint').live("focus", function(){
    if (jQuery(this).val() == ingredientQuantity)
      jQuery(this).val('').removeAttr('style');
  });

  jQuery('.gmc-ingredient-quantity-hint').live("blur", function(){
    if(jQuery(this).val() == '')
      jQuery(this).val(ingredientQuantity).css('color', hintColour);
  });
  
  if(jQuery('#gmc-description').val() == '')
      jQuery('#gmc-description').val(recipeDescription).css('color', hintColour);
    
  jQuery('#gmc-description').live("focus", function(){
    if (jQuery(this).val() == recipeDescription)
      jQuery(this).val('').removeAttr('style');
  });

  jQuery('#gmc-description').live("blur", function(){
    if(jQuery(this).val() == '')
      jQuery(this).val(recipeDescription).css('color', hintColour);
  });
}

function doGuide() {
  guiders.createGuider({
      buttons: [{name: "Close"},
                {name: "Next", onclick: function() { window.location.href="/wp-admin/edit.php?post_type=gmc_recipe#guider=second"; } }],
      closeOnEscape: true,
      description: "You can run this tour at any time, from the GetMeCooking Settings menu on the left.",
      highlight: '#toplevel_page_getmecooking_options',
      id: "first",
      next: "second",
      overlay: true,
      title: "Thanks for installing the plugin!",
      width: 500,
      xButton: true
    });
    
  guiders.createGuider({
      //attachTo: "#menu-posts-gmc_recipe",
      buttons: [{name: "Next"}],
      closeOnEscape: true,
      description: "This is where you add, edit and delete recipes.",
      highlight: '#menu-posts-gmc_recipe',
      id: "second",
      next: "third",
      overlay: true,
      //position: 4,
      title: "Recipe management",
      xButton: true
    });
    
  guiders.createGuider({
      //attachTo: ".type-gmc_recipe",
      buttons: [{name: "Next", onclick: function() { window.location.href=jQuery('.type-gmc_recipe .row-title').attr('href') + '#guider=fourth'; } }],
      closeOnEscape: true,
      description: "Let's edit an existing recipe.",
      highlight: '.wp-list-table',
      id: "third",
      next: "fourth",
      overlay: true,
      //position: 4,
      title: "Edit a recipe",
      xButton: true
    });
    
    guiders.createGuider({
      //attachTo: "#menu-posts-gmc_recipe",
      buttons: [{name: "Next", onclick: function() { window.location.href="/wp-admin/post-new.php#guider=fifth"; } }],
      closeOnEscape: true,
      description: "Enter as much information as you want. The design will cater for anything you leave blank.<br/><br/>You can edit recipes at any time and the changes will be reflected throughout your blog.",
      //highlight: '#menu-posts-gmc_recipe',
      id: "fourth",
      next: "fifth",
      overlay: true,
      //position: 4,
      title: "Edit a recipe",
      width: 550,
      xButton: true
    });
    
    guiders.createGuider({
    //TODO use onShow: to then call highlight as tinymce hasnt finished loading
      //attachTo: "#content_toolbar1",
      buttons: [{name: "Next", onclick: function() { 
        var recipeId = jQuery('#gmc-insert-recipe-list').val();
        tinyMCE.activeEditor.setContent('[gmc_recipe ' + recipeId + ']');
        //jQuery('#content_gmcrecipe').click();        
        guiders.next();
      } }],
      closeOnEscape: true,
      description: "Now you have a recipe, you can add it to a blog post (or page).<br/><br/>Add a recipe by pressing the orange GetMeCooking icon in the toolbar.",
      //highlight: '#content_toolbargroup',
      id: "fifth",
      next: "sixth",
      overlay: true,
      //position: 4,
      title: "Add a recipe to a post",
      width: 500,
      xButton: true
    });
    
    /*guiders.createGuider({
      //attachTo: "#content_toolbar1",
      buttons: [{name: "Next"}],
      closeOnEscape: true,
      description: "Choose your recipe from the drop down list and press insert",
      //highlight: '#content_toolbar1',
      id: "sixth",
      next: "seventh",
      overlay: true,
      //position: 4,
      title: "Add a recipe to a post",
      xButton: true
    });*/
        
    guiders.createGuider({
      buttons: [{name: "Next"}],
      closeOnEscape: true,
      description: "You can now see [gmc_recipe] within your post.<br/><br/>This is where the recipe will be shown.<br/>The recipe can be moved anywhere within a blog post.",
      id: "sixth",
      next: "seventh",
      overlay: true,
      title: "Recipe added to a post",
      
      xButton: true
    });
    
    guiders.createGuider({
      buttons: [{name: "Close"}],
      closeOnEscape: true,
      description: 'Press the preview button to see how the recipe will look within your posts.<br/><br/>You can change the look and feel of the plugin from within the GetMeCooking Settings menu at any time.<br/><br/>If you need more features then please have a look at our <a href="http://www.getmecooking.com/wordpress-recipe-plugin">premium recipe plugin</a>. It has all the features of this plugin, plus more features for pro bloggers.<br/><br/>Thank you for completing the tour. Remember, you can run through this tour again at any time by selecting it in the GetMeCooking settings menu.',
      highlight: '#minor-publishing-actions',
      id: "seventh",
      overlay: true,
      title: "End of tour",
      width: 650,
      xButton: true
    });
}

function gmcRemoveStepThumbnail(step_id, nonce){
  jQuery.post(ajaxurl, {
    action:"set-post-thumbnail", post_id: step_id, thumbnail_id: -1, _ajax_nonce: nonce, cookie: encodeURIComponent(document.cookie) }, function(str){
    if ( str == '0' ) {
      alert( setPostThumbnailL10n.error );
    } else {
      jQuery('#gmc-upload-thumbnail-' + step_id).fadeOut().html();
      jQuery('#remove-step-thumbnail-' + step_id).fadeOut().html();
    }
  }
  );
}
