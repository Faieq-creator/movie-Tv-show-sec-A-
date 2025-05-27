<?php 
require_once 'session_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trivia Section</title>
    <style>
        /* Top Navigation Buttons */
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

        /* Existing Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 1000px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

        input[type="text"], select, textarea {
            padding: 8px;
            width: 100%;
            margin-top: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
            color: #333;
        }

        td {
            background-color: #fafafa;
        }

        button {
            padding: 10px 20px;
            background-color: #a80000;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #8a0000;
        }

        .submit-trivia button {
            width: 100%;
            padding: 15px;
            font-size: 1.2em;
        }

        .delete-btn {
            color: red;
            font-weight: bold;
            cursor: pointer;
            border: none;
            background-color: transparent;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    
    <div class="top-buttons">
        <a href="../controller/contact_us1.php" class="top-button">CONTACT US</a>
        <a href="../controller/logout.php" class="top-button">LOG OUT</a>
    </div>

    <!-- Main Trivia Form -->
    <form id="triviaForm">
        <fieldset>
            <legend>FUN FACTS !!</legend>
            <table id="funFactsTable">
                <tr>
                    <td><b>Movie:</b> Inception</td>
                    <td><button class="delete-btn" onclick="deleteTrivia(event)">Delete</button></td>
                </tr>
                <tr>
                    <td>Leonardo DiCaprio helped rewrite parts of the script to deepen the emotional aspects of the story.</td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Movie:</b> The Matrix</td>
                    <td><button class="delete-btn" onclick="deleteTrivia(event)">Delete</button></td>
                </tr>
                <tr>
                    <td>The iconic green code was inspired by sushi recipes in a Japanese cookbook.</td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Movie:</b> Titanic</td>
                    <td><button class="delete-btn" onclick="deleteTrivia(event)">Delete</button></td>
                </tr>
                <tr>
                    <td>James Cameron drew Rose's sketch with his own hands — not Leonardo DiCaprio's.</td>
                    <td></td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>EASTER EGG HUNTER</legend>
            <table id="easterEggsTable">
                <tr>
                    <th>Movie</th>
                    <th>Hidden Detail</th>
                    <th>Scene</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>Pixar's Toy Story</td>
                    <td>Pizza Planet truck appears in the background.</td>
                    <td>Gas station chase</td>
                    <td><button class="delete-btn" onclick="deleteTrivia(event)">Delete</button></td>
                </tr>
                <tr>
                    <td>Marvel's Endgame</td>
                    <td>Howard the Duck cameo</td>
                    <td>Final battle scene</td>
                    <td><button class="delete-btn" onclick="deleteTrivia(event)">Delete</button></td>
                </tr>
                <tr>
                    <td>Harry Potter</td>
                    <td>??</td>
                    <td>!?</td>
                    <td><button class="delete-btn" onclick="deleteTrivia(event)">Delete</button></td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>GOOFS CATALOG</legend>
            <table id="goofsTable">
                <tr>
                    <th>Movie</th>
                    <th>Error Type</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>Gladiator</td>
                    <td>Continuity</td>
                    <td>Gas cylinder seen in a chariot during battle scene.</td>
                    <td><button class="delete-btn" onclick="deleteTrivia(event)">Delete</button></td>
                </tr>
                <tr>
                    <td>Pirates of the Caribbean</td>
                    <td>Costume</td>
                    <td>Modern cowboy hat worn by a crew member in background.</td>
                    <td><button class="delete-btn" onclick="deleteTrivia(event)">Delete</button></td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>SUBMIT YOUR OWN TRIVIA</legend>
            <table>
                <tr>
                    <td><label>Movie Title:</label></td>
                    <td><input type="text" name="movie" id="movieTitle"></td>
                </tr>
                <tr>
                    <td><label>Trivia Type:</label></td>
                    <td>
                        <select id="triviaType">
                            <option>Fun Fact</option>
                            <option>Easter Egg</option>
                            <option>Goof</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Description:</label></td>
                    <td><textarea rows="4" cols="30" id="triviaDescription" placeholder="Write your trivia here..."></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" class="submit-trivia">
                        <button type="submit">Submit Trivia</button>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>

    <script>
        // Function to handle the deletion of trivia items
        function deleteTrivia(event) {
            event.preventDefault();
            const row = event.target.closest('tr');
            if (confirm('Are you sure you want to delete this trivia?')) {
                row.parentNode.removeChild(row);
            }
        }

        // Handling form submission to add new trivia
        document.getElementById("triviaForm").addEventListener("submit", function(event) {
            event.preventDefault();

            // Get form values
            const movieTitle = document.getElementById("movieTitle").value.trim();
            const triviaType = document.getElementById("triviaType").value;
            const triviaDescription = document.getElementById("triviaDescription").value.trim();

            // Validate inputs
            if (!movieTitle || !triviaDescription) {
                alert('Please fill in all fields');
                return;
            }

            // Create new row based on trivia type
            if (triviaType === "Fun Fact") {
                addToFunFacts(movieTitle, triviaDescription);
            } else if (triviaType === "Easter Egg") {
                addToEasterEggs(movieTitle, triviaDescription);
            } else if (triviaType === "Goof") {
                addToGoofs(movieTitle, triviaDescription);
            }

            // Clear form
            document.getElementById("movieTitle").value = "";
            document.getElementById("triviaDescription").value = "";
        });

        function addToFunFacts(movie, description) {
            const table = document.getElementById("funFactsTable");
            
            // Add movie row
            const movieRow = table.insertRow();
            const movieCell = movieRow.insertCell(0);
            movieCell.colSpan = 1;
            movieCell.innerHTML = `<b>Movie:</b> ${movie}`;
            
            const deleteCell = movieRow.insertCell(1);
            const deleteBtn = document.createElement("button");
            deleteBtn.className = "delete-btn";
            deleteBtn.textContent = "Delete";
            deleteBtn.onclick = deleteTrivia;
            deleteCell.appendChild(deleteBtn);
            
            // Add description row
            const descRow = table.insertRow();
            const descCell = descRow.insertCell(0);
            descCell.colSpan = 2;
            descCell.textContent = description;
        }

        function addToEasterEggs(movie, description) {
            const table = document.getElementById("easterEggsTable");
            const newRow = table.insertRow();
            
            newRow.innerHTML = `
                <td>${movie}</td>
                <td>${description}</td>
                <td>Unknown</td>
                <td><button class="delete-btn" onclick="deleteTrivia(event)">Delete</button></td>
            `;
        }

        function addToGoofs(movie, description) {
            const table = document.getElementById("goofsTable");
            const newRow = table.insertRow();
            
            newRow.innerHTML = `
                <td>${movie}</td>
                <td>Continuity</td>
                <td>${description}</td>
                <td><button class="delete-btn" onclick="deleteTrivia(event)">Delete</button></td>
            `;
        }
    </script>
</body>
</html>