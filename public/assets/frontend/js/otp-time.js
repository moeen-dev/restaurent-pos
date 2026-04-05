document.addEventListener("DOMContentLoaded", function () {
    let timeLeft = 300; // 5 minutes = 300 seconds

    const timerEl = document.getElementById("otpTimer");
    const form = document.getElementById("otpForm");
    const input = document.getElementById("otpInput");
    const submitBtn = document.getElementById("submitBtn");

    const interval = setInterval(function () {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        timerEl.innerHTML = `OTP expires in: ${minutes}:${seconds}`;

        // warning color
        if (timeLeft <= 60) {
            timerEl.style.color = "orange";
        }

        timeLeft--;

        // expired
        if (timeLeft < 0) {
            clearInterval(interval);

            timerEl.innerHTML = "OTP expired ❌ Please request again";
            timerEl.classList.add("expired");

            input.disabled = true;
            submitBtn.disabled = true;
            submitBtn.classList.add("btn-disabled");
        }
    }, 1000);
});
