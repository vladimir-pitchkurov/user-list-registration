$(document).ready(function () {
    if ($('.registration-window').length > 0) {
        $('.registration-window').on('click', '.tab', function () {
            $('.registration-window').find('.active').removeClass('active');
            $(this).addClass('active');
            $('.tab-form').eq($(this).index()).addClass('active')
        });
    }

    if ($('#exampleModal').length > 0) {
        $('.avatar-list').click(function () {
            var imageSrc = this.src;
            $('#exampleModal').find('.modal-avatar-image').attr('src', imageSrc);
            $('#exampleModal').modal();
        });
    }
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
