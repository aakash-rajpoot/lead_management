$(document).ready(function() {
    $('#dt-all-checkbox').dataTable({
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox select-checkbox-all',
            targets: 0
        }],
        Select: {
            style: 'multi',
            selector: 'td:first-child'
        }
    });
});