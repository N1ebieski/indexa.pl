jQuery(document).on("click",".reload_captcha_base64",function(t){t.preventDefault();let e=$(this),a=e.closest("form");jQuery.ajax({url:e.attr("data-route")+"?captcha_id="+a.find('input[name="captcha_id"]').val(),method:"get",beforeSend:function(){},complete:function(){},success:function(t){a.find("img").attr("src",$($.parseHTML(t.img)).text())}})}),jQuery(document).on("click",".reload_captcha_img",function(t){t.preventDefault();let e=$(this).closest("form").find("img");e.attr("src",$($.parseHTML(e.attr("src").split("?")[0]+"?"+Math.random())).text())});