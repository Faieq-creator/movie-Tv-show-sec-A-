<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rating System</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            padding: 20px;
            background: #f9f9f9;
        }

        h1 {
            margin-bottom: 15px;
        }

        .section {
            background: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .stars span {
            font-size: 24px;
            cursor: pointer;
            color: #ccc;
        }

            .stars span.selected {
                color: gold;
            }

        .score-display {
            font-size: 1.5em;
            margin-top: 10px;
        }

        .demo-table, .comparison-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

            .demo-table th, .demo-table td, .comparison-table th, .comparison-table td {
                padding: 8px;
                border: 1px solid #ccc;
                text-align: center;
            }

        button {
            margin-top: 10px;
            padding: 6px 12px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

            button:hover {
                background-color: #0056b3;
            }

        .disabled {
            background-color: #aaa;
            cursor: not-allowed;
        }

        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <h1>🎬 Movie Rating System</h1>

    <!-- Login Section -->
    <div class="section">
        <h2>Login to Rate</h2>
        <label>Username:</label>
        <input type="text" id="username" />
        <span id="umsg" class="error"></span><br />

        <label>Password:</label>
        <input type="password" id="password" />
        <span id="pmsg" class="error"></span><br />

        <span id="vmsg" class="error"></span><br />

        <button onclick="if(validate()) verifyWatch()">Login & Verify</button>
    </div>

    <!-- Star Rater -->
    <div class="section" id="ratingSection" style="display: none;">
        <h2>Rate This Movie</h2>
        <div class="stars" id="starRater">
            <span data-value="1">&#9733;</span>
            <span data-value="2">&#9733;</span>
            <span data-value="3">&#9733;</span>
            <span data-value="4">&#9733;</span>
            <span data-value="5">&#9733;</span>
        </div>
        <button onclick="submitRating()">Submit Rating</button>
        <div class="score-display" id="scoreDisplay"></div>
    </div>

    <!-- Demographic Breakdown -->
    <div class="section">
        <h2>Demographic Ratings</h2>
        <table class="demo-table">
            <thead>
                <tr>
                    <th>Group</th>
                    <th>Average Rating</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Men (18-34)</td><td>4.2</td></tr>
                <tr><td>Women (18-34)</td><td>4.5</td></tr>
                <tr><td>Men (35+)</td><td>3.8</td></tr>
                <tr><td>Women (35+)</td><td>4.1</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Critic vs Audience -->
    <div class="section">
        <h2>Critic vs Audience</h2>
        <table class="comparison-table">
            <tr><th>Source</th><th>Score</th></tr>
            <tr><td>Critics</td><td>87%</td></tr>
            <tr><td>Audience</td><td id="audienceScore">84%</td></tr>
        </table>
    </div>

    <script>
        let verified = false;
        let currentRating = 0;

        function validate() {
            let username = document.getElementById('username').value.trim();
            let password = document.getElementById('password').value.trim();
            let umsg = document.getElementById('umsg');
            let pmsg = document.getElementById('pmsg');
            let vmsg = document.getElementById('vmsg');

            let valid = true;

            // Clear previous messages
            umsg.textContent = "";
            pmsg.textContent = "";
            vmsg.textContent = "";

            if (username === "") {
                umsg.textContent = "Username is required.";
                valid = false;
            }

            if (password === "") {
                pmsg.textContent = "Password is required.";
                valid = false;
            }

            if (username !== "" && password !== "" && username !== password) {
                vmsg.textContent = "Username and password must match.";
                valid = false;
            }

            return valid;
        }

        function verifyWatch() {
            verified = true;
            document.getElementById("ratingSection").style.display = "block";
        }

        const stars = document.querySelectorAll("#starRater span");
        stars.forEach(star => {
            star.addEventListener("click", () => {
                currentRating = parseInt(star.dataset.value);
                updateStars(currentRating);
            });
        });

        function updateStars(rating) {
            stars.forEach(star => {
                star.classList.toggle("selected", parseInt(star.dataset.value) <= rating);
            });
        }

        function submitRating() {
            if (!verified || currentRating === 0) {
                alert("Please verify and select a rating.");
                return;
            }

            const display = document.getElementById("scoreDisplay");
            display.textContent = `✅ Thank you! Your Rating: ${currentRating} star${currentRating > 1 ? 's' : ''}`;

            const updatedScore = 84 + (currentRating - 4); // simulated logic
            document.getElementById("audienceScore").textContent = `${updatedScore}%`;
        }
    </script>

</body>
</html>
