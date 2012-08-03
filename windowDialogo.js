    function editar(arc, msbt, pos, onde){
            var lang = "pt_BR";
    
            var form = Ext.create('Ext.form.Panel', {
                plain: true,
                border: 0,
                bodyPadding: 0,


                fieldDefaults: {
                    labelWidth: 55,
                    anchor: '100%'
                },

                layout: {
                    type: 'hbox',
                    align: 'stretch',  // Child items are stretched to full width            
                    padding:'0'
                                
                },

                items: [{
                        xtype: 'textarea',
                        id : 'editorTA' + arc + msbt + pos,
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
                                        arc: arc,
                                        msbt: msbt,
                                        pos : pos,
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
                    },{
                        xtype: 'panel',
                        id: 'preview' + arc + msbt + pos,
                        flex: 1  // Take up all *remaining* vertical space
                    }
    
                ]
            });

            var win = Ext.create('Ext.panel.Panel', {
                title: '<img src=\"img/'+ lang + '.png\">' +  lang + "\tEditor:",
//                collapsible: true,
//                animCollapse: true,
//                maximizable: true,
//                width: 750,
//                height: 500,
//                minWidth: 300,
//                minHeight: 200,
                layout: 'fit',
                items: form,
                dockedItems: [{
                        xtype: 'toolbar',
                        dock: 'bottom',
                        ui: 'footer',
                        layout: {
                            pack: 'center'
                        },
                        items: [{
                                minWidth: 80,
                                text: 'Salvar',
                
                                listeners: {
                                    click: function( bt, e, eOpts ){
                                        var tag = Ext.getCmp('editorTA' + arc + msbt + pos).getValue();
                                        Ext.Ajax.request({
                                            url: 'gravar.php',
                                            method : 'GET',
                                            params: {
                                                a : 'u',
                                                arc : arc,
                                                msbt : msbt,
                                                pos : pos,
                                                utf8 : tag 
                                            },
                                
                                            success: function(response){
                                                alert(response.responseText);
                                            }

                                        })
                                    }
                                }
                            },{
                                minWidth: 80,
                                text: 'Prever',
                
                                listeners: {
                                    click: function( bt, e, eOpts ){
                                        var tag = Ext.getCmp('editorTA' + arc + msbt + pos).getValue();
                                        Ext.Ajax.request({
                                            url: 'preview.php',
                                            method : 'GET',
                                            params: {tag : tag},
                                
                                            success: function(response){
                                                Ext.getCmp('preview' + arc + msbt + pos).update(response.responseText);
                                            }

                                        })
                                    }
                
                                }
                
                            },{
                                minWidth: 80,
                                text: 'Marcar como revisado',
                                id: 'btPreview' + msbt + pos,
                                listeners: {
                                    click: function( bt, e, eOpts ){
                                        
                                        Ext.Ajax.request({
                                            url: 'gravar.php',
                                            method : 'GET',
                                            params: {
                                                a: 'r',
                                                arc : arc,
                                                msbt : msbt,
                                                pos : pos,
                                                lang: 'pt_BR'
                                                
                                            },
                                
                                            success: function(response){
                                                alert(response.responseText);
                                            }

                                        })
                                    }
                
                                }
                
                            }]
                    }]
            });
//            win.show();
onde.add(win);

        }
    
    function criarWindowDialogo(arc, msbt, pos){
        Ext.create('Ext.window.Window', {
            title: 'dialogo: ' + arc + '/'+ msbt + '/' + pos,

            //closeAction: 'hide',
            autoScroll:true,
//            collapsible: true,
//            animCollapse: true,
            maximizable: true,
            width: '80%',
            height: '80%',
            
            
//            renderTo: onde,
            layout: {
                type:'vbox',
                padding:'2',
                align:'stretch'
            },
            defaults:{
                margins:'2 2 2 2'
            },
            
            items:[{
                xtype:'tabpanel',
                //                title : 'editar tradução',
                id: "tabOriginais" + msbt + pos,
                
                items:[{
//                    xtype:'panel',
//                    title : 'Informações',
//                    flex:1,
//                
//                    minHeight: 30,
//                    autoLoad:{
//                        url : 'info.php?arc=' + arc + 
//                        '&msbt=' + msbt + '&pos=' + pos
//                    }
                }
                ]
                
            }],
            
            listeners: {
                render: function(w, opt) {
                    
                    editar(arc, msbt, pos, w);
//                    var langs = Array('pt_BR' ,en_US','es_US','fr_US','it_IT','de_DE', 'ja_JP' );
                      var langs = Array('en_US','es_US', 'ja_JP' );
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
//                                title : 'TAG',
                                width: '50%',
                                //                                flex:3,
                                autoLoad:{
                                    url : 'preview.php?arc=' + arc + 
                                    '&msbt=' + msbt + '&pos=' + pos +'&lang=' + lang + '&modo=tag'
                                }
                            },{
                                xtype:'panel',
//                                title : 'HTML',
                                //                                flex:3,
                                
                                width: '50%',
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
   
