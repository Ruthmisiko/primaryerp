<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>NAME</th>
                <th>CONTACT NUMBER</th>
                <th>SUBJECTS</th>
                <th>ASSIGNED CLASS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as teacher)
            <tr></tr>
        </tbody>
    </table>
</body>
</html>