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
    'Ext.ux.TabCloseMenu'
    ]);


Ext.onReady(function() {
    ////////////////

    var currentItem;

    var tabs = Ext.widget('tabpanel', {
        region: 'center',
        resizeTabs: true,
        enableTabScroll: true,
        width: 600,
        height: 250,
        defaults: {
            autoScroll: true,
            bodyPadding: 0
        },
        items: [{
            title: 'Tab 1',
            iconCls: 'tabs',
            html: 'Tab Body<br/><br/>',
            closable: true
        }],
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

    // tab generation code
    var index = 0;

    while(index < 3) {
        addTab(index % 2);
    }
    
    function addTabDialogos(arc,msbt){
        ++index;
        tabs.add({
            closable: true,
            //            html: 'Tab Body ' + index + '<br/><br/>',

            title: msbt,
            
            layout: {
                type:'hbox',
                padding:'1',
                align:'stretch'
            },
            defaults:{
                margins:'0 0 0 0'
            },
            items:[
            {
                xtype:'treepanel',
                title : 'lista de dialogos',
                
                store: Ext.create('Ext.data.TreeStore', {
                    proxy: {
                        type: 'ajax',
                        url: 'get.php?quero=pos&msbt='+msbt

                    }
                }),

                width: 100,
                
                useArrows:true,
                autoScroll:true,
                animate:false,
                containerScroll: true,
                rootVisible: false,		
                floatable: false,
                split: true,
                listeners: {
                    itemclick: function(view, record, item, index, event) {





Ext.create('Ext.window.Window', {
                        title: 'Layout Window',

                        closeAction: 'hide',
                        width: 600,
                        minWidth: 350,
                        height: 350,
                        renderTo: Ext.get('p' + msbt),
                        layout: {
                            type:'vbox',
                            padding:'5',
                            align:'stretch'
                        },
                        defaults:{margins:'0 0 5 0'},
                        items:[
                            {
                                xtype:'panel',
                                title : 'Editor',
                                flex:1,
                                autoLoad:{
                                    url : 'preview.php?arc=' + arc + 
                                        '&msbt=' + msbt + '&pos=' + record.get('id') +'&modo=tag'
                                }
                            },{
                                xtype:'panel',
                                title : 'Preview',
                                flex:1,
                                
                                autoLoad:{
                                    url : 'preview.php?arc=' + arc + 
                                        '&msbt=' + msbt + '&pos=' + record.get('id')
                                }
                            }
                        ]


                    }).show();







                    }
                }
            },
                
            {
                xtype:'panel',
                title : 'Preview',
                id: "p" + msbt,
                flex:1,
                                
            }
            ]
            

        }).show();
            

    }
    
    function addTab (closable) {
        ++index;
        tabs.add({
            closable: !!closable,
            html: 'Tab Body ' + index + '<br/><br/>',
            iconCls: 'tabs',
            title: "tab" + index
        }).show();

    }
    /////////////
	
	
    //*****************************************************************//
    // TREE VIEW
    //*****************************************************************//
    var treeStore = Ext.create('Ext.data.TreeStore', {
        proxy: {
            type: 'ajax',
            url: 'get.php'
        //url: 'ajax/get_file_tree[exemplo].js'
        }
    });

    categoryTree = Ext.create('Ext.tree.Panel', {
        id: 'category-tree-panel',
        store: treeStore,
        title: "Arquivos",
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
            itemclick: function(view, record, item, index, event) {
                
                if (record.isLeaf()) {
                    addTabDialogos(record.get('parentId'),record.get('id'));
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
});
