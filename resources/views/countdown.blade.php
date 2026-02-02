<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surprise ❤️</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Poppins, sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            color: white;
            text-align: center;
        }

        #countdown {
            font-size: 2.8rem;
            font-weight: 700;
            animation: pulse 1.2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .small {
            font-size: 1.2rem;
            opacity: 0.85;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div>
        <div id="countdown">⏳ Loading...</div>
        <div class="small">menuju ara's birthday 💖</div>
    </div>

    <script>
        // 🎯 TARGET FINAL: 03 FEBRUARI 2026 JAM 00:00
        // bulan: Januari = 0, Februari = 1
        const targetTime = new Date(2026, 1, 3, 0, 0, 0).getTime();
        const el = document.getElementById("countdown");

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetTime - now;

            if (distance <= 0) {
                el.innerHTML = "🎉 IT'S TIME ❤️";

                setTimeout(() => {
                    window.location.href = "/surprise";
                }, 1200);

                clearInterval(timer);
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            el.innerHTML = `
                ⏳ ${days} hari<br>
                ${hours} jam ${minutes} menit ${seconds} detik
            `;
        }

        const timer = setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>

</body>

</html>