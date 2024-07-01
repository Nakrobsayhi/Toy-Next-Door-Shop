function previewImage(input) {
    var defaultImage = '/backend/product/resize/no_img.png';

    if (!input.files || !input.files[0]) {
        $('#previewImage').attr('src', defaultImage);
        return;
    }

    var reader = new FileReader();

    reader.onload = function(e) {
        $('#previewImage').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
}

function previewImage(input) {
    var defaultImage = 'backend/product/resize/no_img.png';

    if (!input.files || !input.files[0]) {
        $('#previewImage').attr('src', defaultImage);
        return;
    }

    var reader = new FileReader();

    reader.onload = function(e) {
        $('#previewImage').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
}


