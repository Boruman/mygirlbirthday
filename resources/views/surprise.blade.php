<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Someone Special ❤️</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>let count = 0;

        const texts = [
            'kok kamu gitu sihh 😒',
            'fakerrrrr 🥲',
            'jangan bohong 🥺',
            'ih jahat 😭',
            'masa engga ❤️',
            'plisss sayanggg',
            'ayo jawab iya 😤',
            'capek ya? tombolnya muter terus 😜'
        ];

        function answerNo() {
            const textEl = document.getElementById('question-text');
            const noBtn = event.target;

            if (textEl) {
                textEl.innerText = texts[count % texts.length];
                count++;
            }

            // pastikan animasi muter aktif & looping
            noBtn.classList.add('spin-loop');
        }

    </script>

    <style>
        body {
            margin: 0;
            overflow: hidden;
            font-family: 'Inter', sans-serif;
            height: 100vh;
            touch-action: manipulation;
            background: linear-gradient(135deg, #f9a8d4, #f3e8ff);
        }

        #app {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #content {
            position: relative;
            z-index: 10;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
        }

        .step {
            position: absolute;
            width: 100%;
            max-width: 800px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.509);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: none;
        }

        .step.active {
            opacity: 1;
            transform: translateY(0);
            pointer-events: all;
        }

        .btn {
            background: linear-gradient(135deg, #ec4899, #f43f5e);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(236, 72, 153, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .text-gradient {
            background: linear-gradient(135deg, #ec4899, #f43f5e, #f59e0b);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .heart-beat {
            animation: heartbeat 1.5s ease-in-out infinite;
        }

        @keyframes heartbeat {
            0% {
                transform: scale(1);
            }

            25% {
                transform: scale(1.1);
            }

            50% {
                transform: scale(1);
            }

            75% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .emoji {
            font-size: 3rem;
            margin-bottom: 20px;
            display: inline-block;
        }

        .reason-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .reason-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        #progress-container {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 400px;
            height: 6px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
            z-index: 100;
        }

        #progress-bar {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #ec4899, #f43f5e);
            border-radius: 3px;
            transition: width 0.5s ease;
        }

        #canvas-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
    </style>
</head>

<body>
    <audio id="bgMusic" preload="auto" loop>
        <source src="/music/birthday.mp3" type="audio/mpeg">
    </audio>

    <div id="app">
        <div id="canvas-container"></div>

        <div id="progress-container">
            <div id="progress-bar"></div>
        </div>

        <div id="content">
            <!-- Step 1: Initial Reveal -->
            <div class="step active" id="step1">
                <div class="emoji heart-beat">❤️</div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gradient">Hey Beautiful</h1>
                <p class="text-xl text-gray-700 mb-8">I made something special for you...</p>
                <button class="btn" id="start-btn">Let's Begin</button>
            </div>

            <!-- Step 2: Birthday Message -->
            <div class="step" id="step2">
                <div class="emoji">🎉</div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gradient">Happy Birthday, Amara!</h2>
                <p class="text-lg text-gray-700 mb-6">
                    on your special day, i want you to know how amazing you are. your smile brightens my world, your
                    laughter is my favorite melody, and your presence makes every moment magical.
                </p>
                <button class="btn" id="next-btn-2">What makes you special?</button>
            </div>

            <!-- Step 3: Reasons You're Amazing -->
            <div class="step" id="step3">
                <h2 class="text-3xl md:text-4xl font-bold mb-8 text-gradient">here's why you're incredible</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <div class="reason-card">
                        <div class="emoji text-3xl">✨</div>
                        <h3 class="text-xl font-bold mb-2 text-pink-600">Your Kindness</h3>
                        <p class="text-gray-700">the way you care about others is truly inspiring. you have the biggest
                            heart.</p>
                    </div>
                    <div class="reason-card">
                        <div class="emoji text-3xl">😊</div>
                        <h3 class="text-xl font-bold mb-2 text-pink-600">Your Smile</h3>
                        <p class="text-gray-700">it lights up every room you enter and stays in my mind all day.</p>
                    </div>
                    <div class="reason-card">
                        <div class="emoji text-3xl">🌟</div>
                        <h3 class="text-xl font-bold mb-2 text-pink-600">Your Spirit</h3>
                        <p class="text-gray-700">your passion and energy are contagious. you make life exciting!</p>
                    </div>
                </div>
                <button class="btn" id="next-btn-3">A Little Surprise</button>
            </div>

            <!-- Step 4: Memory Lane -->
            <div class="step" id="step4">
                <div class="emoji">📸</div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gradient">
                    Remember When...
                </h2>

                <div class="flex justify-center">
                    <div class="relative w-full max-w-sm rounded-2xl overflow-hidden shadow-2xl mb-6">
                        <img id="memory-img" src="photo/1.jpg"
                            class="w-full h-72 object-cover transition-all duration-1000 ease-in-out" />
                    </div>

                </div>

                <p class="text-lg text-gray-700 italic mb-6">
                    little moments that mean everything 🤍
                </p>

                <p class="text-lg text-gray-700 mb-6">
                    Every moment with you becomes a cherished memory.
                    Even the simple ones feel special when it's with you.
                </p>

                <button class="btn" id="next-btn-4">One Last Thing</button>
            </div>


            <!-- Step 5: Question -->
            <div class="step" id="step5">
                <div class="emoji heart-beat">😁</div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gradient"> kamu sayang aku enggakk? </h2>
                <p id="question-text" class="text-lg text-gray-700 mb-6"></p>

                <div class="flex gap-4 justify-center">
                    <button class="btn" id="next-btn-5" onclick="answerYes()">IYAAAAA ❤️</button>
                    <button class="btn bg-gray-300 text-gray-800" onclick="answerNo()">enggak 😒</button>
                </div>
            </div>

            <!-- Step 6: Thank You -->
            <div class="step" id="step6">
                <div class="emoji heart-beat">❤️</div>
                <h2 class="text-4xl md:text-4xl font-bold mb-6 text-gradient">
                    yaayyy, maaciii sayangggg 💖
                </h2>
                <p class="text-lg text-gray-700 mb-8">
                    kamu cantikkk bangetttt dehhh hari inii.
                    super duper mega bintang parah mampus cantikk🥰
                </p>
                <button class="btn" id="next-btn-6">my wish for you</button>
            </div>

            <!-- Step 7: Final Wish -->
            <div class="step" id="step7">
                <div class="emoji">🎂</div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gradient">My Birthday Wish For You</h2>
                <p class="text-lg text-gray-700 mb-8">
                    May your year be filled with joy, laughter, and dreams come true. May you always know how special
                    you are to me and to everyone lucky enough to know you.
                </p>
                <p class="text-xl font-semibold text-pink-600 mb-8">
                    Happy Birthday, my girl gueh! ❤️
                </p>
                <button class="btn" id="confetti-btn">Celebrate!</button>
                <p class="mt-8 text-gray-500">Made with ❤️ just for you</p>
            </div>
        </div>
    </div>




    <script>
        // Three.js Heart Background
        const container = document.getElementById('canvas-container');
        const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        container.appendChild(renderer.domElement);

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 30;

        // Improved Heart Geometry
        const x = 0, y = 0;
        const heartShape = new THREE.Shape();
        heartShape.moveTo(x + 0.5, y + 0.5);
        heartShape.bezierCurveTo(x + 0.5, y + 0.5, x + 1, y, x, y);
        heartShape.bezierCurveTo(x - 1, y, x - 1, y + 1.5, x - 1, y + 1.5);
        heartShape.bezierCurveTo(x - 1, y + 2.5, x + 0.5, y + 3.5, x + 0.5, y + 3.5);
        heartShape.bezierCurveTo(x + 0.5, y + 3.5, x + 2, y + 2.5, x + 2, y + 1.5);
        heartShape.bezierCurveTo(x + 2, y + 1.5, x + 2, y, x + 1, y);
        heartShape.bezierCurveTo(x + 0.5, y, x + 0.5, y + 0.5, x + 0.5, y + 0.5);

        const extrudeSettings = {
            depth: 0.5,
            bevelEnabled: true,
            bevelSegments: 3,
            bevelSize: 0.2,
            bevelThickness: 0.3
        };

        const heartGeometry = new THREE.ExtrudeGeometry(heartShape, extrudeSettings);

        // Create multiple hearts with different colors and properties
        const hearts = [];
        const colors = [
            0xff6b6b, 0xff8e8e, 0xffb3b3, 0xffd8d8,
            0xff9e9e, 0xffc1c1, 0xff6b8e, 0xff8eb3
        ];

        for (let i = 0; i < 25; i++) {
            const material = new THREE.MeshPhongMaterial({
                color: colors[Math.floor(Math.random() * colors.length)],
                emissive: 0xff0000,
                emissiveIntensity: 0.1,
                shininess: 100,
                transparent: true,
                opacity: 0.9
            });

            const heart = new THREE.Mesh(heartGeometry, material);

            // Random position and scale
            heart.position.x = (Math.random() - 0.5) * 50;
            heart.position.y = (Math.random() - 0.5) * 50;
            heart.position.z = (Math.random() - 0.5) * 50;

            const scale = Math.random() * 0.8 + 0.5;
            heart.scale.set(scale, scale, scale);

            // Random rotation
            heart.rotation.x = Math.random() * Math.PI;
            heart.rotation.y = Math.random() * Math.PI;

            // Store animation properties
            heart.userData = {
                speedX: Math.random() * 0.02 - 0.01,
                speedY: Math.random() * 0.02 - 0.01,
                speedZ: Math.random() * 0.02 - 0.01,
                rotationSpeedX: Math.random() * 0.01,
                rotationSpeedY: Math.random() * 0.01,
                originalX: heart.position.x,
                originalY: heart.position.y,
                originalZ: heart.position.z,
                floatDistance: 2 + Math.random() * 3
            };

            scene.add(heart);
            hearts.push(heart);
        }

        // Add lights
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
        directionalLight.position.set(1, 1, 1);
        scene.add(directionalLight);

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);

            // Animate hearts
            hearts.forEach(heart => {
                // Floating animation
                const time = Date.now() * 0.001;
                heart.position.x = heart.userData.originalX + Math.sin(time * heart.userData.speedX * 10) * heart.userData.floatDistance;
                heart.position.y = heart.userData.originalY + Math.sin(time * heart.userData.speedY * 10) * heart.userData.floatDistance;
                heart.position.z = heart.userData.originalZ + Math.sin(time * heart.userData.speedZ * 10) * heart.userData.floatDistance;

                // Rotation
                heart.rotation.x += heart.userData.rotationSpeedX;
                heart.rotation.y += heart.userData.rotationSpeedY;
            });

            renderer.render(scene, camera);
        }

        animate();

        // Handle window resize
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });

        // Step Navigation
        let currentStep = 1;
        const totalSteps = 7;

        function updateProgressBar() {
            const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
            document.getElementById('progress-bar').style.width = `${progress}%`;
        }

        function showStep(stepNumber) {
            // Hide all steps
            document.querySelectorAll('.step').forEach(step => {
                step.classList.remove('active');
            });

            // Show current step
            document.getElementById(`step${stepNumber}`).classList.add('active');

            // Update progress bar
            updateProgressBar();

            // Special effect for last step
            if (stepNumber === totalSteps) {
                document.getElementById('confetti-btn').classList.add('animate-pulse');
            }
        }

        // Button event listeners
        document.getElementById('start-btn').addEventListener('click', () => {
            playMusicOnce(10);
            currentStep = 2;
            showStep(currentStep);
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 },
                colors: ['#ff0000', '#ff69b4', '#ff1493', '#ffc0cb']
            });

            // Heart-shaped confetti
            setTimeout(() => {
                confetti({
                    particleCount: 30,
                    spread: 60,
                    origin: { y: 0.5 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 300);

            // More hearts from different directions
            setTimeout(() => {
                confetti({
                    particleCount: 20,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });

                confetti({
                    particleCount: 20,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 600);

            // Make hearts float up from the background
            hearts.forEach(heart => {
                gsap.to(heart.position, {
                    y: heart.position.y - 30,
                    duration: 3,
                    ease: "power1.out"
                });

                gsap.to(heart.material, {
                    opacity: 0,
                    duration: 3,
                    ease: "power1.out"
                });
            });
        });


        document.getElementById('next-btn-2').addEventListener('click', () => {
            currentStep = 3;
            showStep(currentStep);
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 },
                colors: ['#ff0000', '#ff69b4', '#ff1493', '#ffc0cb']
            });

            // Heart-shaped confetti
            setTimeout(() => {
                confetti({
                    particleCount: 30,
                    spread: 60,
                    origin: { y: 0.5 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 300);

            // More hearts from different directions
            setTimeout(() => {
                confetti({
                    particleCount: 20,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });

                confetti({
                    particleCount: 20,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 600);

            // Make hearts float up from the background
            hearts.forEach(heart => {
                gsap.to(heart.position, {
                    y: heart.position.y - 30,
                    duration: 3,
                    ease: "power1.out"
                });

                gsap.to(heart.material, {
                    opacity: 0,
                    duration: 3,
                    ease: "power1.out"
                });
            });
        });


        document.getElementById('next-btn-3').addEventListener('click', () => {
            currentStep = 4;
            showStep(currentStep);
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 },
                colors: ['#ff0000', '#ff69b4', '#ff1493', '#ffc0cb']
            });

            // Heart-shaped confetti
            setTimeout(() => {
                confetti({
                    particleCount: 30,
                    spread: 60,
                    origin: { y: 0.5 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 300);

            // More hearts from different directions
            setTimeout(() => {
                confetti({
                    particleCount: 20,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });

                confetti({
                    particleCount: 20,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 600);

            // Make hearts float up from the background
            hearts.forEach(heart => {
                gsap.to(heart.position, {
                    y: heart.position.y - 30,
                    duration: 3,
                    ease: "power1.out"
                });

                gsap.to(heart.material, {
                    opacity: 0,
                    duration: 3,
                    ease: "power1.out"
                });
            });
        });


        document.getElementById('next-btn-4').addEventListener('click', () => {
            currentStep = 5;
            showStep(currentStep);
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 },
                colors: ['#ff0000', '#ff69b4', '#ff1493', '#ffc0cb']
            });

            // Heart-shaped confetti
            setTimeout(() => {
                confetti({
                    particleCount: 30,
                    spread: 60,
                    origin: { y: 0.5 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 300);

            // More hearts from different directions
            setTimeout(() => {
                confetti({
                    particleCount: 20,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });

                confetti({
                    particleCount: 20,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 600);

            // Make hearts float up from the background
            hearts.forEach(heart => {
                gsap.to(heart.position, {
                    y: heart.position.y - 30,
                    duration: 3,
                    ease: "power1.out"
                });

                gsap.to(heart.material, {
                    opacity: 0,
                    duration: 3,
                    ease: "power1.out"
                });
            });
        });


        document.getElementById('next-btn-5').addEventListener('click', () => {
            currentStep = 6;
            showStep(currentStep);
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 },
                colors: ['#ff0000', '#ff69b4', '#ff1493', '#ffc0cb']
            });

            // Heart-shaped confetti
            setTimeout(() => {
                confetti({
                    particleCount: 30,
                    spread: 60,
                    origin: { y: 0.5 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 300);

            // More hearts from different directions
            setTimeout(() => {
                confetti({
                    particleCount: 20,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });

                confetti({
                    particleCount: 20,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 600);

            // Make hearts float up from the background
            hearts.forEach(heart => {
                gsap.to(heart.position, {
                    y: heart.position.y - 30,
                    duration: 3,
                    ease: "power1.out"
                });

                gsap.to(heart.material, {
                    opacity: 0,
                    duration: 3,
                    ease: "power1.out"
                });
            });
        });


        document.getElementById('next-btn-6').addEventListener('click', () => {
            currentStep = 7;
            showStep(currentStep);
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 },
                colors: ['#ff0000', '#ff69b4', '#ff1493', '#ffc0cb']
            });

            // Heart-shaped confetti
            setTimeout(() => {
                confetti({
                    particleCount: 30,
                    spread: 60,
                    origin: { y: 0.5 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 300);

            // More hearts from different directions
            setTimeout(() => {
                confetti({
                    particleCount: 20,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });

                confetti({
                    particleCount: 20,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 600);

            // Make hearts float up from the background
            hearts.forEach(heart => {
                gsap.to(heart.position, {
                    y: heart.position.y - 30,
                    duration: 3,
                    ease: "power1.out"
                });

                gsap.to(heart.material, {
                    opacity: 0,
                    duration: 3,
                    ease: "power1.out"
                });
            });
        });

        // Confetti button
        document.getElementById('confetti-btn').addEventListener('click', () => {
            // Standard confetti
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 },
                colors: ['#ff0000', '#ff69b4', '#ff1493', '#ffc0cb']
            });

            // Heart-shaped confetti
            setTimeout(() => {
                confetti({
                    particleCount: 30,
                    spread: 60,
                    origin: { y: 0.5 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 300);

            // More hearts from different directions
            setTimeout(() => {
                confetti({
                    particleCount: 20,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });

                confetti({
                    particleCount: 20,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    shapes: ['heart'],
                    colors: ['#ff0000', '#ff69b4']
                });
            }, 600);

            // Make hearts float up from the background
            hearts.forEach(heart => {
                gsap.to(heart.position, {
                    y: heart.position.y - 30,
                    duration: 3,
                    ease: "power1.out"
                });

                gsap.to(heart.material, {
                    opacity: 0,
                    duration: 3,
                    ease: "power1.out"
                });
            });
        });

        // Initialize progress bar
        updateProgressBar();

    </script>

    <script>
        const bgMusic = document.getElementById('bgMusic');
        let musicStarted = false;

        function playMusicOnce(startAt = 10) {
            if (!bgMusic || musicStarted) return;

            bgMusic.volume = 0.7;

            bgMusic.play().then(() => {
                // tunggu audio benar-benar playing
                const seek = () => {
                    if (bgMusic.currentTime < startAt - 0.3) {
                        bgMusic.currentTime = startAt;
                    }
                    bgMusic.removeEventListener('playing', seek);
                };

                bgMusic.addEventListener('playing', seek);
                musicStarted = true;
            }).catch(err => {
                console.log('Audio error:', err);
            });
        }
    </script>

    <script>
        const memoryImages = [
            'photo/1.jpg',
            'photo/2.jpg',
            'photo/3.jpg',
            'photo/4.jpg',
            'photo/5.jpg',
            'photo/6.jpg',
            'photo/7.jpg',
            'photo/8.jpeg'
        ];

        let memoryIndex = 0;
        const memoryImg = document.getElementById('memory-img');

        setInterval(() => {
            if (!memoryImg) return;

            memoryImg.classList.add('opacity-0', 'scale-105');

            setTimeout(() => {
                memoryIndex = (memoryIndex + 1) % memoryImages.length;
                memoryImg.src = memoryImages[memoryIndex];
                memoryImg.classList.remove('opacity-0', 'scale-105');
            }, 500);
        }, 2500);
    </script>

</body>

</html>