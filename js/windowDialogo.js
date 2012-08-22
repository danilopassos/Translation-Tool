/*function editar(id, onde){
    var lang = "pt_BR";
	
    var action = Ext.create('Ext.Action', {
        text: 'Action 1',
        iconCls: 'icon-add',
        handler: function(){
            Ext.example.msg('Click', 'You clicked on "Action 1".');
        }
    });
	
    function onItemClick(item){
        alert('You clicked save.');
    }	
	
    function onItemToggle(item, pressed){
        Ext.getCmp('source' + id).getEl().toggle();
		Ext.getCmp('preview' + id).getEl().toggle();
    }
    
    var form = Ext.create('Ext.form.Panel', {
        plain: true,
        border: 0,
        bodyPadding: 0,

        fieldDefaults: {
            labelWidth: 55,
            anchor: '100%'
        },
        dockedItems: {
            itemId: 'toolbar',
            xtype: 'toolbar',
            items: [{
						text: 'Save',
						handler: onItemClick
					}, '-', {
						text: 'HTML Mode',
						enableToggle: true,
						toggleHandler: onItemToggle,
						pressed: false
					}, '-', {
						text: 'Mark Status',
						menu: {
							xtype: 'menu',
							plain: true,
							items: {
								xtype: 'buttongroup',
								columns: 1,
								defaults: {
									xtype: 'button',
									scale: 'large',
									iconAlign: 'left'
								},
								items: statusListMenu
							}
						}
					}
            ]
        },	
        layout: {
            type: 'hbox',
            align: 'stretch',  // Child items are stretched to full width            
            padding:'0'         
        },
        items: [{
					xtype: 'panel',
					flex: 1,  // Take up all *remaining* vertical space
					width: '100%',
					layout:'fit',
					id: 'source' + id,
					items: [{
						xtype: 'textarea',
						id : 'editorTA' + id,
						fieldLabel: 'Dialogo modo TAG',
						
						hideLabel: true,
					
						style: 'margin:0', // Remove default margin
						flex: 1,  // Take up all *remaining* vertical space

						title: 'TAG',
						listeners: {
							render : function( este, eOpts ){
								Ext.Ajax.request({
										
									url: 'preview.php',
									method : 'GET',
									params: {
										id : id,
										lang : lang,
										modo: 'tag',
										nopre: ''
									},
									success: function(response){
										este.setValue(response.responseText);
									}
											
								});
							}
						}
					}]
				},{
					xtype: 'panel',
					id: 'preview' + id,
					width: '100%',
					layout:'fit',
					flex: 1  // Take up all *remaining* vertical space					
				}]
    });

    var painelEditor = Ext.create('Ext.panel.Panel', {
        title: '<img src=\"img/'+ lang + '.png\">&nbsp;' +  lang ,
        layout: 'fit',
        items: form,
    });

    onde.add(painelEditor);
}*/
    
function criarWindowDialogo(id, name, dialogs) {
    function onItemClick(item){
        alert('You clicked save.');
    }
	
	

    var pan = Ext.create('Ext.panel.Panel', {
        title: 'Dialogo ' + name,
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
                //editar(id, w);
                /*		
				var updateStatus = function(dialogLangId, statusId) {
					Ext.Ajax.request({
						url: 'ajax/get_dialog.php',
						method : 'POST',
						params: {
							dlid: dialogLangId,
							sid: statusId
						},
						success: function(response){
							alert(1);
						},
						failure: function(response){
							alert(2);
						}
					}
				};
				*/

				
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

                        id: 'Panel' + dialog.id + dialog.lang_name,
                            
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
                            disabled: (dialog.status >= 4)
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
                                hidden: (dialog.status >= 4),
                                handler: function(item) {
                                    Ext.Ajax.request({
                                        url: 'ajax/update_text.php',
                                        method : 'POST',
                                        params: {
                                            dlid: dialog.id,
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
                                hidden: (dialog.status >= 4),
                                menu: {
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
                        }/*,
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
                                            sid: item.value
                                        },
                                        success: function(response){
                                            alert(1);
                                        },
                                        failure: function(response){
                                            alert(2);
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
        //			Ext.getCmp('Panel' + dialog.id + dialog.lang_name).getEl().toggle();			
        }
    });
	
    return pan;
}
   
