Ext.define('Dialog', {
    extend: 'Ext.data.Model',
    fields: [
        {name: 'id',         type: 'string'},
        {name: 'name',       type: 'string'},
        {name: 'dialog_br',       type: 'string'},
		{name: 'dialog_en',       type: 'string'},
		{name: 'username',   type: 'string'},
        {name: 'status',     type: 'string'},

//        {name: 'por',        type: 'string'},
        {name: 'last_updated', type: 'date', dateFormat: 'Y-m-d H:i:s'}
    ]
});

function statusIcon(val){
	if (val != undefined && val.trim() != "") {
		return "<div class=\"st st0" + val + "\">" + statusListMenu[val].text + "</div>";
	} else {
		return "<div class=\"st st01\">No text!</div>";
	}
}

function createSectionGrid(sectionId) {
    // create the Grid
    var grid = Ext.create('Ext.grid.Panel', {
		id: "grd" + sectionId,
        store: Ext.create('Ext.data.Store',{
            model: 'Dialog',
            proxy: {
                type: 'ajax',
                url: 'ajax/get_section.php?p=' + projectId + "&s=" + sectionId,
                reader: {
                    type: 'json'
                }
            },
            autoLoad: true
        }),
		width: '99.6%',
        stateful: true,
        stateId: 'stateGrid',
        columns: [{
            text     : 'Id',
            width    : 50,
            sortable : true,
            dataIndex: 'id'
        },{
            text     : 'Name',
            width    : 100,
            sortable : true,
            dataIndex: 'name'
        },{
            text     : 'Dialog BR',
            width    : 200,
            sortable : true,
            dataIndex: 'dialog_br',
			renderer:function(value, metaData, record, row, col, store, gridView){
				metaData.tdAttr= 'data-qtip="'+record.get('dialog_br')+'"';
				return value;
			}		
        },{
            text     : 'Dialog US',
            width    : 200,
            sortable : true,
			hidden   : true,			
            dataIndex: 'dialog_en',
			renderer:function(value, metaData, record, row, col, store, gridView){
				metaData.tdAttr= 'data-qtip="'+record.get('dialog_en')+'"';
				return value;
			}		
        },{		
            text     : 'User Name',
            width    : 100,
            sortable : true,
            dataIndex: 'username'
        },{
            text     : 'Status',
            width    : 150,
            sortable : true,
            renderer : statusIcon,
            dataIndex: 'status'
        },{
            text     : 'Last Updated',
            width    : 150,
            sortable : true,
            dataIndex: 'last_updated',
            renderer: Ext.util.Format.dateRenderer('d/m/Y H:i:s')
        }],
        viewConfig: {
            stripeRows: true,
            enableTextSelection: false,
			preserveScrollOnRefresh: true
        },
        listeners: {
            beforeitemclick: function(view, record, item, index, event) {
				if (Ext.getCmp("tabDialog" + record.get('id')) != undefined ) {
					Ext.getCmp("tabDialog" + record.get('id')).show();
					return;
				}
				
				//alert(record.get('id'));
				Ext.Ajax.request({
					url: 'ajax/get_dialog.php',
					method : 'GET',
//					headers: { 'Content-Type': 'application/json;charset=utf-8' },
//					headers: {"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"},						
					params: {
						id: record.get('id'),
						pid: projectId
					},
					success: function(response){
						//Ext.getCmp('HTML' + id + lang).update(response.responseText);
						//alert(response.responseText);
						var jsonData = Ext.JSON.decode(response.responseText);
						
						//Ext.getCmp("tab" + dialogSectionId).add(criarWindowDialogo(record.get('id'), record.get('id') + ": " + record.get('name'), jsonData));
						//criarWindowDialogo(record.get('id'), record.get('id') + ": " + record.get('name'), jsonData);
						// alert(response.responseText);

						Ext.getCmp("tabpanel").add({
							closable: true,
							id: "tabDialog" + record.get('id'),
							title: record.get('id') + ": " + record.get('name'),
							layout: {
								type:'hbox',
								padding:'1',
								align:'stretch'
							},
							defaults:{
								margins:'0 0 0 0'
							}
						}).show();
						
						Ext.getCmp("tabDialog" + record.get('id')).add(criarWindowDialogo(record.get('id'), record.get('id') + ": " + record.get('name'), jsonData));
						
					}
				});
				
                //criarWindowDialogo(record.get('id'), record.get('id') + ": " + record.get('name'));
            }
        }
    });
    return grid;
}