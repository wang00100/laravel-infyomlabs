'use strict';

const tableName = '#staffTable';
$(tableName).DataTable({
    scrollX: true,
    deferRender: true,
    scroller: true,
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: recordsURL,
    },
    columnDefs: [
        {
            'targets': [5],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
    ],
    columns: [
        {
            data: 'name',
            name: 'name'
        },{
            data: 'intro',
            name: 'intro'
        },{
            data: 'tags',
            name: 'tags'
        },{
            data: 'avatar',
            name: 'avatar'
        },{
            data: 'photos',
            name: 'photos'
        },
        {
            data: function (row) {
                let url = recordsURL + row.id;
                let data = [
                {
                    'id': row.id,
                    'url': url + '/edit',
                }];
                                
                return prepareTemplateRender('#staffTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    const recordId = $(event.currentTarget).data('id');
    deleteItem(recordsURL + recordId, tableName, 'Staff');
});
