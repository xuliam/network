$(function () {

    // init the validator
    // validator files are included in the download package
    // otherwise download from http://1000hz.github.io/bootstrap-validator

    $('#contact-form').validator();


    // when the form is submitted
    $('#contact-form').on('submit', function (e) {

        // if the validator does not prevent form submit
        if (!e.isDefaultPrevented()) {
            var url = "contact.php";

            // POST values in the background the the script URL
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function (data)
                {
                    // data = JSON object that contact.php returns

                    // we recieve the type of the message: success x danger and apply it to the 
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    // let's compose Bootstrap alert box HTML
                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    
                    // If we have messageAlert and messageText
                    if (messageAlert && messageText) {
                        // inject the alert to .messages div in our form
                        $('#contact-form').find('.messages').html(alertBox);
                        // empty the form
                        $('#contact-form')[0].reset();
                    }
                }
            });
            return false;
        }
    })
});
function myFunction() {
    alert("Your message has been sent!");
}

window.onload=function(){
    var oTxt1=document.getElementById('1');
    var oTxt2=document.getElementById('2');
    var oTxt3=document.getElementById('3');
    var oTxt4=document.getElementById('4');
    var oTxt5=document.getElementById('4');
    var oBtn=document.getElementById('btn1');

    oBtn.onclick=function(){
        alert("Hi "+ oTxt1.value+"! Thanks for purchasing our product using your Visa credit card no. "+oTxt2.value+". We will email your receipt on "+oTxt3.value+" and send the product to "+oTxt4.value);
    };

}