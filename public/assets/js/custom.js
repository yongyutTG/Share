// Prevent closing from click inside dropdown
$(document).on("click", ".dropdown-menu", function (e) {
    e.stopPropagation();
});

// clickable on mobile view
if ($(window).width() < 992) {
    $(".has-submenu a").click(function (e) {
        e.preventDefault();
        $(this).next(".megasubmenu").toggle();

        $(".dropdown").on("hide.bs.dropdown", function () {
            $(this).find(".megasubmenu").hide();
        });
    });
}

$(document).on("click", "#signout", function () {
    Swal.fire({
        title: "ต้องการออกจากระบบใช่หรือไม่?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "ไม่ใช่",
        confirmButtonText: "ใช่",
    });
});
