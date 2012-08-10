function gup(name) {
	name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp( regexS );
	var results = regex.exec( window.location.href );
	if (results == null) {
		return "";
	} else {
		return results[1];
	}
}

var projectId = gup("p");
var statusListMenu = [];
// tab generation code
var tabIdx = 0;

Ext.Loader.setConfig({
    enabled:true
});
	
//Ext.require(['*'])
Ext.require([
    'Ext.Viewport.*',
    'Ext.data.*',
    'Ext.form.*',
    'Ext.tree.Panel.*',
    'Ext.data.Model.*',
    'Ext.menu.Menu.*',
    'Ext.tab.Tab.*',
    'Ext.MessageBox*',
    'Ext.TaskManager.*',
    'Ext.ComponentQuery.*',
    'Ext.tab.*',
    'Ext.ux.TabCloseMenu',
	'Ext.JSON.decode'
]);


Ext.onReady(function() {
    var currentItem;

    var tabs = Ext.widget('tabpanel', {
		id: 'tabpanel',
        region: 'center',
        resizeTabs: true,
        enableTabScroll: true,
        width: 600,
        height: 250,
        defaults: {
            autoScroll: true,
            bodyPadding: 0
        },
        plugins: Ext.create('Ext.ux.TabCloseMenu', {
            extraItemsTail: [
            '-',
            {
                text: 'Closable',
                checked: true,
                hideOnClick: true,
                handler: function (item) {
                    currentItem.tab.setClosable(item.checked);
                }
            },
            '-',
            {
                text: 'Enabled',
                checked: true,
                hideOnClick: true,
                handler: function(item) {
                    currentItem.tab.setDisabled(!item.checked);
                }
            }
            ],
            listeners: {
                aftermenu: function () {
                    currentItem = null;
                },
                beforemenu: function (menu, item) {
                    menu.child('[text="Closable"]').setChecked(item.closable);
                    menu.child('[text="Enabled"]').setChecked(!item.tab.isDisabled());

                    currentItem = item;
                }
            }
        })
    });


    
    function addDialogSectionTab(dialogSectionId, dialogSectionTitle){
        ++tabIdx;
        tabs.add({
            closable: true,
            id: "tab" + dialogSectionId,
            title: dialogSectionTitle,
            layout: {
                type:'hbox',
                padding:'1',
                align:'stretch'
            },
            defaults:{
                margins:'0 0 0 0'
            }
        }).show();
        
        Ext.getCmp("tab" + dialogSectionId).add(createSectionGrid(dialogSectionId));
    }
    
    //*****************************************************************//
    // TREE VIEW
    //*****************************************************************//
    var treeStore = Ext.create('Ext.data.TreeStore', {
        proxy: {
            type: 'ajax',
            url: 'ajax/get_project_tree.php?p=' + projectId
        }
    });

    categoryTree = Ext.create('Ext.tree.Panel', {
        id: 'category-tree-panel',
        store: treeStore,
        title: "Project Sections",
        width: 200,
        useArrows:true,
        autoScroll:true,
        animate:true,
        containerScroll: true,
        rootVisible: false,		
        region: 'west',
        collapsible: true,
        floatable: true,
        split: true,
        listeners: {
            itemclick: function(view, record, item, tabIdx, event) {
                
                if (record.isLeaf()) {
                    if(Ext.getCmp("tab" + record.get('id')) == undefined ){
                        addDialogSectionTab(record.get('id'), record.get('text'));
                    }else{
                        Ext.getCmp("tab" + record.get('id')).show();
                    }
                }else{
                    if(record.isExpanded()){
                        record.collapse();
                    }else{
                        record.expand();
                    }
                }
                
            }
        }
    });
    //*****************************************************************//
    // TREE VIEW END
    //*****************************************************************//
	
    //*****************************************************************//
    // STATUS BEGIN
	//  @TODO : Isso deveria vir pelo banco no join do dialogo... fazendo por aqui por enquanto
    //*****************************************************************//
	Ext.define('StatusModel', {
		extend: 'Ext.data.Model',
		fields: [
			{name : 'id', type: 'int'},
			{name : 'name', type : 'string'}
		]		
	});

	var statusStore = Ext.create('Ext.data.Store', {
		id: 'statusStore',
		model: 'StatusModel',
		proxy: {
			simpleSortMode: true, 
			type: 'ajax',
			api: {
				read: 'ajax/get_status_list.php'
			},
			reader: {
				type: 'json',
				root: 'data',
				successProperty: 'success'
			},
			extraParams: {
				parametro: 'param'
			},
			actionMethods: {
				//opcional
				read: 'POST'
			}
		},
		listeners: {
			 scope: this,
			 load: function(statusStore, records){
				statusStore.data.each(function(){					
					statusListMenu[this.data.id] = { // ExtJS 4.0.7 -> [{
						text: this.data.name,
						scale: 'small',
						width: 130,			
						value: this.data.id
					}; // ExtJS 4.0.7 -> }];					
				});
			}
		}			
	});
    //*****************************************************************//
    // STATUS END
    //*****************************************************************//
	
	
    // Main View
    Ext.create('Ext.Viewport', {
        layout: {
            type: 'border',
            padding: 5
        },
        defaults: {
            split: true
        },
        items: [tabs,categoryTree]
    });
	
	statusStore.load();
});