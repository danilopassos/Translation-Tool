function criarWindowDialogo(id, name, dialogs) {
	this.wdwDlgId = id;
    var pan = Ext.create('Ext.panel.Panel', {
        //title: 'dialog ' + name,
		//id: 'wndDlg' + id,
        autoScroll:true,
		border: false,
        //maximizable: true,
        width: 'auto',
        //width: 700,
        //height: '90%',
        layout: {
            type:'hbox',
            //padding:'2',
            align:'stretch'
        },
        defaults:{
            margins:'2 2 2 2'
        },
            
        items:[],
        listeners: {
            render: function(w, opt) {
                Ext.each(dialogs, function(dialog){
                    /*var action = Ext.create('Ext.Action', {
                        text: 'Action 1',
                        iconCls: 'icon-add',
                        handler: function(){
                            Ext.example.msg('Click', 'You clicked on "Action 1".');
                        }
                    });*/
					
					var collapsed = dialog.lang_name != "pt_BR" || dialog.status == 6;
					var userPermission = (user.is_registered == 0 || user.permission == 0 || (user.permission <= 5 && dialog.status >= 4) || (user.permission == 10 && dialog.status >= 6));
					
                    var p = Ext.create('Ext.panel.Panel', {
                        title: dialog.lang_name + " (" + dialog.version + ") - Status: " + dialog.status_name,

                        id: 'panel' + dialog.id + dialog.lang_name,
						icon: "img/" + dialog.lang_name + ".png",
                        collapseDirection: 'left',
                        collapsible: collapsed,
                        collapsed: (collapsed && dialog.lang_name != "en_US" && dialog.lang_name != "ja_JP" ? true : false),
						titleCollapse: collapsed,
                        layout: {
                            type:'hbox',
                            padding:'0',
                            align:'stretch'
                        },
                        items:[{
                            xtype:'textarea',
                            id: 'source' + dialog.id + dialog.lang_name,
                            width: '300px',
                            value: dialog.dialog,
                            disabled: userPermission
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
								text: 'Login to view options',
								hidden: (user.is_registered != 0 || dialog.status >= 6)
							}, {
                                id: 'saveBtn' + dialog.id + dialog.lang_name,
                                text: 'Save',
                                hidden: userPermission,
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
                            }, {
                                text: 'Save to Review',
                                id: 'saveRevBtn' + dialog.id + dialog.lang_name,
                                hidden: userPermission,
                                handler: function(item) {
                                    Ext.Ajax.request({
                                        url: 'ajax/update_text.php',
                                        method : 'POST',
                                        params: {
                                            dlid: dialog.id,
											uid: user.user_id,
                                            txt: Ext.getCmp('source' + dialog.id + dialog.lang_name).value,
											rev: true
                                        },
                                        success: function(response) {
											Ext.getCmp('panel' + dialog.id + dialog.lang_name).setTitle('<img src=\"img/'+ dialog.lang_name + '.png\">&nbsp;' +  dialog.lang_name + " (" + dialog.version + ") - Status: Waiting for Review");
/*                                            Ext.MessageBox.show({
                                                title: "Success",
                                                msg: "Updated",
                                                buttons: Ext.MessageBox.OK,
                                                icon: Ext.MessageBox.INFO
                                            });
*/
											Ext.MessageBox.confirm('Confirm', 'Dialog was updated!<br><br>Do you want to close it?', 
												function(btn) {
													if (btn == 'yes') {
														Ext.getCmp('tabDialog' + this.wdwDlgId).close();
													}
													//Ext.example.msg('Button Click', 'You clicked the {0} button', btn);
												}
											);
											
											
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
                            }/*, '-', {
                                text: 'HTML View',
                                enableToggle: true,
                                toggleHandler: function (btn, pressed) {
                                    Ext.getCmp('source' + dialog.id + dialog.lang_name).getEl().toggle();
                                    Ext.getCmp('preview' + dialog.id + dialog.lang_name).getEl().toggle();
                                },
                                pressed: false,
                            }*/, {
                                text: 'Mark Status',
                                hidden: userPermission,
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
                            }, {
								text: 'This dialog can\'t be edit',
								hidden: (dialog.status < 4)
							}]
                        },
						scope: this,
/*						listeners: {
							afterrender : function(p) {
								if (dialog.lang_name != "pt_BR") {
									p.header.on('click', function(e, h) {
										p.toggleCollapse();
									}, p, {
										stopEvent: true
									});
								}
							},
						},
*/
/*												
						listeners: {
							collpase : function( p, animates, Opts ) {
								alert(1);
								p.header.on('click', function(e, h) {
									alert(3);
									p.toggleCollapse();
								}, p, {
									stopEvent: true
								});
								alert(2);
							}							
						}
*/						
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
                        if (st != undefined && !st.disabled) {
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
											Ext.getCmp('panel' + dialog.id + dialog.lang_name).setTitle('<img src=\"img/'+ dialog.lang_name + '.png\">&nbsp;' +  dialog.lang_name + " (" + dialog.version + ") - Status: " + st.text);
											Ext.getCmp('dialogMenu' + dialog.id + dialog.lang_name).hide( );
											if (item.value >= 4) { 
												Ext.getCmp('source' + dialog.id + dialog.lang_name).disable();
											} else {
												Ext.getCmp('source' + dialog.id + dialog.lang_name).enable();
											}
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
   
