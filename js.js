

  (function () {
    emailjs.init("RHFX2JnH7ceWO_Rty"); // حط الـ Public Key
  })();

  document
    .getElementById("contact-form")
    .addEventListener("submit", function (e) {
      e.preventDefault();

      let statusMsg = document.getElementById("status");

    emailjs.sendForm("service_48exwif", "template_j12t0iw", this).then(
      () => {
        statusMsg.className = "status success"; // 🎉 إضافة كلاس success
        statusMsg.innerHTML = "✅ Your message has been sent successfully!";
        this.reset();
        setTimeout(() => {
          statusMsg.className = "status"; // يختفي بعد 4 ثواني
          statusMsg.innerHTML = "";
        }, 4000);
      },
      (error) => {
        statusMsg.className = "status error"; // ❌ إضافة كلاس error
        statusMsg.innerHTML = "❌ Failed to send: " + error.text;
        setTimeout(() => {
          statusMsg.className = "status";
          statusMsg.innerHTML = "";
        }, 5000);
      }
    );
    });
