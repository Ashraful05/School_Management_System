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
    <title>Employee Monthly Pay Slip</title>
</head>
<body>

<table id="customers">
    <tr>
        <td style='text-align:center'>
            <h2>School ERP</h2>
            <p>School Address:</p>
            <p>Phone: 02243428934</p>
            <p>Email: school_erp@outlook.com</p>
        </td>
    </tr>

</table>

@php

$date = date('Y-m',strtotime($detailsData['0']->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }
$totalAttendance = \App\Models\EmployeeAttendance::with('user')->where($where)
                ->where('employee_id',$detailsData['0']->employee_id)->get();

         $salary = (float)$detailsData['0']['user']['salary'];
            $salaryPerDay = (float)$salary/30;
            $absentCount = count($totalAttendance->where('attendance_status','Absent'));
            $totalSalaryMinus = (float)$absentCount * (float)$salaryPerDay;
            $totalSalary = (float)$salary - (float)$totalSalaryMinus;
@endphp

<table id="customers" style="margin-bottom: 10px;">
    <tr>
        <th width="10%">Sl.</th>
        <th width="45%">Employee Details</th>
        <th width="45%">Employee Data</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Employee Name</td>
        <td>{{ $detailsData['0']['user']['name'] }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Basic Salary</td>
        <td>{{ $detailsData['0']['user']['salary'] }}</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Total Absent For this Month</td>
        <td>{{ $absentCount }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Month</td>
        <td>{{ date('M Y',strtotime($detailsData['0']->date)) }}</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Salary This Month</td>
        <td>{{ $totalSalary }}</td>
    </tr>

</table>
<i style="float: right";>Print Date: {{ date("d M Y") }}</i><br>

<hr style="color: #000000">
<br>
<table id="customers" style="margin-bottom: 10px;">
    <tr>
        <th width="10%">Sl.</th>
        <th width="45%">Employee Details</th>
        <th width="45%">Employee Data</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Employee Name</td>
        <td>{{ $detailsData['0']['user']['name'] }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Basic Salary</td>
        <td>{{ $detailsData['0']['user']['salary'] }}</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Total Absent For this Month</td>
        <td>{{ $absentCount }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Month</td>
        <td>{{ date('M Y',strtotime($detailsData['0']->date)) }}</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Salary This Month</td>
        <td>{{ $totalSalary }}</td>
    </tr>

</table>

<i style="float: right">Print Date: {{ date("d M Y") }}</i>

</body>
</html>

