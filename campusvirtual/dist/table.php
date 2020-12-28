
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" crossorigin="anonymous" />
        
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<ul class="nav nav-tabs" role="tablist">
                        <li class="">
                            <a href="#tab-table1" data-toggle="tab" aria-expanded="false">Table 1</a>
                        </li>
                        <li class="active">
                            <a href="#tab-table2" data-toggle="tab" aria-expanded="true">Table 2</a>
                        </li>
                    </ul>
<table id="myTable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Extn.</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                </table><table id="myTable2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Extn.</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                </table>



<script src="https://code.jquery.com/jquery-3.3.1.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
 
    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
    } );
    $('table.table').DataTable( {
        ajax: 'data.txt',
        scrollY:        200,
        scrollCollapse: true,
        paging:         false
    } );
 
    // Apply a search to the second table for the demo
    $('#myTable2').DataTable().search( 'New York' ).draw();
} );
</script>