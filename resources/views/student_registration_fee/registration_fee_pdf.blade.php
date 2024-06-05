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
    <title></title>
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
    $registrationfee =  \App\Models\FeeCategoryAmount::where('fee_category_id','1')
                ->where('class_id',$detailsData->class_id)
                ->first();
        $originalfee = $registrationfee->amount;
                   $discount = $detailsData['discount']['discount'];
                   $discounttablefee = $discount/100*$originalfee;
                   $finalfee = (float)$originalfee-(float)$discounttablefee;
@endphp

<table id="customers" style="margin-bottom: 10px;">
    <tr>
        <th width="10%">Sl.</th>
        <th width="45%">Student Details</th>
        <th width="45%">Student Data</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Student Name</td>
        <td>{{ $detailsData->student->name }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Father's Name</td>
        <td>{{ $detailsData->student->fathers_name }}</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Session</td>
        <td>{{ $detailsData->studentYear->year_name }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Class</td>
        <td>{{ $detailsData->studentClass->name }}</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Original Registration Fee</td>
        <td>{{ $originalfee }}</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Discount Fee(%)</td>
        <td>{{ $discount }}%</td>
    </tr>
    <tr>
        <td>7</td>
        <td>Final Fee</td>
        <td>{{ $finalfee }}</td>
    </tr>

</table>
<i style="float: right";>Print Date: {{ date("d M Y") }}</i><br>

<hr style="color: #000000">
<br>
<table id="customers" style="margin-bottom: 10px;">
    <tr>
        <th width="10%">Sl.</th>
        <th width="45%">Student Details</th>
        <th width="45%">Student Data</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Student Name</td>
        <td>{{ $detailsData->student->name }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Father's Name</td>
        <td>{{ $detailsData->student->fathers_name }}</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Session</td>
        <td>{{ $detailsData->studentYear->year_name }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Class</td>
        <td>{{ $detailsData->studentClass->name }}</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Original Registration Fee</td>
        <td>{{ $originalfee }}</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Discount Fee(%)</td>
        <td>{{ $discount }}%</td>
    </tr>
    <tr>
        <td>7</td>
        <td>Final Fee</td>
        <td>{{ $finalfee }}</td>
    </tr>

</table>

<i style="float: right">Print Date: {{ date("d M Y") }}</i>

</body>
</html>

