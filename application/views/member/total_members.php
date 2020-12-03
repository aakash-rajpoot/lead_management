<html>

<head>
    <meta charset="utf-8">
    <!-- custom css-->
    <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


    <script src='https://use.fontawesome.com/2188c74ac9.js'></script>

</head>
<body>
<div id="table1">
    <div class="content-wrapper content-wrapper--with-bg">
        <div class="container">
            <div class="mt-5">
                <table id="dt-all-checkbox" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="th-sm">Name
                            </th>
                            <th class="th-sm">Address
                            </th>
                            <th class="th-sm">Age
                            </th>
                            <th class="th-sm">Start date
                            </th>
                            <th class="th-lg">Action
                            </th>
                            <th class="th-sm">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">
                        <tr>
                            <td>1</td>
                            <td>Aman Kumar Raghav</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td class="edit-icon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Anil singh</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#dt-all-checkbox').dataTable({

            columnDefs: [{
                orderable: false,
                className: 'select-checkbox select-checkbox-all',
                targets: 0
            }],
            select: {
                style: 'multi',
                selector: 'td:first-child'
            }
        });
    });
</script>

</body>

</html>