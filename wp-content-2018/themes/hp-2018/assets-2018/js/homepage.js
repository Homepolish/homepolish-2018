! function(e) {
    "use strict";
    e(document).ready(function() {
        e.fn.hpSlideshow = function(t) {
            function n() {
                setTimeout(o, p)
            }

            function o() {
                if (d.shouldShowNextSlide.call()) {
                    var e = i();
                    s(f), r(e), f = e, p = u(f)
                }
                setTimeout(o, p)
            }

            function i() {
                return f % l + 1
            }

            function a(e) {
                return c.find("[data-slideshow-index=" + e + "]")
            }

            function r(e) {
                d.fade ? a(e).fadeIn(d.fadeDuration) : a(e).show()
            }

            function s(e) {
                d.fade ? a(e).fadeOut(d.fadeDuration) : a(e).hide()
            }

            function u(e) {
                return a(e).data("slideDuration") || d.defaultSlideDuration
            }
            var d = e.extend({
                    defaultSlideDuration: 4e3,
                    fade: !1,
                    fadeDuration: 0,
                    shouldShowNextSlide: function() {}
                }, t),
                c = this,
                l = this.find("[data-slideshow-index]").length,
                f = 1,
                p = u(f);
            return n(), this
        }
    })
}(jQuery),
function() {
    "use strict";
    $(document).on("focusin, keypress", ".hp-form-field.hp-form-element-marked-invalid", function() {
        $(this).addClass("hp-form-field-error-addressed")
    })
}(),
function(e) {
    var t = 0,
        n = function() {
            return (new Date).getTime() + t++
        },
        o = function(e) {
            return "[" + e + "]$1"
        },
        i = function(e) {
            return "_" + e + "_$1"
        },
        a = function(t, n, o) {
            return t ? "function" == typeof t ? (n && console.warn("association-insertion-traversal is ignored, because association-insertion-node is given as a function."), t(o)) : "string" == typeof t ? n ? o[n](t) : "this" == t ? o : e(t) : void 0 : o.parent()
        };
    e(document).on("click", ".add_fields", function(t) {
        t.preventDefault();
        var r = e(this),
            s = r.data("association"),
            u = r.data("associations"),
            d = r.data("association-insertion-template"),
            c = r.data("association-insertion-method") || r.data("association-insertion-position") || "before",
            l = r.data("association-insertion-node"),
            f = r.data("association-insertion-traversal"),
            p = parseInt(r.data("count"), 10),
            m = new RegExp("\\[new_" + s + "\\](.*?\\s)", "g"),
            g = new RegExp("_new_" + s + "_(\\w*)", "g"),
            h = n(),
            v = d.replace(m, o(h)),
            y = [];
        for (v == d && (m = new RegExp("\\[new_" + u + "\\](.*?\\s)", "g"), g = new RegExp("_new_" + u + "_(\\w*)", "g"), v = d.replace(m, o(h))), v = v.replace(g, i(h)), y = [v], p = isNaN(p) ? 1 : Math.max(p, 1), p -= 1; p;) h = n(), v = d.replace(m, o(h)), v = v.replace(g, i(h)), y.push(v), p -= 1;
        var w = a(l, f, r);
        w && 0 != w.length || console.warn("Couldn't find the element to insert the template. Make sure your `data-association-insertion-*` on `link_to_add_association` is correct."), e.each(y, function(t, n) {
            var o = e(n);
            w.trigger("cocoon:before-insert", [o]);
            w[c](o);
            w.trigger("cocoon:after-insert", [o])
        })
    }), e(document).on("click", ".remove_fields.dynamic, .remove_fields.existing", function(t) {
        var n = e(this),
            o = n.data("wrapper-class") || "nested-fields",
            i = n.closest("." + o),
            a = i.parent();
        t.preventDefault(), a.trigger("cocoon:before-remove", [i]);
        var r = a.data("remove-timeout") || 0;
        setTimeout(function() {
            n.hasClass("dynamic") ? i.remove() : (n.prev("input[type=hidden]").val("1"), i.hide()), a.trigger("cocoon:after-remove", [i])
        }, r)
    }), e(document).on("ready page:load", function() {
        e(".remove_fields.existing.destroyed").each(function() {
            var t = e(this),
                n = t.data("wrapper-class") || "nested-fields";
            t.closest("." + n).hide()
        })
    })
}(jQuery),
function(e) {
    "use strict";
    e(document).ready(function() {
        e(".designer-hourly-rates").on("change", "input[type=radio]", function(t) {
            e(".designer-hourly-rates input[type=radio][value=true]").attr("checked", !1), e(".designer-hourly-rates input[type=radio][value=false]").attr("checked", !0), e(t.target).attr("checked", !0)
        })
    })
}(jQuery),
function(e) {
    "use strict";
    var t = function() {
            var t = "category__overlay--active",
                n = function(t) {
                    var n = e(t.target),
                        o = s(n, t.item.index);
                    a(o)
                },
                o = function(t) {
                    var n = e(t.target),
                        o = s(n, t.item.index);
                    i(n), a(o)
                },
                i = function(e) {
                    r(u(e)).addClass(t)
                },
                a = function(e) {
                    r(e).removeClass(t)
                },
                r = function(e) {
                    return e.find(".category__overlay")
                },
                s = function(t, n) {
                    return e(u(t)[n])
                },
                u = function(t) {
                    return e(t.find(".owl-item"))
                },
                d = {
                    center: !0,
                    loop: !0,
                    dots: !1,
                    items: 1,
                    responsive: {
                        0: {
                            margin: 15,
                            stagePadding: 30
                        },
                        400: {
                            margin: 20,
                            stagePadding: 50
                        }
                    },
                    onInitialized: n,
                    onDragged: o
                };
            e(".portfolio__categories--mobile [data-owl-carousel]").owlCarousel(d)
        },
        n = function() {
            var t = {
                center: !0,
                loop: !0,
                autoplay: !0,
                autoplayTimeout: 7e3,
                items: 1,
                dots: !0
            };
            e(".influencers__testimonials--mobile [data-owl-carousel]").owlCarousel(t)
        },
        o = function() {
            var t = e(".press__slides"),
                n = t.find("[data-owl-carousel]"),
                o = {
                    center: !0,
                    loop: !0,
                    autoplay: !0,
                    autoplayTimeout: 7e3,
                    mouseDrag: !1,
                    //items: 1,
                    dots: !0
                };
            n.owlCarousel(o), t.on("mouseenter", function() {
                n.trigger("stop.owl.autoplay")
            }), t.on("mouseleave", function() {
                n.trigger("play.owl.autoplay")
            })
        };
    t(), n(), o()
}(jQuery),
function(e) {
    "use strict";
    e(document).ready(function() {
        var t = e("[data-slideshow]"),
            n = !0;
        t.hpSlideshow({
            defaultSlideDuration: 4e3,
            fade: !0,
            fadeDuration: 700,
            shouldShowNextSlide: function() {
                return n
            }
        }), e("#user_email").on("focus", function() {
            return n = !1
        }), e("#user_email").on("blur", function() {
            return n = !0
        })
    })
}(jQuery);