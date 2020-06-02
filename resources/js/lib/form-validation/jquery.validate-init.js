
var form_validation = function() {
    var e = function() {
            jQuery(".form-valide").validate({
                ignore: [],
                errorClass: "invalid-feedback animated fadeInDown",
                errorElement: "div",
                errorPlacement: function(e, a) {
                    jQuery(a).parents(".form-group > div").append(e)
                },
                highlight: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
                },
                success: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
                },
                rules: {
                    "val-username": {
                        required: !0,
                        minlength: 3
                    },
                    "val-password": {
                        required: !0,
                        minlength: 5
                    },
                    "val-confirm-password": {
                        required: !0,
                        equalTo: "#val-password"
                    },
                    "val-fullname": {
                        required: !0
                    },
                    "val-permission": {
                        required: !0
                    },
                    "val-phone": {
                        required: !0,
                    },
                    "val-name-parking-area": {
                        required: !0,
                    }
                    ,
                    "val-config-ticket": {
                        required: !0,
                    }
                    ,
                    "val-config-bill": {
                        required: !0,
                    }
                    ,
                    "val-name-company": {
                        required: !0,
                    }
                    ,
                    "val-address-company": {
                        required: !0,
                    }
                    ,
                    "val-phone-company": {
                        required: !0,
                    }
                    ,
                    "val-email-company": {
                        required: !0,
                    }
                },
                messages: {
                    "val-username": {
                        required: "Không bỏ trống tên đăng nhập",
                        minlength: "Your username must consist of at least 3 characters"
                    },
                    "val-password": {
                        required: "Không bỏ trống mật khẩu",
                        minlength: "Mật khẩu dài hơn 5 ký tự"
                    },
                    "val-confirm-password": {
                        required: "Nhập lại mật khẩu",
                        minlength: "Mật khẩu dài hơn 5 ký tự",
                        equalTo: "Không trùng khớp"
                    },
                    "val-fullname": "Không bỏ trống tên người dùng",
                    "val-permission": "Chọn quyền người dùng",
                    "val-phone": "Không bỏ trống",
                    "val-name-parking-area": "Không bỏ trống tên bãi",
                    "val-config-ticket": "Không bỏ trống",
                    "val-config-bill": "Không bỏ trống",
                    "val-name-company": "Không bỏ trống",
                    "val-address-company": "Không bỏ trống",
                    "val-phone-company": "Không bỏ trống",
                    "val-email-company": "Không bỏ trống"
                }
            })
        }
    return {
        init: function() {
            e(), a(), jQuery(".js-select2").on("change", function() {
                jQuery(this).valid()
            })
        }
    }
}();
jQuery(function() {
    form_validation.init()
});