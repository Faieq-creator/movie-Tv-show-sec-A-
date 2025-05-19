<?php 
require_once 'session_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Genre Filtering</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
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
            color: #cc0000;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }

        input[type="checkbox"],
        input[type="radio"] {
            margin-right: 8px;
            margin-bottom: 10px;
        }

        select {
            padding: 8px;
            font-size: 1em;
            width: 100%;
            margin-top: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
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

        table {
            width: 100%;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }
    </style>
</head>
<body>
    <form>
        <fieldset>
            <legend>HYBRID GENRE BUILDER</legend>
            <table>
                <tr>
                    <td>
                        <label>Select Genre 1:</label>
                        <select>
                            <option>--Select--</option>
                            <option>Comedy</option>
                            <option>Horror</option>
                            <option>Action</option>
                            <option>Romance</option>
                        </select>
                    </td>
                    <td>
                        <label>Select Genre 2:</label>
                        <select>
                            <option>--Select--</option>
                            <option>Comedy</option>
                            <option>Horror</option>
                            <option>Drama</option>
                            <option>Thriller</option>
                        </select>
                    </td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>MOOD</legend>
            <table>
                <tr>
                    <td>
                        <input type="radio" name="mood">Feeling-Good
                        <input type="radio" name="mood">Scary
                        <input type="radio" name="mood">Romantic
                        <input type="radio" name="mood">Funny
                    </td>
                </tr>
            </table>
            <div style="text-align: center; margin-top: 10px;">
                <a href="Catalog.html">
                <button type="button">OK</button></a>
            </div>
        </fieldset>
    </form>
</body>
</html>
