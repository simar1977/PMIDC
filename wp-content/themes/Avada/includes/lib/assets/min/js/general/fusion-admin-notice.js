!function(){jQuery(function(){jQuery(".notice.fusion-is-dismissible button.notice-dismiss").click(function(a){var b=jQuery(this),c=b.parent().data();a.preventDefault(),jQuery.post(ajaxurl,{data:c,action:"fusion_dismiss_admin_notice",nonce:fusionAdminNoticesNonce})})})}(jQuery);