
function sendEmail() {
  const email = document.getElementById("emal-footer").value;
  console.log(email);

  emailjs
    .send("service_518sj2m", "contact_form", {
      user_email: email,
    })
    .then(
      function (response) {
        console.log("SUCCESS!", response.status, response.text);
      },
      function (error) {
        console.log("FAILED...", error);
      }
    );
}
