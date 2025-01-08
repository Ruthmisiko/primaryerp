<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .logo {
            display: block;
            margin: 0 auto;
            width: 90px; /* Adjust the logo size as needed */
            height: auto;
        }
        .serial-number {
            width: 50px; /* Set specific width for S/NO column */
        }
    </style>
</head>
<body>

<img src="./img/sch.png" class="navbar-brand-img" alt="main_logo" style="width: 20%; height:15%; margin-left:40%">
    <h1> REPORT CARD</h1>
    <h3>Students Name: </h3>
    <h3>Class: </h3>
    <h3>Class Teacher: </h3>


    <table>
        <thead>
            <tr style="background-color:orange;">
            
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
               SUBJECTS</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                GRADE</th>
            
            
            </tr>
        </thead>
        <tbody>
            @forelse ($results as $result)
            <tr>
                <td>
                    <p>Kiswhili</p>
                   </td>
                   <td>
                    <p>{{ $result->kiswahili }}</p>
                   </td>
            </tr>
            <tr>
                <td>
                    <p>English</p>
                   </td>
                   <td>
                    <p>{{ $result->English }}</p>
                   </td>
            </tr>
            <tr>
                <td>
                    <p>Mathematics</p>
                   </td>
                   <td>
                    <p>{{ $result->Mathematics }}</p>
                   </td>
            </tr>
            <tr>
                <td>
                    <p>CRE</p>
                   </td>
                   <td>
                    <p>{{ $result->CRE }}</p>
                   </td>
            </tr>
            <tr>
                <td>
                    <p>Homescience</p>
                   </td>
                   <td>
                    <p>{{ $result->Homescience }}</p>
                   </td>
            </tr>
@empty
        <tr>
            <td colspan="6" class="text-center">No results found for this exam.</td>
        </tr>
    @endforelse
    </tbody>
    </table>
    <h3>TOTAL MARKS: </h3>
        <h3>POSITION: </h3>
 <div class="sign">
    <h4>Class Teacher's Sign</h4>
    <hr>
    <h4 style="text-align: right">Stamp</h4>
</div>    
</body>
</html>
