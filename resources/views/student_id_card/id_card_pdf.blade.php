<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
    <title>Student ID Card</title>
</head>
<body>

<table id="customers" style="margin-bottom: 10px;">
    <tr>
        <td style='text-align:center'>
            <h2>School ERP</h2>
            <p>School Address:</p>
            <p>Phone: 02243428934</p>
            <p>Email: school_erp@outlook.com</p>
            <p><b>Student Result Report</b></p>
        </td>
    </tr>

</table>

@foreach($allData as $data)

<table id="customers" style="margin-bottom: 10px; margin-top: 10px;" >
<tr>
    <td>Image</td>
    <td>Easy School</td>
    <td>Student ID Card</td>
</tr>
    <tr>
    <td>Name: {{ $data->student->name }}</td>
    <td>Session: {{ $data->studentYear->year_name }}</td>
    <td>Class:{{ $data->studentClass->name }} </td>
</tr>
    <tr>
    <td>Roll: {{ $data->roll }}</td>
    <td>ID No:{{ $data->student->id_number }} </td>
    <td>Mobile No: {{ $data->student->mobile }} </td>
</tr>
</table>

@endforeach

<i style="float: right";>Print Date: {{ date("d M Y") }}</i><br>

<hr style="color: #000000">


</body>

</html>


