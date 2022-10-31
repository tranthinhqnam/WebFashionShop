function generate(n) {
    var add = 1,
        max = 12 - add; // 12 is the min safe number Math.random() can generate without it starting to pad the end with zeros.   

    if (n > max) {
        return generate(max) + generate(n - max);
    }

    max = Math.pow(10, n + add);
    var min = max / 10; // Math.pow(10, n) basically
    var number = Math.floor(Math.random() * (max - min + 1)) + min;

    return ("" + number).substring(add);
}

function valid(){
    const code = document.getElementById("code").value;
    const codeinSession = sessionStorage.getItem("coders")
    if (code == codeinSession){
        $.ajax({
            type : "POST",  //type of method
            url  : "../Models/reset_password.php",
            data : { valid : true},// passing the values
            success: function(res){ 
            console.log('Pass')
            
        }
        });
    }
    else{
        $.ajax({
            type : "POST",  //type of method
            url  : "../Models/reset_password.php",
            data : { valid : false},// passing the values
            success: function(res){ console.log('False') }
        });
}}

(function sendEmail() {
    const email = document.getElementById("email").value;
    console.log(email);
    const code = generate(6)

    emailjs
        .send("service_518sj2m", "RecoveryPassword", {
            user_email: email,
            code: code
        })
        .then(
            function(response) {
                console.log("SUCCESS!", response.status, response.text);
            },
            function(error) {
                console.log("FAILED...", error);
            }
        );
    const hashcode = code
    sessionStorage.setItem("coders", hashcode)
    sessionStorage.setItem("email", email)
})()