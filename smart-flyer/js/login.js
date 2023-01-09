$(document).ready(function($) {

    $(document).on('click','#check_authentication_call',function(e){
        e.preventDefault();
        ajax_callback(true,'');        
    });

    $(document).on('click','#profile-logout',function(e){
        e.preventDefault();
        ajax_callback('',true);        
    });

    function ajax_callback( login = '', logout = '' ) {
        var email = $('#crm_agent_login #username').val();
        var password = $('#crm_agent_login #password').val();

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            dataType: 'json',
            data: {
                action: 'check_login_callback',
                login: login,
                logout: logout,
                email: email,
                password: password,
            },
            beforeSend: function() {
                $('.crm_agent_login .submit-btns').addClass('authenticating');
                $("#request_sending").css("display", "block");
            },
            success: function(result) {
                if ( result.redirect == true ) {
                    window.location.href = result.redirectUrl;
                    $("#success_msg").css("display", "block");
                }else{
                    $('.crm_agent_login .error-massage').html(result);
                    $(".crm_agent_login .error-massage").show();
                    setTimeout(function() { $(".crm_agent_login .error-massage").hide(); }, 8000);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var status = textStatus ? textStatus[0].toUpperCase() + textStatus.slice(1) + ': ' : '';
                console.log(status + errorThrown);
            },
            complete: function() {
                // $('.crm_agent_login .submit-btns').removeClass('authenticating');
                $("#request_sending").css("display", "none");
            },
        });
    }
});
