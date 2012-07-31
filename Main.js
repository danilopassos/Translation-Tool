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
    //    'Ext.TaskManager.*',
    //    'Ext.ComponentQuery.*',
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
        //        items: [{
        //            title: 'Tab 1',
        //            iconCls: 'tabs',
        //            html: 'Tab Body<br/><br/>',
        //            closable: true
        //        }],
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

    //    while(index < 3) {
    //        addTab(index % 2);
    //    }
    
    function addWindowDialogo(arc, msbt, pos, onde){
        Ext.create('Ext.window.Window', {
            title: 'dialogo: ' + arc + '/'+ msbt + '/' + pos,

            //closeAction: 'hide',
            autoScroll:true,
            width: '80%',
            height: '95%',
            
            
            renderTo: onde,
            layout: {
                type:'vbox',
                padding:'2',
                align:'stretch'
            },
            defaults:{
                margins:'2 2 2 2'
            },
            
            items:[
            {
                xtype:'tabpanel',
                //                title : 'editar tradução',
                id: "tabOriginais" + msbt + pos,
                
                items:[
                {
                    xtype:'panel',
                    title : 'Informações',
                    flex:1,
                
                    minHeight: 100,
                    autoLoad:{
                        url : 'info.php?arc=' + arc + 
                        '&msbt=' + msbt + '&pos=' + pos
                    }
                },{
                    xtype:'panel',
                    title : 'editar tradução',
                    flex:1,
                
                    minHeight: 100,
                    autoLoad:{
                        url : 'editor.php?arc=' + arc + 
                        '&msbt=' + msbt + '&pos=' + pos + '&lang=en_US'
                    }
                }

                ]
                
            }
                
            ]
            
            ,
            
            listeners: {
                render: function(w, opt) {
                    //                        alert("render");
                    var langs = Array('pt_BR','en_US','es_US','fr_US','it_IT','de_DE' );

                    Ext.each(langs, function(lang, index, arraylangs){

                        var p = Ext.create('Ext.panel.Panel', {
                            title: '<img src=\"img/'+ lang + '.png\">' +  lang,
                            collapsible: true,                           
                                                        
                            layout: {
                                type:'hbox',
                                padding:'0',
                                align:'stretch'
                            },
                            items:[
                            {
                                xtype:'panel',
                                title : 'TAG',
                                width: '65%',
//                                flex:3,
                                autoLoad:{
                                    url : 'preview.php?arc=' + arc + 
                                    '&msbt=' + msbt + '&pos=' + pos +'&lang=' + lang + '&modo=tag'
                                }
                            },{
                                xtype:'panel',
                                title : 'HTML',
//                                flex:3,
                                
                                width: '35%',
                                autoLoad:{
                                    url : 'preview.php?arc=' + arc + 
                                    '&msbt=' + msbt + '&pos=' + pos + '&lang=' + lang
                                }
                            }
                            ]
                    
                        });

                        w.add(p);
                            
                    });
                }
            }

        }).show();
             
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
                //title : 'lista de dialogos',
                
                store: Ext.create('Ext.data.TreeStore', {
                    proxy: {
                        type: 'ajax',
                        url: 'get.php?quero=pos&msbt=' + msbt
                    }
                }),

                width: 80,
                
                useArrows:true,
                autoScroll:true,
                animate:false,
                containerScroll: true,
                rootVisible: false,		
                floatable: false,
                split: true,
                listeners: {
                    itemclick: function(view, record, item, index, event) {
                        var pos = record.get('id');
                        var onde = Ext.get('p' + msbt);
                        addWindowDialogo(arc, msbt, pos, onde);
                    }
                }
            },
                
            {
                xtype:'panel',
                id: "p" + msbt,
                flex:1
                                
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
