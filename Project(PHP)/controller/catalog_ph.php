<?php 
require_once 'session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Media Catalog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 1000px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        fieldset {
            margin-bottom: 20px;
            border: 2px solid #cc0000;
            border-radius: 8px;
            padding: 15px;
        }

        legend {
            font-weight: bold;
            font-size: 1.2em;
            color: #cc0000;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"], select {
            padding: 8px;
            width: 99%;
            margin-top: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #fafafa;
            width: 33%;
        }

        button {
            padding: 10px 20px;
            background-color: #cc0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #a80000;
        }

        img {
            width: 100%;
            max-width: 150px;
            height: auto;
            display: block;
            margin-bottom: 10px;
            background-color: #ddd; 
        }

        b {
            color: #cc0000;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
        
        .top-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .top-button {
            padding: 10px 20px;
            background-color: #a80000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .top-button:hover {
            background-color: #555;
        }
        
        .bottom-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Top Right Buttons -->
    <div class="top-buttons">
        <a href="../controller/trivia.php" class="top-button">TRIVIA !!</a>
        <a href="../controller/contact_us1.php" class="top-button">CONTACT US</a>
        <a href="../controller/logout.php" class="top-button">LOG OUT</a>
    </div>

    <form>
        <fieldset>
            <legend>MEDIA CATALOG</legend>

            <label>Search:</label>
            <input type="text" id="searchInput" placeholder="Search movies...">

            <fieldset>
                <legend>ADVANCED SEARCH</legend>

                <label>Genre:</label>
                <select id="genreSelect">
                    <option>All</option>
                    <option>Action</option>
                    <option>Drama</option>
                    <option>Comedy</option>
                    <option>Animation</option>
                    <option>Thriller</option>
                </select>

                <label>Release Year:</label>
                <select id="yearSelect">
                    <option>All</option>
                    <option>1990</option>
                    <option>2000</option>
                    <option>2005</option>
                    <option>2010</option>
                    <option>2015</option>
                    <option>2020</option>
                </select>

                <label>Minimum Rating:</label>
                <select id="ratingSelect">
                    <option>00</option>
                    <option>1+</option>
                    <option>2+</option>
                    <option>3+</option>
                    <option>4+</option>
                    <option>5+</option>
                </select>

                <label>Language:</label>
                <select id="languageSelect">
                    <option>All</option>
                    <option>English</option>
                    <option>Bangla</option>
                    <option>Spanish</option>
                    <option>French</option>
                </select>

            </fieldset>

            <!-- Buttons: OK + Genre Builder -->
            <div class="button-group">
                <button type="button" id="okButton">OK</button>
                <button type="button" id="genreBuilderButton">Genre Builder</button>
            </div>

        </fieldset>

        <fieldset>
            <legend>DETAILED VIEW</legend>
            <table id="movieTable">
                <!-- Movies will show here -->
            </table>
            
            <!-- Bottom Buttons -->
            <div class="bottom-buttons">
                <button type="button" onclick="window.location.href='../controller/actor prof.php'">ACTORS PROFILE</button>
                <button type="button" onclick="window.location.href='../controller/stream link.php'">WATCH NOW</button>
            </div>
        </fieldset>
    </form>

    <script>
        // Movies data
        var movies = [
            {
                title: "Inception",
                runtime: "148 mins",
                cast: "Leonardo DiCaprio",
                director: "Christopher Nolan",
                genre: "Action",
                year: "2010",
                rating: 5,
                language: "English",
                poster: "https://image.tmdb.org/t/p/original/9gk7adHYeDvHkCSEqAvQNLV5Uge.jpg"
            },
            {
                title: "Toy Story",
                runtime: "81 mins",
                cast: "Tom Hanks",
                director: "John Lasseter",
                genre: "Animation",
                year: "1995",
                rating: 4,
                language: "English",
                poster: "https://image.tmdb.org/t/p/original/uXDfjJbdP4ijW5hWSBrPrlKpxab.jpg"
            },
            {
                title: "The Dark Knight",
                runtime: "152 mins",
                cast: "Christian Bale",
                director: "Christopher Nolan",
                genre: "Action",
                year: "2008",
                rating: 5,
                language: "English",
                poster: "https://image.tmdb.org/t/p/original/qJ2tW6WMUDux911r6m7haRef0WH.jpg"
            }
        ];

        // Get elements
        var searchInput = document.getElementById('searchInput');
        var genreSelect = document.getElementById('genreSelect');
        var yearSelect = document.getElementById('yearSelect');
        var ratingSelect = document.getElementById('ratingSelect');
        var languageSelect = document.getElementById('languageSelect');
        var okButton = document.getElementById('okButton');
        var genreBuilderButton = document.getElementById('genreBuilderButton');
        var movieTable = document.getElementById('movieTable');

        // When OK button clicked
        okButton.onclick = function() {
            var search = searchInput.value.toLowerCase();
            var genre = genreSelect.value;
            var year = yearSelect.value;
            var rating = ratingSelect.value;
            var language = languageSelect.value;

            var result = [];

            for (var i = 0; i < movies.length; i++) {
                var movie = movies[i];

                if (search !== "") {
                    if (movie.title.toLowerCase().includes(search)) {
                        result.push(movie);
                    }
                } else {
                    if ((genre === "All" || movie.genre === genre) &&
                        (year === "All" || movie.year === year) &&
                        (rating === "00" || movie.rating >= parseInt(rating)) &&
                        (language === "All" || movie.language === language)) {
                        result.push(movie);
                    }
                }
            }

            showMovies(result);
        };

        // When Genre Builder button clicked
        genreBuilderButton.onclick = function() {
            window.location.href = "../controller/Genre.php"; 
        };

        // Function to show movies
        function showMovies(movieList) {
            var html = "";

            if (movieList.length === 0) {
                html = "<tr><td colspan='3' style='text-align:center;'>No movies found.</td></tr>";
            } else {
                html = "<tr>";
                for (var i = 0; i < movieList.length; i++) {
                    var m = movieList[i];
                    html += "<td>";
                    html += "<img src='" + m.poster + "' alt='" + m.title + "'><br>";
                    html += "<b>Title:</b> " + m.title + "<br>";
                    html += "<b>Runtime:</b> " + m.runtime + "<br>";
                    html += "<b>Cast:</b> " + m.cast + "<br>";
                    html += "<b>Director:</b> " + m.director + "<br>";
                    html += "</td>";

                    if ((i + 1) % 3 === 0) {
                        html += "</tr><tr>";
                    }
                }
                html += "</tr>";
            }

            movieTable.innerHTML = html;
        }

        // Show all movies at start
        showMovies(movies);
    </script>

</body>
</html>

