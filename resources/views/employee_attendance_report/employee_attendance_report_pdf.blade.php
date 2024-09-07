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
    <title>Employee Attendance Report</title>
</head>
<body>

<table id="customers" style="margin-bottom: 10px;">
    <tr>
        <td style='text-align:center'>
            <h2>School ERP</h2>
            <p>School Address:</p>
            <p>Phone: 02243428934</p>
            <p>Email: school_erp@outlook.com</p>
            <p><b>Employee Attendance Report</b></p>
        </td>
    </tr>

</table>
<strong>Employee Name: {{ $allData[0]['user']['name'] }}</strong> , <strong>ID No: {{ $allData[0]['user']['id_number'] }}</strong>,
<strong>Month: {{ $monthData }}</strong>

<table id="customers" style="margin-bottom: 10px; margin-top: 10px;" >
    <tr>
        <th width="10%">Date</th>
        <th width="45%">Attendance Status</th>
    </tr>
    @foreach($allData as $data)
    <tr>
        <td width="50%">{{ date('d-m-Y',strtotime($data->date)) }}</td>
        <td width="50%">{{ $data->attendance_status }}</td>
    </tr>
    @endforeach
    <br><br>
    <tr>
        <td colspan="2">
            <strong>Total Absent: {{ $absentData }} | </strong>
            <strong>Total Leave: {{ $leaveData }}</strong>
        </td>

    </tr>



</table>
<i style="float: right";>Print Date: {{ date("d M Y") }}</i><br>

<hr style="color: #000000">


</body>
</html>

