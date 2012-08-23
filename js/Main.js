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
var user = {};
user.is_registered = false;

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

	// TABS
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
            },
			listeners:{
				beforeshow: function() {
					grid = Ext.getCmp("grd" + dialogSectionId);
					if (grid != undefined) {
						grid.store.load();
						grid.getView().refresh();
					}
				}
			}
        }).show();
        
        Ext.getCmp("tab" + dialogSectionId).add(createSectionGrid(dialogSectionId));
    }
	// TABS END
	
    // Main View
    Ext.create('Ext.Viewport', {
        layout: {
            type: 'border',
            padding: 5
        },
        defaults: {
            split: true
        },
        items: [{
			id:'west-container',
            region: 'west',
            collapsible: true,
            floatable: true,
            split: true,
            title: "Painel",
			autoScroll: true,
			title: "Project Sections",
			width: 250
		}, tabs]
    });
	
	wrc = Ext.getCmp('west-container');
	

	
	
	//************************* USERS
	Ext.define('UserModels', {
		extend: 'Ext.data.Model',
		fields: [
			{name : 'user_id', type: 'int'},
			{name : 'username', type : 'string'},
			{name : 'is_registered', type : 'boolean'}			
		],
		proxy: {
			type: 'rest',
			url : '/users',
			reader: {
				type: 'json',
				root: 'users'
			}
		}		
	});
	
	var userStore = Ext.create('Ext.data.Store', {
		id: 'userStore',
		model: 'UserModels',
		proxy: {
			simpleSortMode: true, 
			type: 'ajax',
			api: {
				read: 'ajax/forum_login.php' 
			},
			reader: {
				type: 'json',
				root: 'data',
				successProperty: 'is_registered'
			},
			extraParams: {
				parametro: 'param'
			},
			actionMethods: {
				read: 'POST'
			}
		},
		listeners: {
			 scope: this,
			 load: function(userStore, records){
				userStore.data.each(function(){
					if (this.data.is_registered) {
						var userInfoForm = Ext.create('Ext.form.Panel', {
							frame:true,
							title: "Informa&#231;&#245;es do usu&#225;rio",
							bodyStyle:'padding:5px 0px 0px',
							width: "100%",
							fieldDefaults: {
								msgTarget: 'side',
								labelWidth: 75
							},
							defaultType: 'textfield',
							defaults: {
								anchor: '100%'
							},
							items: [{
								anchor:'95%',
								xtype: 'displayfield',
								name: 'displayFieldMarkwrcategory',
								value: "Voc&#234; est&#225; logado como " + this.data.username
							}]
						});
						
						wrc.removeAll();	
						wrc.add(userInfoForm);
						wrc.add(categoryTree);
						
						user = this.data;
					} else {
						var userInfoForm = Ext.create('Ext.form.Panel', {
							frame:true,
							title: "Informa&#231;&#245;es do usu&#225;rio",
							bodyStyle:'padding:5px 0px 0px',
							width: "100%",
							fieldDefaults: {
								msgTarget: 'side',
								labelWidth: 75
							},
							defaultType: 'textfield',
							defaults: {
								anchor: '100%'
							},
							items: [{
								fieldLabel: "Usu&#225;rio",
								name: 'username',
								id: 'username',
								allowBlank:false
							},{
								fieldLabel: "Senha",
								name: 'password',
								id: 'userpassword',
								inputType: 'password',			
								allowBlank:false
							}],
							buttons: [{
								id: 'btnLogin',
								xtype: 'button',
								text: "Login",
								handler:function(){
									userInfoForm.getForm().submit({
										url:'ajax/forum_login.php?s=1',
										success: function(form, action) {
											
											var userInfoForm2 = Ext.create('Ext.form.Panel', {
												frame:true,
												title: "Informa&#231;&#245;es do usu&#225;rio",
												bodyStyle:'padding:5px 0px 0px',
												width: "100%",
												fieldDefaults: {
													msgTarget: 'side',
													labelWidth: 75
												},
												defaultType: 'textfield',
												defaults: {
													anchor: '100%'
												},
												items: [{
													anchor:'95%',
													xtype: 'displayfield',
													name: 'displayFieldMarkwrcategory',
													value: "Voc&#234; est&#225; logado como " + Ext.getCmp('username').value
												}]
											});											
											user = action.result;
											
											wrc.remove(userInfoForm, true);
											wrc.removeAll(false);	
											wrc.add(userInfoForm2);
											wrc.add(categoryTree);
											wrc.doLayout();	
										},
										failure: function(form, action) {
											Ext.MessageBox.show({
												   title: "Error",
												   msg: "Houve algum problema! Contate um admin!",
												   buttons: Ext.MessageBox.OK,
												   icon: Ext.MessageBox.ERROR
											});
										}
									});
								}
							}]

						});	
						wrc.removeAll();	
						wrc.add(userInfoForm);
						wrc.add(categoryTree);
						wrc.doLayout();
					};
				});
				
			} 
		}			
	});	

	//************************* END USERS
	    
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
        width: "100%",
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
		
	userStore.load();
	statusStore.load();
});