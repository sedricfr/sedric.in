function sendMail(params) {
  $TO_NAME = " Sedric ";
  var tempParams = {
    from_name: document.getElementById("fromname").value,
    from_email: document.getElementById("fromemail").value,
    to_name: $TO_NAME,
    subj: document.getElementById("msubject").value,
    message: document.getElementById("message").value,
  };

  $YOUR_SERVICE_ID = "service_kow7j4i";
  $YOUR_TEMPLATE_ID = "template_z6fz8sp";
  $YOUR_USER_ID = "user_F8henL4pU9rHXeoRUShwD";

  emailjs
    .send($YOUR_SERVICE_ID, $YOUR_TEMPLATE_ID, tempParams)

    .then(
      function (response) {
        console.log("SUCCESS!", response.status, response.text);
        fc();
      },
      function (error) {
        console.log("FAILED...", error);
        fe();
      }
    );
}

function fc() {
  alert(" Your response is  Successfully  Submitted !! ");
}

function fe() {
  alert(" Your response has not been submitted !! ");
}
