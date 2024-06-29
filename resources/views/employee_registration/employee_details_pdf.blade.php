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
        <th width="45%">Employee Details</th>
        <th width="45%">Employee Data</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Employee Name</td>
        <td>{{ $detailsData->name }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Employee ID No.</td>
        <td>{{ $detailsData->id_number }}</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Father's Name</td>
        <td>{{ $detailsData->fathers_name }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Mother's Name</td>
        <td>{{ $detailsData->mothers_name }}</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Mobile No.</td>
        <td>{{ $detailsData->mobile }}</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Address</td>
        <td>{{ $detailsData->address }}</td>
    </tr>
    <tr>
        <td>7</td>
        <td>Gender</td>
        <td>{{ $detailsData->gender }}</td>
    </tr>
    <tr>
        <td>8</td>
        <td>Religion</td>
        <td>{{ $detailsData->religion }}</td>
    </tr>
    <tr>
        <td>9</td>
        <td>Date Of Joining</td>
        <td>{{ date('d-m-Y',strtotime($detailsData->joining_date))  }}</td>
    </tr>
    <tr>
        <td>10</td>
        <td>Employee Designation</td>
        <td>{{ $detailsData->designation->name }}</td>
    </tr>


</table>

<i style="float: right">Print Date: {{ date("d M Y") }}</i>

</body>
</html>

