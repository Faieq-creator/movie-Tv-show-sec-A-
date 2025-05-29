<?php 
require_once 'session_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Actor Profiles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
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
            background-color: #8a0000;
        }

        form {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            color:#cc0000;
        }

        select {
            padding: 8px;
            font-size: 1em;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #cc0000;
            color: white;
        }
        button {
            padding: 10px 20px;
            background-color: #a80000;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #8a0000;
        }

    </style>
</head>
<body>
   
    <div class="top-buttons">
        <a href="../controller/trivia.php" class="top-button">TRIVIA !!</a>
        <a href="../controller/contact_us.php" class="top-button">CONTACT US</a>
        <a href="../controller/logout.php" class="top-button">LOG OUT</a>
    </div>

    <form>
        <fieldset>
            <legend>SELECT ACTOR</legend>
            <select>
                <option>-- Choose Actor --</option>
                <option>Leonardo DiCaprio</option>
                <option>Scarlett Johansson</option>
                <option>Tom Hanks</option>
                <option>Jhony Depp </option>
            </select>
        </fieldset>

        <fieldset>
            <legend>FILMOGRAPHY TIMELINE</legend>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Movie Title</th>
                    <th>Role</th>
                </tr>
                <tr>
                    <td>2010</td>
                    <td>Inception</td>
                    <td>Dom Cobb</td>
                </tr>
                <tr>
                    <td>2013</td>
                    <td>The Wolf of Wall Street</td>
                    <td>Jordan Belfort</td>
                </tr>
                <tr>
                    <td>2015</td>
                    <td>The Revenant</td>
                    <td>Hugh Glass</td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>COLLABORATION</legend>
            <table>
                <tr>
                    <th>Frequent Co-Star</th>
                    <th>Number of Films</th>
                    <th>Example Movies</th>
                </tr>
                <tr>
                    <td>Tom Hardy</td>
                    <td>2</td>
                    <td>Inception, The Revenant</td>
                </tr>
                <tr>
                    <td>Kate Winslet</td>
                    <td>2</td>
                    <td>Titanic, Revolutionary Road</td>
                </tr>
                <tr>
                    <td>Martin Scorsese (Director)</td>
                    <td>5</td>
                    <td>Aviator, Shutter Island, etc.</td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>AWARD HISTORY</legend>
            <table>
                <tr>
                    <th>Award</th>
                    <th>Movie</th>
                    <th>Year</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Oscar</td>
                    <td>The Revenant</td>
                    <td>2016</td>
                    <td>Won</td>
                </tr>
                <tr>
                    <td>Oscar</td>
                    <td>The Aviator</td>
                    <td>2005</td>
                    <td>Nominated</td>
                </tr>
                <tr>
                    <td>Golden Globe</td>
                    <td>The Wolf of Wall Street</td>
                    <td>2014</td>
                    <td>Won</td>
                </tr>
            </table>
        </fieldset>
        <div style="text-align: center; margin-top: 10px;">
            <a href="../controller/Catalog_ph.php">
                <button type="button">OK</button>
            </a>
        </div>  
        <script>
            function updateActorProfile() {
                const actorSelect = document.querySelector("select");
                const actor = actorSelect.value.trim();
        
                // Get table bodies (clear and refill later)
                const filmographyTable = document.querySelectorAll("fieldset")[1].querySelector("table");
                const collaborationTable = document.querySelectorAll("fieldset")[2].querySelector("table");
                const awardsTable = document.querySelectorAll("fieldset")[3].querySelector("table");
        
                // Clear previous rows (keep headers)
                filmographyTable.innerHTML = `
                    <tr>
                        <th>Year</th>
                        <th>Movie Title</th>
                        <th>Role</th>
                    </tr>
                `;
                collaborationTable.innerHTML = `
                    <tr>
                        <th>Frequent Co-Star</th>
                        <th>Number of Films</th>
                        <th>Example Movies</th>
                    </tr>
                `;
                awardsTable.innerHTML = `
                    <tr>
                        <th>Award</th>
                        <th>Movie</th>
                        <th>Year</th>
                        <th>Status</th>
                    </tr>
                `;
        
                if (actor === "-- Choose Actor --") {
                    return;
                }
        
            
                const actorData = {
                    "Leonardo DiCaprio": {
                        filmography: [
                            { year: 2010, title: "Inception", role: "Dom Cobb" },
                            { year: 2013, title: "The Wolf of Wall Street", role: "Jordan Belfort" },
                            { year: 2015, title: "The Revenant", role: "Hugh Glass" }
                        ],
                        collaborations: [
                            { name: "Tom Hardy", films: 2, examples: "Inception, The Revenant" },
                            { name: "Kate Winslet", films: 2, examples: "Titanic, Revolutionary Road" },
                            { name: "Martin Scorsese (Director)", films: 5, examples: "Aviator, Shutter Island, etc." }
                        ],
                        awards: [
                            { award: "Oscar", movie: "The Revenant", year: 2016, status: "Won" },
                            { award: "Oscar", movie: "The Aviator", year: 2005, status: "Nominated" },
                            { award: "Golden Globe", movie: "The Wolf of Wall Street", year: 2014, status: "Won" }
                        ]
                    },
                    "Scarlett Johansson": {
                        filmography: [
                            { year: 2012, title: "The Avengers", role: "Black Widow" },
                            { year: 2019, title: "Marriage Story", role: "Nicole Barber" },
                            { year: 2021, title: "Black Widow", role: "Natasha Romanoff" }
                        ],
                        collaborations: [
                            { name: "Chris Evans", films: 4, examples: "Avengers series" },
                            { name: "Florence Pugh", films: 1, examples: "Black Widow" }
                        ],
                        awards: [
                            { award: "Oscar", movie: "Marriage Story", year: 2020, status: "Nominated" },
                            { award: "BAFTA", movie: "Lost in Translation", year: 2004, status: "Won" }
                        ]
                    },
                    "Tom Hanks": {
                        filmography: [
                            { year: 1994, title: "Forrest Gump", role: "Forrest Gump" },
                            { year: 1998, title: "Saving Private Ryan", role: "Captain John Miller" },
                            { year: 2000, title: "Cast Away", role: "Chuck Noland" }
                        ],
                        collaborations: [
                            { name: "Steven Spielberg (Director)", films: 5, examples: "Saving Private Ryan, The Post" },
                            { name: "Meg Ryan", films: 3, examples: "You've Got Mail, Sleepless in Seattle" }
                        ],
                        awards: [
                            { award: "Oscar", movie: "Forrest Gump", year: 1995, status: "Won" },
                            { award: "Oscar", movie: "Philadelphia", year: 1994, status: "Won" },
                            { award: "Golden Globe", movie: "Cast Away", year: 2001, status: "Won" }
                        ]
                    },
                    "Jhony Depp": {
                        filmography: [
                            { year: 2003, title: "Pirates of the Caribbean", role: "Jack Sparrow" },
                            { year: 2005, title: "Charlie and the Chocolate Factory", role: "Willy Wonka" },
                            { year: 2015, title: "Black Mass", role: "Whitey Bulger" }
                        ],
                        collaborations: [
                            { name: "Tim Burton (Director)", films: 8, examples: "Edward Scissorhands, Sweeney Todd" },
                            { name: "Helena Bonham Carter", films: 6, examples: "Corpse Bride, Alice in Wonderland" }
                        ],
                        awards: [
                            { award: "Oscar", movie: "Pirates of the Caribbean", year: 2004, status: "Nominated" },
                            { award: "Golden Globe", movie: "Sweeney Todd", year: 2008, status: "Won" }
                        ]
                    }
                };
        
                const data = actorData[actor];
        
                // Fill Filmography
                for (let movie of data.filmography) {
                    const row = `<tr>
                                    <td>${movie.year}</td>
                                    <td>${movie.title}</td>
                                    <td>${movie.role}</td>
                                </tr>`;
                    filmographyTable.innerHTML += row;
                }
        
                // Fill Collaborations
                for (let collab of data.collaborations) {
                    const row = `<tr>
                                    <td>${collab.name}</td>
                                    <td>${collab.films}</td>
                                    <td>${collab.examples}</td>
                                </tr>`;
                    collaborationTable.innerHTML += row;
                }
        
                // Fill Awards
                for (let award of data.awards) {
                    const row = `<tr>
                                    <td>${award.award}</td>
                                    <td>${award.movie}</td>
                                    <td>${award.year}</td>
                                    <td>${award.status}</td>
                                </tr>`;
                    awardsTable.innerHTML += row;
                }
            }
        
            // Event listener
            window.onload = function() {
                const actorSelect = document.querySelector("select");
                actorSelect.addEventListener("change", updateActorProfile);
            }
        </script>
</body>
</html>