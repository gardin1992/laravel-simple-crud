// jQuery plugins
(function ($) {
    function setMask(el, mask) {
        $(el).mask(mask);
    }

    $.fn.phoneMask = function () {
        setMask(this, "(99)9999-99999");
        return this;
    };

    $.fn.cpfMask = function () {
        setMask(this, "999.999.999-99");
        return this;
    };

    $.debounce = function (callback, ms = 3000) {
        if (!!$._timeout) {
            clearTimeout($._timeout);
        }

        $._timeout = setTimeout(function () {
            callback();
            $._timeout = null;
        }, ms);
    };

    /**
     * Formatos aceitos
     * (11)9999-9999
     * (11)9999-99999
     */
    $.validator.addMethod(
        "phoneBR",
        function (phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return (
                this.optional(element) ||
                (phone_number.length > 9 &&
                    phone_number.match(
                        /^\([0-9]{2}\)(([0-9]{4}-[0-9]{4})|([0-9]{4}-[0-9]{5}))$/
                    ))
            );
        },
        "Por favor, forne&ccedil;a um n&uacute;mero de telefone v&aacute;lido."
    );

    // jQuery Modal
    var $modal = $(".modal");

    $modal.find(".modal-close").on("click", function () {
        $.modal.close();
    });

    $.fn.modalShow = function () {
        $(this).addClass("show");
    };

    $.fn.modalClose = function () {
        if ($(this).hasClass("show")) $(this).removeClass("show");
    };

    $.debounce(function () {
        $(".alert").remove();
    }, 3000);

    $(".footer .container").html(
        new Date().getFullYear() + " - Github @<a style='color: var(--main-color_3); text-decoration: underline;' href='https://github.com/gardin1992' target='_blank'>João Gardin</a>"
    );

    $.findName = function(name) {
        var search = window.location.search;
        search = search.replace('?', '');

        var pieces = search.split('&');
        
        if (search.includes('name')) {
            for(var i = 0; i < pieces.length; i++) {
                if (pieces[i].includes('name')) {
                    pieces[i] = 'name='+name;
                }
            }

            return '?' + pieces.join('&');
        }
        
        return '?' + search + '&name=' + name;
    };

    $.paginator = function(page) {
        var search = window.location.search;
        search = search.replace('?', '');

        var pieces = search.split('&');

        if (search.includes('page')) {
            for(var i = 0; i < pieces.length; i++) {
                if (pieces[i].includes('page')) {
                    pieces[i] = 'page='+page;
                }
            }

            return '?' + pieces.join('&');
        }

        return '?' + search + '&page=' + page;
    };

    $.getCurrentPage = function() {
        var search = window.location.search;
        search = search.replace('?', '');

        var pieces = search.split('&');

        for(var i = 0; i < pieces.length; i++) {
            if (pieces[i].includes('page')) {
                return parseInt(pieces[i].replace(/\D/g, ''));
            }
        }

        return 1;
    };

    $.onlyNumbers = function (str) {
        return $.trim(str).replace(/\-|\_|\*/g, '');
    }
})(jQuery);
