jQuery(function($){
    "use strict";
    $(document).ready(function(){
        if ($("body").hasClass('home')){
            $('.section_heading').addClass('home-heading');
        }
        if ($(".templaza-heading").length){
                $(".templaza-heading").append($('.templaza-single-meta').clone());
            $('.templaza-blog-item-content .templaza-single-meta').remove();
        }
        if ($('.has-content-area').length) {
            let colReg = /col-lg-(.+)/i,
                contentColumn = $('.has-content-area > .templaza-content-column'),
                colContent = colReg.exec($('.has-content-area > .templaza-content-column').attr('class')),
                content_column = parseInt(colContent[1]);
            $('.has-content-area').find('>.templaza-column').each(function (i, el) {
                if ($(el).html().trim() === '') {

                    let colNum = colReg.exec($(el).attr('class'));
                    if (colNum !== null) {
                        content_column    +=  parseInt(colNum[1]);
                        contentColumn.addClass('col-lg-'+content_column);
                    }
                    $(el).remove();
                }
            });
        }
        if ($('.templaza-single-content').length) {
            $('.templaza-single-content').find('iframe').each(
                function () {
                    var $thisIframe = $( this ),
                        width       = $thisIframe.attr( 'width' ),
                        height      = $thisIframe.attr( 'height' ),
                        newHeight   = $thisIframe.width() / width * height; // rendered width divided by aspect ratio

                    $thisIframe.css( 'height', newHeight );
                }
            );
        }
        $('.cause-donate-result').each(function(){
            var result = $(this).attr('data-donate');
            $(this).width(result+'%');
            if(result >0){
                $(this).addClass('active');
                $(this).find('span').addClass('active').css('left', result+'%');
            }
        })
        $('.cause-donate-form .choose-item .item-input').on("click", function(){
            $('.cause-donate-form .choose-item .item-input').removeClass('selected');
            $('input[name="amount_check"]').prop('checked', false);
            $(this).addClass('selected');
            $(this).find('.input_donate').prop('checked', true);
            $('.cause-donate-form .donate-form-text-input').val('');
        });
        $('.btn-donate').on('click',function(){
            var itemID = $(this).parents('form').attr('data-id');
            if($(this).parents('.cause-donate-form').find('.donate-form-text-input').length > 0) {
                var $ctDonate   = $(this).parents('.cause-donate-form').find('.donate-form-text-input').val();
            }else {
                var $ctDonate   = '';
            }
            if($(this).parents('.cause-donate-form').find("input[name='amount_check']").is(':checked') == true || $ctDonate != '') {
                if($ctDonate == '') {
                    $ctDonate   = $(this).parents('.cause-donate-form').find("input[name='amount_check']:checked").val();
                }
            }else {
                $(this).parents('.cause-donate-form').find('.donate-alert-choose').show().fadeout(3000);

            }
            var $email = $(this).parents('.cause-donate-form').find('.donate_email').val();
            if($ctDonate !=''){
                $.ajax({
                    url: evox_ajax_url.url,
                    type: 'POST',
                    data: ({
                        action: 'evox_donate_action',
                        itemID: itemID,
                        amount: $ctDonate,
                        email: $email,
                    }),
                    success: function (result) {
                        if (result) {
                            $('body').append(result);
                            document.forms["tz_paypal_form"].submit();
                        }
                    }
                });
            }
        })
        var $ctDonate = '';
        $('.cause-donate-form .choose-item .item-input').on("click", function(){
            $('.cause-donate-form .choose-item .item-input').removeClass('selected');
            $('input[name="amount_check"]').prop('checked', false);
            $(this).addClass('selected');
            $(this).find('.input_donate').prop('checked', true);
            $('.cause-donate-form .donate-form-text-input').val('');
        });

        $(".donate-form-text-input").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && (e.which!=46)) {
                //display error message
                $(".donate-number-error").show().fadeOut(1600);
                return false;
            }else {
                $(".donate-number-error").hide().fadeOut(1600);
            }
        });

        if($('.progress-bar').length){
            $('.progress-bar').loading();
        }
        /* Event Slider */
        if($('.wpem-single-event-slider').length){
            $('.wpem-single-event-slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        dots: true,
                        infinite: true,
                        speed: 500,
                        fade: true,
                        cssEase: 'linear',
                        adaptiveHeight: true
                    }
                }]
            });
        }


        /* Get iframe src attribute value i.e. YouTube video url
        and store it in a variable */
        var url = $("#wpem-youtube-modal-popup .wpem-modal-content iframe").attr('src');

        /* Assign empty url value to the iframe src attribute when
        modal hide, which stop the video playing */
        $(".wpem-modal-close").on('click', function(){
            $("#wpem-youtube-modal-popup .wpem-modal-content iframe").attr('src', '');
        });

        /* Assign the initially stored url back to the iframe src
        attribute when modal is displayed again */
        $("#event-youtube-button").on('click', function(){
            $("#wpem-youtube-modal-popup .wpem-modal-content iframe").attr('src', url);
        });
    });
});