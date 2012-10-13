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
user.is_registered = 0;
user.permission = 0;

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
    Ext.QuickTips.init();

    //*****************************************************************//
    // TOOLBOX BEGIN
    //*****************************************************************//
	Ext.define('ToolBoxModel', {
		extend: 'Ext.data.Model',
		fields: [
			{name : 'toolbox_id', type: 'int'},
			{name : 'toolbox_name', type : 'string'}
		]		
	});

	var toolBoxStore = Ext.create('Ext.data.Store', {
		id: 'toolboxStore',
		model: 'ToolBoxModel',
		proxy: {
			simpleSortMode: true, 
			type: 'ajax',
			api: {
				read: 'ajax/get_toolbox_list.php'
			},
			reader: {
				type: 'json',
				root: 'data',
				successProperty: 'success'
			},
			extraParams: {
				pId: projectId
			},
			actionMethods: {
				read: 'POST'
			}
		},
		listeners: {
			 scope: this,
			 load: function(toolBoxStore, records){
				toolBoxStore.data.each(function() {
					accordion.add(Ext.create('Ext.grid.Panel', {
						id: "toolBox" + this.data.toolbox_id,
						columnLines: true,
						collapsed: true,
						//hideCollapseTool: true,
						store: Ext.create('Ext.data.Store',{
							model: 'ToolBoxModels',
							proxy: {
								type: 'ajax',
								url: 'ajax/toolbox.php?pId=' + projectId + '&tId=' + this.data.toolbox_id,
								reader: {
									type: 'json'
								}
							},
							autoLoad: true
						}),
						title: this.data.toolbox_name,		
						columns: [{
							text     : 'English',
							sortable : true,
							dataIndex: 'english',
							renderer:function(value, metaData, record, row, col, store, gridView){
								metaData.tdAttr= 'data-qtip="'+record.get('english')+'"';
								return value;
							}
						},{
							text     : 'Portuguese',
							sortable : true,
							dataIndex: 'portuguese',
							renderer:function(value, metaData, record, row, col, store, gridView){
								metaData.tdAttr= 'data-qtip="'+record.get('portuguese')+'"';
								return value;
							}							
						},{		
							text     : 'Japanese',
							sortable : true,
							dataIndex: 'japanese',
							renderer:function(value, metaData, record, row, col, store, gridView){
								metaData.tdAttr= 'data-qtip="'+record.get('japanese')+'"';
								return value;
							}									
						},{
							text     : 'Spanish',
							sortable : true,
							dataIndex: 'spanish',
							renderer:function(value, metaData, record, row, col, store, gridView){
								metaData.tdAttr= 'data-qtip="'+record.get('spanish')+'"';
								return value;
							}										
						},{
							text     : 'Italian',
							sortable : true,
							dataIndex: 'italian',
							renderer:function(value, metaData, record, row, col, store, gridView){
								metaData.tdAttr= 'data-qtip="'+record.get('italian')+'"';
								return value;
							}								
						},{
							text     : 'Deutch',
							sortable : true,
							dataIndex: 'deutch',
							renderer:function(value, metaData, record, row, col, store, gridView){
								metaData.tdAttr= 'data-qtip="'+record.get('deutch')+'"';
								return value;
							}
						},{
							text     : 'French',
							sortable : true,
							dataIndex: 'french',
							renderer:function(value, metaData, record, row, col, store, gridView){
								metaData.tdAttr= 'data-qtip="'+record.get('french')+'"';
								return value;
							}							
						}],
						viewConfig: {
							stripeRows: true,
							enableTextSelection: true,
							shrinkWrap : true
						}					
					}));
				});
			}
		}			
	});
    //*****************************************************************//
    // TOOLBOX END
    //*****************************************************************//

	
	
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
						grid.getView().select(0);
					}					
				}
			}
        }).show();
        
        Ext.getCmp("tab" + dialogSectionId).add(createSectionGrid(dialogSectionId));
    }
	// TABS END
	
	// Accordion
	Ext.define('ToolBoxModels', {
		extend: 'Ext.data.Model',
		fields: [
		   {name: 'english', type: 'string'},
		   {name: 'portuguese', type: 'string'},
		   {name: 'japanese', type: 'string'},
		   {name: 'spanish', type: 'string'},
		   {name: 'italian', type: 'string'},
		   {name: 'deutch', type: 'string'},
		   {name: 'french', type: 'string'}
		]
	});
	
	var accordion = Ext.create('Ext.Panel', {
		title: 'Tables',
		collapsible: true,
		region:'east',
		split:true,
		width: 350,
		layout:'accordion'
	});	
	// Accordion
		
	
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
		}, tabs, accordion]
    });
	
	wrc = Ext.getCmp('west-container');

	

	
	
	//************************* USERS
	Ext.define('UserModels', {
		extend: 'Ext.data.Model',
		fields: [
			{name : 'user_id', type: 'int'},
			{name : 'username', type : 'string'},
			{name : 'is_registered', type : 'boolean'},
			{name : 'permission', type : 'int'}
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

						Ext.each(statusListMenu, function(st) {
							if (st != undefined) {
								st.disabled = (user.is_registered == 0 || (user.permission <= 5 && st.value >= 4) || (user.permission == 10 && st.value >= 6));
							}
						});
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

											Ext.each(statusListMenu, function(st) {
												if (st != undefined) {
													st.disabled = (user.is_registered == 0 || (user.permission <= 5 && st.value >= 4) || (user.permission == 10 && st.value >= 6));
												}
											});
											
											
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
						value: this.data.id,
						disabled: (user.is_registered == 0 || (user.permission <= 5 && this.data.id >= 4) || (user.permission == 10 && this.data.id >= 6))
					}; // ExtJS 4.0.7 -> }];					
				});
			}
		}			
	});
    //*****************************************************************//
    // STATUS END
    //*****************************************************************//
	
    //*****************************************************************//
    // STATUS BEGIN
	//  @TODO : Isso deveria vir pelo banco no join do dialogo... fazendo por aqui por enquanto
    //*****************************************************************//
	Ext.define('HistoryModel', {
		extend: 'Ext.data.Model',
		fields: [
			{name : 'dialog_id', type: 'int'},
			{name : 'dialog_name', type: 'string'},
			{name : 'user_id', type : 'string'},
			{name : 'username', type : 'string'},
			{name : 'changed', type : 'string'},
			{name : 'last_updated', type : 'string'},
			{name : 'dialog_status_name', type : 'string'}
			
		]		
	});

	var historyStore = Ext.create('Ext.data.Store', {
		id: 'historyStore',
		model: 'HistoryModel',
		proxy: {
			simpleSortMode: true, 
			type: 'ajax',
			api: {
				read: 'ajax/get_hist.php'
			},
			reader: {
				type: 'json',
				root: 'data',
				successProperty: 'success'
			},
			extraParams: {
				pId: projectId
			},
			actionMethods: {
				//opcional
				read: 'POST'
			}
		},
		listeners: {
			 beforeshow: function() {
			 },
			 load: function(historyStore, records){		
				if (Ext.getCmp("tabHist") == undefined) {
					++tabIdx;
					tabs.add({
						closable: false,
						id: "tabHist",
						title: "Atualiza&#231;&#245;es do Projeto",
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
								historyStore.load();
							}
						}
					}).show();
				}
				
				var str = "";
				historyStore.data.each(function(){					
					if (this.data.changed == 'D') {
						str = str + "<div> " + this.data.dialog_id + ": " + this.data.dialog_name + " had its text changed by " + this.data.username + " on " + this.data.last_updated + "</div><BR>";
					} else if (this.data.changed == 'S') {
						str = str + "<div> " + this.data.dialog_id + ": " + this.data.dialog_name + " had its status changed to " + this.data.dialog_status_name + " by " + this.data.username + " on " + this.data.last_updated + "</div><BR>";
					} else {
						str = str + "<div> " + this.data.dialog_id + ": " + this.data.dialog_name + " had its text changed and its status changed to " + this.data.dialog_status_name + " by " + this.data.username + " on " + this.data.last_updated + "</div><BR>";
					}

				});
				
				if (Ext.getCmp("tabHist") != undefined) {
					Ext.getCmp("tabHist").removeAll();
					Ext.getCmp("tabHist").add({width: "99.6%", html: str});
				}

			}
		}
	});
    //*****************************************************************//
    // STATUS END
    //*****************************************************************//	
	
	userStore.load();
	statusStore.load();
	toolBoxStore.load();
	historyStore.load();
});