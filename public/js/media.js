let options = jQuery('#options');
options.click(function () {
    if(this.checked){
        jQuery('.checkBoxs').each(function () {
            this.checked = true;
        })
    }else {
        jQuery('.checkBoxs').each(function () {
            this.checked = false;
        })
    }
});

