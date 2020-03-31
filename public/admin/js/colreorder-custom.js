$(document).ready(function() {
    $('#basic-col-reorder').DataTable({
        colReorder: true,
        oorder: [[ 0 , "desc" ]],
        pageLength: 0,
        lengthMenu: [20, 40, 60, 80, 90, 100],
    });



    $('#realtime-reorder').dataTable({
        colReorder: {
            realtime: true
        }
    });
    $('#saving-reorder').dataTable({
        colReorder: true,
        stateSave: true
    });

    $('#predefine-reorder').dataTable({
        colReorder: {
            order: [4, 3, 2, 1, 0, 5]
        }
    });
});
