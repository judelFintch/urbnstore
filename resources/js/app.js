// Vendor JS
import "../vendor/jquery/jquery-3.2.1.min.js"; // Toujours le premier
import "../vendor/bootstrap/js/popper.js"; // Avant Bootstrap
import "../vendor/bootstrap/js/bootstrap.min.js"; // Bootstrap JS
import "../vendor/select2/select2.min.js"; // Select2 après jQuery
import "../vendor/daterangepicker/moment.min.js"; // Moment.js autonome
import "../vendor/daterangepicker/daterangepicker.js"; // Après Moment.js et jQuery
import "../vendor/slick/slick.min.js"; // Slick Slider
import "../vendor/animsition/js/animsition.min.js"; // Animsition
import "../vendor/parallax100/parallax100.js"; // Parallax100
import "../vendor/MagnificPopup/jquery.magnific-popup.min.js"; // MagnificPopup
import "../vendor/isotope/isotope.pkgd.min.js"; // Isotope autonome
import "../vendor/sweetalert/sweetalert.min.js"; // SweetAlert autonome
import "../vendor/perfect-scrollbar/perfect-scrollbar.min.js"; // Perfect Scrollbar autonome

// Custom JS
import "./main.js"; // Mettez `main.js` plus tôt si c'est un fichier central
import "./slick-custom.js"; // Après Slick
import "./gallerylb.js"; // Après MagnificPopup
import "./addwish.js"; // Après SweetAlert
import "./pscroll.js"; // Après Perfect Scrollbar
import "./personaliz.js"; // Autres scripts personnalisés
import "./cart.js"; // Doit être exécuté en dernier

document.addEventListener("DOMContentLoaded", function () {
    // Wishlist Initialization
    $(".js-addwish-b2").each(function () {
        var nameProduct = $(this).parent().parent().find(".js-name-b2").html();
        $(this).on("click", function () {
            swal(nameProduct, "is added to wishlist !", "success");
            $(this).addClass("js-addedwish-b2");
            $(this).off("click");
        });
    });

    // Cart Initialization
    $(".js-addcart-detail").each(function () {
        var nameProduct = $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .find(".js-name-detail")
            .html();
        $(this).on("click", function () {
            swal(nameProduct, "is added to cart !", "success");
        });
    });

    // Perfect Scrollbar Initialization
    $(".js-pscroll").each(function () {
        $(this).css("position", "relative");
        $(this).css("overflow", "hidden");
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on("resize", function () {
            ps.update();
        });
    });

    // Select2 Initialization
    $(".js-select2").each(function () {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next(".dropDownSelect2"),
        });
    });

    // Parallax100 Initialization
    $(".parallax100").parallax100();
});
