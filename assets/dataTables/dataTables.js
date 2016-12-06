$(function() {
	$('.dataTable').each(function(){
		var _datatable = $(this);
		var oTable = _datatable.dataTable({
			'sPaginationType': 'full_numbers',
			'oLanguage': {
				'sZeroRecords': _datatable.first().data('zero_records'),
				'sInfo': _datatable.first().data('s_info'),
				'sSearch': '',
				'sInfoEmpty': _datatable.first().data('s_info_empty'),
				'sInfoFiltered': _datatable.first().data('s_info_filtered'),
				'oPaginate': {
					'sFirst': _datatable.first().data('s_first'),
					'sPrevious': _datatable.first().data('s_previous'),
					'sNext': _datatable.first().data('s_next'),
					'sLast': _datatable.first().data('s_last')
				}
			},
			'bRetrieve': true,
			responsive: true,
			"autoWidth": false,
			"iDisplayLength": 15
		});
		_datatable.data('oTable', oTable);
		_datatable.find('.dataTables_filter input').prop('placeholder', _datatable.first().data('search') + '...');
	});

	$('.dataTables_length').css('display','none');
});