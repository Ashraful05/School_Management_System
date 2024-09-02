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
    <title>Monthly/Yearly Profit Report</title>
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

         $studentFee = \App\Models\StudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
         $otherCost = \App\Models\ManageOthersCost::whereBetween('date',[$sdate,$edate])->sum('amount');
         $employeeSalary = \App\Models\ManageEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

         $totalCost = $otherCost + $employeeSalary;
         $profit = $studentFee - $totalCost;
@endphp

<table id="customers" style="margin-bottom: 10px;">
    <tr>
       <td colspan="2" style="text-align: center">
           <h4>Reporting Date: {{ date('d M Y',strtotime($sdate)) }} - {{ date('d M Y',strtotime($edate)) }}</h4>
       </td>
    </tr>
    <tr>
        <td width="50%"><b>Purposes</b></td>
        <td width="50%"><b>Amount</b></td>

    </tr>
    <tr>
        <td>Student Fee</td>
        <td>{{$studentFee}}</td>

    </tr>
    <tr>
        <td>Other Cost</td>
        <td>{{ $otherCost }}</td>

    </tr>
    <tr>
        <td>Employee Salary</td>
        <td>{{ $employeeSalary }}</td>

    </tr>
    <tr>
        <td>Total Cost</td>
        <td>{{ $totalCost }}</td>

    </tr>
    <tr>
        <td>Profit</td>
        <td>{{ $profit }}</td>

    </tr>

</table>
<i style="float: right";>Print Date: {{ date("d M Y") }}</i><br>




</body>
</html>

