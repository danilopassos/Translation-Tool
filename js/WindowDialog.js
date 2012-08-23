function criarWindowDialogo(id, name, dialogs) {
    function onItemClick(item){
        alert('You clicked save.');
    }

    var pan = Ext.create('Ext.panel.Panel', {
        title: 'dialog ' + name,
        autoScroll:true,
        maximizable: true,
        width: '100%',
        //width: 700,
        //height: '90%',
        layout: {
            type:'vbox',
            padding:'2',
            align:'stretch'
        },
        defaults:{
            margins:'2 2 2 2'
        },
            
        items:[],
        listeners: {
            render: function(w, opt) {
                Ext.each(dialogs, function(dialog){
                    var action = Ext.create('Ext.Action', {
                        text: 'Action 1',
                        iconCls: 'icon-add',
                        handler: function(){
                            Ext.example.msg('Click', 'You clicked on "Action 1".');
                        }
                    });
					
                    var p = Ext.create('Ext.panel.Panel', {
                        title: '<img src=\"img/'+ dialog.lang_name + '.png\">&nbsp;' +  dialog.lang_name + " (" + dialog.version + ") - Current Status: " + dialog.status_name,

                        id: 'panel' + dialog.id + dialog.lang_name,
                            
                        collapsible: true,                           
                        collapsed: true,
                                
                        layout: {
                            type:'hbox',
                            padding:'0',
                            align:'stretch'
                        },
                        items:[{
                            xtype:'textarea',
                            id: 'source' + dialog.id + dialog.lang_name,
                            width: '100%',
                            value: dialog.dialog,
                            height: '50px',
                            disabled: (dialog.status >= 4 || user.is_registered == 0)
                        },{
                            xtype:'textarea',
                            id : 'preview' + dialog.id + dialog.lang_name,                                
                            width: '100%',
                            hidden: true,
                            value: dialog.dialog,
                            height: '50px',
                            disabled: true
                        }
                        ],
                        dockedItems: {
                            itemId: 'tb' + dialog.id + dialog.lang_name,
                            xtype: 'toolbar',
                            items: [{
                                id: 'saveBtn' + dialog.id + dialog.lang_name,
                                text: 'Save',
                                hidden: (dialog.status >= 4 || user.is_registered == 0),
                                handler: function(item) {
                                    Ext.Ajax.request({
                                        url: 'ajax/update_text.php',
                                        method : 'POST',
                                        params: {
                                            dlid: dialog.id,
											uid: user.user_id,
                                            txt: Ext.getCmp('source' + dialog.id + dialog.lang_name).value
                                        },
                                        success: function(response) {
                                            Ext.MessageBox.show({
                                                title: "Success",
                                                msg: "Updated",
                                                buttons: Ext.MessageBox.OK,
                                                icon: Ext.MessageBox.INFO
                                            });
                                        },
                                        failure: function(response) {
                                            Ext.MessageBox.show({
                                                title: "Error",
                                                msg: "Problemas no envio",
                                                buttons: Ext.MessageBox.OK,
                                                icon: Ext.MessageBox.ERROR
                                            });
                                        }
                                    })
                                }
                            }, '-', {
                                text: 'HTML View',
                                enableToggle: true,
                                toggleHandler: function (btn, pressed) {
                                    Ext.getCmp('source' + dialog.id + dialog.lang_name).getEl().toggle();
                                    Ext.getCmp('preview' + dialog.id + dialog.lang_name).getEl().toggle();
                                },
                                pressed: false,
                            }, '-', {
                                text: 'Mark Status',
                                hidden: (dialog.status >= 4 || user.is_registered == 0),
                                menu: {
									id: 'dialogMenu' + dialog.id + dialog.lang_name,
                                    xtype: 'menu',
                                    plain: true,
                                    items: {
                                        xtype: 'buttongroup',
                                        id: 'btngrp' + dialog.id + dialog.lang_name,
                                        columns: 1,
                                        defaults: {
                                            xtype: 'button',
                                            scale: 'large',
                                            iconAlign: 'left'
                                        },
												
                                    }
                                }									
                            }
                            ]
                        },
						scope: this,
						listeners: {
							afterrender : function(p) {
								p.header.on('click', function(e, h) {
									p.toggleCollapse();
								}, p, {
									stopEvent: true
								});
							},
						}
						/*,
                        listeners: {
							beforeexpand: function( p, animates, Opts ){
                                Ext.Ajax.request({
                                    url: 'preview.php',
                                    method : 'GET',
                                    params: {
                                        id:   id,
                                        lang: dialog.lang_name,
                                        modo: 'tag'
                                    },
                                
                                    success: function(response){
                                        Ext.getCmp('source' + dialog.id + dialog.lang_name).update(response.responseText);
                                    }

                                });
                                Ext.Ajax.request({
                                    url: 'preview.php',
                                    method : 'GET',
                                    params: {
                                        id: id,
                                        lang: dialog.lang_name
                                    },
                                    success: function(response){
                                        //Ext.getCmp('preview' + dialog.id + dialog.lang_name).update(response.responseText);
                                    }

                                });
                            }

                        }  */             
                    });
					
                    Ext.each(statusListMenu, function(st) {
                        if (st != undefined) {
                            Ext.getCmp('btngrp' + dialog.id + dialog.lang_name).add(
                            {
                                text: st.text,
                                scale: 'small',
                                width: 130,			
                                value: st.value,
                                handler: function(item) {
                                    Ext.Ajax.request({
                                        url: 'ajax/update_status.php',
                                        method : 'POST',
                                        params: {
                                            dlid: dialog.id,
                                            sid: item.value,
											uid: user.user_id
                                        },
                                        success: function(response){
											Ext.getCmp('panel' + dialog.id + dialog.lang_name).setTitle('<img src=\"img/'+ dialog.lang_name + '.png\">&nbsp;' +  dialog.lang_name + " (" + dialog.version + ") - Current Status: " + st.text);
											Ext.getCmp('dialogMenu' + dialog.id + dialog.lang_name).hide( );
                                            Ext.MessageBox.show({
                                                title: "Success",
                                                msg: "Updated",
                                                buttons: Ext.MessageBox.OK,
                                                icon: Ext.MessageBox.INFO
                                            });
                                        },
                                        failure: function(response){
                                            Ext.MessageBox.show({
                                                title: "Error",
                                                msg: "Problemas no envio",
                                                buttons: Ext.MessageBox.OK,
                                                icon: Ext.MessageBox.ERROR
                                            });
                                        }
                                    });
                                }
                            }
                            );
                        }
                    });

                    w.add(p);
                            
                });
   
            }
        }
    }).show();
	
    Ext.each(dialogs, function(dialog) {
        if (dialog.status != 6 || dialog.lang == 1) {
        //			Ext.getCmp('panel' + dialog.id + dialog.lang_name).getEl().toggle();			
        }
    });
	
    return pan;
}
   
