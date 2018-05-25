tinymce.init({selector: 'textarea'});

$(document).ready(function () {
    $('#selectAllCheckboxes').click(function (event) {
        if (this.checked) {
            $('.checkboxes').each(function () {
                this.checked = true;
            });
        } else {
            $('.checkboxes').each(function () {
                this.checked = false;
            });
        }
    });
});