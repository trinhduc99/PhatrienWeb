$(document).ready(function () {
    $('body').on('keydown', 'input, select', function (e) {
        if (e.which === 13) {
            var self = $(this), form = self.parents('form:eq(0)'), focusable, next;
            focusable = form.find('input').filter(':visible');
            next = focusable.eq(focusable.index(this) + 1);
            if (next.length) {
                next.focus();
            }
            return false;
        }
    });
    $("#form_dangtin").validate({
        ignore: 'input[type=hidden], input[type=search]',
        rules: {
            acc_title: {
                required: true,
                minlength: 20,
                maxlength: 120,
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            acc_price: {
                required: true,
                min: 100000,
            },
            acc_address: {
                required: true,
            },
            acc_area: {
                required: true,
                min: 5
            },
            'acc_item[]': {
                required: true,
            },
            acc_description: {
                required: function()
                {
                    CKEDITOR.instances.acc_description.updateElement();
                }
            },
        },
        messages: {
            acc_address: "Bạn chưa có dữ liệu về địa chỉ chính xác",
            acc_title: {
                required: "Bạn chưa nhập tiêu đề bài đăng",
                minlength: "Bài đăng có độ dài tối thiểu 20 ký tự",
                maxlength: "Bài đăng có độ dài tối đa 120 ký tự",
            },
            phone: {
                required: "Bạn chưa nhập số điện thoại",
                minlength: "Số điện thoại chỉ gồm 10 số",
                maxlength: "Số điện thoại chỉ gồm 10 số",
            },
            acc_price: {
                required: "Bạn chưa nhập giá tiền thuê phòng",
                min: "Giá tiền tối thiểu là 100,000"
            },
            acc_area: {
                required: 'Bạn chưa nhập diện tích ',
                min: "Diện tích tối thiểu là 5m2"
            },
            'acc_item[]': {
                required: "Bạn chưa chọn điều kiện nào ",
            },
            acc_description: {
                required: "Bạn chưa nhập nội dung cho bài viết"
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});
