// custom scripts
(function ($, window, document) {
  $(function () {
    const $document = $(document);
    $document.on("click", "a.has-submenu", function (e) {
      e.preventDefault();
      console.log("menu-item has submenu");
      const link = $(e.currentTarget);
      $(link.data("target")).toggleClass("active");
      console.log(link.data("target"));
    });
  });
})(window.jQuery, window, window.document);
