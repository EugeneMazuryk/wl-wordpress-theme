(function ($) {

    /*** Theme localize vars ***/
    let ajax_url = wl_localize_vars['ajax_url'];
    let asset_url = wl_localize_vars['assets_url'];

    /**
     * Lazy Load Images Effect
     * @param {string | jQuery} selector - CSS selector or jQuery object for loading images
     */
    wl_lazyLoadImages();

    function wl_lazyLoadImages(selector = '.wl-lazy-load') {
        $(selector).each(function () {
            const $img = $(this);
            if ($img.data('src') && !$img.hasClass('loaded')) {
                const largeImage = new Image();
                largeImage.src = $img.data('src');

                $(largeImage).on('load', function () {
                    $img.attr('src', largeImage.src).addClass('loaded');
                });
            }
        });
    }

    /** Send forms */
    $(document).on('submit', 'form', function (e) {
        e.preventDefault();
        grecaptcha_response();
        let form = $(this);
        let form_data = new FormData(this);
        form_data.append('action', 'wl_form_send');
        let form_error = form.find('.form-error');
        let submit = form.find('[type=submit]');
        let submit_loader = submit.find('.loading-btn');
        let submit_text = submit.find('.text-btn');

        $.ajax({
            url: ajax_url,
            type: 'POST',
            contentType: false,
            processData: false,
            data: form_data,
            beforeSend: function () {
                submit.prop('disabled', true);
                form.css('filter', 'blur(1px)').css('pointer-events', 'none');
                submit_text.css('display', 'none');
                submit_loader.css('display', 'block');
                form_error.empty().css('display', 'none');
                $( 'input' ).removeClass( 'error' );
                $( '.error-message' ).remove();
            },
            complete: function () {
                submit.prop('disabled', false);
                form.css('filter', '').css('pointer-events', '');
                submit_loader.css('display', 'none');
                submit_text.css('display', 'block');
            },
            success: function (json) {
                if (json.success) {
                    // Send hidden form
                    if (json.data.url) {
                        let url = json.data.url;
                        send_hidden_form(url, {method: 'post'});
                    }
                } else {
                    $.each(json.data, function (inputName, errorMessage) {
                        let input = form.find('input[name="' + inputName + '"]'); // обмеження пошуку полів у межах форми
                        input.addClass('error');
                        if (!input.next('.error-message').length) {
                            input.after('<span class="error-message">' + errorMessage + '</span>');
                        }
                    });
                    form_error.html(json.data.message).show();
                }
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    });

    /*** Google ReCaptcha Response */
    grecaptcha_response();

    function grecaptcha_response() {
        if (typeof grecaptcha !== 'undefined') {
            grecaptcha.ready(function () {
                var recaptchaResponse = document.getElementById('g-recaptcha');
                var siteKey = recaptchaResponse.dataset.sitekey;
                grecaptcha.execute(siteKey, {action: 'submit'}).then(function (token) {
                    recaptchaResponse.value = token;
                });
            });
        }
    }

    /** Send hidden form */
    function send_hidden_form(path, params, method) {
        method = method || 'post';

        let form = document.createElement('form');
        form.setAttribute('method', method);
        form.setAttribute('action', path);

        for (let key in params) {
            if (params.hasOwnProperty(key)) {
                let hiddenField = document.createElement('input');
                hiddenField.setAttribute('type', 'hidden');
                hiddenField.setAttribute('name', key);
                hiddenField.setAttribute('value', params[key]);

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }

}(jQuery));
