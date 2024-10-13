<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Report</title>
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
    <h1>Teachers Report</h1>

    <table>
        <thead>
            <tr style="background-color:orange;">
            <th class="serial-number">S/NO</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                NAME</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                GENDER</th>
            <th
                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                CONTACT NUMBER</th>
            <th
                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                DESIGNTATION</th>
            
            </tr>
        </thead>
        <tbody>
        @foreach ($teachers as $index => $teacher)
                <tr>
                <td>{{ $index + 1 }}</td> 
                    <td>{{ $teacher->name }}</td>
                   
                    <td>{{$teacher->gender}}</td>
                    <td>{{$teacher->contact_number}}</td>
                    <td>{{$teacher->designation}}</td>
                </tr>
            @endforeach
        </tbody>
</body>
</html>
