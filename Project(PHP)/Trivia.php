<?php 
require_once 'session_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trivia Section</title>
    <style>
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
            background-color: #cc0000;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #a80000;
        }

        td a {
            color: #cc0000;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
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
        }
    </style>
</head>
<body>
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
                    <td>James Cameron drew Rose’s sketch with his own hands — not Leonardo DiCaprio’s.</td>
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
            row.parentNode.removeChild(row); // Remove the clicked row
        }

        // Handling form submission to add new trivia
        document.getElementById("triviaForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form from submitting normally

            // Get form values
            const movieTitle = document.getElementById("movieTitle").value;
            const triviaType = document.getElementById("triviaType").value;
            const triviaDescription = document.getElementById("triviaDescription").value;

            // Create a new row for the trivia
            const newRow = document.createElement("tr");

            // Create a new cell for the movie title and trivia description
            const newCell = document.createElement("td");
            newCell.innerHTML = `<b>Movie:</b> ${movieTitle}<br>${triviaDescription}`;

            const deleteButtonCell = document.createElement("td");
            const deleteButton = document.createElement("button");
            deleteButton.classList.add("delete-btn");
            deleteButton.textContent = "Delete";
            deleteButton.addEventListener("click", deleteTrivia);
            deleteButtonCell.appendChild(deleteButton);

            newRow.appendChild(newCell);
            newRow.appendChild(deleteButtonCell);

            // Add the new trivia to the correct table
            if (triviaType === "Fun Fact") {
                document.getElementById("funFactsTable").appendChild(newRow);
            } else if (triviaType === "Easter Egg") {
                document.getElementById("easterEggsTable").appendChild(newRow);
            } else if (triviaType === "Goof") {
                document.getElementById("goofsTable").appendChild(newRow);
            }

            // Clear the form fields after submission
            document.getElementById("movieTitle").value = "";
            document.getElementById("triviaDescription").value = "";
        });
    </script>
</body>
</html>
