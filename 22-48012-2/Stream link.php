<?php 
require_once 'session_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Streaming Links</title>
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

        td a {
            color: #cc0000;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
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

        .region-select {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .region-select select {
            flex: 1;
        }

        .region-alert {
            font-weight: bold;
            color: #a717dc;
            margin-top: 10px;
        }

        .streaming-links td {
            background-color: #fafafa;
        }

        .streaming-links td a {
            display: block;
            text-align: center;
            padding: 10px;
            background-color: #cc0000;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .streaming-links td a:hover {
            background-color: #a80000;
        }

    </style>
</head>
<body>
    
    <form>
        <fieldset>
            <legend>SERVICE</legend>
            <table class="streaming-links" id="serviceTable">
                <tr>
                    <th>Streaming Service</th>
                    <th>Available In</th>
                    <th>Link</th>
                </tr>
                <tr data-regions="Bangladesh,Australia,Ireland">
                    <td>Netflix</td>
                    <td>Bangladesh, Australia, Ireland</td>
                    <td><a href="https://www.netflix.com/signup/planform" target="_blank">Watch on Netflix</a></td>
                </tr>
                <tr data-regions="Bangladesh,Australia,Germany">
                    <td>Amazon Prime</td>
                    <td>Bangladesh, Australia, Germany</td>
                    <td><a href="https://www.primevideo.com/offers/nonprimehomepage/ref=dv_web_force_root" target="_blank">Watch on Prime</a></td>
                </tr>
                <tr data-regions="Bangladesh,Australia,Germany">
                    <td>Disney+</td>
                    <td>Bangladesh, Australia, Germany</td>
                    <td><a href="https://www.disneyplus.com/welcome/unavailable" target="_blank">Watch on Disney+</a></td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>PRICE $$</legend>
            <table>
                <tr>
                    <th>Streaming Service</th>
                    <th>Monthly Price (USD)</th>
                    <th>Ad-Free Option</th>
                </tr>
                <tr>
                    <td>Netflix</td>
                    <td>$15.99</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>Amazon Prime</td>
                    <td>$14.99</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>Disney+</td>
                    <td>$7.99</td>
                    <td>No (ads included)</td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>REGION ALERT</legend>
            <div class="region-select">
                <label>Select Your Region:</label>
                <select id="regionSelect">
                    <option value="">-- Choose Region --</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Australia">Australia</option>
                    <option value="Germany">Germany</option>
                </select>
            </div>
            <div class="region-alert">
                <p><b>Note:</b> VPN may not be available in your region.</p>
                <p><b>VPN :</b> Use a trusted VPN.</p>
            </div>
            <div style="text-align: center; margin-top: 10px;">
                <a href="error.html">
                    <button type="button">VPN</button>
                </a>
            </div>
        </fieldset>
    </form>

    <script>
        var regionSelect = document.getElementById('regionSelect');
        var serviceTable = document.getElementById('serviceTable');

        regionSelect.onchange = function() {
            var selectedRegion = regionSelect.value;
            var rows = serviceTable.getElementsByTagName('tr');

            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var regions = row.getAttribute('data-regions');

                if (regions && selectedRegion) {
                    if (regions.includes(selectedRegion)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                } else {
                    row.style.display = "";
                }
            }
        };
    </script>
</body>
</html>
