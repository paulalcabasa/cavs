function PreviewImage(file_element,img_element) {
	var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById(file_element).files[0]);
	oFReader.onload = function (oFREvent) {
		document.getElementById(img_element).src = oFREvent.target.result;
	};
};

function validateTextBox(textbox,msg){
	flag = 0;
	if(textbox.val() == ""){
		textbox.parent().children('span').remove();
		textbox.parent().append('<span class="help-block form-error-msg">'+msg+'</span>');
		flag =  1;
	}
	else {
		textbox.parent().children('span').remove();
		flag = 0;
	}
	return flag;
}

function validateSelect2(select2,msg){
	flag = 0;
	if(select2.val() == ""){
		select2.parent().children('p').remove();
		select2.parent().append('<p class="help-block form-error-msg">'+msg+'</p>');
		flag =  1;
	}
	else {
		select2.parent().children('p').remove();
		flag = 0;
	}
	return flag;
}

function key_numeric(selector){
	$(selector).keypress(function(e) {
	        var verified = (e.which == 8 || e.which == undefined || e.which == 0) ? null : String.fromCharCode(e.which).match(/[^0-9][.]/);
	        if (verified) {e.preventDefault();}
	});
}