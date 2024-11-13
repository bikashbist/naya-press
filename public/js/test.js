Wolmart.initPopup = function (e, i) { 
    
        Wolmart.$body.on("click", ".btn-iframe", (function (e) { e.preventDefault(), Wolmart.popup({ items: { src: '<video src="' + t(e.currentTarget).attr("href") + '" autoplay loop controls>', type: "inline" }, mainClass: "mfp-video-popup" }, "video") })), Wolmart.$body.on("click", ".sign-in", (function (e) { e.preventDefault(), Wolmart.popup({ items: { src: t(e.currentTarget).attr("href") } }, "login") })).on("click", ".register", (function (e) { e.preventDefault(), Wolmart.popup({ items: { src: t(e.currentTarget).attr("href") }, callbacks: { ajaxContentAdded: function () { this.wrap.find('[href="#sign-up"]').click() } } }, "login") })) }, Wolmart.initNotificationAlert = function () { Wolmart.$body.hasClass("has-notification") && setTimeout((function () { Wolmart.$body.addClass("show-notification") }), 5e3) }, Wolmart.countTo = function (e) {
    t.fn.countTo && Wolmart.$(e).each((function () {
        Wolmart.appear(this, (function () {
            var e = t(this);
            //setTimeout((function () { e.countTo({ onComplete: function () { e.addClass("complete") } }) }), 30000)
        }))
    }))
}