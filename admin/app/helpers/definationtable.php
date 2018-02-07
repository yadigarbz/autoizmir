<script>
var DatatableDataLocalDemo = function () {
    //== Private functions

    // demo initializer
    var demo = function () {

        var dataJSONArray = <?php echo json_encode($data) ?>;

        var datatable = $('.m_datatable').mDatatable({
			// datasource definition
			data: {
            type: 'local',
				source: dataJSONArray,
				pageSize: 10
			},

			// layout definition
			layout: {
            theme: 'default', // datatable theme
				class: '', // custom wrapper class
				scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
				// height: 450, // datatable's body's fixed height
				footer: false // display/hide footer
			},

			// column sorting
			sortable: true,

			pagination: true,

			search: {
            input: $('#generalSearch')
			},

			// inline and bactch editing(cooming soon)
			// editable: false,

			// columns definition
			columns: <?php echo $columns ?>
		});

		var query = datatable.getDataSourceQuery();

		$('#m_form_status').on('change', function () {
            datatable.search($(this).val(), 'type');
        }).val(typeof query.type !== 'undefined' ? query.type : '');

		$('#m_form_type').on('change', function () {
            datatable.search($(this).val(), 'Type');
        }).val(typeof query.Type !== 'undefined' ? query.Type : '');

		$('#m_form_status, #m_form_type').selectpicker();

	};

    return {
        //== Public functions
        init: function () {
            // init dmeo
            demo();
        }
    };
}();

jQuery(document).ready(function () {
    DatatableDataLocalDemo.init();
});
</script>