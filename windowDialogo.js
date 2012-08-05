function editar(arc, msbt, id, onde){
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

        items: [
        {
            xtype: 'panel',
            flex: 1,  // Take up all *remaining* vertical space
            width: '60%',
            layout:'fit',
            items: [
            {
                xtype: 'textarea',
                id : 'editorTA' + arc + msbt + id,
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
            }
            ]
        }
        ,
        {
            xtype: 'panel',
            id: 'preview' + arc + msbt + id,
            width: '40%'
        }
    
        ]
    });

    var painelEditor = Ext.create('Ext.panel.Panel', {
        title: '<img src=\"img/'+ lang + '.png\">&nbsp;' +  lang ,
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
                        var tag = Ext.getCmp('editorTA' + arc + msbt + id).getValue();
                        Ext.Ajax.request({
                            url: 'gravar.php',
                            method : 'GET',
                            params: {
                                a : 'u',
                                arc : arc,
                                msbt : msbt,
                                id : id,
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
                text: 'Previsualizar em HTML',
                
                listeners: {
                    click: function( bt, e, eOpts ){
                        var tag = Ext.getCmp('editorTA' + arc + msbt + id).getValue();
                        Ext.Ajax.request({
                            url: 'preview.php',
                            method : 'GET',
                            params: {
                                tag : tag
                            },
                                
                            success: function(response){
                                Ext.getCmp('preview' + arc + msbt + id).update(response.responseText);
                            }

                        })
                    }
                
                }
                
            },{
                minWidth: 80,
                text: 'set Approved',
                id: 'btApprov' + msbt + id,
                listeners: {
                    click: function( bt, e, eOpts ){
                                        
                        Ext.Ajax.request({
                            url: 'gravar.php',
                            method : 'GET',
                            params: {
                                a: 'Approved',
                                arc : arc,
                                msbt : msbt,
                                id : id,
                                lang: 'pt_BR'
                                                
                            },
                                
                            success: function(response){
                                alert(response.responseText);
                            }

                        })
                    }
                
                }
                
            },
            {
                    minWidth: 80,
                    text: 'set Rejected',
                    id: 'btReject' + msbt + id,
                    listeners: {
                        click: function( bt, e, eOpts ){

                            Ext.Ajax.request({
                                url: 'gravar.php',
                                method : 'GET',
                                params: {
                                    a: 'Rejected',
                                    arc : arc,
                                    msbt : msbt,
                                    id : id,
                                    lang: 'pt_BR'

                                },

                                success: function(response){
                                    alert(response.responseText);
                                }

                            })
                        }

                    }

                }
    

]



        }]
    });

    onde.add(painelEditor);

}
    
function criarWindowDialogo(arc, msbt, id){
    Ext.create('Ext.window.Window', {
        title: 'dialogo: ' + arc + '/'+ msbt + '/' + id,

        //closeAction: 'hide',
        autoScroll:true,
        //            collapsible: true,
        //            animCollapse: true,
        maximizable: true,
        width: 600,
        height: '90%',
            
            
        //            renderTo: onde,
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
                    
                editar(arc, msbt, id, w);
//                var langs = Array('en_US','es_US','fr_US','it_IT','de_DE', 'ja_JP' );
                                      var langs = Array('en_US','es_US' );
                Ext.each(langs, function(lang, index, arraylangs){

                    var p = Ext.create('Ext.panel.Panel', {
                        title: '<img src=\"img/'+ lang + '.png\">&nbsp;' +  lang,
                        id: 'PainelDialogOriginal' + arc + msbt + id + lang,
                            
                        collapsible: true,                           
                        collapsed: true,
                                
                        layout: {
                            type:'hbox',
                            padding:'0',
                            align:'stretch'
                        },
                        items:[
                        {
                            xtype:'panel',
                            id: 'TAG' + msbt+ id + lang,
                            width: '60%'
                        },{
                            xtype:'panel',
                            id : 'HTML' + msbt+ id + lang,                                
                            width: '40%'
                        }
                        ],
                            
                        listeners: {
                            beforeexpand: function( p, animates, Opts ){
                                Ext.Ajax.request({
                                    url: 'preview.php',
                                    method : 'GET',
                                    params: {
                                        arc : arc,
                                        msbt: msbt,
                                        id:   id,
                                        lang: lang,
                                        modo: 'tag'
                                    },
                                
                                    success: function(response){
                                        Ext.getCmp('TAG' + msbt+ id + lang).update(response.responseText);
                                    }

                                });
                                Ext.Ajax.request({
                                    url: 'preview.php',
                                    method : 'GET',
                                    params: {
                                        arc : arc,
                                        msbt: msbt,
                                        id: id,
                                        lang: lang
                                    },
                                    success: function(response){
                                        Ext.getCmp('HTML' + msbt+ id + lang).update(response.responseText);
                                    }

                                });
                            }               
                        }
                    });

                    w.add(p);
                            
                });
   
            }
        }
    }).show();
    Ext.getCmp('PainelDialogOriginal' + arc + msbt + id + 'en_US').toggleCollapse();
}
   
