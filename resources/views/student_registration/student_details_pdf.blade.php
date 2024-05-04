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
        <td>1</td>
        <td>Father's Name</td>
        <td>{{ $detailsData->student->fathers_name }}</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Mother's Name</td>
        <td>{{ $detailsData->student->mothers_name }}</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Mobile No.</td>
        <td>{{ $detailsData->student->mobile }}</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Address</td>
        <td>{{ $detailsData->student->address }}</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Gender</td>
        <td>{{ $detailsData->student->gender }}</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Religion</td>
        <td>{{ $detailsData->student->religion }}</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Date Of Birth</td>
        <td>{{ $detailsData->student->date_of_birth }}</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Student Year</td>
        <td>{{ $detailsData->studentYear->year_name }}</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Student Group</td>
        <td>{{ $detailsData->studentGroup->group_name }}</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Class Shift</td>
        <td>{{ $detailsData->classShift->shift_name }}</td>
    </tr>

</table>

<i style="float: right">Print Date: {{ date("d M Y") }}</i>

</body>
</html>
