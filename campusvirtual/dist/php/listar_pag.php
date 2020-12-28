<!DOCTYPE html>
<html>
<head>
    <title>Dynamic DataTables With Jquery Tabs</title>
 
    <style>
    .tab-content {
  padding:10px;
  border-left:1px solid #DDD;
  border-bottom:1px solid #DDD;
  border-right:1px solid #DDD;
}
 
    </style>
 
 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 
</head>
<body>
<div class="container">
    <h3>
        TakaTaka </h3>
 
    <hr><br>
 
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#example4-tab1" aria-controls="example4-tab1" role="tab" data-toggle="tab">Tab 1</a></li>
        <li role="presentation"><a href="#example4-tab2" aria-controls="example4-tab2" role="tab" data-toggle="tab">Tab 2</a></li>
    </ul>
 
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="example4-tab1">
            <table id="example4-tab1-dt" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                           <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>New York</td>
                        <td>27</td>
                        <td>2011/01/25</td>
                        <td>$112,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="example4-tab2">
            <table id="example4-tab2-dt" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
 
                    <tr>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                        <td>Edinburgh</td>
                        <td>51</td>
                        <td>2008/11/13</td>
                        <td>$183,000</td>
                    </tr>
                    <tr>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>Singapore</td>
                        <td>29</td>
                        <td>2011/06/27</td>
                        <td>$183,000</td>
                    </tr>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>New York</td>
                        <td>27</td>
                        <td>2011/01/25</td>
                        <td>$112,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
 
 
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 
 
            <script type="text/javascript">
        $(document).ready(function(){
   $('#example4-tab1-dt, #example4-tab2-dt').DataTable({
      scrollX: true,
      fixedColumns: {
         leftColumns: 1
      }
   });
 
   $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
         .columns.adjust()
         .fixedColumns().relayout();
   });  
});    </script>
</body>
</html>