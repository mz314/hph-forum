function loginDialog(e) {
    e.preventDefault();
     $('#loginModalContainer .error-msg').hide();
    $.ajax({
       url: url_root+"?controller=user",
       method: 'post', 
       success: function (data) {
          $('#loginContainer').html(data); 
          $('#loginModal').modal();
       }
    });
    
}

function logUser() {
 var login_data=$('form[name=loginForm]').serialize();
 $('#loginModalContainer .error-msg').hide();
    $.ajax({
    url: url_root+"?controller=user&action=login",
    method: 'post',
    data: login_data,
    success: function (data) {
        var data=$.parseJSON(data);
        if (data.code==200) {
            window.location.reload();
        } else {
            $('#loginModalContainer .error-msg').html(data.data);
            $('#loginModalContainer .error-msg').show();
        }
        
    }
 });
}

function validateRegister(e) {
 e.preventDefault();
 var reg_data=$('form[name=register]').serialize();
 $.ajax({
    url: url_root+"?controller=user&action=registerAjaxValid",
    data: reg_data,
    success: function (data) {
        console.log(data);
        var data=$.parseJSON(data);
        if (data.code==200) {
            $('form[name=register]').submit();
        }
    }
 });
}


$(function () {
   $('.login-button').click(loginDialog); 
  
});